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
                'sidemargin' => 42,
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

require_once( get_template_directory() . '/inc/theme-setup.php' );
require_once( get_template_directory() . '/inc/customizer.php' );
require_once( get_template_directory() . '/inc/woocommerce.php' );
require_once( get_template_directory() . '/inc/sidebar.php' );
require_once( get_template_directory() . '/inc/masonry.php' );
require_once( get_template_directory() . '/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/inc/template-functions.php' );
require_once( get_template_directory() . '/inc/block-patterns.php' );
