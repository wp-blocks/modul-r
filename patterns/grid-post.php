<?php
/**
 * Title: Grid Post
 * Slug: modul-r/grid-post
 * Categories: modul-r
 * Inserter: false
 */
?>
<!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":4,"minimumColumnWidth":null}} -->
<!-- wp:group {"className":"alignwide is-style-card","style":{"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}},"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"blockGap":"0"}},"backgroundColor":"background"} -->
<div class="wp-block-group alignwide is-style-card has-background-background-color has-background" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"","align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
		<!-- wp:post-date {"textAlign":"left","metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|gray"},":hover":{"color":{"text":"var:preset|color|gray-dark"}}}},"spacing":{"padding":{"bottom":"0"}}},"textColor":"gray","fontSize":"extra-small"} /-->

		<!-- wp:post-title {"isLink":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->

		<!-- wp:post-excerpt {"excerptLength":20} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
