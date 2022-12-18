<?php
if (! function_exists('walker_charity_contact_options_register')) {
	function walker_charity_contact_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_conatct_options', 
		 	array(
		        'title' => esc_html__('Contact Section', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 12,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'conatct_section_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'conatct_section_status', 
			array(
			  'label'   => esc_html__( 'Enable Contact Section', 'walker-charity' ),
			  'section' => 'walker_charity_conatct_options',
			  'settings' => 'conatct_section_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting('contact_section_map_bg_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walker_charity_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'contact_section_map_bg_image', array(
	        'label'             => esc_html__('Background Image', 'walker-charity'),
	        'description'		=> '',
	        'section'           => 'walker_charity_conatct_options',
	        'settings'          => 'contact_section_map_bg_image',
	        'active_callback' => function(){
	            return get_theme_mod( 'conatct_section_status', true );
	        },
	    )));
		$wp_customize->add_setting( 'contact_section_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'contact_section_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => esc_html__( 'Contact Information','walker-charity' ),
				'description' => esc_html__( 'Heading','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_section_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'contact_section_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__( 'Description','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_section_address', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'contact_section_address', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__( 'Address','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_section_address_link', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_url'
			) 
		);

		$wp_customize->add_control( 'contact_section_address_link', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__( 'Address link - google link','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_section_phone', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'contact_section_phone', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__( 'Phone','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_section_email', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'contact_section_email', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__( 'Email','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_section_office_hour', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'contact_section_office_hour', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__( 'Office Hours','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'contact_form_title_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'contact_form_title_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => esc_html__( 'Form','walker-charity' ),
				'description' => esc_html__( 'Form Heading','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		
		$wp_customize->add_setting( 'conatct_section_form_shortcode', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'conatct_section_form_shortcode', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_conatct_options',
				'label' => '',
				'description' => esc_html__('Shortcode of conatct form 7 for contact form','walker-charity'),
				'active_callback' => function(){
				    return get_theme_mod( 'conatct_section_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'walker_charity_contact_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_contact_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_conatct_options',
				'settings' => 'walker_charity_contact_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'conatct_section_status', true );
		        },
			) 
		);
		$wp_customize->add_setting( 'walker_charity_contact_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 0,
			) 
		);

		$wp_customize->add_control( 'walker_charity_contact_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_conatct_options',
				'settings' => 'walker_charity_contact_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'conatct_section_status', true );
		        },
			) 
		);
	}
}
add_action( 'customize_register', 'walker_charity_contact_options_register' );