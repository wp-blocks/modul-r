<?php
/**
 * Title: Cards with images (overlap the element to the top)
 * Description: Three cards side by side with an image that fills the entire width
 * Slug: modul-r/cards-with-images
 * Categories: text, modul-r
 */
?>
<!-- wp:columns {"align":"wide","className":"card-columns"} -->
<div class="wp-block-columns alignwide card-columns"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"align":"full","id":1234,"sizeSlug":"full","linkDestination":"custom"} -->
		<figure class="wp-block-image alignfull size-full"><img src="'. esc_url(get_template_directory_uri()) . '/img/WordPress-logotype-alt-background.avif" class="wp-image-1234"/></figure> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong>Title</strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"align":"full","id":1234,"sizeSlug":"full","linkDestination":"custom"} -->
		<figure class="wp-block-image alignfull size-full"><img src="'. esc_url(get_template_directory_uri()) . '/img/WordPress-logotype-alt-background.avif" class="wp-image-1234"/></figure> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong> <strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"align":"full","id":1234,"sizeSlug":"full","linkDestination":"custom"} -->
		<figure class="wp-block-image alignfull size-full"><img src="'. esc_url(get_template_directory_uri()) . '/img/WordPress-logotype-alt-background.avif" class="wp-image-1234"/></figure> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong> <strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --></div> <!-- /wp:columns -->
