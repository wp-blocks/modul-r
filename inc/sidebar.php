<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function registerSidebar() {

	register_sidebar(
		array(
			'name'          => __( 'Main Sidebar', 'cktheme' ),
			'id'            => 'main-sidebar',
			'description'   => __( 'The main theme sidebar', 'cktheme' ),
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);

	register_sidebar(
		array(
			'name' => __('Footer', 'cktheme'),
			'id' => 'footer-main',
			'description' => __('Add widgets here to appear in your footer.', 'cktheme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

}

add_action( 'widgets_init', 'registerSidebar' );
