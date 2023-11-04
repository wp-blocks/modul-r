import { SwiperOptions } from 'swiper';

/**
 * This is a TypeScript type definition for the configuration options of a slider container, including
 * selector, container type, number of slides per view, autoplay, spacing, height fitting, keyboard
 * control, fade effect, navigation, pagination, captions animation, and breakpoints.
 *
 * @property {string}                                               selector          - a string representing the CSS selector for the slider container
 *                                                                                    element.
 * @property {'gallery' | 'group' | 'covers' | 'query-loop'}        container         - The `container` property in
 *                                                                                    `SliderContainerConfig` specifies the type of container for the slider. It can be one of the
 *                                                                                    following values: 'gallery', 'group', 'covers', or 'query-loop'. This property determines the layout
 *                                                                                    and behavior of the slider.
 * @property {number | 'auto'}                                      slidesPerView     - The number of slides to display at once in the slider.
 *                                                                                    It can be a number or 'auto' to adjust the number of slides based on the container width.
 * @property {boolean}                                              autoplay          - A boolean value that determines whether the slider should
 *                                                                                    automatically play or not. If set to true, the slider will start playing automatically when the page
 *                                                                                    loads.
 * @property {number}                                               spaceBetween      - The space between each slide in the slider container. It is
 *                                                                                    measured in pixels.
 * @property {boolean}                                              fitHeight         - The `fitHeight` property is a boolean value that determines whether
 *                                                                                    the height of the slider container should be adjusted to fit the height of the tallest slide. If set
 *                                                                                    to `true`, the slider container will have a height equal to the height of the tallest slide. If set
 *                                                                                    to `false`, the
 * @property {boolean}                                              keyboard          - This property determines whether keyboard control is enabled for the
 *                                                                                    slider. If set to true, users can use keyboard arrow keys to navigate through the slides.
 * @property {boolean}                                              fade              - A boolean value that determines whether the slides should fade in and out
 *                                                                                    instead of sliding. If set to true, the slides will fade in and out instead of sliding. If set to
 *                                                                                    false or not provided, the slides will slide normally.
 * @property {boolean}                                              navigation        - A boolean value that determines whether or not to show navigation
 *                                                                                    arrows on the slider. If set to true, the slider will display navigation arrows that allow the user
 *                                                                                    to move between slides. If set to false, the navigation arrows will not be displayed.
 * @property {'bullets' | 'scrollbar' | 'fraction' | 'progressbar'} pagination        - The `pagination`
 *                                                                                    property is used to specify the type of pagination for the slider. It can be set to one of the
 *                                                                                    following values:
 * @property {boolean}                                              captionsAnimation - A boolean value that determines whether or not to animate
 *                                                                                    captions in the slider. If set to true, captions will have an animation effect when transitioning
 *                                                                                    between slides.
 * @property                                                        breakpoints       - An optional property that allows you to define different configurations for
 *                                                                                    the slider at different screen sizes. It should be an object with keys representing the screen sizes
 *                                                                                    and values representing the slider configuration for that screen size. The values should be objects
 *                                                                                    with the same properties as the main SliderContainerConfig type. The breakpoints property
 */
export interface SliderContainerConfig {
	selector: string;
	container: 'gallery' | 'group' | 'covers' | 'query-loop';
	slidesPerView: number | 'auto';
	autoplay?: boolean;
	spaceBetween?: number;
	fitHeight?: boolean;
	keyboard?: boolean;
	fade?: boolean;
	navigation?: boolean;
	pagination?: 'bullets' | 'scrollbar' | 'fraction' | 'progressbar';
	captionsAnimation?: boolean;
	breakpoints?: SwiperOptions[ 'breakpoints' ];
}
