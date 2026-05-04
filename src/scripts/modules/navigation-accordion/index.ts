/**
 * Navigation Accordion Controller
 * Handles custom accordion logic for the mobile navigation menu, safely bypassing
 * WordPress's native Interactivity API using event capturing.
 *
 * Implements a double-tap UX pattern for parent links:
 * - 1st tap: Opens the submenu.
 * - 2nd tap: Navigates to the link's URL.
 */
import './style.scss';

export function modulrNavigationAccordionController(): void {

	document.addEventListener( 'click', ( event: Event ) => {
		const target = event.target as HTMLElement;

		// Ensure the click happened inside the active mobile menu overlay
		const isMobileOverlay = target.closest( '.wp-block-navigation__responsive-container.is-menu-open' );
		if ( ! isMobileOverlay ) {
			return;
		}

		// Scenario A: User clicked directly on the toggle icon (arrow)
		const toggleButton = target.closest( '.wp-block-navigation-submenu__toggle' );
		if ( toggleButton ) {
			event.preventDefault();
			event.stopImmediatePropagation();

			const parentItem = toggleButton.closest( '.wp-block-navigation-submenu' );
			if ( parentItem ) {
				const isOpen = parentItem.classList.toggle( 'is-custom-open' );
				toggleButton.setAttribute( 'aria-expanded', String( isOpen ) );
			}
			return;
		}

		// Scenario B: User clicked on the main text link of an item with a submenu
		const parentLink = target.closest( '.wp-block-navigation-submenu > a' );
		if ( parentLink ) {
			const parentItem = parentLink.closest( '.wp-block-navigation-submenu' );

			if ( parentItem && ! parentItem.classList.contains( 'is-custom-open' ) ) {
				// First tap: Stop navigation and open the accordion instead
				event.preventDefault();
				event.stopImmediatePropagation();

				parentItem.classList.add( 'is-custom-open' );

				// Update ARIA attribute for the associated toggle button
				const icon = parentItem.querySelector( '.wp-block-navigation-submenu__toggle' );
				if ( icon ) {
					icon.setAttribute( 'aria-expanded', 'true' );
				}
			}
			// Second tap: Do nothing here. The event will propagate naturally
			// and the browser will navigate to the URL.
		}

	}, true ); // Capture phase ensures we intercept before Gutenberg's API

}
