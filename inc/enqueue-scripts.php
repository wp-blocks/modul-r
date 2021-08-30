<?php
/**
 * Add color styling from theme
 */
if ( ! function_exists( 'modul_r_theme_color' ) ) :
    function modul_r_theme_color() {
        $header_background = modul_r_get_theme_color( 'header-color', $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-color']] );
        echo '<meta name="theme-color" content="' . modul_r_adjustBrightness( $header_background, 0.2 ) . '" />';
    }
endif;
add_action( 'wp_head', 'modul_r_theme_color' );

/**
 * Enqueue admin style
 */
function modul_r_admin_style() {
	wp_register_style( 'modul-r-admin-css', get_template_directory_uri() . '/assets/dist/css/admin.css' );
	wp_enqueue_style( 'modul-r-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'modul_r_admin_style' );

/**
 * Load fonts
 */
if ( ! function_exists( 'modul_r_theme_fonts' ) ) :
	function modul_r_theme_fonts() {

    $font_family[] = get_theme_mod( 'modul_r_typography_font_family_title' ) !== false ? $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][ intval( get_theme_mod( 'modul_r_typography_font_family_title' ) ) ] : $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][0];
    $font_family[] = get_theme_mod( 'modul_r_typography_font_family_text' ) !== false && get_theme_mod( 'modul_r_typography_font_family_title' ) !== get_theme_mod( 'modul_r_typography_font_family_text' ) ? $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][ intval( get_theme_mod( 'modul_r_typography_font_family_text' ) ) ] : $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][0];

    $font_query = array();
    $font_weight = array();
    foreach ( $GLOBALS['modul_r_defaults']['customizer_options']['font_weight'] as $option ) {
        if ( get_theme_mod( 'modul_r_defaults_'.$option['name'] ) ) {
            $weight = $GLOBALS['modul_r_defaults']['customizer_options']['weights'][intval(get_theme_mod( 'modul_r_defaults_'.$option['name'] ))];
            $font_weight[] = intval($weight);
        }
    }

    if (!empty($font_weight) && !empty($font_family)) {

      sort($font_weight,SORT_NUMERIC );

      foreach ($font_family as $font) {
        $font_query[] = "family=$font:wght@" . implode(";", $font_weight );
      }

    }

    if ($font_query) wp_enqueue_style( 'modul-r-fonts', "https://fonts.googleapis.com/css2?" . implode("&", $font_query) . "&display=swap", array(), null );

		wp_enqueue_style( "modul-r-icons", "https://fonts.googleapis.com/css2?family=Material+Icons&display=swap", array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_fonts', 10 );
add_action( 'admin_enqueue_scripts', 'modul_r_theme_fonts', 10 );


/**
 * Fix for ios that overlaps content with the lower nav bar
 */
if ( ! function_exists( 'modul_r_fix_content_height' ) ) :
    function modul_r_fix_content_height() {
        ?>
        <script>
          function setFullHeight() {
            // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
            let vh = window.innerHeight * 0.01;
            // Then we set the value in the --vh custom property to the root of the document
            document.documentElement.style.setProperty('--vh', `${vh}px`);
          }

          setFullHeight();

          window.addEventListener('resize', function() {
            setFullHeight();
          });
        </script>
        <?php
    }
endif;
add_action( 'wp_footer', 'modul_r_fix_content_height', 10 );

/**
 * Enqueue main style
 */
if ( ! function_exists( 'modul_r_theme_style' ) ) :
	function modul_r_theme_style() {
		wp_enqueue_style( 'modul-r-style', get_stylesheet_uri(), array() );
	}
endif;
add_action( 'wp_footer', 'modul_r_theme_style', 1 );


/**
 * Load scripts
 */
if ( ! function_exists( 'modul_r_theme_scripts' ) ) :
	function modul_r_theme_scripts() {

		// Register and Enqueue
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'modul-r-scripts-vendors', get_template_directory_uri() . "/assets/dist/js/vendor-scripts.js", array( 'jquery' ), false, true );
		wp_enqueue_script( 'modul-r-scripts-vendors' );
		wp_register_script( 'modul-r-scripts-main', get_template_directory_uri() . "/assets/dist/js/scripts.js", array( 'modul-r-scripts-vendors' ), false, true );
		wp_enqueue_script( 'modul-r-scripts-main' );

	}
endif;
add_action( 'wp_enqueue_scripts', 'modul_r_theme_scripts' ); // Add Theme admin scripts


/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );



