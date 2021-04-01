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
        if ( $show_header_text ) {echo ' has-header-text';}
        if ( $custom_logo ) {echo ' has-custom-logo';}
        ?>">

      <div class="site-logo"><?php the_custom_logo(); ?></div>

      <?php if ( $show_header_text ) : ?>
        <div class="header-text">
          <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo _wp_specialchars( get_bloginfo( 'name' ), 1 ) ?>" rel="home" class="has-primary-color">
		        <?php bloginfo( 'name' ); ?>
            </a>
          </h1>
          <?php if ( $description ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

	  <?php if ( class_exists( 'woocommerce' ) ) : ?>
      <div class="menu-icons-container show-on-mobile unselectable" >
        <a class="button text outline">
          <span><?php _e( 'Shop', 'modul-r' ) ?></span>
        </a>
        <a class="button icon outline">
          <i class="material-icons">search</i>
        </a>
        <a class="button icon outline">
          <i class="material-icons">shopping_cart</i>
        </a>
      </div>
    <?php endif; ?>


    <div class="menu-resp show-on-mobile unselectable" onclick="document.querySelector('#masthead').classList.toggle('active')">
      <button class="c-hamburger">
        <i class="menu-toggle has-header-text-background-color"></i>
        <span class="screen-reader-text"><?php _e( 'menu', 'modul-r' ); ?></span>
      </button>
    </div>

    <nav id="site-navigation" class="main-navigation" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location'  => 'main-menu',
			'menu_class'      => 'menu',
	    'items_wrap'      => '<div class="main-menu"><ul id="%1$s" class="menu-container menu-%1$s %2$s-container">%3$s</ul></div>',
		) );
		?>
    </nav>
    <div class="menu-shadow" onclick="document.querySelector('#masthead').classList.toggle('active')"></div>

  </div>

</header>