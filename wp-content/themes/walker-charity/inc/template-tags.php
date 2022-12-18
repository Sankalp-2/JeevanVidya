<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package walker_Charity
 */

if ( ! function_exists( 'walker_charity_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function walker_charity_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'walker-charity' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'walker_charity_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function walker_charity_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'walker-charity' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'walker_charity_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function walker_charity_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'walker-charity' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'walker-charity' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'walker-charity' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'walker-charity' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'walker-charity' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'walker-charity' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'walker_charity_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function walker_charity_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
if ( ! function_exists( 'walker_charity_excerpt' ) ) :
	function walker_charity_excerpt( $limit ) {
	    $excerpt = explode( ' ', get_the_excerpt(), $limit );
	    if ( count( $excerpt ) >= $limit ) {
	        array_pop( $excerpt );
	    }
	    $excerpt = implode( " ", $excerpt ).'...';
		$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
		return esc_html( $excerpt );
	}
endif;

if ( ! function_exists( 'walker_charity_excerpt_more' ) ) :
	function walker_charity_excerpt_more( $more ) {
		if ( is_admin() ) {
	        return $more;
	    }
	    return '...';
	}
endif;

if ( ! function_exists( 'walker_charity_add_excerpts_to_theme' ) ) :
	function walker_charity_add_excerpts_to_theme() {
	     add_post_type_support('page', 'excerpt');
	}
endif;
add_action('init', 'walker_charity_add_excerpts_to_theme');

function walker_charity_custom_excerpt_length(){
	if ( is_admin() ) {
	    return $length;
	}else{
		if(get_theme_mod('walker_charity_excerpt_length')){
		$excerpt_length = get_theme_mod('walker_charity_excerpt_length');
		}else{
			$excerpt_length = 30;
		}
		return $excerpt_length;
	}
	
}

if(! function_exists('walker_charity_post_category')):
	function walker_charity_post_category(){?>
        <span class="category">
            <?php $walker_charity_categories = get_the_category_list( esc_html__( ', ', 'walker-charity' ) );
			if ( $walker_charity_categories ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'walker-charity' ) . '</span>', $walker_charity_categories ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}?>
        </span>
    <?php }
endif;
if(! function_exists('walker_charity_post_tag')):
	function walker_charity_post_tag(){
		$walker_charity_tags = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'walker-charity' ) );
		if ( $walker_charity_tags ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'walker-charity' ) . '</span>', $walker_charity_tags ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

if(! function_exists('walker_charity_post_comments')):
	function walker_charity_post_comments(){
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"> <i class="far fa-comments"></i> ';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment <span class="screen-reader-text"> on %s</span>', 'walker-charity' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;

if( !function_exists('walker_charity_pagination')):
function walker_charity_pagination($pages = '', $range = 2){  
	$showitem = ($range * 2)+1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
		 $pages = 1;
		}
	}   

     if(1 != $pages){
         echo "<div class='walker-charity-pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitem < $pages) echo "<a class='first' href='".get_pagenum_link(1)."'>".esc_html('First','walker-charity')."</a>";
         if($paged > 1 && $showitem < $pages) echo "<a class='prev' href='".get_pagenum_link($paged - 1)."'><i class='fas fa-arrow-left'></i></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitem ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitem < $pages) echo "<a class='next' href='".get_pagenum_link($paged + 1)."'><i class='fas fa-arrow-right'></i></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitem < $pages) echo "<a class='last' href='".get_pagenum_link($pages)."'>". esc_html('Last','walker-charity') ."</a>";
         echo "</div>\n";
     }
	}
endif;