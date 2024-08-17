<?php
// [prt-wpml-language-switcher]
if( !function_exists('preyantechnosys_sc_wpml_language_switcher') ){
function preyantechnosys_sc_wpml_language_switcher( $atts ) {
	$return = '';
	if( function_exists('icl_get_languages') ){
		ob_start();
		do_action('icl_language_selector');
		$langDropdown = ob_get_clean();
		$return .= '<div class="prt-wpml-lang-switcher">'.$langDropdown.'</div>';
	}
	return $return;
}
}
add_shortcode( 'prt-wpml-language-switcher', 'preyantechnosys_sc_wpml_language_switcher' );