<?php
/**
 * Title: Cards with images (overlap the element to the top)
 * Description: Three cards side by side with an image that fills the entire width
 * Slug: modul-r/cards-with-images
 * Categories: modul-r
 */
?>
<?php
$column_number = 3;
$image_src     = esc_url( get_theme_file_uri( 'build/img/demo/WordPress-logotype-alt-background.avif' ) );
$template      = '<!-- wp:group {"style":{"spacing":{}},"className":"is-style-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-card"><!-- wp:image {"align":"full","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image alignfull size-full"><img src="'.$image_src.'" alt="" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":3,"textColor":"black","fontSize":"large"} -->
					<h3 class="has-text-align-left has-black-color has-text-color has-large-font-size"><strong>Card Title</strong></h3>
					<!-- /wp:heading -->

					<!-- wp:post-date {"textColor":"gray","fontSize":"extra-small"} /--></div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"align":"left","textColor":"gray","fontSize":"small"} -->
				<p class="has-text-align-left has-gray-color has-text-color has-small-font-size">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
				<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary","align":"right","fontSize":"extra-small"} -->
					<div class="wp-block-button alignright has-custom-font-size has-extra-small-font-size"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button">OK</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline","fontSize":"extra-small"} -->
					<div class="wp-block-button has-custom-font-size is-style-outline has-extra-small-font-size"><a class="wp-block-button__link wp-element-button">NO</a></div>
					<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
			<!-- /wp:group --></div>
		<!-- /wp:group -->'
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
	<?php
	for ( $i = 1; $i <= $column_number; $i++ ) {
		echo $template;
	}
	?>
	</div>
	<!-- /wp:group --></div>
<!-- /wp:group -->
