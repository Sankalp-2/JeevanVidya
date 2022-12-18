<?php
if (! function_exists('walker_charity_about_options_register')) {
	function walker_charity_about_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_about_options', 
		 	array(
		        'title' => esc_html__('About Us', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 3,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'about_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'about_status', 
			array(
			  'label'   => esc_html__( 'Enable About Section', 'walker-charity' ),
			  'section' => 'walker_charity_about_options',
			  'settings' => 'about_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_status', array(
            'selector' => '.about-wraper h5.about-title',
        ) );
		$wp_customize->add_setting( 'about_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',

			) 
		);
		$wp_customize->add_control( 'about_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_about_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'about_status', true );
				},
				'priority' =>2,
			)
		);
	    $wp_customize->add_setting('about_page',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'walker_charity_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new walker_charity_Dropdown_Pages_Control($wp_customize, 
				'about_page',
				    array(
				        'label'       => esc_html__('Select Page', 'walker-charity'),
				        'description' => '',
				        'section'     => 'walker_charity_about_options',
				        'type'        => 'dropdown-pages',
				        'settings'	  => 'about_page',
				        'priority'    => 2,
				        'active_callback' => function(){
								return get_theme_mod( 'about_status', true );
						},
			    	)
				)
			);

	    $wp_customize->add_setting( 'about_readmore_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'about_readmore_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_about_options',
				'label' => esc_html__( 'Button Label','walker-charity' ),
				'description' =>'',
				'active_callback' => function(){
				    return get_theme_mod( 'about_status', true );
				},
				'priority' => 4,
			)
		);
		$wp_customize->add_setting( 'walker_charity_about_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 80,
			) 
		);

		$wp_customize->add_control( 'walker_charity_about_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_about_options',
				'settings' => 'walker_charity_about_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'about_status', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_about_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 70,
			) 
		);

		$wp_customize->add_control( 'walker_charity_about_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_about_options',
				'settings' => 'walker_charity_about_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'about_status', true );
				},
			) 
		);
	}
}
add_action( 'customize_register', 'walker_charity_about_options_register' );