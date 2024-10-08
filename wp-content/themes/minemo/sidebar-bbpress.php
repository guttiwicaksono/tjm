<?php
/**
 * The sidebar for BBPress
 *
 */

global $minemo_theme_options;

$bbpressSidebar = isset($minemo_theme_options['sidebar_bbpress']) ? esc_attr($minemo_theme_options['sidebar_bbpress']) : 'right' ;

?>

<aside id="sidebar-<?php echo sanitize_html_class($bbpressSidebar); ?>" class="widget-area col-md-3 col-lg-3 col-sm-4 col-xs-12 sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-bbpress' ); ?>
</aside><!-- #sidebar-right -->
