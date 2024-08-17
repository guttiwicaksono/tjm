<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Minemo
 * @since Minemo 1.0
 */
global $minemo_theme_options;
?>

<div id="bottom-footer-text" class="bottom-footer-text prt-bottom-footer-text site-info <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_footer_row_class( 'bottom' )); ?>">
	<div class="bottom-footer-bg-layer prt-bg-layer"></div>
	<div class="<?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_footer_container_class()); ?>">
		<div class="bottom-footer-inner">
			<div class="row multi-columns-row">
<?php
$left_content=preyantechnosys_footer_copyright_right();
$right_content=$minemo_theme_options['footer_copyright_left'];
if(!empty($left_content)) { $left_col_class='col-sm-7'; } else { $left_col_class='col-sm-12'; }
if(!empty($right_content)) { $right_col_class='col-sm-5'; } else { $right_col_class='col-sm-12'; }
?>
				<div class="col-xs-12 <?php echo esc_attr($left_col_class); ?> <?php if(!empty($right_content)) { ?>prt-footer2-left <?php } ?>">
					<?php
					if( !empty($minemo_theme_options['footer_copyright_left']) ){
					echo do_shortcode( $minemo_theme_options['footer_copyright_left'] );
					}
					?>
				</div><!--.footer menu -->

				<div class="col-xs-12 <?php echo esc_attr($right_col_class); ?> <?php if(!empty($left_content)) { ?>prt-footer2-right <?php } ?>">
					<?php echo preyantechnosys_wp_kses( preyantechnosys_footer_copyright_right() ); ?>
				</div><!--.copyright --> 

			</div><!-- .row.multi-columns-row --> 
		</div><!-- .bottom-footer-inner --> 
	</div><!--  --> 
</div><!-- .footer-text -->