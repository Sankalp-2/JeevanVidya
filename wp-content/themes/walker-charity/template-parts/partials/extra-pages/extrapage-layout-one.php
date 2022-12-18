
<?php  $extrapage_status = esc_attr(get_theme_mod('extra_page_status'));
if($extrapage_status){?>
	<div class="wc-wraper extrapage-wraper extrapage-layout-1">
	<?php
		$walker_charity_extra_page_one = get_theme_mod( 'extra_page_1');
		if(!empty($walker_charity_extra_page_one) && $walker_charity_extra_page_one != 'None' ){?>
				<div class="wc-container extra-page-1 full-width">
			
				<?php
				$extra_page_id_one = get_page_by_title( $walker_charity_extra_page_one, OBJECT, 'page'  );
				$current_pageid = $extra_page_id_one->ID;
				$walker_charity_query = new WP_Query( 'page_id='.$current_pageid);
				if ( $walker_charity_query->have_posts() ) :
				while ( $walker_charity_query->have_posts() ) : $walker_charity_query->the_post();
					if ( has_post_thumbnail() ){
						$exta_content_class='wc-grid-6';
					}else{
						$exta_content_class='wc-grid-12';
					} ?><?php 
							
							if ( has_post_thumbnail() ){?>
								<div class="wc-grid-6 img-col">
									<?php  the_post_thumbnail(); ?>
								</div>
										
							<?php }?>
							<div class="text-col <?php echo esc_attr($exta_content_class);?>">
								<div class="wc-about-box">
									<h2 class="about-title"><?php the_title();?></h2>
									<p class="about-description"><?php the_content(); ?></p>
									<?php 
									if(get_theme_mod('extra_page_button_1_link')){
										$extra_page_link_one = get_theme_mod('extra_page_button_1_link');
									}else{
										$extra_page_link_one='#';
									}
									if(get_theme_mod('extra_page_button_1_target')){
										$extra_page_link_one_target= '_blank';
									}else{
										$extra_page_link_one_target= '_self';
									}
									if(get_theme_mod('extra_page_button_1') || get_theme_mod('extra_page_button_1')!=''){?>
										<a href="<?php echo esc_url($extra_page_link_one);?>" class="primary-button details-about" target="<?php echo esc_attr($extra_page_link_one_target);?>"><span> <?php echo esc_html(get_theme_mod('extra_page_button_1'));?> <i class="fas fa-long-arrow-alt-right"></i> </span> </a>
									<?php } else{?>
										<a href="<?php echo esc_url($extra_page_link_one);?>" class="primary-button details-about" target="<?php echo esc_attr($extra_page_link_one_target);?>"> <span><?php echo __('Read More', 'walker-charity');?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
									<?php }?>
								</div>
							</div>
							
				<?php endwhile;
				wp_reset_postdata(); 
			endif;?>
				
		</div>
	<?php	}?>


	<?php
		$walker_charity_extra_page_two = get_theme_mod( 'extra_page_2');
		if(!empty($walker_charity_extra_page_two) && $walker_charity_extra_page_two != 'None' ){?>
				<div class="wc-container extra-page-2 full-width">
			
				<?php
				$extra_page_id_two = get_page_by_title( $walker_charity_extra_page_two, OBJECT, 'page'  );
				$current_pageid = $extra_page_id_two->ID;
				$walker_charity_query = new WP_Query( 'page_id='.$current_pageid);
				if ( $walker_charity_query->have_posts() ) :
				while ( $walker_charity_query->have_posts() ) : $walker_charity_query->the_post();
					if ( has_post_thumbnail() ){
						$exta_content_class='wc-grid-6';
					}else{
						$exta_content_class='wc-grid-12';
					} ?>
							<div class="text-col <?php echo esc_attr($exta_content_class);?>">
								<div class="wc-about-box">
									<h2 class="about-title"><?php the_title();?></h2>
									<p class="about-description"><?php the_content(); ?></p>
									<?php 
									if(get_theme_mod('extra_page_button_2_link')){
										$extra_page_link_two = get_theme_mod('extra_page_button_2_link');
									}else{
										$extra_page_link_two='#';
									}
									if(get_theme_mod('extra_page_button_2_target')){
										$extra_page_link_two_target= '_blank';
									}else{
										$extra_page_link_two_target= '_self';
									}
									if(get_theme_mod('extra_page_button_2') || get_theme_mod('extra_page_button_2')!=''){?>
										<a href="<?php echo esc_url($extra_page_link_two);?>" class="primary-button details-about" target="<?php echo esc_attr($extra_page_link_two_target);?>"><span> <?php echo esc_html(get_theme_mod('extra_page_button_2'));?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
									<?php } else{?>
										<a href="<?php echo esc_url($extra_page_link_two);?>" class="primary-button details-about" target="<?php echo esc_attr($extra_page_link_two_target);?>"> <i class="fas fa-long-arrow-alt-right"></i> <span><?php echo __('Read More', 'walker-charity');?></span></a>
									<?php }?>
								</div>
							</div>
							<?php 
							
							if ( has_post_thumbnail() ){?>
								<div class="wc-grid-6 img-col">
									<?php  the_post_thumbnail(); ?>
								</div>
										
							<?php }?>
							
				<?php endwhile;
				wp_reset_postdata(); 
			endif;?>
				
		</div>
	<?php	}?>
	</div>
<?php }
?>
