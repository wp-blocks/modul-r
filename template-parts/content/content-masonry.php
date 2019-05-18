<?php
/**
 * Template part for displaying post archives and search results
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('masonry-item')); ?>>

  <?php modu_post_image(); ?>

  <div class="article-wrapper">

    <header class="entry-header">
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

  </div>

</article>

