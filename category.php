<?php
/**
 * The template for displaying category pages with the grid layout
 */

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <?php the_archive_title( '<h1 class="page-title main-width">', '</h1>' ); ?>
        </header>


        <div class="masonry main-width alignwide">
          <div id="masonry-wrapper" class="row">

            <?php
              // create the masonry wrapper
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content/content', 'masonry' );
              endwhile;
            ?>

            <div class="navigation">
              <?php next_posts_link(); ?>
            </div>

            <?php
            // If no content, include the "No posts found" template.
            else :
            get_template_part( 'template-parts/content/content', 'none' );
          endif; ?>

          </div>
        </div>
    </main><!-- /main -->
</section><!-- /primary -->

<?php
get_footer();
