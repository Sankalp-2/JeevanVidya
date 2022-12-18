<?php
/**
 * walker Charity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package walker_Charity
 */

if ( ! defined( 'WALKER_CHARITY_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WALKER_CHARITY_VERSION', '1.0.0' );
}

if ( ! function_exists( 'walker_charity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function walker_charity_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on walker Charity, use a find and replace
		 * to change 'walker-charity' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'walker-charity', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary Menu', 'walker-charity' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'walker_charity_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'walker_charity_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function walker_charity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'walker_charity_content_width', 640 );
}
add_action( 'after_setup_theme', 'walker_charity_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function walker_charity_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'walker-charity' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'walker-charity' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'walker-charity' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'walker-charity' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'walker-charity' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'walker-charity' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'walker-charity' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'walker-charity' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'walker-charity' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'walker-charity' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'walker_charity_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function walker_charity_scripts() {
	wp_enqueue_style( 'walker-charity-style', get_stylesheet_uri(), array(), WALKER_CHARITY_VERSION );
	wp_style_add_data( 'walker-charity-style', 'rtl', 'replace' );
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/all.css', '5.15.3');
	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.css', '6.5.9');

	wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/js/all.js', array(), WALKER_CHARITY_VERSION, true );
	wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.js', array('jquery'), '6.5.9', true );
	wp_enqueue_script( 'walker-charity-scripts', get_template_directory_uri() . '/js/walker-charity-scripts.js', array(), WALKER_CHARITY_VERSION, true );
	wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), '3.0.6', true );

	wp_enqueue_script( 'walker-charity-navigation', get_template_directory_uri() . '/js/navigation.js', array(), WALKER_CHARITY_VERSION, true );


	$walker_charity_body_font = esc_html(get_theme_mod('walker_charity_body_fonts'));
	$walker_charity_heading_font = esc_html(get_theme_mod('walkercharity_heading_fonts'));
	

	if( $walker_charity_body_font ) {
		wp_enqueue_style( 'walker-charity-body-fonts', '//fonts.googleapis.com/css?family='. $walker_charity_body_font );
	} else {
		wp_enqueue_style( 'walkermag-body-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
	}

	if( $walker_charity_heading_font ) {
		wp_enqueue_style( 'walker-charity-headings-fonts', '//fonts.googleapis.com/css?family='. $walker_charity_heading_font );
	} else {
		wp_enqueue_style( 'walker-charity-headings-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'walker_charity_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Recommended plugins for this theme.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Theme Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( ! function_exists( 'walker_charity_dynamic_css' ) ) :
	function walker_charity_dynamic_css(){
		get_template_part('inc/customizer/dynamic-style');

	} 
endif;
add_action( 'wp_head', 'walker_charity_dynamic_css');


function walker_charity_set_to_premium() {
	$premium_status = false;
	if ( class_exists( 'Walker_Core' ) ) {
		$WC = new Walker_Core();
		$premium_status = $WC->walker_core_premium_status();
	}
	return $premium_status;

}