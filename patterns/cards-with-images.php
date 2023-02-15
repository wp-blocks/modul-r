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
$image_src     = esc_url( get_theme_file_uri( 'img/demo/WordPress-logotype-alt-background.avif' ) );
$template      = '<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"align":"center"} -->
			<figure class="wp-block-image aligncenter alignfull size-full"><img src="' . $image_src . '" alt="" /></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="has-text-align-center"><strong>Title</strong></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Lorem ipsum dolor
				sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
				aliqua.</p>
			<!-- /wp:paragraph --></div>
		<!-- /wp:column -->'
?>
<!-- wp:columns -->
<div class="wp-block-columns">
	<?php for ( $i = 1; $i <= $column_number; $i++ ) { echo $template; } ?>
</div><!-- /wp:columns -->

