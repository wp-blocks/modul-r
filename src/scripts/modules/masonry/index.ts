/* Masonry */
import './style.scss';

/**
 * The function gets the base width and number of columns for a masonry layout based on the width of a
 * container element and its CSS class.
 *
 * @param {HTMLElement} container - HTMLElement - the container element for the masonry layout.
 * @return an object with two optional properties: `baseWidth` and `columns`. The `baseWidth` property
 * is the width of each column in the masonry layout, calculated by dividing the width of the container
 * element by the number of columns specified in the container's class name. The `columns` property is
 * the number of columns specified in the container's class name, incremented by
 */
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
export async function modulrMasonryController() {
	/**
	 * Masonry
	 */
	const masonryContainer: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-masonry-layout' );

	if ( masonryContainer.length === 0 ) {
		return;
	}

	const MiniMasonry = await import( 'minimasonry' );

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
			new MiniMasonry.default( {
				container,
				baseWidth: attributes.baseWidth,
				gutterX: 24,
				gutterY: 24,
			} );
		}
	} );
}
