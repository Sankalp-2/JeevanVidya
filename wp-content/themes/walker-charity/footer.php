<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package walker_Charity
 */

?>
<?php 
	walker_charity_footer_before();
	get_template_part( 'template-parts/partials/footer/footer-widget-one');
    walker_charity_footer_copyright();
    walker_charity_footer_after();
    walker_charity_scroll_top();
?>
<?php wp_footer(); ?>

</body>
</html>
