# React WordPress Plugin Boilerplate

The goal of this project is to provide a boilerplate for writing a WordPress plugin using React. The project uses TailwindCSS, Webpack, and Babel, and allows you to run the project in development and production modes. The tests in the project help you to ensure that the project is bug-free.

## Setup

To setup the project, run the following command:

```
npm install
```

or

```
yarn
```

## Running

To run the project, run the following command:

for npm:

```
npm run dev:npm
```

for yarn:

```
yarn dev:yarn
```

This command will run the project in development mode and watch for changes.

## Production

To build the project in production mode, run the following command:

```
npm run build
```

or

```
yarn build
```

This command will build the project in production mode and save it to the `dist` folder.

## WordPress

To use the plugin in WordPress, run the following command:

```
npm run zip
```

or

```
yarn zip
```

This command will build the project in production mode and save it to the `dist` folder. It will then zip the contents of the `dist` folder into a zip file that can be uploaded to WordPress.

## Author

This project was created by Baran Özdemir.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
