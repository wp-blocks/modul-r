// Page patterns functions
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.min.css';

import BlazeSlider from 'blaze-slider';
import 'blaze-slider/dist/blaze.css';

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
			return {
				href: element.src,
				srcset: element.srcset,
				title: element.alt,
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
window.onload = () => {
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

	/**
	 * LightBox effect - gallery
	 */
	const SliderGalleries: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-slider-gallery' );

	SliderGalleries.forEach( ( galleryEl ) => {
		let columns: number = 1;
		galleryEl.classList.forEach( ( classname ) => {
			if ( classname.startsWith( 'columns-' ) ) {
				columns = Number( classname.replace( 'columns-', '' ) );
			}
		} );

		const galleryItem = galleryEl.querySelectorAll( '.wp-block-image' );
		const sliderHTML = Array.from( galleryItem ).map( ( el ) => {
			return '<div>' + el.innerHTML + '</div>';
		} );

		galleryEl.innerHTML = `<div class="blaze-slider">
  <div class="blaze-container">
    <div class="blaze-track-container">
      <div class="blaze-track">
        ${ sliderHTML.join( '' ) }
      </div>

  <!-- pagination container -->
  <div class="my-pagination-container">
	<div class="blaze-pagination"></div>
  </div>
</div>

<!-- navigation buttons -->
<div class="my-nav-container">
  <button class="blaze-prev">previous</button>
  <button class="blaze-next">next</button>
  </div>
</div>`;

		new BlazeSlider( galleryEl.querySelector( '.blaze-slider' ), {
			all: {
				enableAutoplay: true,
				autoplayInterval: 2000,
				slidesToShow: columns,
			},
			'(max-width: 900px)': {
				slidesToShow: 2,
			},
			'(max-width: 500px)': {
				slidesToShow: 1,
			},
		} );
	} );
};
