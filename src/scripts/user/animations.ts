declare global {
	interface Window {
		modulr: {
			animated: HTMLElement[] | [];
		};
	}
}

/* The animation metadata stored into html markup */
type AnimationDataset = {
	animation: string;
	animating?: boolean;
	duration: number;
	repeat?: string;
};

/**
 * If the current class is not 'animate__animated' or 'animate__repeat' and it starts with 'animate__',
 * then return true.
 *
 * @param current - The current class name.
 */
const isAnimateClass = ( current: string ): Boolean =>
	current !== 'animate__animated' &&
	current !== 'animate__repeat' &&
	current.startsWith( 'animate__' );

/**
 * It removes all animate.css classes from the given elements and stores the animation name and
 * duration in the element's data attributes
 *
 * @param items - The array of elements to be animated.
 */
function prepareAnimatedItems( items: HTMLElement[] ) {
	items.forEach( ( animated ) => {
		Object.values( animated.classList ).forEach( ( className: string ) => {
			if ( isAnimateClass( className ) ) {
				animated.classList.remove( className );
				animated.dataset.animation = className;
				animated.dataset.duration =
					getAnimationDuration( animated ).toString();
				animated.dataset.repeat =
					className === 'animate__repeat' ? 'true' : undefined;
			}
		} );
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

			// Checking if the element has the `data-animation` attribute. If it doesn't, return.
			if ( ! data.animation ) {
				return;
			}

			if ( entry.isIntersecting && ! data.animating && ! data.repeat ) {
				/* It checks if the element is intersecting with the viewport and if it is not animating and if it
				is not repeating. If it is, it adds the animation class to the element and removes it after the
				animation ends. */
				data.animating = true;

				if ( data.animation ) {
					entry.target.classList.add( data.animation );
				}

				setTimeout( () => {
					data.animating = undefined;
					entry.target.classList.remove( data.animation );
					observer.unobserve( entry.target );
				}, data.duration );
			} else if (
				/* It checks if the element is not intersecting with the viewport and if it is animating and
				if it is not repeating. If it is, it removes the animation class from the element. */
				! entry.isIntersecting &&
				data.animating &&
				! data.repeat
			) {
				data.animating = undefined;
				entry.target.classList.remove( data.animation );
			} else if (
				/* Checking if the element is repeating and if it is intersecting with the viewport and if it
				is not animating. If it is, it adds the animation class to the element and adds an event
				listener to the element that removes the animation class when the animation ends. */
				data.repeat &&
				entry.isIntersecting &&
				! data.animating
			) {
				data.animating = true;
				entry.target.classList.add( data.animation );

				entry.target.addEventListener(
					'animationend',
					() => {
						data.animating = undefined;
						entry.target.classList.remove( data.animation );
						entry.target.classList.remove( 'animate__repeat' );
					},
					{ once: true }
				);
			}
		} );
	},
	{
		rootMargin: '-1px',
	}
);

/**
 * It returns the total duration of an element's animation in milliseconds
 *
 * @param element - The element to get the animation duration from.
 * @return The total duration of the animation in milliseconds.
 */
const getAnimationDuration = ( element: HTMLElement ): number => {
	const styles = window.getComputedStyle( element );
	const duration =
		parseFloat( styles.getPropertyValue( 'animation-duration' ) ) || 0;
	const delay =
		parseFloat( styles.getPropertyValue( 'animation-delay' ) ) || 0;
	const iterationCount =
		parseInt( styles.getPropertyValue( 'animation-iteration-count' ) ) || 1;

	return ( duration + delay ) * iterationCount * 1000;
};

/**
 * It finds all elements with the class `animate__animated` and adds them to an array, then it calls
 * the `prepareAnimatedItems` function, then it loops through the array and adds the `data-animation`
 * attribute to each element, then it adds the element to the observer
 */
export function modulrAnimations(): void {
	/* Finding all elements with the class `animate__animated` and adding them to an array. */
	const animateElements: HTMLElement[] = Array.from(
		document.querySelectorAll( '.animate__animated' )
	);

	/* It removes all animate.css classes from the given elements and stores the animation name and
	duration in the element's data attributes */
	prepareAnimatedItems( animateElements );

	/* Adding the elements to the observer. */
	animateElements.forEach( ( element ) => {
		const animationClass = element.dataset.animation;

		if ( animationClass ) {
			element.dataset.animation = animationClass;
			element.classList.remove( animationClass );
		}

		observer.observe( element );
	} );

	/* Adding the array of animated elements to the window object. */
	window.modulr = {
		animated: animateElements,
	};
}
