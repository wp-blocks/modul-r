<?php

if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {

		// get the custom colors

		// main colors
		$colors = array();
		$colors['primary'] = (get_theme_mod( 'primary-color' ) != '') ? sanitize_hex_color(get_theme_mod( 'primary-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['primary']);
		$colors['primary-light'] = modul_r_adjustBrightness($colors['primary'], 0.4);
		$colors['primary-dark'] = modul_r_adjustBrightness($colors['primary'], -0.4);
		$colors['secondary'] = (get_theme_mod( 'secondary-color' ) != '') ? sanitize_hex_color(get_theme_mod( 'secondary-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['secondary']);
		$colors['secondary-light'] = modul_r_adjustBrightness($colors['secondary'], 0.4);
		$colors['secondary-dark'] = modul_r_adjustBrightness($colors['secondary'], -0.4);
		$colors['white'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white']);
		$colors['white-smoke'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white-smoke']);
		$colors['gray-light'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-light']);
		$colors['gray'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray']);
		$colors['gray-dark'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-dark']);
		$colors['black'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['black']);

		// headers colors
		$header_color = (get_theme_mod( 'header-color' ) != '') ? sanitize_hex_color(get_theme_mod( 'header-color' )) : $GLOBALS['modul_r_defaults']['colors']['header'];
		$hero_opacity = intval(get_theme_mod( 'modul_r_hero_opacity' ));
		$header_text_color = sanitize_hex_color_no_hash(get_header_textcolor());


		// get the acf.css file and store into a variable
		ob_start();
		include get_stylesheet_directory() . '/assets/dist/css/atf.css';
		$atf_css = ob_get_clean();

		// set the custom header color
		$atf_css .= 'body .header-color {background-color: ' . $header_color . ';}.has-featured-image.top #masthead {background-color: ' . $header_color . 'dd;}';
		$atf_css .= '@media (max-width: 1023px) {.main-navigation {background-color: ' . modul_r_adjustBrightness($header_color, 0.2) . 'ee;}}';

		// create the custom colors scheme
		foreach ($colors as $key => $color) {
			$atf_css .= '.has-'.$key.'-color,body .wp-block-button__link.has-'.$key.'-color,.wp-block-pullquote.is-style-solid-color blockquote.has-'.$key.'-color,.wp-block-pullquote.is-style-solid-color blockquote.has-'.$key.'-color p{color:'.$color.'}';
			$atf_css .= '.has-'.$key.'-background-color,.wp-block-button__link.has-'.$key.'-background-color,.wp-block-pullquote.is-style-solid-color.has-'.$key.'-background-color{background:'.$color.'}.has-'.$key.'-background-color:before{background:'.$color.' !important}';
		}

		// push primary and secondary color (if is set) into the stored style
		if ($colors['primary']) {
			// set the primary color for
			$atf_css .= '#masthead .site-branding a {color:'.$colors['primary'].'}';
			// bold text color css
			$atf_css .= 'body blockquote:before,body p b{color:'.$colors['primary'].'}';
			// the hamburger color
			$atf_css .= 'body .menu-resp button.c-hamburger i,body .menu-resp button.c-hamburger i::after,body .menu-resp button.c-hamburger i::before {background:' . $colors['primary']. ';}';
			// selection
			$atf_css .= '::selection {background-color: '.$colors['primary'].'aa !important;}';
			// scrollbar color (10% darker) & slick dots
			$atf_css .= 'body::-webkit-scrollbar-thumb:horizontal,body::-webkit-scrollbar-thumb:vertical,body .slick-dots li.slick-active button{background-color:'. modul_r_adjustBrightness($colors['primary'], -0.1).'}';
		}

		if ($colors['secondary']) {
			// button background color css
			$atf_css .= 'body .button:not(.has-text-color),
			body .entry-content .wp-block-button .wp-block-button__link:not(.has-text-color),body button:not(.has-text-color),body input:not(.has-text-color)[type=button],body input:not(.has-text-color)[type=reset],body input:not(.has-text-color)[type=submit]{background:'.$colors['secondary'].'}';
			// links text color
			$atf_css .= 'body a{color:'.$colors['secondary'].'}';
			// quote border color
			$atf_css .= 'body .entry-content .wp-block-quote:not(.is-large),body .entry-content .wp-block-quote:not(.is-style-large){border-left-color:'.$colors['secondary'].'}';
			// separators border color
			$atf_css .= 'body .wp-block-separator,body hr {border-bottom-color:'.$colors['secondary'].'}';
		}

		// Push the header color into stored style if is present
		if ($header_text_color && $header_text_color != 'blank') {
			$atf_css .= '.main-navigation li a, #masthead .header-wrapper .header-text .site-description {color:#' . $header_text_color. ';}';
		}

		// set the opacity of the customizer
		if ($hero_opacity != 100) {
			$atf_css .= 'body.home .website-hero .entry-image img {opacity:'. ($hero_opacity/100) .'}';
		}

		// Return the stored style
		if ($atf_css != "" ) {
			echo '<style id="modul-r-inline-css" type="text/css">'. $atf_css . '</style>';
		}

		// Apply the header color to chrome bar
		echo '<meta name="theme-color" content="' . modul_r_adjustBrightness( $header_color, 0.2 ) . '" />';

	}
endif;
add_action( 'wp_head', 'modul_r_atf_style', 1 );


if ( ! function_exists( 'modul_r_editor_style' ) ) :
	function modul_r_editor_style() {

		// get the custom colors

		// main colors
		$colors = array();
		$colors['primary'] = (get_theme_mod( 'primary-color' ) != '') ? sanitize_hex_color(get_theme_mod( 'primary-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['primary']);
		$colors['primary-light'] = modul_r_adjustBrightness($colors['primary'], 0.4);
		$colors['primary-dark'] = modul_r_adjustBrightness($colors['primary'], -0.4);
		$colors['secondary'] = (get_theme_mod( 'secondary-color' ) != '') ? sanitize_hex_color(get_theme_mod( 'secondary-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['secondary']);
		$colors['secondary-light'] = modul_r_adjustBrightness($colors['secondary'], 0.4);
		$colors['secondary-dark'] = modul_r_adjustBrightness($colors['secondary'], -0.4);
		$colors['white'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white']);
		$colors['white-smoke'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white-smoke']);
		$colors['gray-light'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-light']);
		$colors['gray'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray']);
		$colors['gray-dark'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-dark']);
		$colors['black'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['black']);

		// get the acf.css file and store into a variable

		$atf_css = '';

		// create the custom colors scheme
		foreach ($colors as $key => $color) {
			$atf_css .= '.editor-styles-wrapper .has-'.$key.'-color,.editor-styles-wrapper .wp-block-pullquote.is-style-solid-color blockquote.has-'.$key.'-color,.editor-styles-wrapper .wp-block-pullquote.is-style-solid-color blockquote.has-'.$key.'-color p{color:'.$color.'}';
			$atf_css .= '.editor-styles-wrapper .has-'.$key.'-background-color,.editor-styles-wrapper .wp-block-pullquote.is-style-solid-color.has-'.$key.'-background-color{background:'.$color.'}.editor-styles-wrapper .editor-styles-wrapper .has-'.$key.'-background-color:before{background:'.$color.' !important}';
		}

		// push primary and secondary color (if is set) into the stored style
		if ($colors['primary']) {
			// bold text color css
			$atf_css .= 'body .editor-styles-wrapper blockquote:before,body .editor-styles-wrapper p b,body .editor-styles-wrapper p strong{color:'.$colors['primary'].'}';
			// scrollbar color (10% darker)
			$atf_css .= '.editor-styles-wrapper ::selection {background-color: '.$colors['primary'].'aa !important;}';
		}

		if ($colors['secondary']) {
			// button background color css
			$atf_css .= 'body .editor-styles-wrapper .button {background:'.$colors['secondary'].'}';
			// links text color
			$atf_css .= 'body .editor-styles-wrapper a{color:'.$colors['secondary'].'}';
			// quote border color
			$atf_css .= 'body .editor-styles-wrapper .wp-block-quote:not(.is-large),body .editor-styles-wrapper .wp-block-quote:not(.is-style-large){border-left-color:'.$colors['secondary'].'}';
			// separators border color
			$atf_css .= 'body .editor-styles-wrapper .wp-block-separator,body .editor-styles-wrapper hr {border-bottom-color:'.$colors['secondary'].'}';
		}

		// Return the stored style
		if ($atf_css != "" ) {
			echo '<style id="modul-r-editor-inline-css" type="text/css">'. $atf_css . '</style>';
		}

	}
endif;
add_action( 'enqueue_block_editor_assets', 'modul_r_editor_style' );


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



