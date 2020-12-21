const path = require("path");
const loader = require("sass-loader");

module.exports = {
  entry: {
    main: "./assets/js/app.js",
    admin: "./assets/js/admin.js",
  },
  output: {
    path: path.resolve(__dirname, "./assets/dist"),
    filename: "[name].bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {
            loader: "style-loader",
          },
          {
            loader: "css-loader",
          },
          {
            loader: "sass-loader",
          },
        ],
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
};
