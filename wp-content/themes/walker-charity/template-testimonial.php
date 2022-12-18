<?php
/**
 * Template Name: Testimonials Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_charity
 */

get_header();
?>
<div class="wc-wraper archive-list-testimonial">
	<div class="wc-container">
		<main id="primary" class="site-main wc-grid-9 right-sidebar-layout">
			<div class="wc-grid-12 list-header">
				<?php 
                if(get_theme_mod('testimonial_page_heading_text') ){
                    echo '<h2>'.esc_html(get_theme_mod('testimonial_page_heading_text')).'</h2>';
                }
                if(get_theme_mod('testimonial_page_desc_text') ){
                    echo '<p>'.esc_html(get_theme_mod('testimonial_page_desc_text')).'</p>';
            }?>
			</div>
			<?php
			if(walker_charity_set_to_premium()  ){ 
				$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_testimonials', 'order'=> 'DESC', 'posts_per_page' => -1 ) );
			}elseif(get_theme_mod('walker_charity_testimonial_category')){
				$testimonial_cat = get_theme_mod('walker_charity_testimonial_category');
				$walker_charity_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => -1, 'category_name' => $testimonial_cat) );
			}else{
				echo __('Testimonial Not Found!','walker-charity');
			}
			while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>
				 <div class="wc-testimonial-box">
			  		<div class="testimonial-thumbnail"><?php 
			    	if ( has_post_thumbnail() ) {
			    		$review_class = 'with_thumbnails';?>
						<?php the_post_thumbnail('thumbnail'); ?>
					<?php	} else{
						$review_class = 'without_thumbnails';
					}?>
					<h4 class="reviewer-name"><?php  the_title(); ?></h4>
				     <?php if(walker_charity_set_to_premium()  ){ 
							echo '<div class="review-meta">';
							if(get_post_meta($post->ID,'walker_client_company', true)){
								echo ' <span class="review-compnay">'. esc_html(get_post_meta($post->ID,'walker_client_company', true)).', </span>';
							}
							if(get_post_meta($post->ID,'walker_client_position', true)){
								echo ' <span class="review-position">'. esc_html(get_post_meta($post->ID,'walker_client_position', true)).'</span>';
							}
							echo '</div>';
						}

						 ?>
				    </div>
					<div class="review-part <?php echo esc_attr($review_class);?>">
						
						<span class="review-message"><?php the_content();?></span>
						
										
					</div>
				</div>
			<?php endwhile;?>

	</main><!-- #main -->
		<div class="wc-grid-3 sidebar-block"><?php get_sidebar(); ?></div>
	</div>
</div>
<?php get_footer();