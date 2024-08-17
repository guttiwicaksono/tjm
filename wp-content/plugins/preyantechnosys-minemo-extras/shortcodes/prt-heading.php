<?php
// [prt-heading tag="h1" text="This is heading text"]
if( !function_exists('preyantechnosys_sc_heading') ){
function preyantechnosys_sc_heading( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $tm_sc_params_heading;
		$options_list = preyantechnosys_create_options_list($tm_sc_params_heading);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Getting a unique class name applied by the Custom CSS box (via "css_editor") and also custom class name via "el_class".
		$css_class = '';
		if( !empty($css) ){
			$css_class = vc_shortcode_custom_css_class( $css, ' ' );
		}
		
		
		// CSS Animation
		if( ! empty( $css_animation ) ) {
			$css_class .= ' ' . preyantechnosys_getCSSAnimation( $css_animation );
		}
		
		
		// Custom Class
		if( ! empty( $el_class ) ) {
			$css_class .= ' ' . esc_attr($el_class);
		}
				
		
		$ctaShortcode = '[prt-cta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""]'.$content.'[/prt-cta]';

		
		if( !empty($h2)!='' ) {
			
			$cta = do_shortcode($ctaShortcode);
		
			// Changing header order if reverser order
			
			
			$return .= '<div class="prt-element-heading-wrapper prt-heading-inner prt-element-align-'.$txt_align.' prt-seperator-'.$seperator.' prt-heading-style-'.$heading_style.' '.$css_class.'">';
			$return .= $cta;
			$return .= '</div> <!-- .prt-element-heading-wrapper container --> ';
			
			
			
			/******************************************/
			// Inline css
			global $preyantechnosys_inline_css;
			if( empty($preyantechnosys_inline_css) ){
				$preyantechnosys_inline_css = '';
			}
			if( !empty($css) ){
				$preyantechnosys_inline_css .= $css; // Custom CSS style like padding, margin etc.
			}
			
			/******************************************/
			
		}
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	
	return $return;
}
}
add_shortcode( 'prt-heading', 'preyantechnosys_sc_heading' );