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

      modu_post_nav();
		?>
	</div>

  <footer class="article-footer main-width">

    <div class="article-metas">

			<?php modu_tags(); ?>

    </div>

  </footer>

	<?php modu_comments(); ?>

</article>
