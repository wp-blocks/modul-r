<?php
/**
 * Title: Three cards
 * Description: Three cards side by side
 * Slug: modul-r/cards
 * Categories: modul-r
 */
?>
<?php
$column_number = 3;
$template      = '<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3
				class="has-text-align-center has-secondary-color has-text-color"><strong>
				<strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p
				class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph -->
	</div> <!-- /wp:column -->';
?>
<!-- wp:columns -->
<div class="wp-block-columns">
	<?php for ( $i = 1; $i <= $column_number; $i++ ) { echo $template; } ?>
</div><!-- /wp:columns -->

