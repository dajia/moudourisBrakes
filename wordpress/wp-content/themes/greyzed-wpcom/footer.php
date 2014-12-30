<?php
/**
 * @package Greyzed
 */
?>
			<hr />

			<div id="footer" role="contentinfo">

				<?php if ( is_active_sidebar( 2 ) || is_active_sidebar( 3 ) || is_active_sidebar( 4 ) ) : ?>

					<div id="footer-left" class="widget-area">
						<ul>
						<?php dynamic_sidebar( 2 ); ?>
						</ul>
					</div>

					<div id="footer-middle" class="widget-area">
						<ul>
						<?php dynamic_sidebar( 3 ); ?>
						</ul>
					</div>

					<div id="footer-right" class="widget-area">
						<ul>
						<?php dynamic_sidebar( 4 ); ?>
						</ul>
					</div>

				<?php endif; ?>

			</div>

		</div><!-- #container -->
	</div><!-- #page -->

	<div id="footer-bott">
    <span class="copyright">Moudouris Brakes &copy; <?php echo date('Y'); ?></span>

	</div>

	<div class="footerbar"></div>
</div><!-- #wrapper -->

<?php wp_footer(); ?>
</body>
</html>