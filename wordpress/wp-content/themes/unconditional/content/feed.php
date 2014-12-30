<?php do_action( 'unconditional_before_home_content' );

		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
			get_template_part( 'content/content', 'home' );
						
			endwhile;
			do_action( 'unconditional_before_home_pagination' );
			unconditional_pagination();
			do_action( 'unconditional_after_home_pagination' );

		else :
            
			get_template_part( 'no-results', 'index' );
			
		endif;
do_action( 'unconditional_after_home_content' ); ?>