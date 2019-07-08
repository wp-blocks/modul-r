<?php

/**
 * Load fonts
 */
if ( ! function_exists('modul_r_theme_fonts') ) :
	function modul_r_theme_fonts() {
		wp_enqueue_style( 'modul-r-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Material+Icons', array(), null );
	}
endif;
add_action( 'get_footer', 'modul_r_theme_fonts' );

/**
 * Enqueue main style
 */
if ( ! function_exists('modul_r_theme_style') ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', get_stylesheet_uri(), array() );
	}
endif;
add_action( 'get_footer', 'modul_r_theme_style' );

/**
 * Load scripts
 */
if ( ! function_exists('modul_r_theme_scripts') ) :
	function modul_r_theme_scripts() {

		// Register and Enqueue
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'scripts-vendors', get_template_directory_uri() . "/assets/dist/js/vendor-scripts.js" , array('jquery'), false, true );
		wp_enqueue_script( 'scripts-vendors' );
		wp_register_script( 'scripts-main', get_template_directory_uri() . "/assets/dist/js/scripts.js" , array('scripts-vendors'), false, true );
		wp_enqueue_script( 'scripts-main' );

	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_scripts' ); // Add Theme admin scripts



/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );



