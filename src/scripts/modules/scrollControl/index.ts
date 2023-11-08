let Ypos: number = 0;
let lastScroll: number = 0;
let scheduledAnimationFrame: boolean;
let args:
	| {
			header: HTMLElement;
			headerBoundingBottom: number;
			topbarHeight: number;
	  }
	| false;

/**
 * If the user is scrolling down, remove the `scrolled` class from the body. If the user is scrolling
 * up, add the `scrolled` class to the body
 */
function scrollCallback() {
	if ( args ) {
		if ( lastScroll > Ypos ) {
			args.header.style.transform = 'translateY(0)';
			document.body.classList.remove( 'scrolled' );
		} else if ( Ypos > args.headerBoundingBottom ) {
			args.header.style.transform = `translateY(-${ args.topbarHeight }px)`;
			document.body.classList.add( 'scrolled' );
		} else {
			args.header.style.transform = 'translateY(0)';
			document.body.classList.remove( 'scrolled' );
		}
	}

	if ( Ypos >= window.innerHeight ) {
		document.body.classList.remove( 'above-the-fold' );
	} else {
		document.body.classList.add( 'above-the-fold' );
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
function updateSizes() {
	// get the header container (both FSE and classic theme)
	const header: HTMLElement | null =
		document.querySelector( 'header.wp-block-template-part' ) ||
		document.getElementById( 'masthead' );
	// the default sizes like
	if ( header ) {
		// apply a css transition if not set
		header.style.transition = '350ms transform';
		// get header lower position (in relation to the top edge of the page)
		const headerBoundingBottom = header.getBoundingClientRect().bottom;
		const topbarHeight =
			header?.querySelector( '.top-bar' )?.clientHeight || 0;
		args = {
			header,
			headerBoundingBottom,
			topbarHeight,
		};
	}
}

/**
 * Adding an event listener to the DOMContentLoaded event.
 */
export function modulrScrollControl(): void {
	updateSizes();
	if ( args ) {
		scrollCallback();

		window.addEventListener(
			'scroll',
			() => window.requestAnimationFrame( onScroll ),
			true
		);

		window.addEventListener(
			'resize',
			() => {
				updateSizes();
				scrollCallback();
			},
			true
		);
	}
}
