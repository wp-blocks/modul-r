<footer id="colophon" class="site-footer">

	<?php if(is_active_sidebar('footer-main')): ?>
		<div class="footer-widgets main-width alignwide">
			<?php dynamic_sidebar('footer-main'); ?>
		</div>
	<?php endif; ?>

	<div class="footer-credits">
		<p class="main-width alignwide">
      <a href="<?php echo esc_url( __( 'https://wordpress.org/',  'modul-r' ) ); ?>"><?php _e('Proudly powered by WordPress',  'modul-r'); ?></a> -
      &copy; <?php echo date( 'Y' ) ?> <?php echo str_replace(array( 'http://', 'https://' ), '', site_url()); ?> -
      <?php
      if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span> - ' );
      }
      ?>
      <a href="<?php echo esc_url( __( 'https://codekraft.it',  'modul-r' ) ); ?>"><?php _e('Made with &hearts; by codekraft-studio.',  'modul-r'); ?></a>
		</p>
	</div>

</footer>