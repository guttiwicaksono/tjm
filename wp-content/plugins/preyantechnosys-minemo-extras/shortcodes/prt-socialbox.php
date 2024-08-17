<?php
// [prt-socialbox]
if( !function_exists('preyantechnosys_sc_social_box') ){
function preyantechnosys_sc_social_box( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $tm_sc_params_socialbox;
		$options_list = preyantechnosys_create_options_list($tm_sc_params_socialbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		
		// Class list
		$class = array();
		$class[] = 'preyantechnosys-socialbox-wrapper';
		$class[] = 'prt-socialbox-icon-size-' . $iconsize;
		$class[] = 'prt-socialbox-column-'.$column;
		
		
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
		
		// Extra class name
		$extraClass = '';
		
		$columnclass = 'col-md-3 col-lg-3 col-xs-12';
		switch($column){
			case 'one':
				$columnclass = 'col-md-12 col-lg-12 col-xs-12';
				break;
				
			case 'two':
				$columnclass = 'col-md-6 col-lg-6 col-xs-12';
				break;
			
			case 'three':
				$columnclass = 'col-md-4 col-lg-4 col-xs-12';
				break;
				
			case 'four':
				$columnclass = 'col-md-3 col-lg-3 col-xs-12';
				break;
			
			case 'five':
				$columnclass = 'col-md-20percent col-lg-20percent col-xs-12';
				break;
			
			case 'six':
				$columnclass = 'col-md-4 col-lg-2 col-xs-12';
				break;
		}
		
		
		// prearing shortcode
		$ctaShortcode = '[prt-heading ';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!='' && $key!='el_class' && $key!='css' ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= 'el_width="100%" css_animation=""][/prt-heading]';
		
		
		// calling CTA shortcode
		$return = '';
		$return = do_shortcode($ctaShortcode);
		
		
		// Add/remove separator line below main heading text
		$heading_sep_class = ' prt-heading-with-separator';
		if( !empty($heading_sep) && $heading_sep=='no' ){
			$heading_sep_class = '';
		}
		$class[] = $heading_sep_class;
		
		
		
		// Social list
		$sociallist = array(
			'twitter'      => 'Twitter',
			'youtube'      => 'YouTube',
			'flickr'       => 'Flickr',
			'facebook'     => 'Facebook',
			'linkedin'     => 'LinkedIn',
			'gplus'        => 'Google+',
			'yelp'         => 'Yelp',
			'dribbble'     => 'Dribbble',
			'pinterest'    => 'Pinterest',
			'podcast'      => 'Podcast',
			'instagram'    => 'Instagram',
			'xing'         => 'Xing',
			'vimeo'        => 'Vimeo',
			'vk'           => 'VK',
			'houzz'        => 'Houzz',
			'issuu'        => 'Issuu',
			'google-drive' => 'Google Drive',
			'rss'          => 'RSS Feed',
		);
		
		
		
		
		// social service list
		$socialdata = json_decode(urldecode($socialservices));
		
		// CSS Animation
		if ( !empty( $css_animation ) ) {
			$class[] = preyantechnosys_getCSSAnimation( $css_animation );
		}
		
		$return .= '<div class="prt-socialbox-links-wrapper row multi-columns-row">';
		
		if( is_array($socialdata) && count($socialdata)>0 ){
			foreach( $socialdata as $data ){
				if( !empty($data->servicename) ){
					
					// Social link
					if( $data->servicename=='rss' ){
						$servicelink = get_bloginfo('rss2_url');
					} else {
						$servicelink = ( isset($data->servicelink) && trim($data->servicelink)!='' ) ? $data->servicelink : '#' ;
					}
					
					// Preparing icon
					$servicename = ( isset($sociallist[$data->servicename]) ) ? $sociallist[$data->servicename] : $data->servicename ;
					$return .= '<div class="prt-socialbox-i-wrapper '.$columnclass.'">';
					$return .= '<a class="prt-socialbox-icon-link prt-socialbox-icon-link-'.$data->servicename.'" target="_blank" href="'.$servicelink.'" data-tooltip="'.$servicename.'"><i class="prt-minemo-icon-'.$data->servicename.'"></i><span class="prt-link">'.$data->servicename.'</span></a>';
					$return .= '</div>';
					
				}
			}
		}
		
		$return .= '</div><!-- .prt-socialbox-links-wrapper -->  ';
		
		
		// class list
		$class = implode(' ', $class );
		
		// preparing final output
		$return = '<div class="' . $class . '">' . $return . '</div>';
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	// final return
	return $return;
	
	
}
}
add_shortcode( 'prt-socialbox', 'preyantechnosys_sc_social_box' );