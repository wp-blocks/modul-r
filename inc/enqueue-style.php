<?php
/**
 * Outputs the above the fold style as a string
 */
if ( ! function_exists( 'modul_r_atf_css' ) ) :
	function modul_r_atf_css() {
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
 * ATF theme style
 */
if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {
		wp_enqueue_style( 'modul-r-above-the-fold', MODULR_THEME_URL . '/build/modulr-css-atf.css' );
	}
endif;

/**
 * Main theme style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', MODULR_THEME_URL . '/build/modulr-css-main.css' );
	}
endif;

/**
 * Enqueue Admin style
 * adds some styles for the customizer
 */
if ( ! function_exists( 'modul_r_admin_style' ) ) :
	function modul_r_admin_style() {
		wp_enqueue_style( 'modul-r-admin', MODULR_THEME_URL . '/build/modulr-css-admin.css' );
	}
endif;

/**
 * ENQUEUE THE REGISTERED STYLES
 * we need to distinguish between "enqueue_block_editor_assets" and "enqueue_block_assets"
 * because the latter only enqueues in the page header but not into editor iframe
 */

$hook = is_admin() ? 'enqueue_block_editor_assets' : 'enqueue_block_assets';

/**
 * Enqueue the ATF stylesheet in front-end only.
 * this style is not enqueued for admin or site editor
 */
if ( is_admin() ) {
	add_action( 'enqueue_block_assets', 'modul_r_atf_style' );
} else {
	add_action( 'wp_head', 'modul_r_atf_css' );
}

/**
 * Theme custom css props / above the fold style
 */
add_action( $hook, 'modul_r_theme_style' );
