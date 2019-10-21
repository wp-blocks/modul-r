<?php
/**
 * Template part for displaying post archives and search results
 */

?>

<div class="article-container">
  <article id="post-<?php the_ID(); ?>" <?php post_class( array('main-width') ); ?>>

    <?php modul_r_post_image(); ?>

    <div class="article-wrapper<?php if( is_sticky() && is_home() && ! is_paged() ) {echo ' sticky';}  ?>">

      <header class="entry-header">
        <h5 class="breadcrumbs has-secondary-color"><?php the_category(' &#47; '); ?></h5>
        <?php the_title( sprintf( '<h2 class="entry-title has-primary-color"><a href="%s" rel="bookmark">', esc_url(get_permalink()) ), '</a></h2>' ); ?>
      </header><!-- /entry-header -->

      <div class="entry-content">
          <?php the_excerpt(); ?>
      </div><!-- /entry-content -->

      <footer class="entry-footer">
          <?php modul_r_meta(); ?>
      </footer>

    </div>
  </article>
</div>