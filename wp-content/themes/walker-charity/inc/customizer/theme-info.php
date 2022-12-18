<?php
/**
*Promotion customizer options
*
* @package gridchamp
*
*/

if (! function_exists('walker_charity_themeinfo_options_register')) {
	function walker_charity_themeinfo_options_register( $wp_customize ) {
		if(!walker_charity_set_to_premium()){
			require get_template_directory() . '/inc/custom-controls/upgrade-control.php';
			$wp_customize->register_section_type( 'Walker_Charity_Customize_Section_Ugrade' );
			$wp_customize->add_section('walker_charity_info_section', 
			 	array(
			        'title' => esc_html__('Theme Information', 'walker-charity'),
			        'priority' => 1,
		
		    	)
			 );

			
            $wp_customize->add_setting( 'walker_charity_info_message_text', 
                array(
                   'sanitize_callback' => 'sanitize_text_field',
                ) 
            );

        $wp_customize->add_control( new Walker_Charity_Custom_Text_Control( $wp_customize, 'walker_charityinfo_message_text', 
            array(
                'label' => esc_html__( 'Find out more details and premium features of the theme', 'walker-charity' ),
                'section' => 'walker_charity_info_section',
                'settings' => 'walker_charity_info_message_text',
                'description' => '',
                'type' => 'walker-charity-custom-text',
                
            ) )
        );
        $walker_charity_info = '';
	    $walker_charity_info.='<ul classs="features-list"><li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('3 More Additional Header Layout','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('3 More Additional Slider Layout','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('14 Home page section','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Home Page Section Reorder','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Footer Options (Copyright text edit & footer scheme color)','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Pagination Option','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Blog Archive and Single Blog Post Meta hide/show option','walker-charity').'</li>';
	    $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('5 Custom Widgets','walker-charity').'</li>';
        $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Portfolio Features','walker-charity').'
        </li>';
        $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Teams Features','walker-charity').'
        </li>';
        $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Brands Logo Showcase Features','walker-charity').'</li>';
        $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Donation Home Section','walker-charity').'</li>';
         $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Testimonial Features','walker-charity').'</li>';
         $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Sticky Menu','walker-charity').'</li>';
        $walker_charity_info.='<li class="walker_charity-info-row list"><label class="row-element">'.esc_html__('Container Width','walker-charity').'</li> </ul>';
	    

	    $walker_charity_info .= '<span class="walker_charity-info-row"><label class="row-element"> </label><a class="button walker_charity-pro-button more-info" href="' . esc_url( 'https://walkerwp.com/walker-charity/' ) . '" target="_blank">' . esc_html__( 'MORE INFO', 'walker-charity' ) . '</a></span>';
	    



        $wp_customize->add_setting( 'walker_charity_upsell_info', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( new walker_charity_Custom_Text_Control( $wp_customize, 'walker_charity_upsell_info', array(
	        'section' => 'walker_charity_info_section',
	        'label'   => $walker_charity_info,
	        'type' => 'walker-charity-custom-text',
	    ) ) );






	}
  }
}
add_action( 'customize_register', 'walker_charity_themeinfo_options_register' );