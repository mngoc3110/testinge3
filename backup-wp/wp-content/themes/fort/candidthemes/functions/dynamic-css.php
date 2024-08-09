<?php

/**
 * Dynamic CSS elements.
 *
 * @package fort
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('fort_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @param null
     * @return null
     *
     * @since 1.0.0
     *
     */
    function fort_dynamic_css()
    {

        global $fort_theme_options;
        $fort_header_color = get_header_textcolor();
        $fort_custom_css = '';

        if (!empty($fort_theme_options['fort-top-header-background-color'])) {
            $top_background = esc_attr($fort_theme_options['fort-top-header-background-color']);
            $fort_custom_css .= "
            .site-header-topbar, .site-header.site-header-v2 .site-header-topbar { background-color: {$top_background}; }
            ";
        }


        if (!empty($fort_header_color)) {
            $fort_custom_css .= ".site-title, .site-title a, h1.site-title a, p.site-title a,  .site-title a:visited { color: #{$fort_header_color}; }";
        }

        if (!empty($fort_theme_options['fort-primary-color'])) {
            $primary_color = esc_attr($fort_theme_options['fort-primary-color']);
            $fort_custom_css .= " :root{ --secondary-color: {$primary_color}; }";
            $fort_custom_css .= " .fort-content-area > .post.sticky > .card, .search-form:hover .search-field, .search-form .search-field:focus{border-color: {$primary_color}; }";
            $fort_custom_css .= "input[type='text']:focus, input[type='email']:focus, input[type='password']:focus, input[type='search']:focus, input[type='file']:focus, input[type='number']:focus, input[type='datetime']:focus, input[type='url']:focus, select:focus, textarea:focus, a:focus{ outline-color: {$primary_color}; }";
            $fort_custom_css .= " .site-info a:hover, .site-header.site-header-left-logo .site-header-top .site-header-top-menu li a:hover, .site-header.site-header-left-logo .site-header-top .site-header-top-menu li a:focus, .site-header.site-header-v2 .site-header-topbar .site-header-top-menu li a:hover, .site-header.site-header-v2 .site-header-topbar .site-header-top-menu li a:focus, .top-header-toggle-btn, .category-label-group .cat-links a, .secondary-color, .card_title a:hover, p a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, .author-title a:hover, figure a:hover, table a:hover, span a:hover, strong a:hover, li a:hover, h1 a:hover, a:hover, a:focus, .btn-prmiary-border:hover, .btn-primary-border:focus, .widget li a:hover, .comment-list .comment .comment-body a, .comment-list .comment .comment-body .comment-metadata a.comment-edit-link, .site-header .search-box:hover button i::before, .search-box .close-btn.show i:before, .breadcrumb-trail .trial-items a:hover, .breadcrumbs ul a:hover, .breadcrumb-trail .trial-items .trial-end a, .breadcrumbs ul li:last-child a{ color: {$primary_color}; }";
            $fort_custom_css .= ".site-header-topbar .fort-top-right-menu:hover, .secondary-bg, .btn-secondary, .btn-primary:hover, .btn-primary:focus, .main-navigation ul ul li:hover > a, .search-form:hover .search-submit, .main-navigation #primary-menu ul li.focus > a, .posts-navigation .nav-links a:hover, .category-label-group.bg-label a:hover, .wp-block-button__link:hover, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover, .pagination .page-numbers, .ct-dark-mode .site-header .sub-menu a:hover, .ajax-pagination .show-more:hover, .widget li a:hover:before, .footer-go-to-top{ background-color: {$primary_color}; }";
        }

        if (!empty($fort_theme_options['fort-header-description-color'])) {
            $site_description_color = esc_attr($fort_theme_options['fort-header-description-color']);
            $fort_custom_css .= ".site-description { color: {$site_description_color}; }";
        }


        if (!empty($fort_theme_options['fort-overlay-color']) && !empty($fort_theme_options['fort-overlay-second-color'])) {
            $fort_overlay_color = esc_attr($fort_theme_options['fort-overlay-color']);
            $fort_overlay_second_color = esc_attr($fort_theme_options['fort-overlay-second-color']);
            $fort_custom_css .= "
                    .card-bg-image:after, .card-bg-image.card-promo .card_media a:after{
                    background-image: linear-gradient(45deg, {$fort_overlay_color}, {$fort_overlay_second_color});
                    }
                    ";
        } else {
            if (!empty($fort_theme_options['fort-overlay-color'])) {
                $fort_overlay_color = esc_attr($fort_theme_options['fort-overlay-color']);
                $fort_custom_css .= "
                    .card-bg-image:after, .card-bg-image.card-promo .card_media a:after{
                    background-image: none;
                    background-color: $fort_overlay_color;
                    }
                    ";
            }
            if (!empty($fort_theme_options['fort-overlay-second-color'])) {
                $fort_overlay_second_color = esc_attr($fort_theme_options['fort-overlay-second-color']);
                $fort_custom_css .= "
                    .card-bg-image:after, .card-bg-image.card-promo .card_media a:after{
                    background-image: none;
                    background-color: $fort_overlay_second_color;
                    }
                    ";
            }
        }


        if (!empty($fort_theme_options['fort-site-layout-blog-overlay']) && ($fort_theme_options['fort-site-layout-blog-overlay'] == 0)) {

            $fort_custom_css .= "
                    .card-blog-post, .widget-area .widget{
                    box-shadow: none;
                    }
                    ";
        }


        if (!empty($fort_theme_options['fort-enable-underline-link']) && ($fort_theme_options['fort-enable-underline-link'] == 1)) {
            $fort_custom_css .= "
                    .entry-content a{
                   text-decoration: underline;
                    }
                    ";
        } else {
            $fort_custom_css .= "
                    .entry-content a{
                   text-decoration: none;
                    }
                    ";
        }

        /* Paragraph Font Options */
        $fort_google_fonts = fort_google_fonts();
        if (!empty($fort_theme_options['fort-font-family-url'])) {
            $fort_body_fonts = $fort_theme_options['fort-font-family-url'];
            $fort_font_family = esc_attr($fort_google_fonts[$fort_body_fonts]);
            if (!empty($fort_font_family)) {
                $fort_custom_css .= ":root { --primary-font : '{$fort_font_family}'; }";
            }
        }

        /* Heading H1 Font Option */
        if (!empty($fort_theme_options['fort-font-heading-family-url'])) {
            $fort_heading_fonts = esc_attr($fort_theme_options['fort-font-heading-family-url']);
            $fort_heading_font_family = $fort_google_fonts[$fort_heading_fonts];
            if (!empty($fort_heading_font_family)) {
                $fort_custom_css .= ":root { --secondary-font: '{$fort_heading_font_family}'; }";
            }
        }


        if (!empty($fort_theme_options['fort-post-published-updated-date']) && $fort_theme_options['fort-post-published-updated-date'] == 'post-updated') {
            $fort_custom_css .= "
                        .posted-on time.published:not(.updated){
                            display: none;
                        }
                        .posted-on time.updated:not(.published){
                            display: inline-block;
                        }
                    ";
        }

        wp_add_inline_style('fort-style', $fort_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'fort_dynamic_css', 99);
