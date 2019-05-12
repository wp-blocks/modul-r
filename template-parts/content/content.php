<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php print_post_image(); ?>

  <header class="entry-header main-width">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">Pagine: ',
				'after'  => '</div>',
			)
		);
		?>
	</div>

  <footer class="article-footer main-width">

    <div class="article-metas">

			<?php print_tags(); ?>

    </div>

  </footer>

	<?php print_comments(); ?>

</article>
