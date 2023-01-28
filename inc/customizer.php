<?php

/**
 * get the rgb color from hex
 *
 * @param $color
 *
 * @return false|mixed|string
 */
function modul_r_hex2rgb( $hex_color, $decimal = false ) {

  $color = ( $hex_color[0] == '#' ) ?  substr( $hex_color, 1 ) : null;

    if ( strlen( $color ) == 6 ) {
        list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $color;
    }

    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );

    return $decimal ? "$r,$g,$b" : "rgb($r,$g,$b)";
}

/**
 * Increases or decreases the brightness of a color by a percentage of the current brightness.
 * https://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 *
 * @param   string $hexCode        Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`
 * @param   float  $adjustPercent  A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
 *
 * @return  string
 */
function modul_r_adjustBrightness($hexCode, $adjustPercent) {

    $hexCode = ltrim($hexCode, '#');

    if (strlen($hexCode) == 3) {
        $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
    }

    $hexCode = array_map('hexdec', str_split($hexCode, 2));

    foreach ($hexCode as & $color) {
        $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
        $adjustAmount = ceil($adjustableLimit * $adjustPercent);

        $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
    }

    return '#' . implode($hexCode);
}


/**
 * check for the existence of a color in theme mods otherwise return the escaped default color
 *
 * @param $theme_mod_color
 * @param $default_color
 *
 * @return string|void
 */
function modul_r_get_theme_color($theme_mod_color, $default_color = "#FF0000") {
    return get_theme_mod( $theme_mod_color ) !== false ? sanitize_hex_color(get_theme_mod( $theme_mod_color )) : sanitize_hex_color($default_color);
}


/**
 * Customizer options
 */
if ( ! function_exists('modul_r_customizer_opt') ) :
	function modul_r_customizer_opt( $wp_customize ) {

		$font_json = file_get_contents(get_template_directory() . '/inc/third-party/fonts.json');

		// Creates custom title and description for theme customizer controls
		class modul_r_custom_text_control extends WP_Customize_Control {
			public $type = 'customtext';
			public $extra = '';
			public $add_class = '';
			public function render_content() {
				?>
				<label <?php if ($this->add_class != '') { echo 'class="' . $this->add_class . '"'; }?>>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<span><?php echo esc_html( $this->extra ); ?></span>
				</label>
				<?php
			}
		}

		function add_setting_from_array($settings_array, $group, $wp_customize) {
		  foreach ($settings_array as $setting) {

          // the wide content width
          if ($setting['input'] === 'number') {
              $wp_customize->add_setting( 'modul_r_defaults_' . $setting['name'], array(
                  'capability'        => 'edit_theme_options',
                  'default'           => abs($setting['default']),
                  'transport'         => 'refresh',
                  'sanitize_callback' => $setting['input_type'] === 'float' ? 'modul_r_sanitize_abs' : 'absint',
              ) );
              $wp_customize->add_control( 'modul_r_defaults_' . $setting['name'], array(
                  'type'        => 'number',
                  'section'     => 'modul_r_' . $group,
                  'label'       => $setting['name'],
                  'input_attrs' => array(
                      'min'  => '0',
                      'step' => $setting['input_type'] === 'float' ? '0.01' : '1',
                      'max'  => '9999',
                  ),
              ) );

          } else if ($setting['input'] === 'select') {

              // Font Family - title
              $wp_customize->add_setting( 'modul_r_defaults_' . $setting['name'], array(
                  'capability'        => 'edit_theme_options',
                  'default' => array_search( abs($setting['default']), $GLOBALS['modul_r_defaults']['customizer_options'][$setting['select_type']]),
                  'sanitize_callback' => 'modul_r_sanitize_select',
              ) );

              $wp_customize->add_control( 'modul_r_defaults_' . $setting['name'], array(
                  'type'    => 'select',
                  'choices' => $GLOBALS['modul_r_defaults']['customizer_options'][$setting['select_type']],
                  'section'     => 'modul_r_' . $group,
                  'description' => esc_html__( 'Select', 'modul-r' ) . ' ' . $setting['name'] ,
              ) );

          }

      }
    }

		// Template color scheme

		// Primary color
		$wp_customize->add_setting( 'primary-color', array(
			'default'   => esc_attr($GLOBALS['modul_r_defaults']['colors']['primary']),
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary-color', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Primary Color', 'modul-r' ),
		) ) );


		// Secondary color
		$wp_customize->add_setting( 'secondary-color', array(
			'default'   => esc_attr($GLOBALS['modul_r_defaults']['colors']['secondary']),
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary-color', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Secondary Color', 'modul-r' ),
		) ) );

	  $wp_customize->add_setting( 'text-color', array(
		  'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['text-color'] ] ),
		  'transport'         => 'refresh',
		  'sanitize_callback' => 'sanitize_hex_color',
	  ) );
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text-color', array(
		  'section'  => 'colors',
		  'label'    => esc_html__( 'Text Color', 'modul-r' )
	  ) ) );

	// Modul-R custom options
	$wp_customize->add_panel( 'modul_r_theme_options' , array(
		'title'      => esc_html__('Modul-R Options','modul-r')
	) );

    add_setting_from_array($GLOBALS['modul_r_defaults']['customizer_options']['sizes'], 'settings_sidebar', $wp_customize );

    // Typography Section
    $wp_customize->add_section( 'modul_r_typography_options' , array(
        'title'      => esc_html__('Typography','modul-r'),
        'priority'   => 50,
        'panel'      => 'modul_r_theme_options'
    ) );

    // Font Family - title
    $wp_customize->add_setting( 'modul_r_typography_font_family_title', array(
        'capability' => 'edit_theme_options',
        'default' => 0,
        'sanitize_callback' => 'modul_r_sanitize_select',
    ) );

    $wp_customize->add_control( 'modul_r_typography_font_family_title', array(
        'type'    => 'select',
        'choices' => json_decode($font_json),
        'section' => 'modul_r_typography_options',
        'description' => esc_html__( 'Select the font family for the titles', 'modul-r' ),
    ) );

    // Font Family - text
    $wp_customize->add_setting( 'modul_r_typography_font_family_text', array(
        'capability' => 'edit_theme_options',
        'default' => 0,
        'sanitize_callback' => 'modul_r_sanitize_select',
    ) );

    $wp_customize->add_control( 'modul_r_typography_font_family_text', array(
        'type'    => 'select',
        'choices' => json_decode($font_json),
        'section' => 'modul_r_typography_options',
        'description' => esc_html__( 'Select the default font family', 'modul-r' ),
    ) );

    // add the font weight select
    add_setting_from_array($GLOBALS['modul_r_defaults']['customizer_options']['font_weight'], 'typography_options', $wp_customize );

    // Layout Section
    $wp_customize->add_section( 'modul_r_layout_options' , array(
        'title'      => esc_html__('Layout','modul-r'),
        'priority'   => 50,
        'panel'      => 'modul_r_theme_options'
    ) );


    // The content width
    $wp_customize->add_setting( 'modul_r_content_width', array(
        'capability' => 'edit_theme_options',
        'default'   => 900,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'modul_r_content_width',
        array(
            'type' => 'number',
            'section' => 'modul_r_layout_options',
            'label' => esc_html__( 'The content width', 'modul-r' ),
            'description' => esc_html__( 'input the wanted width for the content', 'modul-r' ),
            'input_attrs' => array(
                'min' => '0', 'step' => '1', 'max' => '9999',
            ),
        )
    );

    // the wide content width
    $wp_customize->add_setting( 'modul_r_content_width_wide', array(
        'capability' => 'edit_theme_options',
        'default'   => 1500,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'modul_r_content_width_wide',
        array(
            'type' => 'number',
            'section' => 'modul_r_layout_options',
            'label' => esc_html__( 'The wide content with', 'modul-r' ),
            'description' => esc_html__( 'input the wanted width for the content', 'modul-r' ),
            'input_attrs' => array(
                'min' => '0', 'step' => '1', 'max' => '9999',
            ),
        )
    );

    $wp_customize->add_control( 'modul_r_baseunit',
        array(
            'type' => 'number',
            'section' => 'modul_r_layout_options',
            'label' => esc_html__( 'The standard distance unit ', 'modul-r' ),
            'description' => esc_html__( 'the unit used as sizer (will be multiplied to get the medium and the large margin)', 'modul-r' ),
            'input_attrs' => array(
                'min' => '0', 'step' => '1', 'max' => '24',
            ),
        )
    );


		// Sanitize function for checkbox value
		function modul_r_sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}

		// Sanitize function for pages
		function modul_r_sanitize_pages_dropdown( $page_id, $setting ) {
			// Ensure $page_id is an absolute integer.
			$page_id = absint( $page_id );

			// If $page_id is an ID of a published page, return it; otherwise, return the default.
			return ( get_post_status( $page_id ) == 'publish'? $page_id : $setting->default );
		}

    function modul_r_sanitize_select( $selected, $setting ) {
        // Ensure $selected options is an absolute integer then return the selected option
        return absint( $selected );
    }
      function modul_r_sanitize_abs( $selected ) {
          // Ensure $selected options is an absolute integer then return the selected option
          return abs( $selected );
      }

		// Sanitize function for categories
		function modul_r_sanitize_category_dropdown( $cat_id, $setting ) {
			// Ensure $cat_id is an absolute integer.
			$cat_id = absint( $cat_id );

			// If $cat_id term exist, return it; otherwise, return the default.
			return ( term_exists( $cat_id ) != 0 ? $cat_id : $setting->default );
		}

	  // Sanitize function for file input
	  function modul_r_sanitize_file( $file, $setting ) {

		  // allowed file types
		  $mimes = array(
			  'jpg|jpeg|jpe' => 'image/jpeg',
			  'gif'          => 'image/gif',
			  'png'          => 'image/png',
			  'svg'          => 'image/svg'
		  );

		  // check file type from file name
		  $file_ext = wp_check_filetype( $file, $mimes );

		  // if file has a valid mime type return it, otherwise return default
		  return ( $file_ext['ext'] ? $file : $setting->default );
	  }

	}
endif;
add_action( 'customize_register', 'modul_r_customizer_opt' );

if ( ! function_exists('modul_r_theme_colors_setup') ) :
	function modul_r_theme_colors_setup() {

		// get the custom colors
		$primary_color = sanitize_hex_color(get_theme_mod( 'primary-color' ));
		$secondary_color = sanitize_hex_color(get_theme_mod( 'secondary-color' ));

		// check if custom color is set otherwise use the default colors
		$primary_color = $primary_color != "" ? $primary_color : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['primary']);
		$secondary_color = $secondary_color != "" ? $secondary_color : sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['secondary']);

    $variance = floatval( $GLOBALS['modul_r_defaults']['customizer_options']['color_variance'] );

		add_theme_support( 'editor-color-palette', array(
      array(
        'name'  => __( 'Theme primary color', 'modul-r' ),
        'slug'  => 'primary',
        'color' => $primary_color,
      ),
			array(
				'name'  => __( 'Theme primary color light', 'modul-r' ),
				'slug'  => 'primary-light',
				'color' => modul_r_adjustBrightness($primary_color, $variance),
			),
			array(
				'name'  => __( 'Theme primary color dark', 'modul-r' ),
				'slug'  => 'primary-dark',
				'color' => modul_r_adjustBrightness($primary_color, -$variance ),
			),
      array(
        'name'  => __( 'Theme secondary color', 'modul-r' ),
        'slug'  => 'secondary',
        'color' => $secondary_color,
      ),
			array(
				'name'  => __( 'Theme secondary color light', 'modul-r' ),
				'slug'  => 'secondary-light',
				'color' => modul_r_adjustBrightness($secondary_color, $variance),
			),
			array(
				'name'  => __( 'Theme secondary color dark', 'modul-r' ),
				'slug'  => 'secondary-dark',
				'color' => modul_r_adjustBrightness($secondary_color, -$variance),
			),
			array(
				'name'  => __( 'White', 'modul-r' ),
				'slug'  => 'white',
				'color' => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white']),
			),
			array(
				'name'  => __( 'White Smoke', 'modul-r' ),
				'slug'  => 'white-smoke',
				'color' => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['white-smoke']),
			),
			array(
				'name'  => __( 'Light gray', 'modul-r' ),
				'slug'  => 'gray-light',
		    'color' => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-light']),
			),
			array(
				'name'  => __( 'Gray', 'modul-r' ),
				'slug'  => 'gray',
		    'color' => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray']),
			),
			array(
				'name'  => __( 'Dark gray', 'modul-r' ),
				'slug'  => 'gray-dark',
        'color' => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['gray-dark']),
			),
			array(
				'name'  => __( 'Black', 'modul-r' ),
				'slug'  => 'black',
		    'color' => sanitize_hex_color($GLOBALS['modul_r_defaults']['colors']['black']),
			),
		) );
	}
endif;
add_action( 'after_setup_theme', 'modul_r_theme_colors_setup' );


if ( ! function_exists( 'modul_r_css_props' ) ) :
    function modul_r_css_props() {

	        $font_json = file_get_contents(get_template_directory() . '/inc/third-party/fonts.json');

			// get the custom colors

			// Main colors
			$colors                    = array();
			$variance                  = floatval( $GLOBALS['modul_r_defaults']['customizer_options']['color_variance'] );
			$colors['primary']         = modul_r_get_theme_color( 'primary-color', $GLOBALS['modul_r_defaults']['colors']['primary'] );
			$colors['primary-light']   = modul_r_adjustBrightness( $colors['primary'], $variance );
			$colors['primary-dark']    = modul_r_adjustBrightness( $colors['primary'], - $variance );
			$colors['secondary']       = modul_r_get_theme_color( 'secondary-color', $GLOBALS['modul_r_defaults']['colors']['secondary'] );
			$colors['secondary-light'] = modul_r_adjustBrightness( $colors['secondary'], $variance );
			$colors['secondary-dark']  = modul_r_adjustBrightness( $colors['secondary'], - $variance );
			// base colors
			$colors['white']       = sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors']['white'] );
			$colors['white-smoke'] = sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors']['white-smoke'] );
			$colors['gray-light']  = sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors']['gray-light'] );
			$colors['gray']        = sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors']['gray'] );
			$colors['gray-dark']   = sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors']['gray-dark'] );
			$colors['black']       = sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors']['black'] );

			// Typography colors
			$text_color = get_theme_mod( 'text-color' ) !== false ? sanitize_hex_color( get_theme_mod( 'text-color' ) ) : sanitize_hex_color( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['text-color'] ] );

			// Colors
			$header_background        = modul_r_get_theme_color( 'header-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-color'] ] );
			$footer_background        = modul_r_get_theme_color( 'footer-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-color'] ] );
			$footer_bottom_background = modul_r_get_theme_color( 'footer-bottom-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-bottom-color'] ] );

			$font_family_title = get_theme_mod( 'modul_r_typography_font_family_title' ) !== false ? $font_json[ intval( get_theme_mod( 'modul_r_typography_font_family_title' ) ) ] : $font_json[0];
			$font_family_text  = get_theme_mod( 'modul_r_typography_font_family_text' ) !== false ? $font_json[ intval( get_theme_mod( 'modul_r_typography_font_family_text' ) ) ] : $font_json[0];

			// Typography
			function modul_r_get_vars( $var_set, $suffix = "--wp--" ) {
				$vars = '';
				foreach ( $var_set as $option ) {
					if ( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) {
						if ( $option['input'] !== 'select' ) {
							$vars .= $suffix . $option['name'] . ":" . abs( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) . ( ! empty( $option['unit'] ) ? $option['unit'] : '' ) . ';';
						} else {
							$vars .= $suffix . $option['name'] . ":" . $GLOBALS['modul_r_defaults']['customizer_options'][ $option['select_type'] ][ abs( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) ] . ';';
						}
					} else {
						$vars .= $suffix . $option['name'] . ":" . $option['default'] . ( ! empty( $option['unit'] ) ? $option['unit'] : '' ) . ';';
					}
				}

				return $vars;
			}

			$atf_css      = '';

			$wp_theme_json_prefix = '--wp--preset--color--';

			// HEADER
			// set the header color
			$atf_css .= 'body .header-color, body.has-featured-image.top #masthead.active {background-color: ' . $header_background . ';} .has-featured-image.top #masthead {background-color: ' . $header_background . 'dd;}';

			// On top of the screen set the opacity to 0
			if ( get_theme_mod( 'modul_r_header_opacity' ) > 0 ) {
				$atf_css .= 'body.has-featured-image.top #masthead {background-color: ' . $header_background . '00;}';
			} else {
				// if it has a featured image and is at the top of the page....has-featured-image.top
				$atf_css .= 'body.has-featured-image.top #masthead {background-color: ' . $header_background . 'dd;}';
			}

			// Set the responsive header opacity
			$atf_css .= '@media (max-width: 960px) {body .main-navigation {background-color: ' . modul_r_adjustBrightness( $header_background, 0.2 ) . 'ee;}}';

			// Set the nav background colors
			$atf_css .= 'body ul.sub-menu {background-color: ' . modul_r_adjustBrightness( $header_background, 0.1 ) . ';}';
			$atf_css .= 'body.has-featured-image.top #masthead ul.sub-menu {background-color: ' . $header_background . 'cc;}';
			$atf_css .= 'body ul.sub-menu ul.sub-menu {background-color: ' . modul_r_adjustBrightness( $header_background, 0.2 ) . ';}';
			$atf_css .= 'body ul.sub-menu li:hover {background-color: ' . modul_r_adjustBrightness( $header_background, 0.3 ) . ';}';

			$font_weights = modul_r_get_vars( $GLOBALS['modul_r_defaults']['customizer_options']['font_weight'], "--typography--default--" );

			// create the custom colors scheme
			foreach ( $colors as $key => $color ) {
				$custom_prop_color = "var(". $wp_theme_json_prefix . $key . ")";
				$atf_css           .= ' .has-' . $key . '-color, .wp-block-pullquote.is-style-solid-color blockquote.has-' . $key . '-color, .wp-block-pullquote.is-style-solid-color blockquote.has-' . $key . '-color p{color:' . $custom_prop_color . '}';
				$atf_css           .= ' .has-' . $key . '-background-color, .wp-block-pullquote.is-style-solid-color.has-' . $key . '-background-color{background:' . $custom_prop_color . '}.has-' . $key . '-background-color:before{background:' . $custom_prop_color . ' !important}';
			}

			$custom_props = "{".
			 "--typography--title--font-family: '".str_replace("+", " ", $font_family_title)."', sans-serif;" .
			 "--typography--content--font-family: '".str_replace("+", " ", $font_family_text)."', sans-serif;" .
			 $font_weights.

			"--color--black--decimal: ".modul_r_hex2rgb($colors['black'], true). ";" .
			"--color--white--decimal: ".modul_r_hex2rgb($colors['white'], true). ";" .
			"--color--secondary--decimal: ".modul_r_hex2rgb($colors['secondary'], true). ";" .
			"--color--primary--decimal: ".modul_r_hex2rgb($colors['primary'], true). ";" .

            "--color--text: $text_color;" .

		  "}";

			if (is_admin()) {
				wp_add_inline_style( 'modul-r-admin', ':root .editor-styles-wrapper' . $custom_props . $atf_css );
			} else {
				echo  "<style id='modul-r-style-css'>body" . $custom_props . $atf_css . "</style>";
			}
    };
endif;
add_action( 'enqueue_block_assets', 'modul_r_css_props', 2 );
