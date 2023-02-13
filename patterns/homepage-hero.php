<?php
/**
 * Title: HomePage Hero
 * Slug: modul-r/homepage-hero
 * Categories: header, modul-r
 */
?>
<!-- wp:cover {"useFeaturedImage":true,"overlayColor":"black","minHeight":100,"minHeightUnit":"vh","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover"
	 style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);min-height:100vh">
	<span aria-hidden="true"
		  class="wp-block-cover__background has-black-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group"
				 style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">
				<!-- wp:site-title {"textAlign":"center","isLink":false,"style":{"typography":{"fontSize":"5rem"}},"textColor":"white"} /-->

				<!-- wp:paragraph {"align":"center","textColor":"primary"} -->
				<p class="has-text-align-center has-primary-color has-text-color">Lorem ipsum dolor
					sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
					aliqua.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Button A</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a
								class="wp-block-button__link has-white-color has-text-color wp-element-button">Button
							B</a></div>
					<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
			<!-- /wp:group --></div>
		<!-- /wp:group --></div>
</div>
<!-- /wp:cover -->
