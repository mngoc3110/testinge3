<?php
/**
 *  Fort Single Page Option
 *
 * @since Fort 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'fort_single_page_section', array(
   'priority'       => 40,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'fort' ),
   'panel' 		 => 'fort_panel',
) );


/*Featured Image Option*/
$wp_customize->add_setting( 'fort_options[fort-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-single-page-featured-image'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'fort' ),
    'description' => __('You can hide or show featured image on single page.', 'fort'),
    'section'   => 'fort_single_page_section',
    'settings'  => 'fort_options[fort-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Hide Tags in Single Page*/
$wp_customize->add_setting( 'fort_options[fort-single-page-tags]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-single-page-tags'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-single-page-tags]', array(
    'label'     => __( 'Enable Posts Tags', 'fort' ),
    'description' => __('You can enable the post tags in single page.', 'fort'),
    'section'   => 'fort_single_page_section',
    'settings'  => 'fort_options[fort-single-page-tags]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Enable Underline in single post link place */
$wp_customize->add_setting( 'fort_options[fort-enable-underline-link]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-enable-underline-link'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-enable-underline-link]', array(
    'label'     => __( 'Enable Underline on Link', 'fort' ),
    'description' => __('If you enabled this, you will see the underline in the links. You can change it color from the general section of colors.', 'fort'),
    'section'   => 'fort_single_page_section',
    'settings'  => 'fort_options[fort-enable-underline-link]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'fort_options[fort-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-single-page-related-posts'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'fort' ),
    'description' => __('2 Post from similar category will display at the end of the page.', 'fort'),
    'section'   => 'fort_single_page_section',
    'settings'  => 'fort_options[fort-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('fort_related_post_callback') ) :
    function fort_related_post_callback(){
        global $fort_theme_options;
        $fort_theme_options = fort_get_options_value();
        $related_posts = absint($fort_theme_options['fort-single-page-related-posts']);
        if( true == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'fort_options[fort-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'fort' ),
    'description' => __('Give the appropriate title for related posts', 'fort'),
    'section'   => 'fort_single_page_section',
    'settings'  => 'fort_options[fort-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'fort_related_post_callback'
) );