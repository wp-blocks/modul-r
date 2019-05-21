<?php

// Remove Actions
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
// remove_action( 'wp_head', 'rel_canonical' );
// remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
// remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
// remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
// remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Remove Windows live writer
remove_action( 'wp_head', 'rsd_link' ); // Remove EditURI link

// Add Filters
//add_filter('show_admin_bar', '__return_false'); // Disable Admin Bar for All Users Except for Administrators