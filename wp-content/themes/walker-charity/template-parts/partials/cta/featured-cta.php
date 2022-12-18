<?php if(get_theme_mod('walker_charity_cta_status')){?>
<div class="wc-wraper featured-cta-wraper featured-cta-1">
	<div class="wc-container">
		<div class="wc-grid-12 featured-header text-center">
			<?php if(get_theme_mod('extra_cta_heading_text')){?>
				<h1><?php echo esc_html(get_theme_mod('extra_cta_heading_text')); ?></h1>
			<?php }
			if(get_theme_mod('extra_cta_message_text')){?>
				<p><?php echo esc_html(get_theme_mod('extra_cta_message_text')); ?></p>
			<?php }?>
			
		</div>
	</div>
	<div class="wc-container full-width">
		<div class="featured-cta wc-grid-12">
			<?php if(get_theme_mod('extra_cta_icon_1') || get_theme_mod('extra_cta_title_1') ){?>
				<div class="cta-box">
					<?php 
					$cta_image_1 = get_theme_mod('extra_cta_icon_1');
					$cta_button_label_1 = get_theme_mod('extra_cta_more_text_1');
					$cta_button_url_1 = get_theme_mod('extra_cta_link_1');
					if($cta_image_1){?>
						<a href="<?php echo esc_url($cta_button_url_1);?>">
							<div class="img-holder"><img src="<?php echo esc_url($cta_image_1);?>" /></div>
						</a>
					<?php }
					echo '<div class="box-content">';
						if(get_theme_mod('extra_cta_title_1')){?>
							<h3><?php echo esc_html(get_theme_mod('extra_cta_title_1')); ?></h3>
						<?php } ?>

						<?php if(get_theme_mod('extra_cta_desc_1')){?>
							<p><?php echo esc_html(get_theme_mod('extra_cta_desc_1')); ?></p>
						<?php } ?>
						<a href="<?php echo esc_url($cta_button_url_1);?>" class="primary-button"><span><?php echo esc_html($cta_button_label_1);?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
					</div>
				</div>
			<?php } ?>
			<?php if(get_theme_mod('extra_cta_icon_2') || get_theme_mod('extra_cta_title_2') ){?>
				<div class="cta-box">
					<?php 
					$cta_image_2 = get_theme_mod('extra_cta_icon_2');
					$cta_button_label_2 = get_theme_mod('extra_cta_more_text_2');
					$cta_button_url_2 = get_theme_mod('extra_cta_link_2');
					if($cta_image_2){?>
						<a href="<?php echo esc_url($cta_button_url_2);?>">
							<div class="img-holder"><img src="<?php echo esc_url($cta_image_2);?>" /></div>
						</a>
					<?php }
					echo '<div class="box-content">';
						if(get_theme_mod('extra_cta_title_2')){?>
							<h3><?php echo esc_html(get_theme_mod('extra_cta_title_2')); ?></h3>
						<?php } ?>

						<?php if(get_theme_mod('extra_cta_desc_2')){?>
							<p><?php echo esc_html(get_theme_mod('extra_cta_desc_2')); ?></p>
						<?php } ?>
						<a href="<?php echo esc_url($cta_button_url_2);?>" class="primary-button"><span><?php echo esc_html($cta_button_label_2);?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
					</div>
				</div>
			<?php }?>
			<?php if(get_theme_mod('extra_cta_icon_3') || get_theme_mod('extra_cta_title_3') ){?>
				<div class="cta-box">
					<?php 
					$cta_image_3 = get_theme_mod('extra_cta_icon_3');
					$cta_button_label_3 = get_theme_mod('extra_cta_more_text_3');
					$cta_button_url_3 = get_theme_mod('extra_cta_link_3');
					if($cta_image_3){?>
						<a href="<?php echo esc_url($cta_button_url_3);?>">
							<div class="img-holder"><img src="<?php echo esc_url($cta_image_3);?>" /></div>
						</a>
					<?php }
					echo '<div class="box-content">';
						if(get_theme_mod('extra_cta_title_3')){?>
							<h3><?php echo esc_html(get_theme_mod('extra_cta_title_3')); ?></h3>
						<?php } ?>

						<?php if(get_theme_mod('extra_cta_desc_3')){?>
							<p><?php echo esc_html(get_theme_mod('extra_cta_desc_3')); ?></p>
						<?php } ?>
						<a href="<?php echo esc_url($cta_button_url_3);?>" class="primary-button"><span><?php echo esc_html($cta_button_label_3);?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
					</div>
				</div>
			<?php } ?>
			<?php if(get_theme_mod('extra_cta_icon_4') || get_theme_mod('extra_cta_title_4') ){?>
				<div class="cta-box">
					<?php 
					$cta_image_4 = get_theme_mod('extra_cta_icon_4');
					$cta_button_label_4 = get_theme_mod('extra_cta_more_text_4');
					$cta_button_url_4 = get_theme_mod('extra_cta_link_4');
					if($cta_image_4){?>
						<a href="<?php echo esc_url($cta_button_url_4);?>">
							<div class="img-holder"><img src="<?php echo esc_url($cta_image_4);?>" /></div>
						</a>
					<?php }
					echo '<div class="box-content">';
						if(get_theme_mod('extra_cta_title_4')){?>
							<h3><?php echo esc_html(get_theme_mod('extra_cta_title_4')); ?></h3>
						<?php } ?>

						<?php if(get_theme_mod('extra_cta_desc_4')){?>
							<p><?php echo esc_html(get_theme_mod('extra_cta_desc_4')); ?></p>
						<?php } ?>
						<a href="<?php echo esc_url($cta_button_url_4);?>" class="primary-button"><span><?php echo esc_html($cta_button_label_4);?> <i class="fas fa-long-arrow-alt-right"></i> </span></a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>