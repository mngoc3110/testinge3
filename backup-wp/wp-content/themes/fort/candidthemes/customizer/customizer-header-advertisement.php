<?php
/**
 *  Fort Advertisement Option
 *
 * @since Fort 1.0.0
 *
 */
/*Top Advertisement Options*/
$wp_customize->add_section( 'fort_advertisement_section', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Advertisement Options', 'fort' ),
    'panel' 		 => 'fort_panel',
 ) );
/*Upload Header Advertisement Image*/
$wp_customize->add_setting( 'fort_options[fort-enable-headr-advertisement]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-headr-advertisement'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
 ) );
 $wp_customize->add_control( 'fort_options[fort-enable-headr-advertisement]', array(
    'label'     => __( 'Enable Header Advertisement Section', 'fort' ),
    'description' => __('You can add header advertisement image here. Recommended size is 728*90. More options are in pro version.', 'fort'),
    'section'   => 'fort_advertisement_section',
    'settings'  => 'fort_options[fort-enable-headr-advertisement]',
    'type'      => 'checkbox',
    'priority'  => 5,
 ) );

 /*callback functions header section*/
if ( !function_exists('fort_header_ads_callback') ) :
    function fort_header_ads_callback(){
        global $fort_theme_options;
        $fort_theme_options = fort_get_options_value();
        $enable_ads = absint($fort_theme_options['fort-enable-headr-advertisement']);
        if( true == $enable_ads ){
            return true;
        }
        else{
            return false;
        }
    }
  endif;

 /*Header Ads Image*/
$wp_customize->add_setting(
    'fort_options[fort-header-ads-image-file]',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => '',
        'sanitize_callback' => 'fort_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'fort_options[fort-header-ads-image-file]',
    array(
        'label'       => __('Upload Header Advertisement Image', 'fort'),
        'description' => __('You  add the banner image for header ads here. More options available in Fort Pro', 'fort'),
        'section'     => 'fort_advertisement_section',
        'type'        => 'image',
        'active_callback'=> 'fort_header_ads_callback',
    )
 )
);
 /*Header Ads Image URL*/
 $wp_customize->add_setting(
    'fort_options[fort-header-ads-image-url]',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'fort_options[fort-header-ads-image-url]',
    array(
        'label'       => __('Enter the valid URL here.', 'fort'),
        'description' => __('Your URL will open in a new tab. More options are available in premium version.', 'fort'),
        'section'     => 'fort_advertisement_section',
        'type'        => 'url',
        'active_callback'=> 'fort_header_ads_callback',
    )
 )
);