<?php
/**
 * Elo functions and definitions
 *
 * @package Elo
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'elo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elo_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Elo, use a find and replace
	 * to change 'elo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'elo', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'elo' ),
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
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Adding editor style
	add_editor_style( array(
		'custom-editor-style.css'
	) );

	//Setup the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'elo_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	
}
endif; // elo_setup
add_action( 'after_setup_theme', 'elo_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function elo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'elo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'elo_widgets_init' );


if ( ! function_exists( 'elo_fonts_url' ) ) :
/**
 * Register Google fonts for Elo.
 *
 * @since Elo 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function elo_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noticia Text, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noticia Text font: on or off', 'elo' ) ) {
		$fonts[] = 'Noticia Text:400,400italic,700';
	}

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'elo' ) ) {
		$fonts[] = 'Open Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800';
	}

	/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'elo' ) ) {
		$fonts[] = 'Lora:400,700,400italic,700italic';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'elo' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


if ( ! function_exists( 'elo_categories_link' ) ) :
/**
 * Register Google fonts for Elo.
 *
 * @since Elo 1.0
 *
 * @return string Google fonts URL for the theme.
 */	
function elo_categories_link() {
	$categories_list = get_the_category_list( _x( ' ', ' ', 'elo' ) );
	if ( $categories_list ) {
		printf( '<div class="category-list">%2$s</div>',
			_x( '', '', 'elo' ),
			$categories_list
		);
	}
}
endif;


if ( ! function_exists( 'elo_posted_by' ) ) :
/**
 * Register Google fonts for Elo.
 *
 * @since Elo 1.0
 *
 * @return string Google fonts URL for the theme.
 */	
function elo_posted_by() {
	echo '<div class="entry-meta">';
	echo 'By:';
	echo '<span>';
	echo get_the_author_meta('nickname'); 
	echo '</span>';
	echo '</div>'; 
}
endif;



/**
 * Enqueue scripts and styles.
 */
function elo_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'elo-fonts', elo_fonts_url(), array(), null );

	wp_enqueue_style( 'elo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'elo-main', get_template_directory_uri() . '/js/main.js', array(), '20150505', true );

	wp_enqueue_script( 'elo-modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '20150505', true );

	wp_enqueue_script( 'elo-classie', get_template_directory_uri() . '/js/classie.js', array(), '20150505', true );

	wp_enqueue_script( 'elo-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), '20150505', true );

	wp_enqueue_script( 'elo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'elo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// word limiter
function elo_custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'elo_custom_excerpt_length', 999 );
    
function elo_new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'elo_new_excerpt_more');

