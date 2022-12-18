<?php
/**
*Social Media customizer options
*
* @package walker_charity
*
*/

if (! function_exists('walker_charity_social_options_register')) {
    function walker_charity_social_options_register( $wp_customize ) {
        // Social media 
        $wp_customize->add_section('walker_charity_social_setup', 
          array(
            'title' => esc_html__('Social Media', 'walker-charity'),
            'panel' => 'walker_charity_theme_option',
            'priority' => 6
          )
        );

        //Facebook Link
        $wp_customize->add_setting( 'walker_charity_facebook',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_facebook', 
            array(
              'label'   => esc_html__( 'Facebook', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_facebook',
              'type'     => 'text',
              'priority' => 1
          )
        );
        $wp_customize->selective_refresh->add_partial( 'walker_charity_facebook', array(
            'selector' => '.walker-charity-top-header ul.walker-charity-social',
        ) );
        //Twitter Link
        $wp_customize->add_setting( 'walker_charity_twitter',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_twitter', 
            array(
              'label'   => esc_html__( 'Twitter', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_twitter',
              'type'     => 'text',
              'priority' => 2
          )
        );
        $wp_customize->selective_refresh->add_partial( 'walker_charity_twitter', array(
            'selector' => '.walker-charity-top-header ul.walker-charity-social',
        ) );
        //Youtube Link
        $wp_customize->add_setting( 'walker_charity_youtube',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_youtube', 
            array(
              'label'   => esc_html__( 'Youtube', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_youtube',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Instagram
        $wp_customize->add_setting( 'walker_charity_instagram',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_instagram', 
            array(
              'label'   => esc_html__( 'Instagram', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_instagram',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Linkedin
        $wp_customize->add_setting( 'walker_charity_linkedin',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_linkedin', 
            array(
              'label'   => esc_html__( 'Linkedin', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_linkedin',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Google
        $wp_customize->add_setting( 'walker_charity_google',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_google', 
            array(
              'label'   => esc_html__( 'Google Business', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_google',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'walker_charity_pinterest',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_pinterest', 
            array(
              'label'   => esc_html__( 'Pinterest', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_pinterest',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'walker_charity_vk',
          array(
            'default'        => '',
            'sanitize_callback' => 'walker_charity_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walker_charity_vk', 
            array(
              'label'   => esc_html__( 'VK', 'walker-charity' ),
              'section' => 'walker_charity_social_setup',
              'settings'   => 'walker_charity_vk',
              'type'     => 'text',
              'priority' => 2
          )
        );
        
    }

}
add_action( 'customize_register', 'walker_charity_social_options_register' );