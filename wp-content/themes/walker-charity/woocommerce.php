<?php
/**
 *  Template for Woocommerce 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package walker_charity
 */


get_header(); ?>
<div class="wc-wraper woocommerce-wraper">
	<div class="wc-container">
		<main id="primary" class="site-main wc-grid-9">
			<?php woocommerce_content(); ?>
		</main>
		<div class="wc-grid-3 sidebar-block">
			<?php get_sidebar();?>
		</div>
	</div>
</div>

<?php get_footer();