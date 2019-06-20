<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php modul_r_post_image('parallax'); ?>

	<header class="entry-header main-width alignwide">

    <p class="breadcrumbs"><?php modul_r_breadcrumbs(); ?></p>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php modul_r_meta(); ?>

	</header>


	<div class="entry-content">
		<?php the_content(); ?>

    <?php if ( is_singular( 'attachment' ) ) {

      the_post_navigation(
        array(
          /* translators: %s: parent post link */
          'prev_text' => sprintf( __( '<span class="meta-nav">Attachment published in</span><span class="post-title">%s</span>',  'modul-r' ), '%title' ),
        )
      );

    } elseif ( is_singular( 'post' ) ) {

      // Previous/next post navigation.
      printf( '<div class="post-navigation">%s</div>', modul_r_page_links() );

    } ?>
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
