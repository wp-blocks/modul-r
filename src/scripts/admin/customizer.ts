import { HTMLElementEvent } from '../../../../../plugins/woocommerce/packages/woocommerce-blocks/assets/js/types';

type FontWeightsDef = string[];
type FontDef = { [ key: string ]: FontWeightsDef };
interface Window {
	modulrFonts: FontDef[];
	modulr: {
		parsedFonts: FontDef[];
	};
}
let parsedFonts: FontDef[] = [];

const selectNamePrefix = '_customize-input-modul_r_';

const fontFamilySelect: { name: string; child: string[] }[] = [
	{
		name: 'typography_font_family_title',
		child: [ 'defaults_title_regular', 'defaults_title_bold' ],
	},
	{
		name: 'typography_font_family_default',
		child: [
			'defaults_default_light',
			'defaults_default_regular',
			'defaults_default_bold',
		],
	},
];

/**
 * It takes a select element and an array of strings, and replaces the select element's options with
 * the strings
 *
 * @param {Element | null} select     - Element | null - The select element to replace the options of.
 * @param {string | any[]} newOptions - This is the new options you want to replace the old ones with.
 */
function replaceSelectOptions( select: Element, newOptions: string | any[] ) {
	while ( select.options.length > 0 ) {
		select.remove( 0 );
	}
	for ( let i = 0; i <= newOptions.length; i++ ) {
		select.add( new Option( newOptions[ i ] ) );
	}
}

window.onload = () => {
	console.log( 'admin ready' );

	/* Checking if the parsedFonts is already available in the window object. If it is, it will use that.
	If it is not, it will parse the fonts and store it in the window object. */
	if ( window?.modulr?.parsedFonts ) {
		parsedFonts = window.modulr.parsedFonts;
	} else {
		window.modulrFonts.forEach( ( font: FontDef ) => {
			parsedFonts[ Object.keys( font )[ 0 ] ] =
				Object.values( font )[ 0 ];
		} );
		window.modulr = {};
		window.modulr.parsedFonts = parsedFonts;
		console.log( 'Available fonts', parsedFonts );
	}

	/* The above code is used to populate the font weight select options based
	on the font family selected. */
	fontFamilySelect.forEach( ( select: { name: string; child: string[] } ) => {
		document
			.querySelector( '#' + selectNamePrefix + select.name )
			?.addEventListener( 'change', ( e ) => {
				// the selected item
				const selected: EventTarget | null = e.target;
				const selectedHtmlID: string | undefined = selected.id;
				// store the selected font available where key is the name and the value is an array of possible font weights
				const selectedFont: string | undefined = selected.value;

				if ( selectedFont ) {
					const availableSet: string[] = parsedFonts[ selectedFont ];

					const fontDefaultseightsSelect = selectedHtmlID.replace(
						selectNamePrefix,
						''
					);

					// Finding the font weight select element that is associated with the font family select element.
					const choosenSubset = fontFamilySelect.find(
						( fontType ) =>
							fontType.name === fontDefaultseightsSelect
					);

					/**
					 * Looping through the font weight select elements and replacing the options with the available font
					 * weights for the selected font family.
					 */
					choosenSubset?.child.forEach(
						( fontWeight: string, index: number ) => {
							const fontWeightSelect = document.querySelector(
								'#' + selectNamePrefix + fontWeight
							);
							if ( fontWeightSelect ) {
								replaceSelectOptions(
									fontWeightSelect,
									availableSet
								);
								console.log( fontWeightSelect );
								fontWeightSelect.value =
									availableSet[
										availableSet > choosenSubset ? index : 0
									];
							}
						}
					);

					console.log(
						'available font weight for %s %s',
						e.target.value,
						parsedFonts[ e.target.value ]
					);
				}
			} );
	} );

	//'sub-accordion-section-modul_r_typography_options'
};
