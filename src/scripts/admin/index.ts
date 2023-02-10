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

/* those are helpers to build the id of the select */
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

function replaceSelectOptions( select: Element | null, newOptions: string | any[] ) {
	while ( select.options.length > 0 ) {
		select.remove( 0 );
	}
	for ( let i = 0; i <= newOptions.length; i++ ) {
		select.add( new Option( newOptions[ i ] ) );
	}
}

window.onload = () => {
	console.log( 'admin ready' );

	if ( window?.modulr?.parsedFonts ) {
		parsedFonts = window.modulr.parsedFonts;
	} else {
		window.modulrFonts.forEach( ( font: FontDef ) => {
			parsedFonts[ Object.keys( font )[ 0 ] ] =
				Object.values( font )[ 0 ];
		} );
		window.modulr = { parsedFonts: [] };
		window.modulr.parsedFonts = parsedFonts;
		console.log( 'Available fonts', parsedFonts );
	}

	fontFamilySelect.forEach( ( select ) => {
		document
			.querySelector( '#' + selectNamePrefix + select.name )
			?.addEventListener( 'change', ( e ) => {
				// the selected item
				const selected: HTMLInputElement = e.target;
				const selectedHtmlID: string = selected?.id;
				// store the selected font available where key is the name and the value is an array of possible font weights
				const selectedFont: string = selected?.value;
				const availableSet: string[] = parsedFonts[ selectedFont ];

				const fontDefaultseightsSelect = selectedHtmlID.replace(
					selectNamePrefix,
					''
				);

				const choosenSubset = fontFamilySelect.find(
					( fontType ) => fontType.name === fontDefaultseightsSelect
				);

				choosenSubset.child.forEach( ( fontWeight, index ) => {
					const fontWeightSelect = document.querySelector(
						'#' + selectNamePrefix + fontWeight
					);
					replaceSelectOptions( fontWeightSelect, availableSet );
					console.log( fontWeightSelect );
					fontWeightSelect.value = availableSet[ index ];
				} );

				console.log(
					'available font weight for %s %s',
					e.target.value,
					parsedFonts[ e.target.value ]
				);
			} );
	} );

	//'sub-accordion-section-modul_r_typography_options'
};
