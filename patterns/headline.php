<?php
/**
 * Title: Headline
 * Slug: modul-r/headline
 * Categories: header, modul-r
 */
$headline = '
	<!-- wp:query-title {"level":1,"fontSize":"xxx-large"} /-->
	<!-- wp:pattern {"slug":"modul-r/headline-meta"} /-->
';
if ( is_search() ) {
	$headline = '<!-- wp:query-title {"type":"search","showPrefix":false,"level":1,"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"className":"hero-title is-style-gradient","fontSize":"xxx-large"} /-->';
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
