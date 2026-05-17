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
	<!-- wp:categories {"className":"modulr-grid-buttons"} /-->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null,"format":[]},"align":"wide","className":"is-style-masonry-layout","layout":{"type":"default"}} -->
		<div class="wp-block-query alignwide is-style-masonry-layout">

			<!-- wp:pattern {"slug":"modul-r/grid-post"} /-->

			<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:query-pagination-previous {"label":"Newer Posts"} /-->

			<!-- wp:query-pagination-next {"label":"Older Posts"} /-->
			<!-- /wp:query-pagination -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
