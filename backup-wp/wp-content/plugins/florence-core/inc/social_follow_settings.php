<?php
// Add section
$wp_customize->add_section( 'solopine_new_section_social' , array(
	'title'      => esc_html__('Social Media Settings', 'florence-core'),
	'description'=> esc_html__('Enter your social media usernames. Icons will not show if left blank.', 'florence-core'),
	'priority'   => 96,
) );

// Add Settings
$wp_customize->add_setting(
	'solopine_facebook',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_twitter',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_instagram',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_pinterest',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_tumblr',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_bloglovin',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_tumblr',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_youtube',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_dribbble',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_soundcloud',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_vimeo',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_linkedin',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_snapchat',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_email',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);
$wp_customize->add_setting(
	'solopine_rss',
	array(
		'default'     => '',
		'sanitize_callback'     => 'wp_kses_post'
	)
);

// Add Control
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'facebook',
		array(
			'label'      => esc_html__('Facebook', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_facebook',
			'type'		 => 'text',
			'priority'	 => 1
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'twitter',
		array(
			'label'      => esc_html__('Twitter', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_twitter',
			'type'		 => 'text',
			'priority'	 => 2
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'instagram',
		array(
			'label'      => esc_html__('Instagram', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_instagram',
			'type'		 => 'text',
			'priority'	 => 3
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'pinterest',
		array(
			'label'      => esc_html__('Pinterest', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_pinterest',
			'type'		 => 'text',
			'priority'	 => 4
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'bloglovin',
		array(
			'label'      => esc_html__('Bloglovin', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_bloglovin',
			'type'		 => 'text',
			'priority'	 => 5
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'tumblr',
		array(
			'label'      => esc_html__('Tumblr', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_tumblr',
			'type'		 => 'text',
			'priority'	 => 7
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'youtube',
		array(
			'label'      => esc_html__('Youtube', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_youtube',
			'type'		 => 'text',
			'priority'	 => 8
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'dribbble',
		array(
			'label'      => esc_html__('Dribbble', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_dribbble',
			'type'		 => 'text',
			'priority'	 => 9
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'soundcloud',
		array(
			'label'      => esc_html__('Soundcloud', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_soundcloud',
			'type'		 => 'text',
			'priority'	 => 10
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'vimeo',
		array(
			'label'      => esc_html__('Vimeo', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_vimeo',
			'type'		 => 'text',
			'priority'	 => 11
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'linkedin',
		array(
			'label'      => esc_html__('Linkedin (Use full URL to your linkedin profile)', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_linkedin',
			'type'		 => 'text',
			'priority'	 => 12
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'snapchat',
		array(
			'label'      => esc_html__('Snapchat', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_snapchat',
			'type'		 => 'text',
			'priority'	 => 13
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'email',
		array(
			'label'      => esc_html__( 'E-mail Address', 'florence-core' ),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_email',
			'type'		 => 'text',
			'priority'	 => 14
		)
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'rss',
		array(
			'label'      => esc_html__('RSS Link', 'florence-core'),
			'section'    => 'solopine_new_section_social',
			'settings'   => 'solopine_rss',
			'type'		 => 'text',
			'priority'	 => 15
		)
	)
);