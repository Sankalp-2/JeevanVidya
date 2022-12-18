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
	$slider_text_align= get_theme_mod('slider_text_alignment','slider-text-align-center');
	if($slider_text_align =='slider-text-align-left'){
		$slider_text_align_class = 'text-left';
	}
	elseif($slider_text_align =='slider-text-align-right'){
		$slider_text_align_class = 'text-right';
	}else{
		$slider_text_align_class = 'text-center';
	}
?>
<div class="wc-wraper banner-wrapper banner-layout-3 <?php echo esc_attr($slider_text_align_class);?>">
	<?php 
			$banner_background_video= '';
			if(get_theme_mod('walker_charity_banner_video_iframe')){
				$banner_background_video= get_theme_mod('walker_charity_banner_video_iframe');
			}
		?>

		<iframe src="https://www.youtube.com/embed/<?php echo $banner_background_video; ?>?rel=0&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0&loop=1"  frameborder="0" allowfullscreen></iframe>
	<div class="banner-background">
		

		<div class="wc-container">
			<div class="overlay-text <?php echo esc_attr($slider_text_align_class);?>">
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
	</div>
</div>