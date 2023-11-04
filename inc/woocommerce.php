<?php
if ( class_exists( 'WooCommerce' ) ) {
	/* Adding support for the WooCommerce product gallery features. */
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
