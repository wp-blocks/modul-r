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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
    <div class="interactive featured-image">
			<?php the_post_thumbnail('fullwidth', array('class' => 'fit-image wp-post-image')); ?>
    </div>
	<?php endif; ?>
  <!-- /post thumbnail -->

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
	</div><!-- .entry-content -->

  <footer class="entry-footer main-width">
  </footer>

</article><!-- #post-<?php the_ID(); ?> -->
