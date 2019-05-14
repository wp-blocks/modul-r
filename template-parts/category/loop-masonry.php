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
		<?php previous_posts_link( '« Newer posts' ); ?>
		<?php next_posts_link( 'Older posts »', $query->max_num_pages ); ?>
	</div>


</div>

<script>
  document.addEventListener("DOMContentLoaded", function(event) {

    var $ = jQuery;
    // Initiate Masonry
    var $container = $('#masonry-wrapper');

    $container.imagesLoaded(function () {
      $container.masonry({
        itemSelector: '.masonry-item',
        columnWidth: '.masonry-item',
        isAnimated: true,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
      });
    });

    $.extend($.infinitescroll.prototype, {
      _nearbottom_local: function () {
        var opts = this.options,
          $max = 0;
        $('.masonry-item').each(function () {
          $btm = $(this).position().top + jQuery(this).height();
          if ($max < $btm) {
            $max = $btm;
          }
        });

        this._debug('math:', $(window).scrollTop() + $(window).height() - opts.bufferPx, $max);

        return ( $(window).scrollTop() + $(window).height() - opts.bufferPx > $max );
      }
    });

    $container.infinitescroll({
        debug: false,
        navSelector: '.navigation', // selector for the paged navigation
        nextSelector: '.navigation a', // selector for the NEXT link (to page 2)
        itemSelector: '.masonry-item', // selector for all items you'll retrieve
        behavior: 'local',
        container: '#main',
        loading: {
          msgText: "Caricamento articoli",
          finishedMsg: '',
          img: ''
        }
      },

      // trigger Masonry as a callback
      function (newElements) {
        // hide new items while they are loading
        var $newElems = $(newElements).css({opacity: 0});
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function () {
          // show elems now they're ready
          $newElems.animate({opacity: 1});
          $container.masonry('appended', $newElems, true);
        });
      }
    );

  });
</script>