<?php

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Load admin scripts
 */
function theme_admin_scripts() {

	wp_deregister_script('jquery');

	// Register and Enqueue
	wp_register_script('jquery', get_template_directory_uri() . '/assets/dist/js/jquery.min.js', null, null, null);
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'scripts-main', get_template_directory_uri() . "/assets/dist/js/scripts.js" , array('jquery'), null, true );
	wp_enqueue_script( 'scripts-main' );
	wp_register_script( 'scripts-vendors', get_template_directory_uri() . "/assets/dist/js/vendor-scripts.js" , array('jquery'), null, true );
	wp_enqueue_script( 'scripts-vendors' );

}
add_action( 'wp_enqueue_scripts', 'theme_admin_scripts' ); // Add Theme admin scripts




/**
 * Registers an editor stylesheet for the theme.
 */
add_theme_support( 'editor-styles' );

function editor_styles() {
	add_editor_style( get_template_directory_uri() . '/editor.css' );
}
add_action( 'admin_init', 'editor_styles' );