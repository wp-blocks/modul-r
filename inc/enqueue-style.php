<?php

/**
 * Style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		if ( is_admin() ) {
			add_editor_style( get_template_directory_uri() . '/dist/styles/main.css' );
		} else {
			wp_enqueue_style( 'modul-r-style', get_template_directory_uri() . "/dist/styles/main.css" );
		}
	}
endif;

/**
 * Load fonts
 */
if ( ! function_exists( 'modul_r_theme_fonts' ) ) :
	function modul_r_theme_fonts() {

		$font_family[] = get_theme_mod( 'modul_r_typography_font_family_title' ) !== false ? $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][ intval( get_theme_mod( 'modul_r_typography_font_family_title' ) ) ] : $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][0];
		$font_family[] = get_theme_mod( 'modul_r_typography_font_family_text' ) !== false && get_theme_mod( 'modul_r_typography_font_family_title' ) !== get_theme_mod( 'modul_r_typography_font_family_text' ) ? $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][ intval( get_theme_mod( 'modul_r_typography_font_family_text' ) ) ] : $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][0];

		$font_query  = array();
		$font_weight = array();
		foreach ( $GLOBALS['modul_r_defaults']['customizer_options']['font_weight'] as $option ) {
			if ( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) {
				$weight        = $GLOBALS['modul_r_defaults']['customizer_options']['weights'][ intval( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) ];
				$font_weight[intval( $weight )] = intval( $weight );
			}
		}

		if ( ! empty( $font_weight ) && ! empty( $font_family ) ) {

			ksort( $font_weight, SORT_NUMERIC );

			foreach ( $font_family as $font ) {
				$font_query[] = "family=$font:wght@" . implode( ";", $font_weight );
			}
		}

		if ( $font_query ) {
			$font_string = "https://fonts.googleapis.com/css2?" . implode( "&", $font_query ) . "&family=Material+Icons&display=swap";

			// Load fonts from Google.
			wp_enqueue_style( 'modul-r-fonts', wptt_get_webfont_url( $font_string ) );
		}
	}
endif;

/**
 * The above the fold style
 */
if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {

		// get the acf.css file and store into a variable
		ob_start();

		include get_stylesheet_directory() . '/dist/styles/atf.css';

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
		wp_enqueue_style( 'modul-r-admin', get_template_directory_uri() . '/dist/styles/admin.css' );
	}
endif;

function handleStyles() {
	$screen    = get_current_screen();
	if ( $screen && $screen->is_block_editor() ) {

	} else {

	}

	add_action( 'wp_enqueue_scripts', 'modul_r_theme_style', 9 );
	add_action( 'enqueue_block_editor_assets', 'modul_r_theme_style', 9 );

	add_action( 'enqueue_block_assets', 'modul_r_theme_fonts', 1 );

	add_action( 'wp_enqueue_scripts', 'modul_r_atf_style', 1 );
	add_action( 'wp_head', 'modul_r_atf_style', 1 );

	add_action( 'admin_enqueue_scripts', 'modul_r_admin_style', 1 );
};

