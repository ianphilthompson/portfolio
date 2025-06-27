const path = require('path');
// For extracting CSS into a separate file:
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: './wp-content/themes/ian/assets/js/index.js', // Your main JavaScript entry point
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, './wp-content/themes/ian/dist'), // Output directory
  },
  module: {
    rules: [
      {
        test: /\.js$/, // Rule for JavaScript files
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader', // Example: if using Babel for JS transpilation
        },
      },
      {
        test: /\.scss$/, // Rule for SCSS files
        use: [
          // For injecting into DOM:
          'style-loader',
          // For extracting into a separate file:
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    // For extracting CSS into a separate file:
    new MiniCssExtractPlugin({
       filename: 'bundle.css',
    }),
  ],
};