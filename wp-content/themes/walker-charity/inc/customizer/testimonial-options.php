<?php
add_action( 'customize_register', 'walker_charity_testimonial_register' );
	function walker_charity_testimonial_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_testimonial_options', 
		 	array(
		        'title' => esc_html__('Testimonial', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 4,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'testimonial_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'testimonial_status', 
			array(
			  'label'   => esc_html__( 'Enable Testimonial', 'walker-charity' ),
			  'section' => 'walker_charity_testimonial_options',
			  'settings' => 'testimonial_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);
		$wp_customize->add_setting('testimonial_bg_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walker_charity_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_bg_image', array(
	    	'label' => '',
	        'description'             => esc_html__('Background Image', 'walker-charity'),
	        'section'           => 'walker_charity_testimonial_options',
	        'settings'          => 'testimonial_bg_image',
	        'priority' 			=> 22,
	        'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_single_cta_status', true );
	        },
	    )));

		$wp_customize->selective_refresh->add_partial( 'testimonial_status', array(
            'selector' => '.testimonial-wraper h1.section-heading',
        ) );
        $wp_customize->add_setting( 'walker_charity_testimonial_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 60,
			) 
		);

		$wp_customize->add_control( 'walker_charity_testimonial_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_testimonial_options',
				'settings' => 'walker_charity_testimonial_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'testimonial_status', true );
		        },
			) 
		);
		$wp_customize->add_setting( 'walker_charity_testimonial_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 80,
			) 
		);

		$wp_customize->add_control( 'walker_charity_testimonial_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_testimonial_options',
				'settings' => 'walker_charity_testimonial_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'testimonial_status', true );
		        },
			) 
		);
        $wp_customize->add_setting( 'testimonials_total_items', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
			) 
		);
		$wp_customize->add_control( 'testimonials_total_items', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_testimonial_options',
				'label' => esc_html__( 'Total Testimonials to Show','walker-charity' ),
				'description' => '',
				 'priority' => 2,
				'active_callback' => function(){
				    return get_theme_mod( 'testimonial_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'testimonial_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		
		$wp_customize->add_control( 'testimonial_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_testimonial_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'testimonial_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'testimonial_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'testimonial_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_testimonial_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'testimonial_status', true );
				},
			)
		);
		if(!walker_charity_set_to_premium()){
			$wp_customize->add_setting('walker_charity_testimonial_category',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'walker_charity_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new walker_charity_Dropdown_Taxonomies_Control($wp_customize, 
				'walker_charity_testimonial_category',
				    array(
				        'label'       => esc_html__('Select Category', 'walker-charity'),
				        'description' => '',
				        'section'     => 'walker_charity_testimonial_options',
				        'type'        => 'dropdown-taxonomies',
				        'settings'	  => 'walker_charity_testimonial_category',
				        'taxonomy'    => 'category',
				        'priority'    => 20,
				        'active_callback' => function(){
								return get_theme_mod( 'testimonial_status', true );
						},
			    	)
				)
			);
		}
		if( walker_charity_set_to_premium() ){
			$wp_customize->add_setting( 
		        'walker_charity_testimonial_layout', 
		        array(
		            'default'           => 'testimonial-layout-1',
		            'sanitize_callback' => 'walker_charity_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'walker_charity_testimonial_layout',
					array(
						'section'	  => 'walker_charity_testimonial_options',
						'label'		  => __( 'Choose Testimonial Layout', 'walker-charity' ),
						'description' => '',
						'type'        => 'select',
						'priority'	  => 2,
						'choices'	  => array(
							'testimonial-layout-1'    => __('Layout 1','walker-charity'),
							'testimonial-layout-2'  => __('Layout 2','walker-charity'),
						),
						'active_callback' => function(){
					    	return get_theme_mod( 'testimonial_status', true );
						},
					)
				)
			);
			/*testimonial listing Page*/
		$wp_customize->add_section('walker_charity_testimonial_list_options', 
		 	array(
		        'title' => esc_html__('Testimonial Page Setting', 'walker-charity'),
		        'panel' =>'walker_charity_theme_option',
		        'priority' => 109,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'testimonial_page_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'testimonial_page_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_testimonial_list_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				 'priority' => 2,
			)
		);
		$wp_customize->add_setting( 'testimonial_page_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'testimonial_page_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_testimonial_list_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'priority' => 3,
				
			)
		);
		}
	}