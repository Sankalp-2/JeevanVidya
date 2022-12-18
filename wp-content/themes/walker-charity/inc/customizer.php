<?php
/**
 * walker Charity Theme Customizer
 *
 * @package walker_Charity
 */
/**
*
*Custom controls for theme
*/
require get_template_directory() . '/inc/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function walker_charity_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'walker_charity_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'walker_charity_customize_partial_blogdescription',
			)
		);
	}
	//Panel register for theme option
    $wp_customize->add_panel( 'walker_charity_theme_option', 
	  	array(
		    'priority'       => 20,
		    'capability'     => 'edit_theme_options',
		    'title'      => esc_html__('Theme Options', 'walker-charity'),
		) 
	);
	//Panel register for theme option
    $wp_customize->add_panel( 'walker_charity_frontpage_option', 
	  	array(
		    'priority'       => 30,
		    'capability'     => 'edit_theme_options',
		    'title'      => esc_html__('Frontpage Setup', 'walker-charity'),
		) 
	);
	$wp_customize->add_setting(
    	'walker_charity_site_title_size',
    	array(
	        'default'			=> 40,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'walker_charity_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new Walker_Charity_Customizer_Range_Control( $wp_customize, 'walker_charity_site_title_size', 
		array(
			'label'      => __( 'Logo Size [PX]', 'walker-charity'),
			'section'  => 'title_tagline',
			'settings' => 'walker_charity_site_title_size',
            'input_attrs' => array(
				'min'    => 10,
				'max'    => 150,
				'step'   => 1,
			),
		) ) 
	);

	$wp_customize->add_setting(
    	'walker_charity_branding_width',
    	array(
	        'default'			=> 350,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'walker_charity_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new Walker_Charity_Customizer_Range_Control( $wp_customize, 'walker_charity_branding_width', 
		array(
			'label'      => __( 'Branding Section Width', 'walker-charity'),
			'section'  => 'title_tagline',
			'settings' => 'walker_charity_branding_width',
            'input_attrs' => array(
				'min'    => 10,
				'max'    => 1000,
				'step'   => 1,
			),
		) ) 
	);
}
add_action( 'customize_register', 'walker_charity_customize_register' );

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/sanitization_functions.php';


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */

require get_template_directory() . '/inc/customizer/color-options.php';
require get_template_directory() . '/inc/customizer/typography-options.php';
require get_template_directory() . '/inc/customizer/social-medias.php';
require get_template_directory() . '/inc/customizer/footer-options.php';
require get_template_directory() . '/inc/customizer/header-options.php';
require get_template_directory() . '/inc/customizer/frontpage-options.php';
require get_template_directory() . '/inc/customizer/blog-options.php';
require get_template_directory() . '/inc/customizer/pagetitle-options.php';

function walker_charity_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function walker_charity_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
*
*Enqueue customizer styles and scripts
*/
function walker_charity_customize_controls_register_scripts() {
	wp_enqueue_style( 'walker-charity-customizer-styles', get_template_directory_uri() . '/inc/customizer/walker-charity-customizer-style.css', array(), WALKER_CHARITY_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'walker_charity_customize_controls_register_scripts', 0 );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function walker_charity_customize_preview_js() {
	wp_enqueue_script( 'walker-charity-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), WALKER_CHARITY_VERSION, true );
}
add_action( 'customize_preview_init', 'walker_charity_customize_preview_js' );
