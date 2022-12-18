<?php
/**
 * Template part for displaying portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_charity
 */
if(walker_charity_set_to_premium()  ){ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wc-wraper single-portfolio">
		<div class="wc-container">
			<div class="wc-grid-4">
				<h2 class="portfolio-title"><?php the_title();?></h2>
				<?php
				
					$terms = get_the_terms( $post->ID, 'wcr_portfolio_category' );
					if($terms){
						echo '<h3 class="cat-level">'.__('Project Category','walker-charity').'</h3>';
						echo '<ul class="portfolio-categories">';
					    foreach($terms as $term) {
					      echo '<li>'. $term->name .'</li>';
					    }
					echo '</ul>';
					}
					
				 ?>
			</div>
			<div class="wc-grid-8">
				<?php 
				walker_charity_post_thumbnail();
				the_content();?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
