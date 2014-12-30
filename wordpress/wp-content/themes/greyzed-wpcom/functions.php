<?php
/**
 * @package Greyzed
 */

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'greyzed', TEMPLATEPATH . '/languages' );

// Theme colors and content width
$themecolors = array(
	'bg' => 'f9f9f9',
	'border' => 'bcc5c1',
	'text' => '333333',
	'link' => 'CC0000',
	'url' => '575b59',
);
$content_width = 614; // pixels

add_theme_support( 'print-style' );

// Add Posts and Comments feeds to theme
add_theme_support( 'automatic-feed-links' );

// Enable support for Post Formats
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'greyzed' ),
) );

/**
 * Enqueue scripts and styles
 */
function greyzed_scripts() {
	wp_enqueue_style( 'greyzed', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'greyzed_scripts' );

// Add a home link and make the menu fallback markup more like the menu markup
function greyzed_page_menu_args( $args ) {
	$args['show_home'] = true;
	$args['menu_class'] = 'menu-header';
	return $args;
}
add_filter( 'wp_page_menu_args', 'greyzed_page_menu_args' );

function greyzed_widgets_init() {
	register_sidebar(array(
		'name' => 'Sidebar 1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => 'Footer Left',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="footerwidget">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => 'Footer Middle',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="footerwidget">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => 'Footer Right',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="footerwidget">',
		'after_title' => '</h4>',
	));
}
add_action( 'widgets_init', 'greyzed_widgets_init' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @since Greyzed 1.0.4
 */
function greyzed_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'greyzed' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'greyzed_wp_title', 10, 2 );


/**
 * Infinite Scroll Support
 *
 * Theme Name: Greyzed
 */

/**
 * Add theme support for infinity scroll
 */
function greyzed_infinite_scroll_init() {
	// Theme support takes one argument: the ID of the element to append new results to.
	add_theme_support( 'infinite-scroll', 'content-inner' );
}
add_action( 'init', 'greyzed_infinite_scroll_init' );

/**
 * Set the code to be rendered on for calling posts,
 * hooked to template parts when possible.
 *
 * Note: must define a loop.
 */
function greyzed_infinite_scroll_render() {
	while ( have_posts() ) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="posttitle">
				<h2 class="pagetitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to ', 'greyzed' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small>
					<?php
						if ( is_multi_author() ) {
							printf( __( 'Posted: %1$s by <strong>%2$s</strong> in %3$s', 'greyzed' ),
								get_the_date( get_option( 'date_format' ) ),
								get_the_author(),
								get_the_category_list( ', ' )
							);
						} else {
							printf( __( 'Posted: %1$s in %2$s', 'greyzed' ),
								get_the_date( get_option( 'date_format' ) ),
								get_the_category_list( ', ' )
							);
						}
					?>
					<br />
					<?php the_tags( __( 'Tags: ', 'greyzed' ), ', ', '' ); ?>
				</small>
			</div>
			<?php if ( ( comments_open() ) && ( ! post_password_required() ) ) : ?>
			<div class="postcomments"><?php comments_popup_link( '0', '1', '%' ); ?></div>
			<?php endif; ?>
			<div class="entry">
				<?php the_content( __( 'Read the rest of this entry &raquo;', 'greyzed' ) ); ?>
			</div>
				<?php wp_link_pages( array( 'before' => '<p><strong>'. __( 'Pages:', 'greyzed' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
				<?php edit_post_link( __( 'Edit this entry.', 'greyzed' ), '<p>', '</p>' ); ?>
		</div>
	<?php endwhile;
}
add_action( 'infinite_scroll_render', 'greyzed_infinite_scroll_render' );

/**
 * Enqueue CSS stylesheet with theme styles for infinity.
 */
function greyzed_infinite_scroll_enqueue_styles() {
	// Add theme specific styles.
	wp_enqueue_style( 'infinity-greyzed', plugins_url( 'greyzed.css', __FILE__ ), array(), '20120402' );
}
add_action( 'template_redirect', 'greyzed_infinite_scroll_enqueue_styles', 25 );

/**
 * Do we have footer widgets?
 */
function infinite_scroll_has_footer_widgets() {
	if ( is_active_sidebar( 2 ) || is_active_sidebar( 3 ) || is_active_sidebar( 4 ) )
		return true;

	return false;
}

// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
