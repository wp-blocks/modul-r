<?php

/**
 * Enqueue the masonry
 */

// A category load the masonry scripts
function masonryScripts(){

	// customize with your category which will displayed with the masonry layout
	if(is_category(15)){

	// Pull Masonry from the core of WordPress
	wp_enqueue_script( 'masonry', false , array('jquery3','imagesloaded'), null, true );

	wp_enqueue_script( 'imagesloaded', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.3/imagesloaded.pkgd.js', array('jquery3'), null, true );
	wp_enqueue_script( 'infinitescroll', '//cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.1.0/jquery.infinitescroll.min.js', array('jquery3'), null, true );

	}
}
add_action('wp_enqueue_scripts', 'masonryScripts');