import './style.scss';
import { __ } from '@wordpress/i18n';
const prefix = 'category-';

/**
 * The function toggles the visibility of items in a wrapper element based on a specified category, and
 * triggers a grid animation.
 *
 * @param {HTMLElement}   wrapper            - The wrapper parameter is an HTMLElement that represents the container
 *                                           element that contains the items to be toggled.
 * @param {string | null} category           - The category parameter is a string that represents the category of
 *                                           items to be toggled. It can be null if no specific category is selected.
 * @param {any}           forceGridAnimation - The `forceGridAnimation` parameter is a function that triggers the
 *                                           animation for the grid layout. It is called after the visibility of the category is toggled.
 */
function toggleCategoryVisiblity(
	wrapper: HTMLElement,
	category: string | null
): void {
	const masonryInstance = ( wrapper as any ).miniMasonry;
	const items = Array.from( wrapper.children ) as HTMLElement[];
	const itemsToHide: HTMLElement[] = [];
	const itemsToShow: HTMLElement[] = [];

	items.forEach( ( item ) => {
		const isMatch =
			! category || item.classList.contains( prefix + category );
		if ( isMatch ) {
			if ( item.classList.contains( 'hide' ) ) {
				itemsToShow.push( item );
			}
		} else {
			if ( ! item.classList.contains( 'hide' ) ) {
				itemsToHide.push( item );
			}
		}
	} );

	if ( itemsToHide.length === 0 && itemsToShow.length === 0 ) {
		return;
	}

	// 1. Fade out items that need to be hidden
	itemsToHide.forEach( ( item ) => item.classList.add( 'fading-out' ) );

	// 2. Prepare items to show (start them as fading-out so they're transparent)
	itemsToShow.forEach( ( item ) => {
		item.classList.add( 'fading-out' );
		item.classList.remove( 'hide' );
	} );

	const waitTime = itemsToHide.length > 0 ? 300 : 0;

	setTimeout( () => {
		// 3. Fully hide elements that faded out
		itemsToHide.forEach( ( item ) => item.classList.add( 'hide' ) );

		// 4. Trigger layout calculation so transparent items get positioned correctly
		if ( masonryInstance ) {
			masonryInstance.layout();
		}

		// 5. Trigger fade-in for shown items on next frames
		requestAnimationFrame( () => {
			setTimeout( () => {
				itemsToShow.forEach( ( item ) =>
					item.classList.remove( 'fading-out' )
				);
				itemsToHide.forEach( ( item ) =>
					item.classList.remove( 'fading-out' )
				);
			}, 50 );
		} );
	}, waitTime );
}

/**
 * The function extracts the second-to-last element from the pathname of a given URL.
 *
 * @param href - The `href` parameter is a string that represents a URL.
 * @return the second-to-last element from the pathname of the given href.
 */
function getLastElementFromHref( href ) {
	const url = new URL( href );
	const pathname = url.pathname;
	const pathnameParts = pathname.split( '/' );
	return pathnameParts[ pathnameParts.length - 2 ];
}

/**
 * Initialize grid buttons, distinguishing between internal filters and external category links.
 */
export async function modulrGrid(): Promise< void > {

	const gridButtons: NodeListOf< HTMLElement > = document.querySelectorAll( '.modulr-grid-buttons li' );
	const grid: HTMLElement | null = document.querySelector( '.modulr-grid > ul' );

	if ( gridButtons && grid ) {
		const currentPath = window.location.pathname;

		gridButtons.forEach( ( button, index ) => {
			button.dataset.index = index.toString();
			const buttonAnchor = button.querySelector( 'a' );

			if ( buttonAnchor ) {
				const href = buttonAnchor.getAttribute( 'href' );
				let isFilter = false;

				if ( href && ( href.startsWith( '#' ) || href === '' ) ) {
					isFilter = true;
				} else if ( href ) {
					try {
						const linkUrl = new URL( href, window.location.origin );
						// Verify if the link belongs to the same path or a subpath[cite: 2]
						if ( linkUrl.pathname.startsWith( currentPath ) ) {
							isFilter = true;
						}
					} catch ( e ) {
						// Fallback for relative paths
						if ( href.startsWith( currentPath ) ) isFilter = true;
					}
				}

				button.classList.add( isFilter ? 'is-sub-category' : 'is-external-category' );
			}

			button.addEventListener( 'click', function ( e: Event ) {
				if ( button.classList.contains( 'is-external-category' ) ) {
					return; // Let the browser handle the link naturally
				}

				e.preventDefault();
				const clickedItem = e.currentTarget as HTMLElement;
				const clickedItemAnchor = clickedItem.querySelector( 'a' );

				gridButtons.forEach( ( el ) => el.classList.remove( 'current-cat' ) );
				button.classList.add( 'current-cat' );

				const category = getLastElementFromHref( clickedItemAnchor?.href );
				toggleCategoryVisiblity( grid, category );
			} );
		} );
	}
}
