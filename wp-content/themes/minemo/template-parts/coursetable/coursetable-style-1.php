

<div class="preyantechnosys-ctable-main">
	<?php echo preyantechnosys_wp_kses($featured); ?>
	<div class="prt-ctable-wrap prt-wrap">
		<div class="prt-ctable-icon prt-wrap-cell">
			<?php echo preyantechnosys_wp_kses($icon); ?>
		</div>
		<div class="prt-ctable-content prt-wrap-cell">
			<div class="tprt-ctablebox-price-w prt-wrap-cell">
				<div class="prt-price-text">
					<?php echo preyantechnosys_wp_kses($price); ?>
				</div>
				<div class="prt-feature-text">
					<?php echo preyantechnosys_wp_kses($frequency); ?>
				</div>
			</div>
	
			<div class="prt-feature-content prt-wrap-cell">
			<?php echo preyantechnosys_wp_kses($heading); ?>
			<?php echo preyantechnosys_wp_kses($desc); ?>
			
			<div class="prt-ctablebox-features">
				<ul class="prt-feature-lines"><?php echo preyantechnosys_wp_kses($lines_html); ?></ul>
				<ul class="prt-feature-lines"><?php echo preyantechnosys_wp_kses($lines2_html); ?></ul>
			</div>	
			<?php echo preyantechnosys_wp_kses($informationheading); ?>
			
			</div>
		</div>
	</div>
</div>