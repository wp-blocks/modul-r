// Modul-R theme slider

// import Swiper JS
import { SliderContainerConfig } from './types';
import { SwiperModule, SwiperOptions } from 'swiper/types';

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
	keyboard: true,
	autoplay: true,
	direction: 'horizontal',
	loop: true,
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
): Promise< SwiperModule[] | undefined > {
	const moduleLoad: SwiperModule[] = [];

	if ( options.fade ) {
		moduleLoad.push( modules.fade );
	}

	if ( options.navigation ) {
		moduleLoad.push( modules.navigation );
	}

	if ( options.autoplay ) {
		moduleLoad.push( modules.autoplay );
	}

	if ( options.keyboard ) {
		moduleLoad.push( modules.keyboard );
	}

	if ( options.pagination === 'bullets' ) {
		moduleLoad.push( modules.pagination );
	} else if ( options.pagination === 'scrollbar' ) {
		moduleLoad.push( modules.scrollbar );
	}

	return moduleLoad.length ? moduleLoad : undefined;
}

/**
 * The function returns an object with breakpoints for a slider based on the number of columns.
 *
 * @param {SliderContainerConfig[ 'slidesPerView' ]} columns - The number of slides to show per view in the slider container configuration.
 *
 * @return {SwiperOptions[ 'breakpoints' ]} an object with breakpoints for a Swiper slider. The breakpoints are defined for different
 * screen sizes and the number of slides to be displayed per view. The breakpoints are defined as
 * follows:
 * - For screen sizes less than 480px, display 1 slide per view.
 * - For screen sizes between 480px and 768px, display 2 slides per view.
 * - For screen
 */
function getSliderBreakpoints(
	columns: SliderContainerConfig[ 'slidesPerView' ]
): SwiperOptions[ 'breakpoints' ] {
	return {
		'0': {
			slidesPerView: 1,
		},
		'480': {
			slidesPerView: 2,
		},
		'768': {
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
		pagination: undefined,
		slidesPerView: 1,
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
				sliderData.pagination = undefined;
				sliderData.navigation = undefined;
				break;

			case 'slider-scrollbar' === classname:
				sliderData.pagination = 'scrollbar';
				break;

			case classname.startsWith( 'columns-' ):
				sliderData.slidesPerView =
					Number( classname.replace( 'columns-', '' ) ) || 1;
				break;

			case 'slider-autoplay' === classname:
				sliderData.autoplay = true;
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
 * This function returns a NodeList of all child nodes of an HTML element, including nested child
 * nodes.
 *
 * @param {HTMLElement} el - an HTMLElement that represents the root node from which to start looking
 *                         for deeper nodes.
 * @return {HTMLCollection} an HTMLCollection (if the input element has more than one child element),
 * or recursively calls itself to look for deeper nodes (if the input element has only one child element).
 */
export function getDeepNodeList( el: HTMLElement ): HTMLCollection {
	const deepNodes = el.children;

	if ( deepNodes.length > 1 ) {
		// If the node has more than one child element, return its child nodes as a NodeList
		return deepNodes;
	} else if ( el.children ) {
		// If the node has only one child element, recursively look for deeper nodes
		return getDeepNodeList( el.firstElementChild as HTMLElement );
	}

	// If the node has no child element, return an empty Object
	return {} as HTMLCollection;
}

/**
 * The function creates a slider container using Swiper library based on the provided configuration
 * properties.
 *
 * @param {HTMLElement}           galleryEl     - HTMLElement representing the container element for the
 *                                              slider/gallery.
 * @param {SliderContainerConfig} props         - The `props` parameter is an object that contains
 *                                              configuration options for the slider container. It includes properties such as `slidesPerView`,
 *                                              `spaceBetween`, `container`, `selector`, `pagination`, `navigation`, and more. These properties are
 *                                              used to customize the behavior and appearance of the slider.
 * @param                         Swiper
 * @param                         swiperModules
 * @return {void} If `sliderHTML` is falsy, the function will return nothing (`undefined`). Otherwise, it
 * will prepare the slider container and initialize a new Swiper instance with the provided options and
 * modules.
 */
function modulrSlider(
	galleryEl: HTMLElement,
	props: SliderContainerConfig,
	Swiper,
	swiperModules
): void {
	let sliderHTML;
	let options: SwiperOptions = {
		...defaultSliderOption,
		slidesPerView: props.slidesPerView,
		spaceBetween: props.spaceBetween || 0,
	};

	options = getSliderOptions( options, props );
	if ( ! props.fade ) {
		options.breakpoints = getSliderBreakpoints(
			options.slidesPerView ?? 4
		);
	}

	if ( galleryEl.querySelectorAll( ':scope > .wp-block-cover' ).length ) {
		props.container = 'covers';
		props.selector = '.wp-block-cover';
	}

	switch ( props.container ) {
		// Image/Video Gallery / Query Loop
		case 'gallery':
		case 'query-loop':
			sliderHTML = Object.values( getDeepNodeList( galleryEl ) ).map(
				( el ) => '<div class="swiper-slide">' + el.innerHTML + '</div>'
			);
			break;

		// Groups and rows and the rest
		case 'group':
		case 'covers':
		default:
			sliderHTML = Object.values( getDeepNodeList( galleryEl ) ).map(
				( el ) => {
					el.classList.add( 'swiper-slide' );
					return el.outerHTML;
				}
			);
			break;
	}

	if ( ! sliderHTML ) return;

	/**
	 * The following is a workaround for a bug/limitation in the Swiper library since the number of slides per view
	 * has to be at least the double of the number of slides displayed
	 *
	 * read more here: https://github.com/swiper/swiper/issues/139
	 */
	if ( sliderHTML.length < Number( props.slidesPerView ) * 2 ) {
		sliderHTML = [ ...sliderHTML, ...sliderHTML ];
	}

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
	const swiper = new Swiper.default(
		galleryEl.firstElementChild as HTMLElement,
		{
			// configure Swiper to use modules
			modules: getSliderModules( props, swiperModules ),
			...( options as SwiperOptions ),
		}
	);
}

/**
 * The function selects all elements with the class "is-style-slider" and applies the modulrSlider
 * function to each element with the corresponding data.
 */
export async function modulrSliderController(): Promise< void > {
	/**
	 * Slider - default gallery
	 */
	const Sliders: NodeListOf< HTMLElement > =
		document.querySelectorAll( '.is-style-slider' );

	if ( Sliders.length ) {
		const Swiper = await import( 'swiper' );

		const {
			Autoplay,
			EffectFade,
			Keyboard,
			Navigation,
			Pagination,
			Scrollbar,
		} = await import( 'swiper/modules' );

		const modules = {
			autoplay: Autoplay,
			fade: EffectFade,
			keyboard: Keyboard,
			navigation: Navigation,
			bullets: Pagination,
			scrollbar: Scrollbar,
		};

		Sliders.forEach( ( galleryEl ) =>
			modulrSlider(
				galleryEl,
				getSliderData( galleryEl ),
				Swiper,
				modules
			)
		);
	}
}
