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
                <header class="page-header">
                    <h1 class="page-title">404</h1>
                    <h4>Page not found</h4>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p>A questo indirizzo non è stato trovato nulla, puoi provare con la ricerca</p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </div><!-- .error-404 -->

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();