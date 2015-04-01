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
        <?php if(get_locale() === "el" ){
          print '<a href="/epikoinonia-frena-moudouris/find-us/"><i class="fa fa-map-marker fa-lg"></i></a></span>';
        }else{
          print '<a href="/en/contact-moudouris-brakes/find-us/"><i class="fa fa-map-marker fa-lg"></i></a></span>';
        }?>

			<?php do_action( 'unconditional_before_credits' ); ?>
		<?php do_action( 'unconditional_after_credits' ); ?>

      </div>
	    </div><!-- .site-info -->
<?php do_action( 'unconditional_in_after_colophon' ); ?>
</footer><!-- #colophon -->
<?php do_action( 'unconditional_below_footer' );

wp_footer(); ?>
	</body>
</html>