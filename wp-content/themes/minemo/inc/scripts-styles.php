<?php

/* For security */
if ( !defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}


/*
 *  Check if MIN css or not
 */
if( !function_exists('preyantechnosys_min_css') ){
function preyantechnosys_min_css(){
	global $minemo_theme_options;
	
	// Checking if MIN enabled
	if(!is_admin()) {
		if( isset($minemo_theme_options['minify']) && $minemo_theme_options['minify']==true ){
			define('THEMETECHMOUNT_MIN', '.min');
		} else {
			define('THEMETECHMOUNT_MIN', '');
		}
	}
    else {
		define('THEMETECHMOUNT_MIN', '.min');
	}
}
}
add_action( 'init', 'preyantechnosys_min_css' );


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if( !function_exists('minemo_scripts_styles') ){
function minemo_scripts_styles() {
	global $minemo_theme_options;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	$thread_comments_option = get_option( 'thread_comments' );
	
	if ( is_singular() && comments_open() && $thread_comments_option ){
		wp_enqueue_script( 'comment-reply' );
	}
	

	// fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css' );
	
	
	// Animsition - Add page translation effect
	if( isset($minemo_theme_options['pagetranslation']) && $minemo_theme_options['pagetranslation']!='no'){
		wp_register_script( 'jquery-animsition', get_template_directory_uri() . '/assets/animsition/js/jquery.animsition.min.js', array( 'jquery' ), '', true );
		wp_register_style( 'animsition', get_template_directory_uri() . '/assets/animsition/css/animsition.min.css' );
	}
	
	// Perfect Scrollbar
	wp_enqueue_script( 'perfect-scrollbar', get_template_directory_uri() . '/assets/perfect-scrollbar/perfect-scrollbar.jquery.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'perfect-scrollbar', get_template_directory_uri() . '/assets/perfect-scrollbar/perfect-scrollbar.min.css' );
	
	
	// hower.css : Hover effect (we are using min version)
	wp_register_style( 'hover', get_template_directory_uri() . '/assets/hover/hover-min.css' );
	
	// Chris Bracco Tooltip
	wp_enqueue_style( 'chrisbracco-tooltip', get_template_directory_uri() . '/assets/chrisbracco-tooltip/chrisbracco-tooltip.min.css' );
	
	// multi-columns-row
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.css' );
	
	// Select2
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/select2/select2.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'select2', get_template_directory_uri() . '/assets/select2/select2.min.css' );
	
	// IsoTope
	wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/isotope/isotope.pkgd.min.js', array( 'jquery' ), '', true );
	
	// jquery-treeview
	wp_enqueue_script( 'jquery-treeview', get_template_directory_uri() . '/js/jquery.treeview.js', array( 'jquery' ), '', true );
	
	// jquery-mousewheel
	wp_enqueue_script( 'jquery-mousewheel', get_template_directory_uri() . '/assets/jquery-mousewheel/jquery.mousewheel.min.js', array( 'jquery' ), '', true );
	
	// Flex Slider
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.css' );
	
	// Sticky Sidebar
		if( esc_attr($minemo_theme_options['stickysidebar']) == 1 ){
     	wp_enqueue_script('sidebar',  get_template_directory_uri() .'/assets/sidebar-sticky/theia-sticky-sidebar.js', array('jquery'), '', true);
	}
	
	// Sticky Sidebar
		wp_enqueue_script('sidebar',  get_template_directory_uri() .'/assets/sidebar-sticky/theia-sticky-sidebar.js', array('jquery'), '', true);
		wp_enqueue_script('sidebar',  get_template_directory_uri() .'/assets/sidebar-sticky/ResizeSensor.min.js', array('jquery'), '', true);
		
	// Sticky
	if( !empty($minemo_theme_options['sticky_header']) && $minemo_theme_options['sticky_header']=='y' ){
		wp_enqueue_script( 'jquery-sticky-kit', get_template_directory_uri() . '/assets/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) , '', true );
	}
	 
	
	// TM Social Icons CSS Library
	wp_enqueue_style( 'preyantechnosys-minemo-icons', get_template_directory_uri() . '/assets/prt-minemo-icons/css/prt-minemo-icons.css' );
	
	// Extra icons related to different businesses
	wp_enqueue_style( 'preyantechnosys-minemo-extra-icons', get_template_directory_uri() . '/assets/preyantechnosys-minemo-extra-icons/font/flaticon_mining.css' );
	
	// animate.css
	if ( !wp_style_is( 'animate-css', 'registered' ) ) { // If library is not registered
		wp_register_style( 'animate-css', get_template_directory_uri() . '/assets/animate/animate.min.css' );
	}
	wp_register_script( 'jquery-nivo-slider-pack', get_template_directory_uri() . '/assets/nivo-slider/jquery.nivo.slider.pack.js', array( 'jquery' ), '', true );
	wp_register_style( 'nivo-slider-css', get_template_directory_uri() . '/assets/nivo-slider/nivo-slider.css' );
	wp_register_style( 'nivo-slider-theme', get_template_directory_uri() . '/assets/nivo-slider/themes/default/default.css' );
	
	// Numinate plugin
	if ( !wp_script_is( 'waypoints', 'registered' ) ) { // If library is not registered
		wp_register_script( 'waypoints', get_template_directory_uri() . '/assets/waypoints/jquery.waypoints.min.js', array( 'jquery' ), '', true );
	}
	wp_register_script( 'numinate', get_template_directory_uri() . '/assets/numinate/numinate.min.js', array( 'jquery' ), '', true );
	
	// Slick library
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), '', true );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css', array('slick') );
		
	// PrettyPhoto
	if ( !wp_script_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_js = get_template_directory_uri() . '/assets/prettyphoto/js/jquery.prettyPhoto.js';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/js/jquery.prettyPhoto.js') ){
			$prettyphoto_js = WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/js/jquery.prettyPhoto.js';
		}
		wp_register_script( 'prettyphoto', $prettyphoto_js, array('jquery') , '', true);
	}
	if ( !wp_style_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_css = get_template_directory_uri() . '/assets/prettyphoto/css/prettyPhoto.css';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/css/prettyPhoto.css') ){
			$prettyphoto_css = WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/css/prettyPhoto.css';
		}
		wp_register_style( 'prettyphoto', $prettyphoto_css );
	}
	
	// CSSgram
	wp_register_style( 'cssgram', get_template_directory_uri() . '/assets/cssgram/cssgram.min.css' );
	
	// Twemoji Awesome
	wp_register_style( 'twemoji-awesome', get_template_directory_uri() . '/assets/twemoji-awesome/twemoji-awesome.css' );
			
	// jquery-circle-progress
	wp_register_script( 'jquery-circle-progress', get_template_directory_uri() . '/assets/jquery-circle-progress/circle-progress.min.js', array('jquery'), '', true );

	
	//date counter
	wp_enqueue_script( 'timecircles', get_template_directory_uri() . '/assets/datecounter/timecircles.js', array(), false, true  );

	
	// Loading prettyPhoto by default
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	
}
}
add_action( 'wp_enqueue_scripts', 'minemo_scripts_styles', 10 );

/**
 * Elementor core things
 */
include( get_template_directory() . '/inc/elementor-tools.php' );


if( !function_exists('minemo_scripts_styles_14') ){
function minemo_scripts_styles_14() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.min.css', array('bootstrap') );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap') );
	
	if ( file_exists( ABSPATH . 'wp-content/plugins/js_composer/assets/css/js_composer_tta.min.css') ) {
		wp_enqueue_style( 'js-composer-tta',  plugins_url() . '/js_composer/assets/css/js_composer_tta.min.css' );
	}
	wp_enqueue_style( 'themify', get_template_directory_uri().'/assets/themify-icons/themify-icons.css' );	
	wp_enqueue_style( 'minemo-base-style', get_template_directory_uri() . '/css/base'.THEMETECHMOUNT_MIN.'.css', array('bootstrap','bootstrap-theme') );
}
}
add_action( 'wp_enqueue_scripts', 'minemo_scripts_styles_14', 14 );


if( !function_exists('minemo_scripts_styles_15') ){
function minemo_scripts_styles_15() {
	global $minemo_theme_options;
	$min = THEMETECHMOUNT_MIN;
	if( is_child_theme() ){
		$min = '';
	}
	if( defined( 'WPB_VC_VERSION' ) ){
		wp_enqueue_style( 'minemo-main-style', get_template_directory_uri() . '/css/main'.THEMETECHMOUNT_MIN.'.css' , array('js_composer_front') );
		wp_register_style( 'minemo-dark', get_template_directory_uri() . '/css/dark'.THEMETECHMOUNT_MIN.'.css' , array('js_composer_front', 'minemo-main-style') );  // Dark
	} else {
		wp_enqueue_style( 'minemo-main-style', get_template_directory_uri() . '/css/main'.THEMETECHMOUNT_MIN.'.css' );
		wp_register_style( 'minemo-dark', get_template_directory_uri() . '/css/dark'.THEMETECHMOUNT_MIN.'.css' , array( 'minemo-main-style') );  // Dark
	}

// Load dark.css if dark layout
	if( isset($minemo_theme_options['layout_type']) && trim($minemo_theme_options['layout_type']=='dark') ){
		wp_enqueue_style('minemo-dark');
	}	
	// Load dark.css if dark layout
	if( isset($minemo_theme_options['inner_background']['background-color']) && trim($minemo_theme_options['inner_background']['background-color'])!='' && preyantechnosys_check_dark_color($minemo_theme_options['inner_background']['background-color']) ){
		wp_enqueue_style('minemo-dark');
	}
}
}
add_action( 'wp_enqueue_scripts', 'minemo_scripts_styles_15', 15 );


if( !function_exists('minemo_scripts_styles_17') ){
function minemo_scripts_styles_17() {
	// Responsive
	global $minemo_theme_options;
	
	// Responsive CSS
	wp_enqueue_style( 'minemo-responsive-style', get_template_directory_uri() . '/css/responsive'.THEMETECHMOUNT_MIN.'.css' );
	
	// Loads JavaScript file with functionality specific to Minemo.
	if ( wp_script_is( 'wpb_composer_front_js', 'registered' ) ) {
		wp_enqueue_script( 'minemo-functions', get_template_directory_uri() . '/js/functions'.THEMETECHMOUNT_MIN.'.js', array( 'jquery', 'wpb_composer_front_js' ), '1.0', true );
	} else {
		wp_enqueue_script( 'minemo-functions', get_template_directory_uri() . '/js/functions'.THEMETECHMOUNT_MIN.'.js', array( 'jquery' ), '1.0', true );
	}
	
	wp_enqueue_style( 'minemo-last-checkpoint', get_template_directory_uri() . '/css/minemo-last-checkpoint.min.css' );
	
		
	wp_enqueue_script( 'circletype', get_template_directory_uri() . '/js/circletype.js' );
	wp_enqueue_script( 'typed', get_template_directory_uri() . '/js/typed.js' );
	wp_enqueue_script( 'jquery-lettering-min', get_template_directory_uri() . '/js/jquery.lettering.min.js' );
	
	
	wp_enqueue_script( 'gsap-js', get_template_directory_uri() . '/js/gsap.js' );
	wp_enqueue_script( 'scrolltrigger', get_template_directory_uri() . '/js/scrolltrigger.js' );
	wp_enqueue_script( 'splittext', get_template_directory_uri() . '/js/splittext.js' );	
	
}
}
add_action( 'wp_enqueue_scripts', 'minemo_scripts_styles_17', 17 );