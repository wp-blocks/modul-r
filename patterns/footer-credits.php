<?php
/**
 * Title: Footer Credits
 * Slug: modul-r/footer-credits
 * Block Types: core/template-part/footer
 * Categories: footer, modul-r
 */

// Define an array of engaging emojis for the "made with" section
$emoji_pool = array( '❤️', '☕', '🚀', '✨', '⚡', '🔥' );

// Select a random emoji from the array
$random_emoji = $emoji_pool[ array_rand( $emoji_pool ) ];

echo '<!-- wp:paragraph {"align":"right","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"}}},"textColor":"secondary-light","fontSize":"extra-small"} -->
  <p class="has-text-align-right has-secondary-light-color has-text-color has-link-color has-extra-small-font-size" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">';

// Privacy policy link
if ( function_exists( 'the_privacy_policy_link' ) ) {
	the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"> - </span>' );
}
?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'modul-r' ) ); ?>"><?php esc_html_e( 'Proudly powered by WordPress', 'modul-r' ); ?></a> &
	<a href="<?php echo esc_url( __( 'https://codekraft.it', 'modul-r' ) ); ?>">
		<?php
		/* translators: %s: random emoji */
		printf( esc_html__( 'made with %s by codekraft-studio', 'modul-r' ), $random_emoji );
		?>
	</a> -
<?php
// Website credits section (year - url)
printf(
	'&copy; %s %s',
	date_i18n( 'Y' ),
	str_replace( array( 'http://', 'https://' ), '', esc_url( home_url() ) )
);

echo '</p><!-- /wp:paragraph -->';
