<?php
/**
*Blog customizer options
*
* @package walker_charity
*
*/
if(walker_charity_set_to_premium() ){
if (! function_exists('walker_charity_blog_options_register')) {
	function walker_charity_blog_options_register( $wp_customize ) {
		/** Blog Layout */
	    $wp_customize->add_section(
	        'walker_charity_blog_layout',
	        array(
	            'title'    => esc_html__( 'Blog', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 4,
	        )
	    );
	    
	    /** blog Sidebar layout */
	    $wp_customize->add_setting( 
	        'blog_sidebar_layout',
	        array(
	            'default'           => 'right-sidebar',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new Walker_Charity_Radio_Image_Control_Horizontal(
				$wp_customize,
				'blog_sidebar_layout',
				array(
					'section'	  => 'walker_charity_blog_layout',
					'label'		  => esc_html__( 'Choose Sidebar Option', 'walker-charity' ),
					'description' => '',
					'priority' => 1,
					'choices'	  => array(
						'right-sidebar' => esc_url( get_template_directory_uri() . '/images/dashboard/sidebar-right.png' ),
						'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/dashboard/no-sidebar.png' ),
						'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/sidebar-left.png' ),
	                    
					)
				)
			)
		);

		$wp_customize->add_setting( 'walker_charity_excerpt_length', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 30,
			) 
		);

		$wp_customize->add_control( 'walker_charity_excerpt_length', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_blog_layout',
				'settings' => 'walker_charity_excerpt_length',
				'label' => esc_html__( 'Excerpt Length','walker-charity' ),
				'description' => '',
				'priority' => 2,
			) 
		);
		$wp_customize->add_setting( 'walker_charity_excerpt_more', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' =>'',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_excerpt_more', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_blog_layout',
				'label' => esc_html__( 'Read More Text','walker-charity' ),
				'priority' => 3,
			)
		);

		$wp_customize->add_setting( 
	        'blog_post_view', 
	        array(
	            'default'           => 'fullwidth-view',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
		$wp_customize->add_control(
			new Walker_Charity_Radio_Image_Control_Horizontal(
				$wp_customize,
				'blog_post_view',
				array(
					'section'	  => 'walker_charity_blog_layout',
					'label'		  => esc_html__( 'Choose Post View', 'walker-charity' ),
					'description' => '',
					'priority' => 1,
					'choices'	  => array(
						'fullwidth-view' => esc_url( get_template_directory_uri() . '/images/dashboard/post-big-image.png' ),
						'grid-view'    => esc_url( get_template_directory_uri() . '/images/dashboard/post-grid.png' ),
						'list-view'  => esc_url( get_template_directory_uri() . '/images/dashboard/post-list.png' ),
	                    
					)
				)
			)
		);
		$wp_customize->add_setting( 
		        'blog_pagination_style', 
		        array(
		            'default'           => 'normal-paginate-style',
		            'sanitize_callback' => 'walker_charity_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'blog_pagination_style',
					array(
						'section'	  => 'walker_charity_blog_layout',
						'label'		  => esc_html__( 'Choose Pagination style', 'walker-charity' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => array(
							'normal-paginate-style'    => esc_html__('Next/Preview','walker-charity'),
							'numeric-paginate-style'  => esc_html__('Numeric','walker-charity'),
						)
					)
				)
			);
		 $wp_customize->add_setting( 'author_image_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'author_image_status', 
			array(
			  'label'   => __( 'Show Author Image', 'walker-charity' ),
			  'section' => 'walker_charity_blog_layout',
			  'settings' => 'author_image_status',
			  'type'    => 'checkbox',
			  'active_callback' => 'walker_charity_post_view_cehck',
			)
		);

	    $wp_customize->add_setting( 'author_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'author_status', 
			array(
			  'label'   => __( 'Show Author', 'walker-charity' ),
			  'section' => 'walker_charity_blog_layout',
			  'settings' => 'author_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'post_date_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'post_date_status', 
			array(
			  'label'   => __( 'Show Date', 'walker-charity' ),
			  'section' => 'walker_charity_blog_layout',
			  'settings' => 'post_date_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'category_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'category_status', 
			array(
			  'label'   => __( 'Show Category', 'walker-charity' ),
			  'section' => 'walker_charity_blog_layout',
			  'settings' => 'category_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'tags_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'tags_status', 
			array(
			  'label'   => __( 'Show Tags', 'walker-charity' ),
			  'section' => 'walker_charity_blog_layout',
			  'settings' => 'tags_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'comment_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'comment_status', 
			array(
			  'label'   => __( 'Show Comment', 'walker-charity' ),
			  'section' => 'walker_charity_blog_layout',
			  'settings' => 'comment_status',
			  'type'    => 'checkbox',
			)
		);
		//single post options
		$wp_customize->add_section(
	        'walker_charity_single_blog_option',
	        array(
	            'title'    => esc_html__( 'Single Blog Post', 'walker-charity' ),
	            'panel'    => 'walker_charity_theme_option',
	            'priority' => 4,
	        )
	    );

	    $wp_customize->add_setting( 
	        'single_blog_sidebar_layout',
	        array(
	            'default'           => 'single-right-sidebar',
	            'sanitize_callback' => 'walker_charity_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new Walker_Charity_Radio_Image_Control_Horizontal(
				$wp_customize,
				'single_blog_sidebar_layout',
				array(
					'section'	  => 'walker_charity_single_blog_option',
					'label'		  => esc_html__( 'Choose Sidebar Option', 'walker-charity' ),
					'description' => '',
					'priority' => 1,
					'choices'	  => array(
						'single-right-sidebar' => esc_url( get_template_directory_uri() . '/images/dashboard/right-single-post.png' ),
						'single-no-sidebar'    => esc_url( get_template_directory_uri() . '/images/dashboard/full-single-post.png' ),
						'single-left-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/left-single-post.png' ),
	                    
					)
				)
			)
		);
		$wp_customize->add_setting( 'enable_author_box_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_author_box_status', 
			array(
			  'label'   => __( 'Enable Author Box', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'enable_author_box_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'enable_featrued_post_image', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_featrued_post_image', 
			array(
			  'label'   => __( 'Enable Featured Image', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'enable_featrued_post_image',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'enable_related_post_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_related_post_status', 
			array(
			  'label'   => __( 'Enable Related Post', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'enable_related_post_status',
			  'type'    => 'checkbox',
			)
		);
	    $wp_customize->add_setting( 'walker_charity_related_post_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' =>'',
				'sanitize_callback' => 'walker_charity_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walker_charity_related_post_heading', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_single_blog_option',
				'label' => esc_html__( 'Title for Related Post','walker-charity' ),
				'active_callback' => function(){
				    return get_theme_mod( 'enable_related_post_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'single_author_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'single_author_status', 
			array(
			  'label'   => __( 'Show Author', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'single_author_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'single_post_date_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'single_post_date_status', 
			array(
			  'label'   => __( 'Show Date', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'single_post_date_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'single_category_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'single_category_status', 
			array(
			  'label'   => __( 'Show Category', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'single_category_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'single_tags_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'single_tags_status', 
			array(
			  'label'   => __( 'Show Tags', 'walker-charity' ),
			  'section' => 'walker_charity_single_blog_option',
			  'settings' => 'single_tags_status',
			  'type'    => 'checkbox',
			)
		);
	}
	 function walker_charity_post_view_cehck(){
        $choice_view= get_theme_mod( 'blog_post_view' );
		$avtar_image_status = false;
		if($choice_view == 'fullwidth-view' ){
			$avtar_image_status = true;
		}
		return $avtar_image_status;
    }

}
add_action( 'customize_register', 'walker_charity_blog_options_register' );
}