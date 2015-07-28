<?php

if ( ! function_exists( 'lila_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function lila_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'lila', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head.
	add_theme_support( 'title-tag' ); 			// Let WordPress manage the document title.
	add_theme_support( 'post-thumbnails' );		// Enable support for Post Thumbnails on posts and pages.

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		// 'primary' => esc_html__( 'Primary Menu', 'lila' ),
		'primary' => 'Primary Menu',
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

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif; // lila_setup
add_action( 'after_setup_theme', 'lila_setup' );

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 2000;
}

/**
 * Register widget area.
 * http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function lila_widgets_init() {
	register_sidebar( array (
		'name'			=> esc_html__( 'Footer Contact', 'lila' ),
		'id'			=> 'sidebar-2',
		'before_widget'	=> '<div class="footer-contact col-6">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="fancy-heading">',
		'after_title'	=> '</h2>'
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Footer Social Media', 'lila' ),
		'id'			=> 'sidebar-3',
		'before_widget'	=> '<div class="footer-links col-6">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="fancy-heading">',
		'after_title'	=> '</h2>'
	) );
}
add_action( 'widgets_init', 'lila_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lila_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	// wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/js/libraries/jquery.flexslider.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lila_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom post type/taxonomy
 *
 * @todo Move to plugin.
 */
require get_template_directory() . '/inc/project-post.php';

function change_avatar_css( $class ) {
	$class = str_replace( 'class="avatar"', 'class="icon"', $class ) ;
	return $class;
}
add_filter( 'get_avatar', 'change_avatar_css' );

?>