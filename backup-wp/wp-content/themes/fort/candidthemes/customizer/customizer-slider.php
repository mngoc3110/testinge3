<?php
/**
 *  Fort Slider Featured Section Option
 *
 * @since Fort 1.0.0
 *
 */
/*Slider Options*/
$wp_customize->add_section( 'fort_slider_section', array(
 'priority'       => 20,
 'capability'     => 'edit_theme_options',
 'theme_supports' => '',
 'title'          => __( 'Slider Section Options', 'fort' ),
 'panel' 		 => 'fort_panel',
) );
/*callback functions slider*/
if ( !function_exists('fort_slider_active_callback') ) :
  function fort_slider_active_callback(){
    global $fort_theme_options;
    $fort_theme_options = fort_get_options_value();
    $enable_slider = absint($fort_theme_options['fort-enable-slider']);
    if( true == $enable_slider ){
      return true;
    }
    else{
      return false;
    }
  }
endif;
/*Slider Enable Option*/
$wp_customize->add_setting( 'fort_options[fort-enable-slider]', array(
 'capability'        => 'edit_theme_options',
 'transport' => 'refresh',
 'default'           => $default['fort-enable-slider'],
 'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-slider]', array(
 'label'     => __( 'Enable Slider Section', 'fort' ),
 'description' => __('Checked to show slider section in Home Page.', 'fort'),
 'section'   => 'fort_slider_section',
 'settings'  => 'fort_options[fort-enable-slider]',
 'type'      => 'checkbox',
 'priority'  => 10,
) );

/*Slider Category Selection*/
$wp_customize->add_setting( 'fort_options[fort-select-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['fort-select-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Fort_Customize_Category_Dropdown_Control(
    $wp_customize,
    'fort_options[fort-select-category]',
    array(
      'label'     => __( 'Select Category For Slider Section', 'fort' ),
      'description' => __('From the dropdown select the category for the featured left section. Category having post will display in below dropdown.', 'fort'),
      'section'   => 'fort_slider_section',
      'settings'  => 'fort_options[fort-select-category]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'fort_slider_active_callback'
    )
  )
);

/*Slider image size*/
$wp_customize->add_setting( 'fort_options[fort-image-size-slider]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-image-size-slider'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-image-size-slider]', array(
   'choices' => array(
    'cropped-image'    => __('Cropped Image','fort'),
    'original-image'   => __('Original Image','fort'),
),
   'label'     => __( 'Size of the image, either cropped or original', 'fort' ),
   'description' => __('The image will be either cropped or original size based on the image. Recommended image size is 1170*606 px. Make the image with this size and add in the featured image.', 'fort'),
   'section'   => 'fort_slider_section',
   'settings'  => 'fort_options[fort-image-size-slider]',
   'type'      => 'select',
   'priority'  => 10,
   'active_callback'=>'fort_slider_active_callback'
) );