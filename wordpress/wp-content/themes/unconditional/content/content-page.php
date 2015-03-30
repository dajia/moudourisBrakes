<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Unconditional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_front_page() ) { ?>
	<header class="page-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<?php } ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div id="pagination" class="btn-group>' . __( 'Pages:', 'unconditional' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( !is_front_page() ) : ?>
	<?php edit_post_link( __( 'Edit', 'unconditional' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	<?php endif ?>

	<div class="clearfix"></div>
</article><!-- #post-## -->
