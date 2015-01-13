<?php
/**
 * Template Name: Portfolio Page Template
 *
 * @package Unconditional
 */

get_header(); ?>
<section class="container-fluid" id="section7">
<div class="main row" role="main">
        <div class="content col-sm-10 col-sm-offset-1">
		<?php if ( ! get_theme_mod( 'unconditional_hide_portfolio_page_content' ) ) :
			while ( have_posts() ) : the_post();

				the_title( '<header class="page-header text-center"><h1 class="page-title">', '</h1></header>' ); ?>
				<div class="feed-title-separator"></div>

				<div class="page-content">
					<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'unconditional' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .page-content -->

				<?php 
			endwhile; // end of the loop.
		endif;

				if ( get_query_var( 'paged' ) ) :
					$unconditional_paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$unconditional_paged = get_query_var( 'page' );
				else :
					$unconditional_paged = 1;
				endif;

				$unconditional_portfolio_count = get_option( 'jetpack_portfolio_posts_per_page', '10' );

				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'paged'          => $unconditional_paged,
					'posts_per_page' => $unconditional_portfolio_count,
				);

				$unconditional_project_query = new WP_Query ( $args );

				if ( post_type_exists( 'jetpack-portfolio' ) && $unconditional_project_query -> have_posts() ) :

					while ( $unconditional_project_query -> have_posts() ) : $unconditional_project_query -> the_post();

						get_template_part( 'content/content', 'portfolio' );

					endwhile;

					unconditional_pagination( $unconditional_project_query->max_num_pages );

					wp_reset_postdata();

				else :
			?>

				<section class="no-results not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'No Project Found', 'unconditional' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<?php if ( current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'unconditional' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

						<?php else : ?>

							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'unconditional' ); ?></p>

						<?php endif; ?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->

			<?php endif; ?>

		</div>
	</div><!-- #content -->
</section><!-- #primary -->
<?php get_footer(); ?>
