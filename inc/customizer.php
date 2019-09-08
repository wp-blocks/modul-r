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
		$wp_customize->add_panel( 'modul_r_theme_options' , array(
			'title'      => esc_html__('Modul-R Options','modul-r'),
			'priority'   => 40,
		) );

		// Header Panel
		$wp_customize->add_section( 'modul_r_settings_header' , array(
			'title'      => esc_html__('Header','modul-r'),
			'priority'   => 10,
			'panel'      => 'modul_r_theme_options'
		) );

		// Footer Panel
		$wp_customize->add_section( 'modul_r_settings_footer' , array(
			'title'      => esc_html__('Footer','modul-r'),
			'priority'   => 20,
			'panel'      => 'modul_r_theme_options'
		) );

		// Sidebar Panel
		$wp_customize->add_section( 'modul_r_settings_sidebar' , array(
			'title'      => esc_html__('Sidebar','modul-r'),
			'priority'   => 30,
			'panel'      => 'modul_r_theme_options'
		) );

		// the "Show Sidebar" checkbox
		$wp_customize->add_setting( 'modul_r_settings_sidebar', array(
			'capability' => 'edit_theme_options',
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'modul_r_settings_sidebar', array(
			'type' => 'checkbox',
			'section' => 'modul_r_settings_sidebar',
			'label' => esc_html__( 'Show Sidebar', 'modul-r' ),
			'description' => esc_html__( 'Show the sidebar into single articles and pages', 'modul-r' ),
		) );

		// Homepage Panel
		$wp_customize->add_section( 'modul_r_home_options' , array(
			'title'      => esc_html__('Homepage','modul-r'),
			'priority'   => 50,
			'panel'      => 'modul_r_theme_options'
		) );

		// the "Fullpage Hero" checkbox
		$wp_customize->add_setting( 'modul_r_settings_hero', array(
			'capability' => 'edit_theme_options',
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'modul_r_settings_hero', array(
			'type' => 'checkbox',
			'section' => 'modul_r_home_options',
			'label' => esc_html__( 'Fullpage Hero', 'modul-r' ),
			'description' => esc_html__( 'The main image of the homepage will be 100% of the height of the page', 'modul-r' ),
		) );

		// Sanitize function for checkbox value
		function modul_r_sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}

	}
endif;
add_action( 'customize_register', 'modul_r_customizer_opt' );

if ( ! function_exists('modul_r_theme_colors_setup') ) :
	function modul_r_theme_colors_setup() {

		// get the custom colors
		$primary_color = esc_attr(get_theme_mod( 'primary-color' ));
		$secondary_color = esc_attr(get_theme_mod( 'secondary-color' ));

		// check if custom color is set otherwise use the default colors
		$primary_color = ($primary_color != "" && isset($primary_color)) ? $primary_color : esc_attr($GLOBALS['modul_r_defaults']['colors']['primary']);
		$secondary_color = ($secondary_color != "" && isset($secondary_color)) ? $secondary_color : esc_attr($GLOBALS['modul_r_defaults']['colors']['secondary']);

		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Theme primary color light', 'modul-r' ),
				'slug'  => 'primary-light',
				'color' => modul_r_adjustBrightness($primary_color, +0.5),
			),
			array(
				'name'  => __( 'Theme primary color', 'modul-r' ),
				'slug'  => 'primary',
				'color' => $primary_color ,
			),
			array(
				'name'  => __( 'Theme primary color dark', 'modul-r' ),
				'slug'  => 'primary-dark',
				'color' => modul_r_adjustBrightness($primary_color, -0.5),
			),
			array(
				'name'  => __( 'Theme secondary color light', 'modul-r' ),
				'slug'  => 'secondary-light',
				'color' => modul_r_adjustBrightness($secondary_color, +0.5),
			),
			array(
				'name'  => __( 'Theme secondary color', 'modul-r' ),
				'slug'  => 'secondary',
				'color' => $secondary_color,
			),
			array(
				'name'  => __( 'Theme secondary color dark', 'modul-r' ),
				'slug'  => 'secondary-dark',
				'color' => modul_r_adjustBrightness($secondary_color, -0.5),
			),
			array(
				'name'  => __( 'White', 'modul-r' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'White Smoke', 'modul-r' ),
				'slug'  => 'whitesmoke',
				'color' => '#f3f3f3',
			),
			array(
				'name'  => __( 'Light gray', 'modul-r' ),
				'slug'  => 'light-gray',
				'color' => '#e3e3e3',
			),
			array(
				'name'  => __( 'Gray', 'modul-r' ),
				'slug'  => 'gray',
				'color' => '#888888',
			),
			array(
				'name'  => __( 'Dark gray', 'modul-r' ),
				'slug'  => 'dark-gray',
				'color' => '#4e4e4e',
			),
			array(
				'name'  => __( 'Black', 'modul-r' ),
				'slug'  => 'black',
				'color' => '#222222',
			),
		) );
	}
endif;
add_action( 'after_setup_theme', 'modul_r_theme_colors_setup' );

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
