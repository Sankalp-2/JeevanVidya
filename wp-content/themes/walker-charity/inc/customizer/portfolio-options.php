<?php
/**
*Team customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_portfolio_options_register')) {
	function walker_charity_portfolio_options_register( $wp_customize ) {
		
		$wp_customize->add_section('walker_charity_portfolio_options', 
		
		 	array(
		        'title' => esc_html__('Portfolio', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 13,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'portfolio_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'portfolio_status', 
			array(
			  'label'   => esc_html__( 'Enable Portfolio', 'walker-charity' ),
			  'section' => 'walker_charity_portfolio_options',
			  'settings' => 'portfolio_status',
			  'type'    => 'checkbox',
			   'priority' => 1,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_status', array(
            'selector' => '.portfolio-wraper h1.section-heading',
        ) );
		$wp_customize->add_setting( 
	        'walker_charity_portfolio_layout', 
	        array(
	            'default'           => 'carousel-layout',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'walker_charity_portfolio_layout',
				array(
					'section'	  => 'walker_charity_portfolio_options',
					'label'		  => esc_html__( 'Choose Section Layout', 'walker-charity' ),
					'description' => '',
					'type'        => 'select',
					'priority'	  => 2,
					'choices'	  => array(
						'carousel-layout'  => esc_html__('Carousel Layout','walker-charity'),
						'grid-layout'  => esc_html__('Grid Layout','walker-charity'),
					),
					'active_callback' => function(){
				    	return get_theme_mod( 'portfolio_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting( 'enable_portfolio_full_width_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_portfolio_full_width_status', 
			array(
			  'label'   => esc_html__( 'Enable Full Width Layout', 'walker-charity' ),
			  'section' => 'walker_charity_portfolio_options',
			  'settings' => 'enable_portfolio_full_width_status',
			  'type'    => 'checkbox',
			  'priority'	  => 2,
			   'active_callback' => 'walker_charity_portfolio_full_width_check',
			)
		);
		$wp_customize->add_setting( 'portfolio_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'portfolio_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_portfolio_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				 'priority' => 2,
				'active_callback' => function(){
				    return get_theme_mod( 'portfolio_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'portfolio_total_items', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
			) 
		);
		$wp_customize->add_control( 'portfolio_total_items', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_portfolio_options',
				'label' => esc_html__( 'Total Items to Show','walker-charity' ),
				'description' => '',
				 'priority' => 2,
				'active_callback' => function(){
				    return get_theme_mod( 'portfolio_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'portfolio_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'portfolio_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_portfolio_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'priority' => 3,
				'active_callback' => function(){
				    return get_theme_mod( 'portfolio_status', true );
				},
			)
		);

		$wp_customize->add_setting( 'portfolio_btn_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'portfolio_btn_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_portfolio_options',
				'label' => esc_html__( 'More Text','walker-charity' ),
				'description' =>'',
				 'priority' => 5,
				'active_callback' => function(){
				    return get_theme_mod( 'portfolio_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'portfolio_btn_url', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_url',
			) 
		);
		$wp_customize->add_control( 'portfolio_btn_url', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_portfolio_options',
				'label' => esc_html__( 'Button Link','walker-charity' ),
				 'priority' => 6,
				'active_callback' => function(){
				    return get_theme_mod( 'portfolio_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'portfolio_btn_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'portfolio_btn_target', 
			array(
				'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
				'section' => 'walker_charity_portfolio_options',
				'settings' => 'portfolio_btn_target',
				'type'    => 'checkbox',
				'priority' => 8,
				'active_callback' => function(){
				    return get_theme_mod( 'portfolio_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'walker_charity_portfolio_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_portfolio_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_portfolio_options',
				'settings' => 'walker_charity_portfolio_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
			    	return get_theme_mod( 'portfolio_status', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_portfolio_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 0,
			) 
		);

		$wp_customize->add_control( 'walker_charity_portfolio_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_portfolio_options',
				'settings' => 'walker_charity_portfolio_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
			    	return get_theme_mod( 'portfolio_status', true );
				},
			) 
		);
		/*portfolio listing Page*/
		$wp_customize->add_section('walker_charity_postfolio_list_options', 
		 	array(
		        'title' => esc_html__('Portfolio Page Setting', 'walker-charity'),
		        'panel' =>'walker_charity_theme_option',
		        'priority' => 109,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'portfolio_page_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'portfolio_page_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_postfolio_list_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				 'priority' => 2,
			)
		);
		$wp_customize->add_setting( 'portfolio_page_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'portfolio_page_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_postfolio_list_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'priority' => 3,
				
			)
		);
		
	}
	function walker_charity_portfolio_full_width_check(){
	    $walker_charity_portfolio_status= get_theme_mod( 'portfolio_status' );
	    $walker_charity_portfolio_layout_chk= get_theme_mod( 'walker_charity_portfolio_layout' );
		$walker_charity_full_width_status = false;
		if($walker_charity_portfolio_status == true && $walker_charity_portfolio_layout_chk=='grid-layout'){
			$walker_charity_full_width_status = true;
		}
		return $walker_charity_full_width_status;
	}


}
add_action( 'customize_register', 'walker_charity_portfolio_options_register' );