<?php
global $post;
$tmservice_meta = get_post_meta( $post->ID, 'minemo_preyantechnosys_tmservice_icons', true );
$tmservice_icon = isset( $tmservice_meta['tmservice_icon'] ) ? $tmservice_meta['tmservice_icon'] : '';
?>
<article class="preyantechnosys-box preyantechnosys-box-service preyantechnosys-servicebox-styletwo <?php echo preyantechnosys_servicebox_class(); ?>">
	<div class="preyantechnosys-post-item prt-wrap">
		<div class="prt-servicebox-detials">
			<div class="item-content">
				
				<div class="prt-title"><?php echo preyantechnosys_box_title(); ?></div>
				<div class="prt-box-icon"><?php echo preyantechnosys_serviceicon_box(); ?></div>
			</div>
			
			<div class="preyantechnosys-serviceboxbox">
				<div class="prt-post-featured-link-wrapper" <?php echo preyantechnosys_featured_link_image();?>>
			</div>
			</div>
		</div>
	</div>
</article>