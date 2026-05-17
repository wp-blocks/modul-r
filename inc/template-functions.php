<?php
/**
 * Modul-r template functions
 *
 * @package   ModulR
 * @author    Erik Golinelli <erik@codekraft.it>
 * @copyright 2023 Erik
 * @license   GPL 2.0+
 * @link      https://modul-r.codekraft.it/
 */

if ( ! function_exists( 'modul_r_content_height_fix' ) ) :
	/**
	 * Fix for ios that overlaps content with the lower nav bar
	 *
	 * @note In order to fill the full height of the page with hero content we need to set
	 * --full-height custom property to a group with class "is-style-full-height" that contains the hero and the bar.
	 *
	 * @see inc/block-patterns.php - block pattern is availble for this
	 *
	 * @since 2.0.0
	 */
	function modul_r_content_height_fix() {
		?>
		<script>
						function setFullHeight() {
								// First we get the viewport height, and we multiply it by 1% to get a value for a vh unit
								var vh = window.innerHeight * 0.01;
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
add_action( 'wp_head', 'modul_r_content_height_fix' );

/**
 * Configure the dark mode plugin
 *
 * 1. Dequeue the default plugin styles (removes the invert filter)
 * 2. Add custom CSS to trigger your theme.json light-dark() settings
 */
if ( ! function_exists( 'modulr_configure_dark_mode_plugin' ) ) {
	/**
	 * Dequeue the default plugin styles (removes the invert filter)
	 */
	add_action( 'wp_enqueue_scripts', function () {
		wp_dequeue_style( 'codekraft-dark-mode-style' );
	}, 9 );

	/**
	 * Add custom CSS to trigger your theme.json light-dark() settings
	 */
	function modulr_configure_dark_mode_plugin() {
		$custom_css = "
    html.dark-mode {
        color-scheme: dark !important;
    }

    .dark-mode-switch {
       cursor: pointer;
       height: 1.5rem;
       width: 1.5rem;
       background-color: var(--wp--preset--color--background);
       /* Moon icon */
       mask-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='black'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z' /%3E%3C/svg%3E\");
       mask-size: cover;
       mask-repeat: no-repeat;
    }

    .dark-mode .dark-mode-switch {
       /* Sun icon */
       mask-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='black'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z' /%3E%3C/svg%3E\");
    }";

		echo "<style id='dark-mode-custom'>$custom_css</style>";
	}

	add_action( 'wp_head', 'modulr_configure_dark_mode_plugin', 20 );
}
