<?php

if ( ! function_exists( 'modul_r_theme_scripts' ) ) :
	/**
	 * Main template scripts
	 */
	function modul_r_theme_scripts() {

		wp_dequeue_script( 'jquery' );

		$asset = include MODULR_THEME_DIR . '/build/modulr-scripts.asset.php';

		/* Register and Enqueue */
		wp_enqueue_script( 'modul-r-scripts', MODULR_THEME_URL . '/build/modulr-scripts.js', $asset['dependencies'], $asset['version'], true );
		wp_enqueue_style( 'modul-r-scripts', MODULR_THEME_URL . '/build/modulr-scripts.css', array(), $asset['version'] );
	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_scripts' ); // Add Theme admin scripts

if ( ! function_exists( 'modul_r_theme_drawer_color' ) ) :
	/**
	 * Add color styling from theme
	 */
	function modul_r_theme_drawer_color() {
		echo '<meta name="theme-color" content="var(--wp--preset--color--primary-dark)" />';
	}
endif;
add_action( 'wp_head', 'modul_r_theme_drawer_color' );

/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}

/**
 * It enqueues a script that is used to add a customizer control to the theme customizer
 */
function modul_r_theme_customize_style() {
	$font_json = file_get_contents( get_template_directory() . '/inc/third-party/fonts.json' );
	wp_enqueue_script( 'modul-r-customizer-script', get_template_directory_uri() . '/build/modulr-script-admin.js' );
	wp_localize_script( 'modul-r-customizer-script', 'modulrFonts', json_decode( $font_json ) );
}
add_action( 'customize_controls_enqueue_scripts', 'modul_r_theme_customize_style', 5 );
