<div class="social-links">

  <?php

	$social_enabled = $GLOBALS['modul_r_defaults']['social_media_enabled'];

	foreach ( $social_enabled as $social ) {
		if ( null !== ($social_url = get_theme_mod( 'modul_r_social_' . $social ) ) ) {
			if ( !empty($social_url)) {
				echo '<a href="'.$social_url.'" target="_blank"><i class="social-ico small '.strtolower($social).'"></i></a>';
			};
		}
	}

	?>

</div>