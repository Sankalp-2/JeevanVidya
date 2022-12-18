<?php 
$site_sticky_header_status = get_theme_mod('site_stikcy_menu_option');
$site_stikcy_class='';
if($site_sticky_header_status){
	$site_stikcy_class='sticky-header';
}
if(get_theme_mod('walker_charity_topbar_status','true')){?>
<div class="wc-wraper topbar-wraper no-gap">
	<div class="wc-container">
		<div class="topbar-left-section">
			<?php 
				walker_charity_header_location();
				walker_charity_header_phone();
				walker_charity_header_email_address();
			?>

		</div>
		<div class="topbar-right-section">
			<?php get_template_part( 'template-parts/partials/social-media');?>
		</div>
	</div>
</div>
<?php } ?>
<div class="wc-wraper no-gap main-header header-layout-1 <?php echo esc_attr($site_stikcy_class);?>">
	<div class="wc-container">
		<div class="site-branding">
			<?php
			the_custom_logo();?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			
			$walker_charity_description = get_bloginfo( 'description', 'display' );
			if ( $walker_charity_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $walker_charity_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<div class="main-header-right">
			<?php 
				walker_charity_navigation();
				walker_charity_header_primary_button();
			?>
		</div>
	</div>
</div>