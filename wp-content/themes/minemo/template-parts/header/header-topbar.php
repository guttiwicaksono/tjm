<?php if( preyantechnosys_topbar_show() ) : ?>

<div class="preyantechnosys-topbar-wrapper <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_topbar_classes()); ?>">
	<div class="preyantechnosys-topbar-inner">
		<div class="prt-topbar">
			<?php echo preyantechnosys_wp_kses( preyantechnosys_topbar_content(), 'topbar' ); ?>
		</div>
	</div>
</div>

<?php endif;  // preyantechnosys_topbar_show() ?>
