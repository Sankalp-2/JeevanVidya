<?php
/**
 * Template Name: Frontpage Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_Charity
 */

get_header();

if(walker_charity_set_to_premium() ){

	$default_order = array( 'features-cta','about-us','counter', 'donation', 'single-cta','features', 'portfolios','teams','extra-page','testimonial','recentpost','contact-section','brands');
	$walker_charity_sections = get_theme_mod( 'walker_charity_section_order', $default_order );
	
		if( !empty($walker_charity_sections) ):
			foreach ($walker_charity_sections as $section) {
				//echo $section;
				switch ( $section ) {
					case "features-cta":
						walker_charity_featured_cta();
					break;
					case "about-us":
						walker_charity_about_section();
					break;
					case "counter":
						walker_charity_counter_section();
					break;
					case "donation":
						walker_charity_donation_section();
					break;
					case "single-cta":
						walker_charity_cta_section();
					break;
					case "features":
						walker_charity_feartures_section();
					break;
					case "portfolios":
						walker_charity_portfolio_section();
					break;
					case "teams":
						walker_charity_team_section();
					break;
					case "extra-page":
						walker_charity_extrapage_section();
					break;
					case "testimonial":
						walker_charity_testimonial_section();
					break;
					case "recentpost":
						walker_charity_recentpost_section();
					break;
					case "contact-section":
						walker_charity_contact_section();
					break;
					case "brands":
						walker_charity_brands_section();
					break;
				}
			}
		endif;
}else{
	walker_charity_featured_cta();
	walker_charity_about_section();
	walker_charity_extrapage_section();
	walker_charity_testimonial_section();
	walker_charity_recentpost_section();
	walker_charity_cta_section();
}
get_footer();