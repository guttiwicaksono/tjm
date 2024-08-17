<?php
// [prt-site-title]
if( !function_exists('preyantechnosys_sc_site_title') ){
function preyantechnosys_sc_site_title( $atts, $content=NULL ){
	return get_bloginfo('name');
}
}
add_shortcode( 'prt-site-title', 'preyantechnosys_sc_site_title' );