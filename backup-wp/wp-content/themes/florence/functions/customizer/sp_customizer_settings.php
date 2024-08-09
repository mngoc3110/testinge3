<?php

//////////////////////////////////////////////////////////////////
// Customizer - Add Custom Styling
//////////////////////////////////////////////////////////////////
function solopine_customizer_style()
{
	wp_enqueue_style('customizer-css', get_stylesheet_directory_uri() . '/functions/customizer/css/customizer.css');
}
add_action('customize_controls_print_styles', 'solopine_customizer_style');

//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function solopine_register_theme_customizer( $wp_customize ) {
 	
	// Add Sections
	
	$wp_customize->add_section( 'background_image', array(
		 'title'          => esc_html__( 'Background Image', 'florence' ),
		 'theme_supports' => 'custom-background',
		 'priority'       => 104,
	) );

	$wp_customize->add_section( 'colors', array(
		 'title'          => esc_html__( 'Background Color', 'florence' ),
		 'priority'       => 103,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_color_general' , array(
   		'title'      => esc_html__('Colors: General', 'florence'),
   		'priority'   => 102,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_color_sidebar' , array(
   		'title'      => esc_html__('Colors: Sidebar', 'florence'),
   		'priority'   => 100,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_color_footer' , array(
   		'title'      => esc_html__('Colors: Footer', 'florence'),
   		'priority'   => 99,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_color_posts' , array(
   		'title'      => esc_html__('Colors: Posts', 'florence'),
   		'priority'   => 98,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_color_topbar' , array(
   		'title'      => esc_html__('Colors: Top Bar', 'florence'),
   		'priority'   => 98,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_footer' , array(
   		'title'      => esc_html__('Footer Settings', 'florence'),
   		'priority'   => 97,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_page' , array(
   		'title'      => esc_html__('Page Settings', 'florence'),
   		'priority'   => 95,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_post' , array(
   		'title'      => esc_html__('Post Settings', 'florence'),
   		'priority'   => 94,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_topbar' , array(
		'title'      => esc_html__('Top Bar Settings', 'florence'),
		'priority'   => 92,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_logo_header' , array(
   		'title'      => esc_html__('Logo and Header Settings', 'florence'),
   		'priority'   => 91,
	) );
	
	$wp_customize->add_section( 'solopine_new_section_general' , array(
   		'title'      => esc_html__('General Settings', 'florence'),
   		'priority'   => 90,
	) );
	
	
	// Add Setting
		
		// General
		$wp_customize->add_setting(
			'solopine_responsive',
			array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
		);
		
		$wp_customize->add_setting(
	        'solopine_home_layout',
	        array(
	            'default'     => 'sidebar',
				'sanitize_callback'   => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_archive_layout',
	        array(
	            'default'     => 'sidebar',
				'sanitize_callback'   => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_layout',
	        array(
	            'default'     => 'sidebar',
				'sanitize_callback'   => 'wp_kses_post'
	        )
	    );
		
		// Header & Logo
		$wp_customize->add_setting(
	        'solopine_logo',
			array(
	            'sanitize_callback'     => 'esc_url_raw'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_logo_retina',
			array(
	            'sanitize_callback'     => 'esc_url_raw'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_header_padding_top',
	        array(
	            'default'     => '60',
				'sanitize_callback'     => 'solopine_sanitize_number'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_header_padding_bottom',
	        array(
	            'default'     => '50',
				'sanitize_callback'     => 'solopine_sanitize_number'
	        )
	    );
		
		// Top Bar
		$wp_customize->add_setting(
	        'solopine_topbar_social_check',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_topbar_search_check',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_woo_cart_icon',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Post Settings
		$wp_customize->add_setting(
	        'solopine_post_tags',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_author',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_related',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_related_date',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_share',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_thumb',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_nav',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_date',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_author_name',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_cat',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'solopine_post_title_lowercase',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Page
		$wp_customize->add_setting(
	        'solopine_page_share',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );

		// Footer Options

	    $wp_customize->add_setting(
	        'solopine_footer_social',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );

		$wp_customize->add_setting(
	        'solopine_footer_copyright',
	        array(
				'default'     => wp_kses( __('(C) 2019 Solo Pine Designs, INC. All Rights Reserved.', 'florence'), array( 'i' => array( 'class' => array() ), 'a' => array( 'href' => array() ), 'strong' => array() ) ),
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		
		// Color Options
		
			// Top bar
			$wp_customize->add_setting(
				'solopine_topbar_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_topbar_nav_color',
				array(
					'default'     => '#777777',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_topbar_nav_color_active',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'solopine_drop_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_drop_border',
				array(
					'default'     => '#f4f4f4',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_drop_text_color',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_drop_text_hover_bg',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_drop_text_hover_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'solopine_topbar_social_color',
				array(
					'default'     => '#c2c2c2',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_topbar_social_color_hover',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'solopine_topbar_search_bg',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_topbar_search_magnify',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Footer
			$wp_customize->add_setting(
				'solopine_footer_insta_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_footer_insta_text',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'solopine_footer_social_bg',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_footer_social_icon',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_footer_copyright_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_footer_copyright_text',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Sidebar
			$wp_customize->add_setting(
				'solopine_sidebar_heading',
				array(
					'default'     => '#161616',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_sidebar_heading_line',
				array(
					'default'     => '#d8d8d8',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_sidebar_social_bg',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'solopine_sidebar_social_icon',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Color general
			$wp_customize->add_setting(
				'solopine_color_accent',
				array(
					'default'     => '#EF9D87',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

    // Add Control
	
		// General
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'responsive',
				array(
					'label'      => esc_html__('Disable Responsive', 'florence'),
					'section'    => 'solopine_new_section_general',
					'settings'   => 'solopine_responsive',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_layout',
				array(
					'label'          => esc_html__('Homepage Layout', 'florence'),
					'section'        => 'solopine_new_section_general',
					'settings'       => 'solopine_home_layout',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'sidebar'   => esc_html__('Sidebar Layout', 'florence'),
						'full'  => esc_html__('Full Width Layout', 'florence'),
						'grid'  => esc_html__('Sidebar & Grid Layout', 'florence'),
						'grid-full'  => esc_html__('Full Width & Grid Layout', 'florence'),
						'list'  => esc_html__('Sidebar & List Layout', 'florence'),
						'list-full'  => esc_html__('Full Width & List Layout', 'florence'),
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'archive_layout',
				array(
					'label'          => esc_html__('Archive Layout', 'florence'),
					'section'        => 'solopine_new_section_general',
					'settings'       => 'solopine_archive_layout',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'sidebar'   => esc_html__('Sidebar Layout', 'florence'),
						'full'  => esc_html__('Full Width Layout', 'florence'),
						'grid'  => esc_html__('Sidebar & Grid Layout', 'florence'),
						'grid-full'  => esc_html__('Full Width & Grid Layout', 'florence'),
						'list'  => esc_html__('Sidebar & List Layout', 'florence'),
						'list-full'  => esc_html__('Full Width & List Layout', 'florence'),
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_layout',
				array(
					'label'          => esc_html__('Post Layout', 'florence'),
					'section'        => 'solopine_new_section_general',
					'settings'       => 'solopine_post_layout',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'sidebar'   => esc_html__('Sidebar Layout', 'florence'),
						'full'  => esc_html__('Full Width Layout', 'florence'),
						'full_narrow'  => esc_html__('Full Width (Narrow) Layout', 'florence')
					)
				)
			)
		);
		
		// Header and Logo
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo',
				array(
					'label'      => esc_html__('Upload Logo', 'florence'),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'solopine_logo',
					'priority'	 => 20
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo_retina',
				array(
					'label'      => esc_html__('Upload Logo (Retina Version)', 'florence'),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'solopine_logo_retina',
					'priority'	 => 21
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_top',
				array(
					'label'      => esc_html__('Top Header Padding', 'florence'),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'solopine_header_padding_top',
					'type'		 => 'number',
					'priority'	 => 22
				)
			)
		);
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_bottom',
				array(
					'label'      => esc_html__('Bottom Header Padding', 'florence'),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'solopine_header_padding_bottom',
					'type'		 => 'number',
					'priority'	 => 23
				)
			)
		);
		
		// Top Bar
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_social_check',
				array(
					'label'      => esc_html__('Disable Top Bar Social Icons', 'florence'),
					'section'    => 'solopine_new_section_topbar',
					'settings'   => 'solopine_topbar_social_check',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_search_check',
				array(
					'label'      => esc_html__('Disable Top Bar Search', 'florence'),
					'section'    => 'solopine_new_section_topbar',
					'settings'   => 'solopine_topbar_search_check',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'woo_cart_icon',
				array(
					'label'      => esc_html__('Disable Top Bar WooCommerce Cart', 'florence'),
					'section'    => 'solopine_new_section_topbar',
					'settings'   => 'solopine_woo_cart_icon',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
		// Post Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => esc_html__('Hide Category', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_date',
				array(
					'label'      => esc_html__('Hide Date', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_date',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author_name',
				array(
					'label'      => esc_html__('Hide Author Name', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_author_name',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => esc_html__('Hide Tags', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share',
				array(
					'label'      => esc_html__('Hide Share Buttons', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_share',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => esc_html__('Hide Author Box', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => esc_html__('Hide Related Posts Box', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related_date',
				array(
					'label'      => esc_html__('Hide Related Posts Date', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_related_date',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'      => esc_html__('Hide Featured Image from top of Post', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_thumb',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_nav',
				array(
					'label'      => esc_html__('Hide Next/Prev Post Navigation', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_nav',
					'type'		 => 'checkbox',
					'priority'	 => 9
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_title_lowercase',
				array(
					'label'      => esc_html__('Turn off uppercase in post title', 'florence'),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'solopine_post_title_lowercase',
					'type'		 => 'checkbox',
					'priority'	 => 10
				)
			)
		);
		
		// Page
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_share',
				array(
					'label'      => esc_html__('Hide Share Buttons', 'florence'),
					'section'    => 'solopine_new_section_page',
					'settings'   => 'solopine_page_share',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		// Footer
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_social',
				array(
					'label'      => esc_html__('Disable Footer Social', 'florence'),
					'section'    => 'solopine_new_section_footer',
					'settings'   => 'solopine_footer_social',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright',
				array(
					'label'      => esc_html__('Footer Copyright Text', 'florence'),
					'section'    => 'solopine_new_section_footer',
					'settings'   => 'solopine_footer_copyright',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		
		// Color Settings
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_bg',
					array(
						'label'      => esc_html__('Top Bar BG', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color',
					array(
						'label'      => esc_html__('Top Bar Menu Text Color', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_nav_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color_active',
					array(
						'label'      => esc_html__('Top Bar Menu Text Hover/Active Color', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_nav_color_active',
						'priority'	 => 3
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_bg',
					array(
						'label'      => esc_html__('Dropdown BG', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_drop_bg',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_border',
					array(
						'label'      => esc_html__('Dropdown Border Color', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_drop_border',
						'priority'	 => 5
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_color',
					array(
						'label'      => esc_html__('Dropdown Text Color', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_drop_text_color',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_bg',
					array(
						'label'      => esc_html__('Dropdown Text Hover BG', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_drop_text_hover_bg',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_color',
					array(
						'label'      => esc_html__('Dropdown Text Hover Color', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_drop_text_hover_color',
						'priority'	 => 8
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color',
					array(
						'label'      => esc_html__('Top Bar Social Icons', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_social_color',
						'priority'	 => 9
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color_hover',
					array(
						'label'      => esc_html__('Top Bar Social Icons Hover', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_social_color_hover',
						'priority'	 => 11
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_bg',
					array(
						'label'      => esc_html__('Top Bar Search BG', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_search_bg',
						'priority'	 => 12
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_magnify',
					array(
						'label'      => esc_html__('Top Bar Search Magnify Color', 'florence'),
						'section'    => 'solopine_new_section_color_topbar',
						'settings'   => 'solopine_topbar_search_magnify',
						'priority'	 => 13
					)
				)
			);
			
			// Footer
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_insta_bg',
					array(
						'label'      => esc_html__('Footer Instagram BG', 'florence'),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'solopine_footer_insta_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_insta_text',
					array(
						'label'      => esc_html__('Footer Instagram Heading Color', 'florence'),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'solopine_footer_insta_text',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_bg',
					array(
						'label'      => esc_html__('Footer Social BG', 'florence'),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'solopine_footer_social_bg',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_icon',
					array(
						'label'      => esc_html__('Footer Social Icon Color', 'florence'),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'solopine_footer_social_icon',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_bg',
					array(
						'label'      => esc_html__('Footer Copyright BG', 'florence'),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'solopine_footer_copyright_bg',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_text',
					array(
						'label'      => esc_html__('Footer Copyright Text Color', 'florence'),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'solopine_footer_copyright_text',
						'priority'	 => 6
					)
				)
			);
			
			// Sidebar
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_heading',
					array(
						'label'      => esc_html__('Sidebar Heading Color', 'florence'),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'solopine_sidebar_heading',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_heading_line',
					array(
						'label'      => esc_html__('Sidebar Heading Line Color', 'florence'),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'solopine_sidebar_heading_line',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_social_bg',
					array(
						'label'      => esc_html__('Sidebar Social Icon BG', 'florence'),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'solopine_sidebar_social_bg',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_social_icon',
					array(
						'label'      => esc_html__('Sidebar Social Icon Color', 'florence'),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'solopine_sidebar_social_icon',
						'priority'	 => 4
					)
				)
			);
			
			// Colors general
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'color_accent',
					array(
						'label'      => esc_html__('Accent Color', 'florence'),
						'section'    => 'solopine_new_section_color_general',
						'settings'   => 'solopine_color_accent',
						'priority'	 => 1
					)
				)
			);
 
}
add_action( 'customize_register', 'solopine_register_theme_customizer' );

/**
 * Sanitize
 */
if(!function_exists('solopine_sanitize_checkbox')) {
function solopine_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
}
if(!function_exists('solopine_sanitize_number')) {
function solopine_sanitize_number($input) {
    if ( isset( $input ) && is_numeric( $input ) ) {
        return $input;
    }
}
}

/*
* Transfer old settings over to new prefix settings
* Runs one time after updating
*/
if(!function_exists('solopine_transfer_settings')) {
function solopine_transfer_settings() {
 
    if ( get_option( 'solopine_transfer_check7' ) != 'completed' ) {
  
		$get_old_mods = get_theme_mods();
		foreach($get_old_mods as $old_mod => $mod_value) {
			if(substr( $old_mod, 0, 3 ) === "sp_") {
				
				$new_mod = str_replace('sp_', 'solopine_', $old_mod);
				
				if(!get_theme_mod($new_mod)) {
					set_theme_mod($new_mod, $mod_value);
				}
				
			}
		}
		
		if(get_theme_mod('sp_custom_css')) {
			$new_css = wp_get_custom_css();
			$old_css = get_theme_mod('sp_custom_css');
			$new_css .= $old_css;
			wp_update_custom_css_post($new_css);
		}
		
        update_option( 'solopine_transfer_check7', 'completed' );
    }
}
}
add_action( 'admin_init', 'solopine_transfer_settings' );