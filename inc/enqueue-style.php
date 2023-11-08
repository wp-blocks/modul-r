<?php
/**
 * Outputs the above the fold style as a string
 */
if ( ! function_exists( 'modul_r_atf_css' ) ) :
	function modul_r_atf_css() {
		// get the acf.css file and store into a variable
		ob_start();

		include MODULR_THEME_DIR . '/build/modulr-css-atf.css';

		$atf_css = ob_get_clean();

		if ( ! empty( $atf_css ) ) {
			echo '<style id="modul-r-style-above-the-fold">' . $atf_css . '</style>';
		}
	}
endif;

/**
 * ATF theme style
 */
if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {
		wp_enqueue_style( 'modul-r-style-above-the-fold', MODULR_THEME_URL . '/build/modulr-css-atf.css' );
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
		wp_enqueue_style( 'modul-r-style-admin', MODULR_THEME_URL . '/build/modulr-css-admin.css' );
	}
endif;

/**
 * Enqueue the registered styles
 */
if ( is_admin() ) {
	add_action( 'enqueue_block_assets', 'modul_r_atf_style' );
	add_action( 'enqueue_block_editor_assets', 'modul_r_theme_style' );
} else {
	add_action( 'wp_head', 'modul_r_atf_css' );
	add_action( 'enqueue_block_assets', 'modul_r_theme_style' );
}
