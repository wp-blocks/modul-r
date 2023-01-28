<?php
if ( ! function_exists( 'modul_r_theme_setup' ) ) :
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
		add_theme_support( "title-tag" );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 400, 9999 );

		add_image_size( 'modul-r-fullwidth', 1920, 9999 ); // 1920px width & unlimited height


		/* Https://developer.wordpress.org/reference/functions/add_theme_support/#automatic-feed-links */
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in Primary Navigation.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'modul-r' )
		) );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for core custom logo, header text color, website background.
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		add_theme_support( 'custom-header', array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => str_replace( '#', '', sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-title-color'] ] ) ),
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		) );

		add_theme_support( 'custom-background', array(
			'default-color'          => str_replace( '#', '', sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['background'] ] ) ),
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

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles and fonts.
		add_editor_style( get_template_directory() . '/dist/styles/editor.css' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'block-template-parts' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'appearance-tools' );
		add_theme_support( 'custom-line-height' );
	}
endif;
add_action( 'after_setup_theme', 'modul_r_theme_setup' );
