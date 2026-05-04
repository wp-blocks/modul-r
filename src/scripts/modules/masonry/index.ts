/* Masonry */
import './style.scss';

const minCardSize = 300;

/**
 * The function gets the base width and number of columns for a masonry layout.
 * It now checks both the main wrapper and the actual grid element for the "columns-" class.
 *
 * @param {HTMLElement} wrapper - The main block wrapper.
 * @param {HTMLElement} gridElement - The actual container of the items (ul or figure).
 * @param {number} gutterX - Horizontal gutter size.
 */
function getMasonryAttributes( wrapper: HTMLElement, gridElement: HTMLElement, gutterX: number = 24 ) {
	const attributes: { baseWidth?: number; columns?: number } = {};
	const containerWidth = gridElement?.clientWidth || 0;

	// Search for the columns-x class on both elements
	const elementsToCheck = [ wrapper, gridElement ];

	elementsToCheck.forEach( ( el ) => {
		el?.classList.forEach( ( classname ) => {
			if ( classname.startsWith( 'columns-' ) ) {
				attributes.columns = Number( classname.replace( 'columns-', '' ) ) || undefined;
			}
		} );
	} );

	if ( attributes?.columns ) {
		const totalGutterSpace = gutterX * ( attributes.columns - 1 );
		const availableWidth = containerWidth - totalGutterSpace;

		// We subtract 0.5px to force the browser to fit exactly the number of columns,
		// preventing rounding errors that trigger a 5th column.
		const exactWidth = ( availableWidth / attributes.columns ) - 0.5;

		attributes.baseWidth = Math.max(
			minCardSize,
			exactWidth
		);
	}

	return attributes;
}

/**
 * Helper to wait for all images inside a container to fully load
 * This prevents height miscalculations when images lack width/height attributes
 */
function waitForImagesToLoad( container: HTMLElement ): Promise<void[]> {
	const images = Array.from( container.querySelectorAll( 'img' ) );
	const promises = images.map( ( img ) => {
		if ( img.complete ) return Promise.resolve();
		return new Promise<void>( ( resolve ) => {
			img.addEventListener( 'load', () => resolve() );
			img.addEventListener( 'error', () => resolve() ); // Resolve on error too, so it doesn't hang
		} );
	} );
	return Promise.all( promises );
}

/**
 * Initialize infinite scroll using Intersection Observer
 */
function initInfiniteScroll( container: HTMLElement, masonryInstance: any ) {
	let nextLink = document.querySelector(
		'.wp-block-query-pagination-next'
	) as HTMLAnchorElement;

	if ( ! nextLink ) return;

	const sentinel = document.createElement( 'div' );
	sentinel.className = 'infinite-scroll-sentinel';
	sentinel.style.width = '100%';
	sentinel.style.height = '1px';
	sentinel.style.marginTop = '20px';

	container.parentElement?.appendChild( sentinel );

	let isFetching = false;

	const observer = new IntersectionObserver(
		( entries ) => {
			entries.forEach( async ( entry ) => {
				if ( entry.isIntersecting && ! isFetching && nextLink ) {
					isFetching = true;
					try {
						const response = await fetch( nextLink.href );
						if ( ! response.ok ) throw new Error( 'Network response was not ok' );

						const htmlText = await response.text();
						const parser = new DOMParser();
						const doc = parser.parseFromString( htmlText, 'text/html' );

						const newItems = doc.querySelectorAll(
							'.is-style-masonry-layout ul > li.wp-block-post'
						);
						newItems.forEach( ( item ) => {
							container.appendChild( item );
						} );

						const newNextLink = doc.querySelector(
							'.wp-block-query-pagination-next'
						) as HTMLAnchorElement;

						if ( newNextLink ) {
							nextLink.href = newNextLink.href;
						} else {
							observer.disconnect();
							nextLink = null as any;
						}

						// Wait for new appended images to load before recalculating
						await waitForImagesToLoad( container );
						masonryInstance.layout();

					} catch ( error ) {
						console.error( 'Error fetching next page:', error );
					} finally {
						isFetching = false;
					}
				}
			} );
		},
		{ rootMargin: '400px' }
	);

	observer.observe( sentinel );
}

/**
 * Updated controller to handle the "columns-" class position correctly.
 */
export async function modulrMasonryController() {
	const masonryContainers: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-masonry-layout' );

	if ( masonryContainers.length === 0 ) return;

	const MiniMasonry = await import( 'minimasonry' );

	masonryContainers.forEach( ( container ) => {
		const isGallery = container.classList.contains( 'wp-block-gallery' );
		const gridContainer = isGallery ? container : container.querySelector( 'ul' );

		if ( gridContainer ) {
			// Pass both the wrapper and the ul/figure to check for classes[cite: 1, 2]
			const attributes = getMasonryAttributes( container, gridContainer as HTMLElement, 24 );

			gridContainer.classList.remove( 'is-layout-flex', 'is-layout-flow', 'is-layout-grid' );

			requestAnimationFrame( () => {
				const masonryInstance = new MiniMasonry.default( {
					container: gridContainer,
					baseWidth: attributes.baseWidth,
					gutterX: 24,
					gutterY: 24,
				} );

				( gridContainer as any ).miniMasonry = masonryInstance;

				waitForImagesToLoad( gridContainer as HTMLElement ).then( () => {
					masonryInstance.layout();
				} );

				if ( ! isGallery ) {
					initInfiniteScroll( gridContainer as HTMLElement, masonryInstance );
				}
			} );
		}
	} );
}
