<?php
/**
 * bravodms functions and definitions
 *
 * @package bravodms
 * @since bravodms 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since bravodms 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'bravodms_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since bravodms 1.0
 */
function bravodms_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on bravodms, use a find and replace
	 * to change 'bravodms' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bravodms', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bravodms' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // bravodms_setup
add_action( 'after_setup_theme', 'bravodms_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since bravodms 1.0
 */
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



/**
 * Enqueue style for Login Page
 */

function custom_login_css() {
	 wp_enqueue_style( 'login_css', get_template_directory_uri() . '/includes/login.css', false );
}
add_action( 'login_head', 'custom_login_css');



/**
 * Enqueue scripts and styles
 */
function bravodms_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'bravodms_scripts' );

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
<?php 	}
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




/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

/*
function load_jquery() {

    // only use this method is we're not in wp-admin
    if (!is_admin()) {

        // deregister the original version of jQuery
        wp_deregister_script('jquery');

        // discover the correct protocol to use
        $protocol='http:';
        if($_SERVER['HTTPS']=='on') {
            $protocol='https:';
        }

        // register the Google CDN version
        wp_register_script('jquery', $protocol.'//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, '1');

        // add it back into the queue
        wp_enqueue_script('jquery');

    }

}

add_action('template_redirect', 'load_jquery');




/* ************************************
	Lift Button Function
************************************* *

$timebeforerevote = 1;

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

wp_enqueue_script('like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0', 1 );
wp_localize_script('like_post', 'ajax_var', array(
	'url' => admin_url('admin-ajax.php'),
	'nonce' => wp_create_nonce('ajax-nonce')
));

function post_like()
{
	$nonce = $_POST['nonce'];
 
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
		
	if(isset($_POST['post_like']))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		
		$meta_IP = get_post_meta($post_id, "voted_IP");

		$voted_IP = $meta_IP[0];
		if(!is_array($voted_IP))
			$voted_IP = array();
		
		$meta_count = get_post_meta($post_id, "votes_count", true);

		if(!hasAlreadyVoted($post_id))
		{
			$voted_IP[$ip] = time();

			update_post_meta($post_id, "voted_IP", $voted_IP);
			update_post_meta($post_id, "votes_count", ++$meta_count);
			
			echo $meta_count;
		}
		else
			echo "already";
	}
	exit;
}

function hasAlreadyVoted($post_id)
{
	global $timebeforerevote;

	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = $meta_IP[0];
	if(!is_array($voted_IP))
		$voted_IP = array();
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP)))
	{
		$time = $voted_IP[$ip];
		$now = time();
		
		if(round(($now - $time) / 60) > $timebeforerevote)
			return false;
			
		return true;
	}
	
	return false;
}

function getPostLikeLink($post_id)
{
	$themename = "twentyeleven";

	$vote_count = get_post_meta($post_id, "votes_count", true);

	$output = '<p class="post-like">';
	if(hasAlreadyVoted($post_id))
		$output .= ' <span title="'.__('Thanks for Lifting!', $themename).'" class="qtip like alreadyvoted">Lifted</span>';
	else
		$output .= '<a href="#" data-post_id="'.$post_id.'">
					<span  title="'.__('Lift Up Whats Good', $themename).'"class="qtip like">
						Lift <i class="icon-arrow-up"></i> 
					</span>
				</a>';
	$output .= '<br><span class="count">Elevation: '.$vote_count.'</span></p>';
	
	return $output;
}

function getLiftCount($post_id)
{
	$vote_count = get_post_meta($post_id, "votes_count", true);	
	return $vote_count;
}

/* ************************************
	End Lift Button Function
************************************* */

?>