/* The animation metadata stored into html markup */
import { SwiperOptions } from 'swiper';

/**
 * The above type defines a dataset for animations with optional properties for animation type,
 * counter, and whether it is currently animating, as well as required properties for duration, delay,
 * repeat, and easing.
 *
 * @property {string} animation   - The name of the animation to be applied to an element. This can be a
 *                                pre-defined animation or a custom animation defined using CSS keyframes.
 * @property {string} counter     - The `counter` property in the `AnimationDataset` type refers to a
 *                                string value that represents the name of a CSS counter that is used in the animation. CSS counters
 *                                are used to increment or decrement numeric values, and can be useful in creating dynamic content or
 *                                numbering systems. In the context of animations
 * @property {string} duration    - The duration property specifies the length of time that an animation
 *                                should take to complete one cycle. It is usually specified in seconds (s) or milliseconds (ms).
 * @property {string} delay       - The `delay` property in the `AnimationDataset` type represents the amount
 *                                of time in milliseconds that should pass before the animation starts. It is used to create a delay
 *                                before the animation begins.
 * @property {string} isAnimating - The "isAnimating" property is a boolean value that indicates
 *                                whether an animation is currently in progress or not. If it is set to true, it means that the
 *                                element is currently being animated. If it is set to false or not present, it means that the element
 *                                is not being animated.
 * @property {string} repeat      - The "repeat" property in the AnimationDataset type refers to the number
 *                                of times the animation should repeat. It can be a number or the value "infinite" to indicate that
 *                                the animation should repeat indefinitely.
 * @property {string} easing      - The `easing` property in the `AnimationDataset` type refers to the type
 *                                of easing function to be used for the animation. Easing functions are used to control the rate of
 *                                change of a value over time, and can be used to create more natural and visually appealing
 *                                animations. Common types of
 */
export type AnimationDataset = {
	animation?: string;
	counter?: string;
	duration: string;
	delay: string;
	isAnimating?: string;
	repeat?: string;
	easing?: string;
};

/**
 * The type `AnimationsCounterOptions` defines the options for an animation counter, including its
 * type, delay, duration, start value, and end value.
 *
 * @property {string} type       - The type of animation to be applied. This could be a CSS animation type
 *                               such as "fade-in" or "slide-out".
 * @property {string} delay      - The delay property specifies the amount of time to wait before starting
 *                               the animation. It is usually specified in seconds or milliseconds.
 * @property {string} duration   - The `duration` property in `AnimationsCounterOptions` is a string that
 *                               represents the length of time that the animation should take to complete. It can be specified in
 *                               various units such as seconds (s), milliseconds (ms), or even in fractional values. This property
 *                               determines how long the animation will run
 * @property {string} startValue - The starting value of the animation. This is the value that the
 *                               animation will begin with before transitioning to the end value.
 * @property {string} endValue   - The value that the animation should end at. For example, if you are
 *                               animating the opacity of an element from 0 to 1, the endValue would be 1.
 */
export type AnimationsCounterOptions = {
	type: string;
	delay: string;
	duration: string;
	startValue: string;
	endValue: string;
};

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
export type SliderContainerConfig = {
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
};

/**
 * The above type defines the properties of a lightbox element, including its href, srcset, and title.
 *
 * @property {string}        href   The href property is a string that represents the URL of the image that
 *                                  will be displayed in the lightbox.
 * @property {string | null} srcset `srcset` is a property that specifies the URL of an image and its
 *                                  corresponding image sizes. It is used to provide multiple versions of an image with different
 *                                  resolutions, so that the browser can choose the most appropriate one based on the device's screen
 *                                  size and resolution. If there is only one version
 * @property {string}        title  The `title` property in the `LIGHTBOX_EL` type represents the title of
 *                                  the image or media element that will be displayed in the lightbox.
 */
export type LIGHTBOX_EL = {
	href: string;
	srcset: string | null;
	title: string;
};
