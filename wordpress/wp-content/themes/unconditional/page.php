<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Unconditional
 */

get_header(); ?>

<section class="container-fluid" id="section3">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
          <?php if ( !is_active_sidebar( 'page' ) ) : ?>
		  <div class="col-sm-12">
		  <?php else : ?>
		  <div class="col-sm-8">
		  <?php endif; ?>
        <?php do_action( 'unconditional_before_page' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>
        <?php do_action( 'unconditional_after_page' ); ?>
		</div>
          <?php if ( is_active_sidebar( 'page' ) ) { ?>
		  <div class="col-sm-4">
		       <?php get_sidebar( 'page' ); ?>
		  </div>
		  <?php } ?>
        </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>
