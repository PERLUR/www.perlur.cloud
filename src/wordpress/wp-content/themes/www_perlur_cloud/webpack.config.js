const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserJSPlugin = require('terser-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const WebpackImagesResizer = require('webpack-images-resizer');

module.exports = {
  entry: './assets/js/index.js',
  optimization: {
    minimizer: [
      new TerserJSPlugin({}),
      new OptimizeCSSAssetsPlugin({})
    ],
  },
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
      patterns: [
        {
          from: './assets/images',
          to: 'images/',
          ignore: ['perlur-logo-full-color.png','perlur-logo-mono-white.png','perlur-logo-mono-green.png'],
        },
      ]
    ),
    new WebpackImagesResizer(
      {
        src: './assets/images/perlur-logo-full-color.png',
        dest: 'images/perlur-logo-full-color_h100px.png'
      },
      {
        height: 100
      }
    ),
    new WebpackImagesResizer(
      {
        src: './assets/images/perlur-logo-mono-white.png',
        dest: 'images/perlur-logo-mono-white_h100px.png'
      },
      {
        height: 100
      }
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
