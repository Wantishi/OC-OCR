<?php
/**
 * oc-ocr functions and definitions
 *
 *
 * @package oc-ocr
 */

/**
 * Store the theme's directory path and uri in constants
 */
 define('THEME_DIR_PATH', get_template_directory());
 define('THEME_DIR_URI', get_template_directory_uri());

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

if ( ! function_exists( 'oc_ocr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oc_ocr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on oc-ocr, use a find and replace
		 * to change 'oc-ocr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oc-ocr', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'Primary', 'oc-ocr' ),
			'mobile_menu' => esc_html__( 'Mobile', 'oc-ocr' ),
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
		add_theme_support( 'custom-background', apply_filters( 'oc_ocr_custom_background_args', array(
			'default-color' => 'ffffff',
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
add_action( 'after_setup_theme', 'oc_ocr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oc_ocr_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'oc_ocr_content_width', 640 );
}
add_action( 'after_setup_theme', 'oc_ocr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oc_ocr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oc-ocr' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'oc-ocr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'oc_ocr_widgets_init' );

// include custom jQuery
function oc_ocr_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, false);
  
  }
  add_action('wp_enqueue_scripts', 'oc_ocr_include_custom_jquery', 1);


/**
 * Enqueue scripts and styles.
 */
function oc_ocr_scripts() {
	wp_enqueue_style( 'oc-ocr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'oc-ocr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'oc-ocr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oc_ocr_scripts' );


function oc_ocr_assets() {
	// SLICK
	wp_enqueue_style( 'slick_stylesheet', get_template_directory_uri() . '/dist/vendor/slick/slick.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'slick-theme_stylesheet', get_template_directory_uri() . '/dist/vendor/slick/slick-theme.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'slick-lightbox_stylesheet', get_template_directory_uri() . '/dist/vendor/slick/slick-lightbox.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'slick_scripts', get_template_directory_uri() . '/dist/vendor/slick/slick.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'slick-lightbox_scripts', get_template_directory_uri() . '/dist/vendor/slick/slick-lightbox.min.js', array('jquery'), '1.0.0', true );
	
	// MAIN
	wp_enqueue_style( 'oc_ocr-stylesheet', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'oc_ocr-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'oc_ocr_assets');



/* Change Excerpt length */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/* Author List */
function contributors() {
	global $wpdb;
	 
	$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users WHERE display_name <> 'admin' ORDER BY display_name");
	 
	foreach($authors as $author) {
		echo "<li>";
		echo "<a href=\"".get_bloginfo('url')."/?author=";
		echo $author->ID;
		echo "\">";
		echo get_avatar($author->ID);
		echo "</a>";
		echo '<div>';
		echo "<a href=\"".get_bloginfo('url')."/?author=";
		echo $author->ID;
		echo "\">";
		the_author_meta('display_name', $author->ID);
		echo "</a>";
		echo "</div>";
		echo "</li>";
	}
}


/* Hierarchical TAGS */
/*
 * Meta Box Removal
 */
function rudr_post_tags_meta_box_remove() {
	$id = 'tagsdiv-post_tag'; // you can find it in a page source code (Ctrl+U)
	$post_type = 'post'; // remove only from post edit screen
	$position = 'side';
	remove_meta_box( $id, $post_type, $position );
}
add_action( 'admin_menu', 'rudr_post_tags_meta_box_remove');


/* Arrange Events by ACF date */
function mind_pre_get_posts( $query ) {
  
	if( is_admin() ) {
	  return $query; 
	}
  
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'event' && $query->is_main_query() ) {
	  
	  $query->set('orderby', 'meta_value'); 
	  $query->set('meta_key', 'event_date_1');   
	  $query->set('order', 'ASC'); 
	  
	}
	return $query;
  
  }
  
  add_action('pre_get_posts', 'mind_pre_get_posts');


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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

