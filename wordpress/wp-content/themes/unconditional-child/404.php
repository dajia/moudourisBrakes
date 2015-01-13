<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Unconditional
 */

get_header(); ?>

<section class="container-fluid" id="section7">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
				<header class="page-header text-center">
					<h1 class="page-title"><?php _e( 'Oops! That content can&rsquo;t be found.', 'unconditional' ); ?></h1>
				</header><!-- .page-header -->

				<div class="col-sm-8 text-center">
				<div class="404-not-found" style="font-size: 200px; color: #168ccc;">
				    4<i class="fa fa-chain-broken"></i>4
				</div>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links opposite or do a search?', 'unconditional' ); ?></p>
					<?php get_search_form();
					do_action( 'unconditional_after_404_searchform' ); ?>
				</div><!-- .page-content -->
                <div class="col-sm-4">
					
					<?php the_widget( 'WP_Widget_Recent_Posts' );

					if ( unconditional_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'unconditional' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif;
					do_action( 'unconditional_after_404_categories' );

					
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'unconditional' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					
					do_action( 'unconditional_after_404_archives' );

					the_widget( 'WP_Widget_Tag_Cloud' );
					do_action( 'unconditional_after_404_tags' ); ?>

				</div>
			</div>
      </div>
   </div>
</section>

<?php get_footer(); ?>