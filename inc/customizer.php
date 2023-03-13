<?php

/**
 * It reads the fonts.json file, and returns an array of font names
 *
 * @return array An array of font names.
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
 * @param string $label The label for the font family.
 * @param string $group The group name for the font preset.
 * @param object $wp_customize The  object.
 */
function modul_r_add_font_preset( $label, $group, $wp_customize ) {
	$data_title = $GLOBALS['modul_r_defaults']['customizer_options'][ 'font_family_' . $label ];
	foreach ( $data_title as $setting ) {
		foreach ( $GLOBALS['modul_r_defaults']['customizer_options'][ $setting['select_type'] ] as $fieldname ) {
			$field_values[ $fieldname ] = $fieldname;
		}

		if ( ! empty( $field_values ) ) {
			// Font Family - title.
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
