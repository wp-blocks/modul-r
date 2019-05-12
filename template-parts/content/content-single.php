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

	<?php print_post_image(); ?>

	<header class="entry-header main-width alignwide">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php print_footer_meta(); ?>

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
