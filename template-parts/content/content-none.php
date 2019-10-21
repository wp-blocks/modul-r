<?php
/**
 * Template part for displaying posts
 */

?>

<header class="entry-header main-width alignwide">

  <?php modul_r_breadcrumbs(); ?>

  <h1 class="entry-title has-primary-color"><?php esc_html_e( 'Nothing Found', 'modul-r' ); ?></h1>

</header>

<div class="entry-content">
  <p class="text-center">
    <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'modul-r' ); ?>
  </p>
</div><!-- /entry-content -->

<footer class="entry-footer main-width">

  <div>
    <?php get_search_form(); ?>
  </div>

  <div class="entry-footer">
    <?php modul_r_relateds(); ?>
  </div>

</footer><!-- /entry-footer -->

