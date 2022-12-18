<?php
/**
*Footer customizer options
*
* @package walker_charity
*
*/
if(walker_charity_set_to_premium()):
	if (! function_exists('walker_charity_footer_options_register')) {
		function walker_charity_footer_options_register( $wp_customize ) {
			$wp_customize->add_section('walker_charity_footer_setting', 
			 	array(
			        'title' => esc_html__('Footer', 'walker-charity'),
			        'panel' =>'walker_charity_theme_option',
			        'priority' => 12
		    	)
			 );

			$wp_customize->add_setting( 'walker_charity_footer_background_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_footer_background_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Background Color', 'walker-charity' ),
			        'section' => 'walker_charity_footer_setting',
			        'settings'   => 'walker_charity_footer_background_color',
			        'priority' => 3
			    ) ) 
			);
			$wp_customize->add_setting('footer_bg_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walker_charity_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
		    	'label' => '',
		        'description'             => esc_html__('Background Image', 'walker-charity'),
		        'section'           => 'walker_charity_footer_setting',
		        'settings'          => 'footer_bg_image',
		        'priority' 			=> 3,
		
		    )));
			
			// $wp_customize->selective_refresh->add_partial( 'walker_charity_footer_bg_color', array(
	  //           'selector' => 'footer#colophon',
	  //       ) );
			
			$wp_customize->add_setting(
		    	'footer_bg_opacity',
		    	array(
			        'default'			=> '1',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walker_charity_sanitize_text',
				
				)
			);
			$wp_customize->add_control( 
			new Walker_Charity_Customizer_Range_Control( $wp_customize, 'footer_bg_opacity', 
				array(
					'label'      => __( 'Opacity of Background', 'walker-charity'),
					'section'  => 'walker_charity_footer_setting',
					'settings' => 'footer_bg_opacity',
		            'input_attrs' => array(
						'min'    => 0.00,
						'max'    => 1.00,
						'step'   => 0.01,
					),
					'priority' => 4,
				) ) 
			);

			
			$wp_customize->add_setting( 'walker_charity_footer_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_footer_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'walker-charity' ),
			        'section' => 'walker_charity_footer_setting',
			        'settings'   => 'walker_charity_footer_text_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walker_charity_footer_link_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_footer_link_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Color', 'walker-charity' ),
			        'section' => 'walker_charity_footer_setting',
			        'settings'   => 'walker_charity_footer_link_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walker_charity_footer_link_hover_color', 
				array(
			        'default'        => '#f15754',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_footer_link_hover_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Hover Color', 'walker-charity' ),
			        'section' => 'walker_charity_footer_setting',
			        'settings'   => 'walker_charity_footer_link_hover_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walker_charity_footer_bottom_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_footer_bottom_color', 
				array(
			        'label'   => esc_html__( 'Copyright Settings', 'walker-charity' ),
			        'description' => esc_html__('Background Color','walker-charity'),
			        'section' => 'walker_charity_footer_setting',
			        'settings'   => 'walker_charity_footer_bottom_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'enable_copyright_section_footer', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_copyright_section_footer', 
			array(
			  'label'   => __( 'Enable Copyright Section', 'walker-charity' ),
			  'description' =>'',
			  'section' => 'walker_charity_footer_setting',
			  'settings' => 'enable_copyright_section_footer',
			  'type'    => 'checkbox',
			   'priority' => 4,
			)
		);
			$wp_customize->add_setting( 'footer_copyright_social_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'footer_copyright_social_status', 
				array(
				  'label'   => esc_html__( 'Enable Social Icons In Footer Bottom', 'walker-charity' ),
				  'section' => 'walker_charity_footer_setting',
				  'settings' => 'footer_copyright_social_status',
				  'type'    => 'checkbox',
				  'priority' => 4,
				)
			);
			$wp_customize->add_setting(
		    	'copyright_bg_opacity',
		    	array(
			        'default'			=> '1',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walker_charity_sanitize_text',
				
				)
			);
			$wp_customize->add_control( 
			new Walker_Charity_Customizer_Range_Control( $wp_customize, 'copyright_bg_opacity', 
				array(
					'label'      => __( 'Opacity of Background', 'walker-charity'),
					'section'  => 'walker_charity_footer_setting',
					'settings' => 'copyright_bg_opacity',
		            'input_attrs' => array(
						'min'    => 0.00,
						'max'    => 1.00,
						'step'   => 0.01,
					),
					'priority' => 4,
				) ) 
			);
		
			$wp_customize->add_setting( 'walker_charity_copyright_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_copyright_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Copyright Text Color', 'walker-charity' ),
			        'section' => 'walker_charity_footer_setting',
			        'settings'   => 'walker_charity_copyright_text_color',
			        'priority' => 4
			    ) ) 
			);
			
			$wp_customize->add_setting( 'footer_copiright_text', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'footer_copiright_text', 
				array(
					'type' => 'textarea',
					'section' => 'walker_charity_footer_setting',
					'label' => '',
					'description' => esc_html__( 'Copyright Text','walker-charity' ),
				)
			);
		$wp_customize->add_setting( 
	        'copyright_text_alignment', 
	        array(
	            'default'           => 'copyright-text-align-left',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'copyright_text_alignment',
				array(
					'section'	  => 'walker_charity_footer_setting',
					'description'		  => esc_html__( 'Text Alignment', 'walker-charity' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'copyright-text-align-left'  => esc_html__('Left','walker-charity'),
						'copyright-text-align-center'  => esc_html__('Center','walker-charity'),
					),
					
				)
			)
		);
			$wp_customize->selective_refresh->add_partial( 'footer_copiright_text', array(
	            'selector' => '.site-info',
	        ) );

	        $wp_customize->add_setting( 'walker_charity_copyright_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 15,
			) 
		);

		$wp_customize->add_control( 'walker_charity_copyright_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_footer_setting',
				'settings' => 'walker_charity_copyright_section_padding_top',
				'label' => '',
				'description' => esc_html__( 'Section Top Space','walker-charity' ),
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			) 
		);
		$wp_customize->add_setting( 'walker_charity_copyright_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 15,
			) 
		);

		$wp_customize->add_control( 'walker_charity_copyright_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_footer_setting',
				'settings' => 'walker_charity_copyright_section_padding_bottom',
				'description' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'label' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			) 
		);
		}

	}
	add_action( 'customize_register', 'walker_charity_footer_options_register' );
endif;
