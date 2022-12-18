<?php if (! function_exists('walker_charity_donation_options_register')) {
	function walker_charity_donation_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_donation_options', 
		 	array(
		        'title' => esc_html__('Donation Cause', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'donation_section_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'donation_section_status', 
			array(
			  'label'   => esc_html__( 'Enable Donation Section', 'walker-charity' ),
			  'section' => 'walker_charity_donation_options',
			  'settings' => 'donation_section_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'walker_charity_donation_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 60,
			) 
		);

		$wp_customize->add_control( 'walker_charity_donation_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_donation_options',
				'settings' => 'walker_charity_donation_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'donation_section_status', true );
		        },
			) 
		);
		$wp_customize->add_setting( 'walker_charity_donation_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 80,
			) 
		);

		$wp_customize->add_control( 'walker_charity_donation_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_donation_options',
				'settings' => 'walker_charity_donation_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'donation_section_status', true );
		        },
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'donation_section_status', array(
            'selector' => '.recentblog-wraper h2.section-heading',
        ) );
		$wp_customize->add_setting( 'donation_section_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'donation_section_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_donation_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'donation_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'donation_section_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'donation_section_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_donation_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'donation_section_status', true );
				},
			)
		);

	    $wp_customize->add_setting( 'walker_charity_donation_page', array(
		        'default' => '',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' =>'walker_charity_sanitize_text'
		        ));
		$wp_customize->add_control(
				new walker_charity_Dropdown_Pages_Control($wp_customize, 
				'walker_charity_donation_page',
			    	array(
						'label'    => esc_html__( 'Select Parent Page', 'walker-charity' ),
						'description' => '',
						'section'  => 'walker_charity_donation_options',
						'type'     => 'dropdown-pages',
						'settings' => 'walker_charity_donation_page',
						'active_callback' => function(){
							return get_theme_mod( 'donation_section_status', true );
						},
			    	) 
		    	)
		   );	


		$wp_customize->add_setting( 
	        'donation_section_layout', 
	        array(
	            'default'           => 'donation-carousel-layout',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_setting( 'donations_total_items', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '3',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
			) 
		);
		$wp_customize->add_control( 'donations_total_items', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_donation_options',
				'label' => esc_html__( 'Total Items to Show','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'donation_section_status', true );
				},
			)
		);
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'donation_section_layout',
				array(
					'section'	  => 'walker_charity_donation_options',
					'label'		  => esc_html__( 'Choose Section Layout', 'walker-charity' ),
					'description' => '',
					'type'           => 'select',
					'choices'	  => array(
						'donation-carousel-layout'    => esc_html__('Carousel Layout','walker-charity'),
						'donation-grid-layout'  => esc_html__('Grid Layout','walker-charity'),
					),
					'active_callback' => function(){
							return get_theme_mod( 'donation_section_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting( 'donation_button_label', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'donation_button_label', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_donation_options',
				'label' => esc_html__( 'Button','walker-charity' ),
				'description' => esc_html__( 'Button Label','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'donation_section_status', true );
				},
				'priority'    => 12,
			)
		);
		$wp_customize->add_setting( 'donation_button_url', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_url',
			) 
		);
		$wp_customize->add_control( 'donation_button_url', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_donation_options',
				'label' => '',
				'description' => esc_html__( 'Button Link','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'donation_section_status', true );
				},
				'priority'    => 12,
			)
		);
		$wp_customize->add_setting( 'donation_button_link_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'donation_button_link_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_donation_options',
			  'settings' => 'donation_button_link_target',
			  'type'    => 'checkbox',
			)
		);
	}
	function walker_charity_donation_type(){
		$current_source_status = get_theme_mod( 'donation_section_status');
        $choice_source_type= get_theme_mod( 'donation_source_type' );
		$donation_source_display_type = false;
		if($current_source_status == true && $choice_source_type == 'donation-type-mannual'){
			$donation_source_display_type = true;
		}
		return $donation_source_display_type;
    }
	
}
add_action( 'customize_register', 'walker_charity_donation_options_register' );