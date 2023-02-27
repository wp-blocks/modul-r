<?php
/**
 * Title: promo Cards
 * Slug: modul-r/cards-promotional
 * Categories: modul-r
 */
?>
<?php
$column_number = 3;
$image_src     = esc_url( get_theme_file_uri( 'img/demo/WordPress-logotype-alt-background.avif' ) );
$template      = '<!-- wp:cover {"id":134,"dimRatio":90,"overlayColor":"primary","align":"center","className":"is-style-traversal-clip"} -->
	<div class="wp-block-cover aligncenter is-style-traversal-clip"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":3,"textColor":"white","fontSize":"xx-large"} -->
				<h3 class="has-text-align-center has-white-color has-text-color has-xx-large-font-size"><strong>Card Title</strong></h3>
				<!-- /wp:heading -->

				<!-- wp:separator {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-light","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-primary-light-color has-alpha-channel-opacity has-primary-light-background-color has-background is-style-default" style="margin-top:0;margin-bottom:0"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph {"align":"center","textColor":"white"} -->
				<p class="has-text-align-center has-white-color has-text-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Buy now!</a></div>
					<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
			<!-- /wp:group --></div></div>
	<!-- /wp:cover -->'
?>
<!-- wp:cover {"overlayColor":"gray-dark","minHeight":78,"className":"is-style-wave-clip"} -->
<div class="wp-block-cover is-style-wave-clip" style="min-height:78px">
	<span aria-hidden="true" class="wp-block-cover__background has-gray-dark-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
		<p class="has-text-align-center has-large-font-size"></p>
		<!-- /wp:paragraph --></div>
</div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"className":"is-style-items-overlap","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-items-overlap"
	 style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<?php
		for ( $i = 1; $i <= $column_number; $i ++ ) {
			echo $template;
		}
		?>
	</div>
	<!-- /wp:group --></div>
<!-- /wp:group -->
