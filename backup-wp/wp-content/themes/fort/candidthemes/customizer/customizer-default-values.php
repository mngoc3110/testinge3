<?php

/**
 * Fort Theme Customizer default values
 *
 * @package Fort
 */
if (!function_exists('fort_default_theme_options_values')) :
    function fort_default_theme_options_values()
    {
        $default_theme_options = array(
            /*Top Header*/
            'fort-make-logo-center' => true,
            'fort-enable-top-header' => true,
            'fort-enable-top-header-social' => true,
            'fort-enable-top-header-menu' => true,
            'fort-enable-top-header-search' => true,
            'fort-enable-top-header-notification' => esc_html__('Subscribe to Us', 'fort'),
            'fort-enable-top-header-notification-url' => '#',
            'fort-enable-top-header-notification-icon' => esc_html__('fa-bell', 'fort'),
            'fort-top-header-background-color' => '#eee',
            'fort-enable-headr-advertisement' => true,
            'fort-header-ads-image-file' => '',
            'fort-header-ads-image-url' => '#',

            /*Slider Settings Option*/
            'fort-enable-slider' => false,
            'fort-select-category' => 0,
            'fort-image-size-slider' => 'cropped-image',

            /*Category Boxes*/
            'fort-enable-category-boxes' => false,
            'fort-single-cat-posts-select-1' => 0,


            /*Sidebar Options*/
            'fort-sidebar-blog-page' => 'right-sidebar',
            'fort-sidebar-single-page' => 'right-sidebar',
            'fort-enable-sticky-sidebar' => true,


            /*Blog Page Default Value*/
            'fort-column-blog-page' => 'one-column',
            'fort-content-show-from' => 'excerpt',
            'fort-excerpt-length' => 25,
            'fort-pagination-options' => 'numeric',
            'fort-read-more-text' => esc_html__('Read More', 'fort'),
            'fort-blog-page-masonry-normal' => 'normal',
            'fort-blog-page-image-position' => 'left-image',
            'fort-image-size-blog-page' => 'original-image',

            /*Blog Layout Overlay*/
            'fort-site-layout-blog-overlay' => 1,

            /*Single Page Default Value*/
            'fort-single-page-featured-image' => true,
            'fort-single-page-tags' => false,
            'fort-enable-underline-link' => true,
            'fort-single-page-related-posts' => true,
            'fort-single-page-related-posts-title' => esc_html__('Related Posts', 'fort'),


            /*Breadcrumb Settings*/
            'fort-blog-site-breadcrumb' => true,
            'fort-breadcrumb-display-from-option' => 'theme-default',
            'fort-breadcrumb-text' => '',

            /*General Colors*/
            'fort-primary-color' => '#1b1b1b',
            'fort-header-description-color' => '#404040',

            'fort-overlay-color' => 'rgba(209, 0, 20, 0.5)',
            'fort-overlay-second-color' => 'rgba(0, 0, 0, 0.5)',

            /*Footer Options*/
            'fort-footer-copyright' => esc_html__('All Rights Reserved 2022.', 'fort'),
            'fort-go-to-top' => true,
            'fort-go-to-top-icon' => esc_html__('fa-long-arrow-up', 'fort'),
            'fort-go-to-top-icon-5' => esc_html__('fa-long-arrow-alt-up', 'fort'),
            'fort-footer-social-icons' => false,
            'fort-footer-mailchimp-subscribe' => false,
            'fort-footer-mailchimp-form-id' => '',
            'fort-footer-mailchimp-form-title' =>  esc_html__('Subscribe to my Newsletter', 'fort'),
            'fort-footer-mailchimp-form-subtitle' => esc_html__('Be the first to receive the latest buzz on upcoming contests & more!', 'fort'),

            /*Font Options*/
            'fort-font-family-url' => 'Muli:400,300italic,300',
            'fort-font-heading-family-url' => 'Cormorant+Garamond:400,500,600,700',

            /*Extra Options*/
            'fort-post-published-updated-date' => 'post-published',
            'fort-font-awesome-version-loading' => 'version-4',

        );
        return apply_filters('fort_default_theme_options_values', $default_theme_options);
    }
endif;

/**
 *  Fort Theme Options and Settings
 *
 * @since Fort 1.0.0
 *
 * @param null
 * @return array fort_get_options_value
 *
 */
if (!function_exists('fort_get_options_value')) :
    function fort_get_options_value()
    {
        $fort_default_theme_options_values = fort_default_theme_options_values();
        $fort_get_options_value = get_theme_mod('fort_options');
        if (is_array($fort_get_options_value)) {
            return array_merge($fort_default_theme_options_values, $fort_get_options_value);
        } else {
            return $fort_default_theme_options_values;
        }
    }
endif;
