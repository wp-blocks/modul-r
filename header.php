<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <?php
  wp_head();
  if ( is_singular() && pings_open( get_queried_object() ) ) echo '<link rel="pingback" href="'. bloginfo( 'pingback_url' ).'">';
  ?>
</head>
<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#main">
      <?php esc_html_e( 'Skip to content', 'modul-r' ); ?>
    </a>

    <?php get_template_part( 'template-parts/header/header' ); ?>

    <?php modul_r_the_hero(); ?>

    <div id="content" class="site-content">
