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
		'customizer_options' => array(),
	);
}

// Autoload dependencies
if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( 'vendor/autoload.php' );
}

require_once MODULR_THEME_DIR . '/inc/theme-setup.php';
require_once MODULR_THEME_DIR . '/inc/template-functions.php';
require_once MODULR_THEME_DIR . '/inc/enqueue-scripts.php';
require_once MODULR_THEME_DIR . '/inc/enqueue-style.php';
require_once MODULR_THEME_DIR . '/inc/optimization.php';
require_once MODULR_THEME_DIR . '/inc/block-styles.php';
require_once MODULR_THEME_DIR . '/inc/woocommerce.php';
