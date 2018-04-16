<?php
/**
 * temptation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package temptation
 */

if ( ! function_exists( 'temptation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function temptation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on temptation, use a find and replace
		 * to change 'temptation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'temptation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		
        add_image_size('temptation-sq-thumb', 600,600, true );
        add_image_size('temptation-thumb', 540,450, true );
        add_image_size('temptation-pop-thumb',542, 340, true );
        add_image_size('celsius-thumb', 230,350, true );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support( 'post-thumbnails' );

        //Declare woocommerce support
        add_theme_support('woocommerce');

        add_theme_support( 'wc-product-gallery-lightbox' );

        //Slider Support
        add_theme_support('rt-slider', array( 10 ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'temptation' ),
            'top-menu' => esc_html__( 'Top Menu', 'temptation' ),
            'mobile-menu' => __( 'Mobile Menu', 'temptation' ),

        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'temptation_custom_background_args', array(
			'default-color' => '171717',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'temptation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function temptation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'temptation_content_width', 640 );
}
add_action( 'after_setup_theme', 'temptation_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function temptation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'temptation' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'temptation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'temptation' ),
        'id'            => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'temptation' ),
        'id'            => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'temptation' ),
        'id'            => 'footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );
	
	
}
add_action( 'widgets_init', 'temptation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function temptation_scripts() {
	wp_enqueue_style( 'temptation-style', get_stylesheet_uri() );

    wp_enqueue_style('title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('temptation_title_font', 'Gugi') ).':400,700' );

    wp_enqueue_style('body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('temptation_body_font', 'Montserrat') ).':100,300,400,700' );

    //enqueue bootstrap and fontawesome css//
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css',true);

    wp_enqueue_style('fa',get_template_directory_uri().'/assets/fa/css/fontawesome-all.min.css');

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );

    wp_enqueue_style( 'temptation-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('temptation_skin', 'default').'.css' );

    wp_enqueue_script( 'temptation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//custom js
    wp_enqueue_script( 'temptation-custom-js', get_template_directory_uri() . '/assets/js/custom.js');
	
	//big-slide js
	wp_enqueue_script( 'bigslide-js', get_template_directory_uri() . '/js/jquery.big-slide.js');

	//External js
    wp_enqueue_script( 'temptation-external', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

}
add_action( 'wp_enqueue_scripts', 'temptation_scripts' );

/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/framework/theme-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Implement the Custom CSS Mods.
 */
require get_template_directory() . '/inc/css-mods.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/framework/customizer/_init.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/framework/tgmpa.php';

