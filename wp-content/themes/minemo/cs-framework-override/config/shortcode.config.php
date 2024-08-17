<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => 'ThemetechMount Special Shortcodes',
  'shortcodes' => array(
	
	//Site Tagline
	array(
		'name'      => 'prt-site-tagline',
		'title'     => esc_attr__('Site Tagline', 'minemo'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'minemo'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'prt-site-title',
		'title'     => esc_attr__('Site Title', 'minemo'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'minemo'),
			),

      ),
    ),
	// Site URL
	array(
		'name'      => 'prt-site-url',
		'title'     => esc_attr__('Site URL', 'minemo'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'minemo'),
			),

      ),
    ),
	// Site LOGO
	array(
		'name'      => 'prt-logo',
		'title'     => esc_attr__('Site Logo', 'minemo'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'minemo'),
			),

      ),
    ),
	// Current Year
	array(
		'name'      => 'prt-current-year',
		'title'     => esc_attr__('Current Year', 'minemo'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'minemo'),
			),

      ),
    ),
	// Footer Menu
	array(
		'name'      => 'prt-footermenu',
		'title'     => esc_attr__('Footer Menu', 'minemo'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'minemo'),
			),

      ),
    ),
	// Skin Color
	array(
		'name'      => 'prt-skincolor',
		'title'     => esc_attr__('Skin Color', 'minemo'),
		'fields'    => array(

			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This shortcode will show the Text in Skin Color', 'minemo'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_attr__('Skin Color Text', 'minemo'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_attr__('The content is this box will be shown in Skin Color', 'minemo').'</div>', 
			),

      ),
    ),
	// Dropcaps
	array(
		'name'      => 'prt-dropcap',
		'title'     => esc_attr__('Dropcap', 'minemo'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This will show text in dropcap style.', 'minemo'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_attr__('Style', 'minemo'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/inc/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/inc/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/inc/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/inc/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Background Color', 'minemo'),
				'options'    	=> array(
									'white' 	    => esc_attr__('White', 'minemo'),
									'skincolor'     => esc_attr__('Skin Color', 'minemo'),
									'grey' 			=> esc_attr__('Grey', 'minemo'),
									'dark' 		    => esc_attr__('Dark', 'minemo'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Color', 'minemo'),
				'options'    	=> array(
									'skincolor'     => esc_attr__('Skin Color', 'minemo'),
									'white' 	    => esc_attr__('White', 'minemo'),
									'grey' 			=> esc_attr__('Grey', 'minemo'),
									'dark' 		    => esc_attr__('Dark', 'minemo'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_attr__('Text', 'minemo'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_attr__('The Letter in this box will be shown Dropcapped', 'minemo').'</div>', 
			),

      ),
    ),
	
	
 
  ),
);



CSFramework_Shortcode_Manager::instance( $options );
