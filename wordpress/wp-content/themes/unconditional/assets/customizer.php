<?php
/**
 * unconditional Theme Customizer
 *
 * @package unconditional
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function unconditional_customize_register( $wp_customize ) {
	// Add custom description to Colors and Background sections.
	$wp_customize->get_section( 'colors' )->description         = __( 'Background color is only visible on transparent section(s) in the absence of background & header image(s).', 'unconditional' );
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Rename the label to "Site Title & Tagline" To be extra clear of the options.
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title & Tagline', 'unconditional' );
	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description - Tagline', 'unconditional' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title', 'unconditional' );

	// Setting group for social icons
    $wp_customize->add_section( 'unconditional_theme_notes' , array(
		'title'       => __('Unconditional Theme Notes','unconditional'),
		'description' => sprintf( __( 'Welcome & thank you for choosing Unconditional as your site theme. In this section you\'ll find some helpful hints and tips to help you configure your site quickly and easily.
		<br/><br/> <b>Social Icons</b> are configurable via a custom menu. To set up your social profile visit the Appearance >><a href="%1$s"> Menu section</a>, enter your profile urls and add them to the "Social" Menu Location.
		<br/><br/><a href="%2$s" target="_blank" />View Theme Demo</a> | <a href="%3$s" target="_blank" />Get Theme Support</a> ', 'unconditional' ), admin_url( '/nav-menus.php' ), esc_url('http://www.wpstrapcode.com/blog/unconditional/'), esc_url('http://wordpress.org/support/theme/unconditional') ),
		'priority'    => 30,
    ) );
	
	$wp_customize->add_section( 'unconditional_intro_options' , array(
       'title'       => __('Unconditional CTA Options','unconditional'),
	   'description' => sprintf( __( 'Use the following settings to control the Intro section.', 'unconditional' )),
       'priority'    => 33,
    ) );
	
	$wp_customize->add_section( 'unconditional_services_options' , array(
       'title'       => __('Unconditional Services Options','unconditional'),
	   'description' => sprintf( __( 'Use the following settings to control the Service Boxes section. A list of the available icons can be found here: <a href="%1$s" target="_blank" />http://fortawesome.github.io/Font-Awesome/cheatsheet/</a> - You need only insert the name of the icon i.e. flag instead of fa-flag', 'unconditional' ), esc_url('http://fortawesome.github.io/Font-Awesome/cheatsheet/') ),
       'priority'    => 35,
    ) );
				
	$wp_customize->add_section( 'unconditional_blogfeed_options' , array(
       'title'       => __('Unconditional Blog Feed Options','unconditional'),
	   'description' => sprintf( __( 'Use the following settings to set Frontpage/Blog home feed preferences.', 'unconditional' )),
       'priority'    => 38,
    ) );
	
	$wp_customize->add_section( 'unconditional_misc_options' , array(
       'title'       => __('Unconditional Miscellaneous Options','unconditional'),
	   'description' => sprintf( __( 'These are options that do not fit in elsewhere and are provided for your convenience.', 'unconditional' )),
       'priority'    => 140,
    ) );
		
	/**
       * Adds textarea support to the theme customizer
    */
    class Unconditional_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
 
            public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
        }
    }
	
	$wp_customize->add_setting('unconditional_logo_image', array(
        'default-image'  => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tanzanite_logo',
            array(
               'label'    => __( 'Upload a logo', 'unconditional' ),
               'section'  => 'title_tagline',
			   'priority' => 21,
               'settings' => 'unconditional_logo_image',
            )
        )
    );
	
    // Intro Section Settings
	$wp_customize->add_setting(
        'unconditional_home_intro_visibility', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_home_intro_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the home page intro section?', 'unconditional'),
        'section'  => 'unconditional_intro_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'unconditional_intro_text_visibility', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_intro_text_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the home page intro text?', 'unconditional'),
        'section'  => 'unconditional_intro_options',
		'priority' => 1,
        )
    );
			
	$wp_customize->add_setting( 
	    'unconditional_intro_text',
    array(
        'default' => '',
		'sanitize_callback' => 'unconditional_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new Unconditional_Customize_Textarea_Control(
            $wp_customize,
            'unconditional_intro_text',
        array(
            'label'    => __('Home Intro Text', 'unconditional'),
            'section'  => 'unconditional_intro_options',
			'priority' => 2,
            'settings' => 'unconditional_intro_text',
        )
        )
    );
	
	$wp_customize->add_setting(
        'unconditional_intro_button_visibility', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_intro_button_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide CTA Buttons?', 'unconditional'),
        'section'  => 'unconditional_intro_options',
		'priority' => 3,
        )
    );
		
	$wp_customize->add_setting(
        'unconditional_purchase_left_text',
    array(
        'default' => __('Learn more', 'unconditional'),
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_purchase_left_text',
    array(
        'label'     => __('Home Intro Left Button Text', 'unconditional'),
        'section'   => 'unconditional_intro_options',
		'priority'  => 4,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'unconditional_purchase_left_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_purchase_left_url',
    array(
        'label'    => __('Home Intro Learn Button Link', 'unconditional'),
        'section'  => 'unconditional_intro_options',
		'priority' => 5,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting( 'unconditional_purchase_left_url_target', array(
		'default' => '_self',
		'sanitize_callback' => 'unconditional_sanitize_target_url',
		'capability' => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'unconditional_purchase_left_url_target', array(
        'label'   => __( 'Learn More Url Window Target', 'unconditional' ),
        'section' => 'unconditional_intro_options',
	    'priority' => 6,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Open Link In Same Tab', 'unconditional' ),
			 '_blank'  => __( 'Open Link In New Tab', 'unconditional' ),
        ),
    ));
	
	$wp_customize->add_setting(
        'unconditional_purchase_right_text',
    array(
        'default' => __('Sign Up', 'unconditional'),
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_purchase_right_text',
    array(
        'label'     => __('Home Intro Right Button Text', 'unconditional'),
        'section'   => 'unconditional_intro_options',
		'priority'  => 7,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'unconditional_purchase_right_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_purchase_right_url',
    array(
        'label'    => __('Home Intro Signup Button Link', 'unconditional'),
        'section'  => 'unconditional_intro_options',
		'priority' => 8,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting( 'unconditional_purchase_right_url_target', array(
		'default' => '_self',
		'sanitize_callback' => 'unconditional_sanitize_target_url',
		'capability' => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'unconditional_purchase_right_url_target', array(
        'label'   => __( 'Sign Up Url Window Target', 'unconditional' ),
        'section' => 'unconditional_intro_options',
	    'priority' => 9,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Open Link In Same Tab', 'unconditional' ),
			 '_blank'  => __( 'Open Link In New Tab', 'unconditional' ),
        ),
    ));
	
	// End of intro section	
	
	// Services Section Settings
	$wp_customize->add_setting(
        'unconditional_services_visibility', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_services_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the front page Services section?', 'unconditional'),
        'section'  => 'unconditional_services_options',
		'priority' => 1,
        )
    );
	
	// Service1 Title
	$wp_customize->add_setting(
    'unconditional_service1_title',
    array(
        'default' => 'Made With Bootstrap',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_service1_title',
    array(
        'label'     => __('Service1 Title', 'unconditional'),
        'section'   => 'unconditional_services_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
	
	// Service1 Icon
	$wp_customize->add_setting(
    'unconditional_service1_icon',
    array(
        'default' => 'thumbs-o-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_service1_icon',
    array(
        'label'     => __('Service1 Icon name', 'unconditional'),
        'section'   => 'unconditional_services_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
	
	// Service1 Readmore url
	$wp_customize->add_setting(
        'unconditional_service1_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_service1_url',
    array(
        'label'    => __('Service1 Readmore Link', 'unconditional'),
        'section'  => 'unconditional_services_options',
		'priority' => 3,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'unconditional_service1_text',
    array(
        'default' => '',
		'sanitize_callback' => 'unconditional_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new Unconditional_Customize_Textarea_Control(
            $wp_customize,
            'unconditional_service1_text',
        array(
            'label'    => __('Service1 Text', 'unconditional'),
            'section'  => 'unconditional_services_options',
			'priority' => 4,
            'settings' => 'unconditional_service1_text',
        )
        )
    );

	// Service2
	$wp_customize->add_setting(
    'unconditional_service2_title',
    array(
        'default' => 'Icons by Font Awesome',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_service2_title',
    array(
        'label'     => __('Service2 Title', 'unconditional'),
        'section'   => 'unconditional_services_options',
		'priority'  => 5,
        'type'      => 'text',
    ));
	
	// Service2 Icon
	$wp_customize->add_setting(
    'unconditional_service2_icon',
    array(
        'default' => 'flag',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_service2_icon',
    array(
        'label'     => __('Service2 Icon name', 'unconditional'),
        'section'   => 'unconditional_services_options',
		'priority'  => 6,
        'type'      => 'text',
    ));
	
	// Service2 Readmore url
	$wp_customize->add_setting(
        'unconditional_service2_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_service2_url',
    array(
        'label'    => __('Service2 Readmore Link', 'unconditional'),
        'section'  => 'unconditional_services_options',
		'priority' => 7,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'unconditional_service2_text',
    array(
        'default' => '',
		'sanitize_callback' => 'unconditional_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new Unconditional_Customize_Textarea_Control(
            $wp_customize,
            'unconditional_service2_text',
        array(
            'label'    => __('Service2 Text', 'unconditional'),
            'section'  => 'unconditional_services_options',
			'priority' => 8,
            'settings' => 'unconditional_service2_text',
        )
        )
    );

	// Service3 Title
	$wp_customize->add_setting(
    'unconditional_service3_title',
    array(
        'default' => 'Mobile First & Desktop Friendly',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_service3_title',
    array(
        'label'     => __('Service3 Title', 'unconditional'),
        'section'   => 'unconditional_services_options',
		'priority'  => 9,
        'type'      => 'text',
    ));
	
	// Service3 Icon
	$wp_customize->add_setting(
    'unconditional_service3_icon',
    array(
        'default' => 'desktop',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_service3_icon',
    array(
        'label'     => __('Service3 Icon name', 'unconditional'),
        'section'   => 'unconditional_services_options',
		'priority'  => 10,
        'type'      => 'text',
    ));
	
	// Service3 Readmore url
	$wp_customize->add_setting(
        'unconditional_service3_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'unconditional_service3_url',
    array(
        'label'    => __('Service3 Readmore Link', 'unconditional'),
        'section'  => 'unconditional_services_options',
		'priority' => 11,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'unconditional_service3_text',
    array(
        'default' => '',
		'sanitize_callback' => 'unconditional_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new Unconditional_Customize_Textarea_Control(
            $wp_customize,
            'unconditional_service3_text',
        array(
            'label'    => __('Service3 Text', 'unconditional'),
            'section'  => 'unconditional_services_options',
			'priority' => 12,
            'settings' => 'unconditional_service3_text',
        )
        )
    );
	// End Of Service Section
		
	// Begin Blog Feed section
	$wp_customize->add_setting(
        'unconditional_feed_header_visibility', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_feed_header_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove Blog Feed header?', 'unconditional'),
        'section'  => 'unconditional_blogfeed_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'unconditional_feed_header_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'unconditional_feed_header_title',
    array(
        'label'     => __('Blog Section Title', 'unconditional'),
        'section'   => 'unconditional_blogfeed_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'unconditional_home_meta', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_home_meta',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Post Meta Data On Blog Feed?', 'unconditional'),
        'section'  => 'unconditional_blogfeed_options',
		'priority' => 3,
        )
    );
		
	$wp_customize->add_setting(
        'unconditional_homefeed_excerpt_length', array(
		'sanitize_callback' => 'unconditional_sanitize_integer',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
    'unconditional_homefeed_excerpt_length',
    array(
        'type' => 'text',
		'default' => '14',
        'label' => __('Blog Feed Excerpt Length', 'unconditional'),
        'section' => 'unconditional_blogfeed_options',
		'priority' => 4,
        )
    );
	// End blog feed options
	
	// Miscellaneous Section Settings
	$wp_customize->add_setting(
        'unconditional_title_tooltip_switch', array (
		'sanitize_callback' => 'unconditional_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'unconditional_title_tooltip_switch',
    array(
        'type'     => 'checkbox',
        'label'    => __('Turn off the title tooltip?', 'unconditional'),
        'section'  => 'unconditional_misc_options',
		'priority' => 1,
        )
    );
	
}
add_action( 'customize_register', 'unconditional_customize_register' );

/**
 * Sanitize the Integer Input values.
 *
 * @since Unconditional 1.0.0
 *
 * @param string $input Integer type.
 */
function unconditional_sanitize_integer( $input ) {
	return absint( $input );
}

if ( ! function_exists( 'unconditional_sanitize_textarea' ) ) :
/**
* Sanitize a string to allow only tags in the allowedtags array.
*/

function unconditional_sanitize_textarea( $string ) {
    global $allowedtags;
    return wp_kses( $string , $allowedtags );
}
endif;

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'unconditional_sanitize_checkbox' ) ) :
	function unconditional_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

/**
 * Sanitize url target
 */
if ( ! function_exists( 'unconditional_sanitize_target_url' ) ) :
function unconditional_sanitize_target_url( $target_url ) {
	if ( ! in_array( $target_url, array( '_self', '_blank' ) ) ) {
		$target_url = '_self';
	}
	return $target_url;
}
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function unconditional_customize_preview_js() {
	wp_enqueue_script( 'unconditional_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'unconditional_customize_preview_js' );