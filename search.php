<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
			      <?php _e('Search results for:',  'modul-r'); ?>
					</h1>
					<div class="page-description"><?php echo get_search_query(); ?></div>
				</header><!-- /page-header -->

				<?php while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'excerpt' );
				endwhile;

				// Previous/next page navigation.
		    modu_post_nav();

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>
		</main><!-- /main -->
	</section><!-- /primary -->

<?php
get_footer();
