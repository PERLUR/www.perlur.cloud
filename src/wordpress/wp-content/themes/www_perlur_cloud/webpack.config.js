const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
  entry: './assets/js/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'js/bundle.js'
  },
  plugins: [
    new MiniCssExtractPlugin(
      {
        filename: 'css/[name].bundle.css'
      }
    ),
    new CopyWebpackPlugin(
      [
        {
          from: './assets/images',
          to: 'images/',
          test: /^(apple-touch-icon|favicon|mstile)-.*\.png$/,
        },
        {
          from: './assets/images',
          to: 'images/',
          test: /^favicon\.ico$/,
        },
      ]
    )
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader'
            },
            {
              loader: 'sass-loader',
              options: {
                sourceMap: true,
                // options...
              }
            }
        ]
      },
    ]
  },
};