/**
 * Vivus SVG Animation Controller
 * Handles SVG path animations using the Vivus.js library.
 *
 * Target class: .is-style-vivus
 * Options via classes:
 * - vivus-type-{type}: delayed, sync, oneByOne, script, scenario, scenario-sync
 * - vivus-start-{trigger}: inViewport, manual, autostart
 * - vivus-duration-{frames}: integer
 * - vivus-delay-{frames}: integer
 */

import './style.scss';

export async function modulrVivusController(): Promise<void> {
	const svgElements: NodeListOf<HTMLElement> = document.querySelectorAll('.is-style-vivus');

	if (svgElements.length === 0) {
		return;
	}

	const Vivus = await import('vivus');

	svgElements.forEach((el) => {
		// Ensure we are dealing with an SVG or a container containing an SVG
		const targetSVG = el.tagName === 'svg' ? el : el.querySelector('svg');

		if (!targetSVG) {
			console.warn('Vivus: No SVG element found inside', el);
			return;
		}

		const options = getVivusOptions(el);

		// Initialize Vivus
		new Vivus.default(targetSVG, {
			type: options.type || 'delayed',
			duration: options.duration || 200,
			start: options.start || 'inViewport',
			delay: options.delay || 0,
			animTimingFunction: Vivus.default.EASE,
		}, (obj) => {
			// Callback: when animation finishes
			if (el.classList.contains('vivus-fill')) {
				obj.el.classList.add('is-finished');
			}
		});
	});
}

/**
 * Parses element classes to extract Vivus configuration options.
 *
 * @param {HTMLElement} el - The element containing configuration classes.
 * @returns {any} - Configuration object for Vivus.
 */
function getVivusOptions(el: HTMLElement): any {
	const options: any = { type: 'delayed', start: 'inViewport', duration: 200, delay: 0 };
	el.classList.forEach((className) => {
		if (className.startsWith('vivus-type-')) options.type = className.replace('vivus-type-', '');
		if (className.startsWith('vivus-start-')) options.start = className.replace('vivus-start-', '');
		if (className.startsWith('vivus-duration-')) options.duration = parseInt(className.replace('vivus-duration-', ''), 10);
		if (className.startsWith('vivus-delay-')) options.delay = parseInt(className.replace('vivus-delay-', ''), 10);
	});
	return options;
}
