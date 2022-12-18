<?php
/**
*Features customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_features_options_register')) {
	function walker_charity_features_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_feature_options', 
		 	array(
		        'title' => esc_html__('Features', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 4,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'features_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'features_status', 
			array(
			  'label'   => esc_html__( 'Enable Features', 'walker-charity' ),
			  'section' => 'walker_charity_feature_options',
			  'settings' => 'features_status',
			  'type'    => 'checkbox',
			   'priority' => 1,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'features_status', array(
            'selector' => '.features-wraper .features-list',
        ) );
		$wp_customize->add_setting( 'walker_charity_feature_page', array(
		        'default' => '',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' =>'walker_charity_sanitize_text'
		        ));
		    $wp_customize->add_control(
				new walker_charity_Dropdown_Pages_Control($wp_customize, 
				'walker_charity_feature_page',
			    	array(
						'label'    => esc_html__( 'Select Parent Page', 'walker-charity' ),
						'description' => '',
						'section'  => 'walker_charity_feature_options',
						'type'     => 'dropdown-pages',
						'settings' => 'walker_charity_feature_page',
						'active_callback' => function(){
						    return get_theme_mod( 'features_status', true );
						},
						'priority' => 1,
			    	) 
		    	)
		    );	
		$wp_customize->add_setting( 
	        'walker_features_layout', 
	        array(
	            'default'           => 'features-layout-1',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'walker_features_layout',
				array(
					'section'	  => 'walker_charity_feature_options',
					'label'		  => esc_html__( 'Choose Section Layout', 'walker-charity' ),
					'description' => '',
					'type'        => 'select',
					'priority'	  => 2,
					'choices'	  => array(
						'features-layout-1' => esc_html__('Layout 1','walker-charity'),
						'features-layout-2' => esc_html__('Layout 2','walker-charity'),
					),
					'active_callback' => function(){
				    	return get_theme_mod( 'features_status', true );
					},
					'priority' => 1,
				)
			)
		);
		
		$wp_customize->add_setting( 'features_bg_color', 
			array(
		        'default'        => '#f2fbfc',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'features_bg_color', 
			array(
		        'label'   => esc_html__( 'Section color & Settings', 'walker-charity' ),
		        'description' => esc_html__('Background Color','walker-charity'),
		        'section' => 'walker_charity_feature_options',
		        'settings'   => 'features_bg_color',
		       

		    ) ) 
		);

	    $wp_customize->add_setting( 'features_heading_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'features_heading_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Heading color', 'walker-charity' ),
		        'section' => 'walker_charity_feature_options',
		        'settings'   => 'features_heading_color',
		        

		    ) ) 
		);
	    $wp_customize->add_setting( 'features_text_color', 
			array(
		        'default'        => '#727272',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'features_text_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text color', 'walker-charity' ),
		        'section' => 'walker_charity_feature_options',
		        'settings'   => 'features_text_color',
		       

		    ) ) 
		);
		$wp_customize->add_setting( 'features_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'features_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_feature_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' =>'',
				 'priority' => 2,
				'active_callback' => function(){
				    return get_theme_mod( 'features_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'feature_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'feature_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_feature_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' =>'',
				'priority' => 3,
				'active_callback' => function(){
				    return get_theme_mod( 'features_status', true );
				},
			)
		);
		
		$wp_customize->add_setting( 'features_viewall_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'features_viewall_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_feature_options',
				'label' => esc_html__( 'View All Button','walker-charity' ),
				'description' =>esc_html__('Button Label','walker-charity'),
				'priority' => 3,
				'active_callback' => function(){
				    return get_theme_mod( 'features_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'features_viewall_btn_link', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'features_viewall_btn_link', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_feature_options',
				'label' => '',
				'description' => esc_html__( 'Button Link','walker-charity' ),
				'priority' => 3,
				'active_callback' => function(){
				    return get_theme_mod( 'features_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'walker_charity_featured_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 60,
			) 
		);

		$wp_customize->add_control( 'walker_charity_featured_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_feature_options',
				'settings' => 'walker_charity_featured_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'features_status', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_featured_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_featured_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_feature_options',
				'settings' => 'walker_charity_featured_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'features_status', true );
				},
			) 
		);
	}
		
}
add_action( 'customize_register', 'walker_charity_features_options_register' );