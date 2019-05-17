<?php

// Register Custom Post Type
add_action( 'init', 'modu_custom_post' );

/**
 * Register a custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * replace RcustomR with your own term
 */

function modu_custom_post() {
	$labels = array(
		'name'               => _x( 'RcustomRs', 'post type general name', 'modu' ),
		'singular_name'      => _x( 'RcustomR', 'post type singular name', 'modu' ),
		'menu_name'          => _x( 'RcustomRs', 'admin menu', 'modu' ),
		'name_admin_bar'     => _x( 'RcustomR', 'add new on admin bar', 'modu' ),
		'add_new'            => _x( 'Add New', 'RcustomR', 'modu' ),
		'add_new_item'       => __( 'Add New RcustomR', 'modu' ),
		'new_item'           => __( 'New RcustomR', 'modu' ),
		'edit_item'          => __( 'Edit RcustomR', 'modu' ),
		'view_item'          => __( 'View RcustomR', 'modu' ),
		'all_items'          => __( 'All RcustomRs', 'modu' ),
		'search_items'       => __( 'Search RcustomRs', 'modu' ),
		'parent_item_colon'  => __( 'Parent RcustomRs:', 'modu' ),
		'not_found'          => __( 'No RcustomRs found.', 'modu' ),
		'not_found_in_trash' => __( 'No RcustomRs found in Trash.', 'modu' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'modu' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'RcustomR' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'RcustomR', $args );
}