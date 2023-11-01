<?php

if ( ! function_exists( 'modul_r_custom_props' ) ) :
	/**
	 * It adds the CSS variables to the admin and front end
	 */
	function modul_r_custom_props() {

		$defaults             = $GLOBALS['modul_r_defaults'];

		$custom_props = '';

		/* Typography */
		foreach ( modul_r_get_fonts() as $type => $font ) {
			$custom_props .= sprintf( "--typography--font--%s: '%s', sans-serif;", $type, $font['name'] );
			foreach ( $font['weights'] as $label => $weight ) {
				$custom_props .= sprintf( '--typography--font--%s--%s: %s;', $type, $label, $weight );
			}
		}

		if ( ! is_admin() ) {
			/* Adding the CSS to the admin and front end. */
			wp_add_inline_style( 'modul-r-style', ':root {' . $custom_props . '}' );
		} else {
			wp_add_inline_style( 'modul-r-style', 'body{' . $custom_props . '}' );
		}
	};
endif;

/**
 * If the font is set in the customizer, return the font, otherwise return Montserrat.
 *
 * @param string $font The name of the font you want to get.
 *
 * @return string The value of the theme mod.
 */
function modul_r_get_font_family( $font ) {
	return ! empty( get_theme_mod( $font ) ) ? get_theme_mod( $font ) : 'Montserrat';
}

/**
 * It replaces spaces with plus signs.
 *
 * @param string $font_name The name of the font you want to use.
 *
 * @return string The font name with spaces replaced by + signs.
 */
function modul_r_get_font_slug( $font_name ) {
	return str_replace( ' ', '+', $font_name );
}

function modul_r_get_font_stylesheet( $fonts ) {
	if ( ! empty( $fonts ) ) {
		$fontset = array();
		foreach ( $fonts as $family ) {
			foreach ( $family['weights'] as $weight ) {
				if ( empty( $fontset[ $family['slug'] ] ) || ! in_array( $weight, $fontset[ $family['slug'] ], true ) ) {
					$fontset[ $family['slug'] ][] = intval( $weight );
				}
			}
		}
		foreach ( $fontset as $slug => $family ) {
			$font_query[] = "family={$slug}:wght@" . implode( ';', $fontset[ $slug ] );
		}

		return 'https://fonts.googleapis.com/css2?' . implode( '&', $font_query ) . '&display=swap';
	}
}

function modul_r_get_fonts() {
	$fonts = array();

	foreach ( array( 'default', 'title' ) as $font_type ) {
		$font_name = modul_r_get_font_family( 'modul_r_typography_font_family_' . $font_type );
		// add to the array the font name and slug (the slug is the name with space replaced with "+").
		$fonts[ $font_type ] = array(
			'name'    => $font_name,
			'slug'    => modul_r_get_font_slug( $font_name ),
			'weights' => array(),
		);

		// then for each font collect the font weight (will remove duplicates).
		$font_families = $GLOBALS['modul_r_defaults']['customizer_options'][ 'font_family_' . $font_type ];
		if ( ! empty( $font_families ) ) {
			foreach ( $font_families as $font_family ) {
				// get the single font weight.
				$stored_value = get_theme_mod( 'modul_r_defaults_' . $font_type . '_' . $font_family['name'] );
				$weight       = ! empty( $stored_value ) ? intval( $stored_value ) : $font_family['default'];
				$fonts[ $font_type ]['weights'][ $font_family['name'] ] = $weight;
			}
		}
	}

	return $fonts;
}

if ( ! function_exists( 'modul_r_theme_fonts' ) ) :
	/**
	 * Load fonts
	 */
	function modul_r_theme_fonts() {

		$fonts = modul_r_get_fonts();

		if ( ! empty( $fonts ) ) {
			$font_stylesheet = modul_r_get_font_stylesheet( $fonts );

			// Load fonts from Google.
			if ( is_admin() ) {
				wp_enqueue_style( 'modul-r-fonts', wptt_get_webfont_url( $font_stylesheet ) );
			} else {
				wp_add_inline_style( 'modul-r-style', wptt_get_webfont_styles( $font_stylesheet ) );
			}
		}
	}
endif;

$hook = is_admin() ? 'enqueue_block_editor_assets' : 'enqueue_block_assets';

/**
 * 🛑 NOTE: since in admin editor styles are enqueued inline the enqueue has to be after the main style
 */
add_action( $hook, 'modul_r_custom_props' );

/**
 * Enqueue Fonts (both frontend and admin area)
 */
add_action( $hook, 'modul_r_theme_fonts' );
