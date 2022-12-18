<?php
if (! function_exists('walker_charity_counter_options_register')) {
	function walker_charity_counter_options_register( $wp_customize ) {
	        $wp_customize->add_section(
	        'walker_charity_counter_section',
		        array(
		            'title'    => esc_html__( 'Counter Section', 'walker-charity' ),
		            'panel'    => 'walker_charity_frontpage_option',
		            'priority' => 6,
		        )
		    );

	        $wp_customize->add_setting( 'counter_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
		    );
			$wp_customize->add_control( 'counter_status', 
				array(
				  'label'   => esc_html__( 'Enable Counter Section', 'walker-charity' ),
				  'section' => 'walker_charity_counter_section',
				  'settings' => 'counter_status',
				  'type'    => 'checkbox',
				  'priority' => 1,
				)
			);
	        $wp_customize->add_setting( 'walker_charity_counter_bg_color', 
				array(
			        'default'        => '#f2fbfc',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
				) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_counter_bg_color', 
				array(
			        'label'   => esc_html__( 'Section Color & Settings', 'walker-charity' ),
			        'description' => esc_html__('Background Color','walker-charity'),
			        'section' => 'walker_charity_counter_section',
			        'settings'   => 'walker_charity_counter_bg_color',
			        'active_callback' => function(){
				    	return get_theme_mod( 'counter_status', true );
					},
			        'priority'	  => 21,
			    ) ) 
			);
			$wp_customize->add_setting( 'walker_charity_counter_heading_color', 
				array(
			        'default'        => '#000000',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
				) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_counter_heading_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Heading Color', 'walker-charity' ),
			        'section' => 'walker_charity_counter_section',
			        'settings'   => 'walker_charity_counter_heading_color',
			        'active_callback' => function(){
				    	return get_theme_mod( 'counter_status', true );
					},
			        'priority'	  => 22,
			    ) ) 
			);
			$wp_customize->add_setting( 'walker_charity_counter_text_color', 
				array(
			        'default'        => '#727272',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
				) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_counter_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'walker-charity' ),
			        'section' => 'walker_charity_counter_section',
			        'settings'   => 'walker_charity_counter_text_color',
			        'active_callback' => function(){
				    	return get_theme_mod( 'counter_status', true );
					},
			        'priority'	  => 22,
			    ) ) 
			);

	        
	        
			$wp_customize->add_setting( 'counter_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);

		$wp_customize->add_control( 'counter_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_counter_section',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'counter_status', true );
				},
				'priority' => 1,
			)
		);
		$wp_customize->add_setting( 'counter_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'counter_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_counter_section',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'counter_status', true );
				},
				'priority' => 1,
			)
		);
	        
			$wp_customize->add_setting( 'walker_counter_number', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_number_absint'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_number', 
				array(
					'label'   => esc_html__( 'Counter 1', 'walker-charity' ),
					'description' => esc_html__( 'Number', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_number',
					'priority' => 6,
					'type'    => 'number',
					'active_callback' => function(){
				    return get_theme_mod( 'counter_status', true );
				},
				)
			);
			$wp_customize->add_setting( 'walker_counter_text', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_text'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_text', 
				array(
					'label'   => '',
					'description' => esc_html__( 'Text', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_text',
					'priority' => 7,
					'type'    => 'text',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
			$wp_customize->add_setting( 'walker_counter_number_2', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_number_absint'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_number_2', 
				array(
					'label'   => esc_html__( 'Counter 2', 'walker-charity' ),
					'description' => esc_html__( 'Number', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_number_2',
					'priority' => 8,
					'type'    => 'number',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
			$wp_customize->add_setting( 'walker_counter_text_2', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_text'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_text_2', 
				array(
					'label'   => '',
					'description' => esc_html__( 'Text', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_text_2',
					'priority' => 9,
					'type'    => 'text',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
			$wp_customize->add_setting( 'walker_counter_number_3', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_number_absint'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_number_3', 
				array(
					'label'   => esc_html__( 'Counter 3', 'walker-charity' ),
					'description' => esc_html__( 'Number', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_number_3',
					'priority' => 10,
					'type'    => 'number',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
			$wp_customize->add_setting( 'walker_counter_text_3', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_text'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_text_3', 
				array(
					'label'   => '',
					'description' =>esc_html__( 'Text', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_text_3',
					'priority' => 11,
					'type'    => 'text',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
			$wp_customize->add_setting( 'walker_counter_number_4', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_number_absint'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_number_4', 
				array(
					'label'   => esc_html__( 'Counter 4', 'walker-charity' ),
					'description' => esc_html__( 'Number', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_number_4',
					'priority' => 12,
					'type'    => 'number',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
			$wp_customize->add_setting( 'walker_counter_text_4', 
		    	array(
			      'default'  =>  '',
			      'sanitize_callback' => 'walker_charity_sanitize_text'
			  	)
		    );
			$wp_customize->add_control( 'walker_counter_text_4', 
				array(
					'label'   => '',
					'description' =>esc_html__( 'Text', 'walker-charity' ),
					'section' => 'walker_charity_counter_section',
					'settings' => 'walker_counter_text_4',
					'priority' => 12,
					'type'    => 'text',
					'active_callback' => function(){
					    return get_theme_mod( 'counter_status', true );
					},
				)
			);
		$wp_customize->add_setting( 'walker_charity_counter_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 10,
			) 
		);

		$wp_customize->add_control( 'walker_charity_counter_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_counter_section',
				'settings' => 'walker_charity_counter_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'counter_status', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_counter_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_counter_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_counter_section',
				'settings' => 'walker_charity_counter_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'counter_status', true );
				},
			) 
		);
	}
}
add_action( 'customize_register', 'walker_charity_counter_options_register' );