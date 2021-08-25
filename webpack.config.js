const path = require( 'path' );

const files = {
	'theme': './src/js/main.js',
	'query': './src/js/query.js',
	'testimonials': './src/js/testimonials.js',
}

module.exports = [
	{
		name: 'general',
		mode: 'development',
		entry: files,
		output: {
			path: path.resolve( __dirname, 'assets/js' ),
			filename: '[name].js',
		},
	},
	{
		name: 'general:build',
		mode: 'production',
		entry: files,
		output: {
			path: path.resolve( __dirname, 'assets/js' ),
			filename: '[name].js',
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					loader: 'babel-loader'
				},
			],
		},
	},
];


