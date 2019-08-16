=== Modul R ===
Contributors: Codekraft
Requires at least: 4.9.6
Tested up to: WordPress 5.2
Requires PHP: 5.6
Stable tag: 1.0.35
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/pools/c/8g9fVFSHkc
Tags: blog, e-commerce, portfolio, one-column, grid-layout, custom-background, custom-header, custom-logo, custom-menu, editor-style, featured-images, full-width-template, block-styles, wide-blocks, sticky-post, threaded-comments, translation-ready

Modul R is a powerful and flexible designed to be a starter theme to hack with a kit of reusable parts and functions with the website speed performance in mind. Modul R brings plenty of customization possibilities thanks to gulp4, it comes with an hi tech with SASS style (with a lot of possible customizations), visibility triggered animations, image parallax, lightbox, slider, grid layout (masonry), category sidebar accordion and many more features!

== Description ==
Modul R is a powerful and flexible theme that provides a fast way to create an awesome website. Modul R brings plenty of customization possibilities thanks to gulp4, it comes with preconfigured SASS style, visibility triggered animations, image parallax, lightbox, slider, grid layout (masonry), category sidebar accordion and many more features!

Modul R also provides a seamless integration with Gutemberg and Woocommerce.

[Demo](https://modul-r.codekraft.it)

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
  gulp style
Runs (once) the Sass compile task on style.scss, the autoprefixer and then creates the sourcemap.
  gulp scripts
Traspile es6 to javascript (if needed) then uglify (minify), concat (merge all files into one) and creates the sourcemap.
  gulp watch
You have to run this command during developement, and this command will be your best friend 🙂 It runs a file watcher on sass, scripts, and images folders and when triggered run the needed gulp task. It uses the latest version of gulp which allows these tasks to run in parallel, in order to have very short compilation times.
  gulp imageMinify
Minify images (PNG, JPEG, GIF and SVG) from assets/src/img then copy to assets/dist/img folder.
  gulp clean
Delete unnecessary development files like source maps, thumbnail os files, and ALL the content of assets/dist (you have to compile again sources after this command).
  gulp atf
Runs (once) the Sass task that compile the “above the fold” style (acf.scss)
  gulp zipRelease
Zip all theme files into /releases/$version, it can be useful if you want to “package” the theme for upload purpose.
  gulp createPot
Parse all php files into theme folder and generates the pot files for WordPress translations.
  gulp build
To finalize the theme… for first run clean and removes all development files. Then compile with a set of options suitable for publication (in watch task instead the compilation speed is privileged and also the css is not minified)
  gulp buildRelease
Same as buildAll task but furthermore run the zip task

= Sass variables  / Theme customization =
Edit vars.scss file and recompile the style to customize the aspect of theme, is highly recommended a child theme if you don't want to lose the changes with updates.

    // COLOR VARIABLES
    $color__primary: the main color
    $color__secondary: the secondary color
    $color__black: the darker color
    $color__dark-grey: lighter than $color__black
    $color__light-grey: darker than $color__white
    $color__white: the lighter color

    $color__text: the text color
    $color__text-light: light text color
    $color__nav-background: the header background
    $color__background: website background
    $color__accent: accent color (buttons, links etc)
    $color__woo-accent: woo accent color (same as accent but in the woocommerce context)

    // TEXT VARIABLES
    $text__line-height: texts default line height
    $text__line-height-headline: headlines default line height
    $text__size: texts default font size
    $font__family: texts default font-family
    $font__family-headline: headlines default font-family

    // ANIMATIONS
    $animations__lenght : animations default length

    // MEASURES
    $size__site-width: website width
    $size__side-padding: the content side padding, so content width is equal to "site-width" - "side-padding * 2"

    // DISTANCES
    $size__margin: distance between elements
    $size__padding: distance between sections
    $size__padding-resp: website side padding

    // HEADER
    $head__direction: use "row" or "column". The header layout can be landscape (logo and menu on the same level) or portrait (centered layout with the menu under the logo)
    $size__branding-height: in the column layout set the logo height
    $nav__height: in the column layout set the height of the menu
    $size__branding-logo-ratio: branding height / the logo ratio. might be useful if the logo looks smaller or bigger than required

    // HEADER RESP
    $head__height-responsive: the responsive menu height

    // HAMBURGER MENU
    $hamburger__size: hamburger menu size
    $hamburger__weight: hamburger line weight
    $hamburger__color: hamburger line color

    // SIDEBAR
    $sidebar__width: sidebar width

    // SCROLLBAR
    $scrollbar-line-color: scrollbar color
    $scrollbar-background-color: scrollbar background color

= Paid versions =
There aren't paid/pro versions, this one contains all the features I can add to it. However, I will provide support and updates.

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
= 1.0.0 - May 11, 2019 =
* First release

== Changelog ==

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
* Print style

== Images Screenshot ==
License: CC0 1.0 Universal (CC0 1.0)
Screenshot Image
https://stocksnap.io/photo/7S3EZPGYWY
https://stocksnap.io/photo/KY5UY9H1XI
https://stocksnap.io/photo/4JI0WKCTOR
https://stocksnap.io/photo/UF9ANXUWLL

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
* twentynineteen https://www.wordpress.org/themes/twentynineteen/, © 2019 the WordPress team, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Google Fonts - Apache License, version 2.0