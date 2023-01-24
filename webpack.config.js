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
				'assets/src/' + filePath + fileName
			),
		},
		output: {
			path: path.resolve( __dirname, 'assets/dist/' + filePath ),
			filename: fileName,
		},
	};
};

/** js scripts */
const scripts = addModule( 'scripts.js', 'scripts/' );

/** scss styles */
const admin = addModule( 'admin', 'styles/' );
const atf = addModule( 'atf', 'styles/' );
const editor = addModule( 'editor', 'styles/' );
const lateStyle = addModule( 'late-style', 'styles/' );
const style = addModule( 'main', 'styles/' );
const woo = addModule( 'woo', 'styles/' );

module.exports = [ scripts, admin, atf, editor, lateStyle, style, woo ];
