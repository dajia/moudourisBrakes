<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Unconditional
 */

get_header(); 
$unconditional_feed_header = esc_html(get_theme_mod( 'unconditional_feed_header_title' ));
?>

<section class="container-fluid" id="section3">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
		<div id="blog-section" class="col-sm-8">
		<?php do_action( 'unconditional_before_index' );
		    if ( get_theme_mod( 'unconditional_feed_header_visibility' ) != 1 ) {
			    if (get_theme_mod( 'unconditional_feed_header_title' )) { ?>
					 <h3 class="feed head text-center"><?php echo $unconditional_feed_header ?></h3>
                <?php } else { ?>
                     <h3 class="feed head text-center"><?php _e('Latest News On ', 'unconditional' ); ?><?php bloginfo( 'name' ); ?><sup>™</sup></h3>
			    <?php } ?>
			         <div class="feed-title-separator"></div>
			    <?php }
		    	      get_template_part( 'content/feed' );
			    ?>
		</div>
           <div class="col-sm-4 widget-area">
		       <?php get_sidebar(); ?>
		   </div>		
        </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>