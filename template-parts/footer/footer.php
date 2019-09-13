<footer id="colophon" class="site-footer has-primary-background-color" role="contentinfo">

	<?php


    if(is_active_sidebar('footer-main')) {  ?>
      <div class="footer-widgets main-width alignwide">

	      <?php
          // get theme option "credits section"
          if ( get_theme_mod( 'modul_r_footer_show_credits' ) === true ) {
            echo '<section id="footer-credits" class="widget credits">';
              if ( get_theme_mod( 'modul_r_footer_credits_show_logo' ) === true ) {
                echo '<div class="site-logo">' . the_custom_logo() . '</div>';
              }

              printf('<h2>%s</h2>', esc_html(get_theme_mod( 'modul_r_footer_credits_title' )));
              printf('<p>%s</p>', nl2br(esc_html(get_theme_mod( 'modul_r_footer_credits_content' ))));

            echo '</section>';
          }
        ?>

        <?php dynamic_sidebar( 'footer-main' ); ?>

      </div>
    <?php } ?>

	<div class="footer-info">

		<p class="main-width alignwide">
      <a href="<?php esc_url( __( '//wordpress.org/', 'modul-r' )); ?>"><?php esc_html_e('Proudly powered by WordPress',  'modul-r'); ?></a> -
      &copy; <?php echo date_i18n( 'Y' ) ?> <?php echo str_replace(array( 'http://', 'https://' ), '', esc_url(home_url()) ) ; ?> -

      <?php if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span> - ' );
      } ?>

      <a href="<?php echo esc_url( __('//codekraft.it', 'modul-r') ); ?>"><?php esc_html_e('Made with &hearts; by codekraft-studio.',  'modul-r'); ?></a>
		</p>

	</div>

</footer>