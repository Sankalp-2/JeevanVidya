<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package walker_Charity
 */
if(walker_charity_set_to_premium() ){
	$walker_charity_sidebar = get_theme_mod('single_blog_sidebar_layout','single-right-sidebar');
	if($walker_charity_sidebar =='single-left-sidebar'){
		$recent_blog_sidebar_class = 'left-sidebar-layout';
		$main_content_class = 'wc-grid-9';
	}
	elseif($walker_charity_sidebar =='single-no-sidebar'){
		$recent_blog_sidebar_class = 'full-width-layout';
		$main_content_class = 'wc-grid-12';
	}else{
		$recent_blog_sidebar_class =  'right-sidebar-layout';
		$main_content_class = 'wc-grid-9';
	}
}else{
	$recent_blog_sidebar_class =  'right-sidebar-layout';
	$main_content_class = 'wc-grid-9';
}
get_header();
?>
<div class="wc-wraper">
	<div class="wc-container">
		<?php 
		if(walker_charity_set_to_premium() ){
			if($walker_charity_sidebar =='single-left-sidebar'){?>
				<div class="wc-grid-3 sidebar-block">
						<?php get_sidebar();?>
				</div>
			<?php } 
		}?>
		<main id="primary" class="site-main <?php echo esc_attr($main_content_class);?> <?php echo esc_attr($recent_blog_sidebar_class);?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<?php if(get_theme_mod('enable_related_post_status','true')){?>
		<div class="wc-container related-posts">
		<div class="wc-grid-12">
			<h3 class="related-post-heading">
				<?php 
				if(get_theme_mod('walker_charity_related_post_heading')){
					$related_post_heading = get_theme_mod('walker_charity_related_post_heading');
				}else{
					$related_post_heading = __('Related Posts','walker-charity');
				}
					echo esc_html($related_post_heading);
					?>
				
			</h3>
		</div>
		
		<div class="related-post-list">
			<?php $post_id = get_the_ID();
		    $cat_ids = array();
		    $categories = get_the_category( $post_id );

		    if(!empty($categories) && !is_wp_error($categories)):
		        foreach ($categories as $category):
		            array_push($cat_ids, $category->term_id);
		        endforeach;
		    endif;

		    $current_post_type = get_post_type($post_id);

		    $query_args = array( 
		        'category__in'   => $cat_ids,
		        'post_type'      => $current_post_type,
		        'post__not_in'    => array($post_id),
		        'posts_per_page'  => '2',
		     );

		    $related_cats_post = new WP_Query( $query_args );

		    if($related_cats_post->have_posts()):
		         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
		           <div class="related-posts-box">
		           		<a href="<?php the_permalink(); ?>" class="related-post-feature-image">
		           			<?php walker_charity_post_thumbnail(); ?>
		           		</a>
		           		<div class="related-post-content">
		                    <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
		                    <div class="meta-data">
		                    	<?php
		                    	walker_charity_posted_by();
		                    	walker_charity_posted_on();
		                    	walker_charity_post_category();
		                    	?>
		                    </div>
		                    <?php 
		                    the_excerpt(); ?>
		                   <a href="<?php the_permalink(); ?>" class="primary-button"><span><?php echo __('Read More','walker-charity');?></span></a>
		                </div>
		              </div>
		        <?php endwhile;

		        // Restore original Post Data
		        wp_reset_postdata();
		     endif;
		     ?>
		</div>
	 </div>
	<?php } ?>
	</main><!-- #main -->	
	<?php 
	if(walker_charity_set_to_premium() ){
		if($walker_charity_sidebar =='single-right-sidebar'){?>
			<div class="wc-grid-3 sidebar-block">
					<?php get_sidebar();?>
			</div>
		<?php }
		}else{?>
			<div class="wc-grid-3 sidebar-block">
					<?php get_sidebar();?>
			</div>
		<?php } ?>
	</div>
	
</div>
<?php get_footer();

