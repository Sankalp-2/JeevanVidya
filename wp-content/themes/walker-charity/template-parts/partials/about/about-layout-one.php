<?php  $walker_charity_about_status = esc_attr(get_theme_mod('about_status'));
if($walker_charity_about_status){?>
	<?php
		$walker_charity_about_page = get_theme_mod( 'about_page');
		if(!empty($walker_charity_about_page) && $walker_charity_about_page != 'None' ){?>
			<div class="wc-wraper about-wraper about-layout-1">
				<div class="wc-container about-container">
			
				<?php
				$about_page_id = get_page_by_title( $walker_charity_about_page, OBJECT, 'page'  );
				$current_pageid = $about_page_id->ID;
				$walker_charity_query = new WP_Query( 'page_id='.$current_pageid);
				if ( $walker_charity_query->have_posts() ) :
				while ( $walker_charity_query->have_posts() ) : $walker_charity_query->the_post();
					if ( has_post_thumbnail() ){
						$about_content_class='wc-grid-6';
					}else{
						$about_content_class='wc-grid-12';
					} ?>
							<div class="text-col <?php echo esc_attr($about_content_class);?>">
								<div class="wc-about-box">
									<h2 class="section-heading"><?php echo esc_html(get_theme_mod('about_heading_text'));?></h2>
									<p class="about-description"><?php the_excerpt();
									 ?></p>
									<?php if(get_theme_mod('about_readmore_text') || get_theme_mod('about_readmore_text')!=''){?>
										<a href="<?php echo the_permalink();?>" class="primary-button details-about"><span> <?php echo esc_html(get_theme_mod('about_readmore_text'));?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
									<?php } else{?>
										<a href="<?php echo the_permalink();?>" class="details-about primary-button"> <span><?php echo __('Read More', 'walker-charity');?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
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
			endif;?>
			</div>
				
		</div>
	<?php	}
}
?>