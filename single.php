<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );



			endwhile; // End of the loop.
			?>

		</main><!-- /main -->
	</section><!-- /primary -->

<?php
get_footer();