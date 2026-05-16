<?php
/**
 * Title: Product Collection
 * Slug: modul-r/product-collection
 * Categories: modul-r
 * Contributors: codekraft
 */
?>
<!-- wp:woocommerce/product-collection {"queryId":3,"query":{"perPage":9,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":true,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide">
	<!-- wp:woocommerce/product-template -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"color":{"background":"#ffffff"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-background" style="background-color:#ffffff">
		<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<!-- wp:woocommerce/product-sale-badge {"align":"left","backgroundColor":"secondary-light","textColor":"secondary-dark","fontSize":"extra-small","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":{"topLeft":"24px","topRight":"24px","bottomLeft":"24px","bottomRight":"24px"},"width":"0px","style":"none"},"elements":{"link":{"color":{"text":"var:preset|color|secondary-dark"}}},"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"2"}}} /-->
		<!-- /wp:woocommerce/product-image -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)"><!-- wp:post-terms {"term":"product_cat","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"typography":{"textTransform":"uppercase","fontSize":"10px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"0","bottom":"0"}}},"textColor":"gray"} /-->

				<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"},"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary-dark"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"secondary-dark","fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

				<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","textColor":"gray","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"typography":{"fontSize":"15px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} /--></div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|30","left":"0"}},"layout":{"selfStretch":"fixed","flexSize":"32px"},"dimensions":{"minHeight":"32px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="min-height:32px;margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"is-style-fill","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"right":"0","left":"0"}},"typography":{"fontSize":"11px"},"border":{"radius":{"topLeft":"50px","topRight":"50px","bottomLeft":"50px","bottomRight":"50px"}}}} /--></div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:woocommerce/product-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
	<!-- wp:query-pagination-previous /-->

	<!-- wp:query-pagination-numbers /-->

	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:woocommerce/product-collection-no-results -->
	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
		<p class="has-medium-font-size"><strong>No results found</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>You can try <a href="#" class="wc-link-clear-any-filters">clearing any filters</a> or head to our <a href="#" class="wc-link-stores-home">store's home</a></p>
		<!-- /wp:paragraph --></div>
	<!-- /wp:group -->
	<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection -->
