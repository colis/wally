import wordpress from '@wordpress/eslint-plugin';

export default [
	...wordpress.configs.recommended,
	{
		rules: {
			'jsdoc/reject-function-type': 0,
			'prettier/prettier': ['error', { endOfLine: 'auto' }],
		},
	},
];
