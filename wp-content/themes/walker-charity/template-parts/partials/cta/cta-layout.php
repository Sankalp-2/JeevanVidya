<?php
$single_cta_status = get_theme_mod('walker_charity_single_cta_status');
if(walker_charity_set_to_premium()){
	 if(get_theme_mod('walker_charity_single_cta_layout')=='walker-charity-single-cta-layout-box'){
	 	$single_cta_layout = 'cta-box-layout';
	 }else{
	 	$single_cta_layout = 'cta-full-layout';
	 }
}else{
	$single_cta_layout = 'cta-full-layout';
}
	
if($single_cta_status){
$cta_background_img='';
if(get_theme_mod('single_cta_bg_image')){
	$cta_background_img = get_theme_mod('single_cta_bg_image'); ?>
<?php } ?>
<div class="wc-wraper single-cta-wraper <?php echo esc_attr($single_cta_layout);?>" style="background:url(<?php echo esc_url($cta_background_img);?>) no-repeat; background-size:cover; background-attachment: fixed; background-position: 50% 40px">
	
	<?php if(get_theme_mod('single_cta_message_text')){?>
	<div class="wc-container">
		
		<div class="cta-box text-center">
			<?php if(get_theme_mod('single_cta_heading_text')){?>
				<h4 class="section-subheader"><?php echo esc_html(get_theme_mod('single_cta_heading_text')); ?></h4>
			<?php } ?>
			<h1 class="section-heading cta-heading"><?php echo esc_html(get_theme_mod('single_cta_message_text')); ?></h1>
			<?php
				if(get_theme_mod('single_cta_btn_url')){
					$cta_btn_link = get_theme_mod('single_cta_btn_url');
				}else{
					$cta_btn_link ='#';
				}
				if(get_theme_mod('single_cta_btn_target')){
					$cta_link_target='_blank';
				}else{
					$cta_link_target='_self';
				}
				if(get_theme_mod('single_cta_btn_url')){?>
					<a href="<?php echo esc_url($cta_btn_link);?>" class="primary-button" target="<?php echo esc_attr($cta_link_target);?>"><span><?php echo esc_html(get_theme_mod('single_cta_btn_text')); ?> <i class="fas fa-long-arrow-alt-right"></i> </span>
				</a>
				<?php }
			?>
		</div>
	</div>
<?php } ?>
</div>
<?php } ?>