# ACNN Websites (Main Site and Workshops)
------------------

## Content

Advanced Computational Neuroscience Network (ACNN)

## How do i change the website content?
For content changes (e.g., text content) edit the following files:

/docs/index.html (main site)
/docs/workshop-2016.html (workshop)
/docs/workshop-2017.html (workshop)

## How do i make the changes live?
There are two ways:
1. If this site is hosted on Github Pages, committing your changes will automatically update the site.
2. As of 1/30/2017, the second hosting option is still being set up, and will either require FTP or a Git webhook. The procedure for updating these will be documented here. Stay tuned.


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
This repo combines three single-page sites, one of which has separate SCSS/CSS files.

#### The main site
/docs/index.html
/docs/assets-main (Bootstrap 4/SCSS for the main site)

#### The workshop sites
/docs/workshop-2016.html
/docs/workshop-2017.html
/docs/assets-workshops (Bootstrap 4/CSS for the workshops)




### Dependencies

The Node Package Manager (npm) is used to manage dependencies. To install run time dependencies, use the command npm install from the command line. To install development dependencies such as Sass (if used) and Browser-sync, run npm install --dev.

NPM itself depends on having Node.js installed. Using NPM and its packages is entirely optional... the css files transpiled from the Sass files will be included directly in the repository.
