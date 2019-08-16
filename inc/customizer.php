<?php



if ( ! function_exists('modul_r_customizer_opt') ) :
	function modul_r_customizer_opt( $wp_customize ) {

		// Template custom colors
		// Primary color
		$wp_customize->add_setting( 'primary-color', array(
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary-color', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Primary Color', 'modul-r' ),
		) ) );

		// Secondary color
		$wp_customize->add_setting( 'secondary-color', array(
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary-color', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Secondary Color', 'modul-r' ),
		) ) );

		// Modul-R custom options
		// Add a custom section
		$wp_customize->add_section( 'theme options' , array(
			'title'      => esc_html__('Modul-R Options','mudul-r'),
			'priority'   => 50,
		) );

		// the sidebar checkbox
		$wp_customize->add_setting( 'modul_r_settings_sidebar', array(
			'capability' => 'edit_theme_options',
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'modul_r_settings_sidebar', array(
			'type' => 'checkbox',
			'section' => 'theme options',
			'label' => esc_html__( 'Show Sidebar', 'mudul-r' ),
			'description' => esc_html__( 'Show the sidebar into single articles and pages', 'mudul-r' ),
		) );

		// Sanitize function for checkbox value
		function modul_r_sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}

	}
endif;
add_action( 'customize_register', 'modul_r_customizer_opt' );

/**
 * Increases or decreases the brightness of a color by a percentage of the current brightness.
 * https://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 *
 * @param   string  $hexCode        Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`
 * @param   float   $adjustPercent  A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
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
