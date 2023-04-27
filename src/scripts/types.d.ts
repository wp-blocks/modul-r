declare module 'glightbox';

declare module 'minimasonry';

/* Admin */
type FontWeightsDef = string[];
type FontDef = { [ key: string ]: FontWeightsDef };

/* Window */
declare global {
	interface Window {
		modulrFonts: FontDef;
		modulr: {
			parsedFonts?: FontDef;
			animated?: HTMLElement[] | [];
		};
	}
}
