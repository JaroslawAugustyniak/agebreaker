<?php
/**
 * agebreaker functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agebreaker
 */
add_filter('show_admin_bar', '__return_false');
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.3' );
}



if(is_user_logged_in()){
	$current_user = wp_get_current_user();


	if ( is_admin() && in_array( 'subscriber', (array) $current_user->roles ) ) {
		// Jeśli użytkownik ma rolę 'pkp', przekieruj go na stronę główną
		wp_redirect( home_url() );
		exit;
	}elseif(in_array( 'subscriber', (array) $current_user->roles )){
		add_filter('show_admin_bar', '__return_true');
	}
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function displayAcfSvg($name, $postId = false){
	
	$field = get_field($name, $postId);

	if($field){
		$fileArr = explode('uploads', $field['url']); 
		$file = isset($fileArr[1]) ? $fileArr[1] : false;


		if($file){
			include (wp_upload_dir()['basedir'].$file);
		}
	}
}

function create_slug($text, $delimiter = '-') {
    // Zamień znaki specjalne na ich odpowiedniki bez znaków diakrytycznych
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    
    // Usuń wszystkie znaki, które nie są literami, cyframi, myślnikami lub podkreślnikami
    $text = preg_replace('/[^A-Za-z0-9-_]/', ' ', $text);
    
    // Usuń zbędne spacje
    $text = trim($text);
    
    // Zamień wszystkie spacje na delimiter
    $text = preg_replace('/\s+/', $delimiter, $text);
    
    // Zamień wielokrotne wystąpienia delimitera na pojedyncze
    $text = preg_replace('/' . preg_quote($delimiter) . '+/', $delimiter, $text);
    
    // Zamień wszystkie litery na małe
    $text = strtolower($text);
    
    return $text;
}


function displayImage($path, $class='', $alt=''){
	// echo $path;
	$dir = wp_upload_dir()['basedir'];
	
	$pathArr = explode('wp-content/uploads', $path);
	$dir .= $pathArr[1];
	
	$pathinfo = pathinfo($dir);

	$dir .= '.webp';

	// die();
	// if(file_exists($dir)){
	// 	echo '<picture>
	// 			<source srcset="'.$path.'.webp" type="image/webp">
	// 			<source srcset="'.$path.'" type="image/jpeg"> 
	// 			<img src="'.$path.'" class="'.$class.'" loading="lazy" />
	//   		</picture>';
	// }else{
		echo '<img src="'.$path.'" class="'.$class.'" loading="lazy" alt="'.$alt.'"/>';
	// }
}

function displayAcfSvgFromPath($path){
	
	if($path){
		$fileArr = explode('uploads', $path); 
		$file = isset($fileArr[1]) ? $fileArr[1] : false;


		if($file){
			include (wp_upload_dir()['basedir'].$file);
		}
	}
}



function pr($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}


function agebreaker_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on agebreaker, use a find and replace
		* to change 'agebreaker' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'agebreaker', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'agebreaker' ),
			'submenu-1' => esc_html__( 'Submenu', 'agebreaker' ),
			'mobile-1' => esc_html__( 'Mobile', 'agebreaker' ),
			'footer-1' => esc_html__( 'Footer', 'agebreaker' ),			
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
			'agebreaker_custom_background_args',
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
add_action( 'after_setup_theme', 'agebreaker_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agebreaker_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agebreaker_content_width', 640 );
}
add_action( 'after_setup_theme', 'agebreaker_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agebreaker_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'boporowo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'agebreaker' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'agebreaker_widgets_init' );

add_post_type_support( 'page', 'excerpt' );

function mytheme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

// define the wpcf7_is_tel callback 
function custom_filter_wpcf7_is_tel( $result, $tel ) { 
	$result = preg_match( '/^\(?\+?([0-9]{1,4})?\)?[-\. ]?(\d{10})$/', $tel );
	return $result; 
  }
  
  add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );
/**
 * Enqueue scripts and styles.
 */
function maxString($str, $max){
	if(strlen($str) > $max){
		return substr($str, 0, $max) . '...';	
	}
	return $str;
}

function agebreaker_scripts() {
	wp_enqueue_style( 'agebreaker-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'agebreaker-style', 'rtl', 'replace' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if($_SERVER['HTTP_HOST'] != 'agebreaker.localhost'){
		wp_enqueue_script('agebreaker-main-js', 'http://agebreaker.localhost:8080/js/main.min.js', array(), _S_VERSION, true);
	}else{
		wp_enqueue_style('agebreaker-main-style', get_template_directory_uri() . '/assets/styles/main.min.css', array(), _S_VERSION);
		wp_enqueue_script('agebreaker-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true);
	}
}
add_action( 'wp_enqueue_scripts', 'agebreaker_scripts' );


function extractYoutubeId($url) {
    // Wzorce dla różnych formatów URL YouTube
    $patterns = [
        '/^https?:\/\/(?:www\.)?youtube\.com\/watch\?(?=.*v=([a-zA-Z0-9_-]{11}))(?:\S+)?$/',
        '/^https?:\/\/(?:www\.)?youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/',
        '/^https?:\/\/(?:www\.)?youtube\.com\/v\/([a-zA-Z0-9_-]{11})/',
        '/^https?:\/\/(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11})/',
        '/^https?:\/\/(?:www\.)?youtu\.be\/\?v=([a-zA-Z0-9_-]{11})/',
        '/^https?:\/\/(?:www\.)?youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/'
    ];
    
    // Sprawdzenie każdego wzorca
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
    }
    
    return false; // Zwróć false jeśli nie znaleziono ID
}

// Add Shortcode
function img_shortcode($atts)
{
    // Attributes
    $atts = shortcode_atts(
        [
        'src' => '',
        'link_to_img' => '',
		'class' => '', 
		'alt' => '', 
        ], $atts, 'img'
    );

    $return = '';
    if ($atts['link_to_img'] == 'yes')
    {
        $return = '<a href="' . $atts['src'] . '">
                    <img src="' . $atts['src'] . '" class="' . esc_attr($atts['class']) . '" alt="'.esc_attr($atts['alt']).'"/>
                </a>';
    }
    else{
        $return = '<img src="' . $atts['src'] . '" class="' . esc_attr($atts['class']) . '" alt="'.esc_attr($atts['alt']).'"/>';
    }
    // Return HTML code
    return $return;
}

add_shortcode('img', 'img_shortcode');