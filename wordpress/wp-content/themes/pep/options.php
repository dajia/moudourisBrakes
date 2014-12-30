<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'pep'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
$options[] = array(
		'name' => __('Front Page', 'pep'),
		'type' => 'heading' );

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Front page text introduction', 'pep'),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Front page photo uploader', 'pep'),
		'desc' => __('This image comes on top right in front page.', 'pep'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array  (
		'name' => __('Text Area 1', 'pep'),
		'desc' => __('Text Area 1 text','pep'),
		'id' => 'widget_one',
		'type' => 'editor',
		'settings' => $wp_editor_settings
		);
	$options[] = array  (
		'name' => __('Text Area 1', 'pep'),
		'desc' => __('Text Area 2 text','pep'),
		'id' => 'widget_two',
		'type' => 'editor',
		'settings' => $wp_editor_settings
		);
	$options[] = array  (
		'name' => __('Text Area 3', 'pep'),
		'desc' => __('Text Area 3 text','pep'),
		'id' => 'widget_three',
		'type' => 'editor',
		'settings' => $wp_editor_settings
		);

	$options[] = array(
		'name' => __('Social Networks', 'pep'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Social Networks Links (Leave it blank if you dont have registration in such a network)', 'pep'),
		'id' => 'facebook_link',
		'std' => '',
		'desc' => 'Facebook link',
		'type' => 'text'
		);
	$options[] = array( 
		'name' => __('','pep'),
		'id' => 'twitter_link',
		'std' => '',
		'desc' => 'Twitter link',
		'type' => 'text'
		);
	$options[] = array (
		'name' => __('','pep'),
		'id' => 'googleplus_link',
		'std' => '',
		'desc' => 'Google Plus Link',
		'type' => 'text'
		);
	$options[] = array (
		'name' => __('', 'pep'),
		'id' => 'flickr_link',
		'std' => '',
		'desc' => 'Flickr link',
		'type' => 'text'
		);
	$options[] = array (
		'name' => __('', 'pep'),
		'id' => 'linkedin_link',
		'std' => '',
		'desc' => 'LinkedIn link',
		'type' => 'text'
		);
	$options[] = array (
		'name' => __('', 'pep'),
		'id' => 'pinterest_link',
		'std' => '',
		'desc' => 'Pinterest link',
		'type' => 'text'
		);
	$options[] = array (
		'name' => __('', 'pep'),
		'id' => 'youtube_link',
		'std' => '',
		'desc' => 'Youtube Link',
		'type' => 'text'
		);

	

	
	return $options;
}