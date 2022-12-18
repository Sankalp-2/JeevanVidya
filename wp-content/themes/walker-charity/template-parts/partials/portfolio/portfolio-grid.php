<?php 
if(walker_charity_set_to_premium() ){ 
if(get_theme_mod('portfolio_status')){?>
<div class="wc-wraper portfolio-wraper portfolio-layout-2" id="gallery">
	<div class="wc-container  text-center">
		<div class="wc-grid-12">
			<?php if(get_theme_mod('portfolio_heading_text')){?>
				<h4 class="section-subheader text-center"><?php echo esc_html(get_theme_mod('portfolio_heading_text'));?></h4>
			<?php }
			if(get_theme_mod('portfolio_desc_text')){?>
				<h2 class="section-heading"><?php echo esc_html(get_theme_mod('portfolio_desc_text'));?></h2>
			<?php } ?>
			
		</div>
	</div>
<?php if(get_theme_mod('enable_portfolio_full_width_status','true')){
	$grid_layout_class = 'full-width';
}else{
	$grid_layout_class = 'box-width';
}?>
<div class="wc-container <?php echo esc_attr($grid_layout_class);?>" id="image-gallery">

<div class="wc-grid-12">
<?php
    if(get_theme_mod('portfolio_total_items')){
            $total_items_to_show = get_theme_mod('portfolio_total_items');
        }else{
            $total_items_to_show=6;
        }
    if( taxonomy_exists( 'wcr_portfolio_category' ) ){
            $portfolio_tax = '';
            $i = 0;
            $portfolio_posts = get_posts( array( 'post_type' => 'wcr_portfolio', 'post_status' => 'publish', 'posts_per_page' => $total_items_to_show ) );
            foreach( $portfolio_posts as $portfolio ){
                $terms = get_the_terms( $portfolio->ID, 'wcr_portfolio_category' );
                if( $terms ){
                    foreach( $terms as $term ){
                        $i++;
                        $portfolio_tax .= $term->term_id;
                        $portfolio_tax .= ', ';    
                    }
                }
            }
            $term_ids = explode( ', ', $portfolio_tax );
            $term_ids = array_diff( array_unique( $term_ids ), array('') );
            wp_reset_postdata(); 
        }
        
        $args = array(
            'taxonomy'      => 'wcr_portfolio_category',
            'orderby'       => 'name', 
            'order'         => 'ASC',
        );                
        $terms = get_terms( $args );
        if( $terms ){
        ?>
        <div class="button-group filter-button-group filter-buttons">        
            <button data-filter="*" class="active"><?php esc_html_e( 'All', 'walker-charity' ); ?></button>
            <?php
                foreach( $terms as $term ){
                    
                        if( in_array( $term->term_id, $term_ids ) )
                        echo '<button data-filter=".' . esc_attr( $term->term_id . '_portfolio_taxonomies' ) .  '">' . esc_html( $term->name ) . '</button>';
                    
                    
                } 
            ?>
                 
        <?php
    }?>
</div>
</div>
</div>
<div class="wc-container portfolio-list <?php echo esc_attr($grid_layout_class);?>">
<div class="wc-grid-12 portfolio-gallery">
  <?php  global $post;
    $portfolio_qry = new WP_Query( array( 'post_type' => 'wcr_portfolio', 'post_status' => 'publish', 'posts_per_page' => $total_items_to_show ) );
    if( taxonomy_exists( 'wcr_portfolio_category' ) && $portfolio_qry->have_posts() ){ ?>
                        
        <div class="walker-charity-portfolio">
            <?php
            while( $portfolio_qry->have_posts() ){
                $portfolio_qry->the_post();
                $terms = get_the_terms( get_the_ID(), 'wcr_portfolio_category' );
                $portfolio_tax = '';
                $i = 0;
                if( $terms ){
                    foreach( $terms as $term ){
                        $i++;
                        $portfolio_tax .= $term->term_id . '_portfolio_taxonomies';
        
                        if( count( $terms ) > $i ){
                            $portfolio_tax .= ' ';
                        }
                    }
                } ?>                   
                <div class="portfolio-item item <?php echo esc_attr( $portfolio_tax ); ?>">
                    <?php if( has_post_thumbnail() ) { ?>
                        <a href="<?php the_permalink(); ?>" class="portfolio-thumb"><?php the_post_thumbnail( 'portfolio-thumb', array( 'itemprop' => 'image' ) ); ?></a>
                    <?php }else {?>
                        <a href="<?php the_permalink(); ?>" class="portfolio-thumb"><?php echo '<img src="' . esc_url( get_template_directory_uri() . '/images/default-thumb.png'  ) . '" alt="' . esc_attr( get_the_title() ) . '" itemprop="image" />'; ?></a>
                   <?php  } ?>
                   <a href="<?php the_permalink(); ?>"> <span class="more-portfolio"><i class="fas fa-external-link-alt"></i></span></a>
                    <div class="overlay-content">
                            <h3 class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php $portfolio_terms = get_the_terms( $post, 'wcr_portfolio_category');
                            if( ! empty( $portfolio_terms ) ) { ?>
                                <span class="portfolio-categories">
                                    <?php 
                                    foreach( $portfolio_terms as $portfolio_term ){
                                       echo '<a href="' . get_term_link($portfolio_term->slug, 'wcr_portfolio_category' ) . '">';
                                        echo '<span>' . esc_html( $portfolio_term->name ) . '</span>'; 
                                        echo '</a>';
                                    } ?>
                                </span>
                            <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
        wp_reset_postdata(); 
    } 
?>

</div>
<div class="wc-grid-12 text-center portfolio-button-row">
			<?php 
				if(get_theme_mod('portfolio_btn_text')){
					if(get_theme_mod('portfolio_btn_url')){
						$more_portfolio_link = get_theme_mod('portfolio_btn_url');
					}else{
						$more_portfolio_link='#';
					}

					if(get_theme_mod('portfolio_btn_target')){
						$more_portfolio_link_target='_blank';
					}else{
						$more_portfolio_link_target='_self';
					}
					?>
					<a href="<?php echo esc_url($more_portfolio_link);?>" class="more-features primary-button" target="<?php echo esc_attr($more_portfolio_link_target);?>">
						<span><?php echo esc_html(get_theme_mod('portfolio_btn_text'));?></span>
						</a>
				<?php }
				?>
		</div>
</div>
</div>
<?php } 
}?>