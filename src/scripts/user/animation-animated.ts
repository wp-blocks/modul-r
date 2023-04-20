/**
 * If the current class is not 'animate__animated' or 'animate__repeat' and it starts with 'animate__',
 * then return true.
 *
 * @param current - The current class name.
 */
export const isAnimateClass = ( current: string ): Boolean =>
	current !== 'animate__animated' && current.startsWith( 'animate__' );

/**
 * remove the animation class from the given element
 *
 * @param {HTMLElement} element - The element to remove the animation class from.
 */
export const removeAnimationClass = ( element: HTMLElement ) => {
	const animationClass = element.dataset.animation;

	if ( animationClass ) {
		element.classList.remove( animationClass );
	}
};

/**
 * It returns the total duration of an element's animation in milliseconds
 *
 * @param {HTMLElement} element The element to get the animation duration from.
 * @return {number} The total duration of the animation in milliseconds.
 */
export const getAnimationDuration = ( element: HTMLElement ): number => {
	const styles = window.getComputedStyle( element );
	const animationDuration =
		parseFloat( styles.getPropertyValue( 'animation-duration' ) ) || 0;
	const animationDelay =
		parseFloat( styles.getPropertyValue( 'animation-delay' ) ) || 0;
	const iterationCount =
		parseInt( styles.getPropertyValue( 'animation-iteration-count' ) ) || 1;

	return ( animationDuration + animationDelay ) * iterationCount * 1000;
};

/**
 * It removes all animate.css classes from the given elements and stores the animation
 * data (name and duration) in the element's data attributes
 *
 * @param items - The array of elements to be animated.
 */
export function prepareAnimatedItems( items: HTMLElement[] ) {
	items.forEach( ( animated ) => {
		animated.dataset.delay = '0';
		animated.dataset.repeat = 'true'; // TODO: REMOVE THIS

		// get the animation name
		const defaultDuration = getAnimationDuration( animated ).toString();
		animated.dataset.duration = defaultDuration;
		animated.style.animationDelay = defaultDuration;

		// loop through the element classes that are starting with 'animate__'
		Object.values( animated.classList ).forEach( ( className: string ) => {
			if ( isAnimateClass( className ) ) {
				const classdData = className.split( '__' );
				switch ( classdData[ 1 ] ) {
					case 'repeat':
						animated.dataset.repeat = 'true';
						break;
					case 'duration':
						animated.dataset.duration = classdData[ 2 ];
						animated.style.animationDuration =
							parseInt( classdData[ 2 ], 10 ) + 'ms';
						break;
					case 'delay':
						animated.dataset.delay = classdData[ 2 ];
						animated.style.animationDelay =
							parseInt( classdData[ 2 ], 10 ) + 'ms';
						break;
					default:
						if ( ! classdData[ 2 ] ) {
							animated.dataset.animation = className;
						}
						break;
				}
			}
		} );
	} );
}
