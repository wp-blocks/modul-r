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

function modul_r_get_available_fonts() {
	$font_json = file_get_contents( get_template_directory() . '/inc/third-party/fonts.json' );
	$font_set  = array();
	foreach ( json_decode( $font_json ) as $font_name => $font_weights ) {
		$font_set[ key($font_weights) ] = key($font_weights);
	}

	return $font_set;
}

function modul_r_add_font_preset($label, $group, $wp_customize) {
	$data_title = $GLOBALS['modul_r_defaults']['customizer_options'][ 'font_family_' . $label ];
	foreach ($data_title as $setting) {
		foreach ($GLOBALS['modul_r_defaults']['customizer_options'][$setting['select_type']] as $fieldname) {
			$field_values[$fieldname] = $fieldname;
		}

		if ( ! empty( $field_values ) ) {
			// Font Family - title
			$wp_customize->add_setting( 'modul_r_defaults_' . $label . '_' . $setting['name'], array(
							'capability'        => 'edit_theme_options',
							'default'           => $setting['default'],
							'sanitize_callback' => 'modul_r_sanitize_select',
			) );

			$wp_customize->add_control( 'modul_r_defaults_' . $label . '_' . $setting['name'], array(
							'type'        => 'select',
							'choices'     => $field_values,
							'section'     => 'modul_r_' . $group,
							'description' => esc_html__( 'Select', 'modul-r' ) . ' ' . $label . ' ' . $setting['name'],
			) );
		}
	}
}

/**
 * Customizer options
 */
if ( ! function_exists('modul_r_customizer_opt') ) :
	function modul_r_customizer_opt( $wp_customize ) {

		$font_set = modul_r_get_available_fonts();

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
        'sanitize_callback' => 'modul_r_sanitize_select_font',
    ) );

    $wp_customize->add_control( 'modul_r_typography_font_family_title', array(
        'type'    => 'select',
        'choices' => $font_set,
        'section' => 'modul_r_typography_options',
        'description' => esc_html__( 'Select the font family for the titles', 'modul-r' ),
    ) );

		modul_r_add_font_preset(
				'title',
				'typography_options',
				$wp_customize
		);

    // Font Family - text
    $wp_customize->add_setting( 'modul_r_typography_font_family_default', array(
        'capability' => 'edit_theme_options',
        'default' => 0,
        'sanitize_callback' => 'modul_r_sanitize_select_font',
    ) );

    $wp_customize->add_control( 'modul_r_typography_font_family_default', array(
        'type'    => 'select',
        'choices' => $font_set,
        'section' => 'modul_r_typography_options',
        'description' => esc_html__( 'Select the default font family', 'modul-r' ),
    ) );

    // add the font weight select
    modul_r_add_font_preset(
						'default',
						'typography_options',
						$wp_customize
		);

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

		function modul_r_sanitize_select_font( $selected, $setting ) {
			$fontsets = modul_r_get_available_fonts();

			// Ensure $selected options is an absolute integer then return the selected option
			return ($fontsets[$selected]) ? $selected : 'Monserrat';
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

if ( ! function_exists( 'modul_r_theme_colors_setup' ) ) :
	function modul_r_theme_colors_setup() {

		// Get the custom colors.
		$primary_color   = sanitize_hex_color( get_theme_mod( 'primary-color' ) );
		$secondary_color = sanitize_hex_color( get_theme_mod( 'secondary-color' ) );

		if ( empty($GLOBALS['modul_r_defaults']) ) return;
		$modul_r_defaults = $GLOBALS['modul_r_defaults'];

		// Check if custom color is set otherwise use the default colors.
		$primary_color   = ! empty( $primary_color ) ? $primary_color : sanitize_hex_color( $modul_r_defaults['colors']['primary'] );
		$secondary_color = ! empty( $secondary_color ) ? $secondary_color : sanitize_hex_color( $modul_r_defaults['colors']['secondary'] );

		$variance = floatval( $modul_r_defaults['customizer_options']['color_variance'] );

		add_theme_support( 'editor-color-palette', array(
				array(
						'name'  => __( 'Theme primary color', 'modul-r' ),
						'slug'  => 'primary',
						'color' => $primary_color,
				),
				array(
						'name'  => __( 'Theme primary color light', 'modul-r' ),
						'slug'  => 'primary-light',
						'color' => modul_r_adjustBrightness( $primary_color, $variance ),
				),
				array(
						'name'  => __( 'Theme primary color dark', 'modul-r' ),
						'slug'  => 'primary-dark',
						'color' => modul_r_adjustBrightness( $primary_color, - $variance ),
				),
				array(
						'name'  => __( 'Theme secondary color', 'modul-r' ),
						'slug'  => 'secondary',
						'color' => $secondary_color,
				),
				array(
						'name'  => __( 'Theme secondary color light', 'modul-r' ),
						'slug'  => 'secondary-light',
						'color' => modul_r_adjustBrightness( $secondary_color, $variance ),
				),
				array(
						'name'  => __( 'Theme secondary color dark', 'modul-r' ),
						'slug'  => 'secondary-dark',
						'color' => modul_r_adjustBrightness( $secondary_color, - $variance ),
				),
				array(
						'name'  => __( 'White', 'modul-r' ),
						'slug'  => 'white',
						'color' => sanitize_hex_color( $modul_r_defaults['shades']['white'] ),
				),
				array(
						'name'  => __( 'White Smoke', 'modul-r' ),
						'slug'  => 'white-smoke',
						'color' => sanitize_hex_color( $modul_r_defaults['shades']['white-smoke'] ),
				),
				array(
						'name'  => __( 'Light gray', 'modul-r' ),
						'slug'  => 'gray-light',
						'color' => sanitize_hex_color( $modul_r_defaults['shades']['gray-light'] ),
				),
				array(
						'name'  => __( 'Gray', 'modul-r' ),
						'slug'  => 'gray',
						'color' => sanitize_hex_color( $modul_r_defaults['shades']['gray'] ),
				),
				array(
						'name'  => __( 'Dark gray', 'modul-r' ),
						'slug'  => 'gray-dark',
						'color' => sanitize_hex_color( $modul_r_defaults['shades']['gray-dark'] ),
				),
				array(
						'name'  => __( 'Black', 'modul-r' ),
						'slug'  => 'black',
						'color' => sanitize_hex_color( $modul_r_defaults['shades']['black'] ),
				),
		) );
	}
endif;
add_action( 'after_setup_theme', 'modul_r_theme_colors_setup' );


if ( ! function_exists( 'modul_r_css_props' ) ) :
    function modul_r_css_props() {

		$defaults = $GLOBALS['modul_r_defaults'];

			// Colors
			$colors                    = array();
			$variance                  = floatval( $defaults['customizer_options']['color_variance'] );
			$colors['primary']         = modul_r_get_theme_color( 'primary-color', $defaults['colors']['primary'] );
			$colors['primary-light']   = modul_r_adjustBrightness( $colors['primary'], $variance );
			$colors['primary-dark']    = modul_r_adjustBrightness( $colors['primary'], - $variance );
			$colors['secondary']       = modul_r_get_theme_color( 'secondary-color', $defaults['colors']['secondary'] );
			$colors['secondary-light'] = modul_r_adjustBrightness( $colors['secondary'], $variance );
			$colors['secondary-dark']  = modul_r_adjustBrightness( $colors['secondary'], - $variance );
			// Shades
			$colors['white']       = sanitize_hex_color( $defaults['shades']['white'] );
			$colors['white-smoke'] = sanitize_hex_color( $defaults['shades']['white-smoke'] );
			$colors['gray-light']  = sanitize_hex_color( $defaults['shades']['gray-light'] );
			$colors['gray']        = sanitize_hex_color( $defaults['shades']['gray'] );
			$colors['gray-dark']   = sanitize_hex_color( $defaults['shades']['gray-dark'] );
			$colors['black']       = sanitize_hex_color( $defaults['shades']['black'] );

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

			// The custom colors scheme generator
			foreach ( $colors as $key => $color ) {
				$custom_prop_color = "var(". $wp_theme_json_prefix . $key . ")";
				$atf_css           .= ' .has-' . $key . '-color, .wp-block-pullquote.is-style-solid-color blockquote.has-' . $key . '-color, .wp-block-pullquote.is-style-solid-color blockquote.has-' . $key . '-color p{color:' . $custom_prop_color . '}';
				$atf_css           .= ' .has-' . $key . '-background-color, .wp-block-pullquote.is-style-solid-color.has-' . $key . '-background-color{background:' . $custom_prop_color . '}.has-' . $key . '-background-color:before{background:' . $custom_prop_color . ' !important}';
			}

			// Typography
			$fonts = modul_r_get_fonts();

			$custom_props = "{";

			foreach ($fonts as $type => $font) {
				$custom_props .= sprintf( "--typography--font--%s: '%s', sans-serif;", $type, $font['name'] );
				foreach ($font['weights'] as $label => $weight) {
					$custom_props .= sprintf( "--typography--font--%s--%s: %s;", $type, $label, $weight );
				}
			}


			$custom_props .= "--color--black--decimal: ".modul_r_hex2rgb($colors['black'], true). ";" .
			"--color--white--decimal: ".modul_r_hex2rgb($colors['white'], true). ";" .
			"--color--secondary--decimal: ".modul_r_hex2rgb($colors['secondary'], true). ";" .
			"--color--primary--decimal: ".modul_r_hex2rgb($colors['primary'], true). ";" .
		  "}";

			if (is_admin()) {
				wp_add_inline_style( 'modul-r-admin', ':root .editor-styles-wrapper' . $custom_props . $atf_css );
			} else {
				echo  "<style id='modul-r-style-css'>body" . $custom_props . $atf_css . "</style>";
			}
    };
endif;
add_action( 'enqueue_block_assets', 'modul_r_css_props', 2 );
