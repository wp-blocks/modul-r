<?php get_header(); ?>

  <div>
    <h1 class="text-center">BIG BIG hero image</h1>
  </div>

  <section id="primary" class="content-area">
    <main id="main" class="site-main">
		<?php if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();

				if ( is_page() ) {
					echo '<h1>page</h1>';
				} else {
					echo '<h1>not a page</h1>';
				}

				get_template_part( 'template-parts/content/content' );
			}

		} ?>
    </main>
  </section>

<?php get_footer();
