<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Unconditional
 */

get_header(); ?>

<section class="container-fluid" id="section7">
	<div class="col-sm-12 text-center">
		<div class="404-not-found" style="font-size: 200px; color: #f33f3f;">
			<?php //_e( 'Oops! That content can&rsquo;t be found.', 'unconditional' ); ?>
			404

			<h1 class="page-title">
			<?php
			$language = get_locale();
			if ($language == 'en_US') {
				_e( 'Oops! That content can&rsquo;t be found.', 'unconditional' );
			}
			else {
				_e( 'Oops! Η σελίδα δεν υπάρχει.', 'unconditional' );
			}
			?>
			</h1>
		</div>
	</div>
</section>

<?php get_footer(); ?>