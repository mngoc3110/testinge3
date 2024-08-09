<?php
if (!function_exists('fort_social_menu')) {
    /**
     * Add social icons menu
     *
     * @since 1.0.0
     *
     */
    function fort_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu'
            ));
        endif;
    }
}


if (!function_exists('fort_custom_body_class')) {
    /**
     * Add sidebar class in body
     *
     * @since 1.0.0
     *
     */
    function fort_custom_body_class($classes)
    {
        global $fort_theme_options;
        if (!empty($fort_theme_options['fort-enable-sticky-sidebar']) &&  $fort_theme_options['fort-enable-sticky-sidebar'] == 1) {
            $classes[] = 'ct-sticky-sidebar';
        }

        if (!empty($fort_theme_options['fort-font-awesome-version-loading'])) {
            $classes[] = 'fort-fontawesome-' . $fort_theme_options['fort-font-awesome-version-loading'];
        }

        return $classes;
    }
}

add_filter('body_class', 'fort_custom_body_class');



if (!function_exists('fort_excerpt_more')) :
    /**
     * Remove ... From Excerpt
     *
     * @since 1.0.0
     */
    function fort_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'fort_excerpt_more');


if (!function_exists('fort_alter_excerpt')) :
    /**
     * Filter to change excerpt length size
     *
     * @since 1.0.0
     */
    function fort_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        global $fort_theme_options;
        if (!empty($fort_theme_options['fort-excerpt-length'])) {
            return absint($fort_theme_options['fort-excerpt-length']);
        }
        return 25;
    }
endif;
add_filter('excerpt_length', 'fort_alter_excerpt');


if (!function_exists('fort_tag_cloud_widget')) :
    /**
     * Function to modify tag clouds font size
     *
     * @param none
     * @return array $args
     *
     * @since 1.0.0
     *
     */
    function fort_tag_cloud_widget($args)
    {
        $args['largest'] = 0.9; //largest tag
        $args['smallest'] = 0.9; //smallest tag
        $args['unit'] = 'rem'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'fort_tag_cloud_widget');


/**
 * Google Fonts
 *
 * @param null
 * @return array
 *
 * @since Fort 1.0.0
 *
 */
if (!function_exists('fort_google_fonts')) :
    function fort_google_fonts()
    {
        $fort_google_fonts = array(
            'Cormorant+Garamond:400,500,600,700' => 'Cormorant Garamond',
            'Karla:400,500,600,700' => 'Karla',
            'Libre+Baskerville:400,700' => 'Libre Baskerville',
            'Merriweather:400,400italic,300,900,700' => 'Merriweather',
            'Montserrat:400,700' => 'Montserrat',
            'Muli:400,300italic,300' => 'Muli',
            'Open+Sans:400,400italic,600,700' => 'Open Sans',
            'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed',
            'Oswald:400,300,700' => 'Oswald',
            'Oxygen:400,300,700' => 'Oxygen',
            'Playfair+Display:400,500,600,700,800,900' => 'Playfair Display',
            'Poppins:400,500,600,700' => 'Poppins',
            'Roboto:400,500,300,700,400italic' => 'Roboto',
            'Voltaire' => 'Voltaire',
            'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz'
        );
        return apply_filters('fort_google_fonts', $fort_google_fonts);
    }
endif;


/**
 * Enqueue the list of fonts.
 */
function fort_customizer_fonts()
{
    wp_enqueue_style('fort_customizer_fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond|Karla|Libre+Baskerville|Merriweather|Montserrat|Muli|Open+Sans|Open+Sans+Condensed|Oswald|Oxygen|Playfair+Display|Poppins|Roboto|Voltaire|Yanone+Kaffeesatz', array(), null);
}

add_action('customize_controls_print_styles', 'fort_customizer_fonts');
add_action('customize_preview_init', 'fort_customizer_fonts');

add_action(
    'customize_controls_print_styles',
    function () {
?>
    <style>
        <?php
        $arr = array('Cormorant Garamond', 'Karla', 'Libre+Baskerville', 'Merriweather', 'Montserrat', 'Muli', 'Open+Sans', 'Open+Sans+Condensed', 'Oswald', 'Oxygen', 'Playfair Display', 'Poppins', 'Roboto', 'Voltaire', 'Yanone+Kaffeesatz');

        foreach ($arr as $font) {
            $font_family = str_replace("+", " ", $font);
            echo '.customize-control select option[value*="' . $font . '"] {font-family: ' . $font_family . '; font-size: 22px;}';
        }
        ?>
    </style>
<?php
    }
);


if (!function_exists('fort_editor_assets')) {
    /**
     * Add styles and fonts for the editor.
     */
    function fort_editor_assets()
    {
        wp_enqueue_style('fort-fonts', fort_fonts_url(), array(), null);

        /* Paragraph Font Options */
        $fort_custom_css = '';
        global $fort_theme_options;
        $fort_theme_options = fort_get_options_value();
        $fort_google_fonts = fort_google_fonts();

        $fort_body_fonts = esc_attr($fort_theme_options['fort-font-family-url']);
        $fort_heading_fonts = esc_attr($fort_theme_options['fort-font-heading-family-url']);

        $fort_google_fonts_enqueue = array(
            $fort_body_fonts,
            $fort_heading_fonts,
        );
        $fort_google_fonts_enqueue_uniques = array_unique($fort_google_fonts_enqueue);
        foreach ($fort_google_fonts_enqueue_uniques as $fort_google_fonts_enqueue_unique) {
            wp_enqueue_style(
                $fort_google_fonts_enqueue_unique,
                '//fonts.googleapis.com/css?family=' . $fort_google_fonts_enqueue_unique . '',
                array(),
                ''
            );
        }
        if (!empty($fort_body_fonts)) {
            $fort_font_family = esc_attr($fort_google_fonts[$fort_body_fonts]);
            if (!empty($fort_font_family)) {
                $fort_custom_css .= ".editor-styles-wrapper .wp-block-table td, .editor-styles-wrapper .wp-block-table th, .editor-styles-wrapper, .editor-styles-wrapper .wp-block-button__link, .editor-styles-wrapper ul li, .editor-styles-wrapper ol li, .editor-styles-wrapper p, .editor-styles-wrapper .editor-block-list__block-edit, .editor-block-list__block  { font-family: '{$fort_font_family}', 'Arial','Helvetica',sans-serif; }";
            }
        }

        /* Heading H1 Font Option */
        if (!empty($fort_heading_fonts)) {
            $fort_heading_font_family = $fort_google_fonts[$fort_heading_fonts];
            if (!empty($fort_heading_font_family)) {
                $fort_custom_css .= ".editor-post-title__block .editor-post-title__input , .editor-styles-wrapper h1, .editor-styles-wrapper h2, .editor-styles-wrapper h3, .editor-styles-wrapper h4, .editor-styles-wrapper h5, .editor-styles-wrapper h6 { font-family: '{$fort_heading_font_family}'; }";
            }
        }

        wp_add_inline_style($fort_google_fonts_enqueue_unique, $fort_custom_css);
    }

    add_action('enqueue_block_editor_assets', 'fort_editor_assets');
}
