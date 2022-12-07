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
			wp_enqueue_script( 'imagesloaded', false, array('jquery', 'modul-r-scripts-vendors'), null );
			wp_enqueue_script( 'masonry', false, array('imagesloaded'), null );
		}
	}
	add_action('wp_enqueue_scripts', 'modul_r_masonry_scripts');
endif;

if ( ! function_exists('modul_r_category_query') ) :
	function modul_r_category_query( $query ) {
		// do not alter the query on wp-admin pages and only alter it if it's the main query
		if (!is_admin() && $query->is_main_query()){

			// alter the query for categories
			if(is_category()){
				$query->set('posts_per_page', 3);
			} else if(is_home()) {
				$query->set('posts_per_page', 5);
			}

		}
	}
	add_action( 'pre_get_posts', 'modul_r_category_query' );
endif;