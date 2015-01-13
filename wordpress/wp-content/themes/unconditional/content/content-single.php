<?php
/**
 * @package Unconditional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header single">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<div class="entry-thumbnail">
			   <?php the_post_thumbnail( 'unconditional-post-standard' ); ?>
		</div>
		
		<div class="entry-meta">
			<?php //unconditional_posted_on(); 
			   unconditional_post_meta();
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links btn special">' . __( 'Pages: ', 'unconditional' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$unconditional_category_list = get_the_category_list( __( ', ', 'unconditional' ) );

			/* translators: used between list items, there is a space after the comma */
			$unconditional_tag_list = get_the_tag_list( '', __( ', ', 'unconditional' ) );

			if ( ! unconditional_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $unconditional_tag_list ) {
					$unconditional_meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'unconditional' );
				} else {
					$unconditional_meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'unconditional' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $unconditional_tag_list ) {
					$unconditional_meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'unconditional' );
				} else {
					$unconditional_meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'unconditional' );
				}

			} // end check for categories on this blog

			printf(
				$unconditional_meta_text,
				$unconditional_category_list,
				$unconditional_tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'unconditional' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
