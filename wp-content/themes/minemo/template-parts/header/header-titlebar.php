<?php
global $minemo_theme_options;
$breadcrumb_border_bottom = preyantechnosys_get_option('breadcrumb_border_bottom');

$titlebar_content = preyantechnosys_titlebar_content();
if( preyantechnosys_titlebar_show() ) : ?>


	<?php if( !empty($titlebar_content) ){ ?>
	
		<div class="prt-titlebar-wrapper prt-bg <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_titlebar_classes()); ?>">
			<div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
			<div class="prt-titlebar entry-header">
				<div class="prt-titlebar-inner-wrapper">
					<div class="prt-titlebar-main">
						<div class="container">
							<div class="prt-titlebar-main-inner">
								<?php echo preyantechnosys_wp_kses( $titlebar_content, 'titlebar' ); ?>
							</div>
						</div>
					</div><!-- .prt-titlebar-main -->
				</div><!-- .prt-titlebar-inner-wrapper -->
			</div><!-- .prt-titlebar -->
		</div><!-- .prt-titlebar-wrapper -->
		
	<?php } else { ?>
	
		<hr class="prt-titlebar-border" />
	
	<?php } ?>

<?php endif;  // preyantechnosys_titlebar_show() ?>

<?php
$titlebar_content = preyantechnosys_titlebar_content();
if( preyantechnosys_titlebar_icon_show() ) : ?>
<?php if( !empty($titlebar_content) && $breadcrumb_border_bottom != '1' ){ ?>
<div class="prt-icon-content">
	<div class="container">
	<a class="skip-content-link" href="#content"> <i class="prt-minemo-icon-down"></i> </a>
	</div>
</div>

<?php }  ?>
					

<?php endif;  // preyantechnosys_titlebar_show() ?>







