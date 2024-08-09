<?php
/**
 *  Fort Sidebar Option
 *
 * @since Fort 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'fort_sidebar_section', array(
   'priority'       => 45,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sidebar Options', 'fort' ),
   'panel' 		 => 'fort_panel',
) );
/*Blog Page Sidebar Layout*/
$wp_customize->add_setting( 'fort_options[fort-sidebar-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-sidebar-blog-page'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-sidebar-blog-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','fort'),
    'left-sidebar'    => __('Left Sidebar','fort'),
    'no-sidebar'      => __('No Sidebar','fort'),
    'middle-column'   => __('Middle Column','fort')
),
   'label'     => __( 'Blog Page Sidebar Layout', 'fort' ),
   'description' => __('This sidebar will work for the blog, archive, category, author pages. More options is in pro theme.', 'fort'),
   'section'   => 'fort_sidebar_section',
   'settings'  => 'fort_options[fort-sidebar-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Inner Page Sidebar Layout*/
$wp_customize->add_setting( 'fort_options[fort-sidebar-single-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-sidebar-single-page'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-sidebar-single-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','fort'),
    'left-sidebar'    => __('Left Sidebar','fort'),
    'no-sidebar'      => __('No Sidebar','fort'),
    'middle-column'   => __('Middle Column','fort')
),
   'label'     => __( 'Inner Pages Sidebar Layout', 'fort' ),
   'description' => __('This sidebar will work for the single page and post. More options is in pro theme.', 'fort'),
   'section'   => 'fort_sidebar_section',
   'settings'  => 'fort_options[fort-sidebar-single-page]',
   'type'      => 'select',
   'priority'  => 10,
) );


/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'fort_options[fort-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-sticky-sidebar'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-sticky-sidebar]', array(
    'label'     => __( 'Sticky Sidebar Option', 'fort' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'fort'),
    'section'   => 'fort_sidebar_section',
    'settings'  => 'fort_options[fort-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );