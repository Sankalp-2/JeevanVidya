<?php
/**
*Typography customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_typography_options_register')) {
	function walker_charity_typography_options_register( $wp_customize ) {
	//Typography
		$wp_customize->add_section('walker_charity_site_typography', 
		 	array(
		        'title' => esc_html__('Typography', 'walker-charity'),
		        'panel' =>'walker_charity_theme_option',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$font_choices = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
			'Staatliches' => 'Staatliches',
		    'Poppins:wght@100;200;300;400;500;700' => 'Poppins',
		    'Abel' => 'Abel',
		    'Prata' => 'Prata',
		    'Heebo:wght@100;200;300;400;500;700' => 'Heebo',
		    'Quicksand:wght@300;400;500;600;700' => 'Quicksand',
		);

		$wp_customize->add_setting( 'walker_charity_body_fonts', array(
				'sanitize_callback' => 'walker_charity_sanitize_fonts',
				'default' => 'Heebo:wght@100;200;300;400;500;700',
			)
		);

		$wp_customize->add_control( 'walker_charity_body_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Body Typography', 'walker-charity' ),
				'description'		  => esc_html__( 'Body Font', 'walker-charity' ),
				'section' => 'walker_charity_site_typography',
				'choices' => $font_choices
			)
		);
		$wp_customize->add_setting( 'walker_charity_font_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 16,
			) 
		);

		$wp_customize->add_control( 'walker_charity_font_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_font_size',
				'label' => '',
				'description' => esc_html__( 'Font Size','walker-charity' ),
				
			) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_fonts', array(
				'sanitize_callback' => 'walker_charity_sanitize_fonts',
				'default' => 'Roboto:400,400italic,700,700italic',
			)
		);

		$wp_customize->add_control( 'walker_charity_heading_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Heading Typography', 'walker-charity' ),
				'description' => esc_html__('Heading Font','walker-charity'),
				'section' => 'walker_charity_site_typography',
				'choices' => $font_choices
			)
		);
		$wp_customize->add_setting( 'walker_charity_heading_one_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 44,
			) 
		);

		$wp_customize->add_control( 'walker_charity_heading_one_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_heading_one_size',
				'label' => '',
				'description' => esc_html__( 'Font Size for H1','walker-charity' ),
				
			) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_two_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 36,
			) 
		);

		$wp_customize->add_control( 'walker_charity_heading_two_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_heading_two_size',
				'label' => '',
				'description' => esc_html__( 'Font Size for H2','walker-charity' ),
				
			) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_three_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 24,
			) 
		);

		$wp_customize->add_control( 'walker_charity_heading_three_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_heading_three_size',
				'label' => '',
				'description' => esc_html__( 'Font Size for H3','walker-charity' ),
				
			) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_four_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 20,
			) 
		);

		$wp_customize->add_control( 'walker_charity_heading_four_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_heading_four_size',
				'label' => '',
				'description' => esc_html__( 'Font Size for H4','walker-charity' ),
				
			) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_five_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 16,
			) 
		);

		$wp_customize->add_control( 'walker_charity_heading_five_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_heading_five_size',
				'label' => '',
				'description' => esc_html__( 'Font Size for H5','walker-charity' ),
				
			) 
		);
		$wp_customize->add_setting( 'walker_charity_heading_six_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walker_charity_sanitize_number_absint',
				'default' => 13,
			) 
		);

		$wp_customize->add_control( 'walker_charity_heading_six_size', 
			array(
				'type' => 'number',
				'section' => 'walker_charity_site_typography',
				'settings' => 'walker_charity_heading_six_size',
				'label' => '',
				'description' => esc_html__( 'Font Size for H6','walker-charity' ),
				
			) 
		);
		
	}

}
add_action( 'customize_register', 'walker_charity_typography_options_register' );