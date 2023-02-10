<?php

/**
 * Main theme style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', get_template_directory_uri() . "/build/modulr-css-main.css" );
	}
endif;

/**
 * The above the fold style
 */
if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {

		// get the acf.css file and store into a variable
		ob_start();

		include get_stylesheet_directory() . '/build/modulr-css-atf.css';

		$atf_css = ob_get_clean();

		// And finally return the stored style
		if ($atf_css != "" ) {
			if (!is_admin()) {
				echo '<style id="modul-r-above-the-fold">'. $atf_css . '</style>';
			} else {
				wp_add_inline_style( "modul-r-style" , $atf_css );
			}
		}
	}
endif;

/**
 * Enqueue Admin style
 * adds some styles for the customizer
 */
if ( ! function_exists( 'modul_r_admin_style' ) ) :
	function modul_r_admin_style() {
		wp_enqueue_style( 'modul-r-admin', get_template_directory_uri() . '/build/modulr-css-main.css' );
	}
endif;

function modul_r_get_font_family($font) {
	return !empty( get_theme_mod( $font ) ) ? get_theme_mod( $font ) : 'Monserrat';
}

function modul_r_get_font_slug($font_name) {
	return str_replace( " ", "+", $font_name );
}

function modul_r_get_fonts() {
	$fonts = array();

	foreach (array('default', 'title') as $font_type) {
		$font_name = modul_r_get_font_family( 'modul_r_typography_font_family_' . $font_type );
		// add to the array the font name and slug (the slug is the name with space replaced with "+")
		$fonts[$font_type] = array(
			"name" => $font_name,
			"slug" => modul_r_get_font_slug($font_name),
			"weights" => array()
		);

		// then for each font collect the font weight (will remove duplicates)
		$font_families = $GLOBALS['modul_r_defaults']['customizer_options']['font_family_' . $font_type];
		if ( !empty($font_families) ) foreach ( $font_families as $font_family ) {
			// get the single font weight
			$weight = intval( get_theme_mod( 'modul_r_defaults_' . $font_type . '_' . $font_family['name'] ) );
			$fonts[$font_type]['weights'][$font_family['name']] = $weight;
		}
	}

	return $fonts;
}

/**
 * Load fonts
 */
if ( ! function_exists( 'modul_r_theme_fonts' ) ) :
	function modul_r_theme_fonts() {

		$fonts = modul_r_get_fonts();


		if ( ! empty( $fonts ) ) {
			foreach ( $fonts as $family ) {
				$weights_collection = array();
				foreach ($family['weights'] as $weight) {
					if ( !in_array($weight, $weights_collection, true ) ) {
						$weights_collection[] = intval($weight);
					}
				}
				$font_query[] = "family={$family['slug']}:wght@" . implode( ";", array_reverse($weights_collection) );
			}
		}

		if ( !empty($font_query) ) {
			$font_string = "https://fonts.googleapis.com/css2?" . implode( "&", $font_query ) . "&family=Material+Icons&display=swap";

			// Load fonts from Google.
			wp_enqueue_style( 'modul-r-fonts', wptt_get_webfont_url( $font_string ) );
		}
	}
endif;

function modul_r_handleStyles() {
	if (function_exists( 'get_current_screen' )) {
		$isBlockEditor = get_current_screen()->is_block_editor();
		if ( $isBlockEditor ) {
			add_action( 'enqueue_block_editor_assets', 'modul_r_theme_style', 9 );
		}
	} else {

	}
	add_action( 'wp_enqueue_scripts', 'modul_r_theme_style', 9 );

	/* fonts */
	add_action( 'enqueue_block_assets', 'modul_r_theme_fonts', 1 );

	/* above the fold style */
	add_action( 'wp_enqueue_scripts', 'modul_r_atf_style', 1 );

	/* admin style */
	add_action( 'admin_enqueue_scripts', 'modul_r_admin_style', 1 );
};
add_action( 'after_setup_theme', 'modul_r_handleStyles', 9 );
