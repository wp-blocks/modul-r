<?php

if ( ! function_exists('modu_post_image') ) :
	function modu_post_image() {
      if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
          <div class="entry-image interactive">
              <?php the_post_thumbnail('fullwidth', array('class' => 'fit-image wp-post-image')); ?>
          </div>
      <?php endif;
	}
endif;

if ( ! function_exists( 'modu_archive_nav' ) ) :
	function modu_archive_nav() {

	  $pagination = get_the_posts_pagination( array(
		  'mid_size'  => 5,
		  'prev_text' => __( 'Prev', 'modul-r' ),
		  'next_text' => __( 'Next', 'modul-r'),
	  ) );

	  return $pagination;

	}
endif;

if ( ! function_exists( 'modu_post_nav' ) ) :
	function modu_post_nav() { ?>
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

if ( ! function_exists( 'modu_page_links' ) ) :
  // Displays page-links for paginated posts
	function modu_page_links() {

	  $defaults = array(
		  'before'           => '<p>' . __( 'Pages:', 'modul-r' ),
		  'after'            => '</p>',
		  'link_before'      => '',
		  'link_after'       => '',
		  'next_or_number'   => 'number',
		  'separator'        => ' ',
		  'nextpagelink'     => __( 'Next page', 'modul-r'),
		  'previouspagelink' => __( 'Previous page', 'modul-r' ),
		  'pagelink'         => '%'
	  );

	  $pagination = wp_link_pages( $defaults );

	  return $pagination;
  }
endif;


if ( ! function_exists('modu_comments') ) :
	function modu_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		comments_template();
	}
endif;


if ( ! function_exists('modu_tags') ) :
	function modu_tags() {

		if( has_tag() ): ?>
			<div class="tags">
				<h3><?php _e('Tags:', 'modul-r'); ?></h3>
				<?php the_tags( '<li class="tag">', '</li><li class="tag">', '</li>');  ?>
			</div>
		<?php endif;

	}
endif;


if ( ! function_exists('modu_meta') ) :
	function modu_meta() {

    global $post;

		?>
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

      <?php if ( get_comment_count($post->ID)['approved'] > 0 ) { ?>

      <p><b> | </b></p>

      <p>
        <a href="<?php get_page_uri(); ?>#comments">
	        <?php echo get_comment_count($post->ID)['approved']; ?> <?php _e('comments', 'modul-r'); ?>
        </a>
      </p>

	    <?php } ?>

    </div>
		<?php

	}
endif;

if ( ! function_exists('modu_breadcrumbs') ) :
	function modu_breadcrumbs() {
	  if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	  } else {
	    the_category( ' &gt; ' );
    }
  }
endif;

if ( ! function_exists('modu_social_sharer') ) :
	function modu_social_sharer() {
    ?>
    <div id="share-buttons">
      <h3><?php _e('Share this post', 'modul-r'); ?></h3>

      <!-- Facebook -->
      <a href="http://www.facebook.com/sharer.php?u=<?php echo get_page_link(); ?>" target="_blank">
        <i class="social-ico facebook"></i>
      </a>


      <!-- LinkedIn -->
      <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_page_link(); ?>" target="_blank">
        <i class="social-ico linkedin"></i>
      </a>

      <!-- Twitter -->
      <a href="https://twitter.com/intent/tweet?url=<?php echo get_page_link(); ?>&amp;text=<?php echo get_bloginfo('title'); ?> <?php the_title(); ?>" target="_blank">
        <i class="social-ico twitter"></i>
      </a>


      <!-- Email -->
      <a href="mailto:?Subject=<?php echo get_bloginfo('title'); ?>&amp;Body=<?php echo get_page_link(); ?>">
        <i class="social-ico email"></i>
      </a>

      <!-- Print -->
      <a href="javascript:" onclick="window.print()">
        <i class="social-ico print"></i>
      </a>

    </div>
    <?php
	}
endif;

if ( ! function_exists('modu_relateds') ) :
	function modu_relateds() {
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

      <h3><?php _e('You might be interested in...', 'modul-r'); ?></h3>
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

if ( ! function_exists('modu_cookie_banner') ) :
	function modu_cookie_banner() {
  ?>
    <div id="cookielaw" onclick="okCookie();">
      <i class="material-icons">close</i>
		  <p><?php _e('This website uses cookies to improve user experience, memorizing your preferences and monitorizing site funcionality', 'modul-r'); ?>. <?php _e('Check out our', 'modul-r'); ?> <a href="<?php site_url() ?>/cookie-policy/"><?php _e('Cookie Policy', 'modul-r'); ?></a></p>
    </div>
  <?php
  }
endif;


// TODO: post author