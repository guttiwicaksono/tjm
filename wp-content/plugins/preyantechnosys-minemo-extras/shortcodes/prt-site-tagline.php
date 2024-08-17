<?php
// [prt-site-tagline]
if( !function_exists('preyantechnosys_sc_site_tagline') ){
function preyantechnosys_sc_site_tagline( $atts, $content=NULL ){
	return get_bloginfo('description');
}
}
add_shortcode( 'prt-site-tagline', 'preyantechnosys_sc_site_tagline' );