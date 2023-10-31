// Modul-R theme lightbox

/* Lightbox style */
import 'glightbox/dist/css/glightbox.min.css';
import './style.scss';
import {LIGHTBOX_EL} from "./types";

const lightboxDefaultOptions = {
	touchNavigation: true,
	loop: true,
	autoplayVideos: true,
};

/**
 * This TypeScript function gets image data from an HTML image element and returns it in a specific
 * format.
 *
 * @param {HTMLImageElement} element An HTMLImageElement, which represents an image element in an
 *                                   HTML document.
 * @param {string}           type    The `type` parameter is a string that specifies the type of element being
 *                                   passed to the `getImageData` function. In this case, it can only be the string "IMG" to indicate
 *                                   that an `HTMLImageElement` is being passed. If any other string is passed, the function will
 * @return {Object} an object with three properties: `href`, `srcset`, and `title`. The type of the object
 * returned depends on the value of the `type` parameter passed to the function. If `type` is equal to
 * `'IMG'`, the function returns an object with the `href`, `srcset`, and `title` properties set to the
 * `src`, `srcset
 */
function getImageData(
	element: HTMLImageElement,
	type: string
):
	| { href: '#'; srcset: null; title: 'err' }
	| { href: string; srcset: string; title: string } {
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

export async function modulrLightboxController() {
	/**
	 * LightBox effect - single image
	 */
	const lightBoxImages: NodeListOf< HTMLElement > = document.querySelectorAll(
		'.is-style-lightbox-image img'
	);

	/**
	 * LightBox effect - gallery
	 */
	const lightBoxGalleries: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-lightbox-gallery' );

	if ( lightBoxGalleries.length === 0 || lightBoxImages.length === 0 ) {
		return;
	}

	const GLightbox = await import( 'glightbox' );

	/* This code block is setting up a lightbox effect for single images. It selects all the `img` elements
	with the class `is-style-lightbox-image` and loops through them using `forEach`. For each `img`
	element, it creates an array `image` of type `LIGHTBOX_EL[]` and pushes an object with the `href`,
	`srcset`, and `title` properties of the image using the `getImageData` function. It then creates a
	new `GLightbox` instance with the `elements` property set to the `image` array and the
	`lightboxDefaultOptions`. Finally, it sets an `onclick` event listener on each `img` element that
	opens the lightbox when clicked. */
	lightBoxImages.forEach( ( ImagesEl ) => {
		const image: LIGHTBOX_EL[] = [];

		if ( ImagesEl?.tagName === 'IMG' ) {
			image.push( getImageData( ImagesEl as HTMLImageElement, 'IMG' ) );
		}

		const lightbox = GLightbox.default( {
			elements: image,
			...lightboxDefaultOptions,
		} );

		lightBoxImages.forEach( ( el ) => {
			el.onclick = () => lightbox.open();
		} );
	} );

	lightBoxGalleries.forEach( ( galleryEl ) => {
		const gallery: LIGHTBOX_EL[] = [];

		const galleryImages: NodeListOf< HTMLImageElement > | null =
			galleryEl.querySelectorAll( '.wp-block-image img' );

		if ( galleryImages ) {
			galleryImages.forEach( ( el: Element | null ) => {
				if ( el?.tagName === 'IMG' ) {
					gallery.push(
						getImageData( el as HTMLImageElement, 'IMG' )
					);
				}
			} );

			const lightbox = GLightbox.default( {
				elements: gallery,
				...lightboxDefaultOptions,
			} );

			galleryImages.forEach( ( el, index ) => {
				el.onclick = () => lightbox.openAt( index );
			} );
		}
	} );
}
