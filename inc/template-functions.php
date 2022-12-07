<?php

/**
 * Displays the hero of the homepage
 */
if ( ! function_exists( 'modul_r_hero_image' ) ) :
	function modul_r_hero_image() {
    // fullscreen hero image
    $hero_title = esc_html(get_theme_mod('modul_r_hero_title'));
    $hero_subtitle = esc_html(get_theme_mod('modul_r_hero_subtitle'));
    $hero_title = ($hero_title != '') ? $hero_title : esc_html(get_the_title()) ;
    $hero_subtitle = ($hero_subtitle != '') ? $hero_subtitle : get_bloginfo('description') ;
    // get (if present) the id of the call to actions
    $hero_call_to_action = intval(get_theme_mod('modul_r_hero_call_to_action'));
    $hero_call_to_action_2 = intval(get_theme_mod('modul_r_hero_call_to_action_2'));
    ?>

    <div class="hero">
    <?php modul_r_post_image('parallax header-color'); ?>
      <div class="entry-header hero-title">
        <h1 class="entry-title has-title-color"><?php echo $hero_title; ?></h1>
        <p><?php echo $hero_subtitle; ?></p>
        <?php
          if ($hero_call_to_action > 0 || $hero_call_to_action_2 > 0 ) {
              echo '<span class="hero-cta-wrapper">';
              if ( $hero_call_to_action > 0 ) {
                  printf( '<span class="wp-block-button"><a href="%s" class="wp-block-button__link has-primary-background-color has-background wp-element-button">%s</a></span>', esc_url( get_page_link( $hero_call_to_action ) ), esc_html( get_the_title( $hero_call_to_action ) ) );
              }
              if ( $hero_call_to_action_2 > 0 ) {
                  printf( '<span class="wp-block-button is-style-outline"><a href="%s" class="wp-block-button__link">%s</a></span>', esc_url( get_category_link( $hero_call_to_action_2 ) ), esc_html( get_cat_name( $hero_call_to_action_2 ) ) );
              }
              echo '</span>';
          }
        ?>
      </div>
    </div>
    <?php
	}
endif;

/**
 * Displays the featured image of the post/page
 * you can pass single or multiple classes to the image wrapper
 */
if ( ! function_exists( 'modul_r_post_image' ) ) :
  function modul_r_post_image( $class = null  ) {
    // Check if Thumbnail exists
		if ( has_post_thumbnail() ) : ?>
      <div class="entry-image interactive<?php echo ' ' . esc_attr($class); ?>">
			  <?php the_post_thumbnail( 'modul-r-fullwidth', array( 'class' => 'fit-image wp-post-image' ) ); ?>
      </div>
		  <?php
    endif;
	}
endif;

/**
 * Displays the featured image of the archive page
 */
if ( ! function_exists( 'modul_r_archive_image' ) ) :
	function modul_r_archive_image( $class = null ) {
		// Check if Thumbnail exists
		if ( has_post_thumbnail() ) : ?>
        <div class="hero" >
          <div class="entry-image hero interactive<?php echo ' ' . esc_attr($class); ?>">
            <div class="entry-image">
			        <?php if ( class_exists( 'WooCommerce' ) && is_shop() && get_theme_mod( 'modul_r_woo' ) ) {
                $wooOptions = get_theme_mod( 'modul_r_woo' );
                  if ( !empty($wooOptions['shop_hero'] ) ) {
                      $shop_hero_id = attachment_url_to_postid( esc_url_raw( $wooOptions['shop_hero'] ) );
                      echo wp_get_attachment_image($shop_hero_id, 'large');
                  }
              } else {
                the_post_thumbnail( 'modul-r-fullwidth', array( 'class' => 'fit-image wp-post-image' ) );
              }?>

            </div>
            <div class="hero-title aligncenter main-width">
	            <?php the_archive_title( '<h1 class="page-title has-title-color">', '</h1>' ); ?>
	            <?php if (is_author()) {
		            printf('<p>%s</p>', esc_html(get_the_author_meta( 'description' )) );
	            } else {
		            the_archive_description();
	            } ?>
            </div>
          </div>
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
		  'prev_text' => esc_html__( 'Prev', 'modul-r' ),
		  'next_text' => esc_html__( 'Next', 'modul-r'),
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
        <h3><?php esc_html_e('Post navigation', 'modul-r'); ?></h3>
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
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/src/img/elements/loader.svg" alt="<?php esc_attr_e('wait! loading',  'modul-r' ); ?>">
      </div>
      <div class="infinite-scroll-last">
        <div class="main-width alignwide">
          <h4><?php esc_html_e("End of content... Maybe you're interested to other categories?",  'modul-r' ); ?></h4>
          <div class="category-list-labels">
            <?php wp_list_categories(array(
	            'hierarchical' => false,
	            'separator' => '',
	            'title_li'  => ''
            ) ); ?>
          </div>
        </div>
      </div>
      <p class="infinite-scroll-error"><?php esc_html_e('No more pages to load',  'modul-r' ); ?></p>
    </div>
	<?php }
endif;


/**
 * Displays page-links for paginated posts
 */
if ( ! function_exists( 'modul_r_page_links' ) ) :
	function modul_r_page_links() {

	  $args = array(
		  'before'           => '<p>' . esc_html__( 'Pages:',  'modul-r' ),
		  'after'            => '</p>',
		  'link_before'      => '',
		  'link_after'       => '',
		  'next_or_number'   => 'number',
		  'separator'        => ' ',
		  'nextpagelink'     => esc_html__( 'Next page',  'modul-r'),
		  'previouspagelink' => esc_html__( 'Previous page',  'modul-r' ),
		  'pagelink'         => '%'
	  );

	  $pagination = wp_link_pages( $args );

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
				<h3><?php esc_html_e('Tags:',  'modul-r'); ?></h3>
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
    $post_comments = get_comment_count($post->ID);
	  $approved = $post_comments['approved'];

		?>
    <div class="post-meta">

      <a href="<?php the_permalink(); ?>" rel="bookmark" class="hide"><?php the_title(); ?></a>

      <div class="meta-wrapper">

        <p>
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" rel="author" class="h-card url" >
            <span class="author fn"><?php the_author_meta( 'display_name' ); ?></span>
          </a>
        </p>

        <p><b> | </b></p>

        <p>
          <a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?>">

            <?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) : ?>
              <time class="entry-date published updated hide" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><?php echo esc_html( get_the_date() ); ?></time>
	          <?php else : ?>
              <time class="entry-date published hide" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
              <time class="updated hide" datetime="<?php echo esc_attr( get_the_modified_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_modified_date() ); ?></time>
		        <?php endif; ?>

	          <span><?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?></span>

          </a>
        </p>

        <?php if ( $approved > 0 ) { ?>

        <p><b> | </b></p>

        <p>
          <a href="<?php the_permalink(); ?>#comments">
            <?php
            /* translators: %s: the number of comments */
            printf( _n( '%s comment', '%s comments', $approved, 'modul-r' ), $approved );
            ?>
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
	    if (is_single()) {
	      printf('<p class="breadcrumbs"><a href="%s">%s</a> / %s</p>', esc_url(home_url()) , esc_html__('Home', 'modul-r'), get_the_category_list(' &#47; ') );
      } else {
	      printf('<p class="breadcrumbs"><a href="%s">%s</a> / <a href="%s">%s</a></p>', esc_url(home_url()) , esc_html__('Home', 'modul-r'), get_permalink(), get_the_title() );
      }
    }
  }
endif;


/**
 * Displays the article shares buttons
 * @param string $type | choose links or share to get the link or to get the sharing action / print or email functions
 */
if ( ! function_exists('modul_r_social_sharer') ) :
	function modul_r_social_sharer($type = 'links') {

  $opt_social_share_enabled = get_theme_mod('modul_r_social_share_enabled');
  $opt_social_share_visibility = get_theme_mod('modul_r_social_share_visibility');

  $wp_post_type = get_post_type();

    if($opt_social_share_enabled == true):
	    if ( $opt_social_share_visibility === 'all' ) {
		    get_template_part( 'template-parts/fragments/content', 'social-share' );
	    } else {
		    if ( $wp_post_type === 'post' && $opt_social_share_visibility === 'posts' ) {
			    get_template_part( 'template-parts/fragments/content', 'social-share' );
		    } else if ( $wp_post_type === 'page' && $opt_social_share_visibility === 'pages' ) {
			    get_template_part( 'template-parts/fragments/content', 'social-share' );
		    }
	    }
	endif;
	}
endif;

/**
 * Displays the related articles
 */
if ( ! function_exists( 'modul_r_relateds' ) ) :
	function modul_r_relateds() {

		  $args = array(
			  'post_type'      => 'post',
			  'orderby'        => 'rand',
			  'posts_per_page' => 3,
		  );

		  $query = new WP_Query( $args );

		  if ( $query->have_posts() ) : ?>
        <div class="relateds">

          <h3><?php esc_html_e( 'You might be interested in...', 'modul-r' ); ?></h3>
          <ul class="relateds-list">

            <?php while ( $query->have_posts() ) : $query->the_post();
              get_template_part( 'template-parts/content/content', 'related' );
            endwhile; ?>

          </ul>

        </div>

      <?php

		  wp_reset_postdata();

      endif;
	}
endif;

// add 'has-featured-image' to body class if post has a featured image
if ( ! function_exists('modul_r_custom_body_class') ) :
	function modul_r_custom_body_class( $classes ) {
		global $post;
		$woo_enabled = class_exists( 'WooCommerce' );

		if (  is_page() || ( is_single() && !($woo_enabled && is_product()) ) || ( is_archive() && !($woo_enabled && is_product_category())) || ( ($woo_enabled && is_shop()) && get_theme_mod( 'modul_r_woo' ) ) ) {
      // add the class "has-featured-image" if page or article and it ha a post thumbnail set
      if ( isset ( $post->ID ) && get_the_post_thumbnail($post->ID) ) {
        $classes[] = 'has-featured-image';
      }
    }

    // get theme option "sidebar enabled"
    $opt_sidebar = get_theme_mod('modul_r_sidebar_enabled');
    if ( $opt_sidebar === true && ( ( is_archive() && ($woo_enabled && is_product_category()) ) || $woo_enabled && is_shop() || is_single() || (is_page() && !is_front_page()) ) ) {
        $classes[] = 'has-sidebar';
    }

    // set the sidebar position. it's outside page/single conditional because it's used also with WooCommerce.
    $classes[] = ( get_theme_mod('modul_r_sidebar_position') == 'left') ? ' sidebar-left' : ' sidebar-right' ;

		return $classes;
	}
endif;
add_filter( 'body_class', 'modul_r_custom_body_class' );

/**
 * Add a background to the headline if changed in the customizer
 */
if ( ! function_exists('modul_r_header_image') ) :
	function modul_r_header_image() {
    $header_image = get_header_image();
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

      <div class="article-author author vcard">
        <div class="author-image">
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
            <span class="avatar u-photo"><?php echo get_avatar( get_the_author_meta( 'ID' ), '64', null, get_the_author() ); ?> </span>
          </a>
        </div>
        <div class="author-details">
          <a class="url" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" rel="author">
            <h3 class="name fn n"><?php the_author_meta( 'display_name' ); ?></h3>
          </a>
          <div class="author-description note">
            <p><?php the_author_meta( 'description' ); ?></p>
            <?php

            $website = get_the_author_meta( 'url', $post->post_author );
            if ( $website ) {echo '<a href="' . $website . '" class="u-url" rel="nofollow" target="_blank"><i class="social-ico www"></i></a>';}

            $twitter = get_the_author_meta( 'twitter', $post->post_author );
            if ( $twitter ) {echo '<a href="https://twitter.com/' . $twitter . '" class="u-url" rel="nofollow" target="_blank"><i class="social-ico twitter"></i></a>';}

            $facebook = get_the_author_meta( 'facebook', $post->post_author );
            if ( $facebook ) {echo '<a href="' . $facebook . '" class="u-url" rel="nofollow" target="_blank"><i class="social-ico facebook"></i></a>';}

            ?>
          </div>
        </div>
      </div>

    </div>

  <?php
	}
endif;
