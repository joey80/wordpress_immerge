<?php
/**
 * immerge_demo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package immerge_demo
 */

if ( ! function_exists( 'immerge_demo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function immerge_demo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on immerge_demo, use a find and replace
		 * to change 'immerge_demo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'immerge_demo', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'immerge_demo' ),
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
		add_theme_support( 'custom-background', apply_filters( 'immerge_demo_custom_background_args', array(
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
add_action( 'after_setup_theme', 'immerge_demo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function immerge_demo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'immerge_demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'immerge_demo_content_width', 0 );





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function immerge_demo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'immerge_demo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets to sidebar', 'immerge_demo' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer' ),
		'id' => 'footer-sidebar-1',
		'description' => esc_html__(' Add widgets to footer' ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'immerge_demo_widgets_init' );





/**
 * Add Google Map js to the contact page
 */
function immerge_google_map_add() {
	if (  is_page('Contact') ) {
			wp_enqueue_script('immerge_google_map', 'https://maps.googleapis.com/maps/api/js?v=3&#038;key=AIzaSyCVxv-kTxZm0K_9H6yDTHk461gTZ6SIM5I;ver=3.19.10', '', 1.0, true);
	}
} add_action('wp_enqueue_scripts', 'immerge_google_map_add');





/**
 * Enqueue scripts and styles.
 */
function immerge_demo_scripts() {
	wp_enqueue_style( 'immerge_demo-google-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:400,700' );
	wp_enqueue_style( 'immerge_demo-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bundle', get_template_directory_uri() . '/js/bundle.js', '', 1.0, true);
}
add_action( 'wp_enqueue_scripts', 'immerge_demo_scripts' );





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
* Hide the main editor on specific pages
*/

define('EDITOR_HIDE_PAGE_TITLES', json_encode(array('home', 'staff')));

/**
 * Hide the main editor on defined pages
 * 
 * You can choose between page titles or page templates. Just set them 
 * accordingly like this:
 * 
 * define('EDITOR_HIDE_PAGE_TITLES', json_encode(array('Home', 'Some post archive', 'Some Listing')));
 * define('EDITOR_HIDE_PAGE_TEMPLATES', json_encode(array('template-of-something.php', 'archive-customposttype.php')));
 * 
 * 
 * @global string $pagenow
 * @return void
 */

function immerge_hide_editor() {
	global $pagenow;
    if(!('post.php' == $pagenow)){
		return;
	}
	
	// Get the Post ID.
	$post_id = filter_input(INPUT_GET, 'post') ? filter_input(INPUT_GET, 'post') : filter_input(INPUT_POST, 'post_ID');
	if(!isset($post_id)) {
		return;
	}
	// Hide the editor on the page titled 'Homepage'
	if(in_array(get_the_title($post_id), json_decode(EDITOR_HIDE_PAGE_TITLES))) {
		remove_post_type_support('page', 'editor');
	}
	// Hide the editor on a page with a specific page template
	$template_filename = get_post_meta($post_id, '_wp_page_template', true);
	if(in_array($template_filename, json_decode(EDITOR_HIDE_PAGE_TEMPLATES))) {
		remove_post_type_support('page', 'editor');
	}
}

add_action('admin_init', 'immerge_hide_editor');





/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );





/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
