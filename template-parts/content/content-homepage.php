<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="website-hero text-center">
	<?php print_post_image(); ?>
  <div class="hero-title text-center">
    <h1><?php echo bloginfo('title'); ?></h1>
    <p><?php echo bloginfo('description'); ?></p>
    <button class="big">Call To Action</button>
  </div>
</div>

<div class="entry-content">

  <header class="entry-header main-width">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header>

  <?php
  the_content();

  wp_link_pages(
    array(
      'before' => '<div class="page-links"> Pagine: ',
      'after'  => '</div>',
    )
  );
  ?>
</div><!-- /entry-content -->

<footer class="entry-footer main-width">

</footer>

