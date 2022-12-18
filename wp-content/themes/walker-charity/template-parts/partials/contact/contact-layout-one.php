<?php 
if(walker_charity_set_to_premium() ){ 
if(get_theme_mod('conatct_section_status')){
$contact_section_bg='';
if(get_theme_mod('contact_section_map_bg_image')){
	$contact_section_bg= get_theme_mod('contact_section_map_bg_image');
}?>
	
<div class="wc-wraper contact-wraper conatct-layout-1" style="background: url(<?php echo esc_url($contact_section_bg);?>) no-repeat; background-size: cover; background-attachment: fixed;">
	<div class="wc-container">
		<div class="wc-grid-7 info-col">
			<?php if(get_theme_mod('contact_section_heading_text')){
				echo '<h2>'. esc_html(get_theme_mod('contact_section_heading_text')) .'</h2>';
			}
			if(get_theme_mod('contact_section_desc_text')){
				echo '<p>'. esc_html(get_theme_mod('contact_section_desc_text')) .'</p>';
			}?>
			<div class="info-box">
				<?php if(get_theme_mod('contact_section_address')){
					echo '<div class="contact-line">';
						echo '<h4>'.__('Address:','walker-charity').'</h4>';
						echo '<p> <i class="fas fa-map-marker-alt"></i> '. esc_html(get_theme_mod('contact_section_address')) .'</p>';
					echo '</div>';
				}
			if(get_theme_mod('contact_section_phone')){
				echo '<div class="contact-line">';
					echo '<h4>'.__('Phone:','walker-charity').'</h4>';
					echo '<p> <i class="fas fa-phone-alt"></i> '. esc_html(get_theme_mod('contact_section_phone')) .'</p>';
				echo '</div>';
			}
			if(get_theme_mod('contact_section_email')){
				echo '<div class="contact-line">';
					echo '<h4>'.__('Email:','walker-charity').'</h4>';
					echo '<p> <i class="far fa-envelope"></i> '. esc_html(get_theme_mod('contact_section_email')) .'</p>';
				echo '</div>';
			}
			if(get_theme_mod('contact_section_office_hour')){
				echo '<div class="contact-line">';
					echo '<h4>'.__('Office Hour:','walker-charity').'</h4>';
					echo '<p> <i class="far fa-clock"></i> '. esc_html(get_theme_mod('contact_section_office_hour')) .'</p>';
				echo '</div>';
			}?>
			</div>
		</div>
		<div class="wc-grid-5 form-col">
			<?php 
			if(get_theme_mod('contact_form_title_text')){
				echo '<h2>'. esc_html(get_theme_mod('contact_form_title_text')) .'</h2>';
			}
			if(get_theme_mod('conatct_section_form_shortcode')){
				$walker_charity_contact_form = get_theme_mod('conatct_section_form_shortcode');
				echo do_shortcode( wp_kses_post( $walker_charity_contact_form ) ); 
			}?>
		</div>
	</div>
</div>
<?php } 
}?>