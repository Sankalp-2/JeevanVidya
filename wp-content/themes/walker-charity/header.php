<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package walker_Charity
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'walker-charity' ); ?></a>

	<header id="masthead" class="site-header">
		<?php walker_charity_header(); ?>
	</header><!-- #masthead -->
<?php  
if(get_theme_mod('enable_sub_header_in_home')==true){
	walker_charity_subheader();
}else{
	if ( !is_front_page() && !is_home() ) {
		walker_charity_subheader();
	}
}
?>
<?php 
	$get_allpage_status = get_theme_mod('banner_section_allpage_status');
	if($get_allpage_status){
		walker_charity_banner(); 
	}elseif ( is_front_page() || is_home() ){
		walker_charity_banner(); 
	}?>
</div>