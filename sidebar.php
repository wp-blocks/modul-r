<?php
/**
 * The sidebar containing the main widget area.
 */

if ( ! is_active_sidebar( 'Main Sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'Main Sidebar' ); ?>
</div><!-- /secondary -->
