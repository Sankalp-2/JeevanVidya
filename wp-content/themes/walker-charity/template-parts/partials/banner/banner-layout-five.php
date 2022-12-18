<div class="wc-wraper banner-wrapper no-gap  banenr-layout-five">
	
		<div class="swiper-container  banner-slider-centered">

  			<div class="swiper-wrapper">
				<?php 
				$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_slider', 'order'=> 'DESC') );
				
				while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();
					   if(get_theme_mod('walker_slder_text_align')=='slide-text-align-right'){
							$slide_text_align='text-right';
							}elseif(get_theme_mod('walker_slder_text_align')=='slide-text-align-center'){
								$slide_text_align='text-center';
							}else{
								$slide_text_align='';
							}
						?>

					    <div class="swiper-slide">
					    	<div class="walkerwp-slider-box">
						  		<?php 
						    	if ( has_post_thumbnail() ) {?>
									<div class="slide-image"><?php the_post_thumbnail(); ?></div>
								<?php	} ?>
								
								<div class="slide-content text-center">
									<div class="wc-container  <?php echo esc_attr($slide_text_align);?>">
									<div class="slide-overlay-text <?php echo esc_attr($slide_text_align);?>">
									<h1 class="slider-title"><?php  the_title(); ?></h1>	
									<span class="slider-short-inco"><?php the_excerpt();?></span>
									
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

										</div>				
								</div>
							</div>
							</div>

						</div>
					<?php endwhile; 
					wp_reset_postdata(); ?>
				</div>

    <div class="wc-slider-prev"><i class="fas fa-arrow-left"></i></div>
    <div class="wc-slider-next"><i class="fas fa-arrow-right"></i></div>
    <!-- !next / prev arrows -->
				<div class="wc-slider-pagination"></div>
			</div>
		
	</div>