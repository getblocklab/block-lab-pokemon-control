const path = require( 'path' );
const UglifyJSPlugin = require( 'uglifyjs-webpack-plugin' );

const uglifyJSPlugin = new UglifyJSPlugin( {
	uglifyOptions: {
		mangle: {},
		compress: true
	},
	sourceMap: false
} );

module.exports = {
	entry: {
		'./js/scripts': './js/src/index.js',
	},
	output: {
		path: path.resolve( __dirname ),
		filename: '[name].js',
	},
	watch: false,
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
				},
			},
		],
	},
	plugins: [
		uglifyJSPlugin,
	],
};
