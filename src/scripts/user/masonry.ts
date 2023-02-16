import MiniMasonry from 'minimasonry';

/**
 * Display post archive using mini-masonry
 */
export function modulrMasonryController() {
	/**
	 * Masonry
	 */
	const masonryContainer: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-masonry-layout' );

	masonryContainer.forEach( ( itemWrap ) => {
		const container = itemWrap.querySelector( 'ul' );
		if ( container ) {
			container.classList.remove( 'is-layout-flow' );
			container.classList.remove( 'is-flex-container' );
			new MiniMasonry( {
				container,
				gutterX: 24,
				gutterY: 24,
			} );
		}
	} );
}
