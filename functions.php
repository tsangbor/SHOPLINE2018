<?php
/**
 * shopline2018 functions and definitions
 *
 * @package shopline2018
 */ 


// Register Custom Navigation Walker
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}


if ( ! function_exists( 'shopline2018_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shopline2018_setup() {

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumb', 100, 100, true );
	add_image_size( 'swiper-thumb', 390, 188, true );
	add_image_size( 'global-thumb', 890, 428, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => '主選單',
		'mobile-header-menu' => '手機Header選單'
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'quote',
	) );

}
endif; // shopline2018_setup
add_action( 'after_setup_theme', 'shopline2018_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shopline2018_widgets_init() {
	register_sidebar( array(
		'name'          => 'Global Sidebar',
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s box--sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="box__title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );	
	register_sidebar( array(
		'name'          => 'Global Header',
		'id'            => 'header-top-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
	register_sidebar( array(
		'name'          => 'Global Copyright',
		'id'            => 'copyright-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => 'Home post swiper',
		'id'            => 'swiper-home',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="catalog--title"><i class="ico--beginner"></i><span>',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer 4',
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	//Register the sidebar widgets   
	register_widget( 'shopline_Video_Widget' ); 
	register_widget( 'CategoryPosts' );  
	
}
add_action( 'widgets_init', 'shopline2018_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shopline2018_scripts() {
	remove_action( 'wp_head', 'wp_generator' );
	wp_enqueue_style( 'shopline2018-style', get_stylesheet_uri() );
	wp_enqueue_style( 'shopline2018-sprite', get_template_directory_uri() . '/css/sprite.css' );
	/*wp_enqueue_style( 'shopline2018-adjunction', get_template_directory_uri() . '/css/adjunction.css' );*/
	wp_enqueue_style( 'shopline2018-notosanstc', '//fonts.googleapis.com/earlyaccess/notosanstc.css');  	
	wp_enqueue_style( 'shopline2018-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,600,700'); 
	

	wp_enqueue_script( 'shopline2018-framework', get_template_directory_uri() . '/js/framework.js', array(), '201803010000', true );	
	wp_enqueue_script( 'shopline2018-global', get_template_directory_uri() . '/js/global.js', array(), '201803010000', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'shopline2018_scripts' );

function footer_enqueue_scripts() {

	add_action('wp_head', 'wp_print_scripts', 5);
	add_action('wp_head', 'wp_enqueue_scripts', 5);
	add_action('wp_head', 'wp_print_head_scripts', 5);
}
add_action( 'after_setup_theme', 'footer_enqueue_scripts' );


function prefix_add_footer_styles() {
    wp_enqueue_style( 'shopline2018-adjunction', get_template_directory_uri() . '/css/adjunction.css' );
};
add_action( 'get_footer', 'prefix_add_footer_styles' );
/**
 * Change the excerpt length
 */
function shopline0218_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_length', '10');
	return $excerpt; 

}

add_filter( 'excerpt_length', 'shopline0218_excerpt_length', 999 );

/**
 *
 */
function shopline2018_body_class( $classes ){
	if ( !is_home() && !is_front_page() || is_paged() ){
		$classes[] = 'article';
	}else{
		$classes[] = 'index';
	}
	return $classes;
}
add_filter('body_class','shopline2018_body_class');



function shopline2018_CopyrightAfterContent($content){
	if(is_page() || is_single()){
	    ob_start();
	    dynamic_sidebar('copyright-1');
	    $sidebar_html = ob_get_contents();
	    ob_end_clean();		
	    return $content . $sidebar_html;
	}else{
		return $content ;
	}
}
add_filter('the_content', 'shopline2018_CopyrightAfterContent');


// define the paginate_links callback 
function shopline2018_filter_paginate_links($link){
	return $link;
}
add_filter('paginate_links', 'shopline2018_filter_paginate_links');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Include additional custom admin panel features. 
 */
/*
require get_template_directory() . '/panel/functions-admin.php';
require get_template_directory() . '/panel/theme-admin_page.php'; 
*/
/**
 * Google Fonts  
 */
/*require get_template_directory() . '/inc/gfonts.php';*/

/**
 * register your custom widgets
 */ 
require get_template_directory() . "/widgets/contact-info.php";
require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . "/widgets/cat-posts.php";

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php'; 

/**
 * Activate for a child theme.  Always use a child theme to make edits.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/use-child-theme.php' );

/**
 * Minify HTML for WordPress.
 */
//require get_template_directory() . '/inc/html-minify.php'; 

