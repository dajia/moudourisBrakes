<?php

// Custom functions for Fourteen Extended plugin

add_filter( 'cmb_meta_boxes', 'unconditional_custom_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function unconditional_custom_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_unconditional_';

	$meta_boxes[] = array(
		'id'         => 'widget_title',
		'title'      => __( 'Project Widget Title', 'unconditional' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Widget Title', 'unconditional' ),
				'desc'    => __( 'This will act as the widget enabler as well as the title - if left blank widget will not appear and the information entered below will not be shown!', 'unconditional' ),
				'id'      => $prefix . 'widget_title',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_url',
		'title'      => __( 'Project Link', 'unconditional' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Project url', 'unconditional' ),
				'desc'    => __( 'This url will be used to link the post title i.e project name (on single project view page) to the project website!', 'unconditional' ),
				'id'      => $prefix . 'project_url',
				'type'    => 'text',
				'sanitize_callback' => 'esc_url_raw'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_type',
		'title'      => __( 'Project Type', 'unconditional' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Project Type', 'unconditional' ),
				'desc'    => __( 'Enter project type i.e. Website, Mobile App, Theme or Graphics!', 'unconditional' ),
				'id'      => $prefix . 'project_type',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_status',
		'title'      => __( 'Project Status', 'unconditional' ),
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enter Project Status', 'unconditional' ),
				'desc'    => __('Enter project status i.e. New, Ongoing, Completed or Shelved/On Hold!', 'unconditional' ),
				'id'      => $prefix . 'project_status',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_unconditional_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_unconditional_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}
