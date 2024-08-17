<?php
// [prt-twitterbox consumer_key="v6t8ta31234ZkoljqvBDa" consumer_secret="731111dgQqSflffj1t68e60ly1sy5gvvuBgmCXlGEQg" oauth_token="156789585-yOkqsdefmgnrkgjhnrtfjhlgUXRNwkIIWOSCnk3SMOjzKx" oauth_token_secret="dgthuyjrtfjhka3Vh2J0DGr7oR6pBMLdLtnwo5E"]
if( !function_exists('preyantechnosys_sc_twitterbox') ){
function preyantechnosys_sc_twitterbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $tm_sc_params_twitterbox;
		$options_list = preyantechnosys_create_options_list($tm_sc_params_twitterbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		if( function_exists('latest_tweets_render') ){
			
			// Starting wrapper of the whole arear
			$return .= preyantechnosys_box_wrapper( 'start', 'twitterbox', get_defined_vars() );
			
				// Heading element
				$return .= preyantechnosys_vc_element_heading( get_defined_vars() );
				
				
				$settings = array();
				$settings['username']	  = $username;
				$settings['followustext'] = $followustext;
				$settings['show']		  = $show;
				$settings['column']		  = $column;
				$settings['boxview']      = $boxview;
				$settings['el_class'] 	  = $el_class;
				
				
				
				/***** Fetching from the plugin code *******/
				
				$screen_name = $username;
				$num         = $show;
				
				$items = latest_tweets_render( $screen_name, $num, true, true, 0 );
				$list  = apply_filters('latest_tweets_render_list', $items, $screen_name );
				
				// preparing HTML via this function
				$return .= $tweetList = preyantechnosys_twitterbox($settings, $list);
				
				/* *********************************** */
				
				
			
			// Ending wrapper of the whole arear
			$return .= preyantechnosys_box_wrapper( 'end', 'twitterbox', get_defined_vars() );
			
		}
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'prt-twitterbox', 'preyantechnosys_sc_twitterbox' );






function preyantechnosys_twitterbox( $settings, $dataArray ) {
	

	
	$followustext = '';
	if( !empty($settings['followustext']) ){
		$followustext = '<br><span class="prt-sc-twitterbox-followus-text"><small>' . $settings['followustext'] . '</small></span>';
	}
	
	
	// Screen name
	
	$twitter_handle_link = '';
	if( !empty($settings['username']) ){
		$twitter_handle_link = '<h3><span class="preyantechnosys-hide">Twitter link</span><a target="_blank" class="twitter-link" href="http://twitter.com/' . $settings['username'] . '"><i class="fa fa-twitter"></i>'.$followustext.'</a></h3>';
	}
	
	
	$return   = '';
	$dataHTML = $dataArray;
	if( is_array($dataHTML) && count($dataHTML)>0 ){
		
		$dataContent = '';
		
		foreach( $dataHTML as $data ){
			$dataContent .= preyantechnosys_column_div('start', $settings['column'] );
			$dataContent .= $data;
			$dataContent .= preyantechnosys_column_div('end', $settings['column'] );
		}
		
		
		
		
		
		
		$return .= '
			<section class="preyantechnosys-twitterbox-wrapper preyantechnosys-items-wrapper">
				<div class="preyantechnosys-twitterbox-inner">
					' . $twitter_handle_link . '
					<div class="row multi-columns-row preyantechnosys-boxes-row-wrapper">
						'.$dataContent.'
					</div>
				</div>
			</section>';
		
	} else {
		$return .= 'Incorrect key or empty key. Please fill correct Twitter keys. You will get keys from <a href="https://dev.twitter.com" target="_blank">https://dev.twitter.com</a>.';
	}
	
	return $return;
	
} // print_footertwitterbar()

