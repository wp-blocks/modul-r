<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
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

	<header class="entry-header main-width alignwide">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><h4><?php the_author_meta( 'display_name' ); ?></h4></a>
    <a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?>">
      <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
				<?php the_date(); ?> <?php the_time(); ?>
      </time>
    </a>
    <p>commenti: <?php echo get_comment_count(); ?></p>

	</header>


	<div class="entry-content">
		<?php

    the_content(); // Dynamic Content

		if ( is_singular( 'attachment' ) ) {
			// Parent post navigation.
			the_post_navigation(
				array(
					/* translators: %s: parent post link */
					'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'cktheme' ), '%title' ),
				)
			);
		} elseif ( is_singular( 'post' ) ) {
			// Previous/next post navigation.
			the_post_navigation(
				array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">Next Post</span> ' .
					               '<span class="screen-reader-text">Next post:</span> <br/>' .
					               '<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">Previous Post</span> ' .
					               '<span class="screen-reader-text">Previous post:</span> <br/>' .
					               '<span class="post-title">%title</span>',
				)
			);
		}

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->
