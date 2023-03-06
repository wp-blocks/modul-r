/**
 * Set WordPress presets
 */

const eslintConfig = {
	extends: [ 'plugin:@wordpress/eslint-plugin/recommended' ],
};

eslintConfig.parserOptions = {
	ecmaVersion: 6,
	env: {
		jest: true,
		es6: true,
	},
	babelOptions: {
		presets: [
			'@wordpress/babel-preset-default',
			'@babel/preset-typescript',
		],
	},
};

module.exports = eslintConfig;
