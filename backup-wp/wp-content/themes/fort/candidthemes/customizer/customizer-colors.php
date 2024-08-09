<?php
/**
 *  Fort Color Option
 *
 * @since Fort 1.0.0
 *
 */

/* Site Title hover color */
$wp_customize->add_setting( 'fort_options[fort-primary-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['fort-primary-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fort_options[fort-primary-color]',
        array(
            'label'       => esc_html__( 'Site Primary Color', 'fort' ),
            'description' => esc_html__( 'It will change the color of site whole site.', 'fort' ),
            'section'     => 'colors',
             'settings'  => 'fort_options[fort-primary-color]',
        )
    )
);

/* Site Title hover color */
$wp_customize->add_setting( 'fort_options[fort-header-description-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['fort-header-description-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fort_options[fort-header-description-color]',
        array(
            'label'       => esc_html__( 'Header Description Color', 'fort' ),
            'description' => esc_html__( 'It will change the color of site header description.', 'fort' ),
            'section'     => 'colors',
             'settings'  => 'fort_options[fort-header-description-color]',
        )
    )
);



//Color option for slider hex color
$wp_customize->add_setting( 'fort_options[fort-overlay-color]' , array(
    'default'           => $default['fort-overlay-color'], // Use any HEX or RGBA value.
    'transport'         => 'refresh',
    'sanitize_callback' => 'fort_alpha_color_sanitization_callback'
) );
include_once get_theme_file_path( 'candidthemes/alpha-color/src/ColorAlpha.php' );

$wp_customize->add_control( new ColorAlpha( $wp_customize, 'fort_options[fort-overlay-color]', [
    'label'      => __( 'Overlay First Color', 'fort' ),
    'description' => esc_html__( 'It will change the overlay color of slider and category box sections.', 'fort' ),
    'section'    => 'colors',
    'settings'   => 'fort_options[fort-overlay-color]',
    'active_callback'=>'fort_slider_active_callback',
] ) );


$wp_customize->add_setting( 'fort_options[fort-overlay-second-color]' , array(
    'default'           => $default['fort-overlay-second-color'], // Use any HEX or RGBA value.
    'transport'         => 'refresh',
    'sanitize_callback' => 'fort_alpha_color_sanitization_callback'
) );

$wp_customize->add_control( new ColorAlpha( $wp_customize, 'fort_options[fort-overlay-second-color]', [
    'label'      => __( 'Overlay Second Color', 'fort' ),
    'description' => esc_html__( 'It will change the overlay color of slider and category box sections.', 'fort' ),
    'section'    => 'colors',
    'settings'   => 'fort_options[fort-overlay-second-color]',
    'active_callback'=>'fort_slider_active_callback',
] ) );