/**
 * Pageable Controller (Gutenberg Friendly)
 */

import './style.scss';

export async function modulrPageableController(): Promise<void> {
	const pageableWrapper = document.querySelector('.is-style-pageable') as HTMLElement;

	if (!pageableWrapper) return;

	// 1. Get all direct children (your Cover blocks)
	const slides = Array.from(pageableWrapper.children) as HTMLElement[];

	// 2. Inject 'data-anchor' dynamically! Pageable REQUIRES this to work and build the dots.
	slides.forEach((slide, index) => {
		// We assign an anchor like: slide-1, slide-2, etc.
		slide.setAttribute('data-anchor', `slide-${index + 1}`);

		// Optional: ensure they have the correct full-height class for CSS
		slide.classList.add('pageable-slide');
	});

	const Pageable = await import('pageable');
	const options = getPageableOptions(pageableWrapper);

	// 3. Initialize Pageable
	new Pageable.default(pageableWrapper, {
		childSelector: '[data-anchor]',
		pips: options.pips,
		animation: 300,
		delay: 0,
		orientation: options.orientation || 'vertical',
		onFinish: function() {
			document.body.classList.add('page-swiped');
		}
	});
}

function getPageableOptions(el: HTMLElement): any {
	const options: any = { pips: true, orientation: 'vertical' };
	el.classList.forEach((className) => {
		if (className === 'pageable-no-pips') options.pips = false;
		if (className === 'pageable-horizontal') options.orientation = 'horizontal';
	});
	return options;
}
