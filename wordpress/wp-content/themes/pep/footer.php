<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Pep
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="footer-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth'=>'1' ) ); ?>
		</div>
		<div class="site-info">
			<?php do_action( 'pep_credits' ); ?>
		Copyright &copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>. <?php _e('Powered by', 'pep'); ?> 
					<a href="//wordpress.org" title="WordPress" target="_blank"><?php _e('WordPress', 'pep'); ?></a> &amp; <a href="http://pepthemes.com" target="_blank" title="<?php _e('PepThemes', 'pep'); ?>"><?php _e('PepThemes', 'pep'); ?></a>.
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>