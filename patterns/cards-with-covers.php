<?php
/**
 * Title: Cards with image background (overlap the element to the top)
 * Description: Three cards side by side with a cover image that fills the whole card
 * Slug: modul-r/cards-with-covers
 * Categories: text, modul-r
 */
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"-100px","bottom":"var:preset|spacing|70"}}},"className":"card-columns"} -->
	<div class="wp-block-columns card-columns" style="margin-top:-100px;margin-bottom:var(--wp--preset--spacing--70)"><!-- wp:column -->
		<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()) ?>/img/demo/WordPress-logotype-alt-background.avif","id":1234,"dimRatio":50,"align":"full","className":"has-background-dim","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-cover alignfull has-background-dim" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1234" alt="" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/demo/WordPress-logotype-alt-background.avif" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
					<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
						<p class="has-text-align-center has-large-font-size" style="font-style:normal;font-weight:700">Title</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center"} -->
						<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
						<!-- /wp:paragraph --></div>
					<!-- /wp:group --></div></div>
			<!-- /wp:cover --></div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()) ?>/img/demo/WordPress-logotype-alt-background.avif","id":1234,"dimRatio":50,"align":"full","className":"has-background-dim","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-cover alignfull has-background-dim" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1234" alt="" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/demo/WordPress-logotype-alt-background.avif" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
					<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
						<p class="has-text-align-center has-large-font-size" style="font-style:normal;font-weight:700">Title</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center"} -->
						<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
						<!-- /wp:paragraph --></div>
					<!-- /wp:group --></div></div>
			<!-- /wp:cover --></div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()) ?>/img/demo/WordPress-logotype-alt-background.avif","id":1234,"dimRatio":50,"align":"full","className":"has-background-dim","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-cover alignfull has-background-dim" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1234" alt="" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/demo/WordPress-logotype-alt-background.avif" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
					<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
						<p class="has-text-align-center has-large-font-size" style="font-style:normal;font-weight:700">Title</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center"} -->
						<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
						<!-- /wp:paragraph --></div>
					<!-- /wp:group --></div></div>
			<!-- /wp:cover --></div>
		<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
<!-- /wp:group -->
