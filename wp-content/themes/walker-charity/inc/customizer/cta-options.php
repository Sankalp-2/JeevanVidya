<?php
add_action( 'customize_register', 'walker_charity_cta_register' );
function walker_charity_cta_register( $wp_customize ) {

	$wp_customize->add_section('walker_charity_cta_settings', 
	 	array(
	        'title' => esc_html__('Featured CTA', 'walker-charity'),
	        'panel' =>'walker_charity_frontpage_option',
	        'priority' => 2,
    	)
	 );
	$wp_customize->add_setting( 'walker_charity_cta_status', 
    	array(
	      'default'  =>  false,
	      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
	  	)
    );
	$wp_customize->add_control( 'walker_charity_cta_status', 
		array(
		  'label'   => esc_html__( 'Display Featured CTA', 'walker-charity' ),
		  'section' => 'walker_charity_cta_settings',
		  'settings' => 'walker_charity_cta_status',
		  'type'    => 'checkbox',
		  'priority' => 1
		)
	);
	$wp_customize->add_setting( 
	        'walker_featured_cta_layout', 
	        array(
	            'default'           => 'features-cta-2',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'walker_featured_cta_layout',
				array(
					'section'	  => 'walker_charity_cta_settings',
					'label'		  => esc_html__( 'Choose Section Layout', 'walker-charity' ),
					'description' => '',
					'type'        => 'select',
					'priority'	  => 2,
					'choices'	  => array(
						'features-cta-1' => esc_html__('Layout 1','walker-charity'),
						'features-cta-2' => esc_html__('Layout 2','walker-charity'),
					),
					'active_callback' => function(){
				    	return get_theme_mod( 'walker_charity_cta_status', true );
					},
					'priority' => 1,
				)
			)
		);
	$wp_customize->add_setting( 'extra_cta_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

	$wp_customize->add_control( 'extra_cta_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'label' => esc_html__( 'Section Heading','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
	);
	     $wp_customize->add_setting( 'extra_cta_message_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_message_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'label' => esc_html__( 'Section Description','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		/*CTA 1*/
		$wp_customize->add_setting('extra_cta_icon_1', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walker_charity_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'extra_cta_icon_1', array(
	        'label'             => esc_html__('CTA 1', 'walker-charity'),
	        'description'		=> esc_html__('Icon Image','walker-charity'),
	        'section'           => 'walker_charity_cta_settings',
	        'settings'          => 'extra_cta_icon_1',
	        'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
	    )));
	    $wp_customize->add_setting( 'extra_cta_title_1', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_title_1', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'title' => '',
				'description' => esc_html__( 'Title','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_desc_1', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_desc_1', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'label' => '',
				'description' => esc_html__('Description','walker-charity'),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_more_text_1', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_more_text_1', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'title' => '',
				'description' => esc_html__( 'Read More Text','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_link_1',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'extra_cta_link_1', 
            array(
              'label'   => '',
              'description' => esc_html__( 'Link', 'walker-charity' ),
              'section' => 'walker_charity_cta_settings',
              'settings'   => 'extra_cta_link_1',
              'type'     => 'text',
              'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
          )
        );
        $wp_customize->add_setting( 'extra_cta_link_target_1', 
    	array(
	      'default'  =>  false,
	      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
	  	)
	    );
		$wp_customize->add_control( 'extra_cta_link_target_1', 
			array(
			  'label' => esc_html__( 'Open In New Tab', 'walker-charity' ),
			  'description'   => '',
			  'section' => 'walker_charity_cta_settings',
			  'settings' => 'extra_cta_link_target_1',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
			  
			)
		);
        /*CTA 2*/
		$wp_customize->add_setting('extra_cta_icon_2', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walker_charity_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'extra_cta_icon_2', array(
	        'label'             => esc_html__('CTA 2', 'walker-charity'),
	        'description'		=> esc_html__('Icon Image','walker-charity'),
	        'section'           => 'walker_charity_cta_settings',
	        'settings'          => 'extra_cta_icon_2',
	        'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
	    )));
	    $wp_customize->add_setting( 'extra_cta_title_2', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_title_2', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'title' => '',
				'description' => esc_html__( 'Title','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_desc_2', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_desc_2', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'label' => '',
				'description' => esc_html__('Description','walker-charity'),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_more_text_2', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_more_text_2', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'title' => '',
				'description' => esc_html__( 'Read More Text','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_link_2',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'extra_cta_link_2', 
            array(
              'label'   => '',
              'description' => esc_html__( 'Link', 'walker-charity' ),
              'section' => 'walker_charity_cta_settings',
              'settings'   => 'extra_cta_link_2',
              'type'     => 'text',
              'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
          )
        );
        $wp_customize->add_setting( 'extra_cta_link_target_2', 
    	array(
	      'default'  =>  false,
	      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
	  	)
	    );
		$wp_customize->add_control( 'extra_cta_link_target_2', 
			array(
			  'label' => esc_html__( 'Open In New Tab', 'walker-charity' ),
			  'description'   => '',
			  'section' => 'walker_charity_cta_settings',
			  'settings' => 'extra_cta_link_target_2',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
			  
			)
		);
        /*CTA 3*/
		$wp_customize->add_setting('extra_cta_icon_3', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walker_charity_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'extra_cta_icon_3', array(
	        'label'             => esc_html__('CTA 3', 'walker-charity'),
	        'description'		=> esc_html__('Icon Image','walker-charity'),
	        'section'           => 'walker_charity_cta_settings',
	        'settings'          => 'extra_cta_icon_3',
	        'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
	    )));
	    $wp_customize->add_setting( 'extra_cta_title_3', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_title_3', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'title' => '',
				'description' => esc_html__( 'Title','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_desc_3', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_desc_3', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'label' => '',
				'description' => esc_html__('Description','walker-charity'),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_more_text_3', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'extra_cta_more_text_3', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_cta_settings',
				'title' => '',
				'description' => esc_html__( 'Read More Text','walker-charity' ),
				'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'extra_cta_link_3',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'extra_cta_link_3', 
            array(
              'label'   => '',
              'description' => esc_html__( 'Link', 'walker-charity' ),
              'section' => 'walker_charity_cta_settings',
              'settings'   => 'extra_cta_link_3',
              'type'     => 'text',
              'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
          )
        );
        $wp_customize->add_setting( 'extra_cta_link_target_3', 
    	array(
	      'default'  =>  false,
	      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
	  	)
	    );
		$wp_customize->add_control( 'extra_cta_link_target_3', 
			array(
			  'label' => esc_html__( 'Open In New Tab', 'walker-charity' ),
			  'description'   => '',
			  'section' => 'walker_charity_cta_settings',
			  'settings' => 'extra_cta_link_target_3',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
	            return get_theme_mod( 'walker_charity_cta_status', true );
	        },
			  
			)
		);
       
		$wp_customize->add_setting( 'walker_charity_cta_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 60,
			) 
		);

		$wp_customize->add_control( 'walker_charity_cta_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_cta_settings',
				'settings' => 'walker_charity_cta_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			) 
		);
		$wp_customize->add_setting( 'walker_charity_cta_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 80,
			) 
		);

		$wp_customize->add_control( 'walker_charity_cta_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_cta_settings',
				'settings' => 'walker_charity_cta_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'walker_charity_cta_status', true );
		        },
			) 
		);
}
?>