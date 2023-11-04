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

if ( ! function_exists( 'modul_r_breadcrumbs' ) ) :
	/**
	 * Displays the article breadcrumbs
	 *
	 * @return void
	 */
	function modul_r_breadcrumbs() {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<!-- wp:paragraph {"className":"breadcrumbs","style":{"spacing":{"margin":{"bottom":"0"}}} --><p class="breadcrumbs" style="margin-bottom: 0">', '</p><!-- /wp:paragraph -->' );
		} else {
			if ( is_single() ) {
				printf( '<!-- wp:paragraph {"className":"breadcrumbs","style":{"spacing":{"margin":{"bottom":"0"}}} --><p class="breadcrumbs" style="margin-bottom: 0"><a href="%s">%s</a> / %s</p><!-- /wp:paragraph -->', esc_url( home_url() ), esc_html__( 'Home', 'modul-r' ), esc_html( get_the_category_list( ' &#47; ' ) ) );
			} else {
				printf( '<!-- wp:paragraph {"className":"breadcrumbs","style":{"spacing":{"margin":{"bottom":"0"}}} --><p class="breadcrumbs" style="margin-bottom: 0"><a href="%s">%s</a> / <a href="%s">%s</a></p><!-- /wp:paragraph -->', esc_url( home_url() ), esc_html__( 'Home', 'modul-r' ), esc_url( get_permalink() ), esc_html( get_the_title() ) );
			}
		}
	}
endif;


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
