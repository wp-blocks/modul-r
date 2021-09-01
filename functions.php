<?php

// Modul-R defaults
if (!isset($modul_r_defaults)) {
	$modul_r_defaults = array(
		'colors' => array(
			'primary' => '#6f4cad',
			'secondary' => '#16bebb',
			'white' => '#ffffff',
			'white-smoke' => '#fafafa',
			'gray-light' => '#e3e3e3',
			'gray' => '#888888',
			'gray-dark' => '#4e4e4e',
			'black' => '#222222',
		),
		'style' => array(
			'background' => 'white-smoke',
			'title-color' => 'primary',
			'text-color' => 'gray-dark',
			'header-color' => 'gray-dark',
			'header-title-color' => 'primary',
			'header-text-color' => 'white',
			'footer-color' => 'gray-dark',
			'footer-bottom-color' => 'black',
			'footer-text-color' => 'white-smoke',
		),
		'social_media_enabled' => array( 'Facebook', 'Instagram', 'Twitter', 'Linkedin', 'YouTube', 'www' ),
        'customizer_options' => array(
            'font_family' => array(
                'Montserrat',
                'Source+Sans+Pro',
                'Roboto+Condensed',
                'Oswald',
                'Arvo',
                'Exo+2',
                'Lato',
                'Open+Sans',
                'Roboto',
                'Merriweather',
                'Nunito',
                'Raleway',
                'Roboto+Mono',
                'Roboto+Slab',
                'Slabo',
                'Ubuntu',
                'Lobster',
                'Michroma',
                'Pacifico',
                'Permanent+Marker',
            ),
            'weights' => array( 200, 300, 400, 500, 600, 700, 800, 900 ),
            'color_variance' => 0.3,
            'layout' => array(
                'baseunit' => 8,
                'content_width' => 900,
                'content_width_wide' => 1500,
                'hero_height_home' => 70,
                'hero_height_default' => 50,
            ),
            'typography' => array(
                array( 'name' => 'line-height', 'default' => 1.3, 'input' => 'number', 'input_type' => 'float' ),
                array( 'name' => 'line-height--wide', 'default' => 1.7, 'input' => 'number', 'input_type' => 'float' ),
                array( 'name' => 'font-size--xs', 'default' => 12, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'font-size--s', 'default' => 14, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'font-size--m', 'default' => 17, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'font-size--l', 'default' => 22, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'font-size--xl', 'default' => 26, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'font-size--xxl', 'default' => 40, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'font-size--xxxl', 'default' => 56, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
            ),
            'font_weight' => array(
                array( 'name' => 'font-weight--bold', 'default' => 600, 'input' => 'select', 'select_type' => 'weights' ),
                array( 'name' => 'font-weight--regular', 'default' => 400, 'input' => 'select', 'select_type' => 'weights' ),
                array( 'name' => 'font-weight--light', 'default' => 300, 'input' => 'select', 'select_type' => 'weights' )
            ),
            'header_sizes' => array(
                array( 'name' => 'branding--max-width', 'default' => 350, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'branding--height', 'default' => 80, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
                array( 'name' => 'logo--height', 'default' => 80, 'input' => 'number', 'input_type' => 'int', 'unit' => '%' ),
                array( 'name' => 'nav--height', 'default' => 60, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' ),
            ),
            'sizes' => array(
                array( 'name' => 'sidebar--width', 'default' => 420, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' )
            )
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
		if ( ! isset( $content_width ) ) $content_width = $GLOBALS['modul_r_defaults']['customizer_options']['layout']['content_width'];

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
			'default-text-color'     => str_replace('#', '', sanitize_hex_color($GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-title-color']])),
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		));

		add_theme_support( 'custom-background', array(
			'default-color'          => str_replace('#', '', sanitize_hex_color($GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['background']])),
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
