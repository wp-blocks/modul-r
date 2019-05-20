<?php
/**
 * Template part for displaying page content in page.php
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php modu_post_image(); ?>

	<div class="entry-content">

    <header class="entry-header main-width">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

		<?php	the_content();?>

	</div><!-- /entry-content -->

  <footer class="entry-footer main-width">

	  <?php modu_social_sharer(); ?>

  </footer>

	<?php if ( comments_open() || get_comments_number() ) { ?>
      <div class="entry-comments main-width">
  		  <?php modu_comments(); ?>
      </div>
	<?php } ?>

</article>
