

<div class="tm_sliderbox_contents <?php if($count == 1) { echo 'active'; } ?>">
	<div class="prt-bottom-contentbox">
		    <?php echo preyantechnosys_wp_kses($icon_html) ; ?>
			<?php echo preyantechnosys_wp_kses($smalltext_html); ?>
			<?php echo preyantechnosys_wp_kses($label_html); ?>
		    
			<?php echo preyantechnosys_wp_kses($link_html); ?>
			
	</div>
	<div class="sliderbox-img-reposive" style="background-image: url(<?php echo esc_url($box['icon_image']['url']); ?>)"></div>
</div>
