<?php
/**
 * The template for displaying all single posts
 */

get_header();

// get theme option "sidebar enabled"
$opt_sidebar = get_theme_mod('modul_r_sidebar_enabled');

?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content/content', 'page' );

      endwhile; ?>

    </main><!-- /main -->
  </div><!-- /primary -->

  <?php if ($opt_sidebar === true) {
    get_sidebar();
  }; ?>

<?php get_footer();