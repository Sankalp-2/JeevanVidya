<?php 
if(walker_charity_set_to_premium() ){ 
 if(get_theme_mod('portfolio_status')){?>
	<div class="wc-wraper portfolio-wraper portfolio-layout-1">
		<div class="wc-container">
			<div class="wc-grid-8">
				<?php if(get_theme_mod('portfolio_heading_text')){?>
					<h4 class="section-subheader"><?php echo esc_html(get_theme_mod('portfolio_heading_text'));?></h4>
				<?php }
				if(get_theme_mod('portfolio_desc_text')){?>
					<h2 class="section-heading"><?php echo esc_html(get_theme_mod('portfolio_desc_text'));?></h2>
				<?php } ?>
			</div>
			<div class="wc-grid-4 portfolio-button-col">
				<?php 
				if(get_theme_mod('portfolio_btn_text')){
					if(get_theme_mod('portfolio_btn_url')){
						$more_portfolio_link = get_theme_mod('portfolio_btn_url');
					}else{
						$more_portfolio_link='#';
					}

					if(get_theme_mod('portfolio_btn_target')){
						$more_portfolio_link_target='_blank';
					}else{
						$more_portfolio_link_target='_self';
					}
					?>
					<a href="<?php echo esc_url($more_portfolio_link);?>" class="more-features primary-button" target="<?php echo esc_attr($more_portfolio_link_target);?>">
						<span><?php echo esc_html(get_theme_mod('portfolio_btn_text'));?> <i class="fas fa-long-arrow-alt-right"></i> </span>
						</a>
				<?php }
				?>
			</div>
		</div>
		<div class="portfolio-list wc-container portfolio-slider-container full-width">
			<div class="swiper-container walker-charity-portfolio-slider">
				<div class="swiper-wrapper">
					<?php 
					if(get_theme_mod('portfolio_total_items')){
						$total_items_to_show = get_theme_mod('portfolio_total_items');
					}else{
						$total_items_to_show=6;
					}
					$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_portfolio', 'order'=> 'DESC', 'posts_per_page' => $total_items_to_show) );
			    	while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>
			    		<div class="swiper-slide">
				  			<div class="walkerwp-portfolio-box ">
					  			<a href="<?php the_permalink();?>"><?php 
							    	if ( has_post_thumbnail() ) {?>
										<div class="portfolio-image"><?php the_post_thumbnail(); ?></div>
									<?php	
									} ?>
									<span class="more-portfolio"><i class="fas fa-external-link-alt"></i></span>
									<div class="content-part">
										<h3 class="portfolio-title"><?php  the_title(); ?></h3>
									</div>
								</a>
							</div>
						</div>
					<?php endwhile; 
					wp_reset_postdata(); ?>
				</div>
				<div class="folio-pagination"></div>
			</div>
		</div>
	</div>
<?php }
}
?>