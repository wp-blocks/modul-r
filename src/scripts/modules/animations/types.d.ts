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
