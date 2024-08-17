<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *  Meta Boxes
 */
$tm_metabox_options = array();


/************************* Common Meta Boxes *****************************/



// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_attr__('No Slider', 'minemo');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_attr__('Slider Revolution', 'minemo'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_attr__('Layer Slider', 'minemo'); }
$slider_list_array['custom']   = esc_attr__('Custom Slider', 'minemo');

$tm_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_attr__('Select Slider Type', 'minemo'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('Select slider which you want to show on this page. The slider will appear in header area.', 'minemo').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$tm_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'minemo'),
	'after'    	 => ( preyantechnosys_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="prt-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Slider Revolution section.', 'minemo') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_attr__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'minemo') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Revolution Slider. The slider will appear in header area.', 'minemo').'</div>',
	'options' 	 => preyantechnosys_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$tm_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'minemo'),
	'after'    	 => ( preyantechnosys_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="prt-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Layer Slider section.', 'minemo') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_attr__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'minemo') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Layer Slider. The slider will appear in header area.', 'minemo').'</div>',
	'options' 	 => preyantechnosys_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$tm_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_attr__('Custom Slider code', 'minemo'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_attr__('You can paste custom slider shortcode or HTML code here. The output code will appear in header area.', 'minemo').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$tm_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_attr__('Boxed or Wide Slider', 'minemo'),
	'info'       => esc_attr__('Select slider width.', 'minemo'),
	'options'    => array(
		'wide'      => esc_attr__('Wide Slider', 'minemo'),
		'boxed'     => esc_attr__('Boxed Slider', 'minemo'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);
$tm_metabox_slider_area[] = array(
	'id'        => 'slider_sociallinks',
	'type'      => 'checkbox',
	'title'     => esc_attr__('Show Social Links in Slider', 'minemo'),
	'label'		=>  esc_attr__( 'YES, Show Social Links in Slider', 'minemo' ),
	'after'   	=> '<div class="cs-text-muted">'.esc_attr__('If you want to show social links inside slider then check this option', 'minemo').'</div>',
);





// Background metabox options array
$tm_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_attr__('Custom Background', 'minemo'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'minemo').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'preyantechnosys_background',
		'title'		 => esc_attr__('Body Background Properties', 'minemo'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'minemo').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
	array(
		'id'		 => 'custom_inner_background',
		'type'		 => 'preyantechnosys_background',
		'title'		 => esc_attr__('Content Area Background Properties', 'minemo'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for content area', 'minemo').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);






// Topbar metabox options array
$tm_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_attr__('Show Topbar', 'minemo'),
		'info'    => esc_attr__('For this page only.', 'minemo'),
		'options' => array(
			''      => esc_attr__('Global', 'minemo'),
			'yes'   => esc_attr__('Yes, show Topbar', 'minemo'),
			'no'    => esc_attr__('No, hide Topbar', 'minemo'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_attr__('Background Color', 'minemo'),
		'info'   	 => esc_attr__('Please select color for background', 'minemo'),
		'options' 	 => array(
			''           => esc_attr__('Global', 'minemo'),
			'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
			'grey'       => esc_attr__('Grey', 'minemo'),
			'white'      => esc_attr__('White', 'minemo'),
			'skincolor'  => esc_attr__('Skincolor', 'minemo'),
			'custom'     => esc_attr__('Custom Color', 'minemo'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_attr__('Select Background Color', 'minemo'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_attr__('Text Color', 'minemo'),
		'info'		 => esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option.', 'minemo'),
		'options'	 => array(
			''          => esc_attr__('Global', 'minemo'),
			'white'     => esc_attr__('White', 'minemo'),
			'dark'      => esc_attr__('Dark', 'minemo'),
			'skincolor' => esc_attr__('Skin Color', 'minemo'),
			'custom'    => esc_attr__('Custom color', 'minemo'),
		),
		'default' 	 => esc_attr__('Global', 'minemo'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_attr__('Custom Text Color', 'minemo' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Please select custom color for text', 'minemo').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_attr__('Topbar Left Content (overwrite default text)', 'minemo'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for left area. This will overwrite default text set in Theme Options', 'minemo').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_attr__('Topbar Right Content (overwrite default text)', 'minemo'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for right area. This will overwrite default text set in Theme Options', 'minemo').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);





// Titlebar metabox options array
$tm_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar', 'minemo'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'minemo' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'minemo').'</div>',
	),
	array(
		'id'       			=> 'hide_titlebar_icon',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar link', 'minemo'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'minemo' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'minemo').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Title', 'minemo'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'minemo').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Subtitle', 'minemo'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill page subtitle', 'minemo').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Background Options', 'minemo'),
		'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'minemo').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_attr__('Titlebar Background Options', 'minemo'),
		'options'	 => array(
			''       	=> esc_attr__('Use global settings', 'minemo'),
			'custom' 	=> esc_attr__('Set custom settings', 'minemo'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'minemo').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Background Color', 'minemo'),
		'options'  => array(
			''           => esc_attr__('Global', 'minemo'),
			'darkgrey'   => esc_attr__('Dark grey', 'minemo'),
			'grey'       => esc_attr__('Grey', 'minemo'),
			'white'      => esc_attr__('White', 'minemo'),
			'skincolor'  => esc_attr__('Skincolor', 'minemo'),
			'custom'     => esc_attr__('Custom Color', 'minemo'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'minemo').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'preyantechnosys_background',
		'title'  		=> esc_attr__('Titlebar Background Properties', 'minemo' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'minemo').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Font Settings', 'minemo'),
		'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'minemo').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Font Options', 'minemo'),
		'options'  => array(
						''       => esc_attr__('Use global settings', 'minemo'),
						'custom' => esc_attr__('Set custom settings', 'minemo'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Ude global settings" to load global font settings.', 'minemo').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
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
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option', 'minemo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'minemo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'minemo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'minemo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Content Options', 'minemo'),
		'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'minemo').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_attr__('Titlebar Text Align', 'minemo'),
		'options'       	=> array (
						''         => esc_attr__('Global', 'minemo'),
						'default'  => esc_attr__('All Center', 'minemo'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'minemo'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 	'minemo'),
						'allleft'  => esc_attr__('All Left', 'minemo'),
						'allright' => esc_attr__('All Right', 'minemo'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_attr__('Select text align in Titlebar', 'minemo').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_attr__( 'Titlebar Height', 'minemo' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set height of the Titlebar. In pixel only', 'minemo').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_attr__('Hide Breadcrumb', 'minemo'),
		'options'  => array(
						''     => esc_attr__('Global', 'minemo'),
						'no'   => esc_attr__('NO, show the breadcrumb', 'minemo'),
						'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'minemo'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'minemo').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	
	
);


// Other Options
$tm_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_attr__('Skin Color', 'minemo' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'minemo').'<br><br> <strong>' . esc_attr__( 'NOTE: ' ,'minemo') . '</strong> ' . esc_attr__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'minemo') . '</div>',
	),
);









/**** Metabox options - Sidebar ****/

// Getting custom sidebars 
$all_sidebars = preyantechnosys_get_all_registered_sidebars();



$tm_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_attr__('Select Sidebar Position', 'minemo'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/inc/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/inc/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/inc/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/inc/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/inc/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/inc/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/inc/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Left Sidebar', 'minemo'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Right Sidebar', 'minemo'),
		'options' => $all_sidebars,
		'default' => '',
	),
);



// Getting name of CPT from Theme Options
$minemo_theme_options		  = get_option('minemo_theme_options');
$pf_type_title_singular   = ( !empty($minemo_theme_options['pf_type_title_singular']) ) ? $minemo_theme_options['pf_type_title_singular'] : 'Portfolio' ;
$service_type_title_singular   = ( !empty($minemo_theme_options['service_type_title_singular']) ) ? $minemo_theme_options['service_type_title_singular'] : 'Service' ;
$team_type_title_singular = ( !empty($minemo_theme_options['team_type_title_singular']) ) ? $minemo_theme_options['team_type_title_singular'] : 'Team Member' ;


// CPT list
$tm_cpt_list = array(
	'page'           => esc_attr__('Page', 'minemo'),
	'post'           => esc_attr__('Post', 'minemo'),
	'tm_portfolio'   => esc_attr($pf_type_title_singular),
	'tm_service'   => esc_attr($service_type_title_singular),
	'tm_team_member' => esc_attr($team_type_title_singular),
);

// Foreach loop
foreach( $tm_cpt_list as $cpt_id=>$cpt_name ){
	
	$tm_metabox_options[] = array(
		'id'        => '_preyantechnosys_metabox_group',
		'title'     => sprintf( esc_attr__('Minemo - %s Single view Elements Options', 'minemo'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
		
		
			array(
				'name'   => '_preyantechnosys_slider_area_options',
				'title'  => esc_attr__('Header Slider Options', 'minemo'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $tm_metabox_slider_area,
			),
			
			
			array(
				'name'   => '_preyantechnosys_background_options',
				'title'  => esc_attr__(' Background Options', 'minemo'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $tm_metabox_background,
			),
			
			
			array(
				'name'   => '_preyantechnosys_page_topbar_options',
				'title'  => esc_attr__('Topbar Options', 'minemo'),
				'icon'   => 'fa fa-tasks',
				'fields' => $tm_metabox_topbar,
			),
			
			
			
			array(
				'name'   => '_preyantechnosys_titlebar_options',
				'title'  => esc_attr__('Titlebar Options', 'minemo'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $tm_metabox_titlebar,
			),
			
			
			array(
				'name'   => '_preyantechnosys_page_customize',
				'title'  => esc_attr__('Other Options', 'minemo'),
				'icon'   => 'fa fa-cog',
				'fields' => $tm_other_options,
			),
			
			
		),
	);
	
	
	
	/**
	 *  CPT - Sidebar
	 */
	$tm_metabox_options[]    = array(
		'id'        => '_preyantechnosys_metabox_sidebar',
		'title'     => esc_attr__('Minemo - Sidebar Options', 'minemo'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'tm_sidebar_options',
				'fields' => $tm_metabox_sidebar,
			),
		),
	);

} // foreach




/* Blog Post Format - Gallery meta box */
$tm_metabox_options[] = array(
	'id'        => '_preyantechnosys_metabox_gallery',
	'title'     => esc_attr__('Minemo - Gallery Images', 'minemo'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'preyantechnosys_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					'type'        => 'gallery',
					'title'       => esc_attr__('Slider Images', 'minemo'),
					'add_title'   => esc_attr__('Add Images', 'minemo'),
					'edit_title'  => esc_attr__('Edit Gallery', 'minemo'),
					'clear_title' => esc_attr__('Remove Gallery', 'minemo'),
					'after'       => '<br><div class="cs-text-muted">'.esc_attr__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'minemo').'</div>',
				),
			)
		)
	),
);
