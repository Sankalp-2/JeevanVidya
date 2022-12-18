<?php
if (! function_exists('walker_charity_single_cta_register')) {
	function walker_charity_single_cta_register( $wp_customize ) {

		$wp_customize->add_section('walker_charity_single_cta_settings', 
		 	array(
		        'title' => esc_html__('Single CTA', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 9,
	    	)
		 );
		$wp_customize->add_setting( 'walker_charity_single_cta_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'walker_charity_single_cta_status', 
			array(
			  'label'   => esc_html__( 'Display Single CTA', 'walker-charity' ),
			  'section' => 'walker_charity_single_cta_settings',
			  'settings' => 'walker_charity_single_cta_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);
		$wp_customize->selective_refresh->add_partial( 'walker_charity_single_cta_status', array(
            'selector' => '.cta-wraper h1.section-heading',
        ) );
        if(walker_charity_set_to_premium()){
	        $wp_customize->add_setting( 
		        'walker_charity_single_cta_layout', 
		        array(
		            'default'           => 'walker-charity-single-cta-layout-full',
		            'sanitize_callback' => 'walker_charity_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'walker_charity_single_cta_layout',
					array(
						'section'	  => 'walker_charity_single_cta_settings',
						'label'		  => esc_html__( 'Choose Section Layout', 'walker-charity' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => array(
							'walker-charity-single-cta-layout-full'    => esc_html__('Full Width Layout','walker-charity'),
							'walker-charity-single-cta-layout-box'  => esc_html__('Box Layout','walker-charity'),
						),
						'priority' => 1,
						'active_callback' => function(){
				            return get_theme_mod( 'walker_charity_single_cta_status', true );
				        },
					)
				)
			);
		}
		$wp_customize->add_setting( 'single_cta_bg_color', 
			array(
		        'default'        => '#0d1741',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'single_cta_bg_color', 
			array(
		        'label'   => esc_html__( 'Section Color & Settings', 'walker-charity' ),
		        'description' => esc_html__('Background Color','walker-charity'),
		        'section' => 'walker_charity_single_cta_settings',
		        'settings'   => 'single_cta_bg_color',
		        'priority' => 21,
		        'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
		    ) ) 
		);
		$wp_customize->add_setting('single_cta_bg_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walker_charity_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_cta_bg_image', array(
	    	'label' => '',
	        'description'             => esc_html__('Background Image', 'walker-charity'),
	        'section'           => 'walker_charity_single_cta_settings',
	        'settings'          => 'single_cta_bg_image',
	        'priority' 			=> 22,
	        'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_single_cta_status', true );
	        },
	    )));
	    $wp_customize->add_setting( 'single_cta_text_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'single_cta_text_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Color', 'walker-charity' ),
		        'section' => 'walker_charity_single_cta_settings',
		        'settings'   => 'single_cta_text_color',
		        'priority' => 23,
		        'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
		    ) ) 
		);
		$wp_customize->add_setting( 'single_cta_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'single_cta_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_single_cta_settings',
				'label' => esc_html__( 'Sub Text','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
			)
		);
	     $wp_customize->add_setting( 'single_cta_message_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'single_cta_message_text', 
			array(
				'type' => 'textarea',
				'section' => 'walker_charity_single_cta_settings',
				'label' => esc_html__( 'Text','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
			)
		);
	    
	    $wp_customize->add_setting( 'single_cta_btn_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);

		$wp_customize->add_control( 'single_cta_btn_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_single_cta_settings',
				'label' => esc_html__( 'Button','walker-charity' ),
				'description' => esc_html__('Button Label','walker-charity'),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'single_cta_btn_url', 
			array(
				'default' => '',
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'single_cta_btn_url', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_single_cta_settings',
		        'settings' => 'single_cta_btn_url',
		        'type'=> 'url',
		        'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
	    	) 
	    );
	    $wp_customize->add_setting( 'single_cta_btn_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'single_cta_btn_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_single_cta_settings',
			  'settings' => 'single_cta_btn_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
			)

		);
		$wp_customize->add_setting( 'walker_charity_single_cta_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_single_cta_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_single_cta_settings',
				'settings' => 'walker_charity_single_cta_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
			) 
		);
		$wp_customize->add_setting( 'walker_charity_single_cta_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_single_cta_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_single_cta_settings',
				'settings' => 'walker_charity_single_cta_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_single_cta_status', true );
		        },
			) 
		);
		
	}
}
add_action( 'customize_register', 'walker_charity_single_cta_register' );