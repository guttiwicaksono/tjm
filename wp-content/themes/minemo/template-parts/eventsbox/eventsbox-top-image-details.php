<article class="preyantechnosys-box preyantechnosys-box-events preyantechnosys-box-view-top-image-details preyantechnosys-events-box-view-top-image-details">
	<div class="preyantechnosys-post-item">
		<div class="preyantechnosys-post-item-inner">
			<?php echo preyantechnosys_get_featured_media( get_the_ID(), 'full', true ); ?>		
		</div>	
		<div class="preyantechnosys-box-bottom-content">
			<div class="preyantechnosys-box-meta preyantechnosys-events-meta"><?php echo preyantechnosys_wp_kses( preyantechnosys_event_date() ); ?></div>
			<?php echo preyantechnosys_box_title(); ?>
			<div class="preyantechnosys-box-desc">
				<?php if( has_excerpt() ){ ?>
				<div class="prt-short-desc">
					<?php $return  = nl2br( get_the_excerpt() );
					echo do_shortcode($return); ?>
				</div>
			<?php } ?>
			</div>
			<?php echo preyantechnosys_wp_kses( preyantechnosys_event_venue() ); ?>
			<div class="preyantechnosys-eventbox-footer">
				<?php echo preyantechnosys_event_readmore(); ?>
			</div>
		</div>
	</div>
</article>
