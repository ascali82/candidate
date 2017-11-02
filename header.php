<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Candidate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'candidate' ); ?></a>

		<header id="masthead" class="site-header">
        	<nav id="mainNavigation" class="navbar fixed-top navbar-expand-lg main-navigation navbar-dark" role="navigation">
            	<div class="container">
                	<a class="navbar-brand" href="#">John Doe</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    	<span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    	<ul class="navbar-nav mr-auto">
                        	<li class="nav-item active">
                            	<a class="nav-link" href="#personal-information">Information <span class="sr-only">(current)</span></a>
							</li>
                            <li class="nav-item">
                            	<a class="nav-link" href="#work-experience">Experience</a>
                            </li>
                            <li class="nav-item">
                           		<a class="nav-link" href="#education-training">Formation</a>
                            </li>
                            <li class="nav-item dropdown">
                            	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Skills</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Languages</a>
									<a class="dropdown-item" href="#">Communication</a>
                                    <a class="dropdown-item" href="#">Managerial</a>
                                    <a class="dropdown-item" href="#">Digital</a>
                                    	<div class="dropdown-divider"></div>
                                        	<a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                            	<a class="nav-link" href="#">Additional</a>
                            </li>
						</ul>
						<form class="form-inline mt-2 mt-md-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
					</div><!--end navbar-collapse-->
				</div>
			</nav><!-- .main-navigation -->
			<div class="site-branding container">
				<div class="site-header">
				  <?php
				  the_custom_logo();
				  if ( is_front_page() && is_home() ) : ?>
					  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				  <?php else : ?>
					  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				  <?php
				  endif;
	  
				  $description = get_bloginfo( 'description', 'display' );
				  if ( $description || is_customize_preview() ) : ?>
					  <p class="site-description lead"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				  <?php
				  endif; ?>
				</div><!-- .site-header -->
			</div><!-- .site-branding -->

		</header><!-- #masthead -->

		<div id="content" class="site-content container">
			<div id="primary" class="row content-area">
