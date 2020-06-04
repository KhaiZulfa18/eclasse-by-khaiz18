const path = require('path')
const merge = require('webpack-merge')
const common = require('./webpack.common.js')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const TerserJSPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')

module.exports = [
  merge(common, {
    entry: {
      "jquery-spinner": path.resolve(__dirname, '../src/index.js'),
    },
    plugins: [
      new CleanWebpackPlugin({
        cleanAfterEveryBuildPatterns: ['dist']
      })
    ],
    optimization: {
      minimize: false
    }
  }),
  merge(common, {
    entry: {
      "jquery-spinner.min": path.resolve(__dirname, '../src/index.js'),
    },
    optimization: {
      minimizer: [
        new TerserJSPlugin({}),
        new OptimizeCSSAssetsPlugin({}),
      ]
    }
  })
]