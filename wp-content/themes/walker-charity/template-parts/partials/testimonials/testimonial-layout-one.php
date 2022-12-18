<?php 
if(get_theme_mod('testimonial_status')){
$testimonial_section_bg='';
if(get_theme_mod('testimonial_bg_image')){
	$testimonial_section_bg= get_theme_mod('testimonial_bg_image');
}?>
<div class="wc-wraper testimonial-wraper testimonial-layout-1" style="background: url(<?php echo esc_url($testimonial_section_bg);?>) no-repeat; background-size: cover; background-attachment: fixed;">
		<div class="wc-container header-container text-center">
			<?php 
				if(get_theme_mod('testimonial_heading_text')){
					echo '<h4>'. esc_html( get_theme_mod('testimonial_heading_text') ) .'</h4>';
				}
				if(get_theme_mod('testimonial_desc_text')){
					echo '<h2>'. esc_html( get_theme_mod('testimonial_desc_text') ) .'</h2>';
				}
			?>
		</div>
		<?php
			if(get_theme_mod('testimonials_total_items')){
				$total_testimonials_to_show = get_theme_mod('testimonials_total_items');
			}else{
				$total_testimonials_to_show=4;
			}
			if(walker_charity_set_to_premium()){
				$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_testimonials', 'order'=> 'DESC', 'posts_per_page' => $total_testimonials_to_show) );
			}else{
				$tesitimonial_cat = get_theme_mod('walker_charity_testimonial_category');
				$walker_charity_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $total_testimonials_to_show, 'category_name' => $tesitimonial_cat) );
			}
			?>
			<div class="wc-container testimonial-container">
				<div class="swiper-container walker-charity-testimonial">
	      			<div class="swiper-wrapper">
						<?php while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post(); ?>
							<div class="swiper-slide">
						    	<div class="walkerwp-testimonial-box text-center">
							  		<?php 
							    	if ( has_post_thumbnail() ) {?>
										<div class="testimonial-thumbnail"><?php the_post_thumbnail(); ?>
										</div>
									<?php	} ?>
									
									<div class="review-part">
										<i class="fas fa-quote-left"></i>
										<p class="review-message"><?php echo walker_charity_excerpt('300');?></p>
										<h4 class="reviewer-name"><?php  the_title(); ?></h4>						
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
<?php } ?>