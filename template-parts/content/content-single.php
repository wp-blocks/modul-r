<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header page-header main-width text-center">

	<?php
	modul_r_breadcrumbs();

	the_title( '<h1 class="entry-title has-title-color">', '</h1>' );

	modul_r_meta();
	?>

	</header>


	<div class="entry-content">

	<?php

	the_content();

	if ( is_singular( 'attachment' ) ) {

		print_r( wp_get_attachment_metadata( $post->ID ) );

		the_post_navigation(
			array(
				/* translators: %s: parent post link */
				'prev_text' => sprintf( '<span class="meta-nav">%s</span><span class="post-title">%s</span>', __( 'Attachment published in', 'modul-r' ), '%title' ),
			)
		);

	} elseif ( is_singular( 'post' ) ) {

		// Previous/next post navigation.
		printf( '<div class="post-navigation">%s</div>', modul_r_page_links() );

	}

	?>
	</div><!-- /entry-content -->


	<footer class="entry-footer main-width">

		<?php modul_r_author(); ?>

		<?php modul_r_tags(); ?>

		<?php modul_r_social_sharer(); ?>

		<?php modul_r_post_nav(); ?>

		<?php modul_r_relateds(); ?>

	</footer><!-- /entry-footer -->

  <?php if ( comments_open() || get_comments_number() ) { ?>
	<div class="entry-comments main-width">
		<?php modul_r_comments(); ?>
	</div>
  <?php } ?>

</article><!-- /post -->
