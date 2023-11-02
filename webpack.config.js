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

		/** blocks */
		'modulr-blocks-cmt': path.resolve(
			process.cwd(),
			`src/scripts/blocks/custom-media-text.tsx`
		),

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
	},
	optimization: {
		...defaultConfig.optimization,
		splitChunks: {
			cacheGroups: {
				commons: {
					test: /[\\/]node_modules[\\/]/,
					name: 'vendors',
					chunks: 'all',
				},
			},
		},
	},
};
