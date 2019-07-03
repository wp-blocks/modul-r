=== Modul R ===
Contributors: Codekraft
Requires at least: 4.9.6
Tested up to: WordPress 5.2
Requires PHP: 5.6
Donate link: https://www.paypal.com/pools/c/8g9fVFSHkc
Stable tag: 1.0.22
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, e-commerce, portfolio, one-column, grid-layout, custom-background, custom-header, custom-logo, custom-menu, editor-style, featured-images, full-width-template, block-styles, wide-blocks, sticky-post, threaded-comments, translation-ready

Modul R is a powerful and flexible theme that provides a fast way to create an awesome website, it's designed to be a starter theme to hack, it comes with a kit of reusable parts and functions. Uses the Gulp task runner to automatize boring tasks!

== Description ==
Modul R is a powerful and flexible theme that provides a fast way to create an awesome website. Modul R brings plenty of customization possibilities like a hi tech sass style, automated gulp task, visibility triggered animations, parallax, lightbox, slider and masonry and many more features!

Modul R also provides a seamless integration with Gutemberg and Woocommerce.

== Frequently Asked Questions ==

= Getting started =
* Create a menu then assign it into the primary navigation
* Go to the Widget section, and under the footer widgets box add a widget.
* Create a page then go to settings > reading and select the page as static homepage

= How install node? =
Run the installer of NodeJS from the link below:
  https://nodejs.org/en/download/
After this step, you can check if NodeJS and NPM were installed with the command:
  node -v && npm -v
if npm is installed you can run:
  npm i

= How run gulp tasks? =
There is some Gulp tasks i've prepared that simplify the development of the website:
  gulp clean
Delete unnecessary development files like source maps, thumbnail os files, and ALL the content of assets/dist (you have to compile again sources after this command).
  gulp style
Runs (once) the Sass compile task on style.scss, the autoprefixer and then creates the sourcemap.
  gulp Acf
Runs (once) the Sass compile task on acf.scss then autoprefix
  gulp imageMinify
Minify images (PNG, JPEG, GIF and SVG) from assets/src/img then copy to assets/dist/img folder.
  gulp scripts
Traspile es6 to javascript (if needed) then uglify (a sort of minify), concat (merge all files into one) and creates the sourcemap.
  gulp zipRelease
Zip all theme files into /releases/$version, it can be useful if you want to “package” the theme for upload purpose.
  gulp createPot
Parse all php files into theme folder and generates the pot files for WordPress translations.
  gulp watch
You have to run this command during development, and this command will be your best friend 🙂 It runs a file watcher on sass, scripts, and images folders and when triggered run the needed gulp task. It uses the latest version of gulp which allows these tasks to run in parallel, in order to have very short compilation times.
  gulp buildAll
To finalize the theme… for first run clean and removes all development files. Then compile with a set of options suitable for publication (in watch task instead the compilation speed is privileged and also the css is not minified)
  gulp buildRelease
Same as buildAll task but furthermore run the zip task

= More questions? =
You can find a [quick start guide here](https://modul-r.codekraft.it/2019/06/theme-setup/)

== Upgrade Notice ==
= 1.0.21 - Jul 3, 2019 =
* First release

== Changelog ==

= 1.0.22 =
* Pre-release

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
* A better way to change the primary and secondary color, if possibile with che wp customizer
* Provide a better way to select triggered animation, if possible without writing the name class (with a checkbox or similar)
* Rework sticky post + article author + footer style

== Images Screenshot ==
License: CC0 1.0 Universal (CC0 1.0)
Screenshot Image
https://stocksnap.io/photo/BTGQ0EUZ5Z
https://stocksnap.io/photo/SNX6M0KJ2G
https://stocksnap.io/photo/SFKZHJODOV
https://stocksnap.io/photo/6FOTSJ06WB

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
* infinite-scroll.js https://infinite-scroll.com/, © 2019 David DeSandro, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* fancybox.js https://fancyapps.com/fancybox/3/, © 2008 - 2019 fancyapps, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* slick.js https://kenwheeler.github.io/slick/, © 2017 Ken Wheeler, [MIT](http://opensource.org/licenses/MIT)
* normalize.css http://necolas.github.io/normalize.css/, © 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* twentynineteen https://it.wordpress.org/themes/twentynineteen/, © 2019 the WordPress team, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Google Fonts - Apache License, version 2.0