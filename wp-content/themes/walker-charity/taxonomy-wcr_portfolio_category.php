<?php
/**
 * The template for displaying portafolio archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_charity
 */

get_header();
if(walker_charity_set_to_premium() ){ ?>
<div class="wc-wraper portafolio-archive">
	<div class="wc-container">
		<div class="wc-grid-12 archive-list-header">
			<?php 
                if(get_theme_mod('portfolio_page_heading_text') ){
                    echo '<h2>'.esc_html(get_theme_mod('portfolio_page_heading_text')).'</h2>';
                }
                if(get_theme_mod('portfolio_page_desc_text') ){
                    echo '<p>'.esc_html(get_theme_mod('portfolio_page_desc_text')).'</p>';
            }?>
		</div>
		<div class="wc-grid-3 sidebar-block">
			<?php echo '<h4>'. __('List by Category:','walker-charity') .'</h4>'; ?>
			<?php	$portfolio_catargs = array(
						'type'                     => 'wcr_portfolio',
						'child_of'                 => 0,
						'parent'                   => '',
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 1,
						'hierarchical'             => 1,
						'exclude'                  => '',
						'include'                  => '',
						'number'                   => '',
						'taxonomy'                 => 'wcr_portfolio_category',
						'pad_counts'               => false 
					);

			$categories = get_categories($portfolio_catargs);
			if($categories){?>
				<ul class="portfolio-categories">
			 <?php 
          		foreach ($categories as $category) {
    				$protfolio_term_url = get_term_link($category);?>
					 	<li>
					 	<a href="<?php echo esc_url($protfolio_term_url);?>"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $category->name;  echo '<span class="item-count">('. $category->count .')</span>'; ?></a></li>
					<?php }
					} ?>
					</ul>
				

		</div>
		<main id="primary" class="site-main wc-grid-9">
			<div class="porftfolio-grid">
			<?php
			
			if ( have_posts() ) :?>
				<?php /* Start the Loop */
				while ( have_posts() ) :
					the_post();?>
						<div class="portfolio-holder">
							<?php if ( has_post_thumbnail() ) {?>
					    		<?php  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');?>
							        <div class="portfolio-featured-image">
							        	<a href="<?php echo $large_image_url[0];?>"> <?php  the_post_thumbnail(); ?></a>
							        	<a href="<?php the_permalink();?>" class="archive-portfolio-details">
							        		<i class="fas fa-external-link-alt"></i>
							        	</a>
							        </div>
							<?php }?>
							<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							<div class="portfolio-description"><?php echo walker_charity_excerpt('30');?></div>
							<a href="<?php the_permalink();?>" class="primary-button"><span><?php echo __('Read More','walker-charity')?></span></a>
						</div>
						<?php endwhile;

				walker_charity_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>
			<?php walker_charity_pagination(); ?>
		</main><!-- #main -->
	</div>
</div>
<?php 
}
get_footer();