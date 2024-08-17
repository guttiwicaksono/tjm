<?php
// [prt-dropcap]D[/prt-dropcap]
// [prt-dropcap style="square"]A[/prt-dropcap]
// [prt-dropcap style="rounded"]B[/prt-dropcap]
// [prt-dropcap style="round"]C[/prt-dropcap]
// [prt-dropcap color="skincolor"]A[/prt-dropcap]
// [prt-dropcap color="grey"]B[/prt-dropcap]
// [prt-dropcap color="dark"]B[/prt-dropcap]
// [prt-dropcap bgcolor="skincolor"]A[/prt-dropcap]
// [prt-dropcap bgcolor="grey"]B[/prt-dropcap]
// [prt-dropcap bgcolor="dark"]B[/prt-dropcap]
if( !function_exists('preyantechnosys_sc_dropcap') ){
function preyantechnosys_sc_dropcap( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'style'   => '',
		'color'   => 'skincolor',
		'bgcolor' => '',
	), $atts ) );
	
	if( empty($color) ){
		$color = 'skincolor';
	}
	
	$class = array();
	$class[] = 'prt-dropcap';
	$class[] = 'prt-dcap-style-' . $style;
	$class[] = 'prt-dcap-txt-color-' . $color;
	$class[] = 'prt-' . $color;
	$class[] = 'prt-bgcolor-' . $bgcolor;
	
	$class = implode( ' ', $class );
	
	return '<span class="' . preyantechnosys_sanitize_html_classes($class) . '">' . esc_attr($content) . '</span>';
}
}
add_shortcode( 'prt-dropcap', 'preyantechnosys_sc_dropcap' );