<?php

/**
 * Enqueue the masonry scripts
 */

// A category load the masonry scripts
function masonryScripts(){

	// customize with your category which will displayed with the masonry layout
	if(is_archive()){

		// Pull Masonry from the core of WordPress
		wp_enqueue_script( 'masonry', false , array('jquery','imagesloaded'), null, true );
		wp_enqueue_script( 'imagesloaded', false, array('jquery'), null, true );
		wp_enqueue_script( 'infinitescroll', '//cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.1.0/jquery.infinitescroll.min.js', array('jquery'), null, true );

	}
}
add_action('wp_enqueue_scripts', 'masonryScripts');