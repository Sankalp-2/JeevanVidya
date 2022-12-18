<?php
	$walker_charity_banner_image = get_theme_mod('banner_bg_image');
	$walker_charity_banner_heading = get_theme_mod('walker_charity_banner_heading');
	$walker_charity_banner_sub_heading = get_theme_mod('walker_charity_banner_desc_text');
	$walker_charity_banner_primary_button = get_theme_mod('walker_charity_banner_primary_button');
	$walker_charity_banner_primary_button_link = get_theme_mod('walker_charity_banner_primary_button_link','#');
	$walker_charity_banner_primary_button_target= get_theme_mod('walker_charity_banner_primary_button_target');
	if($walker_charity_banner_primary_button_target){
		$primary_button_target='_blank';
	}else{
		$primary_button_target='_self';
	}

	$walker_charity_banner_secondary_button = get_theme_mod('walker_charity_banner_secondary_button');
	$walker_charity_banner_secondary_button_link = get_theme_mod('walker_charity_banner_secondary_button_link','#');
	$walker_charity_banner_secondary_button_target= get_theme_mod('walker_charity_banner_secondary_button_target');
	if($walker_charity_banner_secondary_button_target){
		$secondary_button_target='_blank';
	}else{
		$secondary_button_target='_self';
	}
?>
<div class="wc-wraper banner-wrapper banner-layout-2">
	<div class="banner-background" style="background:url(<?php echo esc_url($walker_charity_banner_image);?>) no-repeat; background-size:cover; background-attachment: fixed;">
		<div class="wc-container">
			<div class="wc-grid-7">
				<div class="overlay-text">
					<?php if($walker_charity_banner_heading){?>
						<h1 class="banner-heading"><?php echo esc_html($walker_charity_banner_heading);?></h1>
					<?php }
					if($walker_charity_banner_sub_heading){?>
						<p class="banner-subtext"><?php echo esc_html($walker_charity_banner_sub_heading);?></p>
					<?php } ?>
					<div class="button-group">
						<?php if($walker_charity_banner_primary_button){?>
							<a class="primary-button" href="<?php echo esc_url($walker_charity_banner_primary_button_link)?>" target="<?php echo esc_attr($primary_button_target);?>">
								<span><?php echo esc_html($walker_charity_banner_primary_button);?> <i class="fas fa-long-arrow-alt-right"></i> </span>
							</a>
						<?php }?>

						<?php if($walker_charity_banner_secondary_button){?>
							<a class="secondary-button" href="<?php echo esc_url($walker_charity_banner_secondary_button_link)?>" target="<?php echo esc_attr($secondary_button_target);?>">
								<span><?php echo esc_html($walker_charity_banner_secondary_button);?> <i class="fas fa-long-arrow-alt-right"></i> </span>
							</a>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="wc-grid-5 banner-form">
				<?php 
				if(get_theme_mod('walker_charity_banner_form_heading')){
					echo '<h3>'.esc_html( get_theme_mod('walker_charity_banner_form_heading') ) .'</h3>';
				}
				if(get_theme_mod('banner_form_shortcode')){
					$walker_charity_banner_form = get_theme_mod('banner_form_shortcode');
					echo do_shortcode( wp_kses_post( $walker_charity_banner_form ) ); 
				}
				?>
			</div>
		</div>
	</div>
</div>