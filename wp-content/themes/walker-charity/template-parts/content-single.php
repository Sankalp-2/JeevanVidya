<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_Charity
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(get_theme_mod('enable_featrued_post_image','true')){
			walker_charity_post_thumbnail();
		} ?>
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				if(get_theme_mod('single_author_status','true')){
					walker_charity_posted_on();
				}
				if(get_theme_mod('single_post_date_status','true')){
					walker_charity_posted_by();
				}
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'walker-charity' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'walker-charity' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php 
		if(get_theme_mod('single_category_status','true')){
			walker_charity_post_category(); 
		}
		if(get_theme_mod('single_tags_status','true')){
			walker_charity_post_tag();
		}
		 ?>
	</footer><!-- .entry-footer -->
	
		<?php
		the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'walker-charity' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'walker-charity' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
		?>

	<?php if(get_theme_mod('enable_author_box_status','true')){?>
		<div class="wc-author-box">
            <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), 215 ); ?>
            <?php if( $avatar ) : ?>
            <div class="author-img">
               <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                   <?php echo $avatar; ?>
                </a>
            </div>
            <?php endif; ?>
            <div class="author-details">
                <h4><?php echo esc_html( get_the_author() ); ?> </h4>
                <p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
                <a class="author-more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo __('Learn More','walker-charity');?> &#8594; </a>
            </div>
        </div>
    <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
