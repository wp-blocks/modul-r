<?php
/**
 * The template for displaying category pages with the grid layout
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php if ( have_posts() ) : ?>

	      <?php if ( !has_post_thumbnail() ) : ?>
          <header class="entry-header page-header main-width aligncenter">
            <h1 class="page-title main-width has-title-color"><?php the_archive_title(); ?></h1>
            <?php the_archive_description(); ?>
          </header>
        <?php else: ?>
          <div aria-hidden="true" class="wp-block-spacer content-head-spacer"></div>
        <?php endif; ?>

        <div class="masonry-container main-width alignwide">
          <div id="masonry-wrapper">

            <div class="grid__col-sizer"></div>
            <div class="grid__gutter-sizer"></div>

            <?php
            // create the masonry wrapper
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content/content', 'masonry' );
            endwhile;
            ?>

          </div>
        </div>

        <?php modul_r_masonry_nav(); ?>

        <?php
        // If no content, include the "No posts found" template.
        else :
          get_template_part( 'template-parts/content/content', 'none' );
        endif; ?>

    </main><!-- /main -->
</div><!-- /primary -->

<?php
get_footer();
