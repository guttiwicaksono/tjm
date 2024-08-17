<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_datecounter_element_values;
	
	if( is_array($tm_global_datecounter_element_values) ) :
	
?>

<div class="prt-datecounter-wrapper counter-<?php echo esc_attr($view); ?> wpb_single_image vc_align_<?php echo esc_attr($align); ?> prt-datecounter-style1">

<div class="countdown-box">
<div class="counter-box">
<?php
		$return .= '<div id="countdown-timer" class="countdown-timer" data-date=" ' .preyantechnosys_wp_kses($counterdate) . '">';
		$return .= "<script>
						jQuery(document).ready(function($){
							 jQuery('.countdown-timer').TimeCircles({
								  'animation': 'smooth',
								  'use_background': false,
								  'bg_width': 0,
								  'fg_width': 0,
								  'time': {
									  'Days': {
										  'text': '" . esc_attr__("Days", 'minemo') . "',
										  'show': true
									  },
									  'Hours': {
										  'text': '" . esc_attr__("Hours", 'minemo') . "',
										  'show': true
									  },
									  'Minutes': {
										  'text': '" . esc_attr__("Minutes", 'minemo') . "',
										  'show': true
									  },
									  'Seconds': {
										  'text': '" . esc_attr__("Seconds", 'minemo') . "',
										  'show': true
									  }
								  }
							 }); 
						});
					</script>";
														
?>
</div></div></div>

</div>
<div class="prt-datecounter-box">
<div class="prt-single-image-inner">
	<div class="prt-datecounter-img-box">
		<?php echo preyantechnosys_wp_kses($image_html); ?>
	</div>
</div>
</div>
<div class="prt-datecountericon-box">
	<?php echo preyantechnosys_wp_kses($button_html); ?>
</div>
<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$tm_global_datecounter_element_values = '';
?>