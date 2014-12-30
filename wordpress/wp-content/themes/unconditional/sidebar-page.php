<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package unconditional
 */
 
if (   
        ! is_active_sidebar( 'page' )
    )
return;
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php 
		    do_action( 'unconditional_before_page_sidebar' );
			dynamic_sidebar( 'page' );
	        do_action( 'unconditional_after_page_sidebar' ); 
		?>
	</div><!-- #secondary -->
