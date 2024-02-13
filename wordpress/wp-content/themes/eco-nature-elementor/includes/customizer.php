<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'eco_nature_elementor_logo_resizer',
		'label'       => esc_html__( 'Adjust Logo Size', 'eco-nature-elementor' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'eco_nature_elementor_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'eco-nature-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'eco-nature-elementor' ),
			'off' => esc_html__( 'Disable', 'eco-nature-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'eco_nature_elementor_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'eco-nature-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'eco-nature-elementor' ),
			'off' => esc_html__( 'Disable', 'eco-nature-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'eco_nature_elementor_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'eco-nature-elementor' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'eco_nature_elementor_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_h1_typography_heading',
		'section'     => 'eco_nature_elementor_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_h1_typography_font',
		'section'   =>  'eco_nature_elementor_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h1',
				'suffix' => '!important'
			],
		],
	) );


	//Heading 2 Section

	Kirki::add_section( 'eco_nature_elementor_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_h2_typography_heading',
		'section'     => 'eco_nature_elementor_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_h2_typography_font',
		'section'   =>  'eco_nature_elementor_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'eco_nature_elementor_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_h3_typography_heading',
		'section'     => 'eco_nature_elementor_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_h3_typography_font',
		'section'   =>  'eco_nature_elementor_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'eco_nature_elementor_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_h4_typography_heading',
		'section'     => 'eco_nature_elementor_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_h4_typography_font',
		'section'   =>  'eco_nature_elementor_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'eco_nature_elementor_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_h5_typography_heading',
		'section'     => 'eco_nature_elementor_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_h5_typography_font',
		'section'   =>  'eco_nature_elementor_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'eco_nature_elementor_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_h6_typography_heading',
		'section'     => 'eco_nature_elementor_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_h6_typography_font',
		'section'   =>  'eco_nature_elementor_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'eco_nature_elementor_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_body_typography_heading',
		'section'     => 'eco_nature_elementor_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'eco_nature_elementor_body_typography_font',
		'section'   =>  'eco_nature_elementor_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Manrope',
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	// Theme Options Panel
	Kirki::add_panel( 'eco_nature_elementor_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'eco-nature-elementor' ),
	) );

	//ADDITIONAL SETTINGS

	Kirki::add_section( 'eco_nature_elementor_additional_setting', array(
	    'title'          => esc_html__( 'Additional Settings', 'eco-nature-elementor' ),
	    'description'    => esc_html__( 'Additional Settings of themes', 'eco-nature-elementor' ),
	    'panel'    => 'eco_nature_elementor_theme_options_panel',
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_single_page_layout_heading',
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'eco_nature_elementor_single_page_layout',
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'eco-nature-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'eco-nature-elementor' ),
			'One Column' => esc_html__( 'One Column', 'eco-nature-elementor' ),
		],
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_header_background_attachment_heading',
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'eco_nature_elementor_header_background_attachment',
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'eco-nature-elementor' ),
			'fixed' => esc_html__( 'Fixed', 'eco-nature-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_header_overlay_heading',
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_header_overlay_setting',
		'label'       => __( 'Overlay Color', 'eco-nature-elementor' ),
		'type'        => 'color',
		'section'     => 'eco_nature_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000066',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );
	
	// HEADER SECTION

	Kirki::add_section( 'eco_nature_elementor_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'eco-nature-elementor' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'eco-nature-elementor' ),
	    'panel'    => 'eco_nature_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'eco_nature_elementor_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => 0,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'eco-nature-elementor'),
			'off' => esc_html__( 'Disable', 'eco-nature-elementor'),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_menu_size_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_menu_size',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'eco-nature-elementor' ),
		'type'        => 'text',
		'section'     => 'eco_nature_elementor_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_menu_text_transform_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'eco_nature_elementor_menu_text_transform',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => 'uppercase',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'eco-nature-elementor' ),
			'uppercase' => esc_html__( 'Uppercase', 'eco-nature-elementor' ),
			'lowercase' => esc_html__( 'Lowercase', 'eco-nature-elementor' ),
			'capitalize' => esc_html__( 'Capitalize', 'eco-nature-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_menu_color',
		'label'       => __( 'Menu Color', 'eco-nature-elementor' ),
		'type'        => 'color',
		'section'     => 'eco_nature_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#fff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_menu_hover_color',
		'label'       => __( 'Menu Hover Color', 'eco-nature-elementor' ),
		'type'        => 'color',
		'default'     => '#e0f50a',
		'section'     => 'eco_nature_elementor_section_header',
		'transport' => 'auto',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a:hover', '#main-menu ul li a:hover', '#main-menu li:hover > a','#main-menu a:focus','#main-menu li.focus > a','#main-menu ul li.current-menu-item > a','#main-menu ul li.current_page_item > a','#main-menu ul li.current-menu-parent > a','#main-menu ul li.current_page_ancestor > a','#main-menu ul li.current-menu-ancestor > a'),
				'property' => 'color',
			),

		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_submenu_color',
		'label'       => __( 'Submenu Color', 'eco-nature-elementor' ),
		'type'        => 'color',
		'section'     => 'eco_nature_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a', '#main-menu ul.sub-menu li a'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_submenu_hover_color',
		'label'       => __( 'Submenu Hover Color', 'eco-nature-elementor' ),
		'type'        => 'color',
		'section'     => 'eco_nature_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#fff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a:hover', '#main-menu ul.sub-menu li a:hover'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_submenu_hover_background_color',
		'label'       => __( 'Submenu Hover Background Color', 'eco-nature-elementor' ),
		'type'        => 'color',
		'section'     => 'eco_nature_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#558b2f',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a:hover', '#main-menu ul.sub-menu li a:hover'),
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_advertisement_text_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Advertisement Text', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'eco_nature_elementor_header_advertisement_text',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_enable_email_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Email Address', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Email ID', 'eco-nature-elementor' ),
		'settings' => 'eco_nature_elementor_header_email',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
		'sanitize_callback' => 'sanitize_email',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_enable_location_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Location', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Location Address', 'eco-nature-elementor' ),
		'settings' => 'eco_nature_elementor_header_location',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_header_phone_number_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Phone Number', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Text', 'eco-nature-elementor' ),
		'settings' => 'eco_nature_elementor_header_phone_number_text',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Phone Number', 'eco-nature-elementor' ),
		'settings' => 'eco_nature_elementor_header_phone_number',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
		'sanitize_callback' => 'eco_nature_elementor_sanitize_phone_number',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_enable_button_heading',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( ' Header Button', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Button Text', 'eco-nature-elementor' ),
		'settings' => 'eco_nature_elementor_header_button_text',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    =>  esc_html__( 'Button URL', 'eco-nature-elementor' ),
		'settings' => 'eco_nature_elementor_header_button_url',
		'section'  => 'eco_nature_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_enable_socail_link',
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'eco-nature-elementor' ) . '</h3>',
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'eco_nature_elementor_search_enable',
		'label'       => esc_html__( 'Enable/Disable Search', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'eco-nature-elementor' ),
			'off' => esc_html__( 'Disable', 'eco-nature-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'eco_nature_elementor_section_header',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'eco-nature-elementor' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'eco-nature-elementor' ),
		'settings'     => 'eco_nature_elementor_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'eco-nature-elementor' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'eco-nature-elementor' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'eco-nature-elementor' ),
				'description' => esc_html__( 'Add the social icon url here.', 'eco-nature-elementor' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	
	// POST SECTION

	Kirki::add_section( 'eco_nature_elementor_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'eco-nature-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_post_layout_heading',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'eco_nature_elementor_post_layout',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'eco-nature-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'eco-nature-elementor' ),
			'One Column' => esc_html__( 'One Column', 'eco-nature-elementor' ),
			'Three Columns' => esc_html__( 'Three Columns', 'eco-nature-elementor' ),
			'Four Columns' => esc_html__( 'Four Columns', 'eco-nature-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_length_setting_heading',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'eco_nature_elementor_length_setting',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'eco-nature-elementor' ),
		'settings'    => 'eco_nature_elementor_single_post_tag',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'eco-nature-elementor' ),
		'settings'    => 'eco_nature_elementor_single_post_category',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_post_comment_show_hide',
		'label'       => esc_html__( 'Show / Hide Comment Box', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_single_post_radius',
		'section'     => 'eco_nature_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'eco-nature-elementor' ),
		'type'        => 'text',
		'section'     => 'eco_nature_elementor_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'eco_nature_elementor_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'eco-nature-elementor' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'eco-nature-elementor' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'eco-nature-elementor' ),
		'settings'    => 'eco_nature_elementor_shop_page_layout',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'eco-nature-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'eco-nature-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'eco_nature_elementor_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'eco-nature-elementor' ),
		'settings'    => 'eco_nature_elementor_products_per_row',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'eco-nature-elementor' ),
		'settings'    => 'eco_nature_elementor_products_per_page',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'eco_nature_elementor_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'eco-nature-elementor' ),
		'settings'    => 'eco_nature_elementor_single_product_sidebar_layout',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'eco-nature-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'eco-nature-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'eco_nature_elementor_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_products_button_border_radius_heading',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'eco_nature_elementor_products_button_border_radius',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_sale_badge_position_heading',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'eco_nature_elementor_sale_badge_position',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'eco-nature-elementor' ),
			'left' => esc_html__( 'Left', 'eco-nature-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_products_sale_font_size_heading',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'eco_nature_elementor_products_sale_font_size',
		'section'     => 'eco_nature_elementor_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	// No Results Page Settings

	Kirki::add_section( 'eco_nature_elementor_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_page_not_found_title_heading',
		'section'     => 'eco_nature_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'eco_nature_elementor_page_not_found_title',
		'section'  => 'eco_nature_elementor_no_result_section',
		'default'  => esc_html__('404 Error!', 'eco-nature-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_page_not_found_text_heading',
		'section'     => 'eco_nature_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'eco_nature_elementor_page_not_found_text',
		'section'  => 'eco_nature_elementor_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'eco-nature-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'eco_nature_elementor_page_not_found_line_break',
		'section'  => 'eco_nature_elementor_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_no_results_title_heading',
		'section'     => 'eco_nature_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'eco_nature_elementor_no_results_title',
		'section'  => 'eco_nature_elementor_no_result_section',
		'default'  => esc_html__('Nothing Found', 'eco-nature-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_no_results_content_heading',
		'section'     => 'eco_nature_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'eco_nature_elementor_no_results_content',
		'section'  => 'eco_nature_elementor_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'eco-nature-elementor'),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'eco_nature_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'eco-nature-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'eco-nature-elementor' ),
		'panel'    => 'eco_nature_elementor_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_footer_text_heading',
		'section'     => 'eco_nature_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'eco_nature_elementor_footer_text',
		'section'  => 'eco_nature_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_footer_enable_heading',
		'section'     => 'eco_nature_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'eco_nature_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'eco-nature-elementor' ),
			'off' => esc_html__( 'Disable', 'eco-nature-elementor' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_footer_background_widget_heading',
		'section'     => 'eco_nature_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'eco_nature_elementor_footer_background_widget',
		'type'        => 'background',
		'section'     => 'eco_nature_elementor_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_footer__widget_alignment_heading',
		'section'     => 'eco_nature_elementor_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Alignment', 'eco-nature-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'eco_nature_elementor_footer__widget_alignment',
		'section'     => 'eco_nature_elementor_footer_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'eco-nature-elementor' ),
			'right' => esc_html__( 'right', 'eco-nature-elementor' ),
			'left' => esc_html__( 'left', 'eco-nature-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.footer-area',
				'property' => 'text-align',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_footer_copright_color_heading',
		'section'     => 'eco_nature_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'eco_nature_elementor_footer_copright_text_color_heading',
		'section'     => 'eco_nature_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'eco-nature-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'eco_nature_elementor_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'eco-nature-elementor' ),
		'section'     => 'eco_nature_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );
}
