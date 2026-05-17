<?php
/**
 * Title: Footer Main Content
 * Slug: modul-r/footer-main
 * Block Types: core/template-part/footer
 * Categories: footer, modul-r
 */

?>
<!-- wp:columns {"style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60"},"blockGap":{"left":"var:preset|spacing|box-padding"}}}} -->
<div class="wp-block-columns" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
	<!-- wp:column {"width":"36%","style":{"spacing":{"blockGap":"var:preset|spacing|box-padding"}}} -->
	<div class="wp-block-column" style="flex-basis:36%">
		<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|box-padding","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--box-padding);padding-left:0">
			<!-- wp:site-logo /-->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"text-color","fontSize":"default"} -->
			<p class="has-text-color-color has-text-color has-default-font-size" style="font-style:normal;font-weight:400"></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"background","iconColorValue":"background","iconBackgroundColor":"secondary-dark","iconBackgroundColorValue":"secondary-light","openInNewTab":true,"size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
			<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color"></ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"20%","style":{"spacing":{"padding":{"right":"var:preset|spacing|box-padding","left":"0"}}}} -->
	<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--box-padding);padding-left:0;flex-basis:20%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"secondary-dark","fontSize":"medium"} -->
			<h2 class="wp-block-heading has-secondary-dark-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:500"><strong>Posts</strong></h2>
			<!-- /wp:heading -->

			<!-- wp:latest-posts {"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":75,"featuredImageSizeHeight":75,"style":{"typography":{"lineHeight":"1.2"},"spacing":{"padding":{"top":"var:preset|spacing|30"}}},"fontSize":"small"} /--></div>
		<!-- /wp:group --></div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"20%","style":{"spacing":{"padding":{"right":"var:preset|spacing|box-padding","left":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--box-padding);padding-left:0;flex-basis:20%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="padding-top:0">
			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"secondary-dark","fontSize":"medium"} -->
			<h2 class="wp-block-heading has-secondary-dark-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:500"><strong>Featured</strong></h2>
			<!-- /wp:heading -->

			<!-- wp:navigation {"openSubmenusOnClick":true,"overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|30"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"}} /--></div>
		<!-- /wp:group --></div>
	<!-- /wp:column --></div>
<!-- /wp:columns -->
