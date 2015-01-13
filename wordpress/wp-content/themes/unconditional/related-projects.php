<?php
/**
 */
do_action( 'unconditional_related_projects_before' );
$unconditional_rel_proj = Unconditional::get_related_projects();
?>
<?php if ( $unconditional_rel_proj->have_posts() && $unconditional_rel_proj->found_posts >= 2 ) : ?>

<div class="related-content">
	<h3 class="related-content-title"><?php _e( 'Our other projects', 'unconditional' ); ?></h3>

	<?php while ( $unconditional_rel_proj->have_posts() ) : $unconditional_rel_proj->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="hentry">
			<header class="entry-header">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="Project: <?php the_title(); ?> Click Image To View"><span><?php the_post_thumbnail(); ?></span></a>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			</header><!-- .entry-header -->

		</article><!-- #post-## -->

	<?php endwhile; ?>
</div>


<?php wp_reset_postdata(); ?>
<?php endif; // have_posts() ?>
<?php do_action( 'unconditional_related_projects_after' ); ?>
