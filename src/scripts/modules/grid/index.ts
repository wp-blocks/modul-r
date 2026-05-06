import './style.scss';

/**
 * Toggles the visibility of items in a wrapper element based on a specified category, and
 * triggers a grid animation.
 *
 * @param {HTMLElement}   wrapper  - The container element that contains the items.
 * @param {string | null} category - The category of items to be toggled. If null, shows all items.
 */
function toggleCategoryVisiblity( wrapper: HTMLElement, category: string | null ): void {
	if ( !wrapper ) return;

	const masonryInstance =
		( wrapper as any ).miniMasonry ||
		( wrapper.querySelector( 'ul' ) as any )?.miniMasonry ||
		( wrapper.closest( '.is-style-masonry-layout' )?.querySelector( 'ul' ) as any )?.miniMasonry;

	// 1. Create a bin to store filtered-out items safely out of MiniMasonry's reach
	let hiddenBin = wrapper.nextElementSibling as HTMLElement;
	if ( ! hiddenBin || ! hiddenBin.classList.contains( 'masonry-hidden-bin' ) ) {
		hiddenBin = document.createElement( 'div' );
		hiddenBin.className = 'masonry-hidden-bin';
		hiddenBin.style.display = 'none';
		wrapper.parentNode?.insertBefore( hiddenBin, wrapper.nextSibling );
	}

	const currentWrapperItems = Array.from( wrapper.children ) as HTMLElement[];
	const hiddenItems = Array.from( hiddenBin.children ) as HTMLElement[];

	// 2. Assign permanent indexes to preserve original DOM order (supports infinite scroll)
	let maxIndex = parseInt( wrapper.dataset.maxIndex || '-1', 10 );
	currentWrapperItems.forEach( ( item ) => {
		if ( ! item.dataset.originalIndex ) {
			maxIndex++;
			item.dataset.originalIndex = maxIndex.toString();
		}
	} );
	wrapper.dataset.maxIndex = maxIndex.toString();

	// 3. Combine and sort all items back to their original sequence
	const allItems = [ ...currentWrapperItems, ...hiddenItems ];
	allItems.sort( ( a, b ) => parseInt( a.dataset.originalIndex! ) - parseInt( b.dataset.originalIndex! ) );

	// 4. Evaluate and physically move DOM nodes
	const itemsToShow: HTMLElement[] = [];
	allItems.forEach( ( item ) => {
		const isMatch = ! category || item.classList.contains( 'category-' + category );

		item.classList.remove( 'masonry-item-enter' );
		item.style.animationDelay = ''; // Clear previous delays

		if ( isMatch ) {
			wrapper.appendChild( item ); // Appends in sorted order
			itemsToShow.push( item );
		} else {
			hiddenBin.appendChild( item ); // Removes from MiniMasonry's view
		}
	} );

	// 5. Calculate layout ONLY on the visible items in wrapper
	if ( masonryInstance ) {
		masonryInstance.layout();
	}

	// 6. Apply staggered entrance animation
	requestAnimationFrame( () => {
		itemsToShow.forEach( ( item, index ) => {
			void item.offsetWidth; // Force reflow
			item.classList.add( 'masonry-item-enter' );
			item.style.animationDelay = `${ index * 60 }ms`; // Incremental delay (60ms per card)
		} );
	} );
}

/**
 * Safely extracts the actual category slug from the href, handling trailing slashes correctly.
 *
 * @param {string} href - The URL to extract the category from.
 * @returns {string | null} - The extracted category slug or null.
 */
function getLastElementFromHref( href: string ): string | null {
	if ( ! href || href.startsWith( '#' ) || href === '' ) {
		return null;
	}
	try {
		const url = new URL( href, window.location.origin );

		// Always remove the trailing slash to prevent inconsistent path splitting
		const pathname = url.pathname.replace(/\/$/, "");
		const pathnameParts = pathname.split( '/' );

		// Always retrieve the actual last element of the path
		return pathnameParts[ pathnameParts.length - 1 ];
	} catch ( e ) {
		return null;
	}
}

/**
 * Initialize grid buttons, distinguishing between internal filters and external category links.
 */
export async function modulrGrid(): Promise< void > {

	const gridButtons: NodeListOf< HTMLElement > = document.querySelectorAll( '.modulr-grid-buttons li' );

	// Broadened selector to ensure we find the grid even if it only uses the masonry layout classes
	const grid: HTMLElement | null =
		document.querySelector( '.is-style-masonry-layout > ul' ) ||
		document.querySelector( '.is-style-masonry-layout' ) ||
		document.querySelector( '.wp-block-query > ul' );

	if ( gridButtons.length > 0 ) {

		const currentPath = window.location.pathname.replace(/\/$/, "");
		let basePath = currentPath; // Default fallback

		// Find all links in the grid that act as true ancestors to the current path
		const ancestorPaths: string[] = [];

		gridButtons.forEach(button => {
			const anchor = button.querySelector('a');
			if (anchor && anchor.href && !anchor.href.startsWith('#')) {
				try {
					const url = new URL(anchor.href, window.location.origin);
					const linkPath = url.pathname.replace(/\/$/, "");

					// It is an ancestor only if the current path exactly matches it, or extends it
					if (currentPath === linkPath || currentPath.startsWith(linkPath + "/")) {
						ancestorPaths.push(linkPath);
					}
				} catch (e) {}
			}
		});

		// The shortest valid ancestor path is our "Root Parent Category" for this specific grid
		if (ancestorPaths.length > 0) {
			ancestorPaths.sort((a, b) => a.length - b.length);
			basePath = ancestorPaths[0];
		}

		gridButtons.forEach( ( button, index ) => {
			button.dataset.index = index.toString();
			const buttonAnchor = button.querySelector( 'a' );

			if ( buttonAnchor ) {
				const href = buttonAnchor.getAttribute( 'href' );
				let categoryType = 'is-external-category';

				if ( href && ( href.startsWith( '#' ) || href === '' ) ) {
					// "All" / parent reset filter
					categoryType = 'is-parent-category';
				} else if ( href ) {
					try {
						const linkUrl = new URL( href, window.location.origin );
						const linkPath = linkUrl.pathname.replace(/\/$/, "");

						// Compare the link with the ACTUAL determined Root Parent (basePath)
						if ( linkPath === basePath ) {
							categoryType = 'is-parent-category';
						} else if ( linkPath.startsWith( basePath + "/" ) ) {
							categoryType = 'is-sub-category';
						} else {
							categoryType = 'is-external-category';
						}
					} catch ( e ) {
						categoryType = 'is-external-category';
					}
				}

				// Clean up previous classes to avoid duplicates and append the new classification
				button.className = button.className.replace(/\bis-(external|parent|sub)-category\b/g, '').trim();
				if (categoryType) button.classList.add( categoryType );

				// Bind the click event only if it's a parent or child filter
				if (
					grid &&
					( categoryType === 'is-parent-category' || categoryType === 'is-sub-category' )
				) {
					buttonAnchor.addEventListener( 'click', function ( e: Event ) {
						e.preventDefault(); // Prevent default navigation (page reload)

						gridButtons.forEach( ( el ) => el.classList.remove( 'current-cat' ) );
						button.classList.add( 'current-cat' );

						// If the user clicks the parent category, pass null to reset the filter and show all items.
						// Otherwise, extract the specific child category slug.
						const category = categoryType === 'is-parent-category'
							? null
							: getLastElementFromHref( buttonAnchor.href );

						toggleCategoryVisiblity( grid as HTMLElement, category );
					} );
				}
			}
		} );
	}
}
