<?php
/**
 * @package Unconditional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<header class="entry-header">
		<div class="entry-thumbnail">
			   <?php the_post_thumbnail( 'unconditional-project-standard' ); ?>
		</div>		
	</header>

	<div class="entry-content">
		
		<h3 class="project-notes"><?php _e( 'Project Notes: ', 'unconditional'); ?></h3>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'unconditional' ) ); ?>
		
			  
		
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'unconditional' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		
		
		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">', _x(', ', 'Used between list items, there is a space after the comma.', 'unconditional' ), '</span>' );
		?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'unconditional' ), __( '1 Comment', 'unconditional' ), __( '% Comments', 'unconditional' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'unconditional' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
