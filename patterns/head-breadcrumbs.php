<?php
/**
 * Title: Head Title Breadcrumbs
 * Description: a pattern that shows the breadcrumbs using yoast breadcrumbs if available or using a custom function
 * Slug: modul-r/head-title
 * Categories: group, modul-r
 *
 * @package ModulR
 */

namespace ModulR\breadcrumbs;

use function ModulR\Inc\Template_Functions\modul_r_breadcrumbs;

if ( function_exists( 'modul_r_breadcrumbs' ) ) {
	modul_r_breadcrumbs();
}
