let Ypos = 0;
let lastScroll = 0;
let headerHeight;
let scheduledAnimationFrame;

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

function getSizes() {
	headerHeight = document.getElementById( 'masthead' ).clientHeight;
}

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
