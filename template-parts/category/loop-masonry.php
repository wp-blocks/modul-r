<div class="masonry main-width alignwide">

	<div id="masonry-wrapper" class="row">
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$query = new WP_Query( array( 'category__in' => $cat, 'posts_per_page' => 3, 'paged' => $paged  ) );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part( 'template-parts/content/content', 'masonry' );
			endwhile;
		endif;
		?>
	</div>

	<!-- /posts -->

	<div class="navigation">
		<?php previous_posts_link( 'Newer posts' ); ?>
		<?php next_posts_link( 'Older posts &darr;', $query->max_num_pages ); ?>
	</div>
</div>


