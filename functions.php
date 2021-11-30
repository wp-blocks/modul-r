<?php

// Modul-R defaults
if (!isset($modul_r_defaults)) {
	$modul_r_defaults = array(
		'colors' => array(
			'primary' => '#6f4cad',
			'secondary' => '#16bebb',
			'white' => '#ffffff',
			'white-smoke' => '#f1f1f1',
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
        'customizer_options' => array(
            'font_family' => array(
                'Montserrat' => array('name'=> 'Montserrat', 'weights' => array(100,200,300,400,500,600,700,800,900) ),
                'Source+Sans+Pro' => array('name'=> 'Source Sans Pro', 'weights' => array(200,300,400,600,700,900) ),
                'Roboto+Condensed' => array('name'=> 'Roboto Condensed', 'weights' => array(300,400,700) ),
                'Oswald' => array('name'=> 'Oswald', 'weights' => array(200,300,400,500,600,700) ),
                'Arvo' => array('name'=> 'Arvo', 'weights' => array(400,700) ),
                'Exo+2'=> array('name'=> 'Exo 2', 'weights' => array(100,200,300,400,500,600,700,800,900) ),
                'Lato' => array('name'=> 'Lato', 'weights' => array(100,300,400,700,900) ),
                'Open+Sans'=> array('name'=> 'Open Sans', 'weights' => array(300,400,500,600,700,800) ),
                'Roboto' => array('name'=> 'Roboto', 'weights' => array(100,300,400,500,700,900) ),
                'Merriweather' => array('name'=> 'Merriweather', 'weights' => array(300,400,700,900) ),
                'Nunito' => array('name'=> 'Nunito', 'weights' => array(200,300,400,600,700,800,900) ),
                'Raleway' => array('name'=> 'Raleway', 'weights' => array(100,200,300,400,500,600,700,800,900) ),
                'Roboto+Mono' => array('name'=> 'Roboto Mono', 'weights' => array(100,200,300,400,500,600,700) ),
                'Roboto+Slab' => array('name'=> 'Roboto Slab', 'weights' => array(100,200,300,400,500,600,700,800,900) ),
                'Ubuntu' => array('name'=> 'Ubuntu', 'weights' => array(300,400,500,700) ),
                'Lobster' => array('name'=> 'Lobster', 'weights' => array(400) ),
                'Michroma' => array('name'=> 'Michroma', 'weights' => array(400) ),
                'Pacifico' => array('name'=> 'Pacifico', 'weights' => array(400) ),
                'Permanent+Marker' => array('name'=> 'Permanent Marker', 'weights' => array(400) ),
            ),
            'font_styles' => array(
                "title_font-family" => array( 'name' => 'font-family', 'default' => 'Montserrat', 'input' => 'select', 'type' => 'font_family', 'for' => 'title' ),
                "title_font-weight" => array( 'name' => 'font-weight', 'default' => 600, 'input' => 'select', 'type' => 'font_weight', 'for' => 'title' ),
                "text_font-family" => array( 'name' => 'font-family', 'default' => 'Montserrat', 'input' => 'select', 'type' => 'font_family', 'for' => 'text' ),
                "text_bold" => array( 'name' => 'bold', 'default' => 600, 'input' => 'select', 'type' => 'font_weight', 'for' => 'text' ),
                "text_regular" => array( 'name' => 'regular', 'default' => 400, 'input' => 'select', 'type' => 'font_weight', 'for' => 'text' ),
                "text_light" =>  array( 'name' => 'light', 'default' => 300, 'input' => 'select', 'type' => 'font_weight', 'for' => 'text' )
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
            'social_media_enabled' => array( 'Facebook', 'Instagram', 'Twitter', 'Linkedin', 'YouTube', 'www' ),
            'color_variance' => 0.3,
            'layout' => array(
                'baseunit' => 8,
                'content_width' => 900,
                'content_width_wide' => 1500,
                'hero_height_home' => 70,
                'hero_height_default' => 50,
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
apply_filters('modul_r_defaults', $modul_r_defaults);

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

        // Adds support for FSE block templates
        add_theme_support( 'block-templates' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles and fonts.
		add_editor_style( 'assets/dist/css/editor.css' );

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
