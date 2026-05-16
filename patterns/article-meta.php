<?php
/**
 * Title: Article Metadata
 * Slug: modul-r/article-meta
 * Categories: headlines, modul-r
 */
?>
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
	<!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"}}}},"textColor":"primary-dark"} /-->

	<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
	<p class="has-white-color has-text-color has-link-color">/</p>
	<!-- /wp:paragraph -->

	<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"}}}},"textColor":"primary-dark"} /-->

	<!-- wp:post-author-name {"isLink":true,"className":"hide"} /-->
</div>
<!-- /wp:group -->
