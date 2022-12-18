<?php 
if(walker_charity_set_to_premium() ){ 
if(get_theme_mod('counter_status')){?>
	<div class="wc-wraper counter-wraper counter-layout-1">
		<div class="wc-container counter-header">
			<div class="wc-grid-8">
				<?php
				if(get_theme_mod('counter_heading_text')){?>
					<h4 class="section-subheader"><?php echo esc_html(get_theme_mod('counter_heading_text'));?></h4>
				<?php }

				if(get_theme_mod('counter_desc_text')){?>
					<h2 class="section-heading"><?php echo esc_html(get_theme_mod('counter_desc_text'));?></h2>
				<?php }
				
				 ?>
			</div>
		</div>
		<div class="wc-container counter-list">
			
				<?php if(get_theme_mod('walker_counter_number')){?>
					<div class="counter-box">
					<h1><div class="count-number"><?php echo esc_html(get_theme_mod('walker_counter_number'));?></div>+</h1>
				
				<?php if(get_theme_mod('walker_counter_text')){?>
					<h5><?php echo esc_html(get_theme_mod('walker_counter_text'));?></h5>
				<?php }?>
				</div>
				<?php }?>
			
				<?php if(get_theme_mod('walker_counter_number_2')){?>
					<div class="counter-box">
						<h1><div class="count-number"><?php echo esc_html(get_theme_mod('walker_counter_number_2'));?></div>+</h1>
					
						<?php if(get_theme_mod('walker_counter_text_2')){?>
							<h5><?php echo esc_html(get_theme_mod('walker_counter_text_2'));?></h5>
						<?php }?>
				</div><?php } ?>
			
			
			<?php if(get_theme_mod('walker_counter_number_3')){?>
					<div class="counter-box">
					<h1><div class="count-number"><?php echo esc_html(get_theme_mod('walker_counter_number_3'));?></div>+</h1>
				
					<?php if(get_theme_mod('walker_counter_text_3')){?>
						<h5><?php echo esc_html(get_theme_mod('walker_counter_text_3'));?></h5>
					<?php }?>
				</div>
			<?php } ?>
			
				<?php if(get_theme_mod('walker_counter_number_4')){?>
					<div class="counter-box">
					<h1><div class="count-number"><?php echo esc_html(get_theme_mod('walker_counter_number_4'));?></div>+</h1>
				
				<?php if(get_theme_mod('walker_counter_text_4')){?>
					<h5><?php echo esc_html(get_theme_mod('walker_counter_text_4'));?></h5>
				<?php }?>
			</div>
			<?php } ?>
			
		</div>
	</div>
<?php }
} ?>