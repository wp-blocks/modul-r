<?php

if ( ! function_exists( 'modul_r_theme_scripts' ) ) :
	/**
	 * Main template scripts
	 */
	function modul_r_theme_scripts() {

		$asset = include MODULR_THEME_DIR . '/build/modulr-scripts.asset.php';

		/* Register and Enqueue */
		wp_enqueue_script( 'modul-r-scripts-main', MODULR_THEME_URL . '/build/modulr-scripts.js', $asset['dependencies'], $asset['version'] );
		wp_enqueue_style( 'modul-r-scripts-main', MODULR_THEME_URL . '/build/modulr-scripts.css', $asset['dependencies'], $asset['version'] );
	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_scripts' ); // Add Theme admin scripts

if ( ! function_exists( 'modul_r_content_height_fix' ) ) :
	/**
	 * Fix for ios that overlaps content with the lower nav bar
	 */
	function modul_r_content_height_fix() {
		?>
		<script>
			function setFullHeight() {
				// First we get the viewport height, and we multiply it by 1% to get a value for a vh unit
				let vh = window.innerHeight * 0.01;
				// Then we set the value in the --vh custom property to the root of the document
				document.documentElement.style.setProperty('--vh', `${vh}px`);
			}

			setFullHeight();

			window.addEventListener('resize', function () {
				setFullHeight();
			});
		</script>
		<?php
	}
endif;
add_action( 'wp_head', 'modul_r_content_height_fix', 10 );

if ( ! function_exists( 'modul_r_theme_drawer_color' ) ) :
	/**
	 * Add color styling from theme
	 */
	function modul_r_theme_drawer_color() {
		$header_background = modul_r_get_theme_color( 'header-color', $GLOBALS['modul_r_defaults']['shades'][ $GLOBALS['modul_r_defaults']['style']['header-color'] ] );
		echo '<meta name="theme-color" content="' . modul_r_adjustBrightness( $header_background, 0.2 ) . '" />';
	}
endif;
add_action( 'wp_head', 'modul_r_theme_drawer_color' );

/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}

/**
 * It enqueues a script that is used to add a customizer control to the theme customizer
 */
function modul_r_theme_customize_style() {
	$font_json = file_get_contents( get_template_directory() . '/inc/third-party/fonts.json' );
	wp_enqueue_script( 'modul-r-customizer-script', get_template_directory_uri() . '/build/modulr-script-admin.js' );
	wp_localize_script( 'modul-r-customizer-script', 'modulrFonts', json_decode( $font_json ) );
}
add_action( 'customize_controls_enqueue_scripts', 'modul_r_theme_customize_style' );
