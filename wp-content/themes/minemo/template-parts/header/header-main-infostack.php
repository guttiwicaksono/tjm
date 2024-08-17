	
<div id="site-header" class="site-header <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_class()); ?>">
	<div class="site-header-main prt-wrap">
		<div class="<?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_container_class()); ?> ">
			<div class="site-branding">
					<?php echo preyantechnosys_site_logo(); ?>
			</div><!-- .site-branding -->
			<div class="prt-sboxtop-info-con">
				<?php preyantechnosys_infostack_header_content(); ?>	
								
			</div>
			<div class="prt-sboxtop-info-con1">
				<?php echo preyantechnosys_wp_kses( do_shortcode( preyantechnosys_get_option('infostack_phone_text1') ) ); ?>	
								
			</div>
		</div>
		
		<div id="prt-stickable-wrapper" class="prt-stickable-wrapper prt-bgcolor-<?php echo preyantechnosys_get_option('header_bg_color'); ?> " style="height:<?php echo preyantechnosys_header_menuarea_height(); ?>px">		
		   
			<div id="site-header-menu" class="site-header-menu">
				<div class="site-header-menu-inner <?php echo sanitize_html_class(preyantechnosys_sticky_header_class()); ?> <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_menu_class()); ?>">
					<div class="<?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_container_class()); ?> ">
						<div class="site-header-menu-middle">
							
							
								<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(preyantechnosys_get_option('header_height_sticky')); ?>">		                        
									<?php get_template_part('template-parts/header/header','menu'); ?>
									<div class="kw-phone">
										<?php echo preyantechnosys_wp_kses( preyantechnosys_header_links(), 'header_links' ); ?>
										<div class="prt-custombutton">
											<?php echo preyantechnosys_wp_kses( do_shortcode( preyantechnosys_get_option('infostack_phone_text') ) ); ?>
										</div>
									</div>
									
								</nav><!-- .main-navigation -->
								
						
						</div>	
				</div>				
			</div><!-- .site-header-menu -->
		</div>	
	
		<?php preyantechnosys_one_page_site_js(); ?>	
		</div>		
	</div><!-- .site-header-main -->

	</div>