<?php get_sidebar( 'footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'unconditional_in_before_colophon' ); ?>
		<div class="site-info">
		<div class="container">
      <span class="copyright">Moudouris Brakes &copy; <?php echo date('Y'); ?></span>
      <span class="sep"> | </span>
      <span class="social">
        <a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook-square fa-lg"></i></a>
        <a href="mailto:dajia@polyptychon.gr"><i class="fa fa-envelope fa-lg"></i></a>
        <!--<a href="http://www.googlemaps.com" target="_blank"><i class="fa fa-map-marker fa-lg"></i></a></span>-->
        <a href="/epikoinonia-frena-moudouris/map/"><i class="fa fa-map-marker fa-lg"></i></a></span>
      <!--
			<?php do_action( 'unconditional_before_credits' );
			//printf( __( 'Proudly Powered By', 'unconditional' ) ); ?><a target="_Blank" href="<?php //echo esc_url( __( 'http://wordpress.org/', 'unconditional' ) ); ?>" title="<?php //esc_attr_e( 'Semantic Personal Publishing Platform', 'unconditional' ); ?>"><?php //printf( __( ' %s', 'unconditional' ), 'WordPress' ); ?></a>
			<!--<span class="sep"> | </span>
			<?php //printf( __( 'Theme', 'unconditional' ) ); ?><a target="_blank" href="<?php //echo esc_url( __( 'http://www.wpstrapcode.com/blog/unconditional', 'unconditional' ) ); ?>" title="<?php //esc_attr_e( 'Unconditional WordPress Theme', 'unconditional' ); ?>"><?php //printf( __( ' %s', 'unconditional' ), 'Unconditional' ); ?></a><?php //printf( __( ' By %s', 'unconditional' ), 'WP Strap Code' );
		do_action( 'unconditional_after_credits' ); ?>
	    -->
      </div>
	    </div><!-- .site-info -->
<?php do_action( 'unconditional_in_after_colophon' ); ?>
</footer><!-- #colophon -->
<?php do_action( 'unconditional_below_footer' );

wp_footer(); ?>
	</body>
</html>