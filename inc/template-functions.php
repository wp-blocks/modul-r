<?php

/**
 * Displays the featured image of the post/page
 * you can pass single or multiple classes to the image wrapper
 */
if ( ! function_exists( 'modul_r_post_image' ) ) :
  function modul_r_post_image( $class = null ) {
    // Check if Thumbnail exists
		if ( has_post_thumbnail() ) : ?>
      <div class="entry-image interactive<?php echo ' ' . $class; ?>">
			  <?php the_post_thumbnail( 'modul-r-fullwidth', array( 'class' => 'fit-image wp-post-image' ) ); ?>
      </div>
		<?php endif;
	}
endif;


/**
 * Displays the navigation for the archive page
 */
if ( ! function_exists( 'modul_r_archive_nav' ) ) :
	function modul_r_archive_nav() {

	  $pagination = get_the_posts_pagination( array(
		  'mid_size'  => 5,
		  'prev_text' => __( 'Prev', 'modul-r' ),
		  'next_text' => __( 'Next', 'modul-r'),
	  ) );

	  return $pagination;

	}
endif;


/**
 * Displays the next/prev navigation for the post
 */
if ( ! function_exists( 'modul_r_post_nav' ) ) :
	function modul_r_post_nav() { ?>
      <div class="post-navigation">
        <h3><?php _e('Post navigation', 'modul-r'); ?></h3>
        <div class="navigation">
          <div class="alignleft">
			  <?php previous_post_link('<i class="material-icons">arrow_back</i> %link'); ?>
          </div>
          <div class="alignright">
			  <?php next_post_link('%link <i class="material-icons">arrow_forward</i>'); ?>
          </div>
        </div> <!-- end navigation -->
      </div>
	<?php }
endif;


/**
 * The masonry navigation
 */
if ( ! function_exists( 'modul_r_masonry_nav' ) ) :
	function modul_r_masonry_nav() { ?>
    <div class="masonry navigation">
  		<?php next_posts_link(); ?>
    </div>

    <div class="page-load-status">
      <div class="loader-ellips infinite-scroll-request">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/src/img/elements/loader.svg" alt="wait! loading">
      </div>
      <p class="infinite-scroll-last"><?php _e('End of content',  'modul-r' ); ?></p>
      <p class="infinite-scroll-error"><?php _e('No more pages to load',  'modul-r' ); ?></p>
    </div>
	<?php }
endif;


/**
 * Displays page-links for paginated posts
 */
if ( ! function_exists( 'modul_r_page_links' ) ) :
	function modul_r_page_links() {

	  $defaults = array(
		  'before'           => '<p>' . __( 'Pages:',  'modul-r' ),
		  'after'            => '</p>',
		  'link_before'      => '',
		  'link_after'       => '',
		  'next_or_number'   => 'number',
		  'separator'        => ' ',
		  'nextpagelink'     => __( 'Next page',  'modul-r'),
		  'previouspagelink' => __( 'Previous page',  'modul-r' ),
		  'pagelink'         => '%'
	  );

	  $pagination = wp_link_pages( $defaults );

	  return $pagination;
  }
endif;


/**
 * Displays the comments template
 */
if ( ! function_exists('modul_r_comments') ) :
	function modul_r_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		comments_template();
	}
endif;


/**
 * Displays the tags
 */
if ( ! function_exists('modul_r_tags') ) :
	function modul_r_tags() {

		if( has_tag() ): ?>
			<div class="post-tags">
				<h3><?php _e('Tags:',  'modul-r'); ?></h3>
				<ul><?php the_tags( '<li class="post-tag">', '</li><li class="post-tag">', '</li>');  ?></ul>
			</div>
		<?php endif;

	}
endif;

/**
 * Displays the article meta (author / date / comments number if isn't zero)
 */
if ( ! function_exists('modul_r_meta') ) :
	function modul_r_meta() {

    global $post;
    $comments_count = get_comment_count($post->ID);

		?>
    <div class="post-meta">
      <div class="meta-wrapper">

        <p>
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
              <?php the_author_meta( 'display_name' ); ?>
          </a>
        </p>

        <p><b> | </b></p>

        <p>
          <a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?>">
          <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
            <?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?>
          </time>
          </a>
        </p>

        <?php if ( $comments_count['approved'] > 0 ) { ?>

        <p><b> | </b></p>

        <p>
          <a href="<?php the_permalink(); ?>#comments">
            <?php echo $comments_count['approved']; ?> <?php _e('comments',  'modul-r'); ?>
          </a>
        </p>

        <?php } ?>

      </div>
    </div>

		<?php

	}
endif;


/**
 * Displays the article breadcrumbs
 */
if ( ! function_exists('modul_r_breadcrumbs') ) :
	function modul_r_breadcrumbs() {
	  if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
	  } else {
	    printf('<p class="breadcrumbs"><a href="%s">%s</a> / %s</p>', home_url(), __('Home', 'modul-r'), get_the_category_list( ' &#47; ' ));
    }
  }
endif;


/**
 * Displays the article shares buttons
 */
if ( ! function_exists('modul_r_social_sharer') ) :
	function modul_r_social_sharer() {
    ?>
    <div id="share-buttons">
      <h3><?php _e('Share this post',  'modul-r'); ?></h3>

      <!-- Facebook -->
      <a href="http://www.facebook.com/sharer.php?u=<?php echo get_page_link(); ?>" target="_blank" title="Share on Facebook">
        <i class="social-ico facebook"></i>
      </a>


      <!-- LinkedIn -->
      <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_page_link(); ?>" target="_blank" title="Share on Linkedin">
        <i class="social-ico linkedin"></i>
      </a>

      <!-- Twitter -->
      <a href="https://twitter.com/intent/tweet?url=<?php echo get_page_link(); ?>&amp;text=<?php echo get_bloginfo('title'); ?> <?php the_title(); ?>" target="_blank" title="Share on Twitter">
        <i class="social-ico twitter"></i>
      </a>


      <!-- Email -->
      <a href="mailto:?Subject=<?php echo get_bloginfo('title'); ?>&amp;Body=<?php echo get_page_link(); ?>" target="_blank" title="Send by mail">
        <i class="social-ico email"></i>
      </a>

      <!-- Print -->
      <a href="javascript:" onclick="window.print()" title="Print this page">
        <i class="social-ico print"></i>
      </a>

    </div>
    <?php
	}
endif;

/**
 * Displays the related articles
 */
if ( ! function_exists( 'modul_r_relateds' ) ) :
	function modul_r_relateds() {
		?>
      <div class="relateds">
		  <?php
		  $args = array(
			  'post_type'      => 'post',
			  'orderby'        => 'rand',
			  'posts_per_page' => 3,
		  );

		  $query = new WP_Query( $args );
		  if ( $query->have_posts() ) : ?>

            <h3><?php _e( 'You might be interested in...', 'modul-r' ); ?></h3>
            <ul>

				<?php while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'template-parts/content/content', 'related' );
				endwhile; ?>

            </ul>

			  <?php
			  wp_reset_query();
		  endif;
		  ?>
      </div>
		<?php
	}
endif;


/**
 * Change the color of the headline if changed in the customizer
 */
if ( ! function_exists('modul_r_header_textcolor') ) :
	function modul_r_header_textcolor() {
    if (get_header_textcolor()) {
      echo ' style="color:#' . get_header_textcolor(). '"';
    }
	}
endif;


/**
 * Add a background to the headline if changed in the customizer
 */
if ( ! function_exists('modul_r_header_image') ) :
	function modul_r_header_image() {
    $header_image= get_header_image();
	  if ($header_image) {
	    printf('<img src="%s" alt="%s" class="site-header-image" />', $header_image, get_bloginfo( 'title' ));
    }
	}
endif;


/**
 * Display the author of the post
 */
if ( ! function_exists('modul_r_author') ) :
	function modul_r_author() {

	  global $post;

	  ?>

    <div class="article-metas">

      <div class="article-author">
        <div class="author-image">
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
            <span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '64', null, get_the_author() ); ?> </span>
          </a>
        </div>
        <div class="author-details">
          <div class="author-name">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><h3><?php the_author_meta( 'display_name' ); ?></h3></a>
          </div>
          <div class="author-description">
            <p><?php the_author_meta( 'description' ); ?></p>
            <?php

            $website = get_the_author_meta( 'url', $post->post_author );
            if ( $website ) {echo '<a href="' . $website . '" rel="nofollow" target="_blank"><i class="social-ico www"></i></a>';}

            $twitter = get_the_author_meta( 'twitter', $post->post_author );
            if ( $twitter ) {echo '<a href="https://twitter.com/' . $twitter . '" rel="nofollow" target="_blank"><i class="social-ico twitter"></i></a>';}

            $facebook = get_the_author_meta( 'facebook', $post->post_author );
            if ( $facebook ) {echo '<a href="' . $facebook . '" rel="nofollow" target="_blank"><i class="social-ico facebook"></i></a>';}

            ?>
          </div>
        </div>
      </div>

    </div>

  <?php
	}
endif;