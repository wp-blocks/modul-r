<?php
/**
 * Template part for displaying post archives and search results
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('grid__item')); ?>>

  <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
    <?php modul_r_post_image(); ?>
  </a>

  <div class="article-wrapper">

    <header class="entry-header">
      <h5 class="category-list"><?php the_category(' &#47; '); ?></h5>
      <?php the_title( sprintf( '<h2 class="entry-title has-secondary-color"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

  </div>

</article>

