<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package walker_Charity
 */
$walker_charity_post_view = get_theme_mod('blog_post_view','fullwidth-view');
if($walker_charity_post_view =='grid-view'){
	$post_list_class ='grid-view';
}elseif($walker_charity_post_view =='list-view'){
	$post_list_class ='list-view';
}else{
	$post_list_class ='full-view';
}

$walker_charity_sidebar = get_theme_mod('blog_sidebar_layout','right-sidebar');
if($walker_charity_sidebar =='left-sidebar'){
	$recent_blog_sidebar_class = 'left-sidebar-layout';
	$main_content_class = 'wc-grid-9';
}
elseif($walker_charity_sidebar =='no-sidebar'){
	$recent_blog_sidebar_class = 'full-width-layout';
	$main_content_class = 'wc-grid-12';
}else{
	$recent_blog_sidebar_class =  'right-sidebar-layout';
	$main_content_class = 'wc-grid-9';
}
get_header();
?>
<div class="wc-wraper">
	<div class="wc-container">
		<?php if($walker_charity_sidebar =='left-sidebar'){?>
			<div class="wc-grid-3 sidebar-block">
					<?php get_sidebar();?>
			</div>
		<?php } ?>
		<main id="primary" class="site-main <?php echo esc_attr($main_content_class);?> <?php echo esc_attr($recent_blog_sidebar_class);?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="<?php echo esc_attr($post_list_class); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			echo '</div>';
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<?php if($walker_charity_sidebar =='right-sidebar'){?>
		<div class="wc-grid-3 sidebar-block">
				<?php get_sidebar();?>
		</div>
	<?php } ?>
	</div>
</div>
<?php get_footer();