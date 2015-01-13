  <div class="row">
  
  	<div class="col-sm-8 col-sm-offset-2 text-center">        
		<?php if ( get_theme_mod( 'unconditional_intro_text_visibility' ) != 1 ) : ?>
		<?php if (get_theme_mod( 'unconditional_intro_text' )) { ?>
		    <p class="lead">
			    <?php echo esc_html(get_theme_mod( 'unconditional_intro_text' )) ;?>
			</p>
		<?php } else { ?>
		    <p class="lead">
			    <?php printf( __( 'We are a small team of web development enthusiasts aiming to generate clean and functional theme using the Bootstrap toolkit together with WordPress...', 'unconditional' ) ); ?>
			</p>
        <?php } ?>
		<?php endif; ?>
		<br> 
      	<?php if ( get_theme_mod( 'unconditional_intro_button_visibility' ) != 1 ) : ?>
		<div class="col-sm-6 col-sm-offset-3">
	        <div class="btn-group purchase_toggle_buttons">
			<?php $purchase_left_url     = esc_url(get_theme_mod( 'unconditional_purchase_left_url' )); ?>
			<?php $purchase_left_text    = esc_html(get_theme_mod( 'unconditional_purchase_left_text' )); ?>
			<?php $purchase_left_target  = esc_attr(get_theme_mod( 'unconditional_purchase_left_url_target' )); ?>
			<?php $purchase_right_url    = esc_url(get_theme_mod( 'unconditional_purchase_right_url' )); ?>
			<?php $purchase_right_text   = esc_html(get_theme_mod( 'unconditional_purchase_right_text' )); ?>
			<?php $purchase_right_target = esc_attr(get_theme_mod( 'unconditional_purchase_right_url_target' )); ?>			
			
			    <?php if (get_theme_mod( 'unconditional_purchase_left_url' )) { ?>
				    <a href="<?php echo $purchase_left_url ?>" target="<?php echo $purchase_left_target ?>" type="button" class="btn btn-default purchase_toggle_button left">
				        <?php echo $purchase_left_text ?>
				    </a>
				<?php } else { ?>
                    <a href="#" type="button" class="btn btn-default purchase_toggle_button left">
					    <?php printf( __( 'Take A Tour!', 'unconditional' ) ); ?>
					</a>
				<?php } ?>
				
				<?php if (get_theme_mod( 'unconditional_purchase_left_url' )) { ?>
				    <a href="<?php echo $purchase_right_url ?>" target="<?php echo $purchase_right_target ?>" type="button" class="btn btn-default purchase_toggle_button right">
				        <?php echo $purchase_right_text ?>
				    </a>
				<?php } else { ?>
                    <a href="#" type="button" class="btn btn-default purchase_toggle_button right">
					    <?php printf( __( 'Creat My Account!', 'unconditional' ) ); ?>
					</a>
				<?php } ?>
                <span class="or"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></span>
            </div>
	    </div>
		<?php endif; ?>
    </div>
  </div>