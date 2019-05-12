<?php
/**
 * Template part for displaying post archives and search results
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('main-width alignwide') ); ?>>

  <?php print_post_image(); ?>

  <div class="article-wrapper">

    <header class="entry-header">
      <?php

      if ( is_sticky() && is_home() && ! is_paged() ) {
        echo '<span class="sticky-post">sticky</span>';
      }

      the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

      ?>
    </header><!-- /entry-header -->

    <div>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- /entry-content -->

        <footer class="entry-footer">
	          <?php print_footer_meta(); ?>
        </footer>
    </div>
  </div>
</article>
