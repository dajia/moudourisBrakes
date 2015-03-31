<?php
/**
 * Template Name: Contact
 *
 * @package Unconditional
 * @since Unconditional 1.0.0
 */

get_header(); ?>

<section class="container-fluid" id="section3">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
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
          <?php if ( !is_active_sidebar( 'page' ) ) { ?>
          <?php } ?>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="infos">
            <?php the_field('contact_info'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
