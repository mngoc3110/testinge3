<?php
/**
 *  Fort Top Header Option
 *
 * @since Fort 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'fort_header_section', array(
   'priority'       => 5,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header Options', 'fort' ),
   'panel' 		 => 'fort_panel',
) );
/*callback functions header section*/
if ( !function_exists('fort_header_active_callback') ) :
  function fort_header_active_callback(){
      global $fort_theme_options;
      $fort_theme_options = fort_get_options_value();
      $enable_header = absint($fort_theme_options['fort-enable-top-header']);
      if( true == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;
/*Enable Top Header Section*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['fort-enable-top-header'],
   'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-top-header]', array(
   'label'     => __( 'Enable Top Header', 'fort' ),
   'description' => __('Checked to show the top header section like search and social icons', 'fort'),
   'section'   => 'fort_header_section',
   'settings'  => 'fort_options[fort-enable-top-header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Menu in top Header*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header-menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-top-header-menu'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-top-header-menu]', array(
    'label'     => __( 'Menu in Header', 'fort' ),
    'description' => __('Top Header Menu will display here. Go to Appearance < Menu.', 'fort'),
    'section'   => 'fort_header_section',
    'settings'  => 'fort_options[fort-enable-top-header-menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'fort_header_active_callback'
) );

/*Notification text*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header-notification]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-top-header-notification'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-enable-top-header-notification]', array(
    'label'     => __( 'Notification/Subscribe Text Header', 'fort' ),
    'description' => __('Enter your text for the subscribe or notification. We have more feature in Fort Pro.', 'fort'),
    'section'   => 'fort_header_section',
    'settings'  => 'fort_options[fort-enable-top-header-notification]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'fort_header_active_callback'
) );

/*Notification URL*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header-notification-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-top-header-notification-url'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'fort_options[fort-enable-top-header-notification-url]', array(
    'label'     => __( 'URL for Notification/Subscribe', 'fort' ),
    'description' => __('Enter the notification or subscribe url here. We have more feature in Fort Pro.', 'fort'),
    'section'   => 'fort_header_section',
    'settings'  => 'fort_options[fort-enable-top-header-notification-url]',
    'type'      => 'url',
    'priority'  => 5,
    'active_callback'=>'fort_header_active_callback'
) );
/*Icon in Button*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header-notification-icon]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-top-header-notification-icon'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'fort_options[fort-enable-top-header-notification-icon]', array(
    'label'     => __( 'URL for Notification/Subscribe', 'fort' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Enter fontaweome class like fa-long-arrow-up, fa-angle-up, etc. You can find more icons here in', 'fort' ),
        esc_url('https://fontawesome.com/v4.7/icons/'),
        __('Fontawesome lists and icons name' , 'fort'),
        __('so that you can use any icon from here.' ,'fort')
    ),
    'section'   => 'fort_header_section',
    'settings'  => 'fort_options[fort-enable-top-header-notification-icon]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'fort_header_active_callback'
) );
/* Site Title hover color */
$wp_customize->add_setting( 'fort_options[fort-top-header-background-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['fort-top-header-background-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fort_options[fort-top-header-background-color]',
        array(
            'label'       => esc_html__( 'Top Header Background Color', 'fort' ),
            'description' => esc_html__( 'It will change the color of site top header. More Color options are in Fort Pro', 'fort' ),
            'section'     => 'fort_header_section',
             'settings'  => 'fort_options[fort-top-header-background-color]',
             'active_callback'=>'fort_header_active_callback'
        )
    )
);

/*Make Logo Center*/
$wp_customize->add_setting( 'fort_options[fort-make-logo-center]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-make-logo-center'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
 ) );
 $wp_customize->add_control( 'fort_options[fort-make-logo-center]', array(
    'label'     => __( 'Make logo center', 'fort' ),
    'description' => __('Checked to show the top header section like search and social icons', 'fort'),
    'section'   => 'title_tagline',
    'settings'  => 'fort_options[fort-make-logo-center]',
    'type'      => 'checkbox',
    'priority'  => 25,
 ) );