<?php
/**
 *  Fort Extra Option
 *
 * @since Fort 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'fort_extra_section', array(
   'priority'       => 60,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Extra Options', 'fort' ),
   'panel' 		 => 'fort_panel',
) );

/*post published or updated date*/
$wp_customize->add_setting( 'fort_options[fort-post-published-updated-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-post-published-updated-date'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-post-published-updated-date]', array(
   'choices' => array(
    'post-published'    => __('Show Post Published Date','fort'),
    'post-updated'   => __('Show Post Updated Date','fort'),
),
   'label'     => __( 'Show Post Publish or Updated Date', 'fort' ),
   'description' => __('Show either post published or updated date.', 'fort'),
   'section'   => 'fort_extra_section',
   'settings'  => 'fort_options[fort-post-published-updated-date]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Font awesome version loading*/
$wp_customize->add_setting( 'fort_options[fort-font-awesome-version-loading]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['fort-font-awesome-version-loading'],
   'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-font-awesome-version-loading]', array(
  'choices' => array(
   'version-4'    => __('Current Theme Used Version 4','fort'),
   'version-5'   => __('New Fontaweome Version 5','fort'),
),
  'label'     => __( 'Select the preferred fontawesome version', 'fort' ),
  'description' => __('You can select the latest fontawesome version to get more options for icons', 'fort'),
  'section'   => 'fort_extra_section',
  'settings'  => 'fort_options[fort-font-awesome-version-loading]',
  'type'      => 'select',
  'priority'  => 10,
) );