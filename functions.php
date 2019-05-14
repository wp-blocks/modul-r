<?php

//
// PARENT THEME: DON'T EDIT OR YOU'LL GO TO HELL
//


require_once( get_template_directory() . '/inc/clean.php' );
require_once( get_template_directory() . '/inc/theme-setup.php' );
require_once( get_template_directory() . '/inc/sidebar.php' );
require_once( get_template_directory() . '/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/inc/mimetypes.php' );
require_once( get_template_directory() . '/inc/custom-post-type.php' );
require_once( get_template_directory() . '/inc/template-functions.php' );









add_filter('wp_get_attachment_link', 'add_rel');
function add_rel($link) {
	global $post;
	return str_replace('<a href', '<a rel="prettyPhoto[pp_gal]" href', $link);
}