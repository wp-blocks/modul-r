const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

const config = {
	...defaultConfig,
};

const addModule = ( fileName, filePath ) => {
	return {
		...config,
		name: fileName,
		entry: {
			[ fileName ]: path.resolve(
				__dirname,
				'src/' + filePath + fileName
			),
		},
		output: {
			path: path.resolve( __dirname, 'dist/' + filePath ),
			filename: fileName,
		},
	};
};

/** js scripts */
const scripts = addModule( 'scripts.ts', 'scripts/' );
const adminScripts = addModule( 'admin-scripts.ts', 'styles/' );

/** scss styles */
const admin = addModule( 'admin', 'styles/' );
const atf = addModule( 'atf', 'styles/' );
const editor = addModule( 'editor', 'styles/' );
const style = addModule( 'main', 'styles/' );
const woo = addModule( 'woo', 'styles/' );

module.exports = [ scripts, admin, adminScripts, atf, editor, style, woo ];
