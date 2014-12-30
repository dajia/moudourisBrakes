<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Unconditional
 */

get_header(); ?>

<section class="container-fluid" id="section7">
    <div class="row">
      <div class="singular col-sm-10 col-sm-offset-1">
        <div class="row">
        <div class="col-sm-8">
        <?php do_action( 'unconditional_before_single' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content/content', 'single' ); ?>
			
			<?php get_template_part( 'related-posts' ); ?>

			<?php unconditional_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>
        <?php do_action( 'unconditional_after_single' ); ?>
		</div>
          <div class="col-sm-4">
		       <?php get_sidebar( 'single' ); ?>
		  </div>
        </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>