const path = require('path');

module.exports = {
    entry: './src/js/main.js',
    output: {
        filename: './js/scripts.js',
        path: path.resolve(__dirname, 'dist'),
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    "style-loader",
                    "css-loader",
                    {
                        loader: "sass-loader",
                        options: {
                            // Prefer `dart-sass`
                            implementation: require.resolve("sass"),
                        },
                    },
                ],
            },
        ],
    },
};