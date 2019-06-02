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
          <h1 class="page-title main-width"><?php single_cat_title(); ?></h1>
        </header>

        <div class="masonry-container">
          <div id ="masonry-wrapper" class="main-width alignwide">

            <div class="grid__col-sizer"></div>
            <div class="grid__gutter-sizer"></div>

              <?php
                // create the masonry wrapper
                while ( have_posts() ) : the_post();
                  get_template_part( 'template-parts/content/content', 'masonry' );
                endwhile;
              ?>

              <?php
              // If no content, include the "No posts found" template.
              else :
              get_template_part( 'template-parts/content/content', 'none' );
            endif; ?>
          </div>
        </div>

        <div class="masonry navigation">
          <?php next_posts_link(); ?>
        </div>


        <div class="page-load-status">
          <div class="loader-ellips infinite-scroll-request">
            <img src="<?php echo get_template_directory_uri() ?>/assets/src/img/elements/loader.svg" alt="wait! loading">
          </div>
          <p class="infinite-scroll-last"><?php _e('End of content',  'modul-r' ); ?></p>
          <p class="infinite-scroll-error"><?php _e('No more pages to load',  'modul-r' ); ?></p>
        </div>

    </main><!-- /main -->
</section><!-- /primary -->

<?php
get_footer();
