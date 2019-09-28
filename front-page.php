<?php get_header();

    if (is_home()) { ?>

      <div id="primary" class="content-area">
        <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

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

        </main>
      </div>

	    <?php

    } else {

	    if ( have_posts() ) {

		    // Load posts loop.
		    while ( have_posts() ) {
			    the_post();

			    get_template_part( 'template-parts/content/content', 'homepage' );

		    }

	    }

    }
	?>

<?php get_footer();
