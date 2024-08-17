<?php
global $post;
$tmservice_meta = get_post_meta( $post->ID, 'minemo_preyantechnosys_tmservice_icons', true );
$tmservice_icon = isset( $tmservice_meta['tmservice_icon'] ) ? $tmservice_meta['tmservice_icon'] : '';
?>
<article class="preyantechnosys-box preyantechnosys-box-service preyantechnosys-servicebox-styletwo preyantechnosys-servicebox-stylefour <?php echo preyantechnosys_servicebox_class(); ?>">
	<div class="preyantechnosys-post-item">
		<div class="item-figure">
			<?php echo preyantechnosys_get_featured_media( get_the_ID(), 'preyantechnosys-services4', false ); ?>	
			</div>
			<div class="prt-servicebox-detials">
			<div class="item-content">
				<div class="prt-box-icon">	<?php
				if ( $tmservice_icon ) {
					?>
					<i class="kw_minemo <?php echo esc_attr( $tmservice_icon ); ?>"></i>
					<?php
				}
				?></div>
				<?php echo preyantechnosys_box_title(); ?>
				<div class="preyantechnosys-box-desc">
							<div class="prt-short-desc">
								<?php the_excerpt(); ?>
							</div>
				</div> 
				<div class="preyantechnosys-serviceboxbox-readmore figcaption fborder">
					<?php echo preyantechnosys_servicebox_readmore_text(); ?>
				</div>
			</div>
			</div>
	</div>
</article>