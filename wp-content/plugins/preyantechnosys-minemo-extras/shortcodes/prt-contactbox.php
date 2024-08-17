<?php
// [prt-contactbox]
if( !function_exists('preyantechnosys_sc_contactbox') ){
function preyantechnosys_sc_contactbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $tm_sc_params_contactbox;
		$options_list = preyantechnosys_create_options_list($tm_sc_params_contactbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$class = array( 'minemo_contact_widget_wrapper', 'preyantechnosys_vc_contact_wrapper' );
		
		
		// CSS Animation
		if ( !empty( $css_animation ) ) {
			$class[] = preyantechnosys_getCSSAnimation( $css_animation );
		}
		
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = preyantechnosys_vc_shortcode_custom_css_class( $css );
		}
		
		
		$class = implode(' ', $class );
		
		$return = '<ul class="' . $class . '">';
		if( trim($address)!='' ) {
			$return .= '<li class="preyantechnosys-contact-address  prt-minemo-icon-location-pin">' . preyantechnosys_wp_kses($address) . '</li>';
		}
		if( trim($phone)!='' ) {
			$return .= '<li class="preyantechnosys-contact-phonenumber prt-minemo-icon-mobile">'.preyantechnosys_wp_kses($phone).'</li>';
		}
		if( trim($email)!='' ) {
			$return .= '<li class="preyantechnosys-contact-email prt-minemo-icon-comment-1"><a href="mailto:'.trim($email).'">'.trim($email).'</a></li>';
		}
		if( trim($website)!='' ) {
			$return .= '<li class="preyantechnosys-contact-website prt-minemo-icon-world"><a href="'.esc_url(preyantechnosys_addhttp($website)).'">'.esc_url($website).'</a></li>';
		}
		if( trim($time)!='' ) {
			$return .= '<li class="preyantechnosys-contact-time prt-minemo-icon-clock">' . preyantechnosys_wp_kses($time) . '</li>';
		}
		$return .= '</ul>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'prt-contactbox', 'preyantechnosys_sc_contactbox' );