<?php
global $post;
$tmservice_meta = get_post_meta( $post->ID, 'minemo_preyantechnosys_tmservice_icons', true );
$tmservice_icon = isset( $tmservice_meta['tmservice_icon'] ) ? $tmservice_meta['tmservice_icon'] : '';
?>
<article class="preyantechnosys-box preyantechnosys-box-service preyantechnosys-servicebox-stylethree <?php echo preyantechnosys_servicebox_class(); ?>">
	<div class="preyantechnosys-post-item prt-wrap">
		<div class="item-figure prt-wrap-cell">
			<?php echo preyantechnosys_get_featured_media( get_the_ID(), 'preyantechnosys-img-service3', false ); ?>	
		</div>
		<div class="prt-servicebox-detials prt-wrap-cell">
			<div class="item-content prt-wrap">
				<div class="prt-title prt-wrap-cell">
					<?php echo preyantechnosys_box_title(); ?>
				</div>
							
			</div>
					<div class="preyantechnosys-box-desc">
							<div class="prt-short-desc">
								<?php the_excerpt(); ?>
							</div>
				</div> 	
		</div>
	</div>
</article>