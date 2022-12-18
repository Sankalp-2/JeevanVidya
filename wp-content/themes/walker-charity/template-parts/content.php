<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_Charity
 */
if(get_theme_mod('walker_charity_excerpt_more')){
	$walker_cgarity_read_more = get_theme_mod('walker_charity_excerpt_more');
}else{
	$walker_cgarity_read_more = __('Read More','walker-charity');
}

$walker_charity_post_view = get_theme_mod('blog_post_view','fullwidth-view');
if($walker_charity_post_view =='grid-view' || $walker_charity_post_view =='list-view'){?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content-holder">

		<?php 
		if ( has_post_thumbnail() ) {
			echo '<div class="featured-image-holder">';
			walker_charity_post_thumbnail(); 
			if(get_theme_mod('post_date_status','true')){
			    $archive_year  = get_the_time('Y'); $archive_month_letter = get_the_time('M'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?></a>
		            <a class="post-date-stamp" href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
		                <span class="post-date-day"><?php echo $archive_day; ?></span>
		                <span class="post-date-month"><?php echo $archive_month_letter; ?></span>
		            </a>
		   		<?php 
		   	}
	   		echo '</div>';
	   		$inner_content_class= 'with-thumbnail';
		} else{
			$inner_content_class= 'without-thumbnail';
		}?>
		
		<div class="entry-content <?php echo esc_attr($inner_content_class); ?>">
			<header class="entry-header">
             <?php   
             the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					if(get_theme_mod('author_status','true')){
						walker_charity_posted_by(); 
					}
					if (! has_post_thumbnail() && get_theme_mod('post_date_status','true') ) {
						walker_charity_posted_by();
					}
					if(get_theme_mod('category_status','true')){
						walker_charity_post_category(); 
					}
					if(get_theme_mod('tags_status','true')){
						walker_charity_post_tag();
					}
					if(get_theme_mod('comment_status','true')){
				    	walker_charity_post_comments();
				    }
					
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
			<?php 
			the_excerpt(); ?>
			<a href="<?php the_permalink();?>" class="primary-button"><span><?php echo esc_html($walker_cgarity_read_more);?></span></a>
		</div><!-- .entry-content -->
	</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php
}else{
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content-holder">

		<?php 
		if ( has_post_thumbnail() ) {
			echo '<div class="featured-image-holder">';
			walker_charity_post_thumbnail(); 
			if(get_theme_mod('post_date_status','true')){
			    $archive_year  = get_the_time('Y'); $archive_month_letter = get_the_time('M'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?></a>
		            <a class="post-date-stamp" href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
		                <span class="post-date-day"><?php echo $archive_day; ?></span>
		                <span class="post-date-month"><?php echo $archive_month_letter; ?></span>
		            </a>
		   		<?php 
	   		}
	   		echo '</div>';
		} ?>
		<header class="entry-header">
			<?php if(get_theme_mod('author_image_status','true')){?>
				<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php
				$get_author_id = get_the_author_meta('ID');
				$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 100));
				 echo '<img src="'.$get_author_gravatar.'" alt="'.get_the_title().'" class="post-author-img" />';
				?></a>
			<?php } 
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					if(get_theme_mod('author_status','true')){
						walker_charity_posted_by(); 
					}
					if(get_theme_mod('category_status','true')){
						walker_charity_post_category(); 
					}
					
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php 
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			echo '<div class="entry-meta">';
			if (! has_post_thumbnail() && get_theme_mod('post_date_status','true') ) {
					walker_charity_posted_by();
				}
			if(get_theme_mod('tags_status','true')){
				walker_charity_post_tag();
			}
			if(get_theme_mod('comment_status','true')){
				walker_charity_post_comments();
			}
			echo '</div>';
			echo '<p>'. esc_html(walker_charity_excerpt( walker_charity_custom_excerpt_length() )) .'</p>'; ?> 
			<a href="<?php the_permalink();?>" class="primary-button"><span><?php echo esc_html($walker_cgarity_read_more);?></span></a>
		</div><!-- .entry-content -->
	</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
