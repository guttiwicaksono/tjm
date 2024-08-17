<?php
// [prt-footermenu]
if( !function_exists('preyantechnosys_sc_footermenu') ){
function preyantechnosys_sc_footermenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('preyantechnosys-footer-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'preyantechnosys-footer-menu', 'menu_class' => 'footer-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'prt-footermenu', 'preyantechnosys_sc_footermenu' );