<?php
/**
*Header customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_header_options_register')) {
	function walker_charity_header_options_register( $wp_customize ) {
		/** Header Layout */
	    $wp_customize->add_section(
	        'walker_charity_header_layout',
	        array(
	            'title'    => esc_html__( 'Header', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 1,
	        )
	    );
	    if(walker_charity_set_to_premium()){
		    $wp_customize->add_setting( 'site_stikcy_menu_option', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'site_stikcy_menu_option', 
				array(
				  'label'   => esc_html__( 'Enable Stikcy Menu', 'walker-charity' ),
				  'section' => 'walker_charity_header_layout',
				  'settings' => 'site_stikcy_menu_option',
				  'type'    => 'checkbox',
				  'priority' => 1,
				)
			);
		}
		$wp_customize->add_setting( 'walker_charity_topbar_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'walker_charity_topbar_status', 
			array(
			  'label'   => esc_html__( 'Enable Topbar', 'walker-charity' ),
			  'section' => 'walker_charity_header_layout',
			  'settings' => 'walker_charity_topbar_status',
			  'type'    => 'checkbox',
			  'active_callback' => 'walker_charity_topbar_status_check',
			)
		);
	    
	    /** header layout layout */
	    $wp_customize->add_setting( 
	        'walker_charity_select_header_layout', 
	        array(
	            'default'           => 'walker-charity-header-one',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );

	    if(walker_charity_set_to_premium()){
	    	$header_choices = array(
				'walker-charity-header-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-1.png' ),
				'walker-charity-header-two'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-2.png' ),
                'walker-charity-header-three' => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-3.png' ),
                'walker-charity-header-four' => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-4.png' ),
			);
	    }else{
	    	$header_choices = array(
				'walker-charity-header-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-1.png' ),
			);
	    }
	    
	    $wp_customize->add_control(
			new Walker_Charity_Radio_Image_Control_Vertical(
				$wp_customize,
				'walker_charity_select_header_layout',
				array(
					'section'	  => 'walker_charity_header_layout',
					'label'		  => esc_html__( 'Choose Header Layout', 'walker-charity' ),
					'description' => '',
					'choices'	  => $header_choices,
				)
			)
		);
	    $wp_customize->add_setting( 'walker_charity_header_primary_button', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_header_primary_button', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Primary Button','walker-charity' ),
				'description' => esc_html__('Button Label','walker-charity'),
				'active_callback' => 'walker_charity_current_header_primary',
			)
		);
		$wp_customize->add_setting( 'primary_btn_link', 
			array(
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'primary_btn_link', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_header_layout',
		        'settings' => 'primary_btn_link',
		        'type'=> 'url',
		        'active_callback' => 'walker_charity_current_header_primary',
	    	) 
	    );
	    $wp_customize->add_setting( 'primary_btn_link_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'primary_btn_link_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_header_layout',
			  'settings' => 'primary_btn_link_target',
			  'type'    => 'checkbox',
			  'active_callback' => 'walker_charity_current_header_primary',
			)
		);
		
		$wp_customize->add_setting( 'walker_charity_header_secondary_button', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		
		$wp_customize->add_control( 'walker_charity_header_secondary_button', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Secondary Button','walker-charity' ),
				'description' => esc_html__('Button Label','walker-charity'),
				'active_callback' => 'walker_charity_current_header',
			)
		);
		$wp_customize->add_setting( 'secondary_btn_link', 
			array(
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'secondary_btn_link', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Secondary Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_header_layout',
		        'settings' => 'secondary_btn_link',
		        'type'=> 'url',
		        'active_callback' => 'walker_charity_current_header',
	    	) 
	    );
		$wp_customize->add_setting( 'secondary_btn_link_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'secondary_btn_link_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_header_layout',
			  'settings' => 'secondary_btn_link_target',
			  'type'    => 'checkbox',
			  'active_callback' => 'walker_charity_current_header',
			)
		);
		$wp_customize->add_setting( 'walker_charity_header_slogan_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_header_slogan_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Header Slogan Text','walker-charity' ),
				'active_callback' => 'walker_charity_current_header_check',
				
			)
		);
		$wp_customize->selective_refresh->add_partial( 'walker_charity_header_slogan_text', array(
            'selector' => 'span.header-slogan',
        ) );
		$wp_customize->add_setting( 'walker_charity_header_contact', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_header_contact', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Header Contact Number','walker-charity' ),
				'active_callback' => 'walker_charity_current_header_check',
				
			)
		);
	    $wp_customize->add_setting( 'walker_charity_header_email', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_header_email', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Email','walker-charity' ),
				// 'active_callback' => 'walker_charity_topbar_status_check',
				
			)
		);
		$wp_customize->add_setting( 'walker_charity_header_location_address', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_header_location_address', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Address','walker-charity' ),
				'active_callback' => 'walker_charity_topbar_status_check',
				
			)
		);
		$wp_customize->add_setting( 'walker_charity_header_location_address_link', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_url',

			) 
		);
		$wp_customize->add_control( 'walker_charity_header_location_address_link', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_header_layout',
				'label' => esc_html__( 'Address Link','walker-charity' ),
				'active_callback' => 'walker_charity_topbar_status_check',
				
			)
		);
		$wp_customize->add_setting( 'walker_charity_main_header_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 25,
			) 
		);

		$wp_customize->add_control( 'walker_charity_main_header_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_header_layout',
				'settings' => 'walker_charity_main_header_padding_top',
				'label' => esc_html__( 'Header top Space Above Logo','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			) 
		);
		$wp_customize->add_setting( 'walker_charity_main_header_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 25,
			) 
		);

		$wp_customize->add_control( 'walker_charity_main_header_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_header_layout',
				'settings' => 'walker_charity_main_header_padding_bottom',
				'label' => esc_html__( 'Header Bottom Space Under Logo','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			) 
		);
	}
	function walker_charity_current_header(){
        $choice_header= get_theme_mod( 'walker_charity_select_header_layout' );
		$header_status = false;
		if($choice_header == 'walker-charity-header-two' ){
			$header_status = true;
		}
		return $header_status;
    }
	
    function walker_charity_current_header_check(){
        $choice_header= get_theme_mod( 'walker_charity_select_header_layout' );
		$header_status = false;
		if($choice_header == 'walker-charity-header-one' || $choice_header == 'walker-charity-header-two' || $choice_header == 'walker-charity-header-three' || $choice_header == 'walker-charity-header-four'){
			$header_status = true;
		}
		return $header_status;
    }

    function walker_charity_topbar_status_check(){
        $choice_header= get_theme_mod( 'walker_charity_select_header_layout' );
		$header_status = false;
		if($choice_header == 'walker-charity-header-one' || $choice_header == 'walker-charity-header-two'){
			$header_status = true;
		}
		return $header_status;
    }

    function walker_charity_current_header_primary(){
	    $choice_header= get_theme_mod( 'walker_charity_select_header_layout' );
		$header_status = false;
		if($choice_header == 'walker-charity-header-one' || $choice_header == 'walker-charity-header-two' || $choice_header == 'walker-charity-header-three' || $choice_header == 'walker-charity-header-five'){
			$header_status = true;
		}
		return $header_status;
	}

	function walker_charity_transparent_header_check(){
	    $choice_header= get_theme_mod( 'walker_charity_select_header_layout' );
		$transparent_header_status = false;
		if($choice_header == 'walker-charity-header-one'){
			$transparent_header_status = true;
		}
		return $transparent_header_status;
	}

}
add_action( 'customize_register', 'walker_charity_header_options_register' );