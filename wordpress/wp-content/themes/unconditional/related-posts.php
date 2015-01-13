<?php
/**
 */
do_action( 'unconditional_related_posts_before' );
$unconditional_rel_posts = Unconditional::get_related_posts();
?>
<?php if ( $unconditional_rel_posts->have_posts() && $unconditional_rel_posts->found_posts >= 2 ) : ?>

<div class="related-content">
	<h3 class="related-content-title"><?php _e( 'You may also find these articles interesting', 'unconditional' ); ?></h3>

	<?php while ( $unconditional_rel_posts->have_posts() ) : $unconditional_rel_posts->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="hentry">
			<header class="entry-header">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>"><span><?php the_post_thumbnail(); ?></span></a>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

				<div class="entry-meta">
					<?php unconditional_post_meta(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

		</article><!-- #post-## -->

	<?php endwhile; ?>
</div>


<?php wp_reset_postdata(); ?>
<?php endif; // have_posts() ?>
<?php do_action( 'unconditional_related_posts_after' ); ?>
