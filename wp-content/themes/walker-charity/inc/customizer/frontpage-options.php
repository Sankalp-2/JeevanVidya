<?php
if (! function_exists('walker_charity_banner_options_register')) {
	function walker_charity_banner_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_banner_options', 
		 	array(
		        'title' => esc_html__('Banner Setup', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'banner_section_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'banner_section_status', 
			array(
			  'label'   => esc_html__( 'Enable Banner Section', 'walker-charity' ),
			  'section' => 'walker_charity_banner_options',
			  'settings' => 'banner_section_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);
		$wp_customize->add_setting( 'banner_section_allpage_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'banner_section_allpage_status', 
			array(
			  'label'   => esc_html__( 'Enable Banner section all over site', 'walker-charity' ),
			  'section' => 'walker_charity_banner_options',
			  'settings' => 'banner_section_allpage_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'banner_section_status', true );
			   },
			   'priority' => 2,
			)
		);

		if(walker_charity_set_to_premium()){
	    	$walker_charity_banner_choices = array(
				'walker-charity-banner-layout-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-1.png' ),
				'walker-charity-banner-layout-two'  => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-2.png' ),
                'walker-charity-banner-layout-three' => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-3.png' ),
                'walker-charity-banner-layout-four' => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-4.png' ),
                'walker-charity-banner-layout-five' => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-5.png' ),
			);
	    }else{
	    	$walker_charity_banner_choices = array(
	    		'walker-charity-banner-layout-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-1.png' ),
				'walker-charity-banner-layout-four'  => esc_url( get_template_directory_uri() . '/images/dashboard/slider-layout-4.png' ),
			);
	    }

	     $wp_customize->add_setting( 
	        'walker_charity_select_banner_layout', 
	        array(
	            'default'           => 'walker-charity-banner-layout-four',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new Walker_Charity_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walker_charity_select_banner_layout',
				array(
					'section'	  => 'walker_charity_banner_options',
					'label'		  => esc_html__( 'Choose Banner Layout', 'walker-charity' ),
					'description' => '',
					'choices'	  => $walker_charity_banner_choices,
					'priority' => 3,
				)
			)
		);
		$wp_customize->add_setting('walker_charity_slider_category', 
			array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'walker_charity_sanitize_text',
		    )
		);
		$wp_customize->add_control(
			new Walker_Charity_Dropdown_Taxonomies_Control($wp_customize, 
			'walker_charity_slider_category',
			    array(
			        'label'       => esc_html__('Select Category', 'walker-charity'),
			        'description' => '',
			        'section'     => 'walker_charity_banner_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walker_charity_slider_category',
			        'priority'    => 4,
			        'active_callback' => 'walker_charity_slider_layout_four',
		    	)
			)
		);
		$wp_customize->add_setting( 
	        'slider_text_alignment', 
	        array(
	            'default'           => 'slider-text-align-center',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_text_alignment',
				array(
					'section'	  => 'walker_charity_banner_options',
					'description'		  => esc_html__( 'Text Alignment', 'walker-charity' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'slider-text-align-left'  => esc_html__('Left','walker-charity'),
						'slider-text-align-center'  => esc_html__('Center','walker-charity'),
						'slider-text-align-right'  => esc_html__('right','walker-charity'),
					),
					'priority'    => 4,
					'active_callback' => 'walker_charity_banner_text_alignment',
					
				)
			)
		);
		$wp_customize->add_setting('banner_bg_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walker_charity_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_bg_image', array(
		    	'label' => '',
		        'description'             => esc_html__('Background Image', 'walker-charity'),
		        'section'           => 'walker_charity_banner_options',
		        'settings'          => 'banner_bg_image',
		        'priority' 			=> 4,
		        'active_callback' => 'walker_charity_banner_bg_image_status',
		
		    )));
			$wp_customize->add_setting( 'walker_charity_slider_bg_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_slider_bg_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Oaverlay Color', 'walker-charity' ),
			        'section' => 'walker_charity_banner_options',
			        'settings'   => 'walker_charity_slider_bg_color',
			        'priority' => 5
			    ) ) 
			);

			$wp_customize->add_setting(
		    	'banner_bg_opacity',
		    	array(
			        'default'			=> '0.4',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walker_charity_sanitize_text',
				
				)
			);
			$wp_customize->add_control( 
			new Walker_Charity_Customizer_Range_Control( $wp_customize, 'banner_bg_opacity', 
				array(
					'label'      => __( 'Opacity of Overlay', 'walker-charity'),
					'section'  => 'walker_charity_banner_options',
					'settings' => 'banner_bg_opacity',
		            'input_attrs' => array(
						'min'    => 0.00,
						'max'    => 1.00,
						'step'   => 0.01,
					),
					'priority' => 6,
				) ) 
			);










		$wp_customize->add_setting( 'walker_charity_slider_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walker_charity_slider_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'walker-charity' ),
			        'section' => 'walker_charity_banner_options',
			        'settings'   => 'walker_charity_slider_text_color',
			        'priority' => 5
			    ) ) 
			);
		$wp_customize->add_setting( 'banner_form_shortcode', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'banner_form_shortcode', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => esc_html__('Form','walker-charity'),
				'description' => esc_html__('Shortcode of conatct form 7 for Form','walker-charity'),
				'active_callback' => 'walker_charity_slider_layout_two',
				'priority' => 5,
			)
		);
		$wp_customize->add_setting( 'walker_charity_banner_form_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_banner_form_heading', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => '',
				'description' => esc_html__('Form Heading','walker-charity'),
				'priority' => 5,
				'active_callback' => 'walker_charity_slider_layout_two',
			)
		);
		$wp_customize->add_setting( 'walker_charity_banner_video_iframe', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_banner_video_iframe', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => esc_html__( 'Youtube Video Id','walker-charity' ),
				'description' => esc_html__('Add youtube video id for iframe for the background video','walker-charity'),
				'priority' => 7,
				'active_callback' => 'walker_charity_banner_video_status',
			)
		);
		$wp_customize->add_setting( 'walker_charity_banner_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_banner_heading', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => esc_html__( 'Banner Text','walker-charity' ),
				'description' => esc_html__('Heading','walker-charity'),
				'priority' => 7,
				'active_callback' => 'walker_charity_banner_text_status',
			)
		);

		$wp_customize->add_setting( 'walker_charity_banner_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_banner_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => '',
				'description' => esc_html__('Sub Heading','walker-charity'),
				'priority' => 8,
				'active_callback' => 'walker_charity_banner_text_status',
			)
		);
		/*Banner Primary Button*/
		$wp_customize->add_setting( 'walker_charity_banner_primary_button', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'walker_charity_banner_primary_button', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => esc_html__( 'Primary Button','walker-charity' ),
				'description' => esc_html__( 'Button Label','walker-charity' ),
				'priority' => 9,
				'active_callback' => 'walker_charity_banner_text_status',
			)
		);
		$wp_customize->add_setting( 'walker_charity_banner_primary_button_link', 
			array(
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'walker_charity_banner_primary_button_link', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_banner_options',
		        'settings' => 'walker_charity_banner_primary_button_link',
		        'type'=> 'url',
		        'priority' => 10,
		        'active_callback' => 'walker_charity_banner_text_status',
	    	) 
	    );
	    $wp_customize->add_setting( 'walker_charity_banner_primary_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'walker_charity_banner_primary_button_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_banner_options',
			  'settings' => 'walker_charity_banner_primary_button_target',
			  'type'    => 'checkbox',
			  'priority' => 11,
			  'active_callback' => 'walker_charity_banner_text_status',
			)
		);
		/*Banner Secondary Button*/
		$wp_customize->add_setting( 'walker_charity_banner_secondary_button', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_banner_secondary_button', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_banner_options',
				'label' => esc_html__( 'Secondary Button','walker-charity' ),
				'description' => esc_html__( 'Button Label','walker-charity' ),
				'priority' => 12,
				'active_callback' => 'walker_charity_banner_text_status',
			)
		);
		$wp_customize->add_setting( 'walker_charity_banner_secondary_button_link', 
			array(
		        'sanitize_callback'     =>  'esc_url_raw',
		    ) 
		);

	    $wp_customize->add_control( 'walker_charity_banner_secondary_button_link', 
	    	array(
	    		'label' => '',
		        'description' => esc_html__( 'Button Link', 'walker-charity' ),
		        'section' => 'walker_charity_banner_options',
		        'settings' => 'walker_charity_banner_secondary_button_link',
		        'type'=> 'url',
		        'priority' => 13,
		        'active_callback' => 'walker_charity_banner_text_status',
	    	) 
	    );
	    $wp_customize->add_setting( 'walker_charity_banner_secondary_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'walker_charity_banner_secondary_button_target', 
			array(
			  'label'   => esc_html__( 'Open in New Tab', 'walker-charity' ),
			  'section' => 'walker_charity_banner_options',
			  'settings' => 'walker_charity_banner_secondary_button_target',
			  'type'    => 'checkbox',
			  'priority' => 14,
			  'active_callback' => 'walker_charity_banner_text_status',
			)
		);
		
	}
	function walker_charity_banner_text_status(){
        $choice_banner= get_theme_mod( 'walker_charity_select_banner_layout' );
		$banner_status = false;
		if($choice_banner == 'walker-charity-banner-layout-one' || $choice_banner == 'walker-charity-banner-layout-two' || $choice_banner == 'walker-charity-banner-layout-three'){
			$banner_status = true;
		}
		return $banner_status;
    }

    function walker_charity_banner_text_alignment(){
        $current_choice_banner= get_theme_mod( 'walker_charity_select_banner_layout' );
		$text_align_status = false;
		if($current_choice_banner == 'walker-charity-banner-layout-one' || $current_choice_banner == 'walker-charity-banner-layout-three' || $current_choice_banner == 'walker-charity-banner-layout-four'){
			$text_align_status = true;
		}
		return $text_align_status;
    }

    function walker_charity_banner_bg_image_status(){
        $choice_banner_img= get_theme_mod( 'walker_charity_select_banner_layout' );
		$banner_bg_image_status = false;
		if($choice_banner_img == 'walker-charity-banner-layout-one' || $choice_banner_img == 'walker-charity-banner-layout-two' ){
			$banner_bg_image_status = true;
		}
		return $banner_bg_image_status;
    }
    function walker_charity_banner_video_status(){
        $choice_banner_video= get_theme_mod( 'walker_charity_select_banner_layout' );
		$banner_bg_video_status = false;
		if($choice_banner_video == 'walker-charity-banner-layout-three' ){
			$banner_bg_video_status = true;
		}
		return $banner_bg_video_status;
    }

    function walker_charity_slider_layout_four(){
    	$recent_slider_type = get_theme_mod('walker_charity_select_banner_layout');
    	$recent_slider_status = false;
    	if($recent_slider_type == 'walker-charity-banner-layout-four'){
    		$recent_slider_status = true;
    	}
    	return $recent_slider_status;
    }
    function walker_charity_slider_layout_two(){
    	$recent_slider_types = get_theme_mod('walker_charity_select_banner_layout');
    	$recent_slider_statuss = false;
    	if($recent_slider_types == 'walker-charity-banner-layout-two'){
    		$recent_slider_statuss = true;
    	}
    	return $recent_slider_statuss;
    }
}
add_action( 'customize_register', 'walker_charity_banner_options_register' );

require get_template_directory() . '/inc/customizer/cta-options.php';
require get_template_directory() . '/inc/customizer/about-options.php';
if(walker_charity_set_to_premium()){
	require get_template_directory() . '/inc/customizer/counter-options.php';
	require get_template_directory() . '/inc/customizer/contact-options.php';
	require get_template_directory() . '/inc/customizer/team-options.php';
	require get_template_directory() . '/inc/customizer/portfolio-options.php';
	require get_template_directory() . '/inc/customizer/brand-options.php';
	require get_template_directory() . '/inc/customizer/features-options.php';
	require get_template_directory() . '/inc/customizer/donation-options.php';
}
	require get_template_directory() . '/inc/customizer/recentpost-options.php';
	require get_template_directory() . '/inc/customizer/extra-page.php';
	require get_template_directory() . '/inc/customizer/single-cta.php';
	require get_template_directory() . '/inc/customizer/testimonial-options.php';
if(!walker_charity_set_to_premium()){
	require get_template_directory() . '/inc/customizer/theme-info.php';
}