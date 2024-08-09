<?php
/**
 *  Fort Blog Page Option
 *
 * @since Fort 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'fort_blog_page_section', array(
   'priority'       => 35,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Blog Section Options', 'fort' ),
   'panel' 		 => 'fort_panel',
) );

/*Blog Page Layout Masonry*/
$wp_customize->add_setting( 'fort_options[fort-blog-page-masonry-normal]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-blog-page-masonry-normal'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-blog-page-masonry-normal]', array(
   'choices' => array(
    'normal'    => __('Normal Layout','fort'),
    'masonry'   => __('Masonry Layout','fort'),
    'full-image'   => __('Full Image Layout','fort'),
),
   'label'     => __( 'Masonry or Normal Layout', 'fort' ),
   'description' => __('Some image layout option will not work in masonry.', 'fort'),
   'section'   => 'fort_blog_page_section',
   'settings'  => 'fort_options[fort-blog-page-masonry-normal]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Blog Page Show content from*/
$wp_customize->add_setting( 'fort_options[fort-content-show-from]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-content-show-from'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-content-show-from]', array(
   'choices' => array(
    'excerpt'    => __('Excerpt','fort'),
    'content'    => __('Content','fort'),
    'hide'    => __('Hide Content','fort'),
),
   'label'     => __( 'Select Content Display Option', 'fort' ),
   'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'fort'),
   'section'   => 'fort_blog_page_section',
   'settings'  => 'fort_options[fort-content-show-from]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Blog image size*/
$wp_customize->add_setting( 'fort_options[fort-image-size-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-image-size-blog-page'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-image-size-blog-page]', array(
   'choices' => array(
    'cropped-image'    => __('Cropped Image','fort'),
    'original-image'   => __('Original Image','fort'),
),
   'label'     => __( 'Size of the image, either cropped or original', 'fort' ),
   'description' => __('The image will be either cropped or original size based on the image. Recommended image size is 800*600 px.', 'fort'),
   'section'   => 'fort_blog_page_section',
   'settings'  => 'fort_options[fort-image-size-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Blog Page excerpt length*/
$wp_customize->add_setting( 'fort_options[fort-excerpt-length]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-excerpt-length'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'fort_options[fort-excerpt-length]', array(
    'label'     => __( 'Size of Excerpt Content', 'fort' ),
    'description' => __('Enter the number per Words to show the content in blog page.', 'fort'),
    'section'   => 'fort_blog_page_section',
    'settings'  => 'fort_options[fort-excerpt-length]',
    'type'      => 'number',
    'priority'  => 10,
) );
/*Blog Page Pagination Options*/
$wp_customize->add_setting( 'fort_options[fort-pagination-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-pagination-options'],
    'sanitize_callback' => 'fort_sanitize_select'
) );
$wp_customize->add_control( 'fort_options[fort-pagination-options]', array(
   'choices' => array(
    'default'    => __('Default','fort'),
    'numeric'    => __('Numeric','fort'),
),
   'label'     => __( 'Pagination Types', 'fort' ),
   'description' => __('Select the Required Pagination Type', 'fort'),
   'section'   => 'fort_blog_page_section',
   'settings'  => 'fort_options[fort-pagination-options]',
   'type'      => 'select',
   'priority'  => 10,
) );
/*Blog Page read more text*/
$wp_customize->add_setting( 'fort_options[fort-read-more-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-read-more-text]', array(
    'label'     => __( 'Enter Read More Text', 'fort' ),
    'description' => __('Read more text for blog and archive page.', 'fort'),
    'section'   => 'fort_blog_page_section',
    'settings'  => 'fort_options[fort-read-more-text]',
    'type'      => 'text',
    'priority'  => 10,
) );