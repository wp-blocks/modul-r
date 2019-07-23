<?php
/**
 * Template part for displaying homepage
 */

?>

<div class="website-hero text-center">
	<?php modul_r_post_image('parallax'); ?>
  <div class="hero-title text-center">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <p><?php bloginfo('description'); ?></p>
    <a href="<?php echo esc_url( get_category_link(get_cat_ID('news')) ); ?>" class="button big"><?php esc_html_e('Lastest news', 'modul-r'); ?></a>
    <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="button big outline" ><?php esc_html_e('Shop', 'modul-r'); ?></a>
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

