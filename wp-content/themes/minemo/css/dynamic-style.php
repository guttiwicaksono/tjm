<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Getting skin color */
$skincolor = preyantechnosys_get_option('skincolor');

/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}

/* Dark BG color */
$secondarycolor = preyantechnosys_get_option('secondarycolor');

/* Grey BG color */
$secondarygreycolor = preyantechnosys_get_option('secondary-greycolor');

/* Blackish Button Color */
$blackish_buttoncolor = preyantechnosys_get_option('blackish_buttoncolor');

/*
 *  Setting variables for different Theme Options
 */
$header_height        = preyantechnosys_get_option('header_height');
$first_menu_margin    = preyantechnosys_get_option('first_menu_margin');
$titlebar_height      = preyantechnosys_get_option('titlebar_height');
$header_height_sticky = preyantechnosys_get_option('header_height_sticky');
$center_logo_width    = preyantechnosys_get_option('center_logo_width');

$header_bg_color                   = preyantechnosys_get_option('header_bg_color');
$responsive_header_bg_custom_color = preyantechnosys_get_option('responsive_header_bg_custom_color');
$header_bg_custom_color            = preyantechnosys_get_option('header_bg_custom_color');
$sticky_header_bg_color            = preyantechnosys_get_option('sticky_header_bg_color');
$sticky_header_bg_custom_color     = preyantechnosys_get_option('sticky_header_bg_custom_color');
$sticky_header_bg_color            = ( empty($sticky_header_bg_color) ) ? $header_bg_color : $sticky_header_bg_color ;
$sticky_header_bg_custom_color     = ( empty($sticky_header_bg_custom_color) ) ? $header_bg_custom_color : $sticky_header_bg_custom_color ;

$sticky_header_menu_bg_color        = preyantechnosys_get_option('sticky_header_menu_bg_color');
$sticky_header_menu_bg_custom_color = preyantechnosys_get_option('sticky_header_menu_bg_custom_color');

$general_font = preyantechnosys_get_option('general_font');


$titlebar_bg_color          = preyantechnosys_get_option('titlebar_bg_color');
$titlebar_bg_custom_color   = preyantechnosys_get_option('titlebar_bg_custom_color');
$titlebar_text_color        = preyantechnosys_get_option('titlebar_text_color');
$titlebar_text_custom_color = preyantechnosys_get_option('titlebar_heading_font', 'color');
$titlebar_subheading_text_custom_color = preyantechnosys_get_option('titlebar_subheading_font', 'color');
$titlebar_breadcrumb_text_custom_color = preyantechnosys_get_option('titlebar_breadcrumb_font', 'color');
$breadcum_bg_color    = preyantechnosys_get_option('breadcum_bg_color');
$breadcum_bg_custom_color    = preyantechnosys_get_option('breadcrumb_bg_custom_color');

$topbar_text_color        = preyantechnosys_get_option('topbar_text_color');
$topbar_text_custom_color = preyantechnosys_get_option('topbar_text_custom_color');
$topbar_bg_color          = preyantechnosys_get_option('topbar_bg_color');
$topbar_bg_custom_color   = preyantechnosys_get_option('topbar_bg_custom_color');
$topbar_text_fontsize		= preyantechnosys_get_option('topbar_text_fontsize');
$topbar_breakpoint        = preyantechnosys_get_option('topbar-breakpoint');
$topbar_breakpoint_custom = preyantechnosys_get_option('topbar-breakpoint-custom');
$titlebar_heading_font  = preyantechnosys_get_option('titlebar_heading_font', 'font-size');

$mainmenufont            = preyantechnosys_get_option('mainmenufont');
$mainMenuFontColor       = $mainmenufont['color'];
$mainMenuFontsize       = $mainmenufont['font-size'];
$stickymainmenufontcolor = preyantechnosys_get_option('stickymainmenufontcolor');
$stickymainmenufontcolor = ( empty($stickymainmenufontcolor) ) ? $mainmenufont['color'] : $stickymainmenufontcolor ;

$dropdownmenufont = preyantechnosys_get_option('dropdownmenufont');

$mainmenu_active_link_color        = preyantechnosys_get_option('mainmenu_active_link_color');
$mainmenu_active_link_custom_color = preyantechnosys_get_option('mainmenu_active_link_custom_color');
$dropmenu_active_link_color        = preyantechnosys_get_option('dropmenu_active_link_color');
$dropmenu_active_link_custom_color = preyantechnosys_get_option('dropmenu_active_link_custom_color');

$dropmenu_background = preyantechnosys_get_option('dropmenu_background');
$dropmenu_background_responsive = preyantechnosys_get_option('dropmenu_background_responsive');
$dropmenu_text_responsive_color = preyantechnosys_get_option('dropmenu_text_responsive_color');

$logoMaxHeight       = preyantechnosys_get_option('logo_max_height');
$logoMobMaxHeight       = preyantechnosys_get_option('logo_mob_max_height');
$logoMaxHeightSticky = preyantechnosys_get_option('logo_max_height_sticky');

$inner_background = preyantechnosys_get_option('inner_background');

$headerbg_color       = preyantechnosys_get_option('header_bg_color');
$headerbg_customcolor = preyantechnosys_get_option('header_bg_custom_color');

$header_menu_bg_color        = preyantechnosys_get_option('header_menu_bg_color');
$header_menu_bg_custom_color = preyantechnosys_get_option('header_menu_bg_custom_color');


$menu_breakpoint        = preyantechnosys_get_option('menu_breakpoint');
$menu_breakpoint_custom = preyantechnosys_get_option('menu_breakpoint-custom');

$breakpoint = $menu_breakpoint;
$breakpoint = ( $menu_breakpoint=='custom' && !empty($menu_breakpoint_custom) ) ? $menu_breakpoint_custom : $breakpoint ;

$logo_font = preyantechnosys_get_option('logo_font');

$loaderimg          = preyantechnosys_get_option('loaderimg');
$loaderimage_custom = preyantechnosys_get_option('loaderimage_custom');

$fbar_breakpoint        = preyantechnosys_get_option('floatingbar-breakpoint');
$fbar_breakpoint_custom = preyantechnosys_get_option('floatingbar-breakpoint-custom');

$logo_box_bgcolor          = preyantechnosys_get_option('logo_box_bgcolor');

$floating_text_height       = preyantechnosys_get_option('header_floating_area_height');
$footer_cta_bg_color    = preyantechnosys_get_option('footer_cta_bg_color');
$footer_cta_bg_custom_color   = preyantechnosys_get_option('footer_cta_bg_custom_color');

$button_topbottom_padding	= preyantechnosys_get_option('button_topbottom_padding');
$medium_button_fontsize		= preyantechnosys_get_option('medium_button_fontsize');

/* Gradient Color */
$show_gradientcolor = preyantechnosys_get_option('gradient_color_show');
$first_gradientcolor = preyantechnosys_get_option('gradient_color_one');
$second_gradientcolor = preyantechnosys_get_option('gradient_color_two');


$subheading_font     	= preyantechnosys_get_option('subheading_font');
$subheading_fontColor   = $subheading_font['color'];

$special_element_font  = preyantechnosys_get_option('element_title');
$special_element_fontfamily   = $special_element_font['family'];
$special_element_fontweight   = $special_element_font['variant'];

$widget_font_font  = preyantechnosys_get_option('widget_font');
$widget_font_fontweight   = $widget_font_font['variant'];
$heading_font = preyantechnosys_get_option('heading_font');
$skincolor_button_textcolor = preyantechnosys_get_option('skincolor_button_textcolor');
if( $special_element_fontweight == 'regular' ){
	$special_element_fontweight  = '400';
}
if( $widget_font_fontweight == 'regular' ){
	$widget_font_fontweight  = '400';
}
$button_font = preyantechnosys_get_option('button_font');
$button_shape = preyantechnosys_get_option('button_shape');
if( $button_shape =='round'){
	$global_button_shape = '2em';
}
else if($button_shape =='rounded') {
	$global_button_shape = '10px';
}
else {
	$global_button_shape = '0px';
}
$h3_heading_font = preyantechnosys_get_option('h3_heading_font');
$h3_heading_fontsize   = $h3_heading_font['font-size'];
$h3_heading_line_height   = $h3_heading_font['line-height'];
$h4_heading_font = preyantechnosys_get_option('h4_heading_font');
$h4_heading_fontsize   = $h4_heading_font['font-size'];
$h4_heading_line_height   = $h4_heading_font['line-height'];

/* Output start
------------------------------------------------------------------------------*/ ?>

<?php
/* Custom CSS Code at top */
$custom_css_code_top = preyantechnosys_get_option('custom_css_code_top');
if( !empty($custom_css_code_top) ){
	echo do_shortcode($custom_css_code_top);
}
if( function_exists('preyantechnosys_minemo_cs_framework_init') && ($heading_font['family'] == 'Cerebri Sans')){
	echo '@import "'.get_template_directory_uri() .'/fonts/CerebriSans.css";';
}
?>

/*------------------------------------------------------------------
* dynamic-style.php index *
[Table of contents]

1.  Background color
2.  Topbar Background color
3.  Element Border color
4.  Textcolor
5.  Boxshadow
6.  Header / Footer background color
7.  Footer background color
8.  Logo Color
9.  Genral Elements
10. "Center Logo Between Menu" options
11. Floating Bar
-------------------------------------------------------------------*/
:root {
	--prt-whitecolor: #ffffff;
	--prt-bordercolor: #e3e3e3;
	--prt-skincolor:<?php echo esc_attr($skincolor); ?>;
	--prt-secondarycolor:<?php echo esc_attr($secondarycolor); ?>;
	--prt-greycolor:<?php echo esc_attr($secondarygreycolor); ?>;
	--body-fonts-color:<?php echo esc_attr($general_font['color']); ?>;
	--body-font-family:<?php echo esc_attr($general_font['family']); ?>;
	--body-line-height:<?php echo esc_attr($general_font['line-height']); ?>px;
	--body-font-size:<?php echo esc_attr($general_font['font-size']); ?>px;
	--special-element-fontfamily:<?php echo esc_attr($special_element_font['family']); ?>;
	--special-element-fontweight:<?php echo esc_attr($special_element_font['variant']); ?>;
	--prt-button-shape:<?php echo esc_attr($global_button_shape); ?>;
	--button-text-transform: <?php echo esc_attr($button_font['text-transform']); ?>;
	--button-font-weight: <?php echo esc_attr($button_font['variant']); ?>;
	--button-font-family: <?php echo esc_attr($button_font['family']); ?>;
	--button_fontsize: <?php echo esc_attr($medium_button_fontsize); ?>px;
	--button-topbottom-padding: <?php echo esc_attr($button_topbottom_padding); ?>px;
	--mainmenu_fontsize: <?php echo esc_attr($mainmenufont['font-size']); ?>px;
	--mainmenu-text-transform: <?php echo esc_attr($mainmenufont['text-transform']); ?>;
	--topbar-fontsize: <?php echo esc_attr($topbar_text_fontsize); ?>px;
	--h3-fontsize: <?php echo esc_attr($h3_heading_fontsize); ?>px;
	--h3-font-line-height: <?php echo esc_attr($h3_heading_line_height); ?>px;
	--h4-fontsize: <?php echo esc_attr($h4_heading_fontsize); ?>px;
	--h4-font-line-height: <?php echo esc_attr($h4_heading_line_height); ?>px;
}


/**
 * 0. Background properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(preyantechnosys_get_all_background_css());
?>

/* Font properties */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(preyantechnosys_get_all_font_css());
?>
/* Text link and hover color properties */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(preyantechnosys_a_color());
?>
<?php
if( $header_bg_color=='custom' && !empty($header_bg_custom_color) ){
	?>
/* Header bg color */
	.site-header.prt-bgcolor-custom:not(.is_stuck),
	.prt-header-style-classic-box.prt-header-overlay .site-header.prt-bgcolor-custom:not(.is_stuck) .prt-container-for-header{
		background-color:<?php echo esc_attr($header_bg_custom_color); ?> !important;
	}
	<?php
}
?>
<?php
if( $sticky_header_bg_color=='custom' && !empty($sticky_header_bg_custom_color) ){
	?>
/* Sticky header bg color */
	.is_stuck.site-header.prt-sticky-bgcolor-custom{
		background-color:<?php echo esc_attr($sticky_header_bg_custom_color); ?> !important;
	}
	<?php
}
?>
<?php
if( $header_menu_bg_color=='custom' && !empty($header_menu_bg_custom_color) ){
	?>
/* header menu bg color  */
	.prt-header-menu-bg-color-custom {
		background-color:<?php echo esc_attr($header_menu_bg_custom_color); ?>;
	}
	<?php
}
?>
/* Sticky menu bg color */
<?php
if( $sticky_header_menu_bg_color=='custom' && !empty($sticky_header_menu_bg_custom_color) ){
	?>
	.is_stuck.prt-sticky-bgcolor-custom,
	.is_stuck .prt-sticky-bgcolor-custom {
		background-color:<?php echo esc_attr($sticky_header_menu_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/* breadcum bg color */
<?php
if( $breadcum_bg_color=='custom' && !empty($breadcum_bg_custom_color) ){
	?>
	
	.prt-titlebar-wrapper.prt-breadcrumb-on-bottom .prt-titlebar .breadcrumb-wrapper .container
	 {
		background-color:<?php echo esc_attr($breadcum_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/* Footer CTA bg color */
<?php
if( $footer_cta_bg_color=='custom' && !empty($footer_cta_bg_custom_color) ){
	?>
	.site-footer .prt-footer-cta-wrapper.prt-bgcolor-custom{
		background-color:<?php echo esc_attr($footer_cta_bg_custom_color); ?>;
	}
	<?php
}
?>

<?php if($skincolor_button_textcolor == 'dark'){ ?>

.prt-btn-style-style2.prt-btn-color-white .elementor-button:hover,
.prt-btn-color-white .elementor-button:hover,
.widget.inoterior_all_post_list_widget li a:hover, .widget.inoterior_category_list_widget li a:hover, .widget.inoterior_all_post_list_widget li.prt-post-active a, .widget.inoterior_category_list_widget li.current-cat a,
.prt-sortable-list .prt-sortable-link a:hover, .prt-sortable-list .prt-sortable-link a.selected, .themetechmount-pagination .page-numbers.current, .themetechmount-pagination .page-numbers:hover,.themetechmount-portfoliobox-style1 .prt-post-iconbox a,
#totop,.post.themetechmount-box-blog-classic .prt-box-post-icon,.themetechmount-box-blog.themetechmount-blogbox-stylethree:hover .prt-box-post-date,.themetechmount-box-blog.themetechmount-blogbox-styleeight .prt-box-post-date,
.preyantechnosys-boxes-view-carousel .preyantechnosys-boxes-row-wrapper .slick-arrow:hover:before,
#totop, .single-tm_portfolio .prt-social-share-links ul li a i,
.preyantechnosys-portfoliobox-style2 .prt-icon i, .preyantechnosys-iconbox-styleeight .prt-icon-type-text,.prt-ptablebox .prt-ptablebox-featured-col .prt-ptable-btn a, .prt-ptablebox .prt-ptable-btn a:hover, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image > a:after {
    color: <?php echo esc_attr($blackish_buttoncolor); ?>;	
}
<?php } ?>

/* List style special style */
.wpb_row .vc_tta.vc_general.vc_tta-color-white:not(.vc_tta-o-no-fill) .vc_tta-panel-body .wpb_text_column, 
.prt-list.prt-list-icon-color- li,
.prt-list-li-content{
	color:<?php echo esc_attr($general_font['color']); ?>;
}
/* Page loader css */
<?php echo preyantechnosys_get_page_loader_css(); ?>

/* Floating bar */
<?php echo preyantechnosys_floatingbar_inline_css(); ?>

/**
 * 1. Background color
 * ----------------------------------------------------------------------------
 */ 
 
.elementor-column.elementor-top-column.prt-col-bgcolor-skincolor:not(.prt-bgimage-yes) .elementor-widget-wrap>.prt-stretched-div, .elementor-column.elementor-top-column.prt-col-bgcolor-skincolor:not(.prt-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.prt-col-bgcolor-skincolor:not(.prt-bgimage-yes)>.elementor-widget-wrap
{
	background-color: <?php echo esc_attr($skincolor); ?> !important;
}
.elementor-column.elementor-top-column.prt-col-bgcolor-skincolor.prt-bgimage-yes .elementor-widget-wrap .prt-stretched-div:before {
    background-color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?>,0.70)!important;
}

.elementor-section.elementor-top-section.prt-bgcolor-skincolor,
.elementor-section.elementor-top-section.prt-bgcolor-skincolor:before,
 .elementor-section.elementor-inner-section.prt-bgcolor-skincolor,
.prt-bgcolor-skincolor, 
.prt-btn-style-flat.prt-btn-color-skincolor .elementor-button,
.prt-btn-style-flat.prt-btn-color-darkgrey .elementor-button:hover,
.elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar,
.prt-accor-btn{
   background-color: <?php echo esc_attr($skincolor); ?>;
}
.prt-post-featured-quote:after { 
	background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?>,0.80);
}
.prt-custom-img:before {
	background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?>,0.60);
}
/*Heading Seperator Style*/
.prt-header-overlay .social-icons li > a:hover,
.elementor-widget-tabs.prt-tab-style1 .elementor-tab-desktop-title.elementor-active,
.preyantechnosys-testimonialbox-styleone:hover .preyantechnosys-box-content:before,
.preyantechnosys-testimonialbox-styleone:hover .preyantechnosys-box-content:after,
article.preyantechnosys-box-blog-classic .prt-entry-meta-wrapper:before,
.post.preyantechnosys-box-blog-classic .prt-blogbox-classic-date .prt-post-date,
.slick-dots li.slick-active button,
.widget.minemo_category_list_widget li.current-cat a:after,
.widget.minemo_category_list_widget li a:hover:after, 
.widget.minemo_all_post_list_widget li.prt-post-active a:after,
.widget.minemo_all_post_list_widget li a:hover:after, 
.widget.tm_widget_nav_menu li.current_page_item a:after,
.widget.tm_widget_nav_menu li a:hover:after,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:after,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover:after,
#totop,
.prt-site-searchform button,
.preyantechnosys-box-blog.preyantechnosys-blogbox-stylethree:hover .prt-box-post-date,
.sidebar .widget .tagcloud a:hover,

.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:hover:after,
.main-holder .site-content ul.products li.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:hover:after,
.main-holder .site-content ul.products li.product .prt-shop-icon>div:hover,

.top-contact.prt-highlight-left:after,
.top-contact.prt-highlight-right:after,
.prt-social-share-links ul li a:hover,

.preyantechnosys-blog-box-view-right-image .preyantechnosys-box-content .prt-post-categories>.prt-meta-line.cat-links a:hover,
.preyantechnosys-blog-box-view-left-image .preyantechnosys-box-content .prt-post-categories>.prt-meta-line.cat-links a:hover,
.prt-sortable-list .prt-sortable-link a:hover,

footer#colophon.prt-bgcolor-skincolor > .prt-bg-layer,
.prt-titlebar-wrapper.prt-bgcolor-skincolor .prt-titlebar-wrapper-bg-layer,
.preyantechnosys-box-blog .preyantechnosys-box-content .preyantechnosys-box-post-date:after,
article.preyantechnosys-box-blog-classic .preyantechnosys-post-date-wrapper,

body .datepicker table tr td span.active.active, 
body .datepicker table tr td.active.active,
.datepicker table tr td.active.active:hover, 
.datepicker table tr td span.active.active:hover,

.widget .widget-title::before,

.datepicker table tr td.day:hover, 
.datepicker table tr td.day.focused,

/* Testimonals */
.testimonials-nav .testimonial_item .preyantechnosys-box-img:hover .preyantechnosys-item-thumbnail-inner:before,
.testimonials-nav .slick-center .testimonial_item .preyantechnosys-box-img .preyantechnosys-item-thumbnail-inner:before,

/*Iconbox element*/
.preyantechnosys-iconbox.preyantechnosys-iconbox-styletwo .prt-icon-type-text,
.prt-bg-skin .elementor-icon-box-wrapper .elementor-icon,

.preyantechnosys-servicebox-styleone .preyantechnosys-box-bottom-content:before,
.sidebar .widget-title:before {
	background-color: <?php echo esc_attr($skincolor); ?>;
}

 

/* secondary bg color */

.elementor-column.elementor-top-column.prt-col-bgcolor-darkgrey:not(.prt-bgimage-yes) .elementor-widget-wrap>.prt-stretched-div, .elementor-column.elementor-top-column.prt-col-bgcolor-darkgrey:not(.prt-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.prt-col-bgcolor-darkgrey:not(.prt-bgimage-yes)>.elementor-widget-wrap
{
	background-color: <?php echo esc_attr($secondarycolor); ?> !important;
}

.elementor-column.elementor-top-column.prt-col-bgcolor-darkgrey.prt-bgimage-yes .elementor-widget-wrap .prt-stretched-div:before {
    background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?>,0.70)!important;
}

.elementor-section.elementor-top-section.prt-bgcolor-darkgrey,
.elementor-section.elementor-top-section.prt-bgcolor-darkgrey:before,
.elementor-section.elementor-inner-section.prt-bgcolor-darkgreys,
.elementor-progress-wrapper {
   background-color: <?php echo esc_attr($secondarycolor); ?>;
}
.prt_coverimgbox_wrapper .prt-bottom-contentbox {
	background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?>,0.88);
 }
.preyantechnosys-slider-wrapper .prt-quickdetails-area,
.tprt-pricetable-column-w .tprt-featured-title,

.widget.prt-sidebar-custom-banner:before,
.preyantechnosys-box-blog.preyantechnosys-blogbox-stylethree .prt-box-post-date,
.site-header.prt-sticky-bgcolor-darkgrey.is_stuck,
.prt-header-overlay .site-header.prt-sticky-bgcolor-darkgrey.is_stuck,
.site-header-menu.prt-sticky-bgcolor-darkgrey.is_stuck,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-darkgrey .prt-titlebar .breadcrumb-wrapper .container,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-darkgrey  .breadcrumb-wrapper .container:before,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-darkgrey .breadcrumb-wrapper .container:after,
.prt-header-style-infostack .site-header .prt-stickable-header.is_stuck.prt-sticky-bgcolor-darkgrey,
.prt-header-style-infostack .site-header-menu .is_stuck .prt-sticky-bgcolor-darkgrey,
.prt-header-style-infostack .is_stuck.prt-sticky-bgcolor-darkgrey,
.prt-header-style-infostack .prt-bgcolor-darkgrey,
.preyantechnosys-topbar-wrapper.prt-bgcolor-darkgrey,
.prt-bg-highlight-dark,
.prt-col-bgcolor-darkgrey .prt-bg-layer-inner,
.prt-bgcolor-darkgrey,
.prt-bg.prt-bgcolor-darkgrey .prt-bg-layer,
.prt-col-bgcolor-darkgrey.prt-col-bgimage-yes .prt-bg-layer-inner,
.prt-bgcolor-darkgrey.prt-bg.prt-bgimage-yes > .prt-bg-layer-inner {
	background-color: <?php echo esc_attr($secondarycolor); ?>;
}

.prt-textcolor-darkgrey, .wpcf7 .prt-commonform .field-group i,
.preyantechnosys-iconbox.preyantechnosys-iconcolor-darkgrey .prt-box-icon i,
.preyantechnosys-iconbox.preyantechnosys-iconcolor-darkgrey .prt-icon-type-text,
.preyantechnosys-iconbox.prt-highlight-sliderbox .prt-box-icon i {
	color: <?php echo esc_attr($secondarycolor); ?>;
}
.preyantechnosys-box-portfolio .preyantechnosys-overlay {
	background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?>,0.70);
}
.preyantechnosys-portfoliobox-style1 .prt-featured-wrapper:before {
	background-image: -webkit-linear-gradient( 90deg,rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?>,.90)40%,rgba(0,0,0,0)60%);
}

/*** Button Dark Color ***/
button, 
input[type="submit"], 
input[type="button"], 
input[type="reset"],
.checkout_coupon input.button,
.woocommerce div.product form.cart .button:hover,
table.compare-list .add-to-cart td a:hover,
.woocommerce .widget_shopping_cart a.button:hover,
.woocommerce #review_form #respond .form-submit input:hover,
.main-holder .site table.cart .coupon input:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.woocommerce-cart #content table.cart td.actions input[type="submit"]:hover,
.woocommerce #payment #place_order:hover,
.woocommerce .wishlist_table td.product-add-to-cart a:hover,
.woocommerce-cart #content table.cart td.actions input[type="submit"],
#tribe-bar-form .tribe-bar-submit input[type=submit],
.wishlist_table tr td a.yith-wcqv-button:hover,
.woocommerce .wishlist_table td.product-add-to-cart a:hover,
.woocommerce .widget_shopping_cart a.button.checkout:hover,
.prt-sresults-title small .label-default[href]:hover,
.woocommerce .widget_price_filter .price_slider_amount .button,
.woocommerce .widget_shopping_cart a.button,
.woocommerce #payment #place_order,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.main-holder .site table.cart .coupon input,
.main-holder .site-content #review_form #respond .form-submit input,
.woocommerce div.product form.cart .button,
table.compare-list .add-to-cart td a,
.main-holder .site table.cart .coupon button,
.main-holder .site .woocommerce-cart-form__contents button,
.main-holder .site .return-to-shop a.button,
.main-holder .site .woocommerce-MyAccount-content a.woocommerce-Button,
.main-holder .site .woocommerce-form-coupon button,
.main-holder .site .woocommerce-form-login button.woocommerce-Button,
.main-holder .site .woocommerce-ResetPassword button.woocommerce-Button,
.main-holder .site .woocommerce-EditAccountForm button.woocommerce-Button,
.widget_subscribe_form input[type="submit"]:hover,
.woocommerce .woocommerce-form-login .woocommerce-form-login__submit,
.mailchimp-inputbox input[type="submit"]:hover {
	color: #fff;
    background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}

/***Secondary Grey color***/

.elementor-column.elementor-top-column.prt-col-bgcolor-grey:not(.prt-bgimage-yes) .elementor-widget-wrap>.prt-stretched-div, .elementor-column.elementor-top-column.prt-col-bgcolor-grey:not(.prt-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.prt-col-bgcolor-grey:not(.prt-bgimage-yes)>.elementor-widget-wrap
{
	background-color: <?php echo esc_attr($secondarygreycolor); ?> !important;
}

.elementor-column.elementor-top-column.prt-col-bgcolor-grey.prt-bgimage-yes .elementor-widget-wrap .prt-stretched-div:before {
    background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarygreycolor); ?>,0.70)!important;
}

.elementor-section.elementor-top-section.prt-bgcolor-grey,
.elementor-section.elementor-top-section.prt-bgcolor-grey:before,
.elementor-section.elementor-inner-section.prt-bgcolor-grey,
.woocommerce-error, .woocommerce-info, .woocommerce-message,
.prt-btn-style-flat.prt-btn-color-grey .elementor-button{
   background-color: <?php echo esc_attr($secondarygreycolor); ?>;
}


.preyantechnosys-testimonialbox-styleone .preyantechnosys-box-content:before,
.preyantechnosys-testimonialbox-styleone .preyantechnosys-box-content:after,
.preyantechnosys-blogbox-stylethree .prt-featured-outer-wrapper.prt-post-featured-outer-wrapper:after,

.preyantechnosys-teambox-style2 .preyantechnosys-box-content,
#add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment,
.woocommerce-account .woocommerce-MyAccount-navigation li a, 

.preyantechnosys-box-team ul.prt-team-social-links,
.preyantechnosys-iconbox.preyantechnosys-iconbox-styleone.preyantechnosys-iconbox-stylethree,
.author-info,
.preyantechnosys-fbar-position-right .preyantechnosys-fbar-btn a.grey,
.prt-col-bgcolor-grey .prt-bg-layer-inner,
.prt-bgcolor-grey,
.site-header.prt-sticky-bgcolor-grey.is_stuck,
.site-header-menu.prt-sticky-bgcolor-grey.is_stuck,
.prt-header-overlay .site-header.prt-sticky-bgcolor-grey.is_stuck,
.prt-header-style-infostack .site-header .prt-stickable-header.is_stuck.prt-sticky-bgcolor-grey,
.prt-header-style-infostack .site-header-menu .is_stuck .prt-sticky-bgcolor-grey,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-grey .prt-titlebar .breadcrumb-wrapper .container,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-grey  .breadcrumb-wrapper .container:before,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-grey .breadcrumb-wrapper .container:after,
.prt-col-bgcolor-grey > .prt-bg-layer-inner,
.prt-bg.prt-bgcolor-grey > .prt-bg-layer {
	background-color: <?php echo esc_attr($secondarygreycolor); ?>;
}

.comment-body:after, .comment-body:before {
	border-color: transparent <?php echo esc_attr($secondarygreycolor); ?> transparent <?php echo esc_attr($secondarygreycolor); ?>;
}

.preyantechnosys-iconbox.preyantechnosys-iconcolor-grey .prt-box-icon i,
.preyantechnosys-iconbox.preyantechnosys-iconcolor-grey .prt-icon-type-text{
	color: <?php echo esc_attr($secondarygreycolor); ?>;
}



/* Drop cap */
.prt-dcap-color-skincolor,

/* Slick Slider */


/* Sidebar */
.woocommerce-account .woocommerce-MyAccount-navigation li a:before,
.widget.tm_widget_nav_menu li a:before,
.widget.minemo_category_list_widget li a:before,

/* Global Input Button */
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,

/* Testimonials Section */
.preyantechnosys-box-view-default .preyantechnosys-box-author .preyantechnosys-box-img .preyantechnosys-icon-box,

.prt-header-overlay .site-header.prt-sticky-bgcolor-skincolor.is_stuck,
.site-header-menu.prt-sticky-bgcolor-skincolor.is_stuck,
.prt-header-style-infostack .site-header .prt-stickable-header.is_stuck.prt-sticky-bgcolor-skincolor,
.is_stuck.prt-sticky-bgcolor-skincolor,
.prt-header-style-infostack .site-header-menu .prt-stickable-header.is_stuck .prt-sticky-bgcolor-skincolor,

/* Blog section */
.preyantechnosys-box-view-overlay .preyantechnosys-boxes .preyantechnosys-box-content.preyantechnosys-overlay .preyantechnosys-icon-box a:hover,
.preyantechnosys-post-box-icon-wrapper,
.preyantechnosys-pagination .page-numbers.current, 
.preyantechnosys-pagination .page-numbers:hover,

/*Search Result Page*/
.prt-sresults-title small a,

/*Pricing Table*/
.main-holder .rpt_style_basic .rpt_recommended_plan .rpt_title,
.main-holder .rpt_4_plans.rpt_style_basic .rpt_plan.rpt_recommended_plan,


/* square social icon */

.preyantechnosys-teambox-style1 .prt-team-social-links-wrapper ul li a:hover,

/*blog top-bottom content */
.preyantechnosys-box-blog.preyantechnosys-box-blog-classic .preyantechnosys-post-date-wrapper,
.entry-content .page-links>span:not(.page-links-title),
.entry-content .page-links a:hover,
mark, 
ins{
	background-color: <?php echo esc_attr($skincolor); ?> ;
}


/* This is Titlebar Background color */
<?php if( $titlebar_bg_color=='custom' && !empty($titlebar_bg_custom_color['rgba']) ) : ?>
.prt-titlebar-wrapper .prt-titlebar-inner-wrapper{
	background-color: <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
.prt-titlebar-wrapper{
	background-color:  <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
<?php endif; ?>
.prt-header-overlay .prt-titlebar-wrapper .prt-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr( $header_height); ?>px;
}
.prt-header-style-classic-box.prt-header-overlay .prt-titlebar-wrapper .prt-titlebar-inner-wrapper{
	padding-top:0px;
}

/* This is Titlebar Text color */
<?php if( $titlebar_text_color=='custom' && !empty($titlebar_text_custom_color) ): ?>
.prt-titlebar-wrapper .prt-titlebar-main h1.entry-title{
	color: <?php echo esc_attr($titlebar_text_custom_color); ?> !important;
}
.prt-titlebar-wrapper .prt-titlebar-main h3.entry-subtitle{
	color: <?php echo esc_attr($titlebar_subheading_text_custom_color); ?> !important;
}
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom .prt-titlebar .breadcrumb-wrapper .container,
.prt-titlebar-main .breadcrumb-wrapper, .prt-titlebar-main .breadcrumb-wrapper a:hover{ /* Breadcrumb */
	color: rgba( <?php echo preyantechnosys_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
.prt-titlebar-main .breadcrumb-wrapper a{ /* Breadcrumb */
	color: rgba( <?php echo preyantechnosys_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
<?php endif; ?>

.prt-titlebar-wrapper .prt-titlebar-inner-wrapper{
	height: <?php echo esc_attr($titlebar_height); ?>px;	
}
.prt-header-overlay .preyantechnosys-titlebar-wrapper .prt-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr(($header_height+30)); ?>px;
}
.preyantechnosys-header-style-3.prt-header-overlay .prt-titlebar-wrapper .prt-titlebar-inner-wrapper{
	padding-top: <?php echo esc_attr(($header_height+55)) ?>px;
}

/* Logo Max-Height */
.headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeight); ?>px;
}
.is_stuck .headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeightSticky); ?>px;
}

/* Extra Code */
span.prt-sc-logo.prt-sc-logo-type-image {
    position: relative;
	display: block;
}
img.preyantechnosys-logo-img.stickylogo {
    position: absolute;
    top: 0;
    left: 0;
}
.prt-stickylogo-yes .standardlogo{
	opacity: 1;
}
.prt-stickylogo-yes .stickylogo{
	opacity: 0;
}
.is_stuck .prt-stickylogo-yes .standardlogo{
	opacity: 0;
}
.is_stuck .prt-stickylogo-yes .stickylogo{
	opacity: 1;
}

.elementor-element.elementor-widget-button .elementor-size-md.elementor-button{
    padding-top:<?php echo esc_attr($button_topbottom_padding); ?>px;
    padding-bottom:<?php echo esc_attr($button_topbottom_padding); ?>px;
}

a.prt-button-bold,
.preyantechnosys-iconbox-styleseven .preyantechnosys-serviceboxbox-readmore a,
.preyantechnosys-portfoliobox-style2 .prt-project-readmore-btn a,
.preyantechnosys-box-blog .preyantechnosys-blogbox-desc-footer a,
.elementor-element.elementor-widget-button .elementor-size-md.elementor-button,
button, input[type="submit"], input[type="button"], input[type="reset"], .checkout_coupon input.button, .woocommerce div.product form.cart .button, table.compare-list .add-to-cart td a, .woocommerce .widget_shopping_cart a.button, .woocommerce #review_form #respond .form-submit input, .main-holder .site table.cart .coupon input, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart #content table.cart td.actions input[type="submit"], .woocommerce #payment #place_order, .woocommerce .wishlist_table td.product-add-to-cart a,.main-holder .site .return-to-shop a.button,
.preyantechnosys-box-blog .preyantechnosys-blogbox-footer-readmore a,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.main-holder .site .woocommerce-cart-form__contents button,
.main-holder .site .woocommerce-cart-form__contents button.button:disabled[disabled],
.main-holder .site table.cart .coupon button,	
.single-tm_portfolio .navigation.post-navigation .nav-links  a,
.post.preyantechnosys-box-blog-classic .preyantechnosys-blogbox-footer-readmore a,
.preyantechnosys-box-service .preyantechnosys-serviceboxbox-readmore a{
	font-size:<?php echo esc_attr($medium_button_fontsize); ?>px;
	line-height:<?php echo esc_attr($medium_button_fontsize); ?>px;
}


/**
 * 2. Topbar Background color
 * ----------------------------------------------------------------------------
 */
<?php if( $topbar_text_color=='custom' && !empty($topbar_text_custom_color) ): ?>
	.site-header .preyantechnosys-topbar{
		color: rgba( <?php echo preyantechnosys_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.preyantechnosys-topbar-textcolor-custom .social-icons li a{
		border: 1px solid rgba( <?php echo preyantechnosys_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.site-header .preyantechnosys-topbar a{
		color: rgba( <?php echo preyantechnosys_hex2rgb($topbar_text_custom_color); ?> , 1);
	}
<?php endif; ?>

<?php if( $topbar_bg_color=='custom' && !empty($topbar_bg_custom_color) ) : ?>
	.site-header .preyantechnosys-topbar{
		background-color: <?php echo esc_attr($topbar_bg_custom_color); ?>;
	}
<?php endif; ?>

.top-contact {
	font-size:<?php echo esc_attr($topbar_text_fontsize); ?>px;
}
<?php

if( !empty($topbar_breakpoint) && trim($topbar_breakpoint)!='all' ){
	if( esc_attr($topbar_breakpoint)=='custom' ) {
		$topbar_breakpoint = ( !empty($topbar_breakpoint_custom) ) ?  trim($topbar_breakpoint_custom) : '1200' ;
	}

?>
	
/* Show/hide topbar in some devices */
	@media (max-width: <?php echo esc_attr($topbar_breakpoint); ?>px){
		.preyantechnosys-topbar-wrapper{
			display: none !important;
		}
	}

	<?php
}
?>


/**
 * 4. Border color
 * ----------------------------------------------------------------------------
 */

.tprt-call-box i,
.prt-slider-button.btn-skin,
#totop.top-visible:before, 
#totop.top-visible:after,
.social-icons li > a:hover,
.preyantechnosys-box-service.preyantechnosys-service-box-view-without-image .prt-service-iconbox,
.prt-link-underline a,
.prt-iconbox-style2 .prt-sbox .prt-vc_cta3-container,
.prt-iconbox-style2 .prt-sbox:hover .prt-vc_cta3-container:after,
.prt-border-skincolor .vc_column-inner,
.slick-dots li.slick-active button:before,


.main-holder .site #content table.cart td.actions .input-text:focus, 
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, input.input-text:focus, select:focus, 

/* testimonial */
.preyantechnosys-boxes-testimonial.preyantechnosys-boxes-view-slickview .preyantechnosys-testimonials-info .prt-box-img img,
.preyantechnosys-box-view-overlay .preyantechnosys-boxes .preyantechnosys-box-content.preyantechnosys-overlay .preyantechnosys-icon-box a:hover {
	border-color: <?php echo esc_attr($skincolor); ?>;
}
.preyantechnosys-box-blog-classic .prt-post-format-icon-wrapper,
.preyantechnosys-box-blog .prt-post-format-icon-wrapper{
	border-top-color: <?php echo esc_attr($skincolor); ?> ; 
}
.preyantechnosys-iconbox.preyantechnosys-iconbox-stylethree:before,
.post.preyantechnosys-box-blog-classic .prt-box-post-date,
.preyantechnosys-iconbox-stylefive .preyantechnosys-iconbox-inner:after,
.preyantechnosys-box-blog.preyantechnosys-blogbox-styleone .prt-box-post-date,
.prt-arrow-tab.elementor-widget-tabs .elementor-tab-desktop-title.elementor-active,
.prt-arrow-tab.elementor-widget-tabs .elementor-tab-desktop-title.elementor-active:after{
	border-bottom-color: <?php echo esc_attr($skincolor); ?> !important;
}
/**
 * 5. Textcolor
 * ----------------------------------------------------------------------------
 */

.tprt-header-button a,
.prt-fid.prt-fid-view-style5 strong, 
.prt-fid-view-style6.inside h4 span:nth-child(2),
.prt-ptablebox-features .prt-feature-lines li:before, 
.preyantechnosys-iconbox.prt-iconbg-grey .prt-iconstyle-rounded .prt-box-icon,
.preyantechnosys-iconbox.prt-iconbg-grey .prt-iconstyle-rounded .prt-box-icon i,
.preyantechnosys-portfoliobox-style2 .prt-project-readmore-btn a:hover,
.preyantechnosys-stepboxes-wrapper .prt-stepbox .prt-ptable-icon-wrapper,
.prt-sbox.prt-sbox.prt-iconbox-content-padding a,
.prt-link-underline a,
.prt-underline-skintext u,
.prt-fid-without-icon.inside.prt-fidbox-style2 h4 span,
.prt-fid-view-lefticon.prt-highlight-fid .prt-fld-contents .prt-fid-inner,
.twentytwenty-horizontal .twentytwenty-before-label,
.sidebar .widget a:hover,
.prt-textcolor-dark.prt-bgcolor-grey .prt-fbar-open-icon:hover,
.prt-textcolor-dark.prt-bgcolor-white .prt-fbar-open-icon:hover,

/*Iconbox element*/


.preyantechnosys-iconbox.preyantechnosys-iconcolor-skincolor .prt-icon-type-text,

/* Icon basic color */
.prt-icolor-skincolor,
.widget_calendar table td#today,

section.error-404 .prt-big-icon,

.prt-bgcolor-darkgrey ul.minemo_contact_widget_wrapper li a:hover,
.prt-bgcolor-skincolor .preyantechnosys-pagination .page-numbers.current, 
.prt-bgcolor-skincolor .preyantechnosys-pagination .page-numbers:hover,

.prt-bgcolor-darkgrey .preyantechnosys-twitterbox-inner .tweet-text a:hover,
.prt-bgcolor-darkgrey .preyantechnosys-twitterbox-inner .tweet-details a:hover,

.prt-dcap-txt-color-skincolor,

 /* Blog */

.comment-reply-link,
.single .prt-pf-single-content-area blockquote:before,
.single .prt-pf-single-content-wrapper blockquote:before,
article.preyantechnosys-blogbox-format-link .prt-format-link-title a:hover, 
article.post.format-link .prt-format-link-title a:hover,
.preyantechnosys-box-blog .preyantechnosys-blogbox-desc-footer a,
article.post .entry-title a:hover,
.preyantechnosys-meta-details a:hover,


 /* Team Member meta details */ 

.prt-extra-details-list .prt-team-extra-list-title,
.prt-team-member-single-meta-value a:hover,
.prt-team-member-single-category a:hover,
.prt-team-details-list .prt-team-list-value a:hover,

 
/* Testimonials Section */
.prt-bgcolor-skincolor .preyantechnosys-box-view-default .preyantechnosys-box-author .preyantechnosys-box-img .preyantechnosys-icon-box, 
.testimonial_item .preyantechnosys-author-name a,
.preyantechnosys-box-testimonial.prt-testimonial-box-view-style3 .preyantechnosys-author-name,
.preyantechnosys-box-testimonial.prt-testimonial-box-view-style3 .preyantechnosys-author-name a,
.prt-minemo-icon-star-1.prt-active,
.prt-textcolor-white a:hover, 
.prt-textcolor-skincolor,
.prt-textcolor-skincolor a,
.preyantechnosys-box-title h4 a:hover,
.prt-textcolor-skincolor.prt-custom-heading,
.prt-element-content-heading strong,

.preyantechnosys-box-blog.preyantechnosys-box-topimage .preyantechnosys-box-title h4 a:hover,
.preyantechnosys-box-blog-classic .entry-header .prt-meta-line a:hover,
.preyantechnosys-blog-box-view-left-image .preyantechnosys-box-content .prt-post-categories>.prt-meta-line.cat-links a,

ul.minemo_contact_widget_wrapper.call-email-footer li:before,

/*Tweets*/
.widget_latest_tweets_widget p.tweet-text:before,

/*search result page*/
.prt-sresults-first-row .prt-list-li-content a:hover,
.prt-results-post ul.prt-recent-post-list > li > a:hover,
.prt-results-page .prt-list-li-content a:hover,
.prt-sresults-first-row ul.prt-recent-post-list > li > a:hover,

.prt-team-list-title i,
.prt-bgcolor-darkgrey .preyantechnosys-box-view-left-image .preyantechnosys-box-title a:hover,
.prt-team-member-view-wide-image .prt-team-details-list .prt-team-list-title,
.prt-bgcolor-skincolor .preyantechnosys-box-team .preyantechnosys-box-content h4 a:hover,
.prt-col-bgcolor-skincolor .preyantechnosys-box-team .preyantechnosys-box-content h4 a:hover,

/*woocommerce*/
.woocommerce-info:before,
.woocommerce-message:before,
.main-holder .site-content ul.products li.product .price,
.main-holder .site-content ul.products li.product .price ins,
.single .main-holder #content div.product .price ins,
.woocommerce .price .woocommerce-Price-amount,
.main-holder .site-content ul.products li.product h3:hover,
.main-holder .site-content ul.products li.product .woocommerce-loop-category__title:hover,
.main-holder .site-content ul.products li.product .woocommerce-loop-product__title:hover,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:hover:after,
.main-holder .site-content ul.products li.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:after,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"],
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:after,


/* Special Section */


.preyantechnosys-servicebox-styleone .preyantechnosys-serviceboxbox-readmore a:hover,
.preyantechnosys-servicebox-styleone .preyantechnosys-serviceboxbox-readmore a:hover:before,
.preyantechnosys-pf-detailbox-list .prt-pf-details-date i,
.content-area .social-icons li > a{
	color: <?php echo esc_attr($skincolor); ?>;
}


/*** Defaultmenu ***/     
/*Wordpress Main Menu*/      

/* Menu hover and select section */ 

.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover i,
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > i, 
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > i,     
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > i,  

.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,    
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,     
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a,             

/*Wordpress Dropdown Menu*/
.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,    
.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a,    
     
/*Mega Main Menu*/      
.prt-mmenu-active-color-skin .site-header.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,  
.prt-mmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.prt-mmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,      
.prt-mmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.prt-mmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,           

/*Mega Dropdown Menu*/  
.prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
.prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a,      
.prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,  
.prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current_page_item > a{
    color: <?php echo esc_attr($skincolor); ?> !important;
}
    

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
        /* Main Menu Active Link Color --------------------------------*/                
        .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
        .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
        .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
        .prt-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
        
        .prt-mmenu-active-color-custom  .prt-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .prt-mmenu-active-color-custom  .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
        .prt-mmenu-active-color-custom  .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
            color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
        }
    <?php } ?>

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
            
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
    <?php } ?>


/* Dynamic main menu color applying to responsive menu link text */
.header-controls .search_box i.tmicon-fa-search,
.righticon i,
.menu-toggle i,
.header-controls a{
    color: rgba( <?php echo esc_attr( preyantechnosys_hex2rgb($mainMenuFontColor) ); ?> , 1) ;
}
.menu-toggle i:hover,
.header-controls a:hover {
    color: <?php echo esc_attr($skincolor); ?> !important;
}

<?php if( !empty($dropdownmenufont['color']) ) : ?>
	.prt-mmmenu-override-yes  #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div{
		color: rgba( <?php echo preyantechnosys_hex2rgb($dropdownmenufont['color']); ?> , 0.8);
		font-weight: normal;
	}
<?php endif; ?>
#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
	padding-top: 10px;
}

/*Logo Color --------------------------------*/ 
h1.site-title{
	color: <?php echo esc_attr($logo_font['color']); ?>;
}


/**
 * 9. Genral Elements
 * ----------------------------------------------------------------------------
 */

/* Site Pre-loader image */
<?php if( isset($loaderimage_custom['url']) && $loaderimage_custom['url']!='' ): ?>
.pageoverlay{
	background-image:url('<?php echo esc_attr($loaderimage_custom['url']); ?>');
}
<?php elseif( $loaderimg!='' ) : ?>
.pageoverlay{
	background-image:url('../images/loader<?php echo esc_attr($loaderimg); ?>.gif');
}
<?php endif; ?>


/**
 * 10. Heading Elements
 * ----------------------------------------------------------------------------
 */
.prt-textcolor-skincolor h1,
.prt-textcolor-skincolor h2,
.prt-textcolor-skincolor h3,
.prt-textcolor-skincolor h4,
.prt-textcolor-skincolor h5,
.prt-textcolor-skincolor h6,

.prt-textcolor-skincolor .prt-vc_cta3-content-header h2{
	color: <?php echo esc_attr($skincolor); ?> !important;
}
.prt-textcolor-skincolor .prt-vc_cta3-content-header h4{
	color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 0.90) !important;
}
.prt-textcolor-skincolor .prt-vc_cta3-content .prt-cta3-description{
	color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 0.60) !important;
}
.prt-slider-button.btn-skin,
.prt-textcolor-skincolor,
.prt-custom-heading.prt-textcolor-skincolor{
	color:<?php echo esc_attr($skincolor); ?>!important;
}
.prt-textcolor-skincolor a{
	color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 0.80);
}



/**
 * 10. Floating Bar
 * ----------------------------------------------------------------------------
 */
<?php

if( !empty($fbar_breakpoint) && trim($fbar_breakpoint)!='all' ){

	if( esc_attr($fbar_breakpoint)=='custom' ) {
		$fbar_breakpoint = ( !empty($fbar_breakpoint_custom) ) ?  trim($fbar_breakpoint_custom) : '1200' ;
	}

	?>
	
/* Show/hide topbar in some devices */
@media (max-width: <?php echo esc_attr($fbar_breakpoint); ?>px){
	.preyantechnosys-fbar-btn,
    .preyantechnosys-fbar-box-w{
		display: none !important;
	}
}

	<?php
}
?>

::-moz-selection {
    text-shadow: none;
    background: <?php echo esc_attr($skincolor); ?>;
    color: var(--prt-whitecolor);
}

::-moz-selection {
    text-shadow: none;
    background: <?php echo esc_attr($skincolor); ?>;
    color: var(--prt-whitecolor);
}

::selection {
    text-shadow: none;
    background: <?php echo esc_attr($skincolor); ?>;
    color: var(--prt-whitecolor);
}




/**
 * Extra section
 * ----------------------------------------------------------------------------
 */

.site-footer .preyantechnosys-iconbox-styletwo .preyantechnosys-iconbox-icon .prt-box-icon,
.single-product .main-holder .site-content span.onsale,
.main-holder .site-content ul.products li.product .onsale.product-label,
.woocommerce ul.products li.product .onsale, 
#yith-quick-view-content .onsale,
article.preyantechnosys-box-blog-classic.sticky:after,
.prt-textblock-underline:before, 
.prt-blog-cntbox .prt-lefticon-box,
.preyantechnosys-iconbox .prt-iconstyle-rounded .prt-box-icon,
.preyantechnosys-iconbox .prt-iconstyle-boxed .prt-box-icon,
.preyantechnosys-iconbox .prt-iconstyle-rounded-less .prt-box-icon,

.woocommerce.single-product div.summary .stock,
.preyantechnosys-box-portfolio .preyantechnosys-icon-box a,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover:before, .widget.tm_widget_nav_menu li a:hover:before, .widget.lawgrid_all_post_list_widget li a:hover:before, .widget.lawgrid_category_list_widget li a:hover:before, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:before, .widget.tm_widget_nav_menu li.current_page_item a:before, .widget.lawgrid_all_post_list_widget li.prt-post-active a:before, .widget.lawgrid_category_list_widget li.current-cat a:before,
 article.preyantechnosys-box-blog-classic .prt-post-featured-outer-wrapper .prt-postdate,
.content-area .social-icons li > a:hover,
.widget.woocommerce.widget_product_search input[type="submit"],
.widget.woocommerce.widget_product_search button,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
.tooltip:after, [data-tooltip]:after,
.single-tm_team_member .prt-team-member-single-title-wrapper .prt-team-social-links-wrapper ul li a:hover, 

.post.preyantechnosys-box-blog-classic .prt-box-post-icon,
.preyantechnosys-box-blog .prt-box-post-date,
.preyantechnosys-teambox-view-overlay .preyantechnosys-overlay a,
.preyantechnosys-box-team.preyantechnosys-box-view-topimage-bottomcontent .preyantechnosys-overlay a,
.preyantechnosys-fbar-position-right .preyantechnosys-fbar-btn a.skincolor,
.preyantechnosys-fbar-position-default .preyantechnosys-fbar-btn a.skincolor,
.preyantechnosys-portfolio-box-view-styleone:hover .preyantechnosys-box-link,
.preyantechnosys-box-blog .prt-box-post-date,
.prt-header-icons .prt-header-wc-cart-link span.number-cart,
.prt-col-bgcolor-darkgrey .social-icons li > a:hover,
.preyantechnosys-topbar-wrapper .preyantechnosys-fbar-btn,
.prt-skincolor-bg,
.prt-bgcolor-darkgrey .preyantechnosys-boxes-testimonial.preyantechnosys-boxes-col-one .preyantechnosys-box-view-default .preyantechnosys-box-desc:after,
.preyantechnosys-boxes-testimonial.preyantechnosys-boxes-col-one .preyantechnosys-box-view-default .preyantechnosys-box-desc:after,
.wpcf7 .prt-contactform input[type="radio"]:checked:before,
.prt-dropcap.prt-bgcolor-skincolor,
.preyantechnosys-twitterbox-inner i,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-skincolor .prt-titlebar .breadcrumb-wrapper .container,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-skincolor  .breadcrumb-wrapper .container:before,
.prt-titlebar-wrapper.prt-breadcrumb-on-bottom.prt-breadcrumb-bgcolor-skincolor .breadcrumb-wrapper .container:after {
	background-color: <?php echo esc_attr($skincolor); ?>; 
}

/*Woocommerce Section*/
.woocommerce .main-holder #content .woocommerce-error .button:hover, 
.woocommerce .main-holder #content .woocommerce-info .button:hover, 
.woocommerce .main-holder #content .woocommerce-message .button:hover,

.sidebar .widget .tagcloud a:hover,
.woocommerce .widget_shopping_cart a.button:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.main-holder .site table.cart .coupon button:hover,
.main-holder .site .woocommerce-cart-form__contents button:hover,
.woocommerce .woocommerce-form-login .woocommerce-form-login__submit:hover,
.main-holder .site .return-to-shop a.button:hover,
.main-holder .site .woocommerce-MyAccount-content a.woocommerce-Button:hover,
.main-holder .site-content #review_form #respond .form-submit input:hover,
.woocommerce div.product form.cart .button:hover,
table.compare-list .add-to-cart td a:hover,
.woocommerce-cart #content table.cart td.actions input[type="submit"]:hover,
.main-holder .site .woocommerce-form-coupon button:hover,
.main-holder .site .woocommerce-form-login button.woocommerce-Button:hover,
.main-holder .site .woocommerce-ResetPassword button.woocommerce-Button:hover,
.main-holder .site .woocommerce-EditAccountForm button.woocommerce-Button:hover,

.single .main-holder div.product .woocommerce-tabs ul.tabs li.active,
.main-holder .site table.cart .coupon input:hover,
.woocommerce #payment #place_order:hover,
.wishlist_table td.product-price ins,
.widget .product_list_widget ins,
.woocommerce .widget_shopping_cart a.button.checkout,
.woocommerce .wishlist_table td.product-add-to-cart a,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.main-holder .site-content nav.woocommerce-pagination ul li .page-numbers.current, 
.main-holder .site-content nav.woocommerce-pagination ul li a:hover {
	background-color: <?php echo esc_attr($skincolor); ?>; 
}

.prt-square-socialicon .preyantechnosys-social-links-wrapper a:hover,
.preyantechnosys-testimonialbox-styletwo .preyantechnosys-box-img:after,
.single .prt-pf-single-content-area blockquote,
.single .prt-pf-single-content-wrapper blockquote,
.single article.post blockquote,
.prt-header-icons .prt-header-icon  a:hover,
.widget .search-form .search-field:focus,
.prt-bgcolor-darkgrey .wpcf7 .prt-contactform .wpcf7-textarea:focus,
.wpcf7 .prt-commonform .wpcf7-text:focus,
.wpcf7 .prt-commonform textarea:focus {
	border-color:<?php echo esc_attr($secondarycolor); ?>;
}

.footer .social-icons li > a:hover{
	background-color: <?php echo esc_attr($skincolor); ?>; 
	border-color:<?php echo esc_attr($skincolor); ?>;
}

.comment-form .form-submit:hover:before,
.comment-form .form-submit:hover:after,
.content-area .social-icons li > a,
.preyantechnosys-boxes-testimonial .preyantechnosys-box.preyantechnosys-box-view-default .preyantechnosys-post-item .preyantechnosys-box-desc:after,
article.sticky ,
.preyantechnosys-box-team .preyantechnosys-box-social-links ul li a:hover,
.prt-header-style-infostack .header-widget .header-icon .icon,
.prt-pf-single-content-wrapper.prt-pf-view-top-image .preyantechnosys-pf-single-detail-box,
.widget .woocommerce-product-search .search-field:focus,
.widget .search-form .search-field:focus{
	border-color: <?php echo esc_attr($skincolor); ?>;	
}
.widget .widget-title{
	border-left-color: <?php echo esc_attr($skincolor); ?>;	
}
.preyantechnosys-fbar-position-right .preyantechnosys-fbar-btn a:after {
	border-right-color: <?php echo esc_attr($skincolor); ?>;	
}
.tooltip-top:before, .tooltip:before, [data-tooltip]:before,
.preyantechnosys-fbar-position-default .preyantechnosys-fbar-btn a:after {
	border-top-color: <?php echo esc_attr($skincolor); ?>;	
}
.prt-search-overlay .w-search-form-row:before {
	border-bottom-color: <?php echo esc_attr($skincolor); ?>;	
}
 
.prt-search-outer .prt-icon-close:before{
  background-color: <?php echo esc_attr($skincolor); ?> !important;
}

.prt-contactform-onepage .prt-contact-btns:hover .kw_minemo ,
.prt-contactform-onepage .elementor-button.elementor-size-md:hover,
.preyantechnosys-blogbox-stylefive .preyantechnosys-blogbox-footer-readmore a:hover,
.preyantechnosys-iconbox-styleseven .preyantechnosys-serviceboxbox-readmore a,

.mailchimp-inputbox button[type="submit"]:hover,
.prt-bgcolor-white .tprt-header-button a:hover,
.preyantechnosys-iconbox-stylesix .prt-iocnbox-btn a:hover,
.prt-textcolor-white .prt-titlebar-main .breadcrumb-wrapper a:hover,
.preyantechnosys-servicebox-stylefour .preyantechnosys-serviceboxbox-readmore.figcaption.fborder a:hover,
.preyantechnosys-iconbox .prt-iconstyle-rounded-less-outline .prt-box-icon i,
.preyantechnosys-iconbox .prt-iconstyle-boxed-outline .prt-box-icon i,
.preyantechnosys-iconbox .prt-iconstyle-rounded-outline .prt-box-icon i,
.preyantechnosys-box-portfolio:hover .preyantechnosys-icon-box a:hover,
.prt-header-icons .prt-header-wc-cart-link a:hover,

.prt-textcolor-white .preyantechnosys-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before,
.prt-bgcolor-skincolor .preyantechnosys-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before, 
.prt-bgcolor-darkgrey .preyantechnosys-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover,
.widget.tm_widget_nav_menu li a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a,
.widget.tm_widget_nav_menu li.current_page_item a:before,
.preyantechnosys-box-blog .preyantechnosys-blogbox-footer-readmore a,
h2.prt-custom-heading strong,
ul.minemo_contact_widget_wrapper li:before,
.prt-link-underline a,
a.prt-link-underline,
.prt-header-icon.prt-header-social-box a.prt-social-btn-link i:focus,
.prt-header-icon.prt-header-social-box a.prt-social-btn-link i:hover,

.preyantechnosys-boxes-testimonial .preyantechnosys-box.preyantechnosys-box-view-default .preyantechnosys-post-item .preyantechnosys-box-desc:after,
.woocommerce .summary .compare.button:hover,
.prt-fid-with-icon.prt-fid-view-topicon .prt-fid-icon-wrapper i,
.prt-titlebar-main .breadcrumb-wrapper span.current-item,
.prt-col-bgcolor-darkgrey .preyantechnosys-boxes-testimonial .preyantechnosys-box-view-default .preyantechnosys-author-name,
.preyantechnosys-content-team-search-box .search_field i,
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-menu-parent > a,
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,
.prt-header-style-infostack .header-widget .header-icon i,
.comment-meta a:hover{
	color: <?php echo esc_attr($skincolor); ?>;	
}

.prt-head-skin .prt-fid.inside h4,
.prt-icon-skin i,
.prt-skincolo-strong .prt-element-heading-wrapper .prt-custom-heading strong,
.site-footer .prt-skincolor,
.prt-custom-heading.prt-skincolo-strong strong,
.prt-skincolor,
.prt-skincolor-strong strong,
.prt-skincolor-bfont b,
span.prt-skincolor a {
	color: <?php echo esc_attr($skincolor); ?> !important;	 
}

.preyantechnosys-iconbox .prt-iconstyle-rounded-less-outline .prt-box-icon,
.preyantechnosys-iconbox .prt-iconstyle-boxed-outline .prt-box-icon,
.preyantechnosys-iconbox .prt-iconstyle-rounded-outline .prt-box-icon {
	color: <?php echo esc_attr($skincolor); ?>;	
	border-color: <?php echo esc_attr($skincolor); ?>;
}

.woocommerce-message,
.woocommerce-info,
.single .main-holder div.product .woocommerce-tabs ul.tabs li.active:before,
.prt-search-overlay {
    border-top-color: <?php echo esc_attr($skincolor); ?>;
}


/*Elementor Button*/

.prt-btn-style-text .elementor-button-link.elementor-button:hover,
.prt-btn-style-text.prt-btn-color-skincolor .elementor-button{
	color:<?php echo esc_attr($skincolor); ?>;
}
.comment-list a.comment-reply-link,
.prt-btn-style-text.prt-btn-color-skincolor .elementor-button:hover{
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.prt-btn-style-text.prt-btn-color-grey .elementor-button{
	color:<?php echo esc_attr($secondarygreycolor); ?>;
}

/** flat button **/
.prt-btn-style-flat.prt-btn-color-darkgrey .elementor-button,
.prt-btn-style-flat.prt-btn-color-skincolor .elementor-button:hover{
	background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.prt-btn-style-flat.prt-btn-color-grey .elementor-button,
.prt-btn-style-flat.prt-btn-color-white .elementor-button,
.prt-btn-style-text.prt-btn-color-darkgrey .elementor-button{
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.prt-btn-style-text.prt-icon-align-right .elementor-button .elementor-button-icon:after,
.prt-btn-style-flat.prt-btn-color-grey .elementor-button:hover,
.prt-btn-style-flat.prt-btn-color-white .elementor-button:hover{
	background-color:<?php echo esc_attr($skincolor); ?>;
}
.prt-btn-style-flat.prt-btn-color-skincolor.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:before,
.prt-btn-style-flat.prt-btn-color-skincolor.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:after,

.prt-btn-style-flat.prt-btn-color-darkgrey.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:before,
.prt-btn-style-flat.prt-btn-color-darkgrey.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:after,
.prt-contactform-onepage input[type="checkbox"]:checked:after,
.prt-btn-style-outline.prt-btn-color-skincolor.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:before,
.prt-btn-style-outline.prt-btn-color-skincolor.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:after{
	border-color:<?php echo esc_attr($skincolor); ?>;
}
.prt-btn-style-flat.prt-btn-color-darkgrey.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:before,
.prt-btn-style-flat.prt-btn-color-darkgrey.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:after,

.prt-btn-style-flat.prt-btn-color-skincolor.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:before,
.prt-btn-style-flat.prt-btn-color-skincolor.prt-btn-shape-square:not(.prt-btn-style-text).elementor-element.elementor-widget-button .elementor-button-link:hover:after,

.preyantechnosys-box-blog.preyantechnosys-blogbox-styleone .preyantechnosys-blogbox-desc-footer a:hover:before,
.preyantechnosys-box-blog.preyantechnosys-blogbox-styleone .preyantechnosys-blogbox-desc-footer a:hover:after{
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}	

	/** Outline button **/
.preyantechnosys-box-blog.preyantechnosys-blogbox-styleone .preyantechnosys-blogbox-desc-footer a,
.prt-btn-style-outline.prt-btn-color-darkgrey .elementor-button{
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}

.prt-btn-style-outline.prt-btn-color-darkgrey .elementor-button:hover {
	border-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	color:#fff;
	background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
}
.prt-btn-style-outline.prt-btn-color-skincolor .elementor-button{
	border-color:<?php echo esc_attr($skincolor); ?>;
	color:<?php echo esc_attr($skincolor); ?>;
}
.comment-list a.comment-reply-link:hover,
.comment-form input[type="submit"]:hover,
.prt-btn-style-outline.prt-btn-color-skincolor .elementor-button:hover{
	color:#fff;
	background-color:<?php echo esc_attr($skincolor); ?>;
	border-color:<?php echo esc_attr($skincolor); ?>;
}
.prt-btn-style-outline.prt-btn-color-grey .elementor-button{
	border-color:<?php echo esc_attr($secondarygreycolor); ?> !important;
	color:<?php echo esc_attr($secondarygreycolor); ?>;
}
.prt-btn-style-outline.prt-btn-color-grey .elementor-button:hover{
	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
	background-color:<?php echo esc_attr($secondarygreycolor); ?>;
}

.prt-slider-button.btn-skin:hover{
	color:#fff  !important;
	background-color:<?php echo esc_attr($skincolor); ?> !important;
	border-color:<?php echo esc_attr($skincolor); ?> !important;
}

/* Blackish Button Color */

.preyantechnosys-blogbox-stylefive .preyantechnosys-blogbox-footer-readmore a,
.preyantechnosys-iconbox-styleseven .preyantechnosys-serviceboxbox-readmore a:hover,
.prt-bgcolor-white .tprt-header-button a,
.elementor-widget-tabs .elementor-tab-content ul li,
.prt-fid-view-topicon h3.prt-fid-title,
.preyantechnosys-blogbox-stylefour .prt-blog-post-cat a:hover,
.elementor-widget-progress .elementor-title,
.elementor-widget-accordion .elementor-accordion .elementor-accordion-title,
.prt-fid.prt-fid-view-style5 h3,
.prt-btn-style-outline.prt-btn-color-white .elementor-button:hover,
.prt-fid-view-circle-progress .prt-fid-number sup,
.prt-fid-view-circle-progress .prt-fid-number sub,
.preyantechnosys-servicebox-styleone .preyantechnosys-serviceboxbox-readmore a,
.prt-fid-view-righticon .prt-fid-icon-wrapper i,
.preyantechnosys-box-portfolio .preyantechnosys-box-bottom-content h4 a:not(:hover),
.prt-publised-in-wrapper span.post-title,
.prt-team-member-single-category a:not(:hover),
.prt-bgcolor-darkgrey .preyantechnosys-team-box-view-overlay .preyantechnosys-box-title a,
.prt-comment-owner,
.prt-comment-owner a:not(:hover),
.comment-reply-link:hover,
.testimonial_item .preyantechnosys-author-name a:hover,
.preyantechnosys-box-team.preyantechnosys-box-view-top-image .preyantechnosys-box-content h4 a,

.preyantechnosys-post-readmore a,
.prt-bgcolor-skincolor .preyantechnosys-blogbox-footer-readmore a:hover,
.logged-in-as a:hover,
.widget.minemo_category_list_widget .widget-title,
.widget.minemo_category_list_widget li a {
	color: <?php echo esc_attr($blackish_buttoncolor); ?>;
}
.prt-textcolor-dark,
.prt-textcolor-dark .social-icons li a,
.prt-textcolor-dark.preyantechnosys-fbar-btn-link i,
.prt-textcolor-dark h1,
.prt-textcolor-dark h2,
.prt-textcolor-dark h3,
.prt-textcolor-dark h4,
.prt-textcolor-dark h5,
.prt-textcolor-dark h6,
h2.prt-custom-heading.prt-textcolor-dark,
h4.prt-custom-heading.prt-textcolor-dark,
h3.prt-custom-heading.prt-textcolor-dark{
    color: <?php echo esc_attr($blackish_buttoncolor); ?>!important;
}


.elementor-widget-heading .elementor-heading-title,
.prt-pf-view-left-image.style2 .preyantechnosys-pf-detailbox-list .prt-pf-details-date .prt-pf-left-details:first-child,
.woocommerce-account .woocommerce-MyAccount-navigation li a, .widget.tm_widget_nav_menu li a, .widget.minemo_all_post_list_widget li a, .widget.minemo_category_list_widget li a{
	font-family:"<?php echo esc_attr($special_element_fontfamily); ?>";	
}
.tprt-header-button a,

.preyantechnosys-portfoliobox-style2 .prt-project-readmore-btn a,
.woocommerce-account .woocommerce-MyAccount-navigation li a, .widget.tm_widget_nav_menu li a, .widget.minemo_all_post_list_widget li a, .widget.minemo_category_list_widget li a {
	font-weight:<?php echo esc_attr($special_element_fontweight); ?>;	
}


.prt-contact-btn input[type="submit"],
.preyantechnosys-servicebox-stylefour .preyantechnosys-serviceboxbox-readmore a,
.tm_coverimgbox_wrapper .prt-staticbox-more-link,
.preyantechnosys-servicebox-styletwo .preyantechnosys-serviceboxbox-readmore a,
.main-holder .site-content nav.woocommerce-pagination ul li a, .preyantechnosys-pagination .page-numbers,
.single-tm_portfolio .nav-next a,
.widget .social-icons li > a,

.sidebar .widget .tagcloud a,
#totop.top-visible,
.preyantechnosys-box-blog.preyantechnosys-blogbox-styleone .preyantechnosys-blogbox-desc-footer a,
.comment-form input[type="submit"],
.post.preyantechnosys-box-blog-classic .preyantechnosys-blogbox-footer-readmore a
{
	border-radius:<?php echo esc_attr($global_button_shape); ?>;
}

/* Gradient color */

.elementor-column.elementor-top-column.prt-elementor-bg-color-gradient:not(.prt-bgimage-yes) .elementor-widget-wrap>.prt-stretched-div, .elementor-column.elementor-top-column.prt-elementor-bg-color-gradient:not(.prt-col-stretched-yes)>.elementor-widget-wrap, .elementor-column.elementor-inner-column.prt-elementor-bg-color-gradient:not(.prt-bgimage-yes)>.elementor-widget-wrap
{
	background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> ) !important;
}

.elementor-section.elementor-top-section.prt-elementor-bg-color-gradient, .elementor-section.elementor-top-section.prt-elementor-bg-color-gradient:before, .elementor-section.elementor-inner-section.prt-elementor-bg-color-gradient,
.prt-btn-style-flat.prt-btn-color-gradient .elementor-button {
   background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> ) !important;
}


.prt-vc_icon_element-inner.prt-vc_icon_element-background-color-gradient.prt-vc_icon_element-background,
.preyantechnosys-topbar-wrapper.prt-bgcolor-gradient,
.prt-col-bgcolor-gradient .prt-bg-layer-inner,
.prt-bgcolor-gradient ,
.prt-bg.prt-bgcolor-gradient .prt-bg-layer,
.prt-col-bgcolor-gradient.prt-col-bgimage-yes .prt-bg-layer-inner,
.prt-bgcolor-gradient.prt-bg.prt-bgimage-yes > .prt-bg-layer-inner {
	background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> ) !important;
		
}

body.archive .prt-titlebar h1.entry-title,
body.single-post .prt-titlebar h1.entry-title {
    font-size:<?php echo esc_attr(($titlebar_heading_font)-20); ?>px;
    line-height:<?php echo esc_attr(($titlebar_heading_font)-10); ?>px;
}

<?php 
$show_gradient_colors = preyantechnosys_get_option('gradient_color_show');
	if( $show_gradient_colors==true ){
?>

.main-holder .site-content ul.products li.product .onsale,
.prt-header-style-infostack .kw-phone .tprt-custombutton,
.comment-list a.comment-reply-link,
.prt-ptablebox .prt-sbox-icon-wrapper,
.prt-header-icons .prt-header-wc-cart-link span.number-cart,
article.preyantechnosys-box-blog-classic .prt-post-featured-outer-wrapper .prt-postdate,
.tooltip:after, [data-tooltip]:after,
.footer .social-icons li > a:hover,
.prt-search-overlay .prt-site-searchform button,
.site-footer .widget .prt-contactbox .prt-square-iconbox i,
#totop,
.mailchimp-inputbox button[type="submit"],
.prt-ptablebox-featured-col .prt-ptablebox-content:before{
	background-color: transparent;
	background-image: linear-gradient(to right, <?php echo esc_attr($first_gradientcolor); ?> , <?php echo esc_attr($second_gradientcolor); ?> );	
}

<?php } ?>

/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require_once( get_template_directory() .'/css/dynamic-menu-style.php' ); // Functions
?>
/* ********************** Responsive Menu Code END **************************** */


/****************** Custom Code **********************/

<?php
// We are not escaping / sanitizing as we are expecting css code. 
$custom_css_code = preyantechnosys_get_option('custom_css_code');
if( !empty($custom_css_code) ){
	$custom_css_code = html_entity_decode($custom_css_code);
	echo trim($custom_css_code);
}
?>

/******************************************************/

