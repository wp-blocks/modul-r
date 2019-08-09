<?php
  $show_header_text = display_header_text();
  $description = get_bloginfo( 'description', 'display' );
  $custom_logo = get_theme_mod( 'custom_logo' );
?>

<header id="masthead" class="site-header" role="banner">

	<div class="site-branding-container main-width alignwide">

    <?php modul_r_header_image(); ?>

    <div class="site-branding<?php if ( $show_header_text ) {echo ' has-header-text';} if ( $custom_logo ) {echo ' has-custom-logo';} ?>">
      <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php if ( $show_header_text ) : ?>
        <div class="header-text">
          <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo _wp_specialchars( get_bloginfo( 'name' ), 1 ) ?>" rel="home" class="primary-color">
		        <?php bloginfo( 'name' ); ?>
            </a>
          </h1>
          <?php if ( $description ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="menu-shadow" onclick="document.querySelector('#masthead').classList.toggle('active')"></div>
    <div class="menu-resp unselectable" onclick="document.querySelector('#masthead').classList.toggle('active')">
      <button class="c-hamburger">
        <i class="menu-toggle"></i>
        <span class="screen-reader-text"><?php _e( 'menu', 'modul-r' ); ?></span>
      </button>
    </div>

		<?php if ( has_nav_menu( 'header-main' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
          wp_nav_menu( array(
            'theme_location'  => 'header-main',
            'menu_class'      => 'main-menu',
            'container_class' => 'menu-wrap',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          ) );
        ?>
			</nav>
		<?php endif; ?>

	</div>

</header>