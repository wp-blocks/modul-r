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

	<?php print_post_image(); ?>

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

</article>
