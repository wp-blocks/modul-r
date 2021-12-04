<?php

if ( class_exists( 'WooCommerce' ) ) {

    /**
     * Enqueue style
     */
    function modul_r_woo_style() {
        if (!is_woocommerce()) return true;
        wp_register_style( 'modul-r-woo-css', get_template_directory_uri() . '/assets/dist/css/woo.css' );
        wp_enqueue_style( 'modul-r-woo-css' );
    }
    add_action( 'wp_print_styles', 'modul_r_woo_style' );

	function modul_r_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'modul_r_add_woocommerce_support' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}