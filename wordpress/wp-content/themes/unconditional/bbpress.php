<?php
/**
 * This is the template that displays all forums by default.
 *
 * @package Unconditional
 */

get_header(); ?>

<section class="container-fluid" id="section7">
   <div class="main row" role="main">
       <div class="col-sm-10 col-sm-offset-1">
	     <?php do_action( 'unconditional_before_forums' );

			while ( have_posts() ) : the_post();

				get_template_part( 'content/content', 'forum' );

			 endwhile; // end of the loop.
          do_action( 'unconditional_after_forums' ); ?>
	   </div>
    </div>     
</section><!-- #primary -->

<?php get_footer(); ?>
