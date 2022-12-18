<?php
/**
 *  Template Name: Team List Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package walker_charity
 */


get_header();
if(walker_charity_set_to_premium()  ){ ?>
<div class="wc-wraper teams-template">
	<div class="wc-container">
		<div class="wc-grid-12 text-center team-archive-header">
			<?php 
                if(get_theme_mod('team_page_heading_text') ){
                    echo '<h2>'.esc_html(get_theme_mod('team_page_heading_text')).'</h2>';
                }
                if(get_theme_mod('team_page_desc_text') ){
                    echo '<p>'.esc_html(get_theme_mod('team_page_desc_text')).'</p>';
            }?>
		</div>
	</div>
<div class="wc-container team-list">
<?php $walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_teams', 'order'=> 'DESC', 'posts_per_page' => -1) );
    while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>

   <div class="team-member">
    	<div class="wc-teams-box text-center">
	  		<?php 
	    	if ( has_post_thumbnail() ) {?>
				<div class="team-image"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
			<?php	} ?>

			
			<div class="content-part">
				<h3 class="team-name"><?php  the_title(); ?></h3>
				<?php echo '<h5 class="team-position">'. esc_html(get_post_meta( $post->ID, 'walker_team_position', true )) .'</h5>';?>
				
				<span class="team-desc"><?php echo walker_charity_excerpt('20');?></span>
				<?php if(get_theme_mod('team_view_more_text')){
					$team_more_text= get_theme_mod('team_view_more_text');
				}else{
					$team_more_text= __('View More','walker-charity');
				}?>
				
		</div>
		<div class="team-social-media">
				<?php 
					$member_facebook_link = get_post_meta( $post->ID, 'walker_team_facebook', true );
					if($member_facebook_link){
					 	echo '<a href="' . esc_url($member_facebook_link) . '" target="_blank"> <i class="fab fa-facebook-f"></i></a>';
					}
					$member_twitter_link = get_post_meta( $post->ID, 'walker_team_twitter', true );
					if($member_twitter_link){
					 	echo '<a href="' . esc_url($member_twitter_link) . '" target="_blank"><i class="fab fa-twitter"></i></a>';
					}
					$member_twitter_instagram = get_post_meta( $post->ID, 'walker_team_instagram', true );
					if($member_twitter_instagram){
					 	echo '<a href="' . esc_url($member_twitter_instagram) . '" target="_blank"><i class="fab fa-instagram"></i></a>';
					}
					$member_twitter_linkedin = get_post_meta( $post->ID, 'walker_team_linkedin', true );
					if($member_twitter_linkedin){
					 	echo '<a href="' . esc_url($member_twitter_linkedin) . '" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
					}
					$member_twitter_github = get_post_meta( $post->ID, 'walker_team_github', true );
					if($member_twitter_github){
					 	echo '<a href="' . esc_url($member_twitter_github) . '" target="_blank"><i class="fab fa-github-alt"></i></a>';
					}

					?>
					
				</div>
				<a href="<?php the_permalink();?>" class="member-more"><?php echo esc_html($team_more_text); ?></a>
	</div>
	</div>
	
<?php endwhile; 
wp_reset_postdata(); ?>
</div>
</div>

<?php
}
 get_footer();