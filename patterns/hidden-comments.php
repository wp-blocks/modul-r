<?php
/**
 * Title: Hidden Comments
 * Slug: modul-r/hidden-comments
 * Inserter: no
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:comments -->
	<div class="wp-block-comments"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"0","top":"var:preset|spacing|70"},"padding":{"top":"0","bottom":"0"}}}} -->
		<h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:0;padding-top:0;padding-bottom:0">Comments</h2>
		<!-- /wp:heading -->

		<!-- wp:comments-title {"level":3,"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|50"}}},"textColor":"gray-dark","fontSize":"default"} /-->

		<!-- wp:comment-template -->
		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns" style="margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:column {"width":"40px"} -->
			<div class="wp-block-column" style="flex-basis:40px"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /--></div>
			<!-- /wp:column -->

			<!-- wp:column {"layout":{"type":"default"}} -->
			<div class="wp-block-column"><!-- wp:comment-author-name /-->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
				<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:comment-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} /-->

					<!-- wp:comment-edit-link {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} /--></div>
				<!-- /wp:group -->

				<!-- wp:comment-content {"style":{"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"white-smoke"} /-->

				<!-- wp:comment-reply-link {"textAlign":"right","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"},"padding":{"right":"var:preset|spacing|60","left":"0"}}}} /--></div>
			<!-- /wp:column --></div>
		<!-- /wp:columns -->
		<!-- /wp:comment-template -->

		<!-- wp:comments-pagination {"paginationArrow":"arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:comments-pagination-previous /-->

		<!-- wp:comments-pagination-numbers /-->

		<!-- wp:comments-pagination-next /-->
		<!-- /wp:comments-pagination -->

		<!-- wp:post-comments-form {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|70"}}},"fontSize":"default"} /--></div>
	<!-- /wp:comments --></div>
<!-- /wp:group -->
