<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_fid_element_values;
	
	if( is_array($tm_global_fid_element_values) ) :
	
?>


<div class="prt-fid inside <?php echo preyantechnosys_wp_kses( $view_class ); ?>">
	<div class="prt-fid-left">	
		<?php echo preyantechnosys_wp_kses( $lefticoncode ); ?>
	</div>	
	<div class="prt-fld-contents">
		<h4 class="prt-fid-inner">
			<?php echo preyantechnosys_wp_kses( $before_text ); ?>
			<span
			class				  = "prt-number-rotate"
			data-appear-animation = "animateDigits"
			data-from             = "0"
			data-to               = "<?php echo esc_html( $digit ); ?>"
			data-interval         = "<?php echo esc_html( $interval ); ?>"
			data-before           = ""
			data-before-style     = ""
			data-after            = ""
			data-after-style      = ""
			>
				<?php echo esc_html( $digit ); ?>
		</span>
		<?php echo preyantechnosys_wp_kses( $after_text ); ?>
		</h4>
		<h3 class="prt-fid-title"><span><?php echo preyantechnosys_wp_kses($title); ?><br></span></h3>
	</div><!-- .prt-fld-contents -->
	<?php echo preyantechnosys_wp_kses($righticoncode); ?>
</div>



<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$tm_global_fid_element_values = '';
?>