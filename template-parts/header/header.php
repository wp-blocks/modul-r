<?php
  $show_header_text = display_header_text();
  $description = get_bloginfo( 'description', 'display' );
  $custom_logo = get_theme_mod( 'custom_logo' );
?>

<header id="masthead" class="site-header" >

	<div class="site-branding-container main-width alignwide">

    <?php modul_r_header_image(); ?>

    <div class="site-branding<?php if ( $show_header_text ) {echo ' has-header-text';} ?><?php if ( $custom_logo ) {echo ' has-custom-logo';} ?>">
      <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php if ( $show_header_text ) : ?>
        <div class="header-text">
          <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" <?php modul_r_header_textcolor() ?>><?php bloginfo( 'name' ); ?></a></h2>
          <?php if ( $description ) { ?>
            <p class="site-description"><?php echo $description; ?></p>
          <?php } ?>
        </div>
      <?php endif; ?>
    </div>


		<?php if ( has_nav_menu( 'header-main' ) ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<?php
          wp_nav_menu( array(
              'theme_location' => 'header-main',
              'menu_class'     => 'main-menu',
              'container_class' => 'menu-wrap',
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ) );
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