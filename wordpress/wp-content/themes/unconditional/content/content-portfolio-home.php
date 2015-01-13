<?php 

	   if ( get_theme_mod( 'unconditional_frontpage_project_num' )) { 
	      $unconditional_proj_count = get_theme_mod( 'unconditional_frontpage_project_num' );
	   } else {
	      $unconditional_proj_count = get_option( 'jetpack_portfolio_posts_per_page', '10' );
	   }

			$unconditional_args = array(
				'post_type'      => 'jetpack-portfolio',
				'posts_per_page' => $unconditional_proj_count,
			);

			$unconditional_proj_query = new WP_Query ( $unconditional_args );

				if ( post_type_exists( 'jetpack-portfolio' ) && $unconditional_proj_query -> have_posts() ) :

					while ( $unconditional_proj_query -> have_posts() ) : $unconditional_proj_query -> the_post();

						get_template_part( 'content/content', 'portfolio' );

					endwhile;

					wp_reset_postdata();
					
			endif;
?>