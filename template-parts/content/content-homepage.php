<?php
/**
 * Template part for displaying homepage
 */

?>

<div class="website-hero text-center">
	<?php modul_r_post_image('parallax'); ?>
  <div class="hero-title text-center">
    <?php the_title( '<h1 class="entry-title secondary-color">', '</h1>' ); ?>
    <p><?php bloginfo('description'); ?></p>
      <?php

        printf('<a href="%s" class="button big">%s</a>', esc_url( get_category_link(get_cat_ID('news')) ), esc_html__('Lastest news', 'modul-r'));

        if ( class_exists( 'WooCommerce' ) ) {
          printf( '<a href="%s" class="button big outline" >%s</a>', esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ), esc_html__( 'Shop', 'modul-r' ) );
        } else {
          printf( '<a href="%s" class="button big outline" >%s</a>', esc_url( get_category_link( get_cat_ID( 'contacts' ) ) ), esc_html__( 'Contact us', 'modul-r' ) );
        }

      ?>
  </div>
</div>

<section id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="entry-content">
		  <?php the_content(); ?>
    </div><!-- /entry-content -->

  </main>
</section>

<footer class="entry-footer main-width">
	<?php modul_r_social_sharer(); ?>
	<?php modul_r_relateds(); ?>
</footer>

