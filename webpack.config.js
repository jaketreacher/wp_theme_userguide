const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')


module.exports = (env, argv) => {
    return {
        entry: './src/js/main.js',
        output: {
            filename: 'bundle.js',
            path: path.resolve(__dirname + (argv.mode !== 'production' ? '/build' : ''))
        },
        devtool: 'source-map',
        module: {
            rules: [{
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "sass-loader"
                ]
            }]
        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: "style.css",
            }),
            new BrowserSyncPlugin({
                  host: 'localhost',
                  port: 3000,
                  proxy: 'http://wordpress.test/'
            })
        ]
    }
};
