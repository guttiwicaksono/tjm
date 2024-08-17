<?php
// Check if floating bar is enabled
if( preyantechnosys_fbar_show()==true ): ?>
	
	<div class="preyantechnosys-fbar-main-w preyantechnosys-fbar-position-<?php echo sanitize_html_class( preyantechnosys_get_option('fbar-position') ); ?>">
		<div class="preyantechnosys-fbar-inner-w">
			<div class="preyantechnosys-fbar-box-w <?php echo preyantechnosys_sanitize_html_classes( preyantechnosys_fbar_classes() ); ?>">
				<?php echo preyantechnosys_wp_kses( preyantechnosys_site_logo() ); ?>
				<div class="prt-fbar-bg-layer prt-bg-layer"></div>
				<div class="preyantechnosys-fbar-content-wrapper <?php echo preyantechnosys_sanitize_html_classes( preyantechnosys_floatingbar_container_class() ); ?>">
					<div class="preyantechnosys-fbar-box-w-bgcolor">
						<div class="preyantechnosys-fbar-box">
							<?php get_sidebar( 'floatingbar-top' ); ?>
							<?php get_sidebar( 'floatingbar' ); ?>
							<?php get_sidebar( 'floatingbar-bottom' ); ?>
						</div>
					</div>
					<span class="prt-fbar-close"><?php echo preyantechnosys_fbar_close_icon_for_content_area(); ?></span>
				</div>
			</div>
		
		</div><!-- .preyantechnosys-fbar-inner-w -->	
	</div><!-- .preyantechnosys-fbar-main-w -->
	
<?php endif; ?>