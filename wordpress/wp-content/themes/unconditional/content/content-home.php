<?php
/**
 * @package Unconditional
 * File: Home Content 4 in a row thumb left layout
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
	</header><!-- .entry-header -->
	<?php if ( get_theme_mod( 'unconditional_home_meta' ) != 0 ) { ?>
	<div class="entry-meta">
		<?php unconditional_post_meta(); ?>
	</div><!-- .entry-meta -->
	<?php } ?>
	
	<div class="entry-summary">
	<?php if (has_post_thumbnail()) { ?>
	<div class="summary-thumbnail">
		<a href="<?php the_permalink(); ?>">
		   <?php the_post_thumbnail(); ?>
		</a>
	</div>
	<?php } ?>
		<?php echo unconditional_homefeed_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages: ', 'unconditional' ),
				'after'  => '</div>',
			) );
		?>
		<div class="read-more">
		    <a href="<?php echo esc_url( get_permalink() ) ?>"><?php _e( 'Continued &raquo;', 'unconditional'); ?></a>
		</div>
		
	</div><!-- .entry-summary -->

</article><!-- #post-## -->