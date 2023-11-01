<?php


/**
 * The above the fold style
 */
if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {
		// get the acf.css file and store into a variable
		ob_start();

		include get_stylesheet_directory() . '/build/modulr-css-atf.css';

		$atf_css = ob_get_clean();

		if ( ! empty( $atf_css ) ) {
			echo '<style id="modul-r-above-the-fold">' . $atf_css . '</style>';
		}

	}
endif;

/**
 * Main theme style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', get_template_directory_uri() . '/build/modulr-css-main.css' );
	}
endif;

/**
 * Editor style
 */
if ( ! function_exists( 'modul_r_editor_styles' ) ) :

	function modul_r_editor_styles() {
		// I know, there is add_editor_style but doesn't work as expected!
		add_editor_style( get_template_directory_uri() . '/build/modulr-css-editor.css' );
	}
endif;

/**
 * Enqueue Admin style
 * adds some styles for the customizer
 */
if ( ! function_exists( 'modul_r_admin_style' ) ) :
	function modul_r_admin_style() {
		wp_enqueue_style( 'modul-r-admin', get_template_directory_uri() . '/build/modulr-css-admin.css' );
	}
endif;

/**
 * ENQUEUE THE REGISTERED STYLES
 * we need to distinguish between "enqueue_block_editor_assets" and "enqueue_block_assets"
 * because the latter only enqueues in the page header but not into editor iframe
 */

$hook = is_admin() ? 'enqueue_block_editor_assets' : 'enqueue_block_assets';

/**
 * Enqueue editor styles and fonts.
 */
add_action( 'admin_init', 'modul_r_editor_styles' );

/**
 * Admin style
 */
add_action( 'admin_init', 'modul_r_admin_style' );

/**
 * Enqueue the ATF stylesheet in front-end only.
 * this style is not enqueued for admin or site editor
 */
add_action( 'wp_enqueue_scripts', 'modul_r_atf_style' );

/**
 * Theme custom css props / above the fold style
 */
add_action( $hook, 'modul_r_theme_style' );
