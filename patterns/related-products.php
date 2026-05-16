<?php
/**
 * Title: Related Products
 * Slug: modul-r/related-products
 * Categories: modul-r
 * Contributors: codekraft
 */
?>
<!-- wp:woocommerce/product-collection {"queryId":2,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":true,"previewMessage":"Actual products will vary depending on the product being viewed."},"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide">
	<!-- wp:heading {"textAlign":"left","level":3,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} -->
	<h3 class="wp-block-heading has-text-align-left" style="margin-bottom:1rem">Related Products</h3>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/product-template -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"color":{"background":"#ffffff"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-background" style="background-color:#ffffff">
			<!-- wp:pattern {"slug":"modul-r/product-loop"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:woocommerce/product-template -->
</div>
<!-- /wp:woocommerce/product-collection -->
