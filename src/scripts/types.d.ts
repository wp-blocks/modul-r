declare module 'glightbox';

declare module 'minimasonry';

declare module 'choices.js';

declare module 'swiper/swiper-bundle.js';

type FontWeightsDef = string[];
type FontDef = { [ key: string ]: FontWeightsDef };

interface Window {
	modulrFonts: FontDef;
	modulr: {
		parsedFonts?: FontDef;
		animated?: HTMLElement[] | [];
	};
}
