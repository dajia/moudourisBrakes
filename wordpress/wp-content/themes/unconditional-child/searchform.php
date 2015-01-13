<?php
/**
 * Searchform.php
 *
 * Template for displaying search form.
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter A Search Term', 'unconditional' ); ?>">
		<span class="input-group-btn">
		<button class="btn btn-danger submit" type="submit" name="submit" id="searchsubmit">
			<span class="fa fa-search"></span>
		</button>
		</span>
	</div><!-- /input-group -->
</form>