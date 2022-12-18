<?php
/**
 * Template part for displaying teams
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_charity
 */
if(walker_charity_set_to_premium()  ){ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wc-wraper single-teams">
		<div class="wc-container">
			<div class="wc-grid-4">
				<?php 
					walker_charity_post_thumbnail();?>
					
					
					
			</div>
			<div class="wc-grid-8">
				<h3 class="team-name"><?php the_title();?></h3>
				<div class="team-official">
						<?php if(get_post_meta($post->ID,'walker_team_company', true)){
							echo '<span class="team-compnay">'. esc_html(get_post_meta($post->ID,'walker_team_company', true)).',</span>';
						}
						if(get_post_meta($post->ID,'walker_team_position', true)){
							echo ' <span class="team-position">'. esc_html(get_post_meta($post->ID,'walker_team_position', true)).'</span>';
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
				<?php the_content();?>
				
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
