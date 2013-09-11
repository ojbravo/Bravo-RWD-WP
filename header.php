<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="all" />
<meta name="author" content="Omar Jesus Bravo, Bravo DMS" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bravodms' ), max( $paged, $page ) );
	?>
</title>


<!-- Facebook Comments Tags -->
<meta property='fb:app_id' content="" /> 
<meta property="fb:admins" content="Facebook Username"/>
<!-- End Facebook Tags -->

<!-- Icons -->
<link rel="shortcut icon" type="image/x-icon" href="http://www.bravodms.com/images/favicon.ico"  />
<link rel="icon" type="image/x-icon" href="http://www.bravodms.com/images/favicon.ico"  />
<link rel="image_src" href="http://www.journey-notes.com/images/icon.jpg" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <div id="mainPage">
        <header class="mainHeader group">
            <a href="#" class="menu-btn" onclick="toggleMenu();"><i class="icon-reorder"></i></a>
            <div class="logo">
            	<a href="<?php echo home_url(); ?>">
            		<img src="<?php echo get_template_directory_uri(); ?>/images/bravodms-logo.png" alt="Bravo DMS Logo">
            	</a>
                
            </div>    
        </header>
        <nav class="mainNav" role='navigation'>
	        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	    </nav> 
        <div class="line clr"></div>