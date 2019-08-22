<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php modul_r_post_image(); ?>

  <header class="entry-header main-width">
		<?php the_title( '<h1 class="entry-title has-secondary-color">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

  <footer class="entry-footer main-width">
	  <?php modul_r_social_sharer(); ?>
	  <?php modul_r_relateds(); ?>
  </footer>

</article>
