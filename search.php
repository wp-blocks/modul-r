<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title has-title-color">
			      <?php esc_html_e('Search results for:',  'modul-r'); ?> <?php the_search_query(); ?>
					</h1>
				</header><!-- /page-header -->

				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content/content', 'excerpt' );
				endwhile;

				// Previous/next page navigation.
		    printf( '<div class="main-width alignwide text-center">%s</div>', modul_r_archive_nav() );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content/content', 'none' );

			endif; ?>

		</main><!-- /main -->
	</div><!-- /primary -->

<?php
get_footer();
