const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

const config = {
	...defaultConfig,
};

module.exports = {
	...defaultConfig,
	entry: {
		/** js scripts */
		'modulr-scripts': path.resolve( process.cwd(), `src/scripts/scripts.ts` ),
		'modulr-script-admin': path.resolve(
			process.cwd(),
			`src/scripts/scripts-admin.ts`
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
		'modulr-css-woo': path.resolve( process.cwd(), `src/styles/woo.ts` ),
	},
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.[tjmc]sx?$/,
				use: [ 'babel-loader' ],
				exclude: /node_modules/,
			},
		],
		...defaultConfig.module,
	},
};
