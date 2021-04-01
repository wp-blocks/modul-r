<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

  <?php if ( have_posts() ) : ?>

    <?php if ( !has_post_thumbnail() ) : ?>
    <header class="page-header">
      <?php the_archive_title( '<h1 class="page-title main-width has-title-color">', '</h1>' ); ?>
      <?php if (is_author()) {
        printf('<p>%s</p>', esc_html(get_the_author_meta( 'description' )) );
      } else if (is_tag()) {
        the_archive_description();
      } ?>
    </header>
    <?php endif; ?>

    <?php // Start the Loop.
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content/content', 'excerpt' );
    endwhile;

    // Previous/next page navigation.
    printf( '<div class="main-width alignwide text-center">%s</div>', modul_r_archive_nav() );

  // If no content, include the "No posts found" template.
  else :

    get_template_part( 'template-parts/content/content', 'none' );

  endif;
  ?>
  </main><!-- /main -->
</div><!-- /primary -->

<?php

get_footer();
