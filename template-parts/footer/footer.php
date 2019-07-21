<footer id="colophon" class="site-footer">

	<?php if(is_active_sidebar('footer-main')): ?>
		<div class="footer-widgets main-width alignwide">
			<?php dynamic_sidebar('footer-main'); ?>
		</div>
	<?php endif; ?>

	<div class="footer-credits">
		<p class="main-width alignwide">
      <a href="<?php esc_url( __( '//wordpress.org/', 'modul-r' )); ?>"><?php esc_html_e('Proudly powered by WordPress',  'modul-r'); ?></a> -
      &copy; <?php echo date_i18n( 'Y' ) ?> <?php echo str_replace(array( 'http://', 'https://' ), '', site_url()); ?> -

      <?php if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span> - ' );
      } ?>

      <a href="<?php echo esc_url( __('//codekraft.it', 'modul-r') ); ?>"><?php esc_html_e('Made with &hearts; by codekraft-studio.',  'modul-r'); ?></a>
		</p>
	</div>

</footer>