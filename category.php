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
          <?php echo category_description(); ?>
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

          </div>
        </div>

	      <?php modul_r_masonry_nav(); ?>

        <?php
        // If no content, include the "No posts found" template.
        else :
          get_template_part( 'template-parts/content/content', 'none' );
        endif; ?>

    </main><!-- /main -->
</section><!-- /primary -->

<?php
get_footer();
