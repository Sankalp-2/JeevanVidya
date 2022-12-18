<?php
$walker_charity_recentblog_status = esc_attr(get_theme_mod('recent_post_status'));
if($walker_charity_recentblog_status){?>
<div class="wc-wraper recentpost-wraper recentpost-layout-1">
	<div class="wc-container">
		<div class="wc-grid-12">
			<?php 
			if(get_theme_mod('recentpost_heading_text') ){
				echo '<h4 class="text-center section-subheader">'.esc_html(get_theme_mod('recentpost_heading_text')).'</h4>';
			}
			if(get_theme_mod('recentpost_desc_text') ){
				echo '<h2 class="section-heading  text-center">'.esc_html(get_theme_mod('recentpost_desc_text')).'</h2>';
			}?>
		</div>
	</div>
	<div class="wc-container post-list">
		<?php $recent_post_type = esc_attr(get_theme_mod('walker_charity_recent_blog_home'));
			if($recent_post_type=='latest-post'){
				$sticky = get_option( 'sticky_posts' );
				$walker_charity_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => 3, 
					'ignore_sticky_posts' => 1,'post__not_in' => $sticky) );
					    while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>
					    <div class="post-box">
					    	<div class="walkerwp-recentpost-box">
						  	<?php 
						    	if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink();?>" class="home-post-thumbnails"><?php the_post_thumbnail();?></a>
								<?php } ?>
								<?php if(!has_post_thumbnail()){
									$content_part_class="without-thumbnail";
								} else{
									$content_part_class="without-thumbnail";
								}?>
								<div class="content-part <?php echo esc_attr($content_part_class);?>">
									<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
									<?php
									if(walker_charity_set_to_premium()){
										if(get_theme_mod('author_status','true')){
											walker_charity_posted_by();
										}
										if(get_theme_mod('post_date_status','true')){
											walker_charity_posted_on();
										}
									}else{
										walker_charity_posted_by();
										walker_charity_posted_on();
									}?>
									<p><?php echo esc_html(walker_charity_excerpt( 25 )); ?></p>
									<a href="<?php the_permalink();?>" class="primary-button details-service style-extend"> <span><?php echo esc_html(get_theme_mod('recentpost_readmore_text'));?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
									
								</div>
							
							</div>
						</div>
						<?php endwhile; 
				wp_reset_postdata(); 
			} else{
				$recent_post_cat = esc_attr(get_theme_mod('walker_charity_recent_category'));
				$sticky = get_option( 'sticky_posts' );
				$walker_charity_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => 3, 'category_name' => $recent_post_cat,
					'ignore_sticky_posts' => 1,'post__not_in' => $sticky) );
					    while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>
					    <div class="post-box">
					    	<div class="walkerwp-recentpost-box">
						  	<?php 
						    	if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink();?>" class="home-post-thumbnails"><?php the_post_thumbnail();?></a>
								<?php } ?>
								<?php if(!has_post_thumbnail()){
									$content_part_class="without-thumbnail";
								} else{
									$content_part_class="without-thumbnail";
								}?>
								<div class="content-part <?php echo esc_attr($content_part_class);?>">
									<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
									<?php walker_charity_posted_by();?><?php  walker_charity_posted_on(); ?>
									<p><?php echo esc_html(walker_charity_excerpt( 25 )); ?></p>
									<?php 
									if(get_theme_mod('recentpost_readmore_text')){
										$recent_more_text = get_theme_mod('recentpost_readmore_text');
									}else{
										$recent_more_text = __('Read More','walker-charity');
									}
									?>
									<a href="<?php the_permalink();?>" class="primary-button details-service outline-style"> <span><?php echo esc_html($recent_more_text);?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
									
								</div>
								
							
							</div>
						</div>
						<?php endwhile; 
				wp_reset_postdata(); 
			}
		?>	
	</div>
</div>
<?php } ?>