<?php
/**
 * Template part for displaying page content in page.php
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php	the_content();?>
	</div><!-- /entry-content -->

  <footer class="entry-footer main-width">
	  <?php modul_r_social_sharer(); ?>
  </footer>

	<?php if ( comments_open() || get_comments_number() ) { ?>
      <div class="entry-comments main-width">
  		  <?php modul_r_comments(); ?>
      </div>
	<?php } ?>

</article>
