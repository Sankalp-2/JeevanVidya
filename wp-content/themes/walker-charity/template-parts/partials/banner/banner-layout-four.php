<div class="wc-wraper slider-wrapper no-gap  banenr-layout-four">
	
		<div class="swiper-container  banner-slider-one">

  			<div class="swiper-wrapper">
				<?php 
				$slider_text_align= get_theme_mod('slider_text_alignment','slider-text-align-center');
				if($slider_text_align =='slider-text-align-left'){
					$slider_text_align_class = 'text-left';
				}
				elseif($slider_text_align =='slider-text-align-right'){
					$slider_text_align_class = 'text-right';
				}else{
					$slider_text_align_class = 'text-center';
				}
				$slider_post_cat = esc_attr(get_theme_mod('walker_charity_slider_category'));

				if(walker_charity_set_to_premium()){
					$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_slider', 'order'=> 'DESC') );
				}else{
					$walker_charity_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => -1, 'category_name' => $slider_post_cat) );
				}
				while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();
						?>

					    <div class="swiper-slide">
					    	<div class="walkerwp-slider-box">
						  		<?php 
						    	if ( has_post_thumbnail() ) {?>
									<div class="slide-image"><?php the_post_thumbnail(); ?></div>
								<?php	} ?>
								
								<div class="slide-content <?php echo esc_attr($slider_text_align_class);?>">
									<div class="wc-container">
									<div class="slide-overlay-text <?php echo esc_attr($slider_text_align_class);?>">
									<h1 class="slider-title"><?php  the_title(); ?></h1>	
									<span class="slider-short-inco"><?php the_excerpt();?></span>
									<?php if(walker_charity_set_to_premium()){?>
										<div class="button-group">
											<?php
											$primary_button_link = get_post_meta( $post->ID, 'walker_slider_primary_button_link', true );
											$primary_button_text = get_post_meta( $post->ID, 'walker_slider_primary_button', true );
											if(!$primary_button_link){
												$primary_button_link ='#';
											}
											if(!empty($primary_button_text)){
												echo '<a class="primary-button" href="' . esc_url($primary_button_link) . '"><span>'. esc_html(get_post_meta(get_the_ID(), 'walker_slider_primary_button', true)) .'</span></a>';
											}
											
												$secondary_button_link = get_post_meta( $post->ID, 'walker_slider_secondary_button_link', true );
												$secondary_button_text = get_post_meta( $post->ID, 'walker_slider_secondary_button', true );
												if(!$secondary_button_link){
													$secondary_button_link = '#';
												}
												if(!empty($secondary_button_text)){
													echo '<a class="secondary-button" href="' . esc_url($secondary_button_link) . '"><span>'. esc_html(get_post_meta(get_the_ID(), 'walker_slider_secondary_button', true)) .'</span></a>';
												}
												
											?>
										</div>
									<?php } else{?>
										<a href="<?php the_permalink();?>" class="primary-button"><span><?php echo __('Read More','walker-charity');?></span></a>
									<?php }?>
										</div>				
								</div>
							</div>
							</div>
						</div>
					<?php endwhile; 
					wp_reset_postdata(); ?>
				</div>

    <div class="wc-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
    <div class="wc-slider-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    <!-- !next / prev arrows -->
				<div class="walker-charity-slider-pagination"></div>
			</div>
		
	</div>