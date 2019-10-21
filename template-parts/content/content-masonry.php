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
      <h5 class="breadcrumbs"><?php the_category(' &#47; '); ?></h5>
      <?php the_title( sprintf( '<a href="%s" rel="bookmark"><h2 class="entry-title has-primary-color">', esc_url( get_permalink() ) ), '</h2></a>' ); ?>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

  </div>

</article>

