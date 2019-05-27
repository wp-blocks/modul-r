<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php modu_post_image(); ?>

  <header class="entry-header main-width">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content();

      modu_page_links();
		?>
	</div>

  <footer class="article-footer main-width">

    <div class="article-metas">

	    <?php modu_social_sharer(); ?>

      <?php modu_archive_nav(); ?>

    </div>

  </footer>

</article>
