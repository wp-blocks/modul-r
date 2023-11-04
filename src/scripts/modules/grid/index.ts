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
	category: string | null,
	forceGridAnimation: any
): void {
	if ( category && wrapper.querySelector( '.' + prefix + category ) ) {
		Array.from( wrapper.children ).forEach( ( item ) => {
			if ( ! item.classList.contains( prefix + category ) ) {
				item.classList.add( 'hide' );
			} else {
				item.classList.remove( 'hide' );
			}
		} );
	} else {
		Array.from( wrapper.children ).forEach( ( item ) => {
			item.classList.remove( 'hide' );
		} );
	}
	forceGridAnimation();
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
	const lastElement = pathnameParts[ pathnameParts.length - 2 ];

	if ( url.hash === '#all' ) {
		return null;
	}

	return lastElement;
}

function addAllCategory( ulElement ) {
	if ( ulElement ) {
		// Create a new <li> element
		const liElement = document.createElement( 'li' );
		liElement.setAttribute( 'class', 'cat-item cat-item-all' );

		// Create a new <a> element with the "All" label
		const aElement = document.createElement( 'a' );
		aElement.href = '#all'; // Set the appropriate URL if needed
		aElement.innerText = __( 'All' );

		// Append the <a> element to the <li> element
		liElement.appendChild( aElement );

		// Insert the new <li> element before the first child of the <ul>
		ulElement.insertBefore( liElement, ulElement.firstChild );
	}
}

/**
 * The `modulrGrid` function adds event listeners to grid buttons and toggles the visibility of grid
 * categories based on user interaction.
 */
export async function modulrGrid(): Promise< void > {
	addAllCategory( document.querySelector( 'ul.modulr-grid-buttons' ) );

	/* Finding all elements with the class `animate__animated` and adding them to an array. */
	const gridButtons: NodeListOf< HTMLAnchorElement > =
		document.querySelectorAll( '.modulr-grid-buttons li' );

	const grid: HTMLElement | null =
		document.querySelector( '.modulr-grid > ul' );

	if ( gridButtons && grid ) {
		const { wrapGrid } = await import( 'animate-css-grid' );

		const { forceGridAnimation } = wrapGrid( grid );

		/* The code block is adding event listeners to each button in the `gridButtons` array. */
		gridButtons.forEach( ( button, index ) => {
			button.dataset.index = index.toString();

			button.addEventListener( 'click', function ( e: Event ) {
				e.preventDefault();

				const clickedItem = e.currentTarget as HTMLAnchorElement;
				const clickedItemAnchor =
					clickedItem.firstChild as HTMLAnchorElement;

				const category = getLastElementFromHref(
					clickedItemAnchor?.href
				);

				if ( clickedItem?.classList.contains( 'current-cat' ) ) {
					toggleCategoryVisiblity( grid, null, forceGridAnimation );
					// the main button cannot be disabled
					if ( clickedItem.dataset.index === '0' ) {
						return;
					}
					clickedItem.classList.remove( 'current-cat' );
					gridButtons[ 0 ].classList.add( 'current-cat' );
				} else {
					// remove the active class from sibling buttons
					gridButtons.forEach( ( el ) => {
						el.classList.remove( 'current-cat' );
					} );
					button.classList.add( 'current-cat' );
					toggleCategoryVisiblity(
						grid,
						category,
						forceGridAnimation
					);
				}
			} );
		} );
	}
}
