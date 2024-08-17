<?php
// [prt-current-year]
if( !function_exists('preyantechnosys_sc_current_year') ){
function preyantechnosys_sc_current_year( $atts, $content=NULL ){
	return date("Y");
}
}
add_shortcode( 'prt-current-year', 'preyantechnosys_sc_current_year' );