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
    <a href="https://codekraft.it" class="button big"><?php esc_html_e('Contact us',  'modul-r'); ?></a>
    <a href="https://github.com/erikyo/Modul-R" class="button big outline" ><?php esc_html_e('Download',  'modul-r'); ?></a>
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

