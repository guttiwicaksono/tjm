<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_fid_element_values;
	
	// jquery circle progress bar js
	wp_enqueue_script('jquery-circle-progress');
	
	// skin color
	global $minemo_theme_options;
	$skincolor = ( !empty($minemo_theme_options['skincolor']) ) ? $minemo_theme_options['skincolor'] : '#129ce7' ;
	
	$fillcolor = esc_attr($tm_global_fid_element_values['circle_fill_color']);
	$emptycolor = esc_attr($tm_global_fid_element_values['circle_empty_color']);
	
	if(!empty($fillcolor) && ($fillcolor == 'skincolor')) {
	$fillcolor	= $skincolor;
	}
	if(!empty($emptycolor) && ($emptycolor == 'skincolor')) {
		$emptycolor	= $skincolor;
	}
	
	if( is_array($tm_global_fid_element_values) ) :
	
?>

<div class="prt-fid inside <?php echo preyantechnosys_wp_kses( $view_class ); ?>">	
	<div class="prt-fld-contents">
		<div class="prt-circle-box"
			data-digit			= "<?php echo esc_attr( $digit ); ?>"
			data-fill			= "<?php echo esc_attr($fillcolor) ?>"
			data-before			= "<?php echo esc_html( $before_text ); ?>"
			data-before-type	= "<?php echo esc_html( $beforetextstyle ); ?>"
			data-after			= "<?php echo esc_html( $after_text ); ?>"
			data-after-type		= "<?php echo esc_html( $aftertextstyle ); ?>"
			data-size			= "145"
			data-emptyfill		= "<?php echo esc_attr($emptycolor) ?>"
			data-thickness		= "7"
			data-gradient		= ""
			>
			<div class="prt-circle-content">
				<div class="prt-circle"></div>
				<div class="prt-circle-boxcontent">
					<div class="prt-fid-number"></div>
				</div>
			</div>
		</div>
			<div class="prt-fid-content">
				<h3 class="prt-fid-title"><span><?php echo preyantechnosys_wp_kses($title); ?><br></span></h3>
			</div>
	
	</div><!-- .prt-fld-contents -->
</div>

<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$tm_global_fid_element_values = '';
?>