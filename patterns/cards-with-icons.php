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
$template      = '<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"align":"center","width":160,"height":160} -->
			<figure class="wp-block-image aligncenter is-resized"><img src="' . $image_src . '" alt="" width="160" height="160"/></figure>
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
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns -->
	<div class="wp-block-columns">
		<?php 
		for ( $i = 1; $i <= $column_number; $i++ ) {
			echo $template;}
		?>
	</div><!-- /wp:columns -->
</div><!-- /wp:group -->
