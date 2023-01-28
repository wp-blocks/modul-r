<?php

/**
 * Scripts
 */
if ( ! function_exists( 'modul_r_theme_scripts' ) ) :
	function modul_r_theme_scripts() {

		// Register and Enqueue
		wp_enqueue_script( 'modul-r-scripts-main', get_template_directory_uri() . "/dist/scripts/scripts.js", array(), false, true );

	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_scripts' ); // Add Theme admin scripts

/**
 * Fix for ios that overlaps content with the lower nav bar
 */
if ( ! function_exists( 'modul_r_content_height_fix' ) ) :
	function modul_r_content_height_fix() {
		?>
		<script>
					function setFullHeight() {
						// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
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

/**
 * Add color styling from theme
 */
if ( ! function_exists( 'modul_r_theme_drawer_color' ) ) :
	function modul_r_theme_drawer_color() {
		$header_background = modul_r_get_theme_color( 'header-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-color'] ] );
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
