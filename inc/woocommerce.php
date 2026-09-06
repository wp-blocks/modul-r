<?php
if ( class_exists( 'WooCommerce' ) ) {
	/* Adding support for the WooCommerce product gallery features. */
	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-lightbox' );
	remove_theme_support( 'wc-product-gallery-slider' );
}
