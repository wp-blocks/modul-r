<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php if ( have_posts() ) :

        // Load posts loop.
        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content/content' );

        endwhile;

      endif; ?>
    </main>
  </div>

<?php get_footer();
