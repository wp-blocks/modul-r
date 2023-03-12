// Modul-R theme slider
import BlazeSlider from 'blaze-slider';

export function modulrSliderController(): void {
	/**
	 * Slider - gallery
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
		const sliderHTML = Array.from( galleryItem ).map(
			( el ) => '<div>' + el.innerHTML + '</div>'
		);

		galleryEl.innerHTML = `<div class="blaze-slider">
<div class="blaze-container">
  <div class="blaze-track-container">
    <div class="blaze-track">
	  ${ sliderHTML.join( '' ) }
    </div>

    <!-- pagination container -->
    <div class="blaze-navigation">
      <button class="blaze-prev" aria-label="Go to previous slide"><span class="dashicons dashicons-arrow-left-alt"></span></button>
      <div class="blaze-pagination"></div>
      <button class="blaze-next" aria-label="Go to next slide"><span class="dashicons dashicons-arrow-right-alt"></span></button>
    </div>
  </div>
</div>`;

		new BlazeSlider( galleryEl.firstChild as HTMLElement, {
			all: {
				enableAutoplay: true,
				autoplayInterval: 2000,
				slidesToShow: columns,
				slideGap: '20px',
				// pagination
				enablePagination: true,
			},
			'(max-width: 900px)': {
				slidesToShow: 2,
			},
			'(max-width: 500px)': {
				slidesToShow: 1,
			},
		} );
	} );
}
