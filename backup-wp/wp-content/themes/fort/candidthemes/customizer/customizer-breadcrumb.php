<?php 
/**
 *  Fort Breadcrumb Settings Option
 *
 * @since Fort 1.0.0
 *
 */
/*Breadcrumb Options*/
$wp_customize->add_section( 'fort_breadcrumb_options', array(
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Options', 'fort' ),
    'panel'          => 'fort_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'fort_options[fort-blog-site-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-blog-site-breadcrumb'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-blog-site-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'fort' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. You can use  Yoast SEO, Rank Math or Breadcrumb NavXT plugin breadcrumb as well. Install the plugin and activate the breadcrumb from the settings.', 'fort' ),
    'section'   => 'fort_breadcrumb_options',
    'settings'  => 'fort_options[fort-blog-site-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions breadcrumb enable*/
if ( !function_exists('fort_breadcrumb_selection_enable') ) :
  function fort_breadcrumb_selection_enable(){
      global $fort_theme_options;
      $fort_theme_options = fort_get_options_value();
      $enable_bc = absint($fort_theme_options['fort-blog-site-breadcrumb']);
      if( $enable_bc == true){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Show Breadcrumb Types Selection*/
$wp_customize->add_setting( 'fort_options[fort-breadcrumb-display-from-option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-breadcrumb-display-from-option'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-breadcrumb-display-from-option]', array(
    'choices' => array(
        'theme-default'    => __('Theme Default Breadcrumb','fort'),
        'yoast-breadcrumb'    => __('Yoast SEO Breadcrumb','fort'),
        'rankmath-breadcrumb'    => __('Rank Math Breadcrumb','fort'),
        'breadcrumb-navxt'    => __('NavXT Breadcrumb','fort'),
    ),
    'label'     => __( 'Select the Breadcrumb Show Option', 'fort' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'fort'),
    'section'   => 'fort_breadcrumb_options',
    'settings'  => 'fort_options[fort-breadcrumb-display-from-option]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'fort_breadcrumb_selection_enable',
) );

/*Breadcrumb Text*/
$wp_customize->add_setting( 'fort_options[fort-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'fort' ),
    'description' => __( 'Write your own text in place of You are Here', 'fort' ),
    'section'   => 'fort_breadcrumb_options',
    'settings'  => 'fort_options[fort-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'fort_breadcrumb_selection_enable',
) );
