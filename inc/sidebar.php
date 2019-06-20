<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function modul_r_registerSidebar() {

	register_sidebar( array(
			'name'          => __( 'Main Sidebar',  'modul-r' ),
			'id'            => 'main-sidebar',
			'description'   => __( 'The main theme sidebar',  'modul-r' ),
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer',  'modul-r' ),
			'id'            => 'footer-main',
			'description'   => __( 'Add widgets here to appear in your footer.',  'modul-r' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

}

add_action( 'widgets_init', 'modul_r_registerSidebar' );
