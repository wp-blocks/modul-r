<?php
if ( class_exists( 'WooCommerce' ) ) {
	/* Adding support for the WooCommerce product gallery features. */
	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-lightbox' );
	remove_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Replace WooCommerce loop add to cart button text with SVG icons and a quantity badge.
 *
 * @param string     $html    The HTML of the add to cart button.
 * @param WC_Product $product The product object.
 * @param array      $args    Arguments for the add to cart button.
 * @return string
 */
function custom_theme_replace_loop_add_to_cart_button( $html, $product, $args = array() ) {
	// Ensure we have a valid product object to prevent fatal errors.
	if ( ! $product instanceof WC_Product ) {
		return $html;
	}

	// Define SVG icons.
	$icon_cart    = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
	$icon_options = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /> </svg>';
	$icon_added   = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" /> </svg>';

	// Set default icon.
	$selected_icon = $icon_cart;

	// Check product type for variations.
	if ( $product->is_type( 'variable' ) ) {
		$selected_icon = $icon_options;
	}

	// Calculate how many of THIS specific product are currently in the cart.
	$items_in_cart = 0;
	if ( ! is_null( WC()->cart ) && ! WC()->cart->is_empty() ) {
		foreach ( WC()->cart->get_cart() as $cart_item ) {
			// Compare the main product ID (handles both simple and parent variable products).
			if ( $cart_item['product_id'] === $product->get_id() ) {
				$items_in_cart += $cart_item['quantity'];
			}
		}
	}

	// If the product is in the cart, change the icon and add the badge.
	if ( $items_in_cart > 0 ) {
		$selected_icon = $icon_added;
		// Append a span badge with the quantity.
		$badge_html = sprintf( '<span class="custom-cart-badge">%d</span>', absint( $items_in_cart ) );
		$selected_icon .= $badge_html;
	}

	// Setup arguments for the button builder.
	$quantity   = isset( $args['quantity'] ) ? $args['quantity'] : 1;
	// Add a custom wrapper class to handle CSS positioning more easily.
	$class      = isset( $args['class'] ) ? $args['class'] . ' icon-button-wrapper' : 'button icon-button-wrapper';
	$attributes = isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '';

	// Rebuild the HTML button.
	$new_html = sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $quantity ),
		esc_attr( $class ),
		$attributes,
		$selected_icon
	);

	return $new_html;
}
add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_theme_replace_loop_add_to_cart_button', 10, 3 );
