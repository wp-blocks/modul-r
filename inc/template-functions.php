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

if ( ! function_exists('modul_r_breadcrumbs') ) :
	/**
	 * Displays the article breadcrumbs
	 *
	 * @return void
	 */
	function modul_r_breadcrumbs() {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<!-- wp:paragraph {"className":"breadcrumbs"} --><p class="breadcrumbs">', '</p><!-- /wp:paragraph -->' );
		} else {
			if ( is_single() ) {
				printf( '<!-- wp:paragraph {"className":"breadcrumbs"} --><p class="breadcrumbs"><a href="%s">%s</a> / %s</p><!-- /wp:paragraph -->', esc_url( home_url() ), esc_html__( 'Home', 'modul-r' ), esc_html( get_the_category_list( ' &#47; ' ) ) );
			} else {
				printf( '<!-- wp:paragraph {"className":"breadcrumbs"} --><p class="breadcrumbs"><a href="%s">%s</a> / <a href="%s">%s</a></p><!-- /wp:paragraph -->', esc_url( home_url() ), esc_html__( 'Home', 'modul-r' ), esc_url( get_permalink() ), esc_html( get_the_title() ) );
			}
		}
	}
endif;
