=== Modul R ===
Contributors: codekraft
Requires at least: 4.9.6
Tested up to: 5.8.2
Requires PHP: 5.6
Stable tag: 1.4.3
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/pools/c/8g9fVFSHkc
Tags: blog, e-commerce, portfolio, one-column, grid-layout, custom-background, custom-header, custom-logo, custom-menu, editor-style, featured-images, full-width-template, block-styles, wide-blocks, sticky-post, threaded-comments, translation-ready

Modul R is a powerful and flexible designed to be a starter theme to hack with a kit of reusable parts and functions with the website speed performance in mind. Modul R brings plenty of customization possibilities thanks to gulp4, it comes with an hi tech with SASS style (with a lot of possible customizations), visibility triggered animations, image parallax, lightbox, slider, grid layout (masonry), category sidebar accordion and many more features!

== Description ==
Modul R is a powerful and flexible theme that provides a fast way to create an awesome website. Modul R brings plenty of customization possibilities thanks to gulp4, it comes with preconfigured SASS style, visibility triggered animations, image parallax, lightbox, slider, grid layout (masonry), category sidebar accordion and many more features!
Modul R also provides a seamless integration with Gutenberg and Woocommerce.

[Demo](https://modul-r.codekraft.it)

= Getting started =
* The customizations are grouped into wordpress customizer under "colors" and "modul-r template customizations"
* Create a menu then assign it into the primary navigation
* In Widget section, under footer widgets you could add a widget. (not needed)
* Create a page then go to settings > reading and select the page as static homepage. (not needed)

= How I could benefit by using this template? =
* It is a simple template with good out of the box performance.
* This template was designed to be developer friendly and can be and can be used as a bootstrap to start a much more complex site. if these are your intentions, please install the child theme you can find on git, below is how to do it and a list of gulp tasks that allow you to modify and recompile in this bundled version

= How install nodejs? =
Run the installer of NodeJS from the link below:
  https://nodejs.org/en/download/
After this step, you can check if NodeJS and NPM were installed with the command:
  node -v && npm -v
if npm is installed you can run:
  npm i

= How run gulp tasks? =
There is some Gulp tasks i've prepared that simplify the development of the website:
  gulp style
Runs (once) the Sass compile task on style.scss, the autoprefixer and then creates the sourcemap.
  gulp scripts
Traspile es6 to javascript (if needed) then uglify (minify), concat (merge all files into one) and creates the sourcemap.
  gulp optimizeThemeImg
Minify images (PNG, JPEG, GIF and SVG) from assets/src/img then copy to assets/dist/img folder. Automatically creates a copy of each file in webp format
  gulp optimizeWPUploads
Minify images (PNG, JPEG, GIF and SVG) from /wp-content/uploads. Automatically creates a copy of each file in webp format
  gulp zipRelease
Zip all theme files into /releases/$version, it can be useful if you want to “package” the theme for upload purpose.
  gulp createPot
Parse all php files into theme folder and generates the pot files for WordPress translations.
  gulp watch
You have to run this command during development, and this command will be your best friend 🙂 It runs a file watcher on sass, scripts, and images folders and when triggered run the needed gulp task. It uses the latest version of gulp which allows these tasks to run in parallel, in order to have very short compilation times.
  gulp build
To finalize the theme… for first run clean and removes all development files. Then compile with a set of options suitable for publication (in watch task instead the compilation speed is privileged and also the css is not minified)
  gulp buildRelease
Same as build task but furthermore removes some unwanted files (Thumbs.db, DS_Store, ...) and zip the template files

= Contribute =
We love your input! We want to make contributing to this project as easy and transparent as possible, whether it's:

* Reporting a bug
* Discussing the current state of the code
* Submitting a fix
* Proposing new features

We use github to host code, to track issues and feature requests, as well as accept pull requests.
By contributing, you agree that your contributions will be licensed under its GPLv2 License.

[github](https://github.com/erikyo/modul-r)

= More questions? =
You can find a [quick start guide here](https://modul-r.codekraft.it/2019/06/theme-setup/)

== Upgrade Notice ==

= 1.4.2 - Dec 7, 2021 =
* if you are using the child theme make sure you have updated the array with the presets ($modul_r_defaults that is in functions.php) of the child theme. In this way you will take advantage of all the new customization possibilities that you find in the customizer -> modul-r options -> typography

= 1.4.1 - Dec 1, 2021 =
* Due recent changes please refresh the customizer data saving them again

= 1.2.0 - Sept 13, 2019 =
* Hudge changes in customizer section...  go and check all the new features. From the sass configuration the variables to set the header and sidebar direction have been removed since they are now changed by the customizer

= 1.1.0 - Aug 22, 2019 =
* Menu name change: set the primary menu to "main-menu"

= 1.0.0 - May 11, 2019 =
* First release

== Changelog ==

= 1.4.3 =
* Renamed filter "modul_r_header_menu"
* Activation notice with some tips to quick start with this theme
* Editor style is closer to frontend
* added a filter to replace the wave shape used for featured image and cover blocks -> add_filter('modul_r_wave_shape_uri', function () { return get_template_directory_uri() . '/inc/images/wave.svg'; });
* Adds 5 new block patterns (3 cards + carousels) and 8 block styles (for cover, media and text and post featured image)

= 1.4.2 =
* Introduced a filter to add custom elements after (or before) the header menu (could be useful for icons etc) -> add_filter('modul_r_header_menu', function ($html) { return $html . 'yomama'; });
* General css style fixes and some improvements to the cards components (check the documentation)
* Fixed the slick control arrows visibility that aren't displayed properly due some recent changes
* A new script to activate/deactivate submenu elements that does not need jQuery
* "Titillium Web" & "Parisienne" font added to font list
* Enable some additional gutenberg functionalities (spacing and padding, custom line height)
* The WooCommerce style now is enqueued only if woo is enabled and if the page template is a woocommerce page template (in short: whatever is needed will be added)

= 1.4.1 =
* gulp task optimizeThemeImg - webp are now generated by appending the ".webp" suffix after the original name (you may need to update your server options)
* fixed a glitch with the color palette and some blocks (background colors were not applied)
* Improvement of button style that now fits better to gutenberg (instead of using border property I use shadow/inset box)
* Custom fonts for titles / improved font loading. In the customizer/modular options/typography do not forget to reload in order to display the font weight for the font you have selected
* Introduced a filter to add some custom css to above the fold style -> add_filter('modul_r_acf_css_style', function($defaults) { return $defaults. '.custom {color:red}'; }, 1, 1 );
* Some cosmetic fix to footer and sidebar css and some elements like tables that weren't aligned properly on mobile devices

= 1.4.0 =
* Redesigned customisation section!
* Completely revised scss style. Now you can customise the font family and various text properties directly from customiser (with on-the-fly preview)

= 1.3.1 =
* sidebar, masonry and post page style enhancements, improved woocommerce integration
* gulp task which converts all images to webp (both those in the theme and those in /uploads/).
* gulp dependencies and tasks updated (babel 7.15 & gulp-sass 5 with the new dart-sass).
* new options in customizer, with selectable hero height, woo-shop options section

= 1.3.0 =
* header icons fix

= 1.2.9 =
* Dependencies update
* More header and footer options like fullwidth - wide - standard width, transparent header on top option, show media links on footer
* Customizable colors for header and footer
* Enhanced above the fold style
* Fix customizer issues
* New default options array (first line of functions.php)
* New way to manage the responsive breakpoint that enables responsive menu on desktops
* Button color enhanced (and customizable)

= 1.2.5 =
* Dependencies update
* Footer style enhancement

= 1.2.4 =
* Main container width fix on small screens
* Other enhancement or style regressions fixes

= 1.2.3 =
* Submenu header color
* Better primary content width

= 1.2.2 =
* Primary container margin glitch fix
* Enhanced featured image, logo & site title centering
* Hamburger menu animation regression fix
* Responsive style enhancement
* Dependencies update
* Customizer hero opacity option
* Custom color scheme reworked

= 1.2.1 =
* Translations and docs update
* Fixed sidebar and hamburger menu style regression
* Theme option header color, better use of the stored color along the theme

= 1.2.0 =
* revisited customizer section with header, footer, sidebar & homepage configuration
* revisited color scheme (lighter and darker version of the primary and secondary + 6 color gradient white to black)

= 1.1.3 =
* cookie style moved to child theme

= 1.1.2 =
* customizer enhancements and fix
* better menu centering
* admin style

= 1.1.1 =
* new tags
* css fixes

= 1.1.0 =
* Dependencies update
* New customizer option "fullpage hero"
* Customized gutenberg theme colors palette
* Some css fix (mainly responsive style, sidebar, homepage etc)

= 1.0.35 =
* customizer Sidebar option

= 1.0.34 =
* better use of custom color (theme colors were applied to buttons, links, bold text etc)

= 1.0.33 =
* removed author uri

= 1.0.32 =
* better sharing function (with escape fix)
* homepage gfx rework (hero size, blocks distances)
* screenshot update
* if woocommerce plugin isn't active, the button in the homepage will show the "contacts" button otherwise it will show
* WordPress guidelines compliance fixes

= 1.0.31 =
* W3C validated
* SASS sidebar configuration

= 1.0.30 =
* accessibility-ready tag removed
* menu keyboard navigation
* accessibility: added a "role" for the main sections
* above the fold style correctly enqueued
* custom theme colors
* new screenshot
* better microdata / header meta enhancement + rss alternate link
* escape translations
* accessibility tab shortcut (from guidelines 2019)
* gulp file update
* svg support moved to child theme
* search form enhancement

= 1.0.11 =
* WooCommerce support

= 1.0.10 =
* Masonry script update to v3
* Complete removal of css4 vars (at the moment there is no gain in using them, there is problems with the fallback and with the sass integration (which however allows you to do many more things such as color operations)
* Editor style
* Gutenberg blocks style enhancement
* Text typography enhancement
* text domain lowercase (and also renamed the git repos)
* Enhancement of child theme compatibility
* Header, navbar, blocks style optimization (added some customizations features for the header)
* Source code optimization & bug correction
* grid layout with masonry for categories
* function name update
* removal of clean.php
* Js scripts init enhancement
* Gulp task who create the zip needed for the theme upload
* Better wordpress customizer integration
* Vendors javascript path fix

= 1.0.0 =
* First release

== TODOS ==
* Provide a better way to select triggered animation, if possible without writing the name class (with a checkbox or similar)
* Rework the gulp file
* Provide more options with the customizer

== Images Screenshot ==
License: CC0 1.0 Universal (CC0 1.0)
Screenshot Image
https://stocksnap.io/photo/architecture-building-108MDATXVH - Photo by Mike Wilson
https://stocksnap.io/photo/camera-lens-FKICMI37XY - Photo by Design by Matt
https://stocksnap.io/photo/classic-analog-BMPFEKYHLH - Photo by Alex Andrews
https://stocksnap.io/photo/wireless-headphones-EXCBJA3FFQ  - Photo by Burst

== Screenshots ==
1. [https://modul-r.codekraft.it/screenshot.png  The homepage layout ]

== Copyright ==
Modul R, Copyright 2019 Codekraft Studio
Modul R is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the LICENSE file for more details.

== Resources ==
* WordPress-logotype-alt-background.jpg https://wordpress.org/about/logos/, © 2010 WordPress Foundation, [policy](https://wordpressfoundation.org/trademark-policy/)
* wapuu-original.png https://github.com/jawordpressorg/wapuu, © 2014 Kazuko Kaneuchi, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* infinite-scroll.js https://infinite-scroll.com/, © 2021 David DeSandro, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* fancybox.js https://fancyapps.com/fancybox/3/, © 2008 - 2019 fancyapps, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* slick.js https://kenwheeler.github.io/slick/, © 2017 Ken Wheeler, [MIT](http://opensource.org/licenses/MIT)
* normalize.css http://necolas.github.io/normalize.css/, © 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* twentynineteen https://www.wordpress.org/themes/twentynineteen/, © 2019 the WordPress team, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Google Fonts - Apache License, version 2.0