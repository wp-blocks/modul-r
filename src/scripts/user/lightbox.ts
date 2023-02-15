// Modul-R theme lightbox
import GLightbox from 'glightbox';

const lightboxDefaultOptions = {
	touchNavigation: true,
	loop: true,
	autoplayVideos: true,
};

type LIGHTBOX_EL = {
	href: string;
	srcset: string | null;
	title: string;
};

function getImageData( element: HTMLImageElement, type: string ) {
	switch ( type ) {
		case 'IMG':
			const caption = element.nextElementSibling?.textContent;
			return {
				href: element.src,
				srcset: element.srcset,
				title: caption || element.alt,
			};
		default:
			return {
				href: '#',
				srcset: null,
				title: 'err',
			};
	}
}

// eslint-disable-next-line no-console
export function modulrLightboxController() {
	/**
	 * LightBox effect - single image
	 */
	const lightBoxImages: NodeListOf< HTMLElement > = document.querySelectorAll(
		'.is-style-lightbox-image img'
	);

	lightBoxImages.forEach( ( ImagesEl ) => {
		const image: LIGHTBOX_EL[] = [];

		if ( ImagesEl?.tagName === 'IMG' )
			image.push( getImageData( ImagesEl as HTMLImageElement, 'IMG' ) );

		const lightbox = GLightbox( {
			elements: image,
			...lightboxDefaultOptions,
		} );

		lightBoxImages.forEach( ( el ) => {
			el.onclick = () => lightbox.open();
		} );
	} );

	/**
	 * LightBox effect - gallery
	 */
	const lightBoxGalleries: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-lightbox-gallery' );

	lightBoxGalleries.forEach( ( galleryEl ) => {
		const gallery: LIGHTBOX_EL[] = [];

		const galleryImages: NodeListOf< HTMLImageElement > | null =
			galleryEl.querySelectorAll( '.wp-block-image img' );

		if ( galleryImages ) {
			galleryImages.forEach( ( el: Element | null ) => {
				if ( el?.tagName === 'IMG' )
					gallery.push(
						getImageData( el as HTMLImageElement, 'IMG' )
					);
			} );

			const lightbox = GLightbox( {
				elements: gallery,
				...lightboxDefaultOptions,
			} );

			galleryImages.forEach( ( el, index ) => {
				el.onclick = () => lightbox.openAt( index );
			} );
		}
	} );
}
