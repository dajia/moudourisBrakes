<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Unconditional
 */

get_header(); 
global $post;
$unconditional_proj_url = get_post_meta( $post->ID, '_unconditional_project_url', true );
?>

<section class="container-fluid" id="section3">
    <div class="row">
      <div class="single-project col-sm-10 col-sm-offset-1">
        <div class="row">
		<header class="entry-header">
		    <a href="<?php echo $unconditional_proj_url ?>" target="_blank" />
			    <?php the_title( '<h1 class="entry-title head text-center">Project Name: ', '</h1>' ); ?>
			</a>			
		</header>
		
        <div class="col-sm-8">
            <?php 
			do_action( 'unconditional_before_single_portfolio' );
		    while ( have_posts() ) : the_post();
            
			    get_template_part( 'content/content', 'portfolio-single' ); 
			
			    get_template_part( 'related-projects' );
		
			    unconditional_content_nav( 'nav-below' );			

		    endwhile; // end of the loop.
               do_action( 'unconditional_after_single_portfolio' ); 
	        ?>
		</div>
          
		<div class="col-sm-4">
		    <?php get_sidebar( 'project' ); ?>
		</div>
		  
        </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>