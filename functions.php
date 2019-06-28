<?php

require_once( get_template_directory() . '/inc/theme-setup.php' );
require_once( get_template_directory() . '/inc/woocommerce.php' );
require_once( get_template_directory() . '/inc/sidebar.php' );
require_once( get_template_directory() . '/inc/masonry.php' );
require_once( get_template_directory() . '/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/inc/mimetypes.php' );
require_once( get_template_directory() . '/inc/template-functions.php' );
require_once( get_template_directory() . '/inc/custom.php' );




function woocommerce_after_shop_loop_item_title_short_description() {
	global $product;
	$short_desc = $product->get_short_description();
	if ( $short_desc == "" ) return;
	?>
	<div class="woocommerce-loop-description" itemprop="description">
		<?php echo apply_filters( 'woocommerce_short_description', $short_desc ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);