<?php

// add 'has-featured-image' to body class if post has a featured image
function add_featured_image_body_class( $classes ) {
global $post;
if ( isset ( $post->ID ) && get_the_post_thumbnail($post->ID) && (is_page() || is_single())) {
$classes[] = 'has-featured-image';
}
return $classes;
}
add_filter( 'body_class', 'add_featured_image_body_class' );