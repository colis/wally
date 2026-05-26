import wordpress from '@wordpress/eslint-plugin';

export default [
	...wordpress.configs.recommended,
	{
		rules: {
			'prettier/prettier': ['error', { endOfLine: 'auto' }],
		},
	},
];
