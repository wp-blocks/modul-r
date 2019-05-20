<?php
/**
 * Template part for displaying page content in page.php
 */

?>

<div class="website-hero text-center">
	<?php modu_post_image(); ?>
  <div class="hero-title text-center">
    <h1><?php echo bloginfo('title'); ?></h1>
    <p><?php echo bloginfo('description'); ?></p>
    <button class="big"><?php _e('Contact us', 'modul-r'); ?></button>
    <button class="big outline"><?php _e('Download', 'modul-r'); ?></button>
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

