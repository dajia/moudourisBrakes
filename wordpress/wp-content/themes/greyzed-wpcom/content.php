<?php
/**
 * @package Greyzed
  */
?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<div class="posttitle">
	<h2 class="pagetitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to ', 'greyzed' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<small>
		<?php
			if ( is_multi_author() ) {
				printf( __( 'Posted: %1$s by <strong>%2$s</strong> in %3$s', 'greyzed' ),
					get_the_date( get_option( 'date_format' ) ),
					get_the_author(),
					get_the_category_list( ', ' )
				);
			} else {
				printf( __( 'Posted: %1$s in %2$s', 'greyzed' ),
					get_the_date( get_option( 'date_format' ) ),
					get_the_category_list( ', ' )
				);
			}
		?>
		<br />
		<?php the_tags( __( 'Tags: ', 'greyzed' ), ', ', '' ); ?>
	</small>
</div>
<?php if ( ( comments_open() ) && ( ! post_password_required() ) ) : ?>
<div class="postcomments"><?php comments_popup_link( '0', '1', '%' ); ?></div>
<?php endif; ?>
<div class="entry">
	<?php the_content( __( 'Read the rest of this entry &raquo;', 'greyzed' ) ); ?>
</div>
	<?php wp_link_pages( array( 'before' => '<p><strong>'. __( 'Pages:', 'greyzed' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
	<?php edit_post_link( __( 'Edit this entry.', 'greyzed' ), '<p>', '</p>' ); ?>
</div>