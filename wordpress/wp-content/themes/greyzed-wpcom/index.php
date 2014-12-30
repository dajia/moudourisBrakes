<?php
/**
 * @package Greyzed
 */
get_header(); ?>
<div id="container">

<?php get_sidebar(); ?>

	<div id="content" role="main">
		<div id="content-inner" class="column">

		<?php $postcount = '0'; // reset post counter ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $postcount++; // post counter ?>

				<?php
				$template_style = '';

				$format = get_post_format();

				if ( false === $format )
					$format = 'standard';

				if ( 'standard' != $format )
					$template_style = 'format';

				get_template_part( 'content', "$template_style" );
				?>

			<?php endwhile; ?>

			<?php
				// Find page with last post
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$postsppage= get_option( 'posts_per_page' );
				$total = $paged * $postsppage;
				$remainder = $total - $wp_query->found_posts;
				$endvar =  $postsppage - $remainder;
			?>

		</div><!-- #content-inner -->

		<div id="nav-post">
			<div class="navigation-bott">
				<?php if ( $endvar == 0 || $postcount == $endvar ) { } else { ?>
				<div class="leftnav"><?php next_posts_link( __( 'Older Entries', 'greyzed' ) ); ?></div>
				<?php } if ( $paged > 1 ) { ?>
				<div class="rightnav"><?php previous_posts_link( __( 'Newer Entries', 'greyzed' ) ); ?></div>
				<?php } ?>
			</div>
		</div>
	</div><!-- #content -->

<?php endif; ?>
<?php get_footer(); ?>