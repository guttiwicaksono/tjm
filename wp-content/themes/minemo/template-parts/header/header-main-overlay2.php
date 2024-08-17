<div id="prt-stickable-header-w" class="prt-stickable-header-w prt-bgcolor-<?php echo preyantechnosys_get_option('header_bg_color'); ?>" style="height:<?php echo preyantechnosys_get_option('header_height'); ?>px">
	<?php get_template_part('template-parts/header/header','topbar'); ?>
	<div id="site-header" class="site-header <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_class()); ?> <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_sticky_header_class()); ?>">
		
		<div class="site-header-main prt-wrap <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_header_container_class()); ?>">
		<div class="site-header-main-inner">
			<div class="site-branding prt-wrap-cell">
				<?php echo preyantechnosys_wp_kses( preyantechnosys_site_logo() ); ?>
			</div><!-- .site-branding -->

			<div id="site-header-menu" class="site-header-menu prt-wrap-cell">
				<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(preyantechnosys_get_option('header_height_sticky')); ?>">
					<?php preyantechnosys_header_text(); ?>
					
					<?php echo preyantechnosys_wp_kses( preyantechnosys_header_links(), 'header_links' ); ?>
					<?php get_template_part('template-parts/header/header','menu'); ?>
					
				</nav><!-- .main-navigation -->
			</div><!-- .site-header-menu -->
			
			<?php preyantechnosys_one_page_site_js(); ?>
			
		</div><!-- .site-header-main -->
		</div><!-- .site-header-main -->
	</div>
	<?php if( preyantechnosys_slidersociallinks_show() ) : ?>
		<div class="prt-slider-div"><?php echo preyantechnosys_wp_kses( do_shortcode('[prt-social-links tooltip="no"]') ); ?></div>
	<?php endif; ?>
</div>


