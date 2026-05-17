<?php
/**
 * Title: Product Loop
 * Slug: modul-r/product-loop
 * Categories: modul-r
 * Inserter: false
 */
?>
<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<!-- wp:woocommerce/product-sale-badge {"align":"left","backgroundColor":"secondary-light","textColor":"secondary-dark","fontSize":"extra-small","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":{"topLeft":"24px","topRight":"24px","bottomLeft":"24px","bottomRight":"24px"},"width":"0px","style":"none"},"elements":{"link":{"color":{"text":"var:preset|color|secondary-dark"}}},"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"2"}}} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
		<!-- wp:post-terms {"term":"product_cat","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"typography":{"textTransform":"uppercase","fontSize":"10px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"0","bottom":"0"}}},"textColor":"gray"} /-->
		<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"},"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary-dark"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"secondary-dark","fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
		<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","textColor":"gray","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"typography":{"fontSize":"15px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|30","left":"0"}},"layout":{"selfStretch":"fixed","flexSize":"32px"},"dimensions":{"minHeight":"32px"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="min-height:32px;margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--30);padding-left:0">
		<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"is-style-fill","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"right":"0","left":"0"}},"typography":{"fontSize":"11px"},"border":{"radius":{"topLeft":"50px","topRight":"50px","bottomLeft":"50px","bottomRight":"50px"}}}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
