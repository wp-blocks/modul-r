<?php
/**
 * Template part for displaying page content in page.php
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header main-width alignwide">
	  <?php the_title( '<h1 class="entry-title has-title-color">', '</h1>' ); ?>
  </header>

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
