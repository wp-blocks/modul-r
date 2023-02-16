<?php
/**
 * Title: Media with a bold title and two buttons
 * Slug: modul-r/media-and-bold-text
 * Categories: modul-r
 */
?>
<?php
$image_src     = esc_url( get_theme_file_uri( 'build/img/demo/wapuu-original.avif' ) );
?>
<!-- wp:media-text {"mediaId":134,"mediaLink":"<?php echo $image_src ?>","mediaType":"image","mediaWidth":39,"imageFill":false} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:39% auto"><figure class="wp-block-media-text__media"><img src="<?php echo $image_src ?>" alt="" class="wp-image-134 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"8rem"}},"textColor":"secondary","className":"is-style-default"} -->
			<h1 class="is-style-default has-secondary-color has-text-color" style="font-size:8rem">Install NodeJS</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>First you need to download and install&nbsp;<strong>NodeJS</strong>&nbsp;from the link below:</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
			<div class="wp-block-buttons"><!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Download</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">More Info</a></div>
				<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
		<!-- /wp:group --></div></div>
<!-- /wp:media-text -->
