<?php
/**
 * Title: Grid
 * Slug: modul-r/grid
 * Categories: modul-r
 * Contributors: codekraft
 */
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:categories {"showPostCounts":false,"className":"modulr-grid-buttons"} /-->

	<!-- wp:query {"queryId":0,"query":{"perPage":30,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","className":"modulr-grid","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide modulr-grid"><!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"align":"wide","spacing":{"blockGap":"0"}},"className":"is-style-card card","layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide is-style-card"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"260px","align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"0","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:post-date {"textAlign":"left","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|gray"},":hover":{"color":{"text":"var:preset|color|gray-dark"}}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"0"}}},"textColor":"gray","fontSize":"extra-small"} /-->

				<!-- wp:post-title {"isLink":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->

				<!-- wp:post-excerpt {"excerptLength":20} /--></div>
			<!-- /wp:group --></div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous {"label":"Newer Posts"} /-->

		<!-- wp:query-pagination-next {"label":"Older Posts"} /-->
		<!-- /wp:query-pagination --></div>
	<!-- /wp:query --></div>
<!-- /wp:group -->
