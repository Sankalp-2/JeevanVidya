<?php
/**
*Page Title customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_page_options_register')) {
	function walker_charity_page_options_register( $wp_customize ) {
		if(walker_charity_set_to_premium() ){
		$wp_customize->add_section(
	        'walker_charity_page_option',
	        array(
	            'title'    => esc_html__( 'Page Options', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 4,
	        )
	    );
	    $wp_customize->add_setting( 'enable_featrued_page_image', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_featrued_page_image', 
			array(
			  'label'   => __( 'Enable Featured Image', 'walker-charity' ),
			  'section' => 'walker_charity_page_option',
			  'settings' => 'enable_featrued_page_image',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_setting( 'enable_page_content_title', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_page_content_title', 
			array(
			  'label'   => __( 'Enable Title of Inside Content', 'walker-charity' ),
			  'section' => 'walker_charity_page_option',
			  'settings' => 'enable_page_content_title',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_section(
	        'walker_charity_sub_header_option',
	        array(
	            'title'    => esc_html__( 'Inner Page Sub-Header Options', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 5,
	        )
	    );
	    $wp_customize->add_setting( 'enable_sub_header_section', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_section', 
			array(
			  'label'   => __( 'Enable Sub-Header Section', 'walker-charity' ),
			  'section' => 'walker_charity_sub_header_option',
			  'settings' => 'enable_sub_header_section',
			  'type'    => 'checkbox',
			)
		);
		 $wp_customize->add_setting( 'enable_sub_header_in_home', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_in_home', 
			array(
			  'label'   => __( 'Enable Sub-Header Section in Home/Front Page', 'walker-charity' ),
			  'section' => 'walker_charity_sub_header_option',
			  'settings' => 'enable_sub_header_in_home',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'enable_sub_header_section_title', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_section_title', 
			array(
			  'label'   => __( 'Enable Title', 'walker-charity' ),
			  'section' => 'walker_charity_sub_header_option',
			  'settings' => 'enable_sub_header_section_title',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'enable_sub_header_section_breadcrumbs', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_section_breadcrumbs', 
			array(
			  'label'   => __( 'Enable Breadcrumbs', 'walker-charity' ),
			  'section' => 'walker_charity_sub_header_option',
			  'settings' => 'enable_sub_header_section_breadcrumbs',
			  'type'    => 'checkbox',
			)
		);
			$wp_customize->add_setting( 'walker_charity_subheader_background_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_subheader_background_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Background Color', 'walker-charity' ),
			        'section' => 'walker_charity_sub_header_option',
			        'settings'   => 'walker_charity_subheader_background_color',
			    ) ) 
			);
			$wp_customize->add_setting('subheader_bg_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walker_charity_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'subheader_bg_image', array(
		    	'label' => '',
		        'description'             => esc_html__('Background Image', 'walker-charity'),
		        'section'           => 'walker_charity_sub_header_option',
		        'settings'          => 'subheader_bg_image',
		
		    )));

			$wp_customize->add_setting(
		    	'subheader_bg_opacity',
		    	array(
			        'default'			=> 1,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walker_charity_sanitize_text',
				
				)
			);
			$wp_customize->add_control( 
			new Walker_Charity_Customizer_Range_Control( $wp_customize, 'subheader_bg_opacity', 
				array(
					'label'      => __( 'Opacity of Background', 'walker-charity'),
					'section'  => 'walker_charity_sub_header_option',
					'settings' => 'subheader_bg_opacity',
		            'input_attrs' => array(
						'min'    => 0.00,
						'max'    => 1.00,
						'step'   => 0.01,
					),
				) ) 
			);
		    $wp_customize->add_setting( 'walker_charity_subheader_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_subheader_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'walker-charity' ),
			        'section' => 'walker_charity_sub_header_option',
			        'settings'   => 'walker_charity_subheader_text_color',
			    ) ) 
			);

			$wp_customize->add_setting( 'walker_charity_subheader_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 20,
			) 
		);

		$wp_customize->add_control( 'walker_charity_subheader_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_sub_header_option',
				'settings' => 'walker_charity_subheader_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'enable_sub_header_section', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_subheader_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_float',
				'default' => 20,
			) 
		);

		$wp_customize->add_control( 'walker_charity_subheader_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_sub_header_option',
				'settings' => 'walker_charity_subheader_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'enable_sub_header_section', true );
				},
			) 
		);
	}

		/*scroll top*/
		$wp_customize->add_section(
	        'walker_charity_scroll_top_icon',
	        array(
	            'title'    => esc_html__( 'Scroll Top Options', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 4,
	        )
	    );
		$wp_customize->add_setting( 'enable_scroll_top_icon', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_scroll_top_icon', 
			array(
			  'label'   => __( 'Enable Scroll Top', 'walker-charity' ),
			  'section' => 'walker_charity_scroll_top_icon',
			  'settings' => 'enable_scroll_top_icon',
			  'type'    => 'checkbox',
			)
		);
		if(walker_charity_set_to_premium() ){
		/*content-width*/
		$wp_customize->add_section(
	        'walker_charity_content_width_options',
	        array(
	            'title'    => esc_html__( 'Content Width', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 4,
	        )
	    );
		$wp_customize->add_setting( 'walker_charity_container_width', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 1180,
				) 
			);

			$wp_customize->add_control( 'walker_charity_container_width', 
				array(
					'type' => 'number',
					'section' => 'walker_charity_content_width_options',
					'settings' => 'walker_charity_container_width',
					'label' => esc_html__( 'Container Width (px) ','walker-charity' ),
					'description' => esc_html__('This features increase or decrease container width of site.','walker-charity'),
					'description' => '',
				) 
			);
		
		 /*button style*/
		$wp_customize->add_section(
	        'walker_charity_button_options',
	        array(
	            'title'    => esc_html__( 'Button Options', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 4,
	        )
	    );
			$wp_customize->add_setting( 'walker_charity_btns_radius', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 3,
				) 
			);

			$wp_customize->add_control( 'walker_charity_btns_radius', 
				array(
					'type' => 'number',
					'min' => 1,
					'max' => 50,
					'section' => 'walker_charity_button_options',
					'settings' => 'walker_charity_btns_radius',
					'label' => esc_html__( 'Radius of Button','walker-charity' ),
					'description' => esc_html__('This features create round/square corner of buttons all over the site','walker-charity'),
					'description' => '',
				) 
			);
		}
	}
}
add_action( 'customize_register', 'walker_charity_page_options_register' );