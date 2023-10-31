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
	return lastElement;
}

/**
 * The `modulrGrid` function adds event listeners to grid buttons and toggles the visibility of grid
 * categories based on user interaction.
 */
export async function modulrGrid(): Promise< void > {
	/* Finding all elements with the class `animate__animated` and adding them to an array. */
	const gridButtons: HTMLAnchorElement[] | null = document.querySelectorAll(
		'.modulr-grid-buttons li a'
	);

	const grid: HTMLElement | null =
		document.querySelector( '.modulr-grid > ul' );

	if ( gridButtons && grid ) {
		// the first item is the active button
		gridButtons[ 0 ].classList.add( 'active' );

		const { wrapGrid } = await import( 'animate-css-grid' );

		const { forceGridAnimation } = wrapGrid( grid );

		/* The code block is adding event listeners to each button in the `gridButtons` array. */
		gridButtons.forEach( ( button, index ) => {
			button.dataset.index = index.toString();
			button.addEventListener( 'click', function ( e: Event ) {
				e.preventDefault();

				const clickedItem = e.currentTarget as HTMLAnchorElement;

				const category = getLastElementFromHref( clickedItem?.href );

				if ( clickedItem.classList.contains( 'active' ) ) {
					// the main button cannot be disabled
					if ( clickedItem.dataset.index === '0' ) return;
					toggleCategoryVisiblity( grid, null, forceGridAnimation );
					clickedItem.classList.remove( 'active' );
					gridButtons[ 0 ].classList.add( 'active' );
				} else {
					// remove the active class from sibling buttons
					gridButtons.forEach( ( el ) => {
						el.classList.remove( 'active' );
					} );
					button.classList.add( 'active' );
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
