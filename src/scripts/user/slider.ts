// Modul-R theme slider

// import Swiper JS
import Swiper, {
	EffectFade,
	Navigation, Pagination,
	Scrollbar,
	SwiperOptions,
} from 'swiper';
import { SwiperModule } from 'swiper/types';
import { SliderContainerConfig } from './types';

/**
 * The navigation buttons html code.
 */
const navigationHTML: string =
	'  <!-- navigation buttons -->\n  <div class="swiper-button-prev"></div>\n  <div class="swiper-button-next"></div>\n\n';

/**
 * The scrollbar html code.
 */
const scrollbarHTML: string =
	'<!-- scrollbar -->\n  <div class="swiper-scrollbar"></div>\n\n';

/**
 * The pagination html code.
 */
const paginationHTML: string =
	'<!-- pagination -->\n	<div class="swiper-pagination"></div>\n\n';

/**
 * The plugin default options
 */
const defaultSliderOption: SwiperOptions = {
	mousewheel: true,
	keyboard: true,
	direction: 'horizontal',
	loop: true,
};

/**
 * The available loaded modules.
 */
export const availableModules = {
	fade: EffectFade,
	navigation: Navigation,
	scrollbar: Scrollbar,
	bullets: Pagination,
};

/**
 * The function takes in options and props for a Swiper slider and returns updated options based on the
 * props.
 *
 * @param {SwiperOptions}         options - an object containing the initial Swiper options
 * @param {SliderContainerConfig} props   - `props` is an object that contains configuration options for
 *                                        a slider container. It can have the following properties:
 * @return a modified version of the `options` object passed as the first argument, based on the
 * values of the `props` object passed as the second argument. The modifications include changing the
 * `slidesPerView` value, adding pagination or scrollbar options, and adding navigation options.
 */
function getSliderOptions(
	options: SwiperOptions,
	props: SliderContainerConfig
): SwiperOptions {
	if ( props.fitHeight === true ) {
		options = {
			...options,
			slidesPerView: 'auto',
			autoHeight: true,
		};
	}

	if ( props.fade === true ) {
		options = {
			...options,
			slidesPerView: 1,
			effect: 'fade',
			breakpoints: undefined,
		};
	}

	if ( props.pagination === 'bullets' ) {
		options = {
			...options,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		};
	} else if ( props.pagination === 'scrollbar' ) {
		options = {
			...options,
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
				hide: false,
			},
		};
	}

	if ( props.navigation ) {
		options = {
			...options,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		};
	}

	return options;
}

/**
 * This function returns an array of Swiper modules based on the options provided and the available
 * modules.
 *
 * @param {SliderContainerConfig} options - SliderContainerConfig object that contains configuration
 *                                        options for the slider container.
 * @param {any}                   modules - an object containing different Swiper modules that can be loaded
 * @return an array of SwiperModule objects or undefined.
 */
function getSliderModules(
	options: SliderContainerConfig,
	modules: any
): SwiperModule[] | undefined {
	const moduleLoad: SwiperModule[] = [];
	if ( options.fade ) {
		moduleLoad.push( modules.fade );
	}

	if ( options.navigation ) {
		moduleLoad.push( modules.navigation );
	}

	if ( options.pagination === 'bullets' ) {
		moduleLoad.push( modules.bullets );
	} else if ( options.pagination === 'scrollbar' ) {
		moduleLoad.push( modules.scrollbar );
	}

	return moduleLoad.length ? moduleLoad : undefined;
}

function getSliderBreakpoints(
	columns: SliderContainerConfig[ 'slidesPerView' ]
): SwiperOptions[ 'breakpoints' ] {
	return {
		'@0.00': {
			slidesPerView: 1,
		},
		'@0.50': {
			slidesPerView: 2,
		},
		'@1.00': {
			slidesPerView: columns,
		},
	};
}

/**
 * The function takes an HTML element and returns a configuration object for a slider based on the
 * element's class names.
 *
 * @param {HTMLElement} galleryEl - An HTMLElement representing the gallery container element for which
 *                                the slider data is being retrieved.
 * @return an object of type `SliderContainerConfig`.
 */
function getSliderData( galleryEl: HTMLElement ): SliderContainerConfig {
	const sliderData: SliderContainerConfig = {
		container: 'group',
		selector: '.wp-block-group',
		navigation: true,
		pagination: 'bullets',
		slidesPerView: 3,
	};

	galleryEl.classList.forEach( ( classname ) => {
		switch ( true ) {
			case 'wp-block-gallery' === classname:
				sliderData.container = 'gallery';
				sliderData.selector = '.wp-block-image';
				break;

			case 'wp-block-query' === classname:
				sliderData.slidesPerView = 4;
				sliderData.container = 'query-loop';
				sliderData.selector = '.wp-block-post';
				break;

			case 'slider-fit-height' === classname:
				sliderData.fitHeight = true;
				break;

			case 'slider-fade' === classname:
				sliderData.fade = true;
				break;

			case 'slider-captions-animation' === classname:
				sliderData.captionsAnimation = true;
				break;

			case 'slider-hide-nav' === classname:
				sliderData.navigation = undefined;
				break;

			case 'slider-scrollbar' === classname:
				sliderData.pagination = 'scrollbar';
				break;

			case classname.startsWith( 'columns-' ):
				sliderData.slidesPerView =
					Number( classname.replace( 'columns-', '' ) ) || 1;
				break;

			case classname.startsWith( 'slider-gap-' ):
				sliderData.spaceBetween =
					Number( classname.split( '-' )[ 2 ] ) || 0;
				break;
		}
	} );

	return sliderData;
}

/**
 * The function creates a slider container using Swiper library based on the provided configuration
 * properties.
 *
 * @param {HTMLElement}           galleryEl - HTMLElement representing the container element for the
 *                                          slider/gallery.
 * @param {SliderContainerConfig} props     - The `props` parameter is an object that contains
 *                                          configuration options for the slider container. It includes properties such as `slidesPerView`,
 *                                          `spaceBetween`, `container`, `selector`, `pagination`, `navigation`, and more. These properties are
 *                                          used to customize the behavior and appearance of the slider.
 * @return If `sliderHTML` is falsy, the function will return nothing (`undefined`). Otherwise, it
 * will prepare the slider container and initialize a new Swiper instance with the provided options and
 * modules.
 */
function modulrSlider( galleryEl: HTMLElement, props: SliderContainerConfig ) {
	let sliderHTML;
	let options: SwiperOptions = {
		...defaultSliderOption,
		slidesPerView: props.slidesPerView,
		spaceBetween: props.spaceBetween || 0,
	};

	options = getSliderOptions( options, props );
	if ( ! props.fade ) {
		options.breakpoints = getSliderBreakpoints( options.slidesPerView );
	}

	switch ( props.container ) {
		// groups and rows
		case 'group':
			sliderHTML = Array.from(
				galleryEl.querySelectorAll(
					':scope > ' + props.selector
				) as NodeListOf< HTMLElement >
			).map( ( el ) => {
				el.classList.add( 'swiper-slide' );
				return el.outerHTML;
			} );
			break;

		// Image/Video Gallery
		case 'gallery':
			const galleryItems = galleryEl.querySelectorAll(
				props.selector
			) as NodeListOf< HTMLElement >;
			sliderHTML = Array.from( galleryItems ).map(
				( el ) => '<div class="swiper-slide">' + el.innerHTML + '</div>'
			);
			break;

		// Query Loop
		case 'query-loop':
			sliderHTML = Array.from(
				galleryEl.querySelectorAll(
					props.selector
				) as NodeListOf< HTMLElement >
			).map(
				( el ) => '<div class="swiper-slide">' + el.innerHTML + '</div>'
			);
			break;

		default:
			break;
	}

	if ( ! sliderHTML ) return;

	/* prepare slider container */
	galleryEl.innerHTML = `<!-- Slider main container -->
	<div class="swiper">
	  <!-- Additional required wrapper -->
	  <div class="swiper-wrapper">
		  ${ sliderHTML.join( '' ) }
	  </div>
		  ${ props.pagination === 'bullets' ? paginationHTML : '' }
		  ${ !! props.navigation ? navigationHTML : '' }
		  ${ props.pagination === 'scrollbar' ? scrollbarHTML : '' }
	</div>`;

	/* Initialize Swiper */
	new Swiper( galleryEl.firstElementChild as HTMLElement, {
		// configure Swiper to use modules
		modules: getSliderModules( props, availableModules ),
		...( options as SwiperOptions ),
	} );
}

/**
 * The function selects all elements with the class "is-style-slider" and applies the modulrSlider
 * function to each element with the corresponding data.
 */
export function modulrSliderController(): void {
	/**
	 * Slider - default gallery
	 */
	const Sliders: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-slider' );

	Sliders.forEach( ( galleryEl ) =>
		modulrSlider( galleryEl, getSliderData( galleryEl ) )
	);
}
