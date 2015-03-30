<?php
/**
 * Template Name: Full Width Page
 *
 * @package Unconditional
 * @since Unconditional 1.0.0
 */

get_header(); ?>

<section class="container-fluid" id="section7">
	<div class="main row" role="main">
        <div class="content col-sm-10 col-sm-offset-1">
        <?php do_action( 'unconditional_before_page' );
			 while ( have_posts() ) : the_post();
            if ( is_front_page() ) {
				get_template_part( 'content/content', 'front' );
			} else {
			    get_template_part( 'content/content', 'page' );
			}
			// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			
			endwhile; // end of the loop.
            do_action( 'unconditional_after_page' ); ?>
		</div>
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
