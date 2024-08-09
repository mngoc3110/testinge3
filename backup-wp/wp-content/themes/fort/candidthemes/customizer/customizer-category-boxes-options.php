<?php
/**
 *  Fort Boxed Option
 *
 * @since Fort 1.0.0
 *
 */
/* Header Types Options*/
$wp_customize->add_section( 'fort_category_boxes_section', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category Boxes Options', 'fort' ),
    'panel' 		 => 'fort_panel',
) );
/*Enable Boxes*/
$wp_customize->add_setting( 'fort_options[fort-enable-category-boxes]', array(
 'capability'        => 'edit_theme_options',
 'transport' => 'refresh',
 'default'           => $default['fort-enable-category-boxes'],
 'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-category-boxes]', array(
 'label'     => __( 'Enable Category Boxes Section', 'fort' ),
 'description' => __('Checked to show category boxes section in Home Page.', 'fort'),
 'section'   => 'fort_category_boxes_section',
 'settings'  => 'fort_options[fort-enable-category-boxes]',
 'type'      => 'checkbox',
 'priority'  => 10,
) );

/*callback functions header section*/
if ( !function_exists('fort_category_enable_boxes_callback') ) :
  function fort_category_enable_boxes_callback(){
      global $fort_theme_options;
      $fort_theme_options = fort_get_options_value();
      $enable_box = absint($fort_theme_options['fort-enable-category-boxes']);
      if( true == $enable_box ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Boxes Category*/
$wp_customize->add_setting( 'fort_options[fort-single-cat-posts-select-1]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['fort-single-cat-posts-select-1'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Fort_Customize_Category_Dropdown_Control(
    $wp_customize,
    'fort_options[fort-single-cat-posts-select-1]',
    array(
      'label'     => __( 'Select Category', 'fort' ),
      'description' => __('Three Posts from the same category will appear.', 'fort'),
      'section'   => 'fort_category_boxes_section',
      'settings'  => 'fort_options[fort-single-cat-posts-select-1]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'fort_category_enable_boxes_callback'
    )
  )
);