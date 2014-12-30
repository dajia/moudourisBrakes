<?php
	/**
	 * The header widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-1' )
		&& ! is_active_sidebar( 'footer-2' )
		&& ! is_active_sidebar( 'footer-3' )
		&& ! is_active_sidebar( 'footer-4' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<footer id="footer">
<div class="container">
  <div class="row"> 
<?php do_action( 'unconditional_before_footer_sidebar' ); ?>
<div id="supplementary">
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
	<div class="col-sm-3" role="complementary">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
	<div class="col-sm-3" role="complementary">
		<?php dynamic_sidebar( 'footer-2' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
	<div class="col-sm-3" role="complementary">
		<?php dynamic_sidebar( 'footer-3' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="col-sm-3" role="complementary">
		<?php dynamic_sidebar( 'footer-4' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
</div><!-- #supplementary -->
<?php do_action( 'unconditional_after_footer_sidebar' ); ?>
<div class="clearfix"></div>
</div>
</div>
</footer>