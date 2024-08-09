<?php
/**
 *  Fort Typography Option
 *
 * @since Fort 1.1.9
 *
 */
$wp_customize->add_panel( 'fort_typography', array(
    'priority' => 30,
    'capability' => 'edit_theme_options',
    'title' => __( 'Fonts Options', 'fort' ),
) );

/*
* Font and Typography Options
* Paragraph Option Section
* Fort 1.1.9
*/
$wp_customize->add_section( 'fort_font_options', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Paragraph Font', 'fort' ),
   'panel' 		 => 'fort_typography',
) );
/*Paragraph Font Family*/
$wp_customize->add_setting( 'fort_options[fort-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = fort_google_fonts();
$wp_customize->add_control( 'fort_options[fort-font-family-url]', array(
    'label'     => __( 'Body Paragraph Font Family', 'fort' ),
    'description' =>__( 'Select the required font from the dropdown.', 'fort' ),
    'choices'  	=> $choices,
    'section'   => 'fort_font_options',
    'settings'  => 'fort_options[fort-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );

/*
* Heading Fonts Options
* Heading Font Option Section
* Fort 1.1.9
*/

/*Heading Fonts*/
$wp_customize->add_section( 'fort_heading_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading Font Family', 'fort' ),
    'panel'         => 'fort_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'fort_options[fort-font-heading-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-font-heading-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = fort_google_fonts();
$wp_customize->add_control( 'fort_options[fort-font-heading-family-url]', array(
    'label'     => __( 'Select Heading Font Family', 'fort' ),
    'description' => __( 'Select the required font from the dropdown(H1-H6).', 'fort' ),
    'choices'  	=> $choices,
    'section'   => 'fort_heading_font_options',
    'settings'  => 'fort_options[fort-font-heading-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );