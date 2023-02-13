<?php
/**
 * Title: Breadcrumbs
 * Description: a pattern that shows the breadcrumbs using yoast breadcrumbs if available or using a custom function
 * Slug: modul-r/page-breadcrumbs
 * Categories: modul-r
 *
 * @package ModulR
 */

if ( function_exists( 'modul_r_breadcrumbs' ) ) {
	modul_r_breadcrumbs();
}
