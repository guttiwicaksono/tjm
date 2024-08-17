<?php


/*
 * Shortcode list and their calls - Depends on Visual Composer
 */
$shortcodeList = array(
	'prt-wpml-language-switcher',
	'prt-current-year',
	'prt-social-links',
	'prt-site-tagline',
	'prt-site-title',
	'prt-site-url',
	'prt-footermenu',
	'prt-logo',
	'prt-dropcap',
	'prt-skincolor',
);
//if( function_exists('vc_map') && class_exists('WPBMap') ){
	foreach( $shortcodeList as $shortcode ){
		if( file_exists(get_template_directory() . '/inc/shortcodes/'.$shortcode.'.php') ){
			include_once( get_template_directory() . '/inc/shortcodes/'.$shortcode.'.php');
		} else {
			require_once TMTE_DIR . 'shortcodes/'.$shortcode.'.php';
		}
	}
//}