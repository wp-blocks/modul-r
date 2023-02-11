<?php
if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * the WooCommerce shop style that is enqueued only if is necessary
	 */
	if ( ! function_exists( 'modul_r_woo_style' ) ) :
		function modul_r_woo_style() {
			wp_enqueue_style( 'modul-r-woo-style', get_template_directory_uri() . "/build/modulr-css-woo.js" );
		}
	endif;

	function modul_r_add_woocommerce_support() {
		add_theme_support( 'woocommerce',
			apply_filters(
				'modul_r_woocommerce_args',
				array(
					'single_image_width'    => 416,
					'thumbnail_image_width' => 324,
					'product_grid'          => array(
						'default_columns' => 4,
						'default_rows'    => 4,
						'min_columns'     => 1,
						'max_columns'     => 6,
						'min_rows'        => 1,
					),
				)
			) );
	}
	add_action( 'after_setup_theme', 'modul_r_add_woocommerce_support' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
