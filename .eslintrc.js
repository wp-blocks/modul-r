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
	rules: {
		'arrow-body-style': [ 'error', 'as-needed' ],
		// TypeScript's `noFallthroughCasesInSwitch` option is more robust (#6906)
		'default-case': 'off',
		// 'tsc' already handles this (https://github.com/typescript-eslint/typescript-eslint/issues/291)
		'no-dupe-class-members': 'off',
		// 'tsc' already handles this (https://github.com/typescript-eslint/typescript-eslint/issues/477)
		'no-undef': 'off',
		'@typescript-eslint/no-use-before-define': [
			'warn',
			{
				functions: false,
				classes: false,
				variables: false,
				typedefs: false,
			},
		],
		'no-unused-expressions': 'off',
		'@typescript-eslint/no-unused-expressions': [
			'error',
			{
				allowShortCircuit: true,
				allowTernary: true,
				allowTaggedTemplates: true,
			},
		],
		'no-unused-vars': 'off',
		'@typescript-eslint/no-unused-vars': [
			'warn',
			{
				args: 'none',
				ignoreRestSiblings: true,
			},
		],
		'no-useless-constructor': 'off',
		'@typescript-eslint/no-useless-constructor': 'warn',
	},
};

module.exports = eslintConfig;
