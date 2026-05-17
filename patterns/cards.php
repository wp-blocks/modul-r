<?php
/**
 * Title: Three cards
 * Description: Three cards side by side
 * Slug: modul-r/cards
 * Categories: modul-r
 */
$column_number = 3;
$template      = '<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"},"width":"1px"},"shadow":"var:preset|shadow|deep","elements":{"link":{"color":{"text":"var:preset|color|gray"}}}},"textColor":"gray","borderColor":"white-smoke"} -->
<div class="wp-block-column has-border-color has-white-smoke-border-color has-gray-color has-text-color has-link-color" style="border-width:1px;border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);box-shadow:var(--wp--preset--shadow--deep)">
	<!-- wp:codekraft/oh-my-svg {"svg":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 fill=\u0022none\u0022 viewBox=\u00220 0 24 24\u0022 stroke-width=\u00221.5\u0022 stroke=\u0022currentColor\u0022 class=\u0022size-6\u0022\u003e   \u003cpath stroke-linecap=\u0022round\u0022 stroke-linejoin=\u0022round\u0022 d=\u0022M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z\u0022\u003e\u003c/path\u003e \u003c/svg\u003e","originalSvg":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 fill=\u0022none\u0022 viewBox=\u00220 0 24 24\u0022 stroke-width=\u00221.5\u0022 stroke=\u0022currentColor\u0022 class=\u0022size-6\u0022\u003e   \u003cpath stroke-linecap=\u0022round\u0022 stroke-linejoin=\u0022round\u0022 d=\u0022M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z\u0022\u003e\u003c/path\u003e \u003c/svg\u003e","height":87,"width":87,"align":"center"} -->
	<div style="display:table;width:inherit" class="wp-block-codekraft-oh-my-svg aligncenter">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" width="87" height="87">
			<path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"></path>
		</svg>
	</div>
	<!-- /wp:codekraft/oh-my-svg -->

	<!-- wp:heading {"textAlign":"center","level":3,"className":"is-style-default","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"extra-large","fontFamily":"default"} -->
	<h3 class="wp-block-heading has-text-align-center is-style-default has-default-font-family has-extra-large-font-size" style="font-style:normal;font-weight:300"><strong><strong>Card Title</strong></strong></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->';
?>
<!-- wp:columns -->
<div class="wp-block-columns">
	<?php
	for ( $i = 1; $i <= $column_number; $i ++ ) {
		echo $template;
	}
	?>
</div>
<!-- /wp:columns -->

