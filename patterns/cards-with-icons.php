<?php
/**
 * Title: Cards with icons (overlap the element to the top)
 * Description: Useful for Homepage Cards with icons will overlap the element to the top (for example the hero
 * Slug: modul-r/cards-with-icons
 * Categories: modul-r
 */
?>
<?php
$column_number = 3;
$image_src     = esc_url( get_theme_file_uri( 'img/demo/wapuu-original.avif' ) );
$template      = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"className":"is-style-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"align":"center","id":134,"width":150,"height":150,"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image aligncenter size-full is-resized"><img src="' . $image_src . '" alt="" class="wp-image-134" width="150" height="150"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":3,"textColor":"black"} -->
				<h3 class="has-text-align-center has-black-color has-text-color"><strong>Card Title</strong></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"gray-dark"} -->
				<p class="has-text-align-center has-gray-dark-color has-text-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				<!-- /wp:paragraph --></div>
			<!-- /wp:group --></div>
		<!-- /wp:group -->'
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<?php
		for ( $i = 1; $i <= $column_number; $i++ ) {
			echo $template; }
		?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
