<?php
/**
 * Title: Footer Credits
 * Slug: modul-r/footer-credits
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<?php
// Privacy policy link
if ( function_exists( 'the_privacy_policy_link' ) ) {
	the_privacy_policy_link( '', ' <span role="separator" aria-hidden="true">-</span> ' );
}
?>
<a href="<?php esc_url( __( '//wordpress.org/', 'modul-r' ) ); ?>"><?php esc_html_e( 'Proudly powered by WordPress', 'modul-r' ); ?></a> &
<a href="<?php echo esc_url( __( '//codekraft.it', 'modul-r' ) ); ?>"><?php esc_html_e( 'made with &hearts; by codekraft-studio', 'modul-r' ); ?></a> -
<?php printf(
	/* Translators: WordPress link. */
	esc_html__( 'Proudly powered by %s', 'modulr' ),
	'<a href="' . esc_url( __( 'https://wordpress.org', 'modulr' ) ) . '" rel="nofollow">WordPress</a>'
);
// Website credits section (year - url)
echo '&copy; ' . date_i18n( 'Y' ) ?> <?php echo str_replace(array( 'http://', 'https://' ), '', esc_url(home_url()) ) ;
