<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package unconditional
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'unconditional_before_sidebar' ); ?>
		
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', 'unconditional' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'unconditional' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	<?php do_action( 'unconditional_after_sidebar' ); ?>
	</div><!-- #secondary -->
