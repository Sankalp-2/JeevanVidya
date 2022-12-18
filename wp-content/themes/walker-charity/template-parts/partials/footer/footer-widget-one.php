<?php
/**
 *Footer widget for Waler Charity
 *
 * @package walker_charity
 * @since version 1.0.0
 */

if(walker_charity_footer_widgets_status()){
?>

<div class="wc-wraper footer-widgets-wraper wc-footer-layout-1">
	<div class="wc-container footer-wiget-list">
		<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
		    <div id="wc-footer-column">
		        <?php dynamic_sidebar( 'footer-1' ); ?>
		    </div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
		    <div id="wc-footer-column">
		        <?php dynamic_sidebar( 'footer-2' ); ?>
		    </div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
		    <div id="wc-footer-column">
		        <?php dynamic_sidebar( 'footer-3' ); ?>
		    </div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-4' ) ) { ?>
		    <div id="wc-footer-column">
		        <?php dynamic_sidebar( 'footer-4' ); ?>
		    </div>
		<?php } ?>
	</div>
</div>
<?php } ?>
