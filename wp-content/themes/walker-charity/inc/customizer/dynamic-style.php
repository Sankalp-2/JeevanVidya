<?php
    $base_color = sanitize_hex_color( get_theme_mod('walker_charity_base_color','#0d1741'));
    $primary_color = sanitize_hex_color( get_theme_mod( 'walker_charity_primary_color', '#00c781' ) );
    $accent_color = sanitize_hex_color( get_theme_mod( 'walker_charity_accent_color', '#f15754' ) );
    $heading_color = sanitize_hex_color( get_theme_mod( 'walker_charity_heading_color', '#000000' ) );
    $text_color = sanitize_hex_color( get_theme_mod( 'walker_charity_text_color', '#727272' ) );
    $light_color = sanitize_hex_color( get_theme_mod( 'walker_charity_light_color', '#ffffff' ) );
    $banner_overlay_color = sanitize_hex_color( get_theme_mod('walker_charity_slider_bg_color','#0d1741'));
    $banner_overlay_opacity = get_theme_mod('banner_bg_opacity','0.4');
    $banner_text_color = sanitize_hex_color( get_theme_mod('walker_charity_slider_text_color','#ffffff'));
    $single_cta_bg_color = sanitize_hex_color(get_theme_mod('single_cta_bg_color','#0d1741'));
    $single_cta_text_color = sanitize_hex_color(get_theme_mod('single_cta_text_color','#ffffff'));
    $site_font = esc_attr(get_theme_mod('walker_charity_body_fonts','Montserrat'));

    $features_cta_section_padding_top = absint(get_theme_mod('walker_charity_cta_section_padding_top','60'));
    $features_cta_section_padding_bottom = absint(get_theme_mod('walker_charity_cta_section_padding_bottom','80'));
    $about_section_padding_top = absint(get_theme_mod('walker_charity_about_section_padding_top','80'));
    $about_section_padding_bottom= absint(get_theme_mod('walker_charity_about_section_padding_bottom','70'));

    $counter_section_padding_top = absint(get_theme_mod('walker_charity_counter_section_padding_top','10'));
    $counter_section_padding_bottom = absint(get_theme_mod('walker_charity_counter_section_padding_bottom','50'));

    $donation_section_padding_top = absint(get_theme_mod('walker_charity_donation_section_padding_top','60'));
    $donation_section_padding_bottom = absint(get_theme_mod('walker_charity_donation_section_padding_bottom','80'));

    $single_cta_section_padding_top = absint(get_theme_mod('walker_charity_single_cta_section_padding_top','50'));
    $single_cta_section_padding_bottom = absint(get_theme_mod('walker_charity_single_cta_section_padding_bottom','50'));

    $features_section_padding_top = absint(get_theme_mod('walker_charity_featured_section_padding_top','60'));
    $features_section_padding_bottom = absint(get_theme_mod('walker_charity_featured_section_padding_bottom','50'));

    $portfolio_section_padding_top = absint(get_theme_mod('walker_charity_portfolio_section_padding_top','50'));
    $portfolio_section_padding_bottom = absint(get_theme_mod('walker_charity_portfolio_section_padding_bottom','0'));

    $team_section_padding_top = absint(get_theme_mod('walker_charity_team_section_padding_top','50'));
    $team_section_padding_bottom = absint(get_theme_mod('walker_charity_team_section_padding_bottom','50'));

    $extrapage_section_padding_top = absint(get_theme_mod('walker_charity_extra_page_section_padding_top','50'));
    $extrapage_section_padding_bottom = absint(get_theme_mod('walker_charity_extra_page_section_padding_bottom','50'));

    $testimonial_section_padding_top = absint(get_theme_mod('walker_charity_testimonial_section_padding_top','60'));
    $testimonial_section_padding_bottom = absint(get_theme_mod('walker_charity_testimonial_section_padding_bottom','80'));

    $recentpost_section_padding_top = absint(get_theme_mod('walker_charity_recentpost_section_padding_top','50'));
    $recentpost_section_padding_bottom = absint(get_theme_mod('walker_charity_recentpost_section_padding_bottom','60'));

    $contact_section_padding_top = absint(get_theme_mod('walker_charity_contact_section_padding_top','50'));
    $contact_section_padding_bottom = absint(get_theme_mod('walker_charity_contact_section_padding_bottom','0'));

    $brands_section_padding_top = absint(get_theme_mod('walker_charity_brands_section_padding_top','60'));
    $brands_section_padding_bottom = absint(get_theme_mod('walker_charity_brands_section_padding_bottom','60'));

    $logo_section_padding_top = absint(get_theme_mod('walker_charity_main_header_padding_top','25'));
    $logo_section_padding_bottom = absint(get_theme_mod('walker_charity_main_header_padding_bottom','25'));

    $footer_text_color = sanitize_hex_color(get_theme_mod('walker_charity_footer_text_color','#ffffff'));
    $footre_text_link_color = sanitize_hex_color(get_theme_mod('walker_charity_footer_link_color','#ffffff'));
    $footer_text_link_hover_color = sanitize_hex_color(get_theme_mod('walker_charity_footer_link_hover_color','#f15754'));

    $footer_bg_color = sanitize_hex_color(get_theme_mod('walker_charity_footer_background_color','#0d1741'));
    $footer_bg_opacity = get_theme_mod('footer_bg_opacity','1');

    $footer_copyright_bg_color = sanitize_hex_color(get_theme_mod('walker_charity_footer_bottom_color','#0d1741'));
    $footer_copyright_text_color = sanitize_hex_color(get_theme_mod('footer_copyright_bg_color','#ffffff'));
    $copyright_bg_opacity= get_theme_mod('copyright_bg_opacity','1');

    $subheader_bg_color =sanitize_hex_color(get_theme_mod('walker_charity_subheader_background_color','#0d1741'));
    $subheader_bg_opacity = get_theme_mod('subheader_bg_opacity','0');
    $sub_header_text_color = sanitize_hex_color(get_theme_mod('walker_charity_subheader_text_color','#ffffff'));
    $sub_header_space_top = absint(get_theme_mod('walker_charity_subheader_section_padding_top','20'));
    $sub_header_space_bottom = absint(get_theme_mod('walker_charity_subheader_section_padding_bottom','20'));

    $theme_button_radius = absint(get_theme_mod('walker_charity_btns_radius','3'));

    $theme_content_width = absint(get_theme_mod('walker_charity_container_width','1180'));

    $site_brand_name_size = absint(get_theme_mod('walker_charity_site_title_size','40'));
    $branding_section_width= absint(get_theme_mod('walker_charity_branding_width','350'));

    if( $site_font ){
        switch ( $site_font) {
            case "Source Sans Pro:400,700,400italic,700italic":
                $site_font = 'Source Sans Pro';
            break;

            case "Open Sans:400italic,700italic,400,700":
                $site_font = 'Open Sans';
            break;

            case "Oswald:400,700":
                $site_font = 'Oswald';
            break;

            case "Montserrat:400,700":
                $site_font = 'Montserrat';
            break;

            case "Playfair Display:400,700,400italic":
                $site_font = 'Playfair Display';
            break;

            case "Raleway:400,700":
                $site_font = 'Raleway';
            break;

            case "Raleway:400,700":
                $site_font = 'Raleway';
            break;

            case "Droid Sans:400,700":
                $site_font = 'Droid Sans';
            break;

            case "Lato:400,700,400italic,700italic":
                $site_font = 'Lato';
            break;

            case "Arvo:400,700,400italic,700italic":
                $site_font = 'Arvo';
            break;

            case "Lora:400,700,400italic,700italic":
                $site_font = 'Lora';
            break;

            case "Merriweather:400,300italic,300,400italic,700,700italic":
                $site_font = 'Merriweather';
            break;

            case "Oxygen:400,300,700":
                $site_font = 'Oxygen';
            break;

            case "PT Serif:400,700' => 'PT Serif":
                $site_font = 'PT Serif';
            break;

            case "PT Sans:400,700,400italic,700italic":
                $site_font = 'PT Sans';
            break;

            case "PT Sans Narrow:400,700":
                $site_font = 'PT Sans Narrow';
            break;

            case "Cabin:400,700,400italic":
                $site_font = 'Cabin';
            break;

            case "Fjalla One:400":
                $site_font = 'Fjalla One';
            break;

            case "Francois One:400":
                $site_font = 'Francois One';
            break;

            case "Josefin Sans:400,300,600,700":
                $site_font = 'Josefin Sans';
            break;

            case "Libre Baskerville:400,400italic,700":
                $site_font = 'Libre Baskerville';
            break;

            case "Arimo:400,700,400italic,700italic":
                $site_font = 'Arimo';
            break;

            case "Ubuntu:400,700,400italic,700italic":
                $site_font = 'Ubuntu';
            break;

            case "Bitter:400,700,400italic":
                $site_font = 'Bitter';
            break;

            case "Droid Serif:400,700,400italic,700italic":
                $site_font = 'Droid Serif';
            break;

            case "Roboto:400,400italic,700,700italic":
                $site_font = 'Roboto';
            break;

            case "Open Sans Condensed:700,300italic,300":
                $site_font = 'Open Sans Condensed';
            break;

            case "Roboto Condensed:400italic,700italic,400,700":
                $site_font = 'Roboto Condensed';
            break;

            case "Roboto Slab:400,700":
                $site_font = 'Roboto Slab';
            break;

            case "Yanone Kaffeesatz:400,700":
                $site_font = 'Yanone Kaffeesatz';
            break;

            case "Rokkitt:400":
                $site_font = 'Rokkitt';
            break;

            case "Staatliches":
                $site_font = 'Staatliches';
            break;
            case "Poppins:wght@100;200;300;400;500;700":
                $site_font = 'Poppins';
            break;
            case "Abel":
                $site_font = 'Abel';
            break;
            case "Prata":
                $site_font ='Prata';
            break;
            case "Heebo:wght@100;200;300;400;500;700":
                $site_font ='Heebo';
            break;
            case "Quicksand:wght@300;400;500;600;700":
                $site_font ='Quicksand';
            break;

            default:
                $site_font = 'Heebo';
        }
    }else{
        $site_font = 'Heebo';
    }

    $heading_font = esc_attr(get_theme_mod('walker_charity_heading_fonts','Montserrat'));
    if( $heading_font ){
        switch ( $heading_font) {
            case "Source Sans Pro:400,700,400italic,700italic":
                $heading_font = 'Source Sans Pro';
            break;

            case "Open Sans:400italic,700italic,400,700":
                $heading_font = 'Open Sans';
            break;

            case "Oswald:400,700":
                $heading_font = 'Oswald';
            break;

            case "Montserrat:400,700":
                $heading_font = 'Montserrat';
            break;

            case "Playfair Display:400,700,400italic":
                $heading_font = 'Playfair Display';
            break;

            case "Raleway:400,700":
                $heading_font = 'Raleway';
            break;

            case "Raleway:400,700":
                $heading_font = 'Raleway';
            break;

            case "Droid Sans:400,700":
                $heading_font = 'Droid Sans';
            break;

            case "Lato:400,700,400italic,700italic":
                $heading_font = 'Lato';
            break;

            case "Arvo:400,700,400italic,700italic":
                $heading_font = 'Arvo';
            break;

            case "Lora:400,700,400italic,700italic":
                $heading_font = 'Lora';
            break;

            case "Merriweather:400,300italic,300,400italic,700,700italic":
                $heading_font = 'Merriweather';
            break;

            case "Oxygen:400,300,700":
                $heading_font = 'Oxygen';
            break;

            case "PT Serif:400,700' => 'PT Serif":
                $heading_font = 'PT Serif';
            break;

            case "PT Sans:400,700,400italic,700italic":
                $heading_font = 'PT Sans';
            break;

            case "PT Sans Narrow:400,700":
                $heading_font = 'PT Sans Narrow';
            break;

            case "Cabin:400,700,400italic":
                $heading_font = 'Cabin';
            break;

            case "Fjalla One:400":
                $heading_font = 'Fjalla One';
            break;

            case "Francois One:400":
                $heading_font = 'Francois One';
            break;

            case "Josefin Sans:400,300,600,700":
                $heading_font = 'Josefin Sans';
            break;

            case "Libre Baskerville:400,400italic,700":
                $heading_font = 'Libre Baskerville';
            break;

            case "Arimo:400,700,400italic,700italic":
                $heading_font = 'Arimo';
            break;

            case "Ubuntu:400,700,400italic,700italic":
                $heading_font = 'Ubuntu';
            break;

            case "Bitter:400,700,400italic":
                $heading_font = 'Bitter';
            break;

            case "Droid Serif:400,700,400italic,700italic":
                $heading_font = 'Droid Serif';
            break;

            case "Roboto:400,400italic,700,700italic":
                $heading_font = 'Roboto';
            break;

            case "Open Sans Condensed:700,300italic,300":
                $heading_font = 'Open Sans Condensed';
            break;

            case "Roboto Condensed:400italic,700italic,400,700":
                $heading_font = 'Roboto Condensed';
            break;

            case "Roboto Slab:400,700":
                $heading_font = 'Roboto Slab';
            break;

            case "Yanone Kaffeesatz:400,700":
                $heading_font = 'Yanone Kaffeesatz';
            break;

            case "Rokkitt:400":
                $heading_font = 'Rokkitt';
            break;

            case "Staatliches":
                $heading_font = 'Staatliches';
            break;
            case "Poppins:wght@100;200;300;400;500;700":
                $heading_font = 'Poppins';
            break;
            case "Abel":
                $heading_font = 'Abel';
            break;
            case "Prata":
                $heading_font ='Prata';
            break;
            case "Heebo:wght@100;200;300;400;500;700":
                $heading_font ='Heebo';
            break;
            case "Quicksand:wght@300;400;500;600;700":
                $heading_font ='Quicksand';
            break;

            default:
                $heading_font = 'Roboto';
        }
    }else{
        $heading_font = 'Roboto';
    }
    

    $site_font_size = absint(get_theme_mod('walker_charity_font_size','16'));


    $heading_font_one = absint(get_theme_mod('walker_charity_heading_one_size','44'));
    $heading_font_two = absint(get_theme_mod('walker_charity_heading_two_size','36'));
    $heading_font_three = absint(get_theme_mod('walker_charity_heading_three_size','24'));
    $heading_font_four = absint(get_theme_mod('walker_charity_heading_four_size','20'));
    $heading_font_five = absint(get_theme_mod('walker_charity_heading_five_size','16'));
    $heading_font_six = absint(get_theme_mod('walker_charity_heading_six_size','14'));
    
?>
<style type="text/css">
    :root{
        --base-color : <?php echo $base_color; ?>;
        --primary-color: <?php echo $primary_color;?>;
        --accent-color: <?php echo $accent_color;?>;
        --heading-color:<?php echo $heading_color;?>;
        --text-color:<?php echo $text_color;?>;
        --light-color:<?php echo $light_color;?>;
       
    }
    body{
        font-family: '<?php echo $site_font;?>',sans-serif;
        font-size: <?php echo $site_font_size;?>px;
        color: var(--text-color);
    }
    
    h1, h2, h3, h4, h5,h6{
        font-family: '<?php echo $heading_font;?>',sans-serif;
    }
    h1{
        font-size: <?php echo $heading_font_one;?>px;
    }
    h2{
        font-size: <?php echo $heading_font_two;?>px;
    }
    h3{
        font-size: <?php echo $heading_font_three;?>px;
    }
    h4{
        font-size: <?php echo $heading_font_four;?>px;
    }
    h5{
        font-size: <?php echo $heading_font_five;?>px;
    }
    h6{
        font-size: <?php echo $heading_font_six;?>px;
    }
    .wc-wraper.banner-wrapper,
    .wc-wraper.banner-wrapper h1.banner-heading,
    .slide-overlay-text h1,
    span.slider-short-inco p{
    	color: <?php echo $banner_text_color; ?>;
    }
    .wc-wraper.banner-wrapper .banner-background:before{
    	background:<?php echo $banner_overlay_color; ?>;
    	opacity: <?php echo $banner_overlay_opacity;?>;
    }
    .wc-wraper.slider-wrapper.no-gap.banenr-layout-four{
        background:<?php echo $banner_overlay_color; ?>;
    }
    .wc-wraper.slider-wrapper.no-gap.banenr-layout-four .slide-image img{
        opacity: <?php echo $banner_overlay_opacity;?>;
    }
    .wc-wraper.banner-wrapper{
        background:<?php echo $banner_overlay_color; ?>;
    }
    .wc-wraper.single-cta-wraper:before{
        background:<?php echo $single_cta_bg_color;?>;
    }
    .wc-wraper.featured-cta-wraper.featured-cta-two{
        padding-top: <?php echo $features_cta_section_padding_top;?>px;
        padding-bottom: <?php echo $features_cta_section_padding_bottom;?>px;
    }
    .wc-wraper.about-wraper{
        padding-top: <?php echo $about_section_padding_top;?>px;
        padding-bottom: <?php echo $about_section_padding_bottom;?>px;
    }
    .wc-wraper.counter-wraper{
        padding-top: <?php echo $counter_section_padding_top;?>px;
        padding-bottom: <?php echo $counter_section_padding_bottom;?>px;
    }
    .wc-wraper.donation-wraper{
        padding-top: <?php echo $donation_section_padding_top;?>px;
        padding-bottom: <?php echo $donation_section_padding_bottom;?>px;
    }
    .wc-wraper.single-cta-wraper{
        padding-top: <?php echo $single_cta_section_padding_top;?>px;
        padding-bottom: <?php echo $single_cta_section_padding_bottom;?>px;
    }
    .wc-wraper.features-wraper{
        padding-top: <?php echo $features_section_padding_top;?>px;
        padding-bottom: <?php echo $features_section_padding_bottom;?>px;
    }
    .wc-wraper.portfolio-wraper{
        padding-top: <?php echo $portfolio_section_padding_top;?>px;
        padding-bottom: <?php echo $portfolio_section_padding_bottom;?>px;
    }
    .wc-wraper.team-wraper{
        padding-top: <?php echo $team_section_padding_top;?>px;
        padding-bottom: <?php echo $team_section_padding_bottom;?>px;
    }
    .wc-wraper.extrapage-wraper{
        padding-top: <?php echo $extrapage_section_padding_top;?>px;
        padding-bottom: <?php echo $extrapage_section_padding_bottom;?>px;
    }
    .wc-wraper.testimonial-wraper{
        padding-top: <?php echo $testimonial_section_padding_top;?>px;
        padding-bottom: <?php echo $testimonial_section_padding_bottom;?>px;
    }
    .wc-wraper.recentpost-wraper{
        padding-top: <?php echo $recentpost_section_padding_top;?>px;
        padding-bottom: <?php echo $recentpost_section_padding_bottom;?>px;
    }
    .wc-wraper.contact-wraper{
        padding-top: <?php echo $contact_section_padding_top;?>px;
        padding-bottom: <?php echo $contact_section_padding_bottom;?>px;
    }
    .wc-wraper.brands-wraper{
        padding-top: <?php echo $brands_section_padding_top;?>px;
        padding-bottom: <?php echo $brands_section_padding_bottom;?>px;
    }
    .wc-wraper.main-header{
        padding-top: <?php echo $logo_section_padding_top;?>px;
        padding-bottom: <?php echo $logo_section_padding_bottom;?>px;
    }
    .footer-wiget-list #wc-footer-column h1,
    .footer-wiget-list #wc-footer-column h2,
    .footer-wiget-list #wc-footer-column h3,
    .footer-wiget-list #wc-footer-column h4,
    .footer-wiget-list #wc-footer-column h5,
    .footer-wiget-list #wc-footer-column h5,
    .footer-wiget-list #wc-footer-column{
        color:<?php echo $footer_text_color;?>;
    }
    .footer-wiget-list #wc-footer-column a{
        color:<?php echo $footre_text_link_color;?>;
    }
    .footer-wiget-list #wc-footer-column a:hover,
    .footer-wiget-list #wc-footer-column ul.walker-charity-social li a:hover{
        color:<?php echo $footer_text_link_hover_color;?>;
    }
    .wc-wraper.footer-widgets-wraper:before{
        background: <?php echo $footer_bg_color;?>;
        opacity: <?php echo $footer_bg_opacity;?>;
    }
    .wc-wraper.footer-copyright-wraper:before{
        background:<?php echo $footer_copyright_bg_color;?>;
        opacity:<?php echo $copyright_bg_opacity;?>;
    }
    .wc-wraper.footer-copyright-wraper,
    .wc-wraper.footer-copyright-wraper a{
      color:<?php echo $footer_copyright_text_color;?>;
    }
    .wc-wraper.inner-page-subheader{
        background:<?php echo $subheader_bg_color;?>;
        padding-top: <?php echo $sub_header_space_top;?>px;
        padding-bottom: <?php echo $sub_header_space_bottom;?>px;
    }
    .wc-wraper.inner-page-subheader img.header-overlay-image{
        opacity: <?php echo $subheader_bg_opacity;?>;
    }
    .wc-wraper.inner-page-subheader .page-header-title,
    .wc-wraper.inner-page-subheader .walker-charity-breadcrumbs,
    .wc-wraper.inner-page-subheader .walker-charity-breadcrumbs a{
        color:<?php echo $sub_header_text_color; ?>;
    }
    .wc-wraper.inner-page-subheader .walker-charity-breadcrumbs a:hover{
        color: var(--accent_color);

    }
    a.primary-button, 
    a.secondary-button, 
    .primary-button, 
    .secondary-button,
    a.primary-button:before,
    a.secondary-button:before,
    .primary-button:before,
    .secondary-button:before{
        border-radius: <?php echo $theme_button_radius;?>px;
    }
    .wc-container{
        max-width: <?php echo $theme_content_width;?>px;
    }
    .wc-container.full-width{
        max-width: 100%;
    }
    .site-branding{
        max-width: <?php echo $branding_section_width.'px';?>;
    }
    
    .wc-wraper.single-cta-wraper .cta-box h1{
        color: <?php echo $single_cta_text_color;?>;
    }
    .site-branding h1.site-title{
        font-size: <?php echo $site_brand_name_size;?>px;
    }
    .site-branding a.custom-logo-link img{
        height: <?php echo $site_brand_name_size;?>px;
        width: auto;
    }
</style>
