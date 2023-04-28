import MiniMasonry from 'minimasonry';

function getMasonryAttributes( container: HTMLElement ) {
	const attributes: { baseWidth?: number; columns?: number } = {};

	// get the width of the container element
	const containerWidth = container.clientWidth;

	container.classList.forEach( ( classname ) => {
		switch ( true ) {
			case classname.startsWith( 'columns-' ):
				attributes.columns =
					Number( classname.replace( 'columns-', '' ) ) + 1 ||
					undefined;
				break;
		}
	} );

	if ( attributes?.columns ) {
		attributes.baseWidth = Math.round(
			containerWidth / attributes.columns
		);
	}

	return attributes;
}

/**
 * Display post archive using mini-masonry
 */
export function modulrMasonryController() {
	/**
	 * Masonry
	 */
	const masonryContainer: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-masonry-layout' );

	/* Removing the classList of the container and then adding the new classList. */
	masonryContainer.forEach( ( itemWrap ) => {
		const attributes = getMasonryAttributes(
			itemWrap.firstElementChild as HTMLElement
		);
		const container = itemWrap.querySelector( 'ul' );
		if ( container ) {
			container.classList.remove( 'is-layout-flex' );
			container.classList.remove( 'is-layout-flow' );
			/* Creating a new instance of the MiniMasonry class. */
			new MiniMasonry( {
				container,
				baseWidth: attributes.baseWidth,
				gutterX: 24,
				gutterY: 24,
			} );
		}
	} );
}
