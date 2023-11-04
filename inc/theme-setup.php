<?php
if ( ! function_exists( 'modul_r_theme_setup' ) ) :
	function modul_r_theme_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'modul-r', get_template_directory() . '/languages' );

		/*
		 * Add theme support for menus.
		 */
		add_theme_support( 'menus' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

		// This theme uses wp_nav_menu() in Primary Navigation.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'modul-r' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'modul_r_theme_setup' );

if ( ! function_exists( 'modul_r_comments' ) ) :
	/**
	 * Displays the comments template
	 *
	 * @return void
	 */
	function modul_r_comments() {
		// If comments are open, or we have at least one comment, load up the comment template.
		comments_template();
	}
endif;
