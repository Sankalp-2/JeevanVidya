<?php
/**
*Typography customizer options
*
* @package walker_charity
*
*/
add_action( 'customize_register', 'walker_charity_color_settings_panel' );

function walker_charity_color_settings_panel( $wp_customize)  {
    $wp_customize->get_section('colors')->priority = 1;
    $wp_customize->get_section( 'colors' )->title  = esc_html__('Color Options', 'walker-charity');
    $wp_customize->get_section('colors')->panel = 'walker_charity_theme_option';
}
if (! function_exists('walker_charity_colors_options_register')) {
	function walker_charity_colors_options_register( $wp_customize ) {
		$wp_customize->add_setting( 'walker_charity_base_color', 
			array(
		        'default'        => '#0d1741',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walker_charity_base_color', 
			array(
		        'label'   => esc_html__( 'Base Color', 'walker-charity' ),
		        'description' => esc_html__('This color using for dark background sections','walker-charity'),
		        'section' => 'colors',
		        'settings'   => 'walker_charity_base_color',
		        'priority' => 1
		    ) ) 
		);
	
		$wp_customize->add_setting( 'walker_charity_primary_color', 
			array(
		        'default'        => '#00c781',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walker_charity_primary_color', 
			array(
		        'label'   => esc_html__( 'Primary Color', 'walker-charity' ),
		        'section' => 'colors',
		        'settings'   => 'walker_charity_primary_color',
		        'priority' => 1
		    ) ) 
		);
		$wp_customize->add_setting( 'walker_charity_accent_color', 
			array(
		        'default'        => '#f15754',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walker_charity_accent_color',
			array(
		        'label'   => esc_html__( 'Accent Color', 'walker-charity' ),
		        'section' => 'colors',
		        'settings'   => 'walker_charity_accent_color',
		        'priority' => 2
		    ) ) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walker_charity_heading_color', 
			array(
		        'label'   => esc_html__( 'Heading Color', 'walker-charity' ),
		        'section' => 'colors',
		        'settings'   => 'walker_charity_heading_color',
		        'priority' => 3
		    ) ) 
		);
		$wp_customize->add_setting( 'walker_charity_text_color', 
			array(
		        'default'        => '#727272',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walker_charity_text_color', 
			array(
		        'label'   => esc_html__( 'Text Color', 'walker-charity' ),
		        'section' => 'colors',
		        'settings'   => 'walker_charity_text_color',
		        'priority' => 4
		    ) ) 
		);
		
		$wp_customize->add_setting( 'walker_charity_light_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walker_charity_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walker_charity_light_color', 
			array(
		        'label'   => esc_html__( 'Light Color', 'walker-charity' ),
		        'section' => 'colors',
		        'settings'   => 'walker_charity_light_color',
		        'priority' => 5
		    ) ) 
		);
		
	}

}
add_action( 'customize_register', 'walker_charity_colors_options_register' );