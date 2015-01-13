<?php

class UnconditionalSidebars {

private function __construct() {}

public static function setup_sidebars() {
	add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
	do_action( 'unconditional_sidebars' );
}
public static function after_setup_theme() {
   add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );
   do_action( 'unconditional_sidebars_after_setup_theme' );
   add_filter('widget_text', 'do_shortcode');
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
//function unconditional_widgets_init() 

public static function widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'unconditional' ),
		'id'            => 'sidebar-1',
		'description' => __( 'Appears on front page & blog feed view only!', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'unconditional' ),
		'id'            => 'page',
		'description' => __( 'Appears on page view only!', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Post Sidebar', 'unconditional' ),
		'id'            => 'single',
		'description' => __( 'Appears on single post view only!', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Portfolio Sidebar', 'unconditional' ),
		'id'            => 'portfolio',
		'description' => __( 'Appears on single portfolio view only!', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Footer Widget One.', 'unconditional' ),
		'id' => 'footer-1',
		'description' => __( 'One of four footer widget areas - sitewide', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Two.', 'unconditional' ),
		'id' => 'footer-2',
		'description' => __( 'One of four footer widget areas - sitewide', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Three', 'unconditional' ),
		'id' => 'footer-3',
		'description' => __( 'One of four footer widget areas - sitewide', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Four', 'unconditional' ),
		'id' => 'footer-4',
		'description' => __( 'One of four footer widget areas - sitewide', 'unconditional' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

}
UnconditionalSidebars::setup_sidebars();