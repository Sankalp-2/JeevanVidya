<?php 
if(walker_charity_set_to_premium() ){ 
if(get_theme_mod('testimonial_status')){?>
<div class="wc-wraper testimonial-wraper testimonial-layout-2">
	<div class="wc-container header-container">
		<div class="wc-grid-8">
			<?php 
				if(get_theme_mod('testimonial_heading_text')){
					echo '<h4 class="section-subheader">'. esc_html( get_theme_mod('testimonial_heading_text') ) .'</h4>';
				}
				if(get_theme_mod('testimonial_desc_text')){
					echo '<h2 class="section-heading">'. esc_html( get_theme_mod('testimonial_desc_text') ) .'</h2>';
				}
			?>
		</div>
	</div>
		<?php
			if(get_theme_mod('testimonials_total_items')){
				$total_testimonials_to_show = get_theme_mod('testimonials_total_items');
			}else{
				$total_testimonials_to_show=4;
			}
			
			$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_testimonials', 'order'=> 'DESC', 'posts_per_page' => $total_testimonials_to_show) );
		
			?>
			<div class="wc-container testimonial-container">
				<div class="swiper-container walker-charity-testimonial-2">
	      			<div class="swiper-wrapper">
						<?php while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post(); ?>
							<div class="swiper-slide">
						    	<div class="walkerwp-testimonial-box">
							  		
									
									<div class="review-part">
										
										<p class="review-message"><?php echo walker_charity_excerpt('300');?></p>
										<div class="testimonial-footer">
											<?php 
										    	if ( has_post_thumbnail() ) {?>
													<div class="testimonial-thumbnail"><?php the_post_thumbnail(); ?>
													</div>
												<?php	} ?>
											<h4 class="reviewer-name"><?php  the_title(); ?></h4>
										</div>					
									</div>

								</div>
							</div>
						<?php endwhile; 
						wp_reset_postdata(); ?>
					</div>
					<div class="swiper-pagination testimonial-nav"></div>
				</div>
			</div>

</div>
<?php } 
}?>