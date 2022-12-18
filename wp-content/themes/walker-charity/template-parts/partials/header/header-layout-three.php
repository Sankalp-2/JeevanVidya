<?php
$site_sticky_header_status = get_theme_mod('site_stikcy_menu_option');
$site_stikcy_class='';
if($site_sticky_header_status){
	$site_stikcy_class='sticky-header';
}
?>
<div class="wc-wraper no-gap main-header header-layout-3">
	<div class="wc-container">
		<div class="main-header-left">
			<?php 
			walker_charity_header_location();
			?>
		</div>
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
			<?php get_template_part( 'template-parts/partials/social-media');?>
		</div>
	</div>
</div>
<div class="wc-wraper header-layout-2 header-layout-3 no-gap wc-navigation <?php echo esc_attr($site_stikcy_class);?>">
	<div class="wc-container">
		<?php 
				walker_charity_navigation();
				
			?>
	</div>
</div>