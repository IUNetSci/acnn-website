# Website for ACNN
------------------

## Content

Advanced Computational Neuroscience Network (ACNN)

It is recommended that users open [an issue](https://github.com/IUNetSci/acnn-website/issues) to suggest content changes or report errors.

Content can be edited directly in `/site/index.html`.

## Development

We use Bootstrap 4 and Sass for development.  It is compiled into `site/assets/css/styles.css`.

Index page can be found in `site/index.html`.

### NPM

The Node Package Manager (npm) is used to manage dependencies.  To install run time dependencies, use the command `npm install` from the command line.  To install development dependencies such as Sass and Harp, run `npm install --dev`.

NPM itself depends on having Node.js installed.  Using NPM and its packages is entirely optional... the css files transpiled from the Sass files will be included directly in the repository.

### Harp

Harp is an NPM package that lets you run a microserver that automatically parses and transpiles scss files.

To run harp, after installing the npm development packages, run the following command at the command line: `./harp server site`.  The site will then be viewable at `http://localhost:9000`.
