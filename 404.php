<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <div class="error-404 not-found">

        <header class="entry-header page-header main-width text-center">
          <h1 class="page-title has-title-color"><?php esc_html_e('404', 'modul-r'); ?></h1>
          <h2 class="text-center"><?php esc_html_e('Page not found', 'modul-r'); ?></h2>
        </header><!-- /page-header -->

        <div class="page-content main-width">

          <p class="text-center"><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'modul-r'); ?></p>

          <div>
			      <?php get_search_form(); ?>
          </div>

          <div class="entry-footer">
			      <?php modul_r_relateds(); ?>
          </div>

        </div><!-- /page-content -->
      </div><!-- /error-404 -->

    </main><!-- /main -->
  </div><!-- /primary -->

<?php
get_footer();