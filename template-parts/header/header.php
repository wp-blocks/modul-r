<?php
  $show_header_text = display_header_text();
  $custom_logo = esc_html(get_theme_mod( 'custom_logo' ));
  $description = get_bloginfo( 'description', 'display' );
  $menu_direction = get_theme_mod('modul_r_header_direction') === 'landscape' ? ' header-landscape' : ' header-portrait' ;
  $menu_width = get_theme_mod('modul_r_header_width') ? ' ' . get_theme_mod('modul_r_header_width') : '' ;
?>

<header id="masthead" class="site-header header-color<?php echo $menu_direction; ?>" role="banner">

	<div class="header-wrapper main-width<?php echo $menu_width; ?>">

    <?php modul_r_header_image(); ?>

    <div class="site-branding<?php
        if ( $show_header_text ) echo ' has-header-text';
        if ( $custom_logo ) echo ' has-custom-logo';
        ?>">

      <?php if ( $custom_logo ) echo '<div class="site-logo">'. get_custom_logo().'</div>'; ?>

      <?php if ( $show_header_text ) : ?>
        <div class="header-text">
          <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo _wp_specialchars( get_bloginfo( 'name' ), 1 ) ?>" rel="home">
		        <?php bloginfo( 'name' ); ?>
            </a>
          </h1>
          <?php if ( $description ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="menu-resp show-on-mobile unselectable" onclick="document.querySelector('#masthead').classList.toggle('active')">
      <button class="c-hamburger">
        <i class="menu-toggle has-header-text-background-color"></i>
        <span class="screen-reader-text"><?php _e( 'menu', 'modul-r' ); ?></span>
      </button>
    </div>

    <nav id="site-navigation" class="main-navigation" role="navigation">
      <?php
      $nav_menu = wp_nav_menu( array(
          'theme_location' => 'main-menu',
          'menu_class'     => 'menu',
          'echo'           => false,
          'items_wrap'     => '<div class="main-menu"><ul id="%1$s" class="menu-container menu-%1$s %2$s-container">%3$s</ul></div>',
      ) );
      echo apply_filters("modul_r_header_menu", $nav_menu);
      ?>
    </nav>
    <div class="menu-shadow" onclick="document.querySelector('#masthead').classList.toggle('active')"></div>

  </div>

</header>