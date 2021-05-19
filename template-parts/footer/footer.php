<?php
$menu_width = get_theme_mod('modul_r_footer_width') ? ' ' . get_theme_mod('modul_r_footer_width') : '' ;
?>
<footer id="colophon" class="site-footer has-footer-color" role="contentinfo">

	<?php if( is_active_sidebar('footer-main') || get_theme_mod( 'modul_r_footer_show_credits' ) === true ) { ?>
      <div class="footer-widgets main-width<?php echo $menu_width; ?>">

	      <?php
          // get theme option "credits section"
          if ( get_theme_mod( 'modul_r_footer_show_credits' ) === true ) {
            echo '<section id="footer-credits" class="widget credits">';
              if ( get_theme_mod( 'modul_r_footer_credits_show_logo' ) === true ) {
	              if ( get_theme_mod( 'modul_r_footer_custom_logo' ) != '' ) {
		              echo '<div class="site-logo"><img class="custom-logo custom-footer-logo" src="' . esc_url(get_theme_mod( 'modul_r_footer_custom_logo' )) . '"></div>';
	              } else {
                  echo '<div class="site-logo">' . the_custom_logo() . '</div>';
                }
              }

              printf('<h2>%s</h2>', esc_html(get_theme_mod( 'modul_r_footer_credits_title' )));
              printf('<p>%s</p>', nl2br(esc_html(get_theme_mod( 'modul_r_footer_credits_content' ))));

              echo esc_html(get_theme_mod('modul_r_footer_socials_show')) ? get_template_part( 'template-parts/fragments/content', 'social-links' ) : '' ;

            echo '</section>';
          }
        ?>

        <?php dynamic_sidebar( 'footer-main' ); ?>

      </div>
    <?php } ?>

	<div class="footer-info has-footer-bottom-color">

		<p class="main-width<?php echo $menu_width; ?>">
    <?php

    // Privacy policy link
    if ( function_exists( 'the_privacy_policy_link' ) ) {
	    the_privacy_policy_link( '', ' <span role="separator" aria-hidden="true">-</span> ' );
    }

    // Credits section
    if ( get_theme_mod( 'modul_r_footer_thanks_show' ) !== false ) {
	    $special_thanks = esc_html( get_theme_mod( 'modul_r_footer_thanks_txt' ) );
	    if ( $special_thanks === '' ) { ?>
          <a href="<?php esc_url( __( '//wordpress.org/', 'modul-r' ) ); ?>"><?php esc_html_e( 'Proudly powered by WordPress', 'modul-r' ); ?></a> &
          <a href="<?php echo esc_url( __( '//codekraft.it', 'modul-r' ) ); ?>"><?php esc_html_e( 'made with &hearts; by codekraft-studio', 'modul-r' ); ?></a> -
	    <?php } else {
		    $special_thanks_url = get_theme_mod( 'modul_r_footer_thanks_url' );
		    $special_thanks_url === '' ?
            printf( '<span>%s</span> - ', esc_html( $special_thanks ) ) :
            printf( '<a href="%s" target="_blank">%s</a> - ', esc_url( $special_thanks_url ), esc_html( $special_thanks ) );
	    }
    } ?>

    <?php
      // Website credits section (year - url)
      echo '&copy; ' . date_i18n( 'Y' ) ?> <?php echo str_replace(array( 'http://', 'https://' ), '', esc_url(home_url()) ) ;
    ?>
		</p>

	</div>

</footer>