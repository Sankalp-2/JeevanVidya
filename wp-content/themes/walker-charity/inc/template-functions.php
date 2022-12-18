<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package walker_Charity
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function walker_charity_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'walker_charity_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function walker_charity_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'walker_charity_pingback_header' );
if(!function_exists('walker_charity_footer_copyright')){
	function walker_charity_footer_copyright(){
		$copyright_status = get_theme_mod('enable_copyright_section_footer','true');
		if($copyright_status==true){
		?>
		<div class="wc-wraper footer-copyright-wraper">
			<?php
			if(get_theme_mod('copyright_text_alignment') =='copyright-text-align-center'){
					$copyright_text_align_class ="text-center";
				}else{
					$copyright_text_align_class ="text-left";
				}
			?>
			<div class="wc-container credit-container <?php echo esc_attr($copyright_text_align_class);?>">
				<?php
					$walker_charity_copyright = get_theme_mod('footer_copiright_text');
					

					if($walker_charity_copyright && walker_charity_set_to_premium() ){?>
						<div class="site-info <?php echo esc_attr($copyright_text_align_class);?>"><?php echo wp_kses_post($walker_charity_copyright);?></div>
					<?php } else{ ?>
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'walker-charity' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'walker-charity' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'walker-charity' ), 'Walker Charity', '<a href="http://walkerwp.com/">WalkerWP</a>' );
							?>

					</div><!-- .site-info -->
				<?php } 
				$bottom_social_icons= get_theme_mod('footer_copyright_social_status','true');
				if($bottom_social_icons){
				?>
					<div class="footer-social-icons">
						<?php get_template_part( 'template-parts/partials/social-media'); ?>
					</div>
				<?php } ?>
				</div>
			</div>
		<?php }
	}
}

if(!function_exists('walker_charity_header')){
	function walker_charity_header(){
		if(walker_charity_set_to_premium() ){
			$walker_charity_current_header = get_theme_mod('walker_charity_select_header_layout','walker-charity-header-one');
			if($walker_charity_current_header =='walker-charity-header-four'){
				get_template_part( 'template-parts/partials/header/header-layout-four');
			}
			elseif($walker_charity_current_header =='walker-charity-header-three'){
				get_template_part( 'template-parts/partials/header/header-layout-three');
			}
			elseif($walker_charity_current_header =='walker-charity-header-two'){
				get_template_part( 'template-parts/partials/header/header-layout-two');
			}else{
				get_template_part( 'template-parts/partials/header/header-layout-one');	
			}
		}else{
			get_template_part( 'template-parts/partials/header/header-layout-one');
		}
	}
}

if(! function_exists('walker_charity_banner')){
	function walker_charity_banner(){
		if(get_theme_mod('banner_section_status')){
			$walker_charity_current_banner = get_theme_mod('walker_charity_select_banner_layout','walker-charity-banner-layout-four');
			if(walker_charity_set_to_premium() ){
				if($walker_charity_current_banner == 'walker-charity-banner-layout-five'){
					get_template_part( 'template-parts/partials/banner/banner-layout-five');
				}elseif($walker_charity_current_banner == 'walker-charity-banner-layout-four'){
					get_template_part( 'template-parts/partials/banner/banner-layout-four');
				}elseif($walker_charity_current_banner == 'walker-charity-banner-layout-three'){
					get_template_part( 'template-parts/partials/banner/banner-layout-three');
				}elseif($walker_charity_current_banner == 'walker-charity-banner-layout-two'){
					get_template_part( 'template-parts/partials/banner/banner-layout-two');
				}else{
					get_template_part( 'template-parts/partials/banner/banner-layout-one');
				}
			}else{
				if($walker_charity_current_banner == 'walker-charity-banner-layout-one'){
					get_template_part( 'template-parts/partials/banner/banner-layout-one');
				}else{
					get_template_part( 'template-parts/partials/banner/banner-layout-four');
				}
				
			}
		}
	}
}

if(!function_exists('walker_charity_header_location')){
	function walker_charity_header_location(){
		if(get_theme_mod('walker_charity_header_location_address_link')){
			$walker_charity_header_location_link = get_theme_mod('walker_charity_header_location_address_link');
		}else{
			$walker_charity_header_location_link='#';
		}
		if(get_theme_mod('walker_charity_header_location_address')){?>
			<span class="header-location">
				<a href="<?php echo esc_url($walker_charity_header_location_link);?>" target="_blank"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html(get_theme_mod('walker_charity_header_location_address')); ?></a>
			</span>
		<?php }
	}
}

if(!function_exists('walker_charity_header_phone')){
	function walker_charity_header_phone(){?>
		<?php if(get_theme_mod('walker_charity_header_slogan_text') || get_theme_mod('walker_charity_header_contact')){
			$tel_tag_link = get_theme_mod('walker_charity_header_contact');
			?>
			<span class="header-slogan">
			<?php 
			if(get_theme_mod('walker_charity_header_slogan_text')){
				echo esc_html(get_theme_mod('walker_charity_header_slogan_text'));
			}
			?> 
			<a href="<?php echo esc_url( 'tel:' . $tel_tag_link ); ?>" class="header-phone"><i class="fas fa-phone-alt"></i> <?php echo esc_html(get_theme_mod('walker_charity_header_contact'));?></a>
		</span>
		<?php }		
	 }
}
if(!function_exists('walker_charity_header_email_address')){
	function walker_charity_header_email_address(){
		if(get_theme_mod('walker_charity_header_email')){
			$header_email = get_theme_mod('walker_charity_header_email');
			?>
			<span class="header-email"><a href="<?php echo esc_url( 'mailto:' . $header_email ); ?>"><i class="fa fa-envelope" aria-hidden="true"></i>
 <?php echo esc_html($header_email);?></a></span>
		<?php }
	}
}

if(!function_exists('walker_charity_navigation')):
	function walker_charity_navigation(){?>
		<nav id="site-navigation" class="main-navigation">
				<button type="button" class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
	<?php }
endif;

if(! function_exists('walker_charity_header_search_icon')):
	function walker_charity_header_search_icon(){
		//if(get_theme_mod('search_icon_status')){
		?>
			<span class="header-icon-search">
				<button class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></button>
				<!-- The Modal -->
				<div id="searchModel" class="search-modal modal">
					<div class="modal-content">
						<div class="modal-body">
							<button  class="modal-close">&times;</button>
							<p><?php get_search_form(); ?></p>
						</div>
					</div>
				</div>
			</span>

		<?php
	 }
endif;

if(! function_exists('walker_charity_header_cart_icon')):
	function walker_charity_header_cart_icon(){
		if(get_theme_mod('cart_icon_status') && class_exists( 'woocommerce' ) ){?>
			<span class="header-cart-icon"><a class="header-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','walker-charity' ); ?>"> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="item-count"><?php echo  WC()->cart->get_cart_contents_count(); ?> </span></a></span>
		<?php } 
	}
endif;

if(! function_exists('walker_charity_header_primary_button')):
	function walker_charity_header_primary_button(){
		if(get_theme_mod('primary_btn_link')){
			$primary_button_link = get_theme_mod('primary_btn_link');
		}else{
			$primary_button_link ='#';
		}
		if(get_theme_mod('primary_btn_link_target')){
			$primary_button_target='_blank';
		}else{
			$primary_button_target='_self';
		}
		?>
		<?php if(get_theme_mod('walker_charity_header_primary_button')){?>
		 <a href="<?php echo esc_url($primary_button_link); ?>" class="primary-button header-button" target="<?php echo esc_attr($primary_button_target);?>"><span><?php echo esc_html(get_theme_mod('walker_charity_header_primary_button'));?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
		  <?php }
	 }
endif;

if(! function_exists('walker_charity_header_secondary_button')):
	function walker_charity_header_secondary_button(){
		if(get_theme_mod('secondary_btn_link')){
			$secondary_button_link = get_theme_mod('secondary_btn_link');
		}else{
			$secondary_button_link ='#';
		}
		if(get_theme_mod('secondary_btn_link_target')){
			$secondary_button_target='_blank';
		}else{
			$secondary_button_target='_self';
		}
		?>
		<?php if(get_theme_mod('walker_charity_header_secondary_button')){?>
		 <a href="<?php echo esc_url($secondary_button_link);?>" class="secondary-button header-button" target="<?php echo esc_attr($secondary_button_target);?>"><span><?php echo esc_html(get_theme_mod('walker_charity_header_secondary_button'));?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
	<?php }
	}
endif;
if(!function_exists('walker_charity_footer_widgets_status')){
	function walker_charity_footer_widgets_status(){
		$walker_charity_footer_widgets= false;
		if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' ) ||  is_active_sidebar( 'footer-3' ) ||  is_active_sidebar( 'footer-4' ) ){
			$walker_charity_footer_widgets= true;
		}
		return $walker_charity_footer_widgets;
	}
}

if(!function_exists('walker_charity_footer_before')){
	function walker_charity_footer_before(){
		$footer_background_img='';
		if(walker_charity_set_to_premium()){
			$footer_background_img = get_theme_mod('footer_bg_image');
		}
		?>
		<footer id="colophon" class="site-footer" style="background:url(<?php echo esc_url($footer_background_img);?>) no-repeat; background-size: cover;">
	<?php }
}

if(!function_exists('walker_charity_footer_after')){
	function walker_charity_footer_after(){?>
		</footer><!-- #colophon -->
	<?php }
}

if(! function_exists('walker_charity_scroll_top')):
	function walker_charity_scroll_top(){
		if(get_theme_mod('enable_scroll_top_icon','true')){ ?>
			<a href="#" class="walker-charity-top"><i class="fas fa-arrow-up"></i></a>
	<?php }
	}
endif;


if(!function_exists('walker_charity_subheader')){
	function walker_charity_subheader(){
		if(get_theme_mod('enable_sub_header_section','true')){?>
			<div class="wc-wraper inner-page-subheader no-gap">
				<?php
				if(get_theme_mod('subheader_bg_image') && walker_charity_set_to_premium() ){
					$header_background_img = get_theme_mod('subheader_bg_image');?>
					<img class="header-overlay-image" src="<?php echo esc_url($header_background_img);?>" />
				<?php }
				?>
				
				<div class="wc-container">
					<div class="wc-grid-12">
						<?php if(get_theme_mod('enable_sub_header_section_title','true')){?>
							<h2 class="page-header-title">
							<?php 
								if(is_search()){
									$walker_charity_title= __('Search', 'walker-charity');
								}elseif(is_404()){
									$walker_charity_title = __('404', 'walker-charity');
								}elseif(is_archive()){
									$walker_charity_title = the_archive_title();
								}elseif(is_home() || is_front_page() ){
									$walker_charity_title = __('Home','walker-charity');
								}else{
									$walker_charity_title = get_the_title();
								}?>
								<?php echo $walker_charity_title; ?>
									
								</h2>
							<?php } ?>

							<?php
							if(get_theme_mod('enable_sub_header_section_breadcrumbs','true')){?>
								<div class="walker-charity-breadcrumbs"><?php breadcrumb_trail();?></div>
							<?php } ?>
					</div>
				</div>
			</div>
			<?php 
		} 
	}
}

if(!function_exists('walker_charity_pagination_section')){
	function walker_charity_pagination_section(){
		if(walker_charity_set_to_premium() ){
			 $recent_paginate_style = (get_theme_mod('blog_pagination_style','normal-paginate-style'));
			 if($recent_paginate_style=='numeric-paginate-style'){
			 	walker_charity_pagination();
			}else{
				the_posts_navigation();
			}
		}else{
			the_posts_navigation();
		}
	}
}

if(!function_exists('walker_charity_featured_cta')){
	function walker_charity_featured_cta(){
		if(walker_charity_set_to_premium() ){
			$feature_cta_layout = get_theme_mod('walker_featured_cta_layout','features-cta-2');
			if($feature_cta_layout=='features-cta-1'){
				get_template_part( 'template-parts/partials/cta/featured-cta');
			}else{
				get_template_part( 'template-parts/partials/cta/featured-cta-two');
			}
		}else{
			get_template_part( 'template-parts/partials/cta/featured-cta-two');
		}
	}
}
if(!function_exists('walker_charity_about_section')){
	function walker_charity_about_section(){
		get_template_part( 'template-parts/partials/about/about-layout-one');
	}
}
if(!function_exists('walker_charity_counter_section')){
	function walker_charity_counter_section(){
		get_template_part( 'template-parts/partials/counter/counter-layout-one');
	}
}
if(!function_exists('walker_charity_donation_section')){
	function walker_charity_donation_section(){
		$donation_layout= get_theme_mod('donation_section_layout','donation-carousel-layout');
		if($donation_layout =='donation-grid-layout'){
			get_template_part( 'template-parts/partials/donations/donation-layout-one');
		}else{
			get_template_part( 'template-parts/partials/donations/donation-layout-two');
		}
	}
}
if(!function_exists('walker_charity_cta_section')){
	function walker_charity_cta_section(){
		get_template_part( 'template-parts/partials/cta/cta-layout');
	}
}
if(!function_exists('walker_charity_feartures_section')){
	function walker_charity_feartures_section(){
		get_template_part( 'template-parts/partials/features/features-layout-one');
	}
}
if(!function_exists('walker_charity_portfolio_section')){
	function walker_charity_portfolio_section(){
		$portfolio_layout = get_theme_mod('walker_charity_portfolio_layout','grid-layout');
		if($portfolio_layout=='carousel-layout'){
			get_template_part( 'template-parts/partials/portfolio/portfolio-carousel');
		}else{
			get_template_part( 'template-parts/partials/portfolio/portfolio-grid');
		}
	}
}
if(!function_exists('walker_charity_team_section')){
	function walker_charity_team_section(){
		get_template_part( 'template-parts/partials/team/team-layout-one');
	}
}
if(!function_exists('walker_charity_extrapage_section')){
	function walker_charity_extrapage_section(){
		get_template_part( 'template-parts/partials/extra-pages/extrapage-layout-two');
	}
}
if(!function_exists('walker_charity_testimonial_section')){
	function walker_charity_testimonial_section(){
		if(walker_charity_set_to_premium() ){
			$testimonial_layout = get_theme_mod('walker_charity_testimonial_layout','testimonial-layout-1');
			if($testimonial_layout == 'testimonial-layout-2'){
				get_template_part( 'template-parts/partials/testimonials/testimonial-layout-two');
			}else{
				get_template_part( 'template-parts/partials/testimonials/testimonial-layout-one');
			}
		}else{
			get_template_part( 'template-parts/partials/testimonials/testimonial-layout-one');
		}
		
	}
}
if(!function_exists('walker_charity_recentpost_section')){
	function walker_charity_recentpost_section(){
		get_template_part( 'template-parts/partials/recentposts/recentpost-layout-one');
	}
}
if(!function_exists('walker_charity_contact_section')){
	function walker_charity_contact_section(){
		get_template_part( 'template-parts/partials/contact/contact-layout-one');
	}
}
if(!function_exists('walker_charity_brands_section')){
	function walker_charity_brands_section(){
		if(walker_charity_set_to_premium() ){
			$brand_layout = get_theme_mod('walker_charity_brands_layout','brands-layout-1');
			if($brand_layout=='brands-layout-2'){
				get_template_part( 'template-parts/partials/brands/brands-layout-two');
			}else{
				get_template_part( 'template-parts/partials/brands/brands-layout-one');
			}
		}else{
			get_template_part( 'template-parts/partials/brands/brands-layout-one');
		}
	}
}
