<?php
if(walker_charity_set_to_premium() ){ 
$walker_charity_feature_status = get_theme_mod('features_status');
if($walker_charity_feature_status){?>
	<div class="wc-wraper features-wraper feature-layout-1">
		<div class="wc-container">
			<div class="walkerwp-grid-12 text-center">
				<?php 
				if(get_theme_mod('features_heading_text') ){
					echo '<h4 class="section-subheader text-center">'.esc_html(get_theme_mod('features_heading_text')).'</h4>';
				}
				if(get_theme_mod('feature_desc_text') ){
					echo '<h2 class="section-heading text-center">'.esc_html(get_theme_mod('feature_desc_text')).'</h2>';
				}?>
			</div>
			
		</div>
		<div class="wc-container">
			<div class="wc-grid-12 features-list">
			<?php
			$walker_charity_feature_parent_page= get_theme_mod('walker_charity_feature_page');
				if(!empty($walker_charity_feature_parent_page) && $walker_charity_feature_parent_page != 'None' ){
					
					$feature_page_id = get_page_by_title( $walker_charity_feature_parent_page );
					$args = array(
						'posts_per_page' => -1,
						'post_type' => 'page',
						'post_parent' => $feature_page_id->ID
					);

					$walker_charity_query = new WP_Query( $args );
					if ( $walker_charity_query->have_posts() ) :
					
					while ( $walker_charity_query->have_posts() ) : $walker_charity_query->the_post(); ?>
						
						<div class="feature-item">
							<a href="<?php the_permalink();?>" class="feature-item-inner text-center">
							<div class="feature-box ">
								<?php if ( has_post_thumbnail() ) {?>
								   <div class="img-holder"> <?php   the_post_thumbnail(); ?></div>
								<?php	$feature_content_class="with-thumbnails";
								}else{
									$feature_content_class="without-thumbnails" ;
								} ?>
								<div class="feature-content <?php echo esc_attr($feature_content_class);?>">
									<h4 class="feature-title"><?php the_title();?></h4>
									<p class="feature-description"><?php echo esc_html(walker_charity_excerpt(20)); ?></p>
								</div>
							</div>
						</a>
						</div>
						<?php
					endwhile;
				endif;
			}?>
		</div>
	</div>
		<div class="wc-container">
			<div class="wc-grid-12 text-center">
				<?php 
				if(get_theme_mod('features_viewall_text')){
					if(get_theme_mod('features_viewall_btn_link')){
						$more_features_link = get_theme_mod('features_viewall_btn_link');
					}else{
						$more_features_link='#';
					}
					?>
					<a href="<?php echo esc_url($more_features_link);?>" class="more-features primary-button">
						<span><?php echo esc_html(get_theme_mod('features_viewall_text'));?> <i class="fas fa-long-arrow-alt-right"></i> </span>
						</a>
				<?php }
				?>
				
			</div>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
}
}?>