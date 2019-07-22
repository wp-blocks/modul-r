<?php
/**
 * Template part for displaying post archives and search results
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('grid__item')); ?>>

  <?php modul_r_post_image(); ?>

  <div class="article-wrapper">

    <header class="entry-header">
      <h5 class="p-category"><?php the_category('&#47; '); ?></h5>
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

  </div>

</article>

