<footer id="colophon" class="site-footer">

	<?php if(is_active_sidebar('footer-main')): ?>
		<div class="footer-widgets main-width alignwide">
			<?php dynamic_sidebar('footer-main'); ?>
		</div>
	<?php endif; ?>

	<div class="footer-credits">
		<p class="main-width alignwide text-right">
			Proudly powered by WordPress - © <?php the_date('Y')?> <?php echo str_replace(array( 'http://', 'https://' ), '', site_url()); ?> - Made with ♥ by codekraft-studio.
		</p>
	</div>

</footer><!-- /colophon -->