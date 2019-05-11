<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <header id="masthead" class="site-header">

    <div class="site-branding-container main-width alignwide">

      <div class="site-branding">
          <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php else : ?>
              <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
              <p class="site-description"><?php get_bloginfo( 'description', 'display' ); ?></p>
          <?php endif; ?>
      </div>


      <?php if ( has_nav_menu( 'header-main' ) ) : ?>
          <nav id="site-navigation" class="main-navigation">
              <?php
              wp_nav_menu(
                  array(
                      'theme_location' => 'header-main',
                      'menu_class'     => 'main-menu',
                      'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  )
              );
              ?>
          </nav>
      <?php endif; ?>

      <div class="menu-shadow" onclick="document.querySelector('#masthead').classList.toggle('active')"></div>
      <div class="menu-resp unselectable" onclick="document.querySelector('#masthead').classList.toggle('active')">
        <button class="c-hamburger">
          <span>Toggle</span>
        </button>
      </div>

    </div>

  </header>

  <div id="content" class="site-content">
