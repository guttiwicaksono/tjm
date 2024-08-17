<?php
// [prt-skincolor]This text will be in skin color[/prt-skincolor]
if( !function_exists('preyantechnosys_sc_skincolor') ){
function preyantechnosys_sc_skincolor( $atts, $content=NULL ) {
	return '<span class="preyantechnosys-skincolor prt-skincolor">'.$content.'</span>';
}
}
add_shortcode( 'prt-skincolor', 'preyantechnosys_sc_skincolor' );