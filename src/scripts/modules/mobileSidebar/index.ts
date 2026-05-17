/**
 * Mobile Sidebar Controller
 * Handles sliding sidebar functionality for mobile devices
 */
export class MobileSidebarController {
	private sidebar: HTMLElement | null = null;
	private toggleBtn: HTMLElement | null = null;
	private overlay: HTMLElement | null = null;
	private isMobile: boolean = false;

	constructor() {
		this.init();
	}

	private init(): void {
		this.checkMobile();
		this.setupElements();
		this.setupEventListeners();
		this.setupResizeListener();
	}

	private checkMobile(): void {
		this.isMobile = window.innerWidth <= 768;
	}

	private setupElements(): void {
		if (this.isMobile) {
			this.sidebar = document.querySelector('.sidebar.wp-block-template-part');

			if (this.sidebar) {
				// Create toggle button and overlay after the sidebar
				this.createMobileElements();

				// Get the created elements
				this.toggleBtn = document.querySelector('.sidebar-toggle-btn');
				this.overlay = document.querySelector('.sidebar-overlay');
			}

			if (!this.sidebar || !this.toggleBtn || !this.overlay) {
				console.log('Mobile sidebar elements not found.', this.sidebar, this.toggleBtn, this.overlay)
			}
		}
	}

	private setupEventListeners(): void {
		if (!this.isMobile || !this.sidebar) return;

		// Button click logic
		if (this.toggleBtn) {
			this.toggleBtn.addEventListener('click', (e) => {
				e.preventDefault();
				this.toggleSidebar();
			});
		}

		// Overlay click to close
		if (this.overlay) {
			this.overlay.addEventListener('click', () => {
				this.closeSidebar();
			});
		}

		// Swipe gesture logic
		this.setupSwipeGestures();
	}

	private setupSwipeGestures(): void {
		let touchStartX = 0;
		let touchEndX = 0;

		document.addEventListener('touchstart', (e) => {
			touchStartX = e.changedTouches[0].screenX;
		});

		document.addEventListener('touchend', (e) => {
			touchEndX = e.changedTouches[0].screenX;
			this.handleSwipe(touchStartX, touchEndX);
		});
	}

	private handleSwipe(touchStartX: number, touchEndX: number): void {
		// Swipe Right to Open (Only if the swipe starts near the left edge of the screen)
		if (touchEndX - touchStartX > 70 && touchStartX < 40) {
			this.openSidebar();
		}

		// Swipe Left to Close
		if (touchStartX - touchEndX > 70) {
			this.closeSidebar();
		}
	}

	private toggleSidebar(): void {
		if (this.sidebar) {
			this.sidebar.classList.toggle('is-open');
			if (this.overlay) {
				this.overlay.classList.toggle('is-open');
			}
		}
	}

	private openSidebar(): void {
		if (this.sidebar) {
			this.sidebar.classList.add('is-open');
			if (this.overlay) {
				this.overlay.classList.add('is-open');
			}
		}
	}

	private closeSidebar(): void {
		if (this.sidebar) {
			this.sidebar.classList.remove('is-open');
			if (this.overlay) {
				this.overlay.classList.remove('is-open');
			}
		}
	}

	private createMobileElements(): void {
		// Create toggle button
		const toggleBtn = document.createElement('button');
		toggleBtn.className = 'sidebar-toggle-btn hidden';
		toggleBtn.innerHTML = `
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		`;
		toggleBtn.setAttribute('aria-label', 'Toggle sidebar menu');

		// Create overlay
		const overlay = document.createElement('div');
		overlay.className = 'sidebar-overlay hidden';

		// Insert elements at the beginning of body for proper sticky positioning
		if (this.sidebar && document.body) {
			document.body.insertBefore(toggleBtn, document.body.firstChild);
			document.body.insertBefore(overlay, toggleBtn.nextSibling);

			// Remove hidden class after a brief delay to ensure proper initialization
			setTimeout(() => {
				toggleBtn.classList.remove('hidden');
				overlay.classList.remove('hidden');
			}, 100);
		}
	}

	private setupResizeListener(): void {
		window.addEventListener('resize', () => {
			const wasMobile = this.isMobile;
			this.checkMobile(); // This should be called on every resize

			// If switching from mobile to desktop, close sidebar and hide elements
			if (wasMobile && !this.isMobile) {
				this.closeSidebar();
				// Hide mobile elements on desktop
				if (this.toggleBtn) this.toggleBtn.classList.add('hidden');
				if (this.overlay) this.overlay.classList.add('hidden');
			}

			// If switching from desktop to mobile, re-setup elements and show them
			if (!wasMobile && this.isMobile) {
				this.setupElements();
				this.setupEventListeners();
				// Show mobile elements
				if (this.toggleBtn) this.toggleBtn.classList.remove('hidden');
				if (this.overlay) this.overlay.classList.remove('hidden');
			}
		});
	}
}

// Initialize the mobile sidebar controller
export const modulrSidebarController = () => {
	new MobileSidebarController();
};
