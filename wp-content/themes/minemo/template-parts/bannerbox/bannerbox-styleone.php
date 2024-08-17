<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_bannerbox_element_values;
	if( is_array($tm_global_bannerbox_element_values) ) :
?>
<div class="preyantechnosys-bannerbox preyantechnosys-banner-style1">
	<div class="preyantechnosys-banner-content">
		<div class="prt-bannerbox-info">
				<?php echo preyantechnosys_wp_kses($heading_html); ?>
				<?php echo preyantechnosys_wp_kses($subheading_html); ?>
				<?php echo preyantechnosys_wp_kses($content_html); ?>
				<?php echo preyantechnosys_wp_kses($button_html); ?>
		</div>
		<div class="preyantechnosys-bannerbox-inner">
		       <?php echo preyantechnosys_wp_kses($icon_image); ?>
	   </div>
	  </div>
	</div>	
<?php
	endif;
	// Resetting data of the Iconbox
	$tm_global_bannerbox_element_values = '';
?>