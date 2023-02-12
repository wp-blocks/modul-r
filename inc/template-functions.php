<?php
if ( ! function_exists('modul_r_comments') ) :
	/**
	 * Displays the comments template
	 *
	 * @return void
	 */
	function modul_r_comments() {
		// If comments are open, or we have at least one comment, load up the comment template.
		comments_template();
	}
endif;

if ( ! function_exists('modul_r_breadcrumbs') ) :
	/**
	 * Displays the article breadcrumbs
	 *
	 * @return void
	 */
	function modul_r_breadcrumbs() {
	  if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
	  } else {
	    if (is_single()) {
	      printf('<p class="breadcrumbs"><a href="%s">%s</a> / %s</p>', esc_url(home_url()) , esc_html__('Home', 'modul-r'), esc_html(get_the_category_list(' &#47; ') ) );
      } else {
	      printf('<p class="breadcrumbs"><a href="%s">%s</a> / <a href="%s">%s</a></p>', esc_url(home_url()) , esc_html__('Home', 'modul-r'), esc_url(get_permalink()), esc_html(get_the_title()) );
      }
    }
  }
endif;


if ( ! function_exists('modul_r_custom_body_class') ) :
	/**
	 * Add 'has-featured-image' to body class if post has a featured image
	 *
	 * @param array $classes An array of classes that will be added to the body class.
	 *
	 * @return mixed
	 */
	function modul_r_custom_body_class( $classes ) {
		global $post;
		$woo_enabled = class_exists( 'WooCommerce' );

		if (  is_page() || ( is_single() && !($woo_enabled && is_product()) ) || ( is_archive() && !($woo_enabled && is_product_category())) || ( ($woo_enabled && is_shop()) && get_theme_mod( 'modul_r_woo' ) ) ) {
      // Add the class "has-featured-image" if page or article and it ha a post thumbnail set.
      if ( has_post_thumbnail() ) {
        $classes[] = 'has-featured-image';
      }
    }

    // Get theme option "sidebar enabled".
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
