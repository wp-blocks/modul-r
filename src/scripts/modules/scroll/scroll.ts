const MARGIN = 100;
/**
 * Scrolls to the module when a link is clicked.
 */
export function modulrScrollTo() {
	const mainWrapper = document.querySelector( '.wp-site-blocks' );
	const anchorlinks = mainWrapper?.querySelectorAll( 'a[href^="#"]' );
	const header: HTMLElement | null = document.querySelector(
		'header.wp-block-template-part'
	); // Replace with the actual class or ID of your fixed header

	// Function to get the height of the header
	function getHeaderHeight() {
		return header ? header.offsetHeight + MARGIN : 0;
	}

	anchorlinks?.forEach( ( item ) => {
		item.addEventListener( 'click', ( event ) => {
			const hash = item.getAttribute( 'href' );
			const target = hash ? document.querySelector( hash ) : null;

			if ( target ) {
				event.preventDefault();

				// Get the height of the header
				const headerHeight = getHeaderHeight();

				// Scroll to the target, accounting for the header height
				window.scrollTo( {
					top:
						target.getBoundingClientRect().top +
						window.scrollY -
						headerHeight,
					behavior: 'smooth',
				} );

				history.pushState( null, null, hash );
			}
		} );
	} );
}
