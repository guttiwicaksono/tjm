<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


// Get current theme name and vesion
$tm_theme = wp_get_theme();
$tm_theme_name = $tm_theme->get( 'Name' );
$tm_theme_ver  = $tm_theme->get( 'Version' );


// Getting all theme options again if variable is not defined
global $minemo_theme_options;
if( empty($minemo_theme_options) || !is_array($minemo_theme_options) ){
	if( function_exists('preyantechnosys_load_default_theme_options') ){
		preyantechnosys_load_default_theme_options();
	} else {
		$minemo_theme_options = get_option('minemo_theme_options');
	}
}

// variables
$team_member_title          = ( !empty($minemo_theme_options['team_type_title']) ) ? esc_attr($minemo_theme_options['team_type_title']) : esc_attr__('Team Members', 'minemo') ;
$team_member_title_singular = ( !empty($minemo_theme_options['team_type_title_singular']) ) ? esc_attr($minemo_theme_options['team_type_title_singular']) : esc_attr__('Team Member', 'minemo') ;
$team_group_title           = ( !empty($minemo_theme_options['team_group_title']) ) ? esc_attr($minemo_theme_options['team_group_title']) : esc_attr__('Team Groups', 'minemo') ;
$team_group_title_singular  = ( !empty($minemo_theme_options['team_group_title_singular']) ) ? esc_attr($minemo_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'minemo') ;

$pf_title               = ( !empty($minemo_theme_options['pf_type_title']) ) ? esc_attr($minemo_theme_options['pf_type_title']) : esc_attr__('Portfolio', 'minemo') ;
$pf_title_singular      = ( !empty($minemo_theme_options['pf_type_title_singular']) ) ? esc_attr($minemo_theme_options['pf_type_title_singular']) : esc_attr__('Portfolio', 'minemo') ;
$pf_cat_title           = ( !empty($minemo_theme_options['pf_cat_title']) ) ? esc_attr($minemo_theme_options['pf_cat_title']) : esc_attr__('Portfolio Categories', 'minemo') ;
$pf_cat_title_singular  = ( !empty($minemo_theme_options['pf_cat_title_singular']) ) ? esc_attr($minemo_theme_options['pf_cat_title_singular']) : esc_attr__('Portfolio Category', 'minemo') ;

$service_title           = ( !empty($minemo_theme_options['service_type_title']) ) ? esc_attr($minemo_theme_options['service_type_title']) : esc_attr__('Service', 'minemo') ;
$service_title_singular      = ( !empty($minemo_theme_options['service_type_title_singular']) ) ? esc_attr($minemo_theme_options['service_type_title_singular']) : esc_attr__('Service', 'minemo') ;
$service_cat_title           = ( !empty($minemo_theme_options['service_cat_title']) ) ? esc_attr($minemo_theme_options['service_cat_title']) : esc_attr__('Service Categories', 'minemo') ;
$service_cat_title_singular  = ( !empty($minemo_theme_options['service_cat_title_singular']) ) ? esc_attr($minemo_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'minemo') ;




/**
 *  FRAMEWORK SETTINGS
 */
$tm_framework_settings = array(
	'menu_title' 	  => esc_attr__('Minemo Options', 'minemo'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'preyantechnosys-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_attr($tm_theme_name).'  <small>'.esc_attr($tm_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
	/*
	Default: bottom of menu structure #Default: bottom of menu structure
	2 – Dashboard
	4 – Separator
	5 – Posts
	10 – Media
	15 – Links
	20 – Pages
	25 – Comments
	59 – Separator
	60 – Appearance
	65 – Plugins
	70 – Users
	75 – Tools
	80 – Settings
	99 – Separator
	For the Network Admin menu, the values are different: #For the Network Admin menu, the values are different:
	2 – Dashboard
	4 – Separator
	5 – Sites
	10 – Users
	15 – Themes
	20 – Plugins
	25 – Settings
	30 – Updates
	99 – Separator
	*/
);



/**
 *  FRAMEWORK OPTIONS
 */
$tm_framework_options = array();


// Layout Settings
$tm_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_attr__('Layout Settings', 'minemo'),
	'icon'   => 'fa fa-square-o',
	'fields' => array( // begin: fields
		
		array(
			'type'    	=> 'heading',
			'content'		=> esc_attr__('Specify theme pages layout, the skin coloring and background', 	'minemo'),
        ),
		array(
			'id'         => 'skincolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Skin Color', 'minemo' ),
			'default'    => '#e33b28',	
		),
		array(
			'id'         => 'secondarycolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Primary Dark BG Color', 'minemo' ),
			'default'    => '#000000',	
		),
		array(
			'id'         => 'secondary-greycolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Primary Grey BG Color', 'minemo' ),
			'default'    => '#faf7f4',	
		),
		array(
			'id'        => 'layout',
			'type'      => 'radio',
			'title'     => esc_attr__('Pages Layout', 'minemo'), 
			'options'  	=> array(
							'wide'     => esc_attr__('Wide', 'minemo'),
							'boxed'    => esc_attr__('Boxed', 'minemo'),
							'framed'   => esc_attr__('Framed', 'minemo'),
							'rounded'  => esc_attr__('Rounded', 'minemo'),
							'fullwide' => esc_attr__('Full Wide', 'minemo'),
						),
			'default'   => 'wide',
			'after'   	=> '<small>'.esc_attr__('Specify the layout for the pages', 'minemo').'</small>',
        ),
		array(
			'id'        => 'full_wide_elements',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Elements for Full Wide View (in above option)', 'minemo'),
			'options'   => array(
					'floatingbar' => esc_attr__('Floating Bar', 'minemo'),
					'topbar'      => esc_attr__('Topbar', 'minemo'),
					'header'      => esc_attr__('Header', 'minemo'),
					'content'     => esc_attr__('Content Area', 'minemo'),
					'footer'      => esc_attr__('Footer', 'minemo'),
					),
			'default'    => array( 'header' ),
			'after'    	 => '<small>'.esc_attr__('Select elements that you want to show in full-wide view', 'minemo').'</small>',
			'dependency' => array( 'layout_fullwide', '==', 'true' ),
		),
		
		array(
			'id'        => 'layout_type',
			'type'      => 'radio',
			'title'     => esc_attr__('Layout Type', 'minemo'), 
			'options'  	=> array(
							'white'     => esc_attr__('White Layout (default)', 'minemo'),
							'dark'    	=> esc_attr__('Dark Layout', 'minemo'),
						),
			'default'   => 'white',
			'after'   	=> '<small>'.esc_attr__('You can switch to dark layout from here. Default is white.', 'minemo').'</small>',
        ),
		
		array(
			'type'      	=> 'heading',
			'content'     	=> esc_attr__('Background Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Set below background options. Background settings will be applied to Boxed layout only', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'global_background',
			'type'   		=> 'preyantechnosys_background',
			'title' 		=> esc_attr__('Body Background Properties', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'minemo').'</div>',
			'default'		=> array(
			'color'			=> '#ffffff',
			),
			'output'        => 'body',
        ),
		array(
			'id'     		=> 'inner_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Content Area Background Properties', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for content area', 'minemo').'</div>',
			'default' 		=> array(
				'color' 	=> '#ffffff',
			),
			'output'        => 'body #main,.preyantechnosys-sticky-footer .site-content-wrapper',
        ),

        array(
			'type'        => 'heading',
			'content'     => esc_attr__('Gradient Color', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Select Gradient Color for the site', 'minemo').'</small>',
		),

        array(
			'id'     		=> 'gradient_color_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Use Gradient Color', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide Gradient for site.', 'minemo') . '</div>',
		),
		array(
			'id'         => 'gradient_color_one',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Gradient Color One', 'minemo' ),
			'default'    => '#fe5603',	
			'dependency' => array( 'gradient_color_show', '==', 'true' ),
		),
		array(
			'id'         => 'gradient_color_two',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Gradient Color Two', 'minemo' ),
			'default'    => '#ff7f00',	
			'dependency' => array( 'gradient_color_show', '==', 'true' ),
		),
			
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Pre-loader Image', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'preloader_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Pre-loader animation', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide pre-loader animation.', 'minemo') . '</div>',
		),
		array(
			'id'          => 'loaderimg',
			'type'        => 'image_select',
			'title'       => esc_attr__('Page-loader Image', 'minemo'), 
			'options'     => array(
					''   	=> get_template_directory_uri() . '/images/loader-none.gif',
					'1'   	=> get_template_directory_uri() . '/images/loader1.gif',
					'2'   	=> get_template_directory_uri() . '/images/loader2.gif',
					'3'   	=> get_template_directory_uri() . '/images/loader3.gif',
					'4'   	=> get_template_directory_uri() . '/images/loader4.gif',
					'5'   	=> get_template_directory_uri() . '/images/loader5.gif',
					'6'   	=> get_template_directory_uri() . '/images/loader6.gif',
					'7'   	=> get_template_directory_uri() . '/images/loader7.gif',
					'8'   	=> get_template_directory_uri() . '/images/loader8.gif',
					'9'   	=> get_template_directory_uri() . '/images/loader9.gif',
					'10'   	=> get_template_directory_uri() . '/images/loader10.gif',
					'11'   	=> get_template_directory_uri() . '/images/loader11.gif',
					'12'   	=> get_template_directory_uri() . '/images/loader12.gif',
					'13'   	=> get_template_directory_uri() . '/images/loader13.gif',
					'14'   	=> get_template_directory_uri() . '/images/loader14.gif',
					'15'   	=> get_template_directory_uri() . '/images/loader15.gif',
					'16'   	=> get_template_directory_uri() . '/images/loader16.gif',
					'17'   	=> get_template_directory_uri() . '/images/loader17.gif',
					'18'   	=> get_template_directory_uri() . '/images/loader18.gif',
					'custom'=> get_template_directory_uri() . '/images/loader-custom.gif',
				),
			'radio'       => true,
			'default'     => '',
			'after'   	  => '<div class="cs-text-muted">' . esc_attr__('Please select site pre-loader image.', 'minemo') . '<br/><br/><em><strong>' . esc_attr__( 'NOTE:', 'minemo' ) . '</strong> ' . esc_attr__( 'Please note that if you uploaded pre-loader image (in below option) than this pre-defined loader image will be ignored.', 'minemo' ) . '</em></div>',
			'dependency' => array( 'preloader_show', '==', 'true' ),
        ),
		array(
			'id'       		=> 'loaderimage_custom',
			'type'      	=> 'image',
			'title'    		=> esc_attr__('Upload Page-loader Image', 'minemo'),
			'add_title' 	=> 'Select/Upload Page-loader image',
			'after'  		=> '<div class="cs-text-muted">' . esc_attr__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'minemo') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" target="_blank">' . esc_attr__('Click here to go to Anmizer website.', 'minemo') . '</a><br/><br/><em><strong>' . esc_attr__('NOTE:', 'minemo') . '</strong>' . esc_attr__('Please note that if you selected image here than the pre-defined loader image (in above option) will be ignored.', 'minemo') . '</em></div>',
			'dependency'    => array( 'loaderimg_custom', '==', 'true' ),
        ),
		array(
			'type'      => 'heading',
			'content'   => esc_attr__('One Page Website', 'minemo'),
			'after'  	=> '<small>'.esc_attr__('Options for One Page website', 'minemo').'</small>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_attr__('One Page Site', 'minemo'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted">'.esc_attr__('Set this option "ON" if your site is one page website', 'minemo').' <a target="_blank" href="#">'.esc_attr__('Click here to know more about how to setup one-page site.', 'minemo').'</a></div>',
        ),
		
	),
	
);


// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($minemo_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $minemo_theme_options['hide_demo_content_option'];
}

if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	$tm_framework_options_inner = $tm_framework_options[0];
	foreach( $tm_framework_options_inner['fields'] as $index => $option ){
		if( !empty($option['type']) && $option['type'] == 'preyantechnosys_one_click_demo_content' ){
			unset($tm_framework_options[0]['fields'][$index]);
		}
	}
}

// Font Settings
$tm_framework_options[] = array(
	'name'   => 'font_settings', // like ID
	'title'  => esc_attr__('Font Settings', 'minemo'),
	'icon'   => 'fa fa-text-height',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Font Settings', 'minemo'),
			'after'  	=> '<small>'.esc_attr__('General Element Fonts', 'minemo').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('General Font', 'minemo'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => 'body,.elementor-widget-text-editor,.elementor-widget-icon-list .elementor-icon-list-item,.elementor-widget-accordion .elementor-accordion .elementor-tab-content,.elementor-widget-tabs .elementor-tab-content', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_attr__('Select font family, size etc. for H2 heading tag.', 'minemo'),
			'default'        => array (
				'family'			=> 'Kumbh Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '16',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#525252',
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
		),
		
		array(
			'id'         => 'blackish_buttoncolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Global Dark Text Color', 'minemo' ),
			'default'    => '#000000',	
		),
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_attr__('Select Link Color', 'minemo'), 
			'options'  	=> array(
				'default'   => esc_attr__('Dark color as normal color and Skin color as hover color', 'minemo'),
				'darkhover' => esc_attr__('Skin color as normal color and Dark color as hover color', 'minemo'),
				'custom'    => esc_attr__('Custom color (select below)', 'minemo'),
				
			),
			'default'   => 'custom',
			'std'       => 'default',
			'after'   	=> '<div class="cs-text-muted">' . esc_attr__('Select normal link color effect. This will change normal text link color and hover color', 'minemo') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Regular)', 'minemo' ),
			'default'    => '#000000',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Hover)', 'minemo' ),
			'default'    => '#e33b28',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('H1 Heading Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '35',
				'line-height'		=> '45',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H1 heading tag.', 'minemo').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('H2 Heading Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '33',
				'line-height'		=> '43',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H2 heading tag.', 'minemo').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'preyantechnosys_typography',
			'chosen'      => false,
			'title'       => esc_attr__('H3 Heading Font', 'minemo'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h3, h3.prt-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '30',
				'line-height'		=> '40',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H3 heading tag.', 'minemo').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('H4 Heading Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h4,.preyantechnosys-box-blog .preyantechnosys-box-content h4,.preyantechnosys-box-service .preyantechnosys-box-title h4,h4.prt-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '20',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H4 heading tag.', 'minemo').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('H5 Heading Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h5,h5.prt-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '18',
				'line-height'		=> '28',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H5 heading tag.', 'minemo').'</div>',
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('H6 Heading Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h6,h6.prt-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '21',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H6 heading tag.', 'minemo').'</div>',
		),
		
		
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Heading and Subheading Font Settings', 'minemo'),
			'after'  	  => '<small>'.esc_attr__('Select font settings for Heading and subheading of different title elements like Blog Box, Portfolio Box etc', 'minemo').'</small>',
		),
		
		array(
			'id'          => 'heading_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('Heading Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.prt-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '50',
				'line-height'		=> '60',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'minemo').'</div>',
		),
		array(
			'id'     		 => 'resposive_heading_font',
			'type'   		 => 'number',
			'title'          => esc_attr__( 'Mobile Heading Font', 'minemo' ),
        ),
		array(
			'id'          => 'subheading_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('Subheading Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,							
			'output'         => '.prt-element-heading-content-wrapper .prt-element-subheading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '14',
				'line-height'		=> '24',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '2',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'minemo').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('Content Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.prt-element-content-desctxt', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Kumbh Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '16',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#525252',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for content', 'minemo').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Specific Element Fonts', 'minemo'),
			'after'  	  => '<small>'.esc_attr__('Select Font for specific elements', 'minemo').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'preyantechnosys_typography', 
			'title'       => esc_attr__('Widget Title Font', 'minemo'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .preyantechnosys-portfolio-details h2, .preyantechnosys-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '20',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for widget title', 'minemo').'</div>',
		),
		
		array(
			'id'             => 'element_title',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Element Title Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.elementor-widget-progress .elementor-title,.elementor-widget-accordion .elementor-accordion .elementor-accordion-title,.elementor-widget-tabs .elementor-tab-title, .elementor-widget-tabs .elementor-tab-title a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'		=> 'Krona One',
				'backup-family'	=> 'Arial, Helvetica, sans-serif',
				'variant'		=> 'regular',
				'font-size'		=> '18',
				'font'			=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'minemo').'</div>',
		),	
	)
);


// Floating Bar Settings
$tm_framework_options[] = array(
	'name'   => 'floatingbar_settings', // like ID
	'title'  => esc_attr__('Floating Bar Settings', 'minemo'),
	'icon'   => 'fa fa-arrow-circle-o-up',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Floating Bar Settings', 'minemo'),
        ),
		array(
			'id'     		=> 'fbar_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Floating Bar', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Floating Bar', 'minemo').'</div>',
        ),
		array(
			'id'      => 'fbar-position',
			'type'    => 'radio',
			'title'   => esc_attr__('Floating bar position', 'minemo'),
			'options' => array(
				'default' => esc_attr__('Top','minemo'),
				'right'   => esc_attr__('Right', 'minemo'),
			),
			'default'    => 'default',
			'after'      => '<div class="cs-text-muted"><br>'.esc_attr__('Position for Floating bar', 'minemo').'</div>',
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'            => 'fbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Background Color', 'minemo'),
			'options'  		=> array(
				'darkgrey'    => esc_attr__('Dark grey', 'minemo'),
				'grey'        => esc_attr__('Grey', 'minemo'),
				'white'       => esc_attr__('White', 'minemo'),
				'skincolor'   => esc_attr__('Skincolor', 'minemo'),
				'custom'      => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'custom',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Floating Bar background color', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'fbar_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Floating Bar Background Properties', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Floating bar. You can set color or image and also set other background related properties', 'minemo').'</div>',
			'color'			=> true,
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/floatingbar-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'left top',
				'attachment'	=> 'scroll',
				'color'			=> '#7eba03',
				'size'		  	=> 'cover',
			),
			'output' 	        => '.preyantechnosys-fbar-box-w',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
			
        ),
		array(
			'id'            => 'fbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Text Color', 'minemo'),
			'options' 		=> array(
				'white'			=> esc_attr__('White', 'minemo'),
				'darkgrey'		=> esc_attr__('Dark', 'minemo'),
				'custom'		=> esc_attr__('Custom color', 'minemo'),
							),
			'default'		=> 'darkgrey',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'fbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Custom Color for text', 'minemo' ),
			'default'		 => '#dd3333',
			'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar', 'minemo').'</div>',
        ),
		
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Floating Bar Open/Close Button Settings', 'minemo'),
			'after'		=> '<small>' . esc_attr__('Settings for Floating Bar Open/Close Button', 'minemo') . '</small>',
			
        ),
		array(
			'id'      => 'fbar_handler_icon',
			'type'    => 'textarea',
			'title'   => esc_attr__('Open Link Icon', 'minemo' ),
			'default' => '<i class="prt-minemo-icon-th"></i>',
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'      => 'fbar_handler_icon_close',
			'type'    => 'textarea',
			'title'   => esc_attr__('Close Link Icon', 'minemo' ),
			'default' => '<i class="prt-minemo-icon-close"></i>',
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		
		array(
			'id'            => 'fbar_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open/Close Icon Color', 'minemo'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'minemo'),
					'grey'       => esc_attr__('Grey', 'minemo'),
					'white'      => esc_attr__('White', 'minemo'),
					'skincolor'  => esc_attr__('Skincolor', 'minemo'),
			),
			'default'		=> 'dark',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'minemo').'</div>',
        ),
		
		array(
			'id'            => 'fbar_btn_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open/Close Button Background Color', 'minemo'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'minemo'),
					'grey'       => esc_attr__('Grey', 'minemo'),
					'white'      => esc_attr__('White', 'minemo'),
					'skincolor'  => esc_attr__('Skincolor', 'minemo'),
					'custom'	 => esc_attr__('Custom color', 'minemo'),
			),
			'default'		=> 'custom',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'minemo').'</div>',
        ),
		
		array(
			'id'     		 => 'fbar_btn_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Open/Close Button Custom Background Color', 'minemo' ),
			'default'		 => '#000000',
			'output' 	        => '.preyantechnosys-fbar-btn-link',
			'dependency'  	 => array( 'fbar_show|fbar_btn_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar Button', 'minemo').'</div>',
        ),

		array(
			'type'    	 => 'heading',
			'content'	 => esc_attr__('Floating Bar Widget Settings', 'minemo'),
			'after'		 => '<small>' . esc_attr__('Settings for Floating Bar Widgets', 'minemo') . '</small>',
			'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
        ),
		array(
			'id'			=> 'fbar_widget_column_layout',
			'type' 			=> 'image_select',//preyantechnosys_pre_color_packages
			'title'			=> esc_attr__('Floating Bar Widget Columns', 'minemo'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '8_4',
			'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Floating Bar Column layout View for widgets.', 'minemo').'</div>',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Floating Bar in Small Devices', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Floating Bar in small devices like mobile, tablet etc.', 'minemo').'</small>',
			'dependency'     => array('fbar_show','==','true'),
		),
		array(
			'id'       => 'floatingbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Floating Bar in Responsive Mode', 'minemo'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Floating Bar.', 'minemo'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','minemo'),
				'1200'     => esc_attr__('Show only on large devices','minemo').' <small>'.esc_attr__('show only on desktops (>1200px)', 'minemo').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','minemo').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'minemo').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','minemo').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'minemo').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'minemo'),
			),
			'dependency' => array('fbar_show','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'floatingbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Floating Bar (in pixel)', 'minemo' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Floating Bar will be hidden.', 'minemo' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Topbar Settings
$tm_framework_options[] = array(
	'name'   => 'topbar_settings', // like ID
	'title'  => esc_attr__('Topbar Settings', 'minemo'),
	'icon'   => 'fa fa-tasks',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Topbar settings', 'minemo'),
        ),
		array(
			'id'     		=> 'show_topbar',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Topbar', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Topbar', 'minemo').'</div>',
        ),
		array(
			'id'            => 'topbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Background Color', 'minemo'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
								'grey'       => esc_attr__('Grey', 'minemo'),
								'white'      => esc_attr__('White', 'minemo'),
								'skincolor'  => esc_attr__('Skincolor', 'minemo'),
								'gradient'   => esc_attr__('Gradient Color', 'minemo'),
								'custom'     => esc_attr__('Custom Color', 'minemo'),
							),
			'default'       => 'darkgrey',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Topbar background color', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'topbar_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Background Color', 'minemo' ),
			'default'		 => 'rgba(0,0,0,0)',
			'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Topbar', 'minemo').'</div>',
        ),
		array(
			'id'            => 'topbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Text Color', 'minemo'),
			'options'  => array(
							'white'     => esc_attr__('White', 'minemo'),
							'dark'      => esc_attr__('Dark', 'minemo'),
							'skincolor' => esc_attr__('Skin Color', 'minemo'),
							'custom'    => esc_attr__('Custom color', 'minemo'),
						),
			'default'       => 'white',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'topbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Color for text', 'minemo' ),
			'default'		 => 'rgba(0, 0, 255, 0.25)',
			'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for Topbar Text', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'topbar_text_fontsize',
			'type'   		=> 'number',
			'title'         => esc_attr__('Topbar Text Size', 'minemo' ),
			'default'		=> '14',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
        ),
		array(
			'id'        	=> 'topbar_border_on_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Show Border at Bottom of Topabar', 'minemo'),
			'label'     	=> esc_attr__('YES', 'minemo'),
			'default'   	=> false,
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Yes if you want border at bottom of topbar)', 'minemo').'</div>',
		),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Topbar Content Options', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Content for Topbar', 'minemo').'</small>',
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
		),
		array(
			'id'       		 => 'topbar_left_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Left Content', 'minemo'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Left side of Topbar area', 'minemo').'</div>',
			'default'        => '<ul class="top-contact"><li><span class="prt-skincolor">Loctaion : </span>envanto hq 24 fifth, australia</li><li><span class="prt-skincolor">Email : </span><a href="mailto:info@example.com">info@example.com</a></li></ul>',
        ),
		array(
			'id'       		 => 'topbar_right_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Right Content', 'minemo'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Right side of Topbar area', 'minemo').'</div>',
			'after'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('HTML tags and shortcodes are allowed', 'minemo') . sprintf( esc_attr__('%1$s Click here to know more %2$s about shortcode description','minemo') , '<a href="'. esc_url('https://preyantechnosys.com/wordpress/minemo/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
			'default'  => '<ul class="top-contact"><li><span class="prt-skincolor">Talk To Expert : </span><a href="tel:1234567890">+01 (143) 456 7899</a></li>[prt-social-links]</ul>',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Topbar Bar in Small Devices', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Topbar Bar in small devices like mobile, tablet etc.', 'minemo').'</small>',
			'dependency'     => array('show_topbar','==','true'),
		),
		array(
			'id'       => 'topbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Topbar Bar in Responsive Mode', 'minemo'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Topbar Bar.', 'minemo'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','minemo'),
				'1200'     => esc_attr__('Show only on large devices','minemo').' <small>'.esc_attr__('show only on desktops (>1200px)', 'minemo').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','minemo').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'minemo').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','minemo').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'minemo').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'minemo'),
			),
			'dependency' => array('show_topbar','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'topbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Topbar (in pixel)', 'minemo' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Topbar will be hidden.', 'minemo' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Titlebar Settings
$tm_framework_options[] = array(
	'name'   => 'titlebar_settings', // like ID
	'title'  => esc_attr__('Titlebar Settings', 'minemo'),
	'icon'   => 'fa fa-align-justify',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Background Options', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'minemo').'</small>',
		),
		array(
			'id'            => 'titlebar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Background Color', 'minemo'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
							'grey'       => esc_attr__('Grey', 'minemo'),
							'white'      => esc_attr__('White', 'minemo'),
							'skincolor'  => esc_attr__('Skincolor', 'minemo'),
							'gradient'   => esc_attr__('Gradient Color', 'minemo'),
							'custom'     => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'titlebar_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Titlebar Background Image', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'minemo').'</div>',
			'color'			=> true,
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> 'rgba(17,24,30,0.01)',
			),
			'output' 	    => 'div.prt-titlebar-wrapper',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'            => 'titlebar_style',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Style', 'minemo'),
			'options'  => array(
							'style1'   => esc_attr__('Style 1', 'minemo'),
							'default'      => esc_attr__('Default', 'minemo'),
			),
			'default'       => 'default',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select styles for Titlebar', 'minemo').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Font Settings', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'minemo').'</small>',
		),
		array(
			'id'            => 'titlebar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Color', 'minemo'),
			'options'  => array(
							'white'  => esc_attr__('White', 'minemo'),
							'dark'   => esc_attr__('Dark', 'minemo'),
							'custom' => esc_attr__('Custom Color', 'minemo'),
						),
			'default'       => 'dark',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
        ),
		array(
			'id'             => 'titlebar_heading_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Heading Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.prt-titlebar h1.entry-title, .prt-titlebar-textcolor-custom .prt-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '70',
				'line-height'		=> '80',
				'text-transform'	=> 'none',
				'color'				=> '#20292f',
				'font'				=> 'google',
			),
			'after'			=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'minemo').'</div>',
		),
		array(
			'id'             => 'titlebar_subheading_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Sub-heading Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.prt-titlebar .entry-subtitle, .prt-titlebar-textcolor-custom .prt-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
			'units'			 => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Kumbh Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '16',
				'line-height'		=> '28',
				'letter-spacing'	=> '0',
				'color'				=> '#20292f',
				'font'				=> 'google',
			),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'minemo').'</div>',
		),
		array(
			'id'             => 'titlebar_breadcrumb_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Breadcrumb Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.prt-titlebar .breadcrumb-wrapper, .prt-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '16',
				'line-height'		=> '28',
				'letter-spacing'	=> '0',
				'color'				=> '#686e73',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'minemo').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Content Options', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'minemo').'</small>',
		),
		array(
			'id'            => 'titlebar_view',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Align', 'minemo'),
			'options'       => array(
							'default'  => esc_attr__('All Center (default)', 'minemo'),
							'left'     => esc_attr__('Title Left / Breadcrumb Right', 'minemo'),
							'right'    => esc_attr__('Title Right / Breadcrumb Left', 'minemo'),
							'allleft'  => esc_attr__('All Left', 'minemo'),
							'allright' => esc_attr__('All Right', 'minemo'),
			),
			'default'       => 'default',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select text align in Titlebar', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'titlebar_height',
			'type'   		 => 'number',
			'title'          => esc_attr__( 'Titlebar Height', 'minemo' ),
			'after'  	  	 => ' px<br><div class="cs-text-muted">'.esc_attr__('Set height of the Titlebar. In pixel only', 'minemo').'</div>',
			'default'		 => '156',
        ),
		array(
			'id'     		 => 'resposive_titlebar_height',
			'type'   		 => 'number',
			'title'          => esc_attr__( 'Responsive Titlebar Height', 'minemo' ),
			'after'  	  	 => ' px<br><div class="cs-text-muted">'.esc_attr__('Set height of the Titlebar for small screen', 'minemo').'</div>',
			'dependency' 	=> array( 'advance_themecolors_advance_color', '==', 'true' ),
        ),
		array(
			'id'        	=> 'breadcrumb_on_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Show Breadcrumb on bottom of Titlebar area', 'minemo'),
			'label'     	=> esc_attr__('YES', 'minemo'),
			'default'   	=> false,
			'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'minemo').'</div>',
		),
		array(
			'id'        	=> 'breadcrumb_border_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Hide Go to Content Arrow bottom of Titlebar', 'minemo'),
			'label'     	=> esc_attr__('YES', 'minemo'),
			'default'   	=> false,
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select this option if you like to show breadcrumbs border bottom of Titlebar', 'minemo').'</div>',
		),
		array(
			'id'            => 'breadcum_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Breadcrumb Background Color', 'minemo'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
							'grey'       => esc_attr__('Grey', 'minemo'),
							'white'      => esc_attr__('White', 'minemo'),
							'skincolor'  => esc_attr__('Skincolor', 'minemo'),
							'custom'     => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'custom',
			'dependency' 	=> array( 'breadcrumb_on_bottom', '==|==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for breadcrumb background color', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'breadcrumb_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Breadcrumb Custom Background Color', 'minemo' ),
			'default'		 => 'rgba(0,0,0,0.50)',
			'dependency'  	 => array( 'breadcrumb_on_bottom|breadcum_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Breadcrumb', 'minemo').'</div>',
        ),
		array(
			'id'            => 'titlebar_hide_breadcrumb',
			'type'          => 'select',
			'title'         =>  esc_attr__('Hide Breadcrumb', 'minemo'),
			'options'  => array(
							'no'   => esc_attr__('NO, show the breadcrumb', 'minemo'),
							'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'minemo'),
			),
			'default'       => 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'minemo').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Extra Options', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Change settings for some extra options in Titlebar', 'minemo').'</small>',
		),
		array(
			'id'      => 'adv_tbar_catarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Category "Category Archives:" Label Text', 'minemo'),
			'default' => esc_attr__('Category Archives: ', 'minemo'),
		),
		array(
			'id'      => 'adv_tbar_tagarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Tag "Tag Archives:" Label Text', 'minemo'),
			'default' => esc_attr__('Tag Archives: ', 'minemo'),
		),
		array(
			'id'      => 'adv_tbar_postclassified',
			'type'    => 'text',
			'title'   => esc_attr__('Post Taxonomy "Posts classified under:" Label Text', 'minemo'),
			'default' => esc_attr__('Posts classified under: ', 'minemo'),
		),
		array(
			'id'      => 'adv_tbar_authorarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Author "Author Archives:" Label Text', 'minemo'),
			'default' => esc_attr__('Author Archives: ', 'minemo'),
		),

	)
);


// Header Settings
$tm_framework_options[] = array(
	'name'   => 'header_settings', // like ID
	'title'  => esc_attr__('Header Settings', 'minemo'),
	'icon'   => 'fa fa-arrow-up',
	'fields' => array( // begin: fields
	
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Header Settings', 'minemo'),
        ),
		array(
			'id'     		 => 'header_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Header Height (in pixel)', 'minemo' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area from here', 'minemo').'</div>',
			'default'		 => '100',
        ),
		array(
			'id'            => 'header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Background Color', 'minemo'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
							'grey'       => esc_attr__('Grey', 'minemo'),
							'white'      => esc_attr__('White', 'minemo'),
							'skincolor'  => esc_attr__('Skincolor', 'minemo'),
							'custom'     => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Header background color', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Custom Background Color', 'minemo' ),
			'default'		 => 'rgba(26,34,39,0.73)',
			'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'vertical_header_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Header Background Properties', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Header. You can set color or image and also set other background related properties', 'minemo').'</div>',
			'dependency'  	=> array( 'header_style', 'any', 'classic-vertical' ),
			'default'		=> array(
				'image'			=> '',
				'size'			=> 'cover',
				'color'			=> 'rgba(26,34,39,0.73)',
			),
			'output' 	    => '.prt-header-style-classic-vertical .site-header',
        ),
		array(
			'id'     		 => 'responsive_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Responsive Header Custom Background Color', 'minemo' ),
			'default'		 => '#000000',
			'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|classic,classic-overlay,classic-overlay-rtl' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'minemo').'</div>',
        ),
		array(
			'id'            => 'header_responsive_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Responsive Icon Color', 'minemo'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'minemo'),
							'white'  => esc_attr__('White', 'minemo'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'minemo').'</div>',
			'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
        ),
		array(
          'id'      	 	 => 'logotype',
          'type'     		 => 'radio',
          'title'    		 => esc_attr__('Logo type', 'minemo'), 
          'options' 		 => array( 
								'text' => esc_attr__('Logo as Text', 'minemo'), 
								'image' => esc_attr__('Logo as Image', 'minemo') 
							),
          'default'  		 => 'image',
          'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of logo. It can Text or Image', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'logotext',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Logo Text', 'minemo'),
			'default' 		 => 'Minemo',
			'dependency'  	 => array( 'logotype_text', '==', 'true' ),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Enter the text to be used instead of the logo image', 'minemo').'</div>',
		),
		array(
			'id'             => 'logo_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Logo Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
			'default'        => array(
				'family'		 => 'Syne',
				'backup-family'	 => 'Arial, Helvetica, sans-serif',
				'variant'		 => 'regular',
				'font-size'		 => '26',
				'line-height'	 => '27',
				'letter-spacing' => '0',
				'color'			 => '#000000',
				'font'			 => 'google',
			),
			'dependency'  	=> array( 'logotype_text', '==', 'true' ),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This will be applied to logo text only. Select Logo font-style and size', 'minemo').'</div>',
		),
		
		array(
			'id'       		 => 'logoimg',
			'type'     		 => 'preyantechnosys_image',
			'title'    		 => esc_attr__('Logo Image', 'minemo'),
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'minemo') . sprintf(__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'minemo'),'<strong>', '</strong>').'</div>',
			'add_title'		 => esc_attr__('Upload Site Logo','minemo'),
			'default'		 => array(
					'thumb-url'	=> get_template_directory_uri() . '/images/logo.svg',
					'full-url'	=> get_template_directory_uri() . '/images/logo.svg',
			),
        ),
		array(
			'id'     		 => 'logo_max_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height', 'minemo' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'minemo').'</div>',
			'default'		 => '45',
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
        ),
		array(
			'id'     		 => 'logo_mob_max_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height For Mobile Screen', 'minemo' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'minemo').'</div>',
			'default'		 => '45',
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Sticky Header', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options for sticky header', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'sticky_header',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Enable Sticky Header', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select ON if you want the sticky header on page scroll', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'header_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Sticky Header Height (in pixel)', 'minemo' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area when it becomes sticky', 'minemo').'</div>',
			'default'		 => '100',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		array(
			'id'            => 'sticky_header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Background Color', 'minemo'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
							'grey'       => esc_attr__('Grey', 'minemo'),
							'white'      => esc_attr__('White', 'minemo'),
							'skincolor'  => esc_attr__('Skincolor', 'minemo'),
							'custom'     => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'white',
			'dependency'    => array( 'sticky_header', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Sticky Header background color', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Custom Background Color', 'minemo' ),
			'default'		 => 'rgba(21,21,21,0.96)',
			'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Sticky Header', 'minemo').'</div>',
        ),
		array(
			'id'       		 => 'logoimg_sticky',
			'type'     		 => 'preyantechnosys_image',
			'title'    		 => esc_attr__('Logo Image for Sticky Header', 'minemo'),
			'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for sticky header', 'minemo').'</div>',
			'add_title'		 => esc_attr__('Upload Sticky Logo','minemo'),
		),
		array(
			'id'     		 => 'logo_max_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height when Sticky Header', 'minemo' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set logo when the header is sticky', 'minemo').'</div>',
			'default'		 => '45',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Search Button in Header', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Option to show or hide search button in header area', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'header_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Button', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'search_input',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Input Word', 'minemo'),
			'default' 		 => esc_attr__('Type Word Then Enter..', 'minemo'),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'minemo').'</div>',
			'dependency'     => array( 'header_search', '==', 'true' ),
		),
		array(
			'id'     		 => 'searchform_title',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Title', 'minemo'),
			'default' 		 => '',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the title for search form. Default: "Hi, How Can We Help You?"', 'minemo').'</div>',
			'dependency'     => array( 'header_search', '==', 'true' ),
		),
		array(
			'id'      			=> 'header_search_bgall',
			'type'    			=> 'preyantechnosys_background',
			'title'  			=> esc_attr__('Search Form Background', 'minemo' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Set Header Search Form background', 'minemo').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center center',
				'attachment'		=> 'fixed',
				'size'				=> 'cover',
				'color'			=> 'rgba(35,35,35,0.95)',
			),
			'output'			=> '.prt-search-overlay',
			'dependency'     => array( 'header_search', '==', 'true' ),
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Header Style', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change header style', 'minemo').'</small>',
		),
		array(
			'id'			=> 'headerstyle',
			'type' 			=> 'image_select',//preyantechnosys_pre_color_packages
			'title'			=> esc_attr__('Select Header Style', 'minemo'),
			'desc'     		=> esc_attr__('Please select header style', 'minemo'),
			'wrap_class'    => 'prt-header-style',
			'options'      	=> array(
				'classic'				=> get_template_directory_uri() . '/inc/images/header-classic.png',
                'classic-overlay'		=> get_template_directory_uri() . '/inc/images/header-overlay.png',
                'classic-overlay2'		=> get_template_directory_uri() . '/inc/images/header-overlay2.png',
                'infostack'				=> get_template_directory_uri() . '/inc/images/header-infostack.png',

				
			),
			'default'		=> 'classic',
			'attributes' 	=> array(
			'data-depend-id' => 'header_style'
			),
			'radio' 		=> true,//This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Special options for selected header', 'minemo'),
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,classic-overlay2,infostack,infostack-rtl,classic-box-overlay,toplogo,classic-three' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  	  	 => '<small>'.esc_attr__('These options will appear for selected header style only.', 'minemo').'</small>',
        ),
		array(
			'id'       		 => 'header_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Text Area', 'minemo'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,toplogo,classic-overlay2,classic-box-overlay,classic-three' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear before Search/Cart icon in header area. This option will work for currently selected header style only', 'minemo').'</div>',
			'default'        => '',
        ),
        array(
			'id'           	=> 'border_below_header_area',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border Below Header', 'minemo'),
			'options'  		=> array(
				'none'			=> esc_attr__('None', 'minemo'),
				'white'			=> esc_attr__('White', 'minemo'),
				'dark'			=> esc_attr__('Dark', 'minemo'),
			),
			'default'      	=> 'none',
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,toplogo,classic-overlay2,classic-box-overlay,classic-three' ), // 
        ),
         array(
			'id'     		=> 'show_headerbutton',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Button in Header', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide button in header', 'minemo').'</div>',
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,toplogo,classic-box-overlay,classic-three'),
        ),
		array(
			'id'       		 => 'header_button_text',
			'type'     		 => 'text',
			'title'    		 =>  esc_attr__('Header Button text', 'minemo'),
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,toplogo,classic-box-overlay,classic-three' ),
        ),
		array(
			'id'       		 => 'header_button_linkurl',
			'type'     		 => 'text',
			'title'    		 =>  esc_attr__('Header Button Link', 'minemo'),
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,toplogo,classic-box-overlay,classic-three'),
        ),
          array(
			'id'           	=> 'header_button_bgcolor',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Header button Background', 'minemo'),
			'options'  		=> array(
				'none'			=> esc_attr__('None', 'minemo'),
				'skin'			=> esc_attr__('skin', 'minemo'),
				'dark'			=> esc_attr__('Dark', 'minemo'),
				'white'			=> esc_attr__('white', 'minemo'),
			),
			'default'      	=> 'skin',
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic-two,classic-overlay,classic-rtl,classic-overlay-rtl,toplogo,classic-box-overlay,classic-three' ), // 
        ),
		array(
			'id'            => 'header_menu_position',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Position', 'minemo'),
			'options'  		=> array(
								'left'		=> esc_attr__('Left Align', 'minemo'),
								'right'		=> esc_attr__('Right Align', 'minemo'),
								'center'	=> esc_attr__('Center Align', 'minemo'),
							),
			'default'       => 'right',
			'dependency'  	=> array( 'header_style', 'any', 'classic,classic-two,classic-overlay,toplogo,classic-three' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Menu Position. This option will work for currently selected header style only ', 'minemo').'</div>',
        ),
		array(
			'id'       		 => 'infostack_column_one',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack First Column Content', 'minemo'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on first column', 'minemo').'</div>',
			'default'        => '',
			'dependency'  	 => array( 'header_style', 'any', 'infostack-rtl,infostack,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_two',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Second Column Content', 'minemo'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on second column', 'minemo').'</div>',
			'default'        => '',
			'dependency'  	 => array( 'header_style', 'any', 'infostack-rtl,infostack,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_three',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Third Column Content', 'minemo'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on third column', 'minemo').'</div>',
			'default'        => '',
			'dependency'  	 => array( 'header_style', 'any', 'infostack-rtl,infostack,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_phone_text1',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Right Content for Top', 'minemo'),
			'shortcode'		 => true,
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear after menu', 'minemo').'</div>',
			'default'        => '<ul class="top-contact">
<li><i class="prt-minemo-icon-pin"></i><span class="prt-text">Address:</span>183 Donato Parkway CA.set USA
</li>
<li class="prt-number"><i class="prt-minemo-icon-phone"></i><span class="prt-text">Call Us:</span><a href="tel:208555011289">(208) 555-0112 89</a></li>
</ul>

<li class="prt-social-facebook"><a class=" tooltip-top" target="_blank" href="https://www.facebook.com/preyantechnosys19" data-tooltip="Facebook">FB<i class="prt-minemo-icon-facebook"></i></a></li>
<li class="prt-social-Twitter"><a class=" tooltip-top" target="_blank" href="https://twitter.com/PreyanTechnosys" data-tooltip="Twitter">TW<i class="prt-minemo-icon-twitter"></i></a></li>
<li class="prt-social-LinkedIn"><a class=" tooltip-top" target="_blank" href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/" data-tooltip="LinkedIn">IN<i class="prt-minemo-icon-linkedin"></i></a></li>
<li class="prt-social-dribbble"><a class=" tooltip-top" target="_blank" href="#" data-tooltip="Facebook">DB<i class="prt-minemo-icon-dribbble"></i></a></li>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack-rtl,infostack,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_phone_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Right Content', 'minemo'),
			'shortcode'		 => true,
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear after menu', 'minemo').'</div>',
			'default'        => '<a href="https://minemo.preyantechnosys.com/contact-1/">Inquiry Now</a>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack-rtl,infostack,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		
		
		
		array(
			'type'    		=> 'notice',
			'class'   		=> 'info',
			'content'		=> '<p><strong>' . esc_attr__('Change widget content of the header', 'minemo') . '</strong> <br> ' . esc_attr__('You can change widgets content in the header area from Widgets section. Just go to "Appearance > Widgets" and modify widgets under "InfoStack header widgets" position.', 'minemo') . '</p>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'id'            => 'header_widget_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Widget Text Color', 'minemo'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'minemo'),
							'white'  => esc_attr__('White', 'minemo'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for Widgets text for Overlay header style. This is because the background is transparent so you should set it.', 'minemo').'</div>',
			'dependency'    => array( 'header_bg_color|header_style', '==|any', 'custom|infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
        ),
		array(
			'id'     		 => 'header_menuarea_height',
			'type'    		 => 'number',
			'title'   		 => esc_attr__('Menu area height', 'minemo'),
			'default' 		 => '70',
			'after'          => esc_attr(' px'),
			'attributes'     => array(
			'min'       	 => 40,
			),
			'subtitle'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Height for menu area only', 'minemo').'</div>',
			'dependency'     => array( 'header_style', 'any', 'infostack,infostack-rtl' ),
		),
		
			
		array(
			'id'            => 'header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Background Color', 'minemo'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
								'grey'       => esc_attr__('Grey', 'minemo'),
								'white'      => esc_attr__('White', 'minemo'),
								'skincolor'  => esc_attr__('Skincolor', 'minemo'),
								'custom'     => esc_attr__('Custom Color', 'minemo'),
							),
			'default'       => 'custom',
			'dependency'	=> array( 'header_style', 'any', 'infostack,infostack-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Menu Background Custom Background Color', 'minemo' ),
			'default'		 => 'rgba(221,51,51,0)',
			'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|infostack,infostack-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area', 'minemo').'</div>',
        ),
        array(
			'id'            => 'sticky_header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Menu Background Color', 'minemo'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
								'grey'       => esc_attr__('Grey', 'minemo'),
								'white'      => esc_attr__('White', 'minemo'),
								'skincolor'  => esc_attr__('Skincolor', 'minemo'),
								'custom'     => esc_attr__('Custom Color', 'minemo'),
							),
			'default'       => 'darkgrey',
			'dependency'	=> array( 'header_style', 'any', 'infostack,infostack-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header when header is sticky', 'minemo').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Menu Background Custom Background Color', 'minemo' ),
			'default'		 => 'rgba(129,215,66,0.7)',
			'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|infostack,infostack-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area when header is sticky', 'minemo').'</div>',
        ),
			
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Logo SEO', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options for Logo SEO', 'minemo').'</small>',
		),
		array(
			'id'      		=> 'logoseo',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Logo Tag for SEO', 'minemo'),
			'options' 		=> array(
								'h1homeonly' => esc_attr__('H1 for home, SPAN on other pages', 'minemo'),
								'allh1'      => esc_attr__('H1 tag everywhere', 'minemo'),
							),
			'default'		=> 'h1homeonly',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select logo tag for SEO purpose', 'minemo').'</div>',
        ),
	
		
	)
);


// Menu Settings
$tm_framework_options[] = array(
	'name'   => 'menu_settings', // like ID
	'title'  => esc_attr__('Menu Settings', 'minemo'),
	'icon'   => 'fa fa-bars',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Menu Settings', 'minemo'),
			'after'  	  	=> '<small>'.esc_attr__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'minemo').'</small>',
		),
		array(
			'id'      		=> 'menu_breakpoint',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Responsive Menu Breakpoint', 'minemo'),
			'options'  		=> array(
								'1200'   => esc_attr__('Large devices','minemo').' <small>'.esc_attr__('Desktops (>1200px)', 'minemo').'</small>',
								'992'    => esc_attr__('Medium devices','minemo').' <small>'.esc_attr__('Desktops and Tablets (>992px)', 'minemo').'</small>',
								'768'    => esc_attr__('Small devices','minemo').' <small>'.esc_attr__('Mobile and Tablets (>768px)', 'minemo').'</small>',
								'custom' => esc_attr__('Custom (select pixel below)', 'minemo'),
						),
			'default'		=> '1200',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Change options for responsive menu breakpoint', 'minemo').'</div>',
        ),
		
		array(
			'id'     		=> 'megamenu-override',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Override Max Mega Menu Style', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('We need to override some of the Max mega Menu plugin\'s settings to match with our theme. If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'minemo').'</div>',
        ),
		
		array(
			'id'     		=> 'megamenu-burger',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Burger Menu Style', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add burger Menu . If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'minemo').'</div>',
        ),
		
		array(
			'id'     		 => 'menu_breakpoint-custom',
			'type'   		 => 'number',
			'title'          => esc_attr__('Custom Breakpoint for Menu (in pixel)', 'minemo' ),
			'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
			'default'		 => '1200',
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Select after how many pixels the menu will become responsive', 'minemo').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Main Menu Options', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options for main menu in header', 'minemo').'</small>',
		),
		array(
			'id'             => 'mainmenufont',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Main Menu Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> 'uppercase',
				'font-size'			=> '12',
				'line-height'		=> '22',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select main menu font, color and size', 'minemo').'</div>',
		),
		
		
		
		array(
			'id'     		 => 'stickymainmenufontcolor',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Font Color for Sticky Header', 'minemo' ),
			'default'		 => '#000000',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Main menu font color when the header becomes sticky', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'mainmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Main Menu Active Link Color', 'minemo'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'minemo'),
				'custom'		=> esc_attr__('Custom color (select below)', 'minemo'),
			),
			'default'      	=> 'skin',
			'after'  		=> '<div class="cs-text-muted"><br>
									<strong>' . esc_attr__('Tips:', 'minemo') . '</strong>
									<ul>
										<li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'minemo') . '</li>
										<li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'minemo') . '</li>
									</ul>
								</div>',
        ),
		array(
			'id'     		 => 'mainmenu_active_link_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Active Link Custom Color', 'minemo' ),
			'default'		 => '#000000',
			'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for main menu active active link', 'minemo').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Drop Down Menu Options', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options for drop down menu in header', 'minemo').'</small>',
		),
		array(
			'id'             => 'dropdownmenufont',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Dropdown Menu Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget,#site-header-menu #site-navigation div.nav-menu li ul.sub-menu >li > ul > li >a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Kumbh Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'font-size'			=> '15',
				'line-height'		=> '22',
				'letter-spacing'	=> '0',
				'color'				=> '#525252',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select dropdown menu font, color and size', 'minemo').'</div>',
		),
		
		
		array(
			'id'           	=> 'dropmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Dropdown Menu Active Link Color', 'minemo'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'minemo'),
				'custom'		=> esc_attr__('Custom color (select below)', 'minemo'),
			),
			'default'      	=> 'custom',
			'after'  		=> '<div class="cs-text-muted"><br>' . '<strong>' . esc_attr__('Tips:', 'minemo') . '</strong>' . '<ul><li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'minemo') . '</li><li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'minemo') . '</li></ul></div>',
        ),
		array(
			'id'     		=> 'dropmenu_active_link_custom_color',
			'type'   		=> 'color_picker',
			'title'  		=> esc_attr__('Dropdown Menu Active Link Custom Color', 'minemo' ),
			'default'		=> '#e33b28',
			'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for dropdown menu active menu text', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'dropmenu_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Dropdown Menu Background Properties (for all dropdown menus)', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'minemo').'</div>',
			'default'		=> array(
				'image'			=> '',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output' 	    => '.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
        ),
		array(
			'id'      		=> 'dropmenu_background_responsive',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Dropdown Menu Background Properties in Responsive', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'minemo').'</div>',
			'default'		=> array(
				'image'			=> '',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> '#000000',
			),
			'output' 	    => '.mega-menu-preyantechnosys-main-menu-mobile-open .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu,.mega-menu-preyantechnosys-main-menu-mobile-open  #site-header-menu #site-navigation div.nav-menu > ul > li ul',
        ),
		array(
			'id'     		=> 'dropmenu_text_responsive_color',
			'type'   		=> 'color_picker',
			'title'  		=> esc_attr__('Dropdown Menu Link Custom Color', 'minemo' ),
			'default'		=> '#ffffff',
			'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for dropdown menu  menu text', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'dropdown_menu_separator',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Separator line between dropdown menu links', 'minemo'),
			'options'  		=> array(
								'grey'  => esc_attr__('Grey color as border color (default)', 'minemo'),
								'white' => esc_attr__('White color as border color (for dark background color)', 'minemo'),
								'no'    => esc_attr__('No separator border', 'minemo'),
							),
			'default'		=> 'no',
			'after'  	  	=> '<div class="cs-text-muted"><br> <strong>' . esc_attr__('Tips:', 'minemo') . '</strong>
								<ul>
									<li>' . esc_attr__('"Grey color as border color (default):" This is default border view.', 'minemo') . '</li>
									<li>' . esc_attr__('"White color:" Select this option if you are going to select dark background color (for dropdown menu)', 'minemo') . '</li>
									<li>' . esc_attr__('"No separator border:" Completely remove border. This will make your menu totally flat', 'minemo') . '</li>
								</ul></div>',
        ),
		array(
			'id'             => 'megamenu_widget_title',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('MegaMenu Widget Title Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '12',
				'line-height'		=> '20',
				'letter-spacing'	=> '0',
				'color'				=> '#000000',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Font settings for mega menu widget title. NOTE: This will work only if you installed "Max Mega Menu" plugin and also activated in the main (primary) menu', 'minemo').'</div>',
		),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => '',
			'after'  	  	 => '<strong>'.esc_attr__('Individual Drop Down Menu Options', 'minemo').'</strong>',
		),
		array(
			'id'      		=> 'dropmenu_background_1',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('First dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for first dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_2',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Second dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for second dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_3',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Third dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for third dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_4',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Fourth dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fourth dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_5',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Fifth dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fifth dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_6',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Sixth dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for sixth dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_7',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Seventh dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for seventh dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_8',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Eighth dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for eighth dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_9',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Ninth dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for ninth dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_10',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Tenth dropdown menu background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for tenth dropdown menu.', 'minemo') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul:before, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu:before',
        ),
		
	)
);

// Footer Settings
$tm_framework_options[] = array(
	'name'   => 'footer_settings', // like ID
	'title'  => esc_attr__('Footer Settings', 'minemo'),
	'icon'   => 'fa fa-arrow-down',
	'fields' => array( // begin: fields
		array(
			'type'			=> 'heading',
			'content'    	=> esc_attr__('Sticky Footer', 'minemo'),
			'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'minemo').'</small>',
        ),
		array(
			'id'     		=> 'stickyfooter',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Sticky Footer', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'minemo').'</div>',
        ),
		
		// Footer Call To Action Box 
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Call To Action Box', 'minemo'),
					'after'  	  	 => '<small>'.esc_attr__('Modify Title, SUb Title, icon, button link, button title etc in footer Call To Action Box here.', 'minemo').'</small>',
				),
				array(
					'id'     		=> 'footer_cta_box',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Footer Call To Action', 'minemo'),
					'default' 		=> True,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable call to action box in footer', 'minemo').'</div>',
				),
				array(
					'id'			=> 'footer_cta_column_layout',
					'type' 			=> 'image_select',//preyantechnosys_pre_color_packages
					'title'			=> esc_attr__('Footer CTA Columns', 'minemo'),
					'options'      	=> array(
							'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
							'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
							'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					),
					'default'		=> '6_6',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer CTA Column layout.', 'minemo').'</div>',
				),
				array(
					'id'     		=> 'footer_cta_box_column1',
					'type'    		=> 'textarea',
					'default' 		=> '',
					'shortcode'		=> true,
					'title'   		=> esc_attr__('CTA First Column Content', 'minemo'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on first column', 'minemo') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_box_column2',
					'type'    		=> 'textarea',
					'shortcode'		 => true,
					'title'   		=> esc_attr__('CTA Second Column Content', 'minemo'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on second column', 'minemo') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_box_column3',
					'type'    		=> 'textarea',
					'shortcode'		 => true,
					'title'   		=> esc_attr__('CTA Third Column Content', 'minemo'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on third column', 'minemo') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'            => 'footer_cta_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Background Color', 'minemo'),
					'options'  		=> array(
										'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
										'grey'       => esc_attr__('Grey', 'minemo'),
										'white'      => esc_attr__('White', 'minemo'),
										'skincolor'  => esc_attr__('Skincolor', 'minemo'),
										'custom'     => esc_attr__('Custom Color', 'minemo'),
									),
					'default'       => 'darkgrey',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer CTA background color', 'minemo').'</div>',
				),
				array(
					'id'     		 => 'footer_cta_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Footer CTA Custom Background Color', 'minemo' ),
					'default'		 => 'grey',
					'dependency'  	 => array( 'footer_cta_box|footer_cta_bg_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Footer CTA', 'minemo').'</div>',
				),
				array(
					'id'            => 'footer_cta_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Text Color', 'minemo'),
					'options'  => array(
									'white'     => esc_attr__('White', 'minemo'),
									'dark'      => esc_attr__('Dark', 'minemo'),
									'skincolor' => esc_attr__('Skin Color', 'minemo'),
								),
					'default'       => 'white',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
				),
		// Footer common background
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Background (full footer elements)', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('This background property will apply to full footer area. You can add', 'minemo').'</small>',
		),
		array(
			'id'            => 'full_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color (all area)', 'minemo'),
			'options'		=> array(
				'transparent' => esc_attr__('Transparent', 'minemo'),
				'darkgrey'    => esc_attr__('Dark grey', 'minemo'),
				'grey'        => esc_attr__('Grey', 'minemo'),
				'white'       => esc_attr__('White', 'minemo'),
				'skincolor'   => esc_attr__('Skincolor', 'minemo'),
				'gradient'   => esc_attr__('Gradient Color', 'minemo'),
				'custom'      => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'darkgrey',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'minemo').'</div>',
        ),
		array(
			'id'      		 => 'full_footer_bg_all',
			'type'    		 => 'preyantechnosys_background',
			'title'  		 => esc_attr__('Footer Background (all area)', 'minemo' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'minemo').'</div>',
			'default'		 => array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
			),
			'output' 	     => '.footer',
			'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
        ),
		
		array(
			'id'            => 'footer_style',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Style', 'minemo'),
			'options'		=> array(
				'default' => esc_attr__('Default', 'minemo'),
				'style1'    => esc_attr__('Style 1', 'minemo'),
                'style2'    => esc_attr__('Style 2', 'minemo'),
			),
			'default'       => 'default',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select style for Footer', 'minemo').'</div>',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('First Footer Widget Area', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer widget area', 'minemo').'</small>',
		),
		array(
			'id'			=> 'first_footer_column_layout',
			'type' 			=> 'image_select',//preyantechnosys_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'minemo'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',					
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'5_2_5'   => get_template_directory_uri() . '/inc/images/footer_col_5_2_5.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
					'4_2_2_4' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'3_2_2_5' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
			),
			'default'		=> '6_6',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'minemo').'</div>',
        ),
		
		array(
			'id'            => 'first_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'minemo'),
			'options'  => array(
				'transparent' => esc_attr__('Transparent', 'minemo'),
				'darkgrey'    => esc_attr__('Dark grey', 'minemo'),
				'grey'        => esc_attr__('Grey', 'minemo'),
				'white'       => esc_attr__('White', 'minemo'),
				'skincolor'   => esc_attr__('Skincolor', 'minemo'),
				'gradient'   => esc_attr__('Gradient Color', 'minemo'),
				'custom'      => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'minemo').'</div>',
        ),
		array(
			'id'      			=> 'first_footer_bg_all',
			'type'    			=> 'preyantechnosys_background',
			'title'  			=> esc_attr__('Footer Background', 'minemo' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'minemo').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center bottom',
				'attachment'		=> 'scroll',
				'size'				=> 'cover',
				'color'				=> '#252d32',
			),
			'output'			=> '.first-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'first_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'minemo'),
			'options'  		=> array(
								'white'  => esc_attr__('White', 'minemo'),
								'dark'   => esc_attr__('Dark', 'minemo'),
							),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'first_footer_widget_seperator',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border Separator Between Widget', 'minemo'),
			'options'  		=> array(
								'no'  	=> esc_attr__('No', 'minemo'),
								'yes'   => esc_attr__('Yes', 'minemo'),
							),
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Yes" if you want to set border separator between widget', 'minemo').'</div>',
        ),
		
		// Second Footer Widget Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Second Footer Widget Area', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for second footer widget area', 'minemo').'</small>',
		),
		array(
			'id'			=> 'second_footer_column_layout',
			'type' 			=> 'image_select',//preyantechnosys_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'minemo'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'3_4_3_2' => get_template_directory_uri() . '/inc/images/footer_col_3_4_3_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
					'3_6_3'   => get_template_directory_uri() . '/inc/images/footer_col_3_6_3.png',
					'4_2_2_4' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'3_2_2_5' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
			),
			'default'		=> '4_4_4',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'minemo').'</div>',
        ),
		array(
			'id'            => 'second_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'minemo'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'minemo'),
							'darkgrey'    => esc_attr__('Dark grey', 'minemo'),
							'grey'        => esc_attr__('Grey', 'minemo'),
							'white'       => esc_attr__('White', 'minemo'),
							'skincolor'   => esc_attr__('Skincolor', 'minemo'),
							'gradient'   => esc_attr__('Gradient Color', 'minemo'),
							'custom'      => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'second_footer_bg_all',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Footer Background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'minemo').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'auto',
				'color'			=> '#f5f8fa',
			),
			'output' 	    => '.second-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'second_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'minemo'),
			'options'  		=> array(
				'white'  		=> esc_attr__('White', 'minemo'),
				'dark'   		=> esc_attr__('Dark', 'minemo'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'second_footer_widget_seperator',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border Separator Between Widget', 'minemo'),
			'options'  		=> array(
								'no'  	=> esc_attr__('No', 'minemo'),
								'yes'   => esc_attr__('Yes', 'minemo'),
							),
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Yes" if you want to set border separator between widget', 'minemo').'</div>',
        ),

		// Footer border betweeen Widget border Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Border Between Footer First And Second Footer Widget Area', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('This option will add Horizontal border between First and Second Footer Widget Area', 'minemo').'</small>',
		),
		array(
			'id'           	=> 'border_between_footerwidget_area',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border', 'minemo'),
			'options'  		=> array(
				'none'			=> esc_attr__('None', 'minemo'),
				'white'			=> esc_attr__('White', 'minemo'),
				'dark'			=> esc_attr__('Dark', 'minemo'),
			),
			'default'      	=> 'none',
        ),
		// Footer Text Area
		
		// Footer Text Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Text Area', 'minemo'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer text area. This contains copyright info', 'minemo').'</small>',
		),
		array(
			'id'            => 'bottom_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'minemo'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'minemo'),
							'darkgrey'    => esc_attr__('Dark grey', 'minemo'),
							'grey'        => esc_attr__('Grey', 'minemo'),
							'white'       => esc_attr__('White', 'minemo'),
							'skincolor'   => esc_attr__('Skincolor', 'minemo'),
							'gradient'   => esc_attr__('Gradient Color', 'minemo'),
							'custom'      => esc_attr__('Custom Color', 'minemo'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'bottom_footer_bg_all',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Footer Background', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'minemo').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'fixed',
				'color'			=> '#252d32',
			),
			'output' 	    => '.site-footer .bottom-footer-text',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'bottom_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'minemo'),
			'options'  		=> array(
				'white'			=> esc_attr__('White', 'minemo'),
				'dark'			=> esc_attr__('Dark', 'minemo'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'minemo').'</div>',
        ),
		array(
          'id'      		=> 'footer_copyright_left',
          'type'    		=> 'wysiwyg',
          'title'  			=>  esc_attr__('Footer Text Left', 'minemo'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'minemo')
		  . '<br>   <code>[prt-site-url]</code> <code>[prt-site-title]</code> <code>[prt-site-tagline]</code> <code>[prt-current-year]</code> <code>[prt-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','minemo') , '<a href="'. esc_url('https://preyantechnosys.com/wordpress/minemo/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
		  'default'         => preyantechnosys_wp_kses('Copyright &copy; 2023 <a href="' . site_url() . '">' . get_bloginfo('name') . '</a>. All rights reserved.'),
        ),
		array(
          'id'       		=> 'footer_copyright_right',
          'type'     		=> 'wysiwyg',
          'title'   		=>  esc_attr__('Footer Text Right', 'minemo'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'minemo')
		  . '<br>   <code>[prt-site-url]</code> <code>[prt-site-title]</code> <code>[prt-site-tagline]</code> <code>[prt-current-year]</code> <code>[prt-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s about details for each shortcode.','minemo') , '<a href="'. esc_url('https://preyantechnosys.com/wordpress/minemo/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
        ),
		array(
			'id'           	=> 'border_above_copyright_area',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Border Above Copyright Text', 'minemo'),
			'options'  		=> array(
				'none'		=> esc_attr__('None', 'minemo'),
				'white'		=> esc_attr__('White', 'minemo'),
				'dark'		=> esc_attr__('Dark', 'minemo'),
			),
			'default'      	=> 'none',
        ),
	)
);


// Button Settings
$tm_framework_options[] = array(
	'name'   => 'button_settings', // like ID
	'title'  => esc_attr__('Button Settings', 'minemo'),
	'icon'   => 'fa fa-square-o',
	'fields' => array( // begin: fields
		array(
			'type'			=> 'heading',
			'content'    	=> esc_attr__('Global Button Settings', 'minemo'),
			'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'minemo').'</small>',
        ),
		array(
			'id'             => 'button_font',
			'type'           => 'preyantechnosys_typography', 
			'title'          => esc_attr__('Button Font', 'minemo'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.elementor-element.elementor-widget-button .elementor-button,
			.main-holder .site-content ul.products li.product .add_to_wishlist, .main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"], .woocommerce button.button, .woocommerce-page button.button, input,.woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .preyantechnosys-post-readmore a,.preyantechnosys-box-service .preyantechnosys-serviceboxbox-readmore a,.post.preyantechnosys-box-blog-classic .preyantechnosys-blogbox-footer-readmore a,.single-tm_portfolio .nav-links a,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .main-holder .site .woocommerce-cart-form__contents button, .main-holder .site .woocommerce-cart-form__contents button.button:disabled[disabled], .main-holder .site table.cart .coupon button,.preyantechnosys-box-blog .preyantechnosys-blogbox-footer-readmore a,.preyantechnosys-iconbox-styleseven .preyantechnosys-serviceboxbox-readmore a,.preyantechnosys-portfoliobox-style2 .prt-project-readmore-btn a,a.prt-button-bold', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Krona One',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'letter-spacing'	=> '0',
				'text-transform'	=> 'uppercase',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to all buttons in this site', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'button_topbottom_padding',
			'type'   		=> 'number',
			'title'         => esc_attr__('Medium Button Top Bottom Padding', 'minemo' ),
			'default'		=> '20',
        ),
		array(
			'id'     		=> 'medium_button_fontsize',
			'type'   		=> 'number',
			'title'         => esc_attr__('Medium Button Font Size', 'minemo' ),
			'default'		=> '12',
        ),
		array(
			'id'        => 'button_shape',
			'type'      => 'radio',
			'title'     => esc_attr__('Global Buttons Shape', 'minemo'), 
			'options'  	=> array(
							'square'     => esc_attr__('Square', 'minemo'),
							'round'   	 => esc_attr__('Round', 'minemo'),
							'rounded'   	 => esc_attr__('Rounded', 'minemo'),
						),
			'default'   => 'rounded',
			'after'   	=> '<small>'.esc_attr__('Select the shape for Buttons', 'minemo').'</small>',
        ),
		array(
			'id'        => 'button_link_hover',
			'type'      => 'radio',
			'title'     => esc_attr__('Global Link Hover', 'minemo'), 
			'options'  	=> array(
							'simple'     => esc_attr__('Simple', 'minemo'),
							'border'   	 => esc_attr__('Border', 'minemo'),
						),
			'default'   => 'border',
			'after'   	=> '<small>'.esc_attr__('Select the shape for Buttons', 'minemo').'</small>',
        ),
		array(
			'id'        => 'skincolor_button_textcolor',
			'type'      => 'radio',
			'title'     => esc_attr__('Skin Color Button Text Color', 'minemo'), 
			'options'  	=> array(
							'default'    => esc_attr__('Default', 'minemo'),
							'dark'   	 => esc_attr__('Dark', 'minemo'),
						),
			'default'   => 'dark',
			'after'   	=> '<small>'.esc_attr__('Select text color for skincolor button', 'minemo').'</small>',
        ),
	)
);

// Blog Settings
$tm_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_attr__('Blog Settings', 'minemo'),
	'icon'   => 'fa fa-pencil',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blog section', 'minemo').'</small>',
		),
		array(
		    'id'            => 'stickysidebar',
		    'type'          => 'switcher',
		    'title'         => esc_attr__('Sticky Sidebar', 'minemo'),
		    'default'       => true,
		    'label'         => '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to enable sticky sidebar on scrolling', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blog Excerpt Limit (in words)', 'minemo' ),
			'default'		=> '50',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'minemo') . '<br><strong>' . esc_attr__('TIP:', 'minemo') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'minemo') . '</div>',
        ),
		array(
			'id'     		=> 'blogclassic_show_comment_number',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show "Total Comment" with icon', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Total Comment with icon. You can hide it if you don\'t want to show it.', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'minemo'),
			'default' 		=> esc_attr__('Read More', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Text for the Read More link on the Blog page', 'minemo').'</div>',
		),
		
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog view', 'minemo'),
			'options'  		=> array(
				'classic'			=> get_template_directory_uri() . '/inc/images/blog-view-style1.png',
				'box'				=> get_template_directory_uri() . '/inc/images/blog-view-style4.png',
			),
			'default'      	=> 'box',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'minemo').'</div>',
			
        ),

		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'minemo').'</small>',
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box column', 'minemo'),
			'options'  		=> array(
				'one'			=> esc_attr__('One Column View', 'minemo'),
				'two'			=> esc_attr__('Two Column view', 'minemo'),
				'three'			=> esc_attr__('Three Column view (default)', 'minemo'),
				'four'			=> esc_attr__('Four Column view', 'minemo'),
			),
			'default'      	=> 'one',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'minemo').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'           	=> 'blogbox_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog box template', 'minemo'),
			'options'  		=> array(
				'top-image'			=> get_template_directory_uri() . '/inc/images/blogbox-style-one.png',
				'left-image'		=> get_template_directory_uri() . '/inc/images/blogbox-style-two.png',
				'top-image-style2'	=> get_template_directory_uri() . '/inc/images/blogbox-style-three.png',
				'style1'			=> get_template_directory_uri() . '/inc/images/blogbox-style-four.png',
			),
			'default'      	=> 'left-image',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'minemo').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'     		=> 'blogbox_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blogbox Excerpt Limit (in words)', 'minemo' ),
			'default'		=> '87',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'minemo') . '<br><strong>' . esc_attr__('TIP:', 'minemo') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'minemo') . '</div>',
        ),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Single Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Settings for single view of blog post.', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'minemo'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'minemo').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'minemo'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'minemo'),
					'twitter'     => esc_attr__('Twitter', 'minemo'),
					'gplus'       => esc_attr__('Google Plus', 'minemo'),
					'pinterest'   => esc_attr__('Pinterest', 'minemo'),
					'linkedin'    => esc_attr__('LinkedIn', 'minemo'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'minemo'),
					'tumblr'      => esc_attr__('Tumblr', 'minemo'),
					'reddit'      => esc_attr__('Reddit', 'minemo'),
					'digg'        => esc_attr__('Digg', 'minemo'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>'.esc_attr__('The selected social service icon will be visible on single Post so user can share on social sites.', 'minemo').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Classic Meta Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Settings for meta data for Blog classic view.', 'minemo').'</small>',
		),
		array(
			'id'      => 'blogclassic_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','minemo'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'minemo').'</div>',
			'default' => array(
				'enabled' => array(
					'cat'       => esc_attr__('Categories', 'minemo'),							
					),
				'disabled' => array(						
					'author'	=> esc_attr__('Author', 'minemo'),
					'date'		=> esc_attr__('Date', 'minemo'),	
					'comment'   => esc_attr__('Comments', 'minemo'),
					'tag'		=> esc_attr__('Tags', 'minemo'),				
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'minemo'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'minemo'),
		),
		array(
			'id'     		=> 'blogclassic_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'minemo'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'minemo'). ' <a href="' . esc_url('https://codex.wordpress.org/Formatting_Date_and_Time') . '" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'minemo') . '</a></div>',
		),
		array(
			'id'     		=> 'blogclassic_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'minemo').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blogbox (Visual Composer element)', 'minemo').'</small>',
		),
		array(
			'id'      => 'blogbox_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','minemo'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'minemo').'</div>',
			'default' => array(
				'enabled' => array(		
					'cat'    	=> esc_attr__('Categories', 'minemo'),	
					'date'    	=> esc_attr__('Date', 'minemo'),
					'comment' 	=> esc_attr__('Comments', 'minemo'),					
				),
				'disabled' => array(					
					'tag'  		=> esc_attr__('Tags', 'minemo'),						
					'author'	=> esc_attr__('Author', 'minemo'),							
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'minemo'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'minemo'),
		),
		array(
			'id'     		=> 'blogbox_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'minemo'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'minemo'). ' <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'minemo') . '</a></div>',
		),
		array(
			'id'     		=> 'blogbox_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'minemo').'</div>',
        ),
		
	)
);



// Portfolio Settings
$tm_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'minemo'), $pf_title_singular ),
	'icon'   => 'fa fa-th-large',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'minemo'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'minemo'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'minemo'), $pf_title_singular ),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'minemo'), $pf_title_singular ) . '</div>',
		),
		array(
			'id'      		=> 'portfolio_viewstyle',
			'type'   		=> 'radio',
			'title'   		=> sprintf( esc_attr__('Single %s View Style', 'minemo'), $pf_title_singular ),
			'options' 		=> array( 
				'left'			=> esc_attr__('Left image and right content (default)', 'minemo'),
				'left-style2' 	=> esc_attr__('Left image and right content Style2', 'minemo'),
				'top'			=> esc_attr__('Top image and bottom content', 'minemo'),
				'full'			=> esc_attr__('No image and full-width content (without details box)', 'minemo'),
				'full-withimg'  => esc_attr__('Top image and full-width content (without details box)', 'minemo'),
			),
			'default'		=> 'full',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'minemo'), $pf_title_singular ) . '</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Related %1$s (on single %2$s) Settings', 'minemo'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for related %1$s section on single %2$s page.', 'minemo'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_attr__('Show Related %s', 'minemo'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select ON to show related %1$s on single %2$s page', 'minemo'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Related %s Title', 'minemo'), $pf_title ),
			'default' 		=> esc_attr__('Related Projects', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Releated %1$s area. (For single %2$s only)', 'minemo'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'       		 => 'related_workdesc_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Related Work Description', 'minemo'),
			'shortcode'		 => true,
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'default'        => '',
        ),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Related %s Boxes template', 'minemo'), $pf_title ),
			'options'  		=> array(
				'style1'			=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
			),
			'default'      	=> 'style1',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'minemo'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_attr__('Select column', 'minemo'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'minemo'),
					'three'   => esc_attr__('Three column', 'minemo'),
					'four'    => esc_attr__('Four column', 'minemo'),
					'five'    => esc_attr__('Five column', 'minemo'),
					'six'     => esc_attr__('Six column', 'minemo'),
				),
			//'class'        	=> 'chosen',
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'minemo'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('Show %s', 'minemo'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %2$s Boxes you like to show in Related %1$s area.', 'minemo'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'       		 => 'related_workdesc_cta',
			'type'     		 => 'textarea',
			'title'    		 => sprintf( esc_attr__('Single %s CTA Text', 'minemo'), $pf_title ),
			'shortcode'		 => true,
			'default'        => '',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s List Details Settings', 'minemo'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'minemo'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'minemo'),
			'info'            => sprintf( esc_attr__('This will be added a new line in DETAILS box on single %s view.', 'minemo'), $pf_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'minemo'),
			'accordion_title' => esc_attr__('Details for the line', 'minemo'),
			
			'default'		 =>  array (
				array (
					'pf_details_line_title' => 'Project',
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => ' Category',
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => '  Clients',
					'data' => 'custom',
				),				
			),



			'fields'          => array(
				array(
					'id'     		=> 'pf_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'minemo'),
					'default' 		=> esc_attr__('Location', 'minemo'),
					'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the first line of the details in single %s', 'minemo'), $pf_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'minemo').'</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_attr__('Line Input Type', 'minemo'),
					'options' 		=> array(
							'custom'        => esc_attr__('Custom text (single line)', 'minemo'),
							'multiline'     => esc_attr__('Custom text with multiline', 'minemo'),
							'date'          => sprintf( esc_attr__('Show date of the %s', 'minemo'), $pf_title_singular ),
							'category'      => sprintf( esc_attr__('Show Category (without link) of the %s', 'minemo'), $pf_title_singular ),
							'category_link' => sprintf( esc_attr__('Show Category (with link) of the %s', 'minemo'), $pf_title_singular ),
							'tag'           => sprintf( esc_attr__('Show Tags (without link) of the %s', 'minemo'), $pf_title_singular ),
							'tag_link'      => sprintf( esc_attr__('Show Tags (with link) of the %s', 'minemo'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'minemo'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Select social sharing service for single %s', 'minemo'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Select social service so site visitors can share the single %s on different social services', 'minemo'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Social Share box', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide social share box.', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'minemo'),
			'default' 		=> esc_attr__('Share', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'minemo').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'minemo'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'minemo'),
					'twitter'     => esc_attr__('Twitter', 'minemo'),
					'gplus'       => esc_attr__('Google Plus', 'minemo'),
					'pinterest'   => esc_attr__('Pinterest', 'minemo'),
					'linkedin'    => esc_attr__('LinkedIn', 'minemo'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'minemo'),
					'tumblr'      => esc_attr__('Tumblr', 'minemo'),
					'reddit'      => esc_attr__('Reddit', 'minemo'),
					'digg'        => esc_attr__('Digg', 'minemo'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('The selected social service icon will be visible on single %s so user can share on social sites.', 'minemo'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'minemo'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'minemo'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'minemo'), $pf_title_singular ),
			'options'       => preyantechnosys_global_portfolio_template_list(),
			'options'  		=> array(
				'style1'			=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
			),
			'default'      	=> 'style1',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'minemo'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'minemo'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'minemo'),
					'three'   => esc_attr__('Three column', 'minemo'),
					'four'    => esc_attr__('Four column', 'minemo'),
					'five'    => esc_attr__('Five column', 'minemo'),
					'six'     => esc_attr__('Six column', 'minemo'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'minemo'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'minemo' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'minemo'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);


// Team Member Settings
$tm_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'minemo'), $team_member_title_singular ),
	'icon'   => 'fa fa-users',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr_x('%s\'s Extra Details Settings', 'Team Member', 'minemo'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_attr_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'minemo'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'minemo'),
			'info'            => sprintf( esc_attr_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'minemo'), $team_member_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'minemo'),
			'accordion_title' => esc_attr__('Details for the line', 'minemo'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'minemo'),
					'default' 		=> esc_attr__('Experiance', 'minemo'),
					'after'  		=> '<div class="cs-text-muted"><br>'. sprintf( esc_attr_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'minemo'), $team_member_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'minemo').'</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Line Data Type', 'minemo'),
					'options' 		=> array(
							'custom'  => esc_attr__('Custom text (add anything)', 'minemo'),
							'url'     => esc_attr__('URL link', 'minemo'),
							'email'   => esc_attr__('Email address', 'minemo'),
							'phone'   => esc_attr__('Phone number', 'minemo'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>'.sprintf( esc_attr_x('Select view for single %s', 'Team Member', 'minemo'), $team_member_title_singular ).'</div>',
				),
			),
			'default' =>   array (
				array (
					'team_extra_details_line_title' => 'Age ',
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Experience ',
					'data' => 'custom',
				),
				),
			
        ),
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'minemo'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s page', 'minemo'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'minemo'), $team_member_title_singular ),
			'options'  		=> array(
				'style1'			=> get_template_directory_uri() . '/inc/images/teambox-style1.png',
			),
			'default'      	=> 'style1',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s\'s Box view on %2$s page.', 'minemo'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'minemo'),
			'options'  => array(
					'two'   => esc_attr__('Two column', 'minemo'),
					'three' => esc_attr__('Three column', 'minemo'),
					'four'  => esc_attr__('Four column', 'minemo'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf(esc_attr__('Select column to show %s', 'minemo'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to Show', 'minemo' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %s you like to show on category page', 'minemo'), $team_member_title  ) . '</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'minemo'), $team_member_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'minemo'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'teammember_detailsbox_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'minemo'), $team_member_title_singular ),
			'default' 		=> esc_attr__('Personal Information', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Member "%1$s Details" area. (For single %1$s only)', 'minemo'), $team_member_title_singular ) . '</div>',
		),
		array(
			'id'     		=> 'team_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'minemo'),
			'default' 		=> esc_attr__('Read More', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Text for the More Details link on the Teambox', 'minemo').'</div>',
		),
		
	)
);


// Service CPT Settings
$tm_framework_options[] = array(
	'name'   => 'service_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'minemo'), $service_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'minemo'), $service_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'minemo'), $service_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'services_cat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'minemo'), $service_title_singular ),
			'options'  		=> array(
				'styleone'			=> get_template_directory_uri() . '/inc/images/service-view-style1.png',
			),
			'default'      	=> 'styleone',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'minemo'), $service_title_singular, $service_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'services_cat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'minemo'),
			'options'  => array(
				'two'     => esc_attr__('Two column', 'minemo'),
				'three'   => esc_attr__('Three column', 'minemo'),
				'four'    => esc_attr__('Four column', 'minemo'),
				'five'    => esc_attr__('Five column', 'minemo'),
				'six'     => esc_attr__('Six column', 'minemo'),
			),
			'default'      	=> 'two',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'minemo'), $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'services_cat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'minemo' ), $service_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'minemo'), $service_title_singular, $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'service_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'minemo'),
			'default' 		=> esc_attr__('Read More', 'minemo'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Text for the More Details link on the Servicebox', 'minemo').'</div>',
		),
	)
);



// Creating Client Groups array 
$client_groups = array();
if( isset($minemo_theme_options['client_groups']) && is_array($minemo_theme_options['client_groups']) ){

foreach( $minemo_theme_options['client_groups'] as $key => $val ){

	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}

}




// Error 404 Page Settings
$tm_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_attr__('Error 404 Page Settings', 'minemo'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Error 404 Page Settings', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Settings that determine how the error page will be looking', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'error404_iamgebox_text',
			'type'    		=> 'textarea',
			'title'   		=> esc_attr__('Top Description text', 'minemo'),
			'shortcode'		 => true,
			'default' 		=> '<h4>4<div class="error-img-01"><img src="'. get_template_directory_uri() .'/images/404img.png" alt="img"></div>4</h4><h5>OOPS! </h5>',
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This text will be shown top of Big heading.', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'textarea',
			'title'   		=> esc_attr__('Big heading text', 'minemo'),
			'default' 		=> esc_attr__('Sorry we cant find that page!', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This text will be shown with big font size below icon', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Description text', 'minemo'),
			'default' 		=> esc_attr__('', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This file may have been moved or deleted. Be sure to check your spelling', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Form', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "YES" to show search form on the 404 page', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'error404_page_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Content area background for 404 page only', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for 404 page content area only.', 'minemo').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'right center',
				'size'			=> 'cover',
				'color'			=> '#000000',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),	
		
	)
);


// Search Page Settings
$tm_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_attr__('Search Page Settings', 'minemo'),
	'icon'   => 'fa fa-search',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Search Page Settings', 'minemo'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Content of the search page if no results found', 'minemo'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted"><br>'. esc_attr__('Specify the content of the page that will be displayed if while search no results found', 'minemo') . '<br> ' . esc_attr__('HTML tags and shortcodes are allowed', 'minemo').'</div>',
			'default'  		 => preyantechnosys_wp_kses( urldecode('%3Ch3%3ENothing+found%3C%2Fh3%3E%3Cp%3ESorry%2C+but+nothing+matched+your+search+terms.+Please+try+again+with+some+different+keywords.%3C%2Fp%3E') ),
        ),
		
	)
);


// Sidebar Settings
$tm_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_attr__('Sidebar Settings', 'minemo'),
	'icon'   => 'fa fa-pause',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Settings', 'minemo'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_attr__('Custom Sidebars', 'minemo'),
			'info'            => esc_attr__('Specify the custom sidebars that can be used in the pages for a widgets', 'minemo'),
			'button_title'    => esc_attr__('Add New Sidebar', 'minemo'),
			'accordion_title' => esc_attr__('Custom Sidebar Properties', 'minemo'),
			'fields'          => array(
					array(
						'id'     		=> 'custom_sidebar',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Custom Sidebar Name', 'minemo'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write custom sidebar name here', 'minemo').'</div>',
					),

			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Position', 'minemo'),
			'after'  		=> '<small>'.esc_attr__('Select sidebar position for different sections', 'minemo').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Blog Post/Category Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Standard Pages Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for standard pages', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Group Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'minemo'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'minemo'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'minemo'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'minemo'), $pf_cat_title_singular ) . '</div>',
        ),
				array(
			'id'           	=> 'sidebar_service',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'minemo'), $service_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'minemo'), $service_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_service_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'minemo'), $service_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'minemo'), $service_cat_title_singular ) . '</div>',
        ),
		
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Search Page Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for search page', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('WooCommerce Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for WooCommerce Shop', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_singlepage_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('WooCommerce Single Product page', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for Single Product page', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_bbpress',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('BBPress Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for BBPress pages', 'minemo').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_events',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Events Sidebar', 'minemo'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for Events pages.', 'minemo') . ' ' . sprintf( esc_attr__('This is valid for %s plugin only','minemo') , '<a href="'. esc_url('https://wordpress.org/plugins/the-events-calendar/') .'" target="_blank">' . esc_attr__('The Events Calendar', 'minemo').'</a>' ).'</div>',
        ),
	)
);


// Getting social list
$global_social_list = preyantechnosys_shared_social_list();
	
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);

// Social Links
$tm_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_attr__('Social Links', 'minemo'),
	'icon'   => 'fa fa-share-square-o',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Social Links', 'minemo'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[prt-social-links]%2$s shortcode to show social links.', 'minemo'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_attr__('Social Links', 'minemo'),
			'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'minemo'),
			'button_title'    => esc_attr__('Add New Social Service', 'minemo'),
			'accordion_title' => esc_attr__('Social Service Properties', 'minemo'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_attr__('Social Service', 'minemo'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Social icon from here', 'minemo').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Link to Social icon selected above', 'minemo'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Paste URL only', 'minemo').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),

			),
			'default' => array (
				
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
				
			),
        ),
		
		
		
	),	
);

// WooCommerce Settings
$tm_framework_options[] = array(
	'name'   => 'woocommerce_settings', // like ID
	'title'  => esc_attr__('WooCommerce Settings', 'minemo'),
	'icon'   => 'fa fa-shopping-cart',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('WooCommerce Settings', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'wc-header-icon',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Cart Icon in Header', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'minemo') . ' <br><br> ' . '<strong>' . esc_attr__('NOTE:','minemo') . '</strong> ' . esc_attr__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('WooCommerce Product List Column', 'minemo'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'minemo'),
								'2' => esc_attr__('Two Columns', 'minemo'),
								'3' => esc_attr__('Three Columns', 'minemo'),
								'4' => esc_attr__('Four Columns', 'minemo'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list view', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-product-per-page',
			'type'   		=> 'number',
			'title'         => esc_attr__('Products Per Page', 'minemo' ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many product you want to show on SHOP page', 'minemo').'</div>',
        ),
		array(
			'id'       => 'show-hot-label',
			'type'     => 'switcher',
			'title'    => esc_attr__( 'Show Hot Label ', 'minemo' ),
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show hot label on product box', 'minemo').'</div>',
			'default'  => true,
		),
		array(
			'id'       		=> 'hot-label-text',
			'type'     		=> 'text',
			'title'    		=> esc_attr__( 'Hot Label Text', 'minemo' ),
			'default'  		=> esc_attr__( 'Hot', 'minemo' ),
			'dependency' 	=> array( 'show-hot-label', '==', true ),	
		),
		array(
			'id'      => 'show-sale-label',
			'type'    => 'switcher',
			'title'   => esc_attr__( 'Show Sale Label', 'minemo' ),
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show sale label on product box', 'minemo').'</div>',
			'default' => true,
		),
		array(
			'id'       => 'product_sale_lebtype',
			'type'     => 'select',
			'title'    =>  esc_attr__('Select Sale label type', 'minemo'),
			'options'  => array(
							'text'  	   => esc_attr__('Text', 'minemo'),
							'percentage'   => esc_attr__('Percentage', 'minemo'),
						),
			'default'  => 'text',
			'dependency' => array( 'show-sale-label', '==', true ),	
		),
		array(
			'id'       => 'sale-label-text',
			'type'     => 'text',
			'title'    => esc_attr__( 'Sale Text', 'minemo' ),
			'default'  => esc_attr__( 'Sale', 'minemo' ),
			'dependency'  	 => array( 'product_sale_lebtype|show-sale-label', '==|==', 'text|true' ),//Multiple dependency			
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Single Product Page Settings', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Options for Single product page', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'wc-single-show-related',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Related Products', 'minemo'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "ON" to show Related Products below the product description on single page', 'minemo').'</div>',
        ),
		array(
			'id'     		=> 'wc-single-related-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('Column for Related Products', 'minemo'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'minemo'),
								'2' => esc_attr__('Two Columns', 'minemo'),
								'3' => esc_attr__('Three Columns', 'minemo'),
								'4' => esc_attr__('Four Columns', 'minemo'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list of related products', 'minemo').'</div>',
			'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'wc-single-related-count',
			'type'   		=> 'number',
			'title'         => esc_attr__('Related Products Show', 'minemo' ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many products you want to show in the Related prodcuts area on single product page', 'minemo').'</div>',
			'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
        ),
	)
);


// Under Construction
$tm_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_attr__('Under Construction', 'minemo'),
	'icon'   => 'fa fa-send',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Under Construction', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Under Construciton Message', 'minemo'),
			'default' 		=> false,
			'label'  		=> esc_attr__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'minemo'). '<br>' . esc_attr__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'minemo'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Title for Under Construction page', 'minemo'),
			'default'  		=> esc_attr__('This site is Under Construction', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write TITLE for the Under Construction page', 'minemo').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Page Content', 'minemo'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => preyantechnosys_wp_kses( urldecode('%3Cdiv+class%3D%22un-main-page-content%22%3E%0D%0A%3Cdiv+class%3D%22un-page-content%22%3E%0D%0A%3Cdiv%3E%5Bprt-logo%5D%3C%2Fdiv%3E%0D%0A%3Cdiv+class%3D%22sepline%22%3E%3C%2Fdiv%3E%0D%0A%3Ch1+class%3D%22heading%22%3EUNDER+CONSTRUCTION%3C%2Fh1%3E%0D%0A%3Ch4+class%3D%22subheading%22%3ESomething+awesome+this+way+comes.+Stay+tuned%21%3C%2Fh4%3E%0D%0A%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E') ),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your HTML code for Under Construction page body content', 'minemo').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Background Properties', 'minemo' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background options. This is for main body background', 'minemo').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#fbfbfb',
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Under Construction page', 'minemo'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'minemo').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => urldecode('%40import+url%28%22https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DOpen%2BSans%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%22%29%3B%0D%0Abody%7B%0D%0Apadding%3A+0%3B%0D%0Amargin%3A+0%3B%0D%0A%7D+%0D%0A.heading%2C+.subheading%7B+%0D%0Afont-family%3A+%22%22Open+Sans%22%2C+Arial%2C+Helvetica%2C+sans-serif%3B%0D%0A%7D+%0D%0A.heading%7B%0D%0Afont-size%3A+60px%3B%0D%0Aline-height%3A+65px%3B+%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Amargin-bottom%3A%0D%0A0px%3B+margin-bottom%3A+18px%3B%0D%0Afont-weight%3A+600%3B%0D%0Aletter-spacing%3A+2px%3B%0D%0Acolor%3A+%23283d58%3B%0D%0A+%7D+%0D%0A.subheading%7B%0D%0Afont-size%3A+23px%3B%0D%0Aline-height%3A+30px%3B%0D%0Acolor%3A+%23828c96%3B%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Afont-weight%3A+normal%3B%0D%0A%7D+%0D%0A.un-main-page-content%7B+%0D%0Aposition%3A+absolute%3B%0D%0Aleft%3A+50%25%3B%0D%0Atop%3A+45%25%3B%0D%0A-khtml-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-moz-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B+%0D%0A-ms-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-o-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0Atransform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A+%7D%0D%0A.prt-sc-logo%7B+%0D%0Amargin-bottom%3A+40px%3B%0D%0Adisplay%3A+inline-block%3B%0D%0A%7D'),
        ),
		
		
	)
);

// Login Page Settings
$tm_framework_options[] = array(
	'name'   => 'login_page_settings', // like ID
	'title'  => esc_attr__('Login Page Settings', 'minemo'),
	'icon'   => 'fa fa-lock',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Login Page Settings', 'minemo'),
		),
		array(
			'id'      		=> 'login_background',
			'type'    		=> 'preyantechnosys_background',
			'title'  		=> esc_attr__('Background Properties', 'minemo' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of background object', 'minemo').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'right bottom',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#f7f7f7',
			),
			'output'   		=> '.loginpage',
        ),
	)
);


// Seperator
$tm_framework_options[] = array(
	'name'   => 'tm_seperator_1',
	'title'  => esc_attr__('Advanced', 'minemo'),
	'icon'   => 'fa fa-ellipsis-h'
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;



// Advanced Settings
$tm_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_attr__('Advanced Settings', 'minemo'),
	'icon'   => 'fa fa-wrench',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Portfolio) Settings', 'minemo'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Portfolio custom post type', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio) Post Type', 'minemo'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Portfolio) Post Type', 'minemo'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section. Only for singular title.', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio) Post Type', 'minemo'), $pf_title_singular ),
			'default'  		=> esc_attr('Portfolio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio post type section', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio Category) List', 'minemo'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Categories', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Portfolio Category) List', 'minemo'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Category', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio Category) Link', 'minemo'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio-category', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio Category link', 'minemo').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Service) Settings', 'minemo'), $service_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Service custom post type', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'service_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service) Post Type', 'minemo'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Service post type section', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'service_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Service) Post Type', 'minemo'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Service post type section. Only for singular title.', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'service_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service) Post Type', 'minemo'), $service_title_singular ),
			'default'  		=> esc_attr('service'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Service post type section', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service Category) List', 'minemo'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Categories', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Service Category) List', 'minemo'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Category', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'service_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service Category) Link', 'minemo'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('service-category', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Service Category link', 'minemo').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Team member) Settings', 'minemo'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Team Member custom post type', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Member) Post Type', 'minemo'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Members', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Team Member) Post Type', 'minemo'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Member', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section. Only for singular title.', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Member) Post Type', 'minemo'), $team_member_title_singular ),
			'default'  		=> esc_attr__('team-member', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Member post type section', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Group) List', 'minemo'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Groups', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Team Group) List', 'minemo'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Group', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'minemo').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Group) Link', 'minemo'), $team_group_title_singular ),
			'default'  		=> esc_attr__('team-group', 'minemo'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Group link', 'minemo').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Minify Options', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Options to minify HTML/JS/CSS files', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Minify JS and CSS files', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'minemo').'</div>',
        ),
		
		// Thumb Image Size Options
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Box Image Size Options', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Set Image size for Portfolio, Team Member and Blog boxes.', 'minemo').'</small>',
		),
		array(
			'id'     	=> 'img-size-blog',
			'type'    	=> 'preyantechnosys_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size', 'minemo' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'minemo' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'minemo') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'minemo') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'minemo') . '</a></p>',
			'default' 	=> array(
				'width'		=> '1170',
				'height'	=> '916',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-left',
			'type'    	=> 'preyantechnosys_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Left Image and Right Content Only)', 'minemo' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'minemo' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'minemo') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'minemo') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'minemo') . '</a></p>',
			'default' 	=> array(
				'width'		=> '767',
				'height'	=> '480',
				'crop'		=> 'no',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-top',
			'type'    	=> 'preyantechnosys_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Top Image Bottom Content Content Only)', 'minemo' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'minemo' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'minemo') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'minemo') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'minemo') . '</a></p>',
			'default' 	=> array(
				'width'		=> '650',
				'height'	=> '510',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-portfolio',
			'type'    	=> 'preyantechnosys_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Portfolio) Box - Thumb image size', 'minemo' ), $pf_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'minemo' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'minemo') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'minemo') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'minemo') . '</a></p>',
			'default' 	=> array(
				'width'		=> '610',
				'height'	=> '750',
				'crop'		=> 'yes',
			),
        ),
		array(
			'id'     	=> 'img-size-team-member',
			'type'    	=> 'preyantechnosys_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Team Member) Box - Thumb image size', 'minemo' ), $team_member_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'minemo' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'minemo') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'minemo') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'minemo') . '</a></p>',
			'default' 	=> array(
				'width'		=> '450',
				'height'	=> '500',
				'crop'		=> 'yes',
			),
        ),
		
		/* Icon library selector - Only selected libraries will be loaded in VC element */
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Enabled Icon Library', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Select icon library that you like to load in Visual Composer elements like "ThemetechMount Icon", "ThemetechMount Call to Action", "ThemetechMount Service Box" etc.', 'minemo').'</small>',
		),
		array(
			'id'        => 'icon_library',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select icon library to load', 'minemo'),
			'options'   => array(
					'linecons'       => esc_attr__( 'Linecons', 'minemo' ),
					'themify'        => esc_attr__( 'Themify icons', 'minemo' ),
					'kw_minemo'        => esc_attr__( 'Minemo icons', 'minemo' ),
			),
			'default'   => array( 'linecons', 'themify', 'kw_minemo' ),
			'after'    	=> '<small>'.esc_attr__('Select icon library that you want to load. This will reduce load time of Visual Composer elements. But you can see only selected libraries in the icon dropdown.', 'minemo').'</small>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Show or hide Demo Content Setup option', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'minemo').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Hide "Demo Content Setup" option', 'minemo'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'minemo').'</div>',
        ),
		
		
	)
);


// Custom Code
$tm_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_attr__('Custom Code', 'minemo'),
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array( // begin: fields
		
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Add custom JS and CSS code', 'minemo').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code', 'minemo'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'minemo').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('JS Code', 'minemo'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('Paste your JS code here', 'minemo').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom HTML Code', 'minemo'),
			'after'  		=> '<small>'. sprintf(__('Custom HTML Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'minemo'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code for &lt;head&gt; tag', 'minemo'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'default'  		=> '',
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'minemo').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code after &lt;body&gt; tag', 'minemo'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear after &lt;body&gt; tag. You can add your custom tracking code here', 'minemo').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code before &lt;/body&gt; tag', 'minemo'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'minemo').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code for Login page', 'minemo'),
			'after'  		=> '<small>'. esc_attr__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'minemo').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Login Page', 'minemo'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'minemo').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Advanced Custom CSS Code Option', 'minemo'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code (at top of the file)', 'minemo'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'minemo').'</div>',
        ),
		
		
	)
);


// Backup
$tm_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_attr__('Backup / Restore', 'minemo'),
	'icon'     => 'fa fa-shield',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_attr__('You can save your current options. Download a Backup and Import', 'minemo'),
		),
		array(
			'type'    => 'backup',
		),
	)
);