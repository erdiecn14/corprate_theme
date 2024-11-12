Stratford Partners
===

* Based on Real Realty
* Style with Sass
* Build with Webpack

Installation
---------------

### Requirements

`Stratford Partners` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- Advanced Custom Fields Pro
- Gravity Forms

### Setup

To start using all the tools that come with `Stratford Partners`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

## Organization

inc/
- custom post type setup
- custom fields setup
- custom nav walkers
- template tags
- helper functions
- shortcodes

page-templates/
- page specific templates

template-parts/
- page content
- social links
- sidebars

template-parts/section-templates/
- templates for acf flexible content > sections 
template-parts/layout-templates/
- templates for acf flexible content > layouts 
template-parts/component-templates/
- templates for acf flexible content > components 
template-parts/media-types/
- sub templates for different media types to be used in components
template-parts/svg/
- theme specific svg files


public/
- **DO NOT** edit these files, they're generated

src/
- development files for JS, CSS, fonts, and theme specific images
- JS libraries that are not imported via npm

src/sass/main.scss 
- sass imports
- CSS custom properties
	- `FS` for font sizing
	- `PAD` for basic padding/margin spacing
	- `space` for more fine tuned spacing
	- **Make all changes to `FS`, `PAD` and `space` properties using [Utopia](https://utopia.fyi/)** to keep the scale uniform and rename the generated classes to the names we use.
		- `PAD` and `FS` use the Type tool.
		- `space` uses the Space tool.  
	- `COLOR` for theme colors
	- misc properties for theme axioms
	
src/sass/_typesetting.scss 
- typography axioms
src/sass/_page-overrides.scss
- page specific styles, typically targeting a class on a page template
src/sass/_util.scss
- utility classes (each class should only do 1 thing)
src/sass/_fonts.scss 
- **@font-face** rules (if not using typekit for everything)
src/sass/_layout-primitives.scss
- classes and class combos for common general purpose layout patterns

admin/
- WP admin view JS and CSS
- no build step for these files

NOTE: post archive templates should go in the theme root 

### Front End

All front end development files are in src/.

- **JS:** `main-dev.js` is the entry point. Include any required JS files in here. Break up funcitonality into separate files to keep things tidy.
- **SCSS:** `main.scss` is the entry point. Include any required scss files in here. The theme comes with slick theme and MFP scss already included
- **Fonts:** save any required fonts in src/assets/fonts/. Webpack will copy them to the public/ folder when you build.
- **Images:** save any required theme images (like icons) in src/assets/images/. Webpack will copy them to the public/ folder when you build.
- **Third Party Code:** save any third party libraries to src/lib/.
  - third party JS will need to be imported into `main-dev.js`
  - third party CSS will need to be included in `main.scss`
  - Webpack will copy any third party fonts and images to public/

### Available CLI commands

`Stratford Partners` comes with the following CLI commands :

- `npm run build` : bundle all JS to public/js/main.min.js, compile sass to public/css/main.min.css, copy assets and lib images to public/
- `npm run watch` : watch files and bundle all JS to public/js, compile sass to public/css, copy assets to public/ 
- `npm run watch-sass` : watch sass files as they change and compile to public/css/main.min.css
- `npm run build-sass` : compile sass to public/css/main.min.css

