<?php
/**
 * Template part for displaying page content in page.php
 */

?>

<div class="website-hero text-center">
	<?php modu_post_image(); ?>
  <div class="hero-title text-center">
    <h1><?php bloginfo( 'name' ); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    <a href="https://codekraft.it" class="button big"><?php _e('Contact us', 'modul-r'); ?></a>
    <a href="https://github.com/erikyo/Modul-R" class="button big outline" ><?php _e('Download', 'modul-r'); ?></a>
  </div>
</div>

<div class="entry-content">

  <header class="entry-header main-width">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header>

  <?php the_content(); ?>
</div><!-- /entry-content -->

<footer class="entry-footer main-width">
	<?php modu_page_links(); ?>
</footer>

