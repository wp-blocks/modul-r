<?php

// Modul-R defaults
if (!isset($modul_r_defaults)) {
	$modul_r_defaults = array(
		'colors' => array(
			'primary' => '#16bebb',
			'secondary' => '#6f4cad',
			'white' => '#ffffff',
			'white-smoke' => '#fcfcfc',
			'gray-light' => '#e3e3e3',
			'gray' => '#888888',
			'gray-dark' => '#4e4e4e',
			'black' => '#222222',
		),
		'style' => array(
			'background' => 'white-smoke',
			'title-color' => 'primary',
			'text-color' => 'black',
			'header-color' => 'gray-dark',
			'header-text-color' => 'white',
			'footer-color' => 'white',
			'footer-bottom-color' => 'white',
			'footer-text-color' => 'gray-dark',
		)
	);
}

if ( ! function_exists('modul_r_theme_setup') ) :
	function modul_r_theme_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'modul-r', get_template_directory() . '/languages' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* WordPress define content width
		* https://codex.wordpress.org/Content_Width
		*/
		if ( ! isset( $content_width ) ) $content_width = 900;

		/*
		* Enable support for Post Thumbnails on posts and pages.
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 400, 9999 );

		add_image_size( 'modul-r-fullwidth', 1920, 9999 ); // 1920px width & unlimited height

		// This theme uses wp_nav_menu() in Primary Navigation.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary',  'modul-r' )
		) );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);


		// Add support for core custom logo, header text color, website background.
		add_theme_support( 'custom-logo' , array(
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));

		add_theme_support( 'custom-header', array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-text-color']]),
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		));

		add_theme_support( 'custom-background', array(
			'default-color'          => str_replace('#', '', $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['background']] ),
			'default-image'          => '',
			'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
			'default-position-x'     => 'left',    // 'left', 'center', 'right'
			'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
			'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
			'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
			'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles and fonts.
		add_editor_style( 'assets/dist/css/editor.css' );
		add_editor_style( 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Material+Icons' ); // todo: make this dynamic

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

	}
endif;
add_action( 'after_setup_theme', 'modul_r_theme_setup' );


require_once( get_template_directory() . '/inc/customizer.php' );
require_once( get_template_directory() . '/inc/woocommerce.php' );
require_once( get_template_directory() . '/inc/sidebar.php' );
require_once( get_template_directory() . '/inc/masonry.php' );
require_once( get_template_directory() . '/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/inc/template-functions.php' );
