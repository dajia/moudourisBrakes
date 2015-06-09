<?php

/**
 * Enqueue scripts and styles
 */
function unconditional_font_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'PT Sans font: on or off', 'conditional' ) ) {
		$fonts[] = 'PT Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'conditional' ) ) {
		$fonts[] = 'Roboto Condensed:400italic,700italic,400,700';
	}
	
	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'conditional' );

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
		$fonts_url = esc_url(add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' ));
	}

	return $fonts_url;
} 
 
function unconditional_scripts() {
	global $wp_styles;
	// Bump this when changes are made to bust cache
    $unconditional_theme = wp_get_theme();
    $version = $unconditional_theme->get( 'Version' );
	// CSS Scripts
    // Add our fonts, used in the main stylesheet.
	wp_enqueue_style( 'unconditional-fonts', unconditional_font_url(), array(), null );
		
	wp_enqueue_style('unconditional-style', get_template_directory_uri().'/assets/css/style.css', false ,$version, 'all' );
	wp_enqueue_style('unconditional-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', false ,$version, 'all' );
	wp_enqueue_style('unconditional-custom', get_template_directory_uri().'/assets/css/custom.css', false ,$version, 'all' );
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.css', false ,$version, 'all' );
		
	// Load style.css from child theme
    if (is_child_theme()) {
        wp_enqueue_style('unconditional-child', get_stylesheet_uri(), false, $version, null);
    }
	
	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'unconditional-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'unconditional-style' ), $version );
	wp_style_add_data( 'unconditional-ie', 'conditional', 'lt IE 8' );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    	
	wp_enqueue_script('bootstrap.js', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'),$version, true );
	
	wp_enqueue_script( 'unconditional-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), false, true );
    
	wp_enqueue_script('modernizr.js', get_template_directory_uri().'/assets/js/modernizr.custom.79639.js', array('jquery'),$version, false );
		
}
add_action( 'wp_enqueue_scripts', 'unconditional_scripts' );

function unconditional_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/html5.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'unconditional_ie_support_header', 1 );


if ( get_theme_mod( 'unconditional_title_tooltip_switch' ) != 1 ) {
function unconditional_tooltip_switch() { ?>
   	<script type="text/javascript">
   	jQuery(function(){
        jQuery('a[title]').tooltip();
    });
   	</script>
<?php } 
add_action( 'wp_footer', 'unconditional_tooltip_switch', 210 );
}