<?php 
if(walker_charity_set_to_premium() ){ 
if(get_theme_mod('team_status') ){?>
<div class="wc-wraper team-wraper team-layout-1">
	<div class="wc-container team-section-header">
		<div class="wc-grid-8">
			<?php 
                if(get_theme_mod('team_heading_text') ){
                    echo '<h4 class="section-subheader">'.esc_html(get_theme_mod('team_heading_text')).'</h4>';
                }
                if(get_theme_mod('teams_desc_text') ){
                    echo '<h2 class=" section-heading">'.esc_html(get_theme_mod('teams_desc_text')).'</h2>';
                }?>
            </div>
	</div>
<div class="wc-container team-list">
<?php
	if(get_theme_mod('teams_total_items')){
		$total_items_to_show = get_theme_mod('teams_total_items');
	}else{
		$total_items_to_show=4;
	}
	$walker_charity_query = new WP_Query( array( 'post_type' => 'wcr_teams', 'order'=> 'DESC', 'posts_per_page' => $total_items_to_show) );
    while ($walker_charity_query->have_posts()) : $walker_charity_query->the_post();?>
   <div class="team-member">
    	<div class="walker-charity-teams-box text-center">
	  		<?php 
	    	if ( has_post_thumbnail() ) {?>
	    		<a href="<?php the_permalink();?>" >
					<div class="team-image"><?php the_post_thumbnail(); ?></div>
				</a>
			<?php	} ?>
			<div class="content-part">
				<h3 class="team-name"><a href="<?php the_permalink();?>" ><?php  the_title(); ?></a></h3>
				<div class="official-info">
					<?php echo '<h5 class="team-position">'. esc_html(get_post_meta( $post->ID, 'walker_team_position', true )) .'</h5>';?>
					<?php 
					if(get_post_meta( $post->ID, 'walker_team_company', true )){
						echo ', <h5 class="team-company">'. esc_html(get_post_meta( $post->ID, 'walker_team_company', true )) .'</h5>';
					}
					?>
					<p>
						<?php echo '<p>'. esc_html(walker_charity_excerpt('25' )) .'</p>'; ?>
					</p>
				</div>
		    </div>
			<div class="team-social-media"><?php 
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
			
		</div>
	</div>
	
<?php endwhile; 
wp_reset_postdata(); ?>
</div>
</div>
<?php } 
}?>