<?php
/**
*Team customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_team_options_register')) {
	function walker_charity_team_options_register( $wp_customize ) {
		$wp_customize->add_section('walker_charity_teams_options', 
		 	array(
		        'title' => esc_html__('Teams', 'walker-charity'),
		        'panel' =>'walker_charity_frontpage_option',
		        'priority' => 14,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'team_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walker_charity_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'team_status', 
			array(
			  'label'   => esc_html__( 'Enable Teams', 'walker-charity' ),
			  'section' => 'walker_charity_teams_options',
			  'settings' => 'team_status',
			  'type'    => 'checkbox',
			   'priority' => 1,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'team_status', array(
            'selector' => '.team-wraper h1.section-heading',
        ) );
	
		$wp_customize->add_setting( 'teams_total_items', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
			) 
		);
		$wp_customize->add_control( 'teams_total_items', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_teams_options',
				'label' => esc_html__( 'Total Members to Show','walker-charity' ),
				'description' => '',
				 'priority' => 2,
				'active_callback' => function(){
				    return get_theme_mod( 'team_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'team_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'team_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_teams_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				 'priority' => 2,
				'active_callback' => function(){
				    return get_theme_mod( 'team_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'teams_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'teams_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_teams_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'priority' => 3,
				'active_callback' => function(){
				    return get_theme_mod( 'team_status', true );
				},
			)
		);
	    $wp_customize->add_setting( 'team_view_more_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'team_view_more_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_teams_options',
				'label' => esc_html__( 'View More Text','walker-charity' ),
				'description' => '',
				 'priority' => 5,
				'active_callback' => function(){
				    return get_theme_mod( 'team_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'teams_bg_color', 
			array(
		        'default'        => '#f2fbfc',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'teams_bg_color', 
			array(
		        'label'   => esc_html__( 'Section color & Settings', 'walker-charity' ),
		        'description' => esc_html__('Background Color','walker-charity'),
		        'section' => 'walker_charity_teams_options',
		        'settings'   => 'teams_bg_color',
		        'active_callback' => function(){
			    	return get_theme_mod( 'team_status', true );
				},

		    ) ) 
		);
		$wp_customize->add_setting( 'teams_heading_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'teams_heading_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Heading color', 'walker-charity' ),
		        'section' => 'walker_charity_teams_options',
		        'settings'   => 'teams_heading_color',
		        'active_callback' => function(){
			    	return get_theme_mod( 'team_status', true );
				},

		    ) ) 
		);
	    $wp_customize->add_setting( 'teams_text_color', 
			array(
		        'default'        => '#727272',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'teams_text_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text color', 'walker-charity' ),
		        'section' => 'walker_charity_teams_options',
		        'settings'   => 'teams_text_color',
		        'active_callback' => function(){
			    	return get_theme_mod( 'team_status', true );
				},

		    ) ) 
		);
		$wp_customize->add_setting( 'walker_charity_team_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_team_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_teams_options',
				'settings' => 'walker_charity_team_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'team_status', true );
				},
			) 
		);
		$wp_customize->add_setting( 'walker_charity_team_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walker_charity_team_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_teams_options',
				'settings' => 'walker_charity_team_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walker-charity' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => function(){
				    return get_theme_mod( 'team_status', true );
				},
			) 
		);

		/*Team listing Page*/
		$wp_customize->add_section('walker_charity_team_inner_options', 
		 	array(
		        'title' => esc_html__('Teams Page Setting', 'walker-charity'),
		        'panel' =>'walker_charity_theme_option',
		        'priority' => 109,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'team_page_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walker_charity_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'team_page_heading_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_team_inner_options',
				'label' => esc_html__( 'Heading','walker-charity' ),
				'description' => '',
				 'priority' => 2,
			)
		);
		$wp_customize->add_setting( 'team_page_desc_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			) 
		);

		$wp_customize->add_control( 'team_page_desc_text', 
			array(
				'type' => 'text',
				'section' => 'walker_charity_team_inner_options',
				'label' => esc_html__( 'Description','walker-charity' ),
				'description' => '',
				'priority' => 3,
				
			)
		);
	}
}
add_action( 'customize_register', 'walker_charity_team_options_register' );