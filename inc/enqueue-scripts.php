<?php

if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {

		// get the custom colors
		$primary_color = esc_attr(get_theme_mod( 'primary-color' ));
		$secondary_color = esc_attr(get_theme_mod( 'secondary-color' ));

		// get the acf.css file and store into a variable
		ob_start();
		include get_stylesheet_directory() . '/assets/dist/css/atf.css';
		$atf_css = ob_get_clean();

		// if primary color is set apply to chrome address bar else use the default color
		if ($primary_color) {
			echo '<meta name="theme-color" content="'. modul_r_adjustBrightness($primary_color, 0.2 ) .'" />';
		} else {
			echo '<meta name="theme-color" content="#118886" />';
		}

		// push primary and secondary color (if is set) into the stored style
		if ($primary_color) {
			$atf_css .= ".primary-color{color:{$primary_color};}.primary-background{background:{$primary_color};}";
		}
		if ($secondary_color) {
			$atf_css .= ".secondary-color{color:{$secondary_color};}.secondary-background{background:{$secondary_color};}";
		}

		// push the header color into stored style if is present
		$header_color = get_header_textcolor();
		if ($header_color && $header_color != 'blank') {
			$atf_css .= '#masthead .site-branding-container .site-title a.primary-color {color:#' . $header_color. ';}';
		}

		// return the stored style
		if ($atf_css != "" ) {
			echo '<style id="modul-r-inline-css" type="text/css">'. $atf_css . '</style>';
		}
	}
endif;
add_action( 'wp_head', 'modul_r_atf_style', 1 );

/**
 * Load fonts
 */
if ( ! function_exists( 'modul_r_theme_fonts' ) ) :
	function modul_r_theme_fonts() {
		wp_enqueue_style( 'modul-r-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Material+Icons', array(), null );
	}
endif;
add_action( 'get_footer', 'modul_r_theme_fonts', 10 );

/**
 * Enqueue main style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', get_stylesheet_uri(), array() );
	}
endif;
add_action( 'get_footer', 'modul_r_theme_style', 11 );


/**
 * Load scripts
 */
if ( ! function_exists( 'modul_r_theme_scripts' ) ) :
	function modul_r_theme_scripts() {

		// Register and Enqueue
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'modul-r-scripts-vendors', get_template_directory_uri() . "/assets/dist/js/vendor-scripts.js", array( 'jquery' ), false, true );
		wp_enqueue_script( 'modul-r-scripts-vendors' );
		wp_register_script( 'modul-r-scripts-main', get_template_directory_uri() . "/assets/dist/js/scripts.js", array( 'modul-r-scripts-vendors' ), false, true );
		wp_enqueue_script( 'modul-r-scripts-main' );

	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_scripts' ); // Add Theme admin scripts


/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );



