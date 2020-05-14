import path from 'path';
import sassFunctions from 'node-sass-json-vars';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import FixStyleOnlyEntriesPlugin from 'webpack-fix-style-only-entries';
import CopyWebpackPlugin from 'copy-webpack-plugin';
import StyleLintPlugin from 'stylelint-webpack-plugin';
import WebpackBar from 'webpackbar';

const isProduction = 'production' === process.env.NODE_ENV;

export default {
	mode: process.env.NODE_ENV,
	entry: {
		style: path.resolve( process.cwd(), './assets/sass/style.scss' ),
		'editor-style': path.resolve( process.cwd(), './assets/sass/editor-style.scss' ),
	},
	output: {
		path: path.resolve( process.cwd(), './dist/' ),
		filename: 'js/[name].js',
	},
	stats: {
		all: false,
		errors: true,
		maxModules: 0,
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
		new CopyWebpackPlugin( [
			{
				from: '**/*.{js, jpg,jpeg,png,gif,svg,eot,ttf,woff,woff2}',
				to: '[path][name].[ext]',
				context: path.resolve( process.cwd(), './assets/' ),
			},
		] ),
		new StyleLintPlugin( {
			context: path.resolve( process.cwd(), './assets/sass/' ),
			files: '**/*.scss',
		} ),
		new WebpackBar(),
	],
	module: {
		rules: [
			{
				test: /\.scss$/,
				include: path.resolve( process.cwd(), './assets/sass/' ),
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							sourceMap: ! isProduction,
							// We copy fonts etc. using CopyWebpackPlugin.
							url: false,
						},
					},
					{
						loader: 'sass-loader',
						options: {
							sassOptions: {
								functions: sassFunctions,
								sourceMap: ! isProduction,
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
}