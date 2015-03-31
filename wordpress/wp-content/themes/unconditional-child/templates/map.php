<?php
/**
 * Template Name: Map
 *
 * @package Unconditional
 * @since Unconditional 1.0.0
 */

get_header(); ?>

<section class="container-fluid" id="section3">
  <div class="row">
    <div class="col-sm-12">
        <?php //if ( is_active_sidebar( 'page' ) ) : ?>
        <!--<div class="col-sm-12">-->
          <?php //else : ?>
            <?php //endif; ?>
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
       <!-- <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="img-map">
            <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/map2.jpg">
          </div>
        </div>-->
          <?php if ( !is_active_sidebar( 'page' ) ) { ?>



		  <!--</div>-->
          <?php } ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>
