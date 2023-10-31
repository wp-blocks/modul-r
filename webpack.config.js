const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		/** js scripts */
		'modulr-scripts': path.resolve(
			process.cwd(),
			`src/scripts/scripts.ts`
		),
		'modulr-script-admin': path.resolve(
			process.cwd(),
			`src/scripts/scripts-admin.ts`
		),
    'modulr-blocks-cmt': path.resolve( process.cwd(), `src/scripts/blocks/custom-media-text.tsx` ),
    // 'modulr-marquee': path.resolve( process.cwd(), `src/scripts/blocks/paragraph-marquee.tsx` ),

		/** scss styles */
		'modulr-css-admin': path.resolve(
			process.cwd(),
			`src/styles/admin.ts`
		),
		'modulr-css-atf': path.resolve( process.cwd(), `src/styles/atf.ts` ),
		'modulr-css-editor': path.resolve(
			process.cwd(),
			`src/styles/editor.ts`
		),
		'modulr-css-main': path.resolve( process.cwd(), `src/styles/main.ts` ),
		'modulr-css-woo': path.resolve( process.cwd(), `src/styles/woo.ts` ),
	},
};
