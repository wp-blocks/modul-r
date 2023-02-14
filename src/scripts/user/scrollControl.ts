let Ypos = 0;
let lastScroll = 0;
let headerHeight;
let scheduledAnimationFrame;

/**
 * If the user is scrolling down, remove the `scrolled` class from the body. If the user is scrolling
 * up, add the `scrolled` class to the body
 */
function scrollCallback() {
	if ( lastScroll > Ypos ) {
		document.body.classList.remove( 'scrolled' );
	} else if ( Ypos > headerHeight ) {
		document.body.classList.add( 'scrolled' );
	} else {
		document.body.classList.remove( 'scrolled' );
	}

	if ( Ypos < 5 ) {
		document.body.classList.add( 'top' );
	} else {
		document.body.classList.remove( 'top' );
	}

	lastScroll = Ypos;
	scheduledAnimationFrame = false;
}

/**
 * When the user scrolls, store the scroll value, and if there's not already a scheduled animation
 * frame, schedule one and call the scroll callback function.
 *
 * @returns the value of the variable headerHeight.
 */
function onScroll() {
	// Store the scroll value for later.
	Ypos = window.scrollY;

	// Prevent multiple rAF callbacks.
	if ( scheduledAnimationFrame ) {
		return;
	}

	scheduledAnimationFrame = true;
	window.requestAnimationFrame( scrollCallback );
}

/**
 * It gets the height of the header.
 */
function getSizes() {
	headerHeight =
		document.querySelector('header.wp-block-template-part div')
			.clientHeight || document.getElementById( 'masthead' ).clientHeight;
}

/**
 * Adding an event listener to the DOMContentLoaded event.
 */
document.addEventListener( 'DOMContentLoaded', () => {
	getSizes();
	scrollCallback();

	window.addEventListener(
		'scroll',
		() => window.requestAnimationFrame( onScroll ),
		true
	);
	window.addEventListener(
		'resize',
		() => {
			getSizes();
			scrollCallback();
		},
		true
	);
} );
