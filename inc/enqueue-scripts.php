<?php

if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {

		// get the custom colors
		$primary_color = esc_attr(get_theme_mod( 'primary-color' ));
		$secondary_color = esc_attr(get_theme_mod( 'secondary-color' ));
		$header_color = esc_attr(get_theme_mod( 'header-color' ));
		$hero_opacity = intval(get_theme_mod( 'modul_r_hero_opacity' ));
		$header_text_color = get_header_textcolor();

		// get the acf.css file and store into a variable
		ob_start();
		include get_stylesheet_directory() . '/assets/dist/css/atf.css';
		$atf_css = ob_get_clean();

		// if primary color is set apply to chrome address bar else use the default color
		if ($header_color) {
			$atf_css .= 'body .header-color {background-color: ' . $header_color . ';}.has-featured-image.top #masthead {background-color: ' . $header_color . 'dd;}';
			$atf_css .= '@media (max-width: 1023px) {.main-navigation {background-color: ' . modul_r_adjustBrightness($header_color, 0.2) . 'ee;}}';
		} else {
			echo '<meta name="theme-color" content="'. modul_r_adjustBrightness(esc_attr($GLOBALS['modul_r_defaults']['colors']['header']), 0.2 ) .'" />';
		}

		// push the header color into stored style if is present
		if ($header_text_color && $header_text_color != 'blank') {
			$atf_css .= '#masthead a {color:#' . $header_text_color. ';}';
		}

		// push primary and secondary color (if is set) into the stored style
		if ($primary_color) {
			// the primary color css
			$atf_css .= '.has-primary-color,#masthead .site-branding a{color:'.$primary_color.'}.has-primary-background-color{background:'.$primary_color.'}';
			// bold text color css
			$atf_css .= 'body blockquote:before, body b,body strong{color:'.$primary_color.'}';
			// the hamburger color
			$atf_css .= 'body .menu-resp button.c-hamburger i,body .menu-resp button.c-hamburger i::after,body .menu-resp button.c-hamburger i::before {background:' . $primary_color. ';}';
			// home columns title custom color
			$atf_css .= 'body.home .entry-content >.wp-block-columns:first-of-type h2 a{color:'.$primary_color.'!important}';
			// scrollbar color (10% darker)
			$atf_css .= 'body::-webkit-scrollbar-thumb:horizontal,body::-webkit-scrollbar-thumb:vertical,body .slick-dots li.slick-active button{background-color:'. modul_r_adjustBrightness($primary_color, -0.1).'}';
		}

		if ($secondary_color) {
			// the secondary color css
			$atf_css .= '.has-secondary-color{color:'.$secondary_color.'}.has-secondary-background-color{background:'.$secondary_color.'}';
			// button background color css
			$atf_css .= 'body .button:not(.has-text-color),body .entry-content .wp-block-button .wp-block-button__link:not(.has-text-color),body button:not(.has-text-color),body input:not(.has-text-color)[type=button],body input:not(.has-text-color)[type=reset],body input:not(.has-text-color)[type=submit]{background:'.$secondary_color.'}';
			// links text color, breadcrumbs link color
			$atf_css .= 'body a{color:'.$secondary_color.'}';
			// breadcrumbs link color
			$atf_css .= 'body .breadcrumbs a{color:'. modul_r_adjustBrightness($secondary_color, 0.2).'}';
			// quote border color
			$atf_css .= 'body .entry-content .wp-block-quote:not(.is-large),body .entry-content .wp-block-quote:not(.is-style-large){border-left-color:'.$secondary_color.'}';
			// separators border color
			$atf_css .= 'body .wp-block-separator,body hr {border-bottom-color:'.$secondary_color.'}';
		}

		if ($hero_opacity != 100) {
			$atf_css .= 'body.home .website-hero .entry-image img {opacity:'. ($hero_opacity/100) .'}';
		}

		// return the stored style
		if ($atf_css != "" ) {
			echo '<style id="modul-r-inline-css" type="text/css">'. $atf_css . '</style>';
		}

		if ($header_color) {
			echo '<meta name="theme-color" content="' . modul_r_adjustBrightness( $header_color, 0.2 ) . '" />';
		}
	}
endif;
add_action( 'wp_head', 'modul_r_atf_style', 1 );

/**
 * Enqueue admin style
 */
function modul_r_admin_style() {
	wp_register_style( 'modul-r-admin-css', get_template_directory_uri() . '/assets/dist/css/admin.css' );
	wp_enqueue_style( 'modul-r-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'modul_r_admin_style' );

/**
 * Load fonts
 */
if ( ! function_exists( 'modul_r_theme_fonts' ) ) :
	function modul_r_theme_fonts() {
		wp_enqueue_style( 'modul-r-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Material+Icons&display=swap', array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_fonts', 10 );

/**
 * Enqueue main style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', get_stylesheet_uri(), array() );
	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_style', 11 );


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



