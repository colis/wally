const path = require('path');
const sassFunctions = require('node-sass-json-vars');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const CopyPlugin = require('copy-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const WebpackBar = require('webpackbar');

const isProduction = 'production' === process.env.NODE_ENV;

module.exports = {
	mode: process.env.NODE_ENV,
	entry: {
		style: path.resolve(process.cwd(), './assets/sass/style.scss'),
		'editor-style': path.resolve(
			process.cwd(),
			'./assets/sass/editor-style.scss'
		),
	},
	output: {
		path: path.resolve(process.cwd(), './dist/'),
		filename: 'js/[name].js',
	},
	stats: {
		all: false,
		errors: true,
		modules: true,
		warnings: true,
		assets: true,
		errorDetails: true,
		excludeAssets: /\.(jpe?g|png|gif|svg|ttf|woff|woff2)$/i,
		moduleTrace: true,
		performance: true,
	},
	plugins: [
		new FixStyleOnlyEntriesPlugin(),
		new MiniCssExtractPlugin({
			filename: 'css/[name].css',
			chunkFilename: '[id].css',
		}),
		// Copy static assets to the `dist` folder.
		new CopyPlugin({
			patterns: [
				{
					from: '**/*.{js, jpg,jpeg,png,gif,svg,eot,ttf,woff,woff2}',
					to: '[path][name][ext]',
					context: path.resolve(process.cwd(), './assets/'),
				},
			],
		}),
		new StyleLintPlugin({
			context: path.resolve(process.cwd(), './assets/sass/'),
			files: '**/*.scss',
		}),
		new WebpackBar(),
	],
	module: {
		rules: [
			{
				test: /\.scss$/,
				include: path.resolve(process.cwd(), './assets/sass/'),
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							sourceMap: !isProduction,
							// We copy fonts etc. using CopyWebpackPlugin.
							url: false,
						},
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require('node-sass'),
							sassOptions: {
								functions: sassFunctions,
								sourceMap: !isProduction,
							},
						},
					},
				],
			},
		],
	},
	resolve: {
		extensions: ['.js', '.scss'],
	},
};
