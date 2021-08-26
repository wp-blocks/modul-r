<?php

if ( ! function_exists( 'modul_r_atf_style' ) ) :
	function modul_r_atf_style() {

		// get the custom colors

		// Main colors
		$colors = array();
		$colors['primary'] = get_theme_mod( 'primary-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'primary-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['primary']);
		$colors['primary-light'] = modul_r_adjustBrightness($colors['primary'], 0.4);
		$colors['primary-dark'] = modul_r_adjustBrightness($colors['primary'], -0.4);
		$colors['secondary'] = get_theme_mod( 'secondary-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'secondary-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['secondary']);
		$colors['secondary-light'] = modul_r_adjustBrightness($colors['secondary'], 0.4);
		$colors['secondary-dark'] = modul_r_adjustBrightness($colors['secondary'], -0.4);
		// base colors
		$colors['white'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white']);
		$colors['white-smoke'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white-smoke']);
		$colors['gray-light'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-light']);
		$colors['gray'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray']);
		$colors['gray-dark'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-dark']);
		$colors['black'] = sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['black']);

		// Typography colors
		$title_color = get_theme_mod( 'title-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'title-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['title-color']]);
		$text_color = get_theme_mod( 'text-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'text-color' )) : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['text-color']]);

		// Colors
        $header_color = get_theme_mod( 'header-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'header-color' )) : $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-color']];
		$header_title_color = get_theme_mod( 'header_textcolor', get_theme_support( 'custom-header', 'default-text-color' ) ) ? '#'.get_header_textcolor() : $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-title-color']];
		$header_text_color = get_theme_mod( 'header-text-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'header-text-color' ))  : $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-text-color']];
		$footer_color = get_theme_mod( 'footer-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'footer-color' )) : $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['footer-color']];
		$footer_bottom_color = get_theme_mod( 'footer-bottom-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'footer-bottom-color' )) : $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['footer-bottom-color']];
		$footer_text_color = get_theme_mod( 'footer-text-color' ) !== false ? sanitize_hex_color(get_theme_mod( 'footer-text-color' )) : $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['footer-text-color']];

		// get the acf.css file and store into a variable
		ob_start();
		$atf_css = "";

		// TYPOGRAPHY
		$atf_css .= '.entry-title, .has-title-color {color: ' . $title_color . ';}';
		$atf_css .= 'p, a, li, .has-text-color {color: ' . $text_color . ';}';

		// HEADER
		// set the header color
		$atf_css .= 'body .header-color, body.has-featured-image.top #masthead.active {background-color: ' . $header_color . ';} .has-featured-image.top #masthead {background-color: ' . $header_color . 'dd;}';

		// On top of the screen set the opacity to 0
		if (get_theme_mod( 'modul_r_header_opacity' ) > 0){
			$atf_css .= 'body.has-featured-image.top #masthead {background-color: ' . $header_color . '00;}';
		} else {
			// if has a featured image and is at the top of the page....has-featured-image.top
			$atf_css .= 'body.has-featured-image.top #masthead {background-color: ' . $header_color . 'dd;}';
		}

		// Set the responsive header opacity
		$atf_css .= '@media (max-width: 960px) {body .main-navigation {background-color: ' . modul_r_adjustBrightness($header_color, 0.2) . 'ee;}}';

		// Set the nav background colors
		$atf_css .= 'body ul.sub-menu {background-color: ' . modul_r_adjustBrightness($header_color, 0.1) . ';}';
		$atf_css .= 'body.has-featured-image.top #masthead ul.sub-menu {background-color: ' . $header_color . 'cc;}';
		$atf_css .= 'body ul.sub-menu ul.sub-menu {background-color: ' . modul_r_adjustBrightness($header_color, 0.2) . ';}';
		$atf_css .= 'body ul.sub-menu li:hover {background-color: ' . modul_r_adjustBrightness($header_color, 0.3) . ';}';

        // Set header title color
        $atf_css .= '.has-header-text h1 a {color:' . $header_title_color. ';}';

        // Set header text and links color
        $atf_css .= '.main-navigation li a, #masthead .header-wrapper .header-text .site-description, .has-header-text-color {color:' . $header_text_color. ';}';
        $atf_css .= '.has-header-text-background-color {background-color:' . $header_text_color. ';}';
		$atf_css .= '.has-header-text-background-border-color {border-color:' . $header_text_color. '66 !important;}';

		// the hamburger color
		$atf_css .= 'body .menu-resp button.c-hamburger i,body .menu-resp button.c-hamburger i::after,body .menu-resp button.c-hamburger i::before {background:' . $header_text_color. ';}';

		// FOOTER
		// set the footer color
		$atf_css .= '.has-footer-color {background-color: ' . $footer_color . ';}';
		// set the bottom footer color
		$atf_css .= '.has-footer-bottom-color {background-color: ' . $footer_bottom_color . ';}';
		// set the bottom text color
		$atf_css .= '.site-footer h1, .site-footer h2, .site-footer h4,.site-footer .widget-title {color: ' . $footer_text_color . ';}';
		$atf_css .= '.site-footer .widget-title {border-bottom: 1px solid ' . $footer_text_color . 'dd;}';
		$atf_css .= '.has-footer-text-color, .site-footer a, .site-footer b, .site-footer li, .site-footer p {color: ' . $footer_text_color . 'dd;}';

		// create the custom colors scheme
		foreach ($colors as $key => $color) {
			$atf_css .= '.has-'.$key.'-color,body .wp-block-button__link.has-'.$key.'-color,.wp-block-pullquote.is-style-solid-color blockquote.has-'.$key.'-color,.wp-block-pullquote.is-style-solid-color blockquote.has-'.$key.'-color p{color:'.$color.'}';
			$atf_css .= '.has-'.$key.'-background-color,.wp-block-button__link.has-'.$key.'-background-color,.wp-block-pullquote.is-style-solid-color.has-'.$key.'-background-color{background:'.$color.'}.has-'.$key.'-background-color:before{background:'.$color.' !important}';
		}

		// push primary and secondary color (if is set) into the stored style
		if ($colors['primary']) {
			// color related style
			$atf_css .= '.has-primary-color{color:'.$colors['primary'].'}.has-primary-background-color{color:'.$colors['primary'].'}';
			// bold text color css
			$atf_css .= 'body blockquote:before{color:'.$colors['primary'].'}';
			// selection
			$atf_css .= '::selection {background-color: '.$colors['primary'].'aa !important;}';
			// slick dots
			$atf_css .= 'body .slick-dots li.slick-active button{background-color:'. modul_r_adjustBrightness($colors['primary'], -0.1).'}';
		}

		if ($colors['secondary']) {
			// color related style
			$atf_css .= '.has-secondary-color{color:'.$colors['secondary'].'}.has-secondary-background-color{color:'.$colors['secondary'].'}';
			// button background color css
			$atf_css .= 'body .button:not(.has-text-color),body .entry-content .wp-block-button .wp-block-button__link:not(.has-text-color),body button:not(.has-text-color),body input:not(.has-text-color)[type=button],body input:not(.has-text-color)[type=reset],body input:not(.has-text-color)[type=submit]{background-color:'.$colors['secondary'].'}';
			$atf_css .= 'input.outline[type="submit"], input.outline[type="button"], input.outline[type="reset"], button.outline, .outline.button, .entry-content .wp-block-button .outline.wp-block-button__link {border: 2px solid '.$colors['secondary'].'; color:'.$colors['secondary'].'}';
			// links text color
			$atf_css .= 'body a{color:'.$colors['secondary'].'}';
			// quote border color
			$atf_css .= 'body .entry-content .wp-block-quote:not(.is-large),body .entry-content .wp-block-quote:not(.is-style-large){border-left-color:'.$colors['secondary'].'}';
			// separators border color
			$atf_css .= 'body .wp-block-separator,body hr {border-bottom-color:'.$colors['secondary'].'}';
		}

		// SCROLLBAR
		// scrollbar color (10% darker) & slick dots
		$atf_css .= 'body::-webkit-scrollbar-thumb:horizontal,body::-webkit-scrollbar-thumb:vertical{background-color:'. modul_r_adjustBrightness($colors['primary'], -0.1).'}';

		// HERO
        $hero_opacity = get_theme_mod( 'modul_r_hero_opacity' ) !== false ? intval(get_theme_mod( 'modul_r_hero_opacity' )) : 100;
        $hero_height_home = get_theme_mod( 'modul_r_hero_height_homepage' ) !== false ? intval(get_theme_mod( 'modul_r_hero_height_homepage' )) : 70;
        $hero_height = get_theme_mod( 'modul_r_hero_height' ) !== false ? intval(get_theme_mod( 'modul_r_hero_height' )) : 45;
		if ($hero_opacity != 100) $atf_css .= 'body .hero img {opacity:'. ($hero_opacity/100) .'}';
        if ($hero_height) $atf_css .= "html body .hero {max-height:{$hero_height}vh}";
        if ($hero_height_home) $atf_css .= "html body.home .hero {max-height:{$hero_height_home}vh}";

		include get_stylesheet_directory() . '/assets/dist/css/atf.css';
		$atf_css .= ob_get_clean();

		// Finally return the stored style
		if ($atf_css != "" ) {
			echo '<style id="modul-r-inline-css" type="text/css">'. $atf_css . '</style>';
		}

		// Apply the header color to chrome bar
		echo '<meta name="theme-color" content="' . modul_r_adjustBrightness( $header_color, 0.2 ) . '" />';

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
		wp_enqueue_style( 'modul-r-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Material+Icons&display=swap', array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_fonts', 10 );
add_action( 'admin_enqueue_scripts', 'modul_r_theme_fonts', 10 );

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



