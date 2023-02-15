<?php

/**
 * It converts a hexadecimal color value to an RGB value
 *
 * @param string $hex_color The hexadecimal color value to convert.
 * @param bool   $decimal If set to true, the function will return the RGB values as a decimal number.
 *
 * @return string the color in RGB format.
 */
function modul_r_hex2rgb( $hex_color, $decimal = false ) {

	$color = ( $hex_color[0] == '#' ) ? substr( $hex_color, 1 ) : null;

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
 * @param string $hexCode Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`.
 * @param float  $adjustPercent A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
 *
 * @return  string
 */
function modul_r_adjustBrightness( $hexCode, $adjustPercent ) {

	$hexCode = ltrim( $hexCode, '#' );

	if ( strlen( $hexCode ) == 3 ) {
		$hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
	}

	$hexCode = array_map( 'hexdec', str_split( $hexCode, 2 ) );

	foreach ( $hexCode as & $color ) {
		$adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
		$adjustAmount    = ceil( $adjustableLimit * $adjustPercent );

		$color = str_pad( dechex( $color + $adjustAmount ), 2, '0', STR_PAD_LEFT );
	}

	return '#' . implode( $hexCode );
}


/**
 * Check for the existence of a color in theme mods otherwise return the escaped default color.
 *
 * @param $theme_mod_color
 * @param $default_color
 *
 * @return string|void
 */
function modul_r_get_theme_color( $theme_mod_color, $default_color = '#FF0000' ) {
	return get_theme_mod( $theme_mod_color ) !== false ? sanitize_hex_color( get_theme_mod( $theme_mod_color ) ) : sanitize_hex_color( $default_color );
}

/**
 * It reads the fonts.json file, and returns an array of font names
 *
 * @return An array of font names.
 */
function modul_r_get_available_fonts() {
	$font_json = file_get_contents( get_template_directory() . '/inc/third-party/fonts.json' );
	$font_set  = array();
	foreach ( json_decode( $font_json ) as $font_name => $font_weights ) {
		$font_set[ key( $font_weights ) ] = key( $font_weights );
	}

	return $font_set;
}

/**
 * It adds a select field to the customizer
 *
 * @param $label The label for the font family.
 * @param $group The group name for the font preset.
 * @param $wp_customize The  object.
 */
function modul_r_add_font_preset( $label, $group, $wp_customize ) {
	$data_title = $GLOBALS['modul_r_defaults']['customizer_options'][ 'font_family_' . $label ];
	foreach ( $data_title as $setting ) {
		foreach ( $GLOBALS['modul_r_defaults']['customizer_options'][ $setting['select_type'] ] as $fieldname ) {
			$field_values[ $fieldname ] = $fieldname;
		}

		if ( ! empty( $field_values ) ) {
			// Font Family - title
			$wp_customize->add_setting(
				'modul_r_defaults_' . $label . '_' . $setting['name'],
				array(
					'capability'        => 'edit_theme_options',
					'default'           => $setting['default'],
					'sanitize_callback' => 'modul_r_sanitize_select',
				)
			);

			$wp_customize->add_control(
				'modul_r_defaults_' . $label . '_' . $setting['name'],
				array(
					'type'        => 'select',
					'choices'     => $field_values,
					'section'     => 'modul_r_' . $group,
					'description' => esc_html__( 'Select', 'modul-r' ) . ' ' . $label . ' ' . $setting['name'],
				)
			);
		}
	}
}

/**
 * Customizer options
 */
if ( ! function_exists( 'modul_r_customizer_opt' ) ) :
	/**
	 * @param WP_Customize_Themes_Section $wp_customize - the customizer section.
	 *
	 * @return void - nothing
	 */
	function modul_r_customizer_opt( $wp_customize ) {

		$font_set = modul_r_get_available_fonts();

		// Creates custom title and description for theme customizer controls.
		class modul_r_custom_text_control extends WP_Customize_Control {
			/**
			 * @var string
			 */
			public $type = 'customtext';
			/**
			 * @var string
			 */
			public $extra = '';
			/**
			 * @var string
			 */
			public $add_class = '';

			/**
			 * @return void
			 */
			public function render_content() {
				?>
				<label
				<?php
				if ( $this->add_class != '' ) {
					echo 'class="' . $this->add_class . '"';
				}
				?>
				>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<span><?php echo esc_html( $this->extra ); ?></span>
				</label>
				<?php
			}
		}

		// Template color scheme.

		// Primary color.
		$wp_customize->add_setting(
			'primary-color',
			array(
				'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors']['primary'] ),
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'primary-color',
				array(
					'section' => 'colors',
					'label'   => esc_html__( 'Primary Color', 'modul-r' ),
				)
			)
		);


		// Secondary color.
		$wp_customize->add_setting(
			'secondary-color',
			array(
				'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors']['secondary'] ),
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'secondary-color',
				array(
					'section' => 'colors',
					'label'   => esc_html__( 'Secondary Color', 'modul-r' ),
				)
			)
		);

		// Modul-R custom options.
		$wp_customize->add_panel(
			'modul_r_theme_options',
			array(
				'title' => esc_html__( 'Modul-R Options', 'modul-r' ),
			)
		);

		// Typography Section.
		$wp_customize->add_section(
			'modul_r_typography_options',
			array(
				'title'    => esc_html__( 'Typography', 'modul-r' ),
				'priority' => 50,
				'panel'    => 'modul_r_theme_options',
			)
		);

		// Font Family - title.
		$wp_customize->add_setting(
			'modul_r_typography_font_family_title',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 0,
				'sanitize_callback' => 'modul_r_sanitize_select_font',
			)
		);

		$wp_customize->add_control(
			'modul_r_typography_font_family_title',
			array(
				'type'        => 'select',
				'choices'     => $font_set,
				'section'     => 'modul_r_typography_options',
				'description' => esc_html__( 'Select the font family for the titles', 'modul-r' ),
			)
		);

		modul_r_add_font_preset(
			'title',
			'typography_options',
			$wp_customize
		);

		// Font Family - text.
		$wp_customize->add_setting(
			'modul_r_typography_font_family_default',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 0,
				'sanitize_callback' => 'modul_r_sanitize_select_font',
			)
		);

		$wp_customize->add_control(
			'modul_r_typography_font_family_default',
			array(
				'type'        => 'select',
				'choices'     => $font_set,
				'section'     => 'modul_r_typography_options',
				'description' => esc_html__( 'Select the default font family', 'modul-r' ),
			)
		);

		// add the font weight select.
		modul_r_add_font_preset(
			'default',
			'typography_options',
			$wp_customize
		);

		function modul_r_sanitize_select( $selected, $setting ) {
			// Ensure $selected options is an absolute integer then return the selected option.
			return absint( $selected );
		}

		function modul_r_sanitize_select_font( $selected, $setting ) {
			$fontsets = modul_r_get_available_fonts();

			// Ensure $selected options is an absolute integer then return the selected option.
			return ( $fontsets[ $selected ] ) ? $selected : 'Montserrat';
		}

	}
endif;
add_action( 'customize_register', 'modul_r_customizer_opt' );
