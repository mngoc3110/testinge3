<?php
/**
 *  Fort Top menu Option
 *
 * @since Fort 1.0.0
 *
 */
/*Top Menu Options*/
$wp_customize->add_section( 'fort_menu_section', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Menu Section Options', 'fort' ),
    'panel' 		 => 'fort_panel',
 ) );
/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header-social]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-top-header-social'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
 ) );
 $wp_customize->add_control( 'fort_options[fort-enable-top-header-social]', array(
    'label'     => __( 'Enable Social Icons', 'fort' ),
    'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'fort'),
    'section'   => 'fort_menu_section',
    'settings'  => 'fort_options[fort-enable-top-header-social]',
    'type'      => 'checkbox',
    'priority'  => 5,
 ) );
/*Enable Search in menu section*/
$wp_customize->add_setting( 'fort_options[fort-enable-top-header-search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-top-header-search'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-top-header-search]', array(
    'label'     => __( 'Search in Menu', 'fort' ),
    'description' => __('Enable Search icon in Menu Part', 'fort'),
    'section'   => 'fort_menu_section',
    'settings'  => 'fort_options[fort-enable-top-header-search]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );