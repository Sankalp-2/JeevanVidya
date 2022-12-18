<?php 
if(walker_charity_set_to_premium() ){ 
	if(get_theme_mod('brand_status')){?>
		<div class="wc-wraper brands-wraper brands-layout-1">
			<div class="wc-container text-center">
				<div class="walkerwp-grid-12">
				<?php 
					if(esc_attr(get_theme_mod('brands_heading_text')) ){
						echo '<h4 class=" section-subheader text-center">'.esc_attr(get_theme_mod('brands_heading_text')).'</h4>';
					}
					if(esc_attr(get_theme_mod('brands_desc_text')) ){
						echo '<h2 class="section-heading text-center">'.esc_attr(get_theme_mod('brands_desc_text')).'</h2>';
					}?>
				</div>
			</div>
			<?php if(get_theme_mod('enable_brand_full_width')){
				$brands_width_class= 'full-width';
				$carousel_class = 'walker-charity-brands';
			}else{
				$brands_width_class= '';
				$carousel_class = 'walker-charity-brands-box';
			}?>
			<div class="wc-container <?php echo esc_attr($brands_width_class);?>">
				<div class="swiper-container <?php echo esc_attr($carousel_class);?>">
      				<div class="swiper-wrapper">
						<?php $walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_brands', 'order'=> 'DESC', 'posts_per_page' =>-1) );
						    while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>
						    <div class="swiper-slide">
						    	
							  		<?php 
							    	if ( has_post_thumbnail() ) {?>
										<?php the_post_thumbnail(); ?>
									<?php	} ?>
									
								
							</div>
						<?php endwhile; 
						wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php } 
}
?>