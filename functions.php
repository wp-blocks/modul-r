<?php
/**
 * The WordPress modul-r template
 *
 * @package ModulR
 */

if ( ! defined( 'MODULR_THEME_DIR' ) ) {
	define( 'MODULR_THEME_DIR', dirname( __FILE__ ) );
}
if ( ! defined( 'MODULR_THEME_URL' ) ) {
	define( 'MODULR_THEME_URL', get_template_directory_uri() );
}


// Modul-R defaults
if ( ! isset( $modul_r_defaults ) ) {
	$modul_r_defaults = array(
		'customizer_options' => array(
			'weights'             => array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ),
			'font_family_default' => array(
				array(
					'name'        => 'light',
					'default'     => 300,
					'input'       => 'select',
					'select_type' => 'weights',
				),
				array(
					'name'        => 'regular',
					'default'     => 400,
					'input'       => 'select',
					'select_type' => 'weights',
				),
				array(
					'name'        => 'bold',
					'default'     => 700,
					'input'       => 'select',
					'select_type' => 'weights',
				),
			),
			'font_family_title'   => array(
				array(
					'name'        => 'regular',
					'default'     => 400,
					'input'       => 'select',
					'select_type' => 'weights',
				),
				array(
					'name'        => 'bold',
					'default'     => 700,
					'input'       => 'select',
					'select_type' => 'weights',
				),
			),
		),
	);
}

// Autoload dependencies
if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( 'vendor/autoload.php' );
	require_once get_parent_theme_file_path( 'vendor/erikyo/webfont-loader/wptt-webfont-loader.php' );
}

require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/enqueue-scripts.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/blocks.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/sidebar.php';
require_once get_template_directory() . '/inc/enqueue-style.php';
require_once get_template_directory() . '/inc/block-styles.php';
require_once get_template_directory() . '/inc/enqueue-fonts.php';
require_once get_template_directory() . '/inc/woocommerce.php';
