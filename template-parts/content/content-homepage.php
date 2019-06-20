<?php
/**
 * Template part for displaying page content in page.php
 */

?>

<div class="website-hero text-center">
	<?php modul_r_post_image('parallax'); ?>
  <div class="hero-title text-center">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <p><?php bloginfo('description'); ?></p>
    <a href="https://codekraft.it" class="button big"><?php _e('Contact us',  'modul-r'); ?></a>
    <a href="https://github.com/erikyo/Modul-R" class="button big outline" ><?php _e('Download',  'modul-r'); ?></a>
  </div>
</div>

<div class="entry-content">
  <?php the_content(); ?>
</div><!-- /entry-content -->

<footer class="entry-footer main-width">
	<?php modul_r_page_links(); ?>
</footer>

