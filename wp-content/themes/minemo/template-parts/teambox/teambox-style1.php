<article class="preyantechnosys-box preyantechnosys-box-team preyantechnosys-teambox-style1">
	<div class="preyantechnosys-post-item">
		<div class="preyantechnosys-content-inner">
			<div class="preyantechnosys-team-image-box">
				<?php echo preyantechnosys_wp_kses(preyantechnosys_featured_image('preyantechnosys-img-team-member')); ?>
								
			</div>
			<div class="preyantechnosys-team-position">						
					<div class="prt-position">					
					<?php echo preyantechnosys_get_meta( 'preyantechnosys_team_member_details', 'tm_team_info' , 'team_details_line_position' ); ?></div>
					<?php echo preyantechnosys_box_title(); ?>	

			</div>
		</div>
		<div class="preyantechnosys-box-content">
			<div class="preyantechnosys-innercontent-box">		
				<div class="prt-call">
				<?php echo esc_attr__('call us on', 'minemo'); ?>
				<?php echo preyantechnosys_wp_kses( preyantechnosys_team_member_single_meta( 'phone' ) ) ?>
				</div>
				<div class="prt-email">
				<?php echo preyantechnosys_wp_kses( preyantechnosys_team_member_single_meta( 'email' ) ) ?>
				</div>
			</div>										
		</div>		
	</div>
</article>
 