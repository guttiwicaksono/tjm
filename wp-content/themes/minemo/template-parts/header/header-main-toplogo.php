<div id="site-header" class="site-header <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_class()); ?>">
		<div class="site-header-main prt-wrap">
		
		<div class="prt-header-top-wrapper <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_container_class()); ?>">
			<div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<?php preyantechnosys_toplogo_header_leftcontent(); ?>		
				</div>
				<div class="col-xs-12 col-sm-4 col-md-6">
					<div class="text-center">
						<div class="site-branding">
							<?php echo preyantechnosys_site_logo(); ?>
						</div><!-- .site-branding -->
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<?php preyantechnosys_toplogo_header_rightcontent(); ?>		
				</div>
			</div>	
		</div><!-- .tm-header-top-wrapper -->

		<div id="prt-stickable-header-w" class="prt-stickable-header-w prt-bgcolor-<?php echo preyantechnosys_get_option('header_bg_color'); ?>" style="height:<?php echo preyantechnosys_header_menuarea_height(); ?>px">
			<div id="site-header-menu" class="site-header-menu">
				<div class="site-header-menu-inner <?php echo sanitize_html_class(preyantechnosys_sticky_header_class()); ?>">
					<div class="<?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_container_class()); ?> ">
						<div class="site-header-menu-middle">
							<div>
								<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(preyantechnosys_get_option('header_height_sticky')); ?>">		                        
									<?php get_template_part('template-parts/header/header','menu'); ?>
									<div class="kw-phone">
										<?php echo preyantechnosys_wp_kses( preyantechnosys_header_links(), 'header_links' ); ?>
										
									</div>

									
								</nav><!-- .main-navigation -->
								<?php preyantechnosys_header_text(); ?>
							</div>
						</div>
				</div>				
			</div><!-- .site-header-menu -->
		</div>		
		<?php preyantechnosys_one_page_site_js(); ?>	
		</div>		
	</div><!-- .site-header-main -->
</div>

