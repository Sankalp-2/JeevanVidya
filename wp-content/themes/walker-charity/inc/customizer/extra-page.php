<?php
if (! function_exists('walker_charity_extra_page_options_register')) {
	function walker_charity_extra_page_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_extra_page_options', 
		 	array(
		        'title' => esc_html__('Extra Pages', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 3,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'extra_page_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'extra_page_status', 
			array(
			  'label'   => esc_html__( 'Enable Extra Pages', 'walker-charity' ),
			  'section' => 'walker_charity_extra_page_options',
			  'settings' => 'extra_page_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'extra_page_status', array(
            'selector' => '.about-wraper h5.about-title',
        ) );
		
	    $wp_customize->add_setting('extra_page_1',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'walker_charity_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new walker_charity_Dropdown_Pages_Control($wp_customize, 
				'extra_page_1',
				    array(
				        'label'       => esc_html__('Page 1', 'walker-charity'),
				        'description' => esc_html__('Select Page', 'walker-charity'),
				        'section'     => 'walker_charity_extra_page_options',
				        'type'        => 'dropdown-pages',
				        'settings'	  => 'extra_page_1',
				        'priority'    => 2,
				        'active_callback' => function(){
								return get_theme_mod( 'extra_page_status', true );
						},
			    	)
				)
			);

	    $wp_customize->add_setting( 'extra_page_button_1', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'extra_page_button_1', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_extra_page_options',
				'label' => '',
				'description' =>esc_html__( 'Button Label','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'extra_page_button_1_link', 
			array(
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'extra_page_button_1_link', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_extra_page_options',
		        'settings' => 'extra_page_button_1_link',
		        'type'=> 'url',
		        'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
	    	) 
	    );
	    $wp_customize->add_setting( 'extra_page_button_1_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'extra_page_button_1_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_extra_page_options',
			  'settings' => 'extra_page_button_1_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
			)
		);


		$wp_customize->add_setting('extra_page_2',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'walker_charity_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new walker_charity_Dropdown_Pages_Control($wp_customize, 
				'extra_page_2',
				    array(
				        'label'       => esc_html__('Page 2', 'walker-charity'),
				        'description' => esc_html__('Select Page', 'walker-charity'),
				        'section'     => 'walker_charity_extra_page_options',
				        'type'        => 'dropdown-pages',
				        'settings'	  => 'extra_page_2',
				        'active_callback' => function(){
								return get_theme_mod( 'extra_page_status', true );
						},
			    	)
				)
			);

	    $wp_customize->add_setting( 'extra_page_button_2', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'extra_page_button_2', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_extra_page_options',
				'label' => '',
				'description' =>esc_html__( 'Button Label','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'extra_page_button_2_link', 
			array(
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'extra_page_button_2_link', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_extra_page_options',
		        'settings' => 'extra_page_button_2_link',
		        'type'=> 'url',
		        'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
	    	) 
	    );
	    $wp_customize->add_setting( 'extra_page_button_2_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'extra_page_button_2_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_extra_page_options',
			  'settings' => 'extra_page_button_2_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
			)
		);

		$wp_customize->add_setting( 'walker_charity_extra_page_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_extra_page_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_extra_page_options',
				'settings' => 'walker_charity_extra_page_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_extra_page_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_extra_page_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_extra_page_options',
				'settings' => 'walker_charity_extra_page_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'extra_page_status', true );
				},
			) 
		);
	}
}
add_action( 'customize_register', 'walker_charity_extra_page_options_register' );