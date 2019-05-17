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

	<?php modu_post_image(); ?>

	<header class="entry-header main-width alignwide">

    <p class="breadcrumbs"><?php modu_breadcrumbs(); ?></p>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php modu_meta(); ?>

	</header>


	<div class="entry-content">
		<?php the_content(); ?>

    <?php if ( is_singular( 'attachment' ) ) {

      the_post_navigation(
        array(
          /* translators: %s: parent post link */
          'prev_text' => sprintf( __( '<span class="meta-nav">Attachment published in</span><span class="post-title">%s</span>', 'modu' ), '%title' ),
        )
      );

    } elseif ( is_singular( 'post' ) ) {

      // Previous/next post navigation.
      printf( '<div class="post-navigation">%s</div>', modu_post_nav() );

    } ?>
	</div><!-- /entry-content -->


	<footer class="entry-footer main-width">

	  <?php modu_tags(); ?>

	  <?php modu_social_sharer(); ?>

    <?php modu_relateds(); ?>

	</footer><!-- /entry-footer -->


  <div class="entry-comments main-width">
	  <?php modu_comments(); ?>
  </div>

</article><!-- /post -->
