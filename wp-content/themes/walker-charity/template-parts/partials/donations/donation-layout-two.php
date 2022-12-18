<?php
if(walker_charity_set_to_premium() ){ 
$walker_charity_donation_status = get_theme_mod('donation_section_status');
if($walker_charity_donation_status){?>
	<div class="wc-wraper donation-wraper donation-layout-1 donation-layout-2">
		<div class="wc-container">
			<div class="wc-grid-12 text-center">
				<?php 
				if(get_theme_mod('donation_section_heading_text') ){
					echo '<h4 class="section-subheader text-center">'.esc_html(get_theme_mod('donation_section_heading_text')).'</h4>';
				}
				if(get_theme_mod('donation_section_desc_text') ){
					echo '<h2 class="section-heading text-center">'.esc_html(get_theme_mod('donation_section_desc_text')).'</h2>';
				}?>
			</div>
			
		</div>
		<div class="wc-container">
			
				<div class="swiper-container walker-charity-donation-list">
					<div class="swiper-wrapper">
					<?php
						$walker_charity_donation_parent_page= get_theme_mod('walker_charity_donation_page');
						if(!empty($walker_charity_donation_parent_page) && $walker_charity_donation_parent_page != 'None' ){
							$donation_per_page = get_theme_mod('donations_total_items','3');
							$feature_page_id = get_page_by_title( $walker_charity_donation_parent_page );
							$args = array(
								'posts_per_page' => $donation_per_page,
								'post_type' => 'page',
								'post_parent' => $feature_page_id->ID
							);

							$walker_charity_query = new WP_Query( $args );
							if ( $walker_charity_query->have_posts() ) :
							
							while ( $walker_charity_query->have_posts() ) : $walker_charity_query->the_post(); ?>
								<div class="donation-item swiper-slide">
									<div class="donation-box ">
										<?php if ( has_post_thumbnail() ) {?>
										   <div class="img-holder"> <a href="<?php the_permalink();?>"><?php   the_post_thumbnail(); ?></a></div>
										<?php	$content_class="with-thumbnails";
										}else{
											$content_class="without-thumbnails" ;
										} ?>
										<div class="donation-content <?php echo esc_attr($content_class);?>">
											<h4 class="feature-title"><?php the_title();?></h4>
											<p class="feature-description"><?php echo esc_html(walker_charity_excerpt(20)); ?></p>
											<a href="<?php the_permalink();?>" class="primary-button"><span>Donate Now <i class="fas fa-long-arrow-alt-right"></i> </span></a>
										</div>
									</div>
								</a>
								</div>
								<?php
							endwhile;
						endif;
					}?>
				</div>
				<div class="swiper-pagination donation-pagination"></div>
			</div>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
}
}?>