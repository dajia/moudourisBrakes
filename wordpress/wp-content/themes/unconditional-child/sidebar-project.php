<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package unconditional
 */
global $post;
$widget_title = esc_html(get_post_meta( $post->ID, '_unconditional_widget_title', true ));
$project_url = esc_url(get_post_meta( $post->ID, '_unconditional_project_url', true ));
$project_type = esc_html(get_post_meta( $post->ID, '_unconditional_project_type', true ));
$project_status = esc_html(get_post_meta( $post->ID, '_unconditional_project_status', true ));
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'unconditional_before_sidebar' );
		if (get_post_meta( $post->ID, '_unconditional_widget_title', true )) :  ?>
		<h3 class="widget-title">
		    <i class="fa fa-folder-open"></i>
		    <?php echo $widget_title ?>
		</h3>
		
		<p class="project-info">
		    <i class="fa fa-paint-brush"></i>
			<?php _e( 'Project Type: ', 'unconditional'); ?>
		    <?php echo $project_type ?>
		</p>
		
		<p class="project-info">
		   <i class="fa fa-cogs"></i>
           <?php _e( 'Project Status: ', 'unconditional'); ?>
		   <?php echo $project_status ?>
		</p>
		
		<a href="<?php echo $project_url ?>" target="_blank">		    
            <p class="project-info-url btn btn-success blue">
			     <i class="fa fa-external-link"></i>
				 <?php _e( 'View Project @ ', 'unconditional'); ?>			 
				 <?php the_title(); ?>
			</p>
		</a>
		<?php endif; // end project widget area ?>
		<?php if ( ! dynamic_sidebar( 'portfolio' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	<?php do_action( 'unconditional_after_sidebar' ); ?>
	</div><!-- #secondary -->
