<?php

// Modul-R defaults
if (!isset($modul_r_defaults)) {
	$modul_r_defaults = array(
		'colors' => array(
			'primary'     => '#6f4cad',
			'secondary'   => '#16bebb',
			'white'       => '#ffffff',
			'white-smoke' => '#f1f1f1',
			'gray-light'  => '#e3e3e3',
			'gray'        => '#888888',
			'gray-dark'   => '#4e4e4e',
			'black'       => '#222222',
		),
		'style'                => array(
			'background'          => 'white-smoke',
			'title-color'         => 'primary',
			'text-color'          => 'gray-dark',
			'header-color'        => 'gray-dark',
			'header-title-color'  => 'primary',
			'header-text-color'   => 'white',
			'footer-color'        => 'gray-dark',
			'footer-bottom-color' => 'black',
			'footer-text-color'   => 'white-smoke',
		),
		'social_media_enabled' => array( 'Facebook', 'Instagram', 'Twitter', 'Linkedin', 'YouTube', 'www' ),
		'customizer_options'   => array(
			'weights'        => array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ),
			'color_variance' => 0.3,
	    	'font_weight'    => array(
			    array( 'name' => 'font-weight--title-bold', 'default' => 800, 'input' => 'select', 'select_type' => 'weights' ),
			    array( 'name' => 'font-weight--title-regular', 'default' => 500, 'input' => 'select', 'select_type' => 'weights' ),
				array( 'name' => 'font-weight--text-bold', 'default' => 600, 'input' => 'select', 'select_type' => 'weights' ),
				array( 'name' => 'font-weight--text-regular', 'default' => 400, 'input' => 'select', 'select_type' => 'weights' ),
				array( 'name' => 'font-weight--text-light', 'default' => 300, 'input' => 'select', 'select_type' => 'weights' )
			),
			'sizes'          => array(
				array( 'name' => 'sidebar--width', 'default' => 420, 'input' => 'number', 'input_type' => 'int', 'unit' => 'px' )
			)
		)
	);
}

// Autoload dependencies
if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( 'vendor/autoload.php' );
	require_once get_parent_theme_file_path( 'vendor/wptt/webfont-loader/wptt-webfont-loader.php' );
}

require_once( get_template_directory() . '/inc/theme-setup.php' );
require_once( get_template_directory() . '/inc/customizer.php' );
require_once( get_template_directory() . '/inc/woocommerce.php' );
require_once( get_template_directory() . '/inc/sidebar.php' );
require_once( get_template_directory() . '/inc/masonry.php' );
require_once( get_template_directory() . '/inc/enqueue-style.php' );
require_once( get_template_directory() . '/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/inc/template-functions.php' );
require_once( get_template_directory() . '/inc/block-patterns.php' );
