<?php
/**
 * Fort Footer Option
 *
 * @since Fort 1.0.0
 *
 */
/*Footer Options*/
$wp_customize->add_section( 'fort_footer_section', array(
   'priority'       => 55,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Footer Options', 'fort' ),
   'panel' 		 => 'fort_panel',
) );
/*Copyright Setting*/
$wp_customize->add_setting( 'fort_options[fort-footer-copyright]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-footer-copyright]', array(
    'label'     => __( 'Copyright Text', 'fort' ),
    'description' => __('Enter your own copyright text.', 'fort'),
    'section'   => 'fort_footer_section',
    'settings'  => 'fort_options[fort-footer-copyright]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Go to Top Setting*/
$wp_customize->add_setting( 'fort_options[fort-go-to-top]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-go-to-top'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-go-to-top]', array(
    'label'     => __( 'Enable Go to Top', 'fort' ),
    'description' => __('Checked to Enable Go to Top', 'fort'),
    'section'   => 'fort_footer_section',
    'settings'  => 'fort_options[fort-go-to-top]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*callback functions header section*/
if ( !function_exists('fort_go_to_top_active_callback') ) :
    function fort_go_to_top_active_callback(){
        global $fort_theme_options;
        $fort_theme_options = fort_get_options_value();
        $go_to_top_class = absint($fort_theme_options['fort-go-to-top']);
        if( true == $go_to_top_class ){
            return true;
        }
        else{
            return false;
        }
    }
  endif;

/*Go to top Icon for 4*/
$wp_customize->add_setting( 'fort_options[fort-go-to-top-icon]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-go-to-top-icon'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-go-to-top-icon]', array(
    'label'     => __( 'Font awesome class for Font Awesome 4', 'fort' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Enter fontaweome class like fa-long-arrow-up, fa-angle-up, etc. You can find more icons here in', 'fort' ),
        esc_url('https://fontawesome.com/v4.7/icons/'),
        __('Fontawesome lists and icons name' , 'fort'),
        __('so that you can use any icon from here.' ,'fort')
    ),
    'section'   => 'fort_footer_section',
    'settings'  => 'fort_options[fort-go-to-top-icon]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=> 'fort_go_to_top_active_callback',
) );

/*Go to top Icon for 5*/
$wp_customize->add_setting( 'fort_options[fort-go-to-top-icon-5]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-go-to-top-icon-5'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fort_options[fort-go-to-top-icon-5]', array(
    'label'     => __( 'Font awesome class for Font Awesome 4', 'fort' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Enter fontaweome class like fa-long-arrow-up, fa-angle-up, etc. You can find more icons here in', 'fort' ),
        esc_url('https://fontawesome.com/v5/search/'),
        __('Fontawesome 5 lists and icons name' , 'fort'),
        __('so that you can use any icon from here.' ,'fort')
    ),
    'section'   => 'fort_footer_section',
    'settings'  => 'fort_options[fort-go-to-top-icon-5]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=> 'fort_go_to_top_active_callback',
) );


/*Social Icons Footer*/
$wp_customize->add_setting( 'fort_options[fort-footer-social-icons]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fort-footer-social-icons'],
    'sanitize_callback' => 'fort_sanitize_checkbox'
) );
$wp_customize->add_control( 'fort_options[fort-footer-social-icons]', array(
    'label'     => __( 'Enable Social Icons', 'fort' ),
    'description' => __('Checked to Enable Social Icons. Make Social Menus from Appearance > Menus.', 'fort'),
    'section'   => 'fort_footer_section',
    'settings'  => 'fort_options[fort-footer-social-icons]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

if(function_exists('mc4wp_get_form')) {

    /*Enable Subscribe in Footer*/
    $wp_customize->add_setting('fort_options[fort-footer-mailchimp-subscribe]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['fort-footer-mailchimp-subscribe'],
        'sanitize_callback' => 'fort_sanitize_checkbox'
    ));
    $wp_customize->add_control('fort_options[fort-footer-mailchimp-subscribe]', array(
        'label' => __('Mailchimp Subscribe Form', 'fort'),
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Install and Customize', 'fort' ),
        esc_url('https://wordpress.org/plugins/mailchimp-for-wp/'),
        __('Mailchimp Subscribe Plugin' , 'fort'),
        __('and paste the form ID below.' ,'fort')
    ),
        'section' => 'fort_footer_section',
        'settings' => 'fort_options[fort-footer-mailchimp-subscribe]',
        'type' => 'checkbox',
        'priority' => 15,
    ));

    /*callback functions mailchimp enable*/
    if (!function_exists('fort_footer_mailchimp_enable')) :
        function fort_footer_mailchimp_enable()
        {
            global $fort_theme_options;
            $fort_theme_options = fort_get_options_value();
            $enable_mailchimp = absint($fort_theme_options['fort-footer-mailchimp-subscribe']);
            if ($enable_mailchimp == true) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /*Enable Mailchimp form Id in Footer*/
    $wp_customize->add_setting('fort_options[fort-footer-mailchimp-form-id]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['fort-footer-mailchimp-form-id'],
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('fort_options[fort-footer-mailchimp-form-id]', array(
        'label' => __('Mailchimp Form ID', 'fort'),
        'description' => __('From your dashboard go to the mailchimp form plugin and get the ID and put here.', 'fort'),
        'section' => 'fort_footer_section',
        'settings' => 'fort_options[fort-footer-mailchimp-form-id]',
        'type' => 'number',
        'priority' => 15,
        'active_callback'=> 'fort_footer_mailchimp_enable',
    ));

    /*Title for mailchimp*/
    $wp_customize->add_setting('fort_options[fort-footer-mailchimp-form-title]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['fort-footer-mailchimp-form-title'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('fort_options[fort-footer-mailchimp-form-title]', array(
        'label' => __('Mailchimp Section Title', 'fort'),
        'description' => __('Enter the title of subscribe.', 'fort'),
        'section' => 'fort_footer_section',
        'settings' => 'fort_options[fort-footer-mailchimp-form-title]',
        'type' => 'text',
        'priority' => 15,
        'active_callback'=> 'fort_footer_mailchimp_enable',
    ));


    /*subTitle for mailchimp*/
    $wp_customize->add_setting('fort_options[fort-footer-mailchimp-form-subtitle]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['fort-footer-mailchimp-form-subtitle'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('fort_options[fort-footer-mailchimp-form-subtitle]', array(
        'label' => __('Mailchimp Section Sub Title', 'fort'),
        'description' => __('Enter the sub title of subscribe.', 'fort'),
        'section' => 'fort_footer_section',
        'settings' => 'fort_options[fort-footer-mailchimp-form-subtitle]',
        'type' => 'text',
        'priority' => 15,
        'active_callback'=> 'fort_footer_mailchimp_enable',
    ));
}