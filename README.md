# ACNN Websites (Main Site and Workshops)
------------------

## Content

Advanced Computational Neuroscience Network (ACNN)

## How do i change the website content?
For content changes (e.g., text content) edit the file in /docs/index.html. If this site is hosted on Github Pages, committing your changes will automatically update the site.

## How do i change the website layout, colors or graphics?
For these types of changes, please open a github issue. This will notify the owner of the repository and start the change process.

## Can i test my changes locally?
Yes. Open a terminal in the root directory of the site, and run
```
npm install  -dev
gulp
```
A browser window should open the site at http://localhost:3000. Any changes to the html content will cause the browser to refresh. To change the settings of the browser-sync preview, visit http://localhost:3001

## I need to work on the code

### Structure
We use Bootstrap 4 and Sass for development. It is compiled into docs/assets/css/styles.css.

The index page can be found in docs/index.html.

### Dependencies

The Node Package Manager (npm) is used to manage dependencies. To install run time dependencies, use the command npm install from the command line. To install development dependencies such as Sass (if used) and Browser-sync, run npm install --dev.

NPM itself depends on having Node.js installed. Using NPM and its packages is entirely optional... the css files transpiled from the Sass files will be included directly in the repository.
