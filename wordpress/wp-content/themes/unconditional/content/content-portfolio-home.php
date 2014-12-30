<?php 

	   if ( get_theme_mod( 'unconditional_frontpage_project_num' )) { 
	      $posts_per_page = get_theme_mod( 'unconditional_frontpage_project_num' );
	   } else {
	      $posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '10' );
	   }

			$args = array(
				'post_type'      => 'jetpack-portfolio',
				'paged'          => $paged,
				'posts_per_page' => $posts_per_page,
			);

			$project_query = new WP_Query ( $args );

				if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

					while ( $project_query -> have_posts() ) : $project_query -> the_post();

						get_template_part( 'content/content', 'portfolio' );

					endwhile;

					// unconditional_portfolio_pagination( $project_query->max_num_pages );

					wp_reset_postdata();
					
			endif;
?>