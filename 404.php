<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <div class="error-404 not-found">
                <header class="page-header main-width">
                    <h1 class="page-title">404</h1>
                    <h2 class="text-center"><?php _e('Page not found', 'modu'); ?></h2>
                </header><!-- /page-header -->

                <div class="page-content main-width">

                    <p class="text-center"><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'modu'); ?></p>

                    <div>
                      <?php get_search_form(); ?>
                    </div>

                    <div class="entry-footer">
                      <?php modu_relateds(); ?>
                    </div>

                </div><!-- /page-content -->
            </div><!-- /error-404 -->

        </main><!-- /main -->
    </section><!-- /primary -->

<?php
get_footer();