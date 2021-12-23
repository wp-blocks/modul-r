<?php

/**
 * Enqueue the masonry scripts
 */

// A category load the masonry scripts
if ( ! function_exists('modul_r_masonry_scripts') ) :
	function modul_r_masonry_scripts(){

		// customize with your category which will displayed with the masonry layout
		if(is_category() || is_home()){
			// Pull Masonry from the core of WordPress
            wp_enqueue_script( 'modul-r-scripts-infinite-scroll', get_template_directory_uri() . "/assets/dist/js/infinite-scroll.pkgd.js", array( 'jquery' ), null, false );
            wp_enqueue_script( 'imagesloaded', false, array('jquery', 'modul-r-scripts-infinite-scroll'), null, true );
            wp_enqueue_script( 'masonry', false, array('imagesloaded'), null, true );
		}
	}
	add_action('wp_enqueue_scripts', 'modul_r_masonry_scripts');
endif;

if ( ! function_exists('modul_r_category_query') ) :
	function modul_r_category_query( $query ) {
		// do not alter the query on wp-admin pages and only alter it if it's the main query
		if (!is_admin() && $query->is_main_query()){

			$post_number = apply_filters('modul_r_masonry_post_count', (is_category() ? 3 : is_home()) ? 5 : get_option( 'posts_per_page' ));

			// alter the query for categories
			$query->set('posts_per_page', $post_number);
		}
	}
	add_action( 'pre_get_posts', 'modul_r_category_query' );
endif;

