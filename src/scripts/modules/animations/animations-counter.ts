import { delay, easeInOutCubic } from './animations-utils';
import type { AnimationsCounterOptions } from './types.d.ts';

/**
 * Check if the current class is a count element
 *
 * @param {string} current - The current class name to be checked.
 */
const isCountClass = ( current: string ): Boolean =>
	current !== 'count__counter' && current.startsWith( 'count__' );

/**
 * Split a sentence into words or letters
 *
 * It takes a sentence and splits it into words, then splits each word into letters
 *
 * @param {string} sentence       - The sentence to be split.
 * @param {string} [splitBy=word] - 'word' or 'letter'
 *
 * @return {string} A string of HTML with the words and letters wrapped in span tags.
 */
export function splitSentence(
	sentence: string,
	splitBy: string = 'word'
): string {
	const words = sentence.split( ' ' );
	const result = words.map( ( word ) => {
		if ( splitBy === 'word' ) {
			return `<span class="word">${ word }</span>`;
		}
		return (
			'<span class="word">' +
			word.replace(
				/([^\x00-\x80]|\w)/g,
				`<span class="letter">$&</span>`
			) +
			'</span>'
		);
	} );
	return result.join( ' ' );
}

/**
 * Get a random letter from a list
 *
 * @param {string[]} letters The list of letters to choose from.
 */
export const getRandomLetter = ( letters: string[] ) => {
	return letters[ Math.floor( Math.random() * letters.length ) ];
};

/**
 * Animate words and numbers.
 * It splits the text into letters, wraps each letter in a span, and then animates each letter.
 *
 * @param {HTMLElement} el               The element that is being animated.
 * @param {Object}      options          The options for the animation.
 * @param               options.delay    The delay before the animation starts
 * @param               options.duration The duration of the animation
 */
export const animateWord = (
	el: HTMLElement,
	options: AnimationsCounterOptions
) => {
	const animateLetter = ( letter: HTMLElement, letters: string[] = [] ) => {
		// get original letter for use later
		const original = letter.innerHTML;

		// get random letters
		const alpha = [
			'!',
			'#',
			'?',
			'=',
			'0',
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
			'E',
			'r',
			'i',
			'k',
			'A',
			'E',
			'I',
			'O',
			'U',
			'W',
			'M',
			'-',
			'%',
			...letters,
		];

		/*
		letter.classList.add( 'changing' ); //change color of letter
		// css
		.letter{
		  &.changing{
			color: lightgray;
		  }
		}*/

		//loop through random letters
		let i = 0;
		const letterInterval = setInterval( () => {
			// Get random letter
			const randomLetter =
				alpha[ Math.floor( Math.random() * alpha.length ) ];
			letter.innerHTML = randomLetter;
			if ( i >= Math.random() * 1000 || randomLetter === original ) {
				// if letter has changed around 10 times then stop
				clearInterval( letterInterval );
				letter.innerHTML = original; // set back to original letter
				//letter.classList.remove( 'changing' ); // reset color
			}
			++i;
		}, 60 );
	};

	const letters = el.querySelectorAll( '.letter' );

	const letterCollection: string[] = Object.values( letters ).map(
		( letter: any ) => letter.innerHTML
	);

	letters.forEach( ( letter: any, index: number ) => {
		//trigger animation for each letter in word
		setTimeout( function () {
			animateLetter( letter, letterCollection );
		}, 100 * index ); //small delay for each letter
	} );
};

/**
 * This function prepares counter items by setting various data attributes based on their class names
 * and default values.
 *
 * @param {HTMLElement[]} items - an array of HTMLElements that represent the counters to be prepared.
 */
export function prepareCounterItems( items: HTMLElement[] ) {
	items.forEach( ( counter ) => {
		counter.dataset.startValue = '0';
		counter.dataset.endValue = counter.innerHTML.trim();
		counter.dataset.delay = '0';
		counter.dataset.duration = '5000';
		counter.dataset.counter = 'true';
		counter.dataset.repeat = 'true'; // TODO: REMOVE THIS
		Object.values( counter.classList ).forEach( ( className: string ) => {
			if ( isCountClass( className ) ) {
				const classData = className.split( '__' );
				switch ( classData[ 1 ] ) {
					case 'letters' || 'words':
						counter.dataset.type = classData[ 1 ];
						break;
					case 'duration':
						counter.dataset.duration = classData[ 2 ] || '5000';
						break;
					case 'delay':
						counter.dataset.delay = classData[ 2 ] || '0';
						break;
				}
			}
		} );
	} );
}

/**
 * It checks if the element has already been animated, and if not, split the content into letters which are self-contained.
 *
 * @param {HTMLElement} el - The text element to be split into letters.
 */
function prepareLetterAnimation( el: HTMLElement ): void {
	if ( ! el.dataset.initialized ) {
		const replaced = splitSentence( el.textContent || '', 'letters' );

		if ( el.innerHTML ) {
			el.innerHTML = replaced;
		}

		el.dataset.initialized = 'true';
	}
}

/**
 * Either animates the number or the text
 *
 * @param {IntersectionObserverEntry} el                 - The element that is being animated.
 * @param {AnimationsCounterOptions}  options
 * @param {string}                    options.type       - 'letters' or 'words'
 * @param {string}                    options.delay      - The delay before the animation starts
 * @param {string}                    options.duration   - The duration of the animation
 * @param {string}                    options.startValue - The starting value
 * @param {string}                    options.endValue   - The ending value
 */
export function textAnimated(
	el: HTMLElement,
	options: AnimationsCounterOptions
) {
	if ( options.type === 'letters' || options.type === 'words' ) {
		prepareLetterAnimation( el );

		delay( Number( options.delay ) || 0 ).then( () =>
			animateWord( el, options )
		);
	} else {
		animateCount( el, options );
	}
}

/**
 * Animate Numbers
 *
 * @param {HTMLElement} el               Element to animate.
 * @param {Object}      props            Options for the animation.
 * @param {string}      props.type
 * @param {string}      props.delay
 * @param               props.duration
 * @param               props.startValue
 * @param               props.endValue
 */
export function animateCount(
	el: HTMLElement,
	props: AnimationsCounterOptions
) {
	const options = {
		...props,
		value: 0,
		duration: Number( props.duration ) || 5000,
		startValue: Number( props.startValue ) || 0,
		endValue: Number( props.endValue ) || 5000,
	};

	const animationStart: number = performance.now();

	el.style.fontVariantNumeric = 'tabular-nums';

	el.innerHTML = options.startValue.toString();

	function stepCount( now: number ) {
		const timecode = now - animationStart;
		if ( timecode > options.duration ) {
			el.innerHTML = options.endValue.toString();
			return;
		}

		// the easing function
		const ease = easeInOutCubic(
			( timecode - options.startValue ) / options.duration
		);

		// the value of the counter
		options.value =
			options.startValue +
			( options.endValue - options.startValue ) * ease;

		// display the value as the element contents
		el.innerHTML = Math.floor( options.value ).toString();

		// loop animate the counter
		requestAnimationFrame( stepCount );
	}

	requestAnimationFrame( stepCount );
}
