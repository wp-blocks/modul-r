<?php

/**
 * get the rgb color from hex
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


/**
 * check for the existence of a color in theme mods otherwise return the escaped default color
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
          if (isset($setting['input']) && $setting['input'] === 'number') {

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

          } else {

              $wp_customize->add_setting( "modul_r_{$group}_{$setting['for']}_{$setting['name']}", array(
                  'capability'        => 'edit_theme_options',
                  'default'           => $setting['default'],
                  'sanitize_callback' => 'modul_r_sanitize_select',
              ) );

              if ( $setting['type'] === 'font_family' ) {

                  $this_font_family= array_keys( $GLOBALS['modul_r_defaults']['customizer_options']['font_family'] );

                  $wp_customize->add_control( "modul_r_{$group}_{$setting['for']}_{$setting['name']}", array(
                      'type'        => 'select',
                      'choices'     => array_combine($this_font_family,$this_font_family),
                      'section'     => 'modul_r_' . $group,
                      'description' => esc_html__("Select ", 'modul-r'). $setting['for'] ." ". $setting['name'],
                  ) );

              } else if ( $setting['type'] === 'font_weight' ) {

                  $this_font_family = get_theme_mod( "modul_r_{$group}_{$setting['for']}_font-family" );

                  $weight_selected_value = $this_font_family !== false ?
                      $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][ $this_font_family ]['weights'] :
                      $GLOBALS['modul_r_defaults']['customizer_options']['font_family'][ $settings_array[ $setting['for']."_font-family"]['default'] ]['weights'] ;

                  $wp_customize->add_control( "modul_r_{$group}_{$setting['for']}_{$setting['name']}", array(
                      'type'        => 'select',
                      'choices'     => array_combine($weight_selected_value, $weight_selected_value),
                      'section'     => 'modul_r_' . $group,
                      'description' => esc_html__("Select ", 'modul-r'). $setting['for'] ." ". $setting['name'],
                  ) );

              }
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

	  // Header colors
	  $wp_customize->add_setting( 'header-color', array(
		  'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-color'] ] ),
		  'transport'         => 'refresh',
		  'sanitize_callback' => 'sanitize_hex_color',
	  ) );
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header-color', array(
		  'section'  => 'colors',
		  'label'    => esc_html__( 'Header Color', 'modul-r' )
    ) ) );

	  //the header title color was set via add_theme_support 'custom-header' -> "default color"

    $wp_customize->add_setting( 'header-text-color', array(
        'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-text-color'] ] ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header-text-color', array(
        'section'  => 'colors',
        'label'    => esc_html__( 'Header text Color', 'modul-r' )
    ) ) );


	  // Footer colors
	  $wp_customize->add_setting( 'footer-color', array(
		  'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-color'] ] ),
		  'transport'         => 'refresh',
		  'sanitize_callback' => 'sanitize_hex_color',
	  ) );
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-color', array(
		  'section'  => 'colors',
		  'label'    => esc_html__( 'Footer Color', 'modul-r' )
	  ) ) );

	  $wp_customize->add_setting( 'footer-bottom-color', array(
		  'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-bottom-color'] ] ),
		  'transport'         => 'refresh',
		  'sanitize_callback' => 'sanitize_hex_color',
	  ) );
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-bottom-color', array(
		  'section'  => 'colors',
		  'label'    => esc_html__( 'Footer bottom Color', 'modul-r' )
	  ) ) );

	  $wp_customize->add_setting( 'footer-text-color', array(
		  'default'           => esc_attr( $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-text-color'] ] ),
		  'transport'         => 'refresh',
		  'sanitize_callback' => 'sanitize_hex_color',
	  ) );
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-text-color', array(
		  'section'  => 'colors',
		  'label'    => esc_html__( 'Footer text Color', 'modul-r' )
	  ) ) );



		// Modul-R custom options
		$wp_customize->add_panel( 'modul_r_theme_options' , array(
			'title'      => esc_html__('Modul-R Options','modul-r')
		) );


		// Header Panel
		// Add the custom panel
		$wp_customize->add_section( 'modul_r_settings_header' , array(
			'title'      => esc_html__('Header','modul-r'),
			'priority'   => 10,
			'panel'      => 'modul_r_theme_options'
		) );

		// select dropdown for portrait or landscape header layout
		$wp_customize->add_setting( 'modul_r_header_direction', array(
			'capability' => 'edit_theme_options',
			'default'   => 'portrait',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'modul_r_header_direction',
			array(
				'label'    => esc_html__( 'Header layout', 'modul-r' ),
				'description' => esc_html__( 'The header layout can be landscape (logo and menu on the same line) or portrait (centered layout with the menu under the logo)', 'modul-r' ),
				'section'  => 'modul_r_settings_header',
				'type'     => 'radio',
				'choices'  => array(
					'portrait'  => esc_html__( 'Portrait', 'modul-r' ),
					'landscape' => esc_html__( 'Landscape', 'modul-r' ),
				),
			)
		);

	  // let the user select the header width
	  $wp_customize->add_setting( 'modul_r_header_width', array(
		  'capability' => 'edit_theme_options',
		  'default'   => 'alignwide',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'sanitize_text_field',
	  ) );
	  $wp_customize->add_control( 'modul_r_header_width',
		  array(
			  'label'    => esc_html__( 'Header width', 'modul-r' ),
			  'description' => esc_html__( 'The header width can be wide (page content + page margins) or full (100% of the window width - page margins)', 'modul-r' ),
			  'section'  => 'modul_r_settings_header',
			  'type'     => 'radio',
			  'choices'  => array(
				  'standard-width'  => esc_html__( 'Standard', 'modul-r' ),
				  'alignwide' => esc_html__( 'Wide', 'modul-r' ),
				  'alignfull' => esc_html__( 'Full', 'modul-r' ),
			  ),
		  )
	  );

    // Header opacity option
    $wp_customize->add_setting( 'modul_r_header_opacity', array(
        'capability' => 'edit_theme_options',
        'default'   => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'modul_r_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'modul_r_header_opacity',
        array(
            'type' => 'checkbox',
            'label'    => esc_html__( 'Transparent Header', 'modul-r' ),
            'description' => esc_html__( 'Select this option if you want to make the header transparent on hero image (only on page top)', 'modul-r' ),
            'section'  => 'modul_r_settings_header',
        )
    );

    add_setting_from_array($GLOBALS['modul_r_defaults']['customizer_options']['header_sizes'], 'settings_header', $wp_customize );


		// Footer Section
		$wp_customize->add_section( 'modul_r_settings_footer' , array(
			'title'      => esc_html__('Footer','modul-r'),
			'priority'   => 20,
			'panel'      => 'modul_r_theme_options'
		) );

	  // let the user select the footer width
	  $wp_customize->add_setting( 'modul_r_footer_width', array(
		  'capability' => 'edit_theme_options',
		  'default'   => 'alignwide',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'sanitize_text_field',
	  ) );
	  $wp_customize->add_control( 'modul_r_footer_width',
		  array(
			  'label'    => esc_html__( 'Footer width', 'modul-r' ),
			  'description' => esc_html__( 'The footer width can be wide (page content + page margins) or full (100% of the window width - page margins)', 'modul-r' ),
			  'section'  => 'modul_r_settings_footer',
			  'type'     => 'radio',
			  'choices'  => array(
				  'standard-width'  => esc_html__( 'Standard', 'modul-r' ),
				  'alignwide' => esc_html__( 'Wide', 'modul-r' ),
				  'alignfull' => esc_html__( 'Full', 'modul-r' ),
			  ),
		  )
	  );

		// the "Show website credits" checkbox
		$wp_customize->add_setting( 'modul_r_footer_show_credits', array(
			'capability' => 'edit_theme_options',
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'modul_r_footer_show_credits', array(
			'type' => 'checkbox',
			'section' => 'modul_r_settings_footer',
			'label' => esc_html__( 'Enable footer credits section', 'modul-r' ),
			'description' => esc_html__( 'Shows website logo and the text you insert in the textarea below', 'modul-r' ),
		) );

	  // show logo checkbox in credits section
		$wp_customize->add_setting( 'modul_r_footer_credits_show_logo', array(
			'default'   => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'modul_r_footer_credits_show_logo', array(
			'type' => 'checkbox',
			'section' => 'modul_r_settings_footer',
			'label' => esc_html__( 'Show logo', 'modul-r' ),
		) );

	  // upload footer logo
	  $wp_customize->add_setting( 'modul_r_footer_custom_logo', array(
		    'default' => '',
		    'transport' => 'refresh',
			  'sanitize_callback' => 'modul_r_sanitize_file'
		  )
	  );
	  $wp_customize->add_control(
	      new WP_Customize_Upload_Control(
			  $wp_customize,
			  'modul_r_footer_custom_logo',
			  array(
				  'label'      => __( 'Upload a image here if you want to override the website logo', 'modul-r' ),
				  'section'    => 'modul_r_settings_footer'
			  )
		  )
	  );

		// the credits title
		$wp_customize->add_setting( 'modul_r_footer_credits_title', array(
			'capability' => 'edit_theme_options',
			'default' => esc_html(get_bloginfo('name')),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'modul_r_footer_credits_title', array(
			'type' => 'text',
			'section' => 'modul_r_settings_footer',
			'label' => esc_html__( 'Credits', 'modul-r' ),
		) );

		// the credits textarea
		$wp_customize->add_setting( 'modul_r_footer_credits_content', array(
			'capability' => 'edit_theme_options',
			'default' => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( 'modul_r_footer_credits_content', array(
			'type' => 'textarea',
			'section' => 'modul_r_settings_footer',
		) );

	  $wp_customize->add_setting( 'modul_r_footer_socials_show', array(
		  'default'   => '',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'modul_r_sanitize_checkbox',
	  ) );
	  $wp_customize->add_control( 'modul_r_footer_socials_show', array(
		  'type' => 'checkbox',
		  'section' => 'modul_r_settings_footer',
		  'label' => esc_html__( 'Show social media links', 'modul-r' ),
	    'description' => esc_html__( 'Shows the icon of social media (credits section need to be enabled)', 'modul-r' ),
	  ) );



	  // show special thanks in the bottom section of the footer
	  $wp_customize->add_setting( 'modul_r_footer_thanks_show', array(
		  'default'   => true,
		  'transport' => 'refresh',
		  'sanitize_callback' => 'modul_r_sanitize_checkbox',
	  ) );
	  $wp_customize->add_control( 'modul_r_footer_thanks_show', array(
		  'type' => 'checkbox',
		  'section' => 'modul_r_settings_footer',
		  'label' => esc_html__( 'Show Special thanks', 'modul-r' ),
	  ) );

	  // custom Special thanks
	  $wp_customize->add_setting( 'modul_r_footer_thanks_txt', array(
		  'capability' => 'edit_theme_options',
		  'default' => '',
		  'sanitize_callback' => 'sanitize_text_field',
	  ) );

	  $wp_customize->add_control( 'modul_r_footer_thanks_txt', array(
		  'type' => 'text',
		  'section' => 'modul_r_settings_footer',
		  'label' => esc_html__( 'Special Thanks Override', 'modul-r' ),
		  'description' => esc_html__( 'Leave empty to show the default special thanks (thanks to Wordpress and theme author)', 'modul-r' ),
	  ) );

	  // custom Special thanks url
	  $wp_customize->add_setting( 'modul_r_footer_thanks_url', array(
		  'capability' => 'edit_theme_options',
		  'default' => '',
		  'sanitize_callback' => 'esc_url',
	  ) );

	  $wp_customize->add_control( 'modul_r_footer_thanks_url', array(
		  'type' => 'url',
		  'section' => 'modul_r_settings_footer',
		  'description' => esc_html__( 'special thanks link (leave empty if you want a normal text without links)', 'modul-r' ),
	  ) );



		// Sidebar Section
		$wp_customize->add_section( 'modul_r_settings_sidebar' , array(
			'title'      => esc_html__('Sidebar','modul-r'),
			'priority'   => 30,
			'panel'      => 'modul_r_theme_options'
		) );

		// the "Show Sidebar" checkbox
		$wp_customize->add_setting( 'modul_r_sidebar_enabled', array(
			'default'   => false,
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'modul_r_sidebar_enabled', array(
			'type' => 'checkbox',
			'section' => 'modul_r_settings_sidebar',
			'label' => esc_html__( 'Show Sidebar', 'modul-r' ),
			'description' => esc_html__( 'Show the sidebar into single articles and pages', 'modul-r' ),
		) );

		// select left or right sidebar
		$wp_customize->add_setting( 'modul_r_sidebar_position', array(
			'capability' => 'edit_theme_options',
			'default'   => 'left',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'modul_r_sidebar_position',
			array(
				'label'    => esc_html__( 'Sidebar position', 'modul-r' ),
				'description' => esc_html__( 'The sidebar can be showed at the left or at the right of the content. This customization also affect the WooCommerce sidebar.', 'modul-r' ),
				'section'  => 'modul_r_settings_sidebar',
				'type'     => 'radio',
				'choices'  => array(
					'left'  => esc_html__( 'Left', 'modul-r' ),
					'right' => esc_html__( 'Right', 'modul-r' ),
				),
			)
		);

    add_setting_from_array($GLOBALS['modul_r_defaults']['customizer_options']['sizes'], 'settings_sidebar', $wp_customize );




    // Typography Section
    $wp_customize->add_section( 'modul_r_typography_options' , array(
        'title'      => esc_html__('Typography','modul-r'),
        'priority'   => 50,
        'panel'      => 'modul_r_theme_options'
    ) );

    // add the font weight select
    add_setting_from_array($GLOBALS['modul_r_defaults']['customizer_options']['font_styles'], 'typography_options', $wp_customize );

      // add the font line height / font size selection
    add_setting_from_array($GLOBALS['modul_r_defaults']['customizer_options']['typography'], 'typography_options', $wp_customize );


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

    // the standard distance unit
    $wp_customize->add_setting( 'modul_r_baseunit', array(
        'capability' => 'edit_theme_options',
        'default'   => 8,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
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


		// Hero Section
		$wp_customize->add_section( 'modul_r_hero_options' , array(
			'title'      => esc_html__('Hero','modul-r'),
			'priority'   => 50,
			'panel'      => 'modul_r_theme_options'
		) );

		if ( get_option( 'show_on_front' ) !== 'page') {
			// Warning Message if the Hero is not a page
			$wp_customize->add_setting('modul_r_hero_options[customtext]', array(
					'default' => '',
					'type' => 'customtext_control',
					'capability' => 'edit_theme_options',
					'transport' => 'refresh',
		      'sanitize_callback' => 'absint',
				)
			);
			$wp_customize->add_control( new modul_r_custom_text_control( $wp_customize, 'customtext_control', array(
					'label' => esc_html__( 'Warning! Set a page as homepage to enable this section', 'modul-r' ),
					'section' => 'modul_r_hero_options',
					'extra' => esc_html__( 'To set a page as homepage you have to go to the customizer than select homepage settings and set a static page as homepage (and select a page)', 'modul-r' ),
					'add_class' => 'homepage_is_not_a_page'
				) )
			);
		}

    // Hero Hero image height
    $wp_customize->add_setting( 'modul_r_hero_height_home', array(
        'default'   => intval( $GLOBALS['modul_r_defaults']['customizer_options']['layout']['hero_height_home'] ),
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'modul_r_hero_height_home', array(
        'type' => 'number',
        'section' => 'modul_r_hero_options',
        'label' => esc_html__( 'Hero Image vertical height', 'modul-r' ),
        'description' => esc_html__( 'Homepage Hero height', 'modul-r' ),
        'input_attrs' => array(
            'min' => '0', 'step' => '1', 'max' => '100',
        ),
    ) );

    // Hero image height
    $wp_customize->add_setting( 'modul_r_hero_height_default', array(
        'default'   => $GLOBALS['modul_r_defaults']['customizer_options']['layout']['hero_height_default'],
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'modul_r_hero_height_default', array(
        'type' => 'number',
        'section' => 'modul_r_hero_options',
        'description' => esc_html__( 'Default Hero height', 'modul-r' ),
        'input_attrs' => array(
            'min' => '0', 'step' => '1', 'max' => '100',
        ),
    ) );

		// Hero image opacity
		$wp_customize->add_setting( 'modul_r_hero_opacity', array(
			'default'   => '100',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'modul_r_hero_opacity', array(
			'type' => 'number',
			'section' => 'modul_r_hero_options',
			'label' => esc_html__( 'Hero Image opacity', 'modul-r' ),
			'description' => esc_html__( 'insert a number beetween 1 and 100 (1 - 100% opacity)', 'modul-r' ),
      'input_attrs' => array(
        'min' => '1', 'step' => '1', 'max' => '100',
      ),
		) );

		// Hero headline
		$wp_customize->add_setting( 'modul_r_hero_title', array(
			'capability' => 'edit_theme_options',
			'default' => esc_html(get_bloginfo('name')),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'modul_r_hero_title', array(
			'type' => 'text',
			'section' => 'modul_r_hero_options',
			'label' => esc_html__( 'Hero headline', 'modul-r' ),
			'description' => esc_html__( 'Write a catchy phrase as homepage hero headline', 'modul-r' ),
		) );

		// Hero subtitle
		$wp_customize->add_setting( 'modul_r_hero_subtitle', array(
			'capability' => 'edit_theme_options',
			'default' => esc_html(get_bloginfo('description')),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'modul_r_hero_subtitle', array(
			'type' => 'text',
			'section' => 'modul_r_hero_options',
			'description' => esc_html__( 'Subtitle', 'modul-r' ),
		) );

		// Call to action - pages
		$wp_customize->add_setting( 'modul_r_hero_call_to_action', array(
			'capability' => 'edit_theme_options',
			'default' => '0',
			'sanitize_callback' => 'modul_r_sanitize_pages_dropdown',
		) );

		$wp_customize->add_control( 'modul_r_hero_call_to_action', array(
			'type' => 'dropdown-pages',
			'section' => 'modul_r_hero_options',
			'label' => esc_html__( 'Call to action', 'modul-r' ),
			'description' => esc_html__( 'Choose an important page', 'modul-r' ),
		) );

		$categories = get_categories();
		$cats = array();
		$cats[0] = '&#8212; Select &#8212;';
		$i = 0;
		foreach( $categories as $category ) {
			if( $i == 0 ){
				$default = $category->term_id;
				$i++;
			}
			$cats[$category->term_id] = $category->name;
		}

		// Call to action 2 - categories
		$wp_customize->add_setting( 'modul_r_hero_call_to_action_2', array(
			'capability' => 'edit_theme_options',
			'default' => '0',
			'sanitize_callback' => 'modul_r_sanitize_category_dropdown',
		) );

		$wp_customize->add_control( 'modul_r_hero_call_to_action_2', array(
			'type'    => 'select',
			'choices' => $cats,
			'section' => 'modul_r_hero_options',
			'description' => esc_html__( 'Select an important category', 'modul-r' ),
		) );




    if ( class_exists( 'WooCommerce' ) ) {
      // Woo options
      $wp_customize->add_section( 'modul_r_settings_Woo' , array(
          'title'      => esc_html__('Woo Options','modul-r'),
          'priority'   => 55,
          'panel'      => 'modul_r_theme_options'
      ) );

      // the "Show Woo options" checkbox
      $wp_customize->add_setting( 'modul_r_woo[shop_hero]', array(
          'default'   => null,
          'transport' => 'refresh',
          'sanitize_callback' => 'modul_r_sanitize_file'
          )
      );
      $wp_customize->add_control(
          new WP_Customize_Upload_Control(
              $wp_customize,
              'modul_r_woo[shop_hero]',
              array(
                  'label'      => __( 'Choose an image for the shop page wallpaper', 'modul-r' ),
                  'section'    => 'modul_r_settings_Woo'
              )
          )
      );
    }
		
		// Sidebar Social Share options
		$wp_customize->add_section( 'modul_r_settings_social_share' , array(
			'title'      => esc_html__('Social Share Options','modul-r'),
			'priority'   => 60,
			'panel'      => 'modul_r_theme_options'
		) );


		// the "Show Social Share options" checkbox
		$wp_customize->add_setting( 'modul_r_social_share_enabled', array(
			'default'   => true,
			'transport' => 'refresh',
			'sanitize_callback' => 'modul_r_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'modul_r_social_share_enabled', array(
			'type' => 'checkbox',
			'section' => 'modul_r_settings_social_share',
			'label' => esc_html__( 'Show Social Share Icons', 'modul-r' ),
			'description' => esc_html__( 'Show social media sharing icons on single posts and pages', 'modul-r' ),
		) );


		// Set social sharing options to show for pages, single posts or both
		$wp_customize->add_setting( 'modul_r_social_share_visibility', array(
			'capability' => 'edit_theme_options',
			'default'   => 'all',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'modul_r_social_share_visibility',
			array(
				'label'    => esc_html__( 'Social Share Options Visibility', 'modul-r' ),
				'description' => esc_html__( 'Set social sharing options to show for pages, single posts or both', 'modul-r' ),
				'section'  => 'modul_r_settings_social_share',
				'type'     => 'radio',
				'choices'  => array(
					'pages'  => esc_html__( 'Pages only', 'modul-r' ),
					'posts' => esc_html__( 'Single posts only', 'modul-r' ),
					'all' => esc_html__( 'Pages and single Posts', 'modul-r' ),
				),
			)
		);

	  $social_enabled = array( 'Facebook', 'Instagram', 'Twitter', 'YouTube' );

	  foreach ($social_enabled as $social) {
		  $wp_customize->add_setting( 'modul_r_social_' . $social, array(
			  'capability'        => 'edit_theme_options',
			  'default'           => "",
			  'sanitize_callback' => 'sanitize_text_field',
		  ) );
		  $wp_customize->add_control( 'modul_r_social_' . $social, array(
			  'type'        => 'input',
			  'section'     => 'modul_r_settings_social_share',
			  'label'       => $social,
			  'description' => $social . ' url link',
		  ) );
	  }

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
        return esc_attr( $selected );
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

		  //allowed file types
		  $mimes = array(
			  'jpg|jpeg|jpe' => 'image/jpeg',
			  'gif'          => 'image/gif',
			  'png'          => 'image/png',
			  'svg'          => 'image/svg'
		  );

		  //check file type from file name
		  $file_ext = wp_check_filetype( $file, $mimes );

		  //if file has a valid mime type return it, otherwise return default
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


if ( ! function_exists( 'modul_r_atf_style' ) ) :
    function modul_r_atf_style() {

        // Colors
        $header_background = modul_r_get_theme_color( 'header-color', $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['header-color']] );
        $footer_background = modul_r_get_theme_color( 'footer-color', $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['footer-color']] );
        $footer_bottom_background = modul_r_get_theme_color( 'footer-bottom-color', $GLOBALS['modul_r_defaults']['colors'][$GLOBALS['modul_r_defaults']['style']['footer-bottom-color']] );

        // get the acf.css file and store into a variable
        ob_start();

        include get_stylesheet_directory() . '/assets/dist/css/atf.css';

        $atf_css = ob_get_clean();

        // HEADER
        // set the header color
        $atf_css .= 'body .header-color, body.has-featured-image.top #masthead.active {background-color: ' . $header_background . ';} .has-featured-image.top #masthead {background-color: ' . $header_background . 'dd;}';

        // On top of the screen set the opacity to 0
        if (get_theme_mod( 'modul_r_header_opacity' ) > 0){
            $atf_css .= 'body.has-featured-image.top #masthead {background-color: ' . $header_background . '00;}';
        } else {
            // if has a featured image and is at the top of the page....has-featured-image.top
            $atf_css .= 'body.has-featured-image.top #masthead {background-color: ' . $header_background . 'dd;}';
        }

        // Set the responsive header opacity
        $atf_css .= '@media (max-width: 960px) {body .main-navigation {background-color: ' . modul_r_adjustBrightness($header_background, 0.2) . 'ee;}}';

        // Set the nav background colors
        $atf_css .= 'body ul.sub-menu {background-color: ' . modul_r_adjustBrightness($header_background, 0.1) . ';}';
        $atf_css .= 'body.has-featured-image.top #masthead ul.sub-menu {background-color: ' . $header_background . 'cc;}';
        $atf_css .= 'body ul.sub-menu ul.sub-menu {background-color: ' . modul_r_adjustBrightness($header_background, 0.2) . ';}';
        $atf_css .= 'body ul.sub-menu li:hover {background-color: ' . modul_r_adjustBrightness($header_background, 0.3) . ';}';

        // FOOTER
        // set the footer color
        $atf_css .= '.has-footer-background-color {background-color: ' . $footer_background . ';}';
        // set the bottom footer color
        $atf_css .= '.has-footer-bottom-background-color {background-color: ' . $footer_bottom_background . ';}';

        // HERO
        $hero_opacity = get_theme_mod( 'modul_r_hero_opacity' ) !== false ? intval(get_theme_mod( 'modul_r_hero_opacity' )) : 100;
        $hero_height_home = get_theme_mod( 'modul_r_hero_height_home' ) !== false ? intval(get_theme_mod( 'modul_r_hero_height_home' )) : intval( $GLOBALS['modul_r_defaults']['customizer_options']['layout']['hero_height_home'] );
        $hero_height = get_theme_mod( 'modul_r_hero_height_default' ) !== false ? intval(get_theme_mod( 'modul_r_hero_height_default' )) : intval( $GLOBALS['modul_r_defaults']['customizer_options']['layout']['hero_height_default'] );
        if ($hero_opacity != 100) $atf_css .= 'body .hero img {opacity:'. ($hero_opacity/100) .'}';
        if ($hero_height) $atf_css .= "html .site .hero {max-height:{$hero_height}vh}";
        if ($hero_height_home) $atf_css .= "html body.home .hero {max-height:{$hero_height_home}vh}";

        // And finally return the stored style
        if ($atf_css != "" ) {
            echo '<style id="modul-r-above-the-fold" type="text/css">'. $atf_css . '</style>';
        }
    }
endif;
add_action( 'wp_head', 'modul_r_atf_style', 1 );


if ( ! function_exists( 'modul_r_css_props' ) ) :
    function modul_r_css_props() {

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
        $header_title_color       = get_theme_mod( 'header_textcolor', get_theme_support( 'custom-header', 'default-text-color' ) ) ? '#' . get_header_textcolor() : $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-text-color'] ];
        $header_background        = modul_r_get_theme_color( 'header-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-color'] ] );
        $header_text_color        = modul_r_get_theme_color( 'header-text-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['header-text-color'] ] );
        $footer_background        = modul_r_get_theme_color( 'footer-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-color'] ] );
        $footer_bottom_background = modul_r_get_theme_color( 'footer-bottom-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-bottom-color'] ] );
        $footer_text_color        = modul_r_get_theme_color( 'footer-text-color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['footer-text-color'] ] );

        $background_color        = modul_r_get_theme_color( 'background_color', $GLOBALS['modul_r_defaults']['colors'][ $GLOBALS['modul_r_defaults']['style']['background'] ] );

        $baseunit           = get_theme_mod( 'modul_r_baseunit' ) !== false ? intval( get_theme_mod( 'modul_r_baseunit' ) ) : intval( $GLOBALS['modul_r_defaults']['customizer_options']['layout']['baseunit'] );
        $content_width      = get_theme_mod( 'modul_r_content_width' ) !== false ? intval( get_theme_mod( 'modul_r_content_width' ) ) : intval( $GLOBALS['modul_r_defaults']['customizer_options']['layout']['content_width'] );
        $content_width_wide = get_theme_mod( 'modul_r_content_width_wide' ) !== false ? intval( get_theme_mod( 'modul_r_content_width_wide' ) ) : intval( $GLOBALS['modul_r_defaults']['customizer_options']['layout']['content_width_wide'] );

        // Typography
        function modul_r_get_vars( $var_set, $suffix = "--wp--" ) {
          $vars = '';
          foreach ( $var_set as $key => $option ) {
            if ($option['input'] !== 'select') {
              if ( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) {
                  $vars .= $suffix . $option['name'] . ":" . abs( get_theme_mod( 'modul_r_defaults_' . $option['name'] ) ) . ( ! empty( $option['unit'] ) ? $option['unit'] : '' ) . ';';
              } else {
                  $vars .= $suffix . $option['name'] . ":" . $option['default'] . ( ! empty( $option['unit'] ) ? $option['unit'] : '' ) . ';';
              }
            } else {
              // get the prop value
              $this_prop = get_theme_mod( 'modul_r_typography_options_' . $option['for'] . "_" . $option['name'] );
              // applies cosmetic fix fot font family Exo+2 -> 'Exo 2', serif
              $prop = ($this_prop !== false) ?
                  ($option['type'] === 'font_family') ? '\''.str_replace( "+", " ", $this_prop ).'\', serif' : $this_prop :
                  $GLOBALS['modul_r_defaults']['customizer_options']['font_styles'][$option['for'] . "_" . $option['name']]['default'];
              $vars .= $suffix . $option['for'] . '--' . $option['name'] . ":" . $prop . ';';
            }
          }
          return $vars;
        }

        $typography = modul_r_get_vars($GLOBALS['modul_r_defaults']['customizer_options']['typography'], "--typography--");
        $font_styles = modul_r_get_vars($GLOBALS['modul_r_defaults']['customizer_options']['font_styles'], "--typography--");
        $header_sizes = modul_r_get_vars($GLOBALS['modul_r_defaults']['customizer_options']['header_sizes'], "--header--");
        $sizes = modul_r_get_vars($GLOBALS['modul_r_defaults']['customizer_options']['sizes'], "--size--");

        // Build the color palette
        function modul_r_generate_color_palette( $colors ) {
            if ( empty( $colors ) || !is_array( $colors ) ) {
                return '';
            }
            $css_palette = '';
            foreach ( $colors as $c_name => $color ) {
                $css_palette .= ".has-$c_name-color{color:$color}.has-$c_name-background-color{background-color:$color}";
            }
            return $css_palette;
        }

        $color_css_classes = modul_r_generate_color_palette($colors);

        $css_style = "<style>body {" .
          "--wp--preset--color--primary: {$colors['primary']};" .
          "--wp--preset--color--primary-light: {$colors['primary-light']};" .
          "--wp--preset--color--primary-dark: {$colors['primary-dark']};" .

          "--wp--preset--color--secondary: {$colors['secondary']};" .
          "--wp--preset--color--secondary-light: {$colors['secondary-light']};" .
          "--wp--preset--color--secondary-dark: {$colors['secondary-dark']};" .

          "--wp--preset--color--white: {$colors['white']};" .
          "--wp--preset--color--white-smoke: {$colors['white-smoke']};" .
          "--wp--preset--color--gray-light: {$colors['gray-light']};" .
          "--wp--preset--color--gray: {$colors['gray']};" .
          "--wp--preset--color--gray-dark: {$colors['gray-dark']};" .
          "--wp--preset--color--black: {$colors['black']};" .

          "--wp--preset--color--background: $background_color;" .

          "--wp--preset--color--black--decimal: ".modul_r_hex2rgb($colors['black'], true). ";" .
          "--wp--preset--color--white--decimal: ".modul_r_hex2rgb($colors['white'], true). ";" .
          "--wp--preset--color--secondary--decimal: ".modul_r_hex2rgb($colors['secondary'], true). ";" .
          "--wp--preset--color--primary--decimal: ".modul_r_hex2rgb($colors['primary'], true). ";" .

          "--color--title: var(--wp--preset--color--primary);" .
          "--color--text: $text_color;" .

          "--size--margin-xs: " . $baseunit * .5 . "px;" .
          "--size--margin--: {$baseunit}px;" .
          "--size--margin-s: " . $baseunit * 1.5 . "px;" .
          "--size--margin-m: " . $baseunit * 2 . "px;" .
          "--size--margin-l: " . $baseunit * 4 . "px;" .
          "--size--margin-xl: ". $baseunit * 8 . "px;" .
          "--size--responsive--side-margin: ". $baseunit * 2.5 . "px;" .

           $typography .
           $font_styles .

          "--typography--title--line-height:var(--typography--line-height);" .
          "--typography--title--font-size: var(--typography--font-size--xxl);" .
          "--typography--content--line-height: var(--typography--line-height--wide);" .
          "--typography--content--font-size: var(--typography--font-size--m);" .

          "--size--content--width: {$content_width}px;" .
          "--size--content--side-padding: " . ($content_width_wide - $content_width) * .5 ."px;" .
          "--size--content--width-wide: {$content_width_wide}px;" .
          "--size--sidebar--side-margin: var(--size--margin-xl);" .


          "--header--background: $header_background;" .
          "--header--background--dark: ".modul_r_hex2rgb(modul_r_adjustBrightness($header_background, -0.05), true). ";" .
          "--header--background--dark--decimal: ".modul_r_hex2rgb($header_background, true). ";" .
          "--header--title-color: $header_title_color;" .
          "--header--text-color: $header_text_color;" .

           $header_sizes .
           $sizes .

          "--footer--background: $footer_background;" .
          "--footer--bottom-background: $footer_bottom_background;" .
          "--footer--text-color: $footer_text_color;" .
          "--footer--text-color-decimal: ".modul_r_hex2rgb($footer_text_color, true). ";" .

          "--element--hero--title--font-size: 64px;" .
          "--element--hamburger--color: var(--header--text-color);" .
          "--sizes--entry-title--width: 66%;" .

          "}".
           $color_css_classes.
          "</style>";

        $css_style = apply_filters('modul_r_acf_css_style', $css_style );

        echo $css_style;
    }
endif;
add_action( 'wp_head', 'modul_r_css_props', 99 );
add_action( 'admin_head', 'modul_r_css_props', 99 );