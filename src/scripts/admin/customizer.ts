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
function replaceSelectOptions(
	select: HTMLSelectElement | null,
	newOptions: string[]
): void {
	if ( select ) {
		while ( select.options.length > 0 ) {
			select.remove( 0 );
		}
		for ( let i = 0; i <= newOptions.length; i++ ) {
			select.add( new Option( newOptions[ i ] ) );
		}
	}
}

function getMiddleFontWeights( fontWeights: string[], count: number ) {
	const midIndex = Math.floor( fontWeights.length / 2 );
	const startIndex = Math.max( midIndex - Math.floor( count / 2 ), 0 );
	const endIndex = Math.min( startIndex + count, fontWeights.length );
	return fontWeights.slice( startIndex, endIndex );
}
const repeatFontWeight = ( str: string, times: number ): string[] =>
	Array.from( { length: times }, () => str );

window.onload = () => {
	parsedFonts = window.modulrFonts;
	window.modulr = {
		parsedFonts: window.modulrFonts || {},
	};

	/* The above code is used to populate the font weight select options based
	on the font family selected. */
	fontFamilySelect.forEach( ( select: { name: string; child: string[] } ) => {
		document
			.querySelector( '#' + selectNamePrefix + select.name )
			?.addEventListener( 'change', ( e ) => {
				// the selected item
				const selected = e.target as HTMLInputElement | null;
				if ( selected ) {
					const selectedHtmlID: string = selected?.id;
					// store the selected font available where key is the name and the value is an array of possible font weights
					const selectedFont: string = selected?.value;
					const availableSet: string[] = parsedFonts[ selectedFont ];

					console.log(
						'Available font weight for %s %s',
						selectedFont,
						availableSet
					);

					const fontDefaultseightsSelect = selectedHtmlID.replace(
						selectNamePrefix,
						''
					);

					// Finding the font weight select element that is associated with the font family select element.
					const choosenSubset = fontFamilySelect.find(
						( fontType ) =>
							fontType.name === fontDefaultseightsSelect
					);

					if ( choosenSubset ) {
						const fontWeights =
							choosenSubset.child.length <= availableSet.length
								? getMiddleFontWeights(
									availableSet,
									choosenSubset.child.length
								)
								: repeatFontWeight(
									availableSet[ 0 ],
									choosenSubset.child.length
								);

						/**
						 * Looping through the font weight select elements and replacing the options with the available font
						 * weights for the selected font family.
						 */
						choosenSubset.child.forEach( ( fontWeight, index ) => {
							const fontWeightSelect: HTMLSelectElement | null =
								document.querySelector(
									'#' + selectNamePrefix + fontWeight
								);

							if ( fontWeightSelect ) {
								replaceSelectOptions(
									fontWeightSelect,
									availableSet
								);

								fontWeightSelect.value = fontWeights[ index ];
							}
						} );
					}
				}
			} );
	} );
};
