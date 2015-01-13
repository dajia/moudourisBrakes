<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package unconditional
 */
global $post;
$unconditional_widget_title = esc_html(get_post_meta( $post->ID, '_unconditional_widget_title', true ));
$unconditional_proj_url = esc_url(get_post_meta( $post->ID, '_unconditional_project_url', true ));
$unconditional_proj_type = esc_html(get_post_meta( $post->ID, '_unconditional_project_type', true ));
$unconditional_proj_status = esc_html(get_post_meta( $post->ID, '_unconditional_project_status', true ));
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'unconditional_before_sidebar' );
		if (get_post_meta( $post->ID, '_unconditional_widget_title', true )) :  ?>
		<h3 class="widget-title">
		    <i class="fa fa-folder-open"></i>
		    <?php echo $unconditional_widget_title ?>
		</h3>
		
		<p class="project-info">
		    <i class="fa fa-paint-brush"></i>
			<?php 
			    _e( 'Project Type: ', 'unconditional');
		        echo $unconditional_proj_type 
			?>
		</p>
		
		<p class="project-info">
		    <i class="fa fa-cogs"></i>
            <?php 
		        _e( 'Project Status: ', 'unconditional');
		        echo $unconditional_proj_status 
			?>
		</p>
		
		<a href="<?php echo $unconditional_proj_url ?>" target="_blank">		    
            <p class="project-info-url btn btn-success blue">
			    <i class="fa fa-external-link"></i>
				<?php 
				    _e( 'View Project @ ', 'unconditional');			 
				    the_title(); 
				?>
			</p>
		</a>
		<?php 
		    endif; // end project widget area
		    if ( ! dynamic_sidebar( 'portfolio' ) ) :
		    endif; // end sidebar widget area
	        do_action( 'unconditional_after_sidebar' ); 
		?>
	</div><!-- #secondary -->
