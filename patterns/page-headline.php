<?php
/**
 * Title: Page Headline
 * Slug: modul-r/page-headline
 * Categories: header, modul-r
 */
?>
<!-- wp:group {"tagName":"main","className":"page-headline", "style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<main class="wp-block-group page-headline" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"modul-r/page-breadcrumbs"} /-->

		<!-- wp:post-title {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"fontSize":"xxx-large"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70","padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"500","letterSpacing":"1px"}},"textColor":"gray-dark","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"fontSize":"small"} -->
		<div class="wp-block-group has-gray-dark-color has-text-color has-small-font-size" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;letter-spacing:1px;line-height:1"><!-- wp:post-date /-->

			<!-- wp:paragraph {"className":"headline-divider"} -->
			<p class="headline-divider">-</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-author {"textAlign":"center","showAvatar":false } /-->

			<!-- wp:paragraph {"className":"headline-divider"} -->
			<p class="headline-divider">-</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-terms {"term":"post_tag"} /--></div>
		<!-- /wp:group -->

		<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
		<hr class="wp-block-separator has-alpha-channel-opacity" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"/>
		<!-- /wp:separator --></div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
