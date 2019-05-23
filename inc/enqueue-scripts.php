<?php

/**
 * Enqueue main style in footer.
 */
if ( ! function_exists('modu_theme_style') ) :
	function modu_theme_style() {
		wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), null );
	}
endif;
add_action( 'get_footer', 'modu_theme_style' );


/**
 * Load scripts
 */
if ( ! function_exists('modu_theme_scripts') ) :
	function modu_theme_scripts() {

		// Register and Enqueue
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'scripts-vendors', get_template_directory_uri() . "/assets/dist/js/vendor-scripts.js" , array('jquery'), null, true );
		wp_enqueue_script( 'scripts-vendors' );
		wp_register_script( 'scripts-main', get_template_directory_uri() . "/assets/dist/js/scripts.js" , array('jquery'), null, true );
		wp_enqueue_script( 'scripts-main' );

		$masonry_args = array(
			'templateUrl' => get_template_directory_uri(),
			'loading' => __('Loading', 'modul-r' ),
			'end' => __('No more post', 'modul-r' )
		);

		wp_localize_script( 'scripts-main', 'masonry_args', $masonry_args );

	}
endif;
add_action( 'wp_enqueue_scripts', 'modu_theme_scripts' ); // Add Theme admin scripts







/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

/**
 * Add the editor stylesheet
 */
if ( ! function_exists('modu_editor_styles') ) :
	function modu_editor_styles() {
		add_editor_style( get_template_directory_uri() . '/editor.css' );
	}
endif;
add_action( 'admin_init', 'modu_editor_styles' );