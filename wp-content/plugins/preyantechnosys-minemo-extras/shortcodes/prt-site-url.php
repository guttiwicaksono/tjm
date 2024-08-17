<?php
// [prt-site-url]
if( !function_exists('preyantechnosys_sc_site_url') ){
function preyantechnosys_sc_site_url( $atts, $content=NULL ){
	return site_url();
}
}
add_shortcode( 'prt-site-url', 'preyantechnosys_sc_site_url' );