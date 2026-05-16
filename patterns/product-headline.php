<?php
/**
 * Title: Product Headline
 * Slug: modul-r/product-headline
 * Categories: modul-r
 * Contributors: codekraft
 */
?>
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"512px"} -->
	<div class="wp-block-column" style="flex-basis:512px"><!-- wp:woocommerce/product-image-gallery /--></div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:post-terms {"term":"product_cat","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"gray","fontSize":"extra-small"} /-->

			<!-- wp:post-title {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"3.6rem"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"textColor":"primary","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"bottom":"var:preset|spacing|50"}},"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"700","fontSize":"36px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->

			<!-- wp:woocommerce/product-summary {"isDescendentOfSingleProductTemplate":true,"textColor":"gray-dark","style":{"typography":{"lineHeight":"1"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|gray-dark"}}}}} /--></div>
		<!-- /wp:group -->

		<!-- wp:woocommerce/add-to-cart-with-options /-->

		<!-- wp:woocommerce/product-meta {"metadata":{"ignoredHookedBlocks":["core/post-terms"]}} -->
		<div class="wp-block-woocommerce-product-meta"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group"><!-- wp:woocommerce/product-sku /-->

				<!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->

				<!-- wp:post-terms {"term":"product_tag","prefix":"Tags: ","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"gray-dark"} /--></div>
			<!-- /wp:group --></div>
		<!-- /wp:woocommerce/product-meta -->

		<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true,"fontSize":"extra-small"} /--></div>
	<!-- /wp:column --></div>
<!-- /wp:columns -->
