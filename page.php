<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

	<div id="primary" class="content-area">

	  <?php modul_r_post_image('parallax'); ?>

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content/content', 'page' );

			endwhile; ?>

		</main><!-- /main -->
	</div><!-- /primary -->

<?php
get_footer();
