<?php
/**
 * Title: Cards with an image as background
 * Description: Three cards side by side with a cover image that fills the whole card
 * Slug: modul-r/cards-with-covers
 * Categories: modul-r
 */
?>
<?php
$column_number = 3;
$image_src     = esc_url( get_theme_file_uri( 'img/demo/WordPress-logotype-alt-background.avif' ) );
$template      = '<!-- wp:column --><div class="wp-block-column"><!-- wp:cover {"url":"' . $image_src . '","id":1234,"dimRatio":50,"overlayColor":"secondary","align":"full","className":"has-background-dim","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-cover alignfull has-background-dim" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1234" alt="" src="' . $image_src . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
					<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
						<p class="has-text-align-center has-large-font-size" style="font-style:normal;font-weight:700">Title</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center"} -->
						<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
						<!-- /wp:paragraph --></div>
					<!-- /wp:group --></div></div>
			<!-- /wp:cover --></div>
		<!-- /wp:column -->';
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns -->
	<div class="wp-block-columns">
		<?php 
		for ( $i = 1; $i <= $column_number; $i++ ) {
			echo $template;}
		?>
	</div><!-- /wp:columns -->
</div><!-- /wp:group -->
