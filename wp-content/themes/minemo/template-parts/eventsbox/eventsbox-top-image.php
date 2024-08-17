<article class="preyantechnosys-box preyantechnosys-box-events preyantechnosys-box-view-top-image preyantechnosys-events-box-view-top-image">
	<div class="preyantechnosys-post-item">
		<div class="preyantechnosys-post-item-inner">
			<?php echo preyantechnosys_get_featured_media( get_the_ID(), 'preyantechnosys-img-blog-top', true ); ?>
		</div>
		<div class="event-box-content">
			<div class="preyantechnosys-box-title"><?php echo preyantechnosys_box_title(); ?></div>
			<div class="preyantechnosys-box-meta preyantechnosys-events-meta"><?php echo preyantechnosys_wp_kses( preyantechnosys_event_meta() ); ?></div>
			<?php echo preyantechnosys_wp_kses( preyantechnosys_event_venue() ); ?>
		</div>
	</div>
</article>