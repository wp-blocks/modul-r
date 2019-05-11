<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
    <div class="interactive featured-image">
			<?php the_post_thumbnail('fullwidth', array('class' => 'fit-image wp-post-image')); ?>
    </div>
	<?php endif; ?>
  <!-- /post thumbnail -->

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

			<?php if( has_tag() ): ?>
        <div class="tags">
          <h4>Tag:</h4>
					<?php the_tags( '<li class="tag">', '</li><li class="tag">', '</li>');  ?>
        </div>
			<?php endif; ?>

    </div>

  </footer>

	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

</article>
