<?php

if ( ! function_exists('print_post_image') ) :
	function print_post_image() {
      if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
          <div class="entry-image interactive">
              <?php the_post_thumbnail('fullwidth', array('class' => 'fit-image wp-post-image')); ?>
          </div>
      <?php endif;
	}
endif;

if ( ! function_exists( 'print_archive_nav' ) ) :
	function print_archive_nav() {

	  $pagination = get_the_posts_pagination( array(
		  'mid_size'  => 5,
		  'prev_text' => __( 'Prev', 'modu' ),
		  'next_text' => __( 'Next', 'modu'),
	  ) );

	  return $pagination;

	}
endif;

if ( ! function_exists( 'print_post_nav' ) ) :
	function print_post_nav() {

	  $defaults = array(
		  'before'           => '<p>' . __( 'Pages:', 'modu' ),
		  'after'            => '</p>',
		  'nextpagelink'     => __( 'Next', 'modu'),
		  'previouspagelink' => __( 'Prev', 'modu' )
	  );

	  $pagination = wp_link_pages( $defaults );

	  return $pagination;
  }
endif;


if ( ! function_exists('print_comments') ) :
	function print_comments() {

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

	}
endif;


if ( ! function_exists('print_tags') ) :
	function print_tags() {

		if( has_tag() ): ?>
			<div class="tags">
				<h4>Tags</h4>
				<?php the_tags( '<li class="tag">', '</li><li class="tag">', '</li>');  ?>
			</div>
		<?php endif;

	}
endif;


if ( ! function_exists('print_meta') ) :
	function print_meta() {

		?>
    <div class="meta-wrapper">

      <p> by
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
            <?php the_author_meta( 'display_name' ); ?>
        </a>
      </p>

      <p><b> | </b></p>

      <p>
        <a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?>">
        <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
          <?php the_date(); ?>
        </time>
        </a>
      </p>

      <?php if ( get_comment_count()['approved'] > 0 ) { ?>

      <p><b> | </b></p>

      <p>
        <a href="<?php get_page_uri(); ?>#comments">
	        <?php print_r(get_comment_count()['approved']); ?> comments
        </a>
      </p>

	    <?php } ?>

    </div>
		<?php

	}
endif;

if ( ! function_exists('print_breadcrumbs') ) :
	function print_breadcrumbs() {
	  if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	  } else {
	    the_category( ' &gt; ' );
    }
  }
endif;

if ( ! function_exists('print_social_sharer') ) :
	function print_social_sharer() {
    ?>
    <div id="share-buttons">
      <h3>Sharing is caring!</h3>

      <!-- Email -->
      <a href="mailto:?Subject=<?php echo bloginfo('title'); ?>&amp;Body=<?php echo get_page_link(); ?>">
        <i class="social-ico email"></i>
      </a>


      <!-- Facebook -->
      <a href="http://www.facebook.com/sharer.php?u=<?php echo get_page_link(); ?>" target="_blank">
        <i class="social-ico facebook"></i>
      </a>


      <!-- LinkedIn -->
      <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_page_link(); ?>" target="_blank">
        <i class="social-ico linkedin"></i>
      </a>


      <!-- Print -->
      <a href="javascript:" onclick="window.print()">
        <i class="social-ico linkedin"></i>
      </a>

      <!-- Twitter -->
      <a href="https://twitter.com/share?url=<?php echo get_page_link(); ?>&amp;text=<?php echo bloginfo('title'); ?>&amp;hashtags=<?php echo bloginfo('title'); ?>" target="_blank">
        <i class="social-ico twitter"></i>
      </a>

    </div>
    <?php
	}
endif;

if ( ! function_exists('print_relateds') ) :
	function print_relateds() {
  ?>
    <div class="relateds">
		<?php
		$args = array(
			'post_type' => 'post',
			'orderby'   => 'rand',
			'posts_per_page' => 3,
		);

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : ?>

      <h3>Ti potrebbe interessare anche...</h3>
      <ul>

      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <li class="related">
          <a href="<?php the_permalink() ?>">
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
              <?php the_post_thumbnail('thumbnail'); ?>
            <?php endif; ?>
            <h5><?php the_title() ?></h5>
            <p><?php the_excerpt() ?></p>
          </a>
        </li>
      <?php endwhile; ?>

      </ul>

		<?php endif; ?>
    </div>
  <?php
  }
endif;

if ( ! function_exists('print_cookie_banner') ) :
	function print_cookie_banner() {
  ?>
    <div id="cookielaw" onclick="okCookie();">
      <i class="material-icons">close</i>
		  <p>This website uses cookies to improve user experience, memorizing your preferences and monitorizing site funcionality. check out our <a href="<?php site_url() ?>/cookie-policy/">Cookie Policy</a></p>
    </div>
  <?php
  }
endif;
