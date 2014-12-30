<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pep
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
		<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
		<?php else : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

			<?php endif; // End header image check. ?>
		</div>
		<div id="social-media" ?>
		<?php if (of_get_option('facebook_link')) : ?>
		<a href="<?php echo esc_url (of_get_option('facebook_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/facebook-icon.png" alt="Facebook"></a>
		<?php endif ?>

		<?php if (of_get_option('twitter_link')) : ?>
		<a href="<?php echo esc_url (of_get_option('twitter_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/twitter-icon.png" alt="Twitter"></a>
		<?php endif ?>

		<?php if (of_get_option('googleplus_link')) : ?> 
			<a href="<?php echo esc_url (of_get_option('googleplus_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/google-icon.png" alt="Google+"></a>
		<?php endif ?>

		<?php if (of_get_option('youtube_link')) : ?>
			<a href="<?php echo esc_url (of_get_option('youtube_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/youtube-icon.png" alt="YouTube"></a>
		<?php endif ?>

		<?php if (of_get_option('flickr_link')) : ?>
			<a href="<?php echo esc_url (of_get_option('flickr_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/flickr-icon.png" alt="Flickr"></a>
		<?php endif ?>
		<?php if (of_get_option('linkedin_link')) : ?>
			<a href="<?php echo esc_url (of_get_option('linkedin_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/linkedin-icon.png" alt="Linkedin"></a>
		<?php endif ?>

		<?php if (of_get_option('pinterest_link')) : ?>
			<a href="<?php echo esc_url (of_get_option('pinterest_link')); ?>"><img src="<?php echo get_template_directory_uri();?>/images/pinterest-icon.png" alt="Pinterest"></a>
		<?php endif ?>


				</div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'pep' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pep' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<div id="search-navi">
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>"> 
	
			<input type="search" class="search-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
			</form>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
