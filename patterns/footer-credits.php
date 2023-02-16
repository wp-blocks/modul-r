<?php
/**
 * Title: Footer Credits
 * Slug: modul-r/footer-credits
 * Block Types: core/template-part/footer
 * Categories: footer, modul-r
 */
?>
<?php echo '<!-- wp:paragraph {"align":"right","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-light"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"}}},"textColor":"primary-light","fontSize":"extra-small"} -->
	<p class="has-text-align-right has-primary-light-color has-text-color has-link-color has-extra-small-font-size" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">';
// Privacy policy link
if ( function_exists( 'the_privacy_policy_link' ) ) {
	the_privacy_policy_link( '', ' <span role="separator" aria-hidden="true">-</span> ' );
}
?>
	<a href="<?php esc_url( __( '//wordpress.org/', 'modul-r' ) ); ?>"><?php esc_html_e( 'Proudly powered by WordPress', 'modul-r' ); ?></a> &
	<a href="<?php echo esc_url( __( '//codekraft.it', 'modul-r' ) ); ?>"><?php esc_html_e( 'made with &hearts; by codekraft-studio', 'modul-r' ); ?></a> -
<?php
// Website credits section (year - url)
printf(
		'&copy; %s %s',
		date_i18n( 'Y' ),
		str_replace(
				array(
						'http://',
						'https://',
				),
				'',
				esc_url( home_url() )
		)
);
echo '</p><!-- /wp:paragraph -->';
