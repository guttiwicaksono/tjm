<?php
/**
 * Enqueue scripts and styles for the ADMIN section.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
 
if( !function_exists('minemo_wp_admin_scripts_styles') ){
function minemo_wp_admin_scripts_styles() {
	
	/* Core files of the theme */
	wp_enqueue_style( 'minemo-admin-style', get_template_directory_uri() . '/inc/admin-style.css', false, '1.0.0' );
	wp_enqueue_script( 'minemo-admin-custom', get_template_directory_uri() . '/inc/admin-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'minemo-preyantechnosys-iconpicker', get_template_directory_uri() . '/inc/preyantechnosys_iconpicker.js', array( 'jquery' ) );
	
	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/inc/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	
	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap-iconpicker', get_template_directory_uri().'/inc/assets/bootstrap-iconpicker/js/bootstrap-iconpicker.js', array( 'bootstrap', 'iconset-fontawesome', 'iconset-linecons', 'iconset-themify' ) );
	
	// Bootstrap icon picker - CSS
	wp_enqueue_style( 'bootstrap-iconpicker', get_template_directory_uri() . '/inc/assets/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css' );
	
	// iconset-fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css' );
	
	// iconset-themify
	wp_enqueue_style( 'themify', get_template_directory_uri().'/assets/themify-icons/themify-icons.css' );
		
	// Sticky Kit library
	wp_enqueue_script( 'jquery-sticky-kit', get_template_directory_uri() . '/inc/assets/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) );
	
	// Twemoji Awesome
	wp_enqueue_style( 'twemojiawesome' );
	
	// themify
	wp_enqueue_style( 'themify' );
	
	// Extra icons related to different businesses
	wp_enqueue_style( 'preyantechnosys-minemo-extra-icons', get_template_directory_uri() . '/assets/preyantechnosys-minemo-extra-icons/font/flaticon_mining.css' );
	
}
}
add_action( 'admin_enqueue_scripts', 'minemo_wp_admin_scripts_styles' );