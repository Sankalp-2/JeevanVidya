<?php if (! function_exists('walker_charity_recentposts_options_register')) {
	function walker_charity_recentposts_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_recentpost_options', 
		 	array(
		        'title' => esc_html__('Recent Posts', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'recent_post_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'recent_post_status', 
			array(
			  'label'   => esc_html__( 'Enable Recent Posts', 'walker-charity' ),
			  'section' => 'walker_charity_recentpost_options',
			  'settings' => 'recent_post_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'walker_charity_recentpost_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_recentpost_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_recentpost_options',
				'settings' => 'walker_charity_recentpost_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'recent_post_status', true );
		        },
			) 
		);
		$wp_customize->add_setting( 'walker_charity_recentpost_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 60,
			) 
		);

		$wp_customize->add_control( 'walker_charity_recentpost_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_recentpost_options',
				'settings' => 'walker_charity_recentpost_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
		            return get_theme_mod( 'recent_post_status', true );
		        },
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'recent_post_status', array(
            'selector' => '.recentblog-wraper h2.section-heading',
        ) );
		$wp_customize->add_setting( 'recentpost_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'recentpost_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_recentpost_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'recent_post_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'recentpost_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 'recentpost_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_recentpost_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'recent_post_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'walker_charity_recent_blog_home', 
	        array(
	            'default'           => 'latest-post',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'walker_charity_recent_blog_home',
				array(
					'section'	  => 'walker_charity_recentpost_options',
					'label'		  => esc_html__( 'Choose Post Type', 'walker-charity' ),
					'description' => '',
					'type'           => 'select',
					'choices'	  => array(
						'latest-post'  => esc_html__('Latest Posts','walker-charity'),
						'select-category'  => esc_html__('Select Category','walker-charity'),
					),
					'active_callback' => function(){
							return get_theme_mod( 'recent_post_status', true );
					},
				)
			)
		);

		$wp_customize->add_setting('walker_charity_recent_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walker_charity_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new Walker_Charity_Dropdown_Taxonomies_Control($wp_customize, 
			'walker_charity_recent_category',
			    array(
			        'label'       => esc_html__('Select Category', 'walker-charity'),
			        'description' => '',
			        'section'     => 'walker_charity_recentpost_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walker_charity_recent_category',
			        'priority'    => 10,
			        'active_callback' => 'walker_charity_current_post_type',
		    	)
			)
		);
		$wp_customize->add_setting( 'recentpost_readmore_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'recentpost_readmore_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_recentpost_options',
				'label' => esc_html__( 'Read More Text','walker-charity' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'recent_post_status', true );
				},
				'priority'    => 12,
			)
		);
	}
	function walker_charity_current_post_type(){
		$current_blog_status = get_theme_mod( 'recent_post_status');
        $choice_post_type= get_theme_mod( 'walker_charity_recent_blog_home' );
		$blog_display_type = false;
		if($current_blog_status == true && $choice_post_type == 'select-category'){
			$blog_display_type = true;
		}
		return $blog_display_type;
    }
}
add_action( 'customize_register', 'walker_charity_recentposts_options_register' );