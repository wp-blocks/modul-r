<?php

/**
 * Enqueue main style in footer.
 */
function theme_style() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), null );
}
add_action( 'get_footer', 'theme_style' );


/**
 * Load scripts
 */


function theme_scripts() {

	// Register and Enqueue
	wp_register_script('jquery3', get_template_directory_uri() . '/assets/dist/js/jquery.min.js', null, null, null);
	wp_enqueue_script( 'jquery3' );
	wp_register_script( 'scripts-vendors', get_template_directory_uri() . "/assets/dist/js/vendor-scripts.js" , array('jquery3'), null, true );
	wp_enqueue_script( 'scripts-vendors' );
	wp_register_script( 'scripts-main', get_template_directory_uri() . "/assets/dist/js/scripts.js" , array('jquery3'), null, true );
	wp_enqueue_script( 'scripts-main' );

}
add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Add Theme admin scripts


/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );


/**
 * Registers an editor stylesheet for the theme.
 */
add_theme_support( 'editor-styles' );

function editor_styles() {
	add_editor_style( get_template_directory_uri() . '/editor.css' );
}
add_action( 'admin_init', 'editor_styles' );