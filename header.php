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

<title><?php echo $title ?></title>

<!-- Icons -->
<link rel="shortcut icon" type="image/x-icon" href="http://www.bravodms.com/images/favicon.ico"  />
<link rel="icon" type="image/x-icon" href="http://www.bravodms.com/images/favicon.ico"  />
<link rel="image_src" href="http://www.journey-notes.com/images/icon.jpg" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <nav id="sideNav" class="side-nav-closed">
        <a id="menulogo" href="index.php">
            <img src="<?php echo get_template_directory_uri(); ?>/images/bravodms-menu-logo.png" alt="Bravo DMS Menu"> Menu
        </a>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>

    <div id="mainPage" class="main-page-open">
        
        <div class="mobile-menubar">                
            <div id="open-menu">
                <a onclick="toggleMenu();" class="menu-icon">
                   <i class="icon-reorder "></i>
                </a>
                <div id="mainlogo">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/bravodms-logo.png" alt="Bravo DMS Logo">
                    </a>
                </div>
                <div class="clr"></div> 
            </div>
        </div><!-- end mobile-menubar -->


        <header id="desktopBanner" class="desktop-only">
            <div class="c90p float-center">
                <a id="mainlogo" href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/bravodms-logo.png" alt="Bravo DMS Logo">
                </a>
            </div> 
        </header>


        <nav id="mainNav">
            <div class="c90p float-center">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                <div class="clr"></div>  
            </div>
        </nav>
        
        <div class="line clr"></div>