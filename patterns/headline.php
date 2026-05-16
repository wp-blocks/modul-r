<?php
/**
 * Title: Headline
 * Slug: modul-r/headline
 * Categories: headlines, modul-r
 */

$headline = '
	<!-- wp:post-title {"level":1,"className":"is-style-gradient","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase"}},"fontSize":"xxx-large"} /-->
	<!-- wp:pattern {"slug":"modul-r/headline-meta"} /-->
';
if ( is_search() ) {
	$headline = '<!-- wp:query-title {"type":"search","textAlign":"center","showSearchTerm":false,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"xx-large"} /-->';
} else if (is_archive()) {
	$headline = '<!-- wp:query-title {"type":"archive","showPrefix":false,"level":1,"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"className":"hero-title is-style-gradient","fontSize":"xxx-large"} /-->';
} else if (is_shop() || is_product_category() || is_product_tag()) {
	$headline = '<!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"4rem"}},"textColor":"background"} /-->';
} else if ( is_front_page() ) {
	$headline = '
		<!-- wp:query-title {"level":1,"fontSize":"xxx-large"} /-->
		<!-- wp:pattern {"slug":"modul-r/headline-meta"} /-->
	';
}
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)">
	<?php echo $headline; ?>
</div>
<!-- /wp:group -->
