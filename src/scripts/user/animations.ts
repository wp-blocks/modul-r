import { prepareCounterItems, textAnimated } from './animations-counter';
import { prepareAnimatedItems } from './animation-animated';
import { delay } from './animations-utils';
import { AnimationDataset, AnimationsCounterOptions } from './types';

/**
 * Get the total duration of the animation
 *
 * @param {Object} data          the animation options
 * @param {any}    data.duration the animation duration in milliseconds
 * @param {any}    data.delay    the animation delay in milliseconds
 */
export function getTotalDuration( data: {
	duration: any;
	delay: any;
} ): number {
	return Number( data.duration || 0 ) + Number( data.delay || 0 );
}

/**
 * Remove the animation class from the element after the animation ends
 *
 * @param {HTMLElement} entry          the animation entry
 * @param {Object}      data           the animation options
 * @param {string}      data.animation the animation class
 * @param {number}      data.duration  the animation duration
 * @param {number}      data.delay     the animation delay
 */
export function delayedRemoveClass(
	entry: IntersectionObserverEntry,
	data: { animation: string; duration: number; delay: number }
) {
	delay( getTotalDuration( data ) ).then( () => {
		if ( data.animation ) entry.target.classList.remove( data.animation );
	} );
}

/* Creating a new IntersectionObserver instance. */
const observer = new IntersectionObserver(
	/* The IntersectionObserver callback function. It loops through all the elements that are being
	observed and checks if they are intersecting with the viewport. If they are, it adds the animation
	class to the element and removes it after the animation ends. If they are not intersecting with the
	viewport, and they are animating, it removes the animation class from the element. If the element is
	repeating, and it is intersecting with the viewport, and it is not animating, it adds the animation
	class to the element and adds an event listener to the element that removes the animation class
	when the animation ends. */
	( entries: IntersectionObserverEntry[] ) => {
		entries.forEach( ( entry ) => {
			const currentItem = entry.target as HTMLElement;
			const data = currentItem.dataset as unknown as AnimationDataset;

			// Checking if the element is already animating.
			if ( currentItem.dataset.isAnimating ) {
				return;
			}

			if ( entry.isIntersecting ) {
				/* It checks if the animated element is intersecting with the viewport and if it is not animating and if it
				is not repeating. If it is, it adds the animation class to the element and removes it after the
				animation ends. */
				currentItem.dataset.isAnimating = 'true';

				// if the element is animated with animation
				if ( data.animation !== undefined ) {
					entry.target.classList.add( data.animation );

					delayedRemoveClass( entry, {
						animation: data.animation,
						duration: parseInt( data.duration, 10 ) || 0,
						delay: parseInt( data.delay, 10 ) || 0,
					} );
				} else if ( data.counter ) {
					delay( parseInt( data.delay, 10 ) || 0 ).then( () =>
						textAnimated(
							currentItem,
							data as AnimationsCounterOptions
						)
					);
				}

				delay( getTotalDuration( data ) ).then( () => {
					delete currentItem.dataset.isAnimating;
					if ( ! data.repeat ) observer.unobserve( entry.target );
				} );
			}
		} );
	},
	{
		rootMargin: '-1px',
	}
);

/**
 * It finds all elements with the class `animate__animated` and the 'count__counter' then adds them to an array, then it calls
 * the `prepareAnimatedItems` or the `prepareCounterItems` whenever are an animation or a counter function,
 * then it loops through the array and adds the `data-animation`
 * attribute to each element, then it adds the element to the observer
 */
export function modulrAnimations(): void {
	/* Finding all elements with the class `animate__animated` and adding them to an array. */
	const animateElements: HTMLElement[] = Array.from(
		document.querySelectorAll( '.animate__animated' )
	);

	const counterElements: HTMLElement[] = Array.from(
		document.querySelectorAll( '.count__counter' )
	);

	/* It removes all animate.css classes from the given elements and stores the animation name and
	duration in the element's data attributes */
	prepareAnimatedItems( animateElements );

	prepareCounterItems( counterElements );

	/* Adding the elements to the observer. */
	[ ...animateElements, ...counterElements ].forEach( ( element ) => {
		observer.observe( element );
	} );

	/* Adding the array of animated elements to the window object. */
	( window as any ).modulr = {
		animated: animateElements,
	};
}
