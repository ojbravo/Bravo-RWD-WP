<?php

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'bravodms_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function bravodms_setup() {

		/* Custom template tags for this theme. */
		require( get_template_directory() . '/inc/template-tags.php' );

		/* Make theme available for translation */
		load_theme_textdomain( 'bravodms', get_template_directory() . '/languages' );

		/* Add default posts and comments RSS feed links to head */
		add_theme_support( 'automatic-feed-links' );

		/* Enable support for Post Thumbnails */
		add_theme_support( 'post-thumbnails' );

		/* This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'bravodms' ),
		) );

		/* Add support for the Aside Post Formats */
		add_theme_support( 'post-formats', array( 'aside', ) );
	}
endif; // bravodms_setup
add_action( 'after_setup_theme', 'bravodms_setup' );



/* Register widgetized area and update sidebar with default widgets */
function bravodms_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'bravodms' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'bravodms_widgets_init' );


/* Enqueue scripts and styles */
function bravodms_scripts() {
	wp_deregister_script( 'comment-reply' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'bravodms_scripts' );






// ************************************
// 		Custom Login Page
// ************************************

function custom_login_css() {
	 wp_enqueue_style( 'login_css', get_template_directory_uri() . '/includes/login.css', false );
}
add_action( 'login_head', 'custom_login_css');



// ************************************
// 		Facebook Open Graph
// ************************************
add_action('wp_head', 'add_fb_open_graph_tags');
function add_fb_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {
			$image = ''; // Change this to the URL of the logo you want beside your links shown on Facebook
		}
		//$description = get_bloginfo('description');
		$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
?>		
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo $image; ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="<?php echo $description ?>" />
		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<?php	}
}



function my_excerpt($text, $excerpt){
    if ($excerpt) return $excerpt;
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
    } else {
            $text = implode(' ', $words);
    }
    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}





?>