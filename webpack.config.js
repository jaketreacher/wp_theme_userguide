const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");


module.exports = (env, argv) => {
    return {
        entry: './src/js/main.js',
        output: {
            filename: 'bundle.js',
            path: path.resolve(__dirname + (argv.mode !== 'production' ? '/build' : ''))
        },
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
            })
        ]
    }
};
