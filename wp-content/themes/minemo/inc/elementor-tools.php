<?php

/**
 * Add group in Elementor editor
 */
if( !function_exists('tm_elements_manager') ){
function tm_elements_manager() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'minemo_category',
		[
			'title' => esc_attr__( 'Minemo Special Elements', 'minemo' ),
			'icon' => 'fa fa-plug',
		],
		1 // tab position
	);
}
}
add_action( 'elementor/init', 'tm_elements_manager' );

define( 'FUNERIO_ICON_URL',  get_template_directory( __FILE__ )  ); 

/**
 * Adding custom theme icons
 */
 
if( !function_exists('prt_elementor_add_custom_icons_tab') ){
function prt_elementor_add_custom_icons_tab( $icons_tabs = array() ) {

	if( defined('FUNERIO_ICON_URL') ){

		$prt_minemo_icons_array = array(
			'double-quotes',
			'phone-call',	
			'customer-service',
			'quality',			
			'group',
			'up-right-arrow',
			'play',
			'left-quote',
			'menu',
			'close',
			'loupe',
			'copy',
			'navigation',
			'pickaxe',
			'mining-cart-1',
			'crane-truck',
			'gold',
			'search',
			'engineer',
			'notes',
			'miner-1',
			'phone',
			'email',
			'technician',
			'labor',
		);
		
		$icons_tabs['kw_minemo'] = array(
			'name'          => 'kw_minemo',
			'label'         => esc_html__( 'Minemo Special Icons', 'minemo' ),
			'labelIcon'     => 'kw_minemo flaticon-workspace',
			'prefix'        => 'flaticon-',
			'displayPrefix' => 'kw_minemo',
			'url'           => wp_enqueue_style( 'preyantechnosys-minemo-extra-icons', get_template_directory_uri() . '/assets/preyantechnosys-minemo-extra-icons/font/flaticon_mining.css' ),
			'icons'         => $prt_minemo_icons_array,
			'ver'           => '1.0.0',
		);
		
	}
	
	
	return $icons_tabs;
}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'prt_elementor_add_custom_icons_tab' );


/**
 *  Add preview js for Elementor
 */
function tm_elementor_preview_scripts(){
	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script(  'minemo-elementor-preview', get_template_directory_uri() . '/inc/elementor-preview.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'tm_elementor_preview_scripts' );

function tm_elementor_enqueue_base_scripts(){
	wp_enqueue_script(  'minemo-functions', get_template_directory_uri() . '/js/functions.js' );
	wp_enqueue_script(  'minemo-elementor-main', get_template_directory_uri() . '/inc/elementor-main.js' );
}
add_action('elementor/editor/before_enqueue_scripts', 'tm_elementor_enqueue_base_scripts');


/**
 * Creating element widgets now*/
 
add_action( 'elementor/widgets/register', 'tm_elementor_register_widgets',1,1 );
function tm_elementor_register_widgets() {

    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {

        require_once( get_template_directory() . '/inc/elementor/heading-subheading.php' );
		require_once( get_template_directory() . '/inc/elementor/icon-heading.php' );
		require_once( get_template_directory() . '/inc/elementor/fid.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-service.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-testimonial.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-blog.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-team.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-client.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-portfolio.php' );
		require_once( get_template_directory() . '/inc/elementor/pricing-table.php' );
		require_once( get_template_directory() . '/inc/elementor/static-box.php' );
		require_once( get_template_directory() . '/inc/elementor/pricestaticbox.php' );
		require_once( get_template_directory() . '/inc/elementor/coverimg-box.php' );
		require_once( get_template_directory() . '/inc/elementor/history-box.php' );
		require_once( get_template_directory() . '/inc/elementor/sliderimg-box.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-staticboxslider.php' );
		require_once( get_template_directory() . '/inc/elementor/listimg-box.php' );
		require_once( get_template_directory() . '/inc/elementor/prt-tabs.php' );
		require_once( get_template_directory() . '/inc/elementor/course-table.php' );
		require_once( get_template_directory() . '/inc/elementor/marquee-box.php' );
		require_once( get_template_directory() . '/inc/elementor/cmsbanner-box.php' );
		require_once( get_template_directory() . '/inc/elementor/date-counter.php' );
		require_once( get_template_directory() . '/inc/elementor/scrolling-text.php' );
		 if( function_exists('is_woocommerce')){
			require_once( get_template_directory() . '/inc/elementor/product-box.php' );
		}
    }
}

if( !function_exists('tm_link_render') ){
function tm_link_render( $value=array(), $type='start' ) {
	if( !empty($value) && is_array($value) && !empty($value['url']) ){
		if( $type=='start' ){
			$target		= $value['is_external'] ? ' target="_blank"' : '';
			$nofollow	= $value['nofollow'] ? ' rel="nofollow"' : '';
			return preyantechnosys_wp_kses( '<a href="' . $value['url'] . '"' . $target . $nofollow . '><span>' ); 
		} else {
			return preyantechnosys_wp_kses( '</span></a>' ); 
		}
	}
}
}

/***Themetechmount Iconbox Element code***/

if( !function_exists('preyantechnosys_iconbox_ele') ){
function preyantechnosys_iconbox_ele( $settings, $echo=false ){
	$return = '';
	
	if( !empty($settings['icon_type']) ){

		switch( $settings['icon_type'] ){

			case 'icon':
				if( !empty($ttm_data['icon']['value']) ){
					$return = '<i class="'.esc_attr( $settings['icon']['value'] ).'"></i>';

				}
				break;

			case 'image':
				if( !empty($settings['icon_image']['url']) ){
					$return = '<img src="'.esc_attr( $settings['icon_image']['url'] ).'" />';
				}
			break;

			case 'text':
				if( !empty($settings['icon_text']) ){
					$return = '<div class="prt-iheading-icontext">'.esc_attr($settings['icon_text']).'</div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = preyantechnosys_wp_kses('<div class="prt-iheading-icon prt-iheading-icon-type-'.esc_attr($settings['icon_type']).'">'.$return.'</div>');
	}

	if( $echo == true ){
		echo preyantechnosys_wp_kses($return);
	} else {
		return preyantechnosys_wp_kses($return);
	}

}
}

/**
 *  Heading Sub Heading Element.
 */

if( !function_exists('prt_heading_subheading') ){
function prt_heading_subheading( $settings = array(), $echo = false ){

	// Reverse heading class
	$reverse_class = '';
	if( !empty($settings['reverse_heading']) && $settings['reverse_heading']=='yes' ){
		$reverse_class = 'prt-reverse-heading-yes';
	}
	
	// desc heading class
	$desc = '';
	if( !empty($settings['desc'] )){
		$desc = 'prt-content-with-desc';
	}
	
	$heading_style = '';
	
	$return = '<div class="prt-element-heading-content-wrapper ' . preyantechnosys_wp_kses($settings['text_align']) . '-align '.esc_attr($reverse_class).' prt-seperator-'. preyantechnosys_wp_kses($settings['heading_sep']) .' '.esc_attr($desc).' prt-heading-style-'. preyantechnosys_wp_kses($settings['heading_style']) .' ">';
	
	$heading = '';
	
	// icon
	$return .= preyantechnosys_iconbox_ele($settings);
	
	$return .= preyantechnosys_wp_kses('<div class="prt-content-header">');
	
	// Heading
	if( !empty($settings['heading']) ) {
		$heading_tag = ( !empty($settings['heading_tag']) ) ? $settings['heading_tag'] : 'h2' ;

		$heading .= '<'. preyantechnosys_wp_kses($heading_tag) . ' class="prt-element-content-heading">
				'.preyantechnosys_wp_kses($settings['heading']).'
			</'. preyantechnosys_wp_kses($heading_tag) . '>
		';
	}

	// reverse before heading
	if( empty($settings['reverse_heading']) && !empty($heading) ){
		$return .= preyantechnosys_wp_kses($heading);
	}

	// subheading
	if( !empty($settings['subheading']) ) {
		$subheading_tag	= ( !empty($settings['subheading_tag']) ) ? $settings['subheading_tag'] : 'h4' ;
		$subheading		= '<'. preyantechnosys_wp_kses($subheading_tag) . ' class="prt-element-subheading">
				'.preyantechnosys_wp_kses($settings['subheading']).'
			</'. preyantechnosys_wp_kses($subheading_tag) . '>
		';
		$return .= preyantechnosys_wp_kses($subheading);
	}

	// Heading after sub-title
	if( !empty($settings['reverse_heading']) && !empty($heading) ){
		$return .= preyantechnosys_wp_kses($heading);
	}
	$return .= preyantechnosys_wp_kses('</div>');
	if( !empty($settings['desc']) ){
		$desc = '<div class="prt-element-content-desctxt">'.preyantechnosys_wp_kses($settings['desc']).'</div>';
		$return .= preyantechnosys_wp_kses($desc);
	}
	// closing div
	$return .= preyantechnosys_wp_kses('</div>');

	// final output
	if( $echo == true ){
		echo preyantechnosys_wp_kses($return);
	} else {
		return preyantechnosys_wp_kses($return);
	}

}
}

add_action('elementor/element/section/section_layout/before_section_start', 'tm_elementor_section_options', 10);
if( !function_exists('tm_elementor_section_options') ){
function tm_elementor_section_options( $element ){

	$element->start_controls_section(
		'tm_element_section_title',
		[
			'label' => __('Minemo Special Options', 'minemo'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
	
	$element->add_control(
		'tm_break_col',
		[
			'label'			=> esc_html__( 'Break Column in Ipad Screen', 'minemo' ),
			'description'	=> esc_html__( 'Pre-defined Break Column', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'no',
			'prefix_class'	=> 'prt-column-break-ipad-',
			'options' => [
				'no' 			=> __( 'No', 'minemo' ),
				'yes'		=> __( 'Yes', 'minemo' ),
			],
		]
	);

	$element->add_control(
		'prt-extended-column',
		[
			'label'			=> esc_attr__( 'Exapand Column Background', 'minemo' ),
			'description'	=> esc_attr__( 'Exapand Column BG to left or right. This will expand the Background image/color visibility to border of the browser border.', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'label_block'	=> true,
			'hide_in_inner' => true,
			'default'		=> 'none',
			'prefix_class'	=> 'prt-col-stretched-',
			'options'		=> [
				'none' 			=> __( 'No expand (default)', 'minemo' ),
				'left'		=> __( 'Exapand Column background to left', 'minemo' ),
				'right'		=> __( 'Exapand Column background to right', 'minemo' ),	
				'both'		=> __( 'Exapand Column background to both', 'minemo' ),				
			],
		]
	);


	$element->add_control(
		'prt-strech-content-left',
		[
			'label'			=> esc_attr__( 'Also stretch left content too?', 'minemo' ),
			'description'	=> esc_attr__( 'Also stretch left content too?', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'prt-left-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'minemo' ),
			'label_off'		=> esc_attr__( 'No', 'minemo' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'prt-extended-column' => array('left', 'both'),
			]
		]
	);
	$element->add_control(
		'prt-strech-content-right',
		[
			'label'			=> esc_attr__( 'Also stretch right content too?', 'minemo' ),
			'description'	=> esc_attr__( 'Also stretch right content too?', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'prt-right-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'minemo' ),
			'label_off'		=> esc_attr__( 'No', 'minemo' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'prt-extended-column' => array('right', 'both'),
			]
		]
	);
	
	
	$element->add_control(
		'prt-left-margin',
		[
			'label'			=> esc_html__( 'Left Content Area Margin', 'minemo' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'separator'		=> 'before',
			'selectors' => [
				'{{WRAPPER}} .prt-stretched-div.prt-stretched-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$element->add_control(
		'prt-right-margin',
		[
			'label'			=> esc_html__( 'Right Content Area Margin', 'minemo' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .prt-stretched-div.prt-stretched-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$element->add_control(
		'tm_bg_color',
		[
			'label'			=> esc_html__( 'Background Color', 'minemo' ),
			'description'	=> esc_html__( 'Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'separator'		=> 'before',
			'prefix_class'	=> 'prt-bgcolor-',
			"weight"      => 1,
			'options'		=> [
				'' 		=> esc_attr__( 'Transparent (From Design Options tab)', 'minemo' ),
				'darkgrey'		=> esc_attr__( 'Dark grey color as background color', 'minemo' ),
				'grey'			=> esc_attr__( 'Grey color as background color', 'minemo' ),
				'white'	        => esc_attr__( 'White color as background color', 'minemo' ),
				'skincolor'  	=> esc_attr__( 'Skincolor color as background color', 'minemo' ),
				'gradient'		=> esc_attr__( 'Gradient color as background color', 'minemo' ),
				
			],
		]
	);

	$element->add_control(
		'tm_text_color',
		[
			'label'			=> esc_html__( 'Section Text Color', 'minemo' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Section (ROW)', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'prt-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'minemo' ),
				'white'		=> __( 'White Color', 'minemo' ),
				'dark'		=> __( 'Dark Color', 'minemo' ),
				'skincolor'	=> __( 'Skin Color', 'minemo' ),
			],
		]
	);
	
	$element->add_control(
		'tm_section_hightl_bg',
		[
			'label' => esc_attr__( 'HighLight BG Color One', 'minemo' ),
			'description' => esc_attr__( 'show highLight background dot color one.', 'minemo' ),
			'type' => Elementor\Controls_Manager::SWITCHER,
			'label_on' => esc_attr__( 'Yes', 'minemo' ),
			'label_off' => esc_attr__( 'No', 'minemo' ),
			'prefix_class'	=> 'prt-highlight-bg-',
			'return_value' => 'yes',
			'default' => '',
		]
	);
	
	$element->add_control(
		'tm_section_hightl_bg1_color',
		[
			'label' => esc_attr__( 'High Light BG Color One', 'minemo' ),
			'description' => esc_attr__( 'show highLight background color.', 'minemo' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'default' => '',
				'selectors' => [
					'{{WRAPPER}} .prt-section-hili-dot.prt-hilidot-left' => 'color: {{VALUE}};',
				],
			'condition'		=> [
				'tm_section_hightl_bg' => 'yes',
			]
		]
	);

	
		$start = is_rtl() ? esc_html__( 'Right', 'minemo' ) : esc_html__( 'Left', 'minemo' );
		$end = ! is_rtl() ? esc_html__( 'Right', 'minemo' ) : esc_html__( 'Left', 'minemo' );

		$element->add_control(
			'tmhis_offset_orientation_h',
			[
				'label' => esc_html__( 'Horizontal Orientation', 'minemo' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => $start,
						'icon' => 'eicon-h-align-left',
					],
					'end' => [
						'title' => $end,
						'icon' => 'eicon-h-align-right',
					],
				],
				'classes' => 'elementor-control-start-end',
				'render_type' => 'ui',
				'condition'		=> [
					'tm_section_hightl_bg' => 'yes',
				]
			]
		);
		
		$element->add_responsive_control(
			'tmhis_offset_x',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh' ],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .prt-hilidot-left' => 'left: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .prt-hilidot-left' => 'right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_h!' => 'end',
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);
		
		$element->add_responsive_control(
			'tmhis_offset_x_end',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 0.1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh' ],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .prt-hilidot-left' => 'right: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .prt-hilidot-left' => 'left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_h' => 'end',
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);
		
		$element->add_control(
			'tmhis_offset_orientation_v',
			[
				'label' => esc_html__( 'Vertical Orientation', 'minemo' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__( 'Top', 'minemo' ),
						'icon' => 'eicon-v-align-top',
					],
					'end' => [
						'title' => esc_html__( 'Bottom', 'minemo' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'render_type' => 'ui',
				'condition'		=> [
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);
		
		$element->add_responsive_control(
			'tmhis_offset_y',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-left' => 'top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_v!' => 'end',
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);

		$element->add_responsive_control(
			'tmhis_offset_y_end',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-left' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_v' => 'end',
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);

		$element->add_responsive_control(
			'tmhis_z_index',
			[
				'label' => esc_html__( 'Z-Index', 'minemo' ),
				'type' => Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-left' => 'z-index: {{VALUE}};',
				],
				'condition'		=> [
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);
		$element->add_control(
			'tmhis_font_size',
			[
				'label' => esc_html__( 'Font Size', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-left' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [
					'tm_section_hightl_bg' => 'yes',
				],
			]
		);
		
		$element->add_control(
		'tm_section_hight2_bg',
		[
			'label' => esc_attr__( 'HighLight BG Color Two', 'minemo' ),
			'description' => esc_attr__( 'show high light background dot color two.', 'minemo' ),
			'type' => Elementor\Controls_Manager::SWITCHER,
			'label_on' => esc_attr__( 'Yes', 'minemo' ),
			'label_off' => esc_attr__( 'No', 'minemo' ),
			'prefix_class'	=> 'prt-highlight-bg-',
			'return_value' => 'yes',
			'default' => '',
		]
	);
	
	$element->add_control(
		'tm_section_hightl_bg2_color',
		[
			'label' => esc_attr__( 'High Light BG Color Two', 'minemo' ),
			'description' => esc_attr__( 'show high light background color.', 'minemo' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'default' => '',
				'selectors' => [
					'{{WRAPPER}} .prt-section-hili-dot.prt-hilidot-right' => 'color: {{VALUE}};',
				],
			'condition'		=> [
				'tm_section_hight2_bg' => 'yes',
			]
		]
	);
	
	$element->add_control(
			'tmhis_offset_orientation_h2',
			[
				'label' => esc_html__( 'Horizontal Orientation', 'minemo' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => $start,
						'icon' => 'eicon-h-align-left',
					],
					'end' => [
						'title' => $end,
						'icon' => 'eicon-h-align-right',
					],
				],
				'classes' => 'elementor-control-start-end',
				'render_type' => 'ui',
				'condition'		=> [
					'tm_section_hight2_bg' => 'yes',
				]
			]
		);
		
		$element->add_responsive_control(
			'tmhis_offset_x2',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh' ],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .prt-hilidot-right' => 'left: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .prt-hilidot-right' => 'right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_h2!' => 'end',
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);
		
		$element->add_responsive_control(
			'tmhis_offset_x2_end',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 0.1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh' ],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .prt-hilidot-right' => 'right: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .prt-hilidot-right' => 'left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_h2' => 'end',
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);
		
		$element->add_control(
			'tmhis_offset_orientation_v2',
			[
				'label' => esc_html__( 'Vertical Orientation', 'minemo' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__( 'Top', 'minemo' ),
						'icon' => 'eicon-v-align-top',
					],
					'end' => [
						'title' => esc_html__( 'Bottom', 'minemo' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'render_type' => 'ui',
				'condition'		=> [
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);
		
		$element->add_responsive_control(
			'tmhis_offset_y2',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-right' => 'top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_v2!' => 'end',
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);

		$element->add_responsive_control(
			'tmhis_offset_y2_end',
			[
				'label' => esc_html__( 'Offset', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-right' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'tmhis_offset_orientation_v2' => 'end',
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);

		$element->add_responsive_control(
			'tmhis_z_index2',
			[
				'label' => esc_html__( 'Z-Index', 'minemo' ),
				'type' => Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-right' => 'z-index: {{VALUE}};',
				],
				'condition'		=> [
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);
		$element->add_control(
			'tmhis_font_size2',
			[
				'label' => esc_html__( 'Font Size', 'minemo' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .prt-hilidot-right' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [
					'tm_section_hight2_bg' => 'yes',
				],
			]
		);
		

	

	$element->end_controls_section();
}
}


/**
 * Elementor column options
 */
add_action('elementor/element/column/layout/before_section_start', 'tm_elementor_column_options', 10);
if( !function_exists('tm_elementor_column_options') ){
function tm_elementor_column_options( $element ){

	$element->start_controls_section(
		'tm_element_section_title',
		[
			'label' => __('Minemo Special Options', 'minemo'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'tm_bg_color',
		[
			'label'			=> esc_html__( 'Column Background Color', 'minemo' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Column', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'prt-bgcolor-yes prt-col-bgcolor-',
			"weight"      => 1,
			'options'		=> [
				'' 			=> esc_attr__( 'Transparent (From Design Options tab)', 'minemo' ),
				'darkgrey'		=> esc_attr__( 'Dark grey color as background color', 'minemo' ),
				'grey'			=> esc_attr__( 'Grey color as background color', 'minemo' ),
				'white'	        => esc_attr__( 'White color as background color', 'minemo' ),
				'skincolor'  	=> esc_attr__( 'Skincolor color as background color', 'minemo' ),
				'gradient'		=> esc_attr__( 'Gradient color as background color', 'minemo' ),
				
			],
		]
	);

	$element->add_control(
		'tm_text_color',
		[
			'label'			=> esc_html__( 'Column Text Color', 'minemo' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Column', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'prt-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'minemo' ),
				'white'		=> __( 'White Color', 'minemo' ),
				'dark'		=> __( 'Dark Color', 'minemo' ),
				'skincolor'	=> __( 'Skin Color', 'minemo' ),
			],
		]
	);

	$element->end_controls_section();
}
}



/**
 * Elementor button options
 */
add_action('elementor/element/button/section_button/before_section_start', 'tm_elementor_button_options', 10);
if( !function_exists('tm_elementor_button_options') ){
function tm_elementor_button_options( $element ){

	$element->start_controls_section(
		'tm_element_section_title',
		[
			'label' => __('Minemo Special Options', 'minemo'),
			'tab' => Elementor\Controls_Manager::TAB_CONTENT,
		]
	);
		
	$element->add_control(
		'color',
		[
			'label'			=> esc_html__( 'Button Color', 'minemo' ),
			'description'	=> esc_html__( 'Pre-defined Color for Button', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'skincolor',
			'label_block'	=> true,
			'prefix_class'	=> 'prt-btn-color-',
			'options' => [
				'darkgrey'		=> esc_attr__( 'Dark Grey', 'minemo' ),
				'grey'			=> esc_attr__( 'Grey Color', 'minemo' ),
				'white'	        => esc_attr__( 'White Color', 'minemo' ),
				'skincolor'  	=> esc_attr__( 'Skin Color', 'minemo' ),
				'gradient'		=> esc_attr__( 'Gradient Color', 'minemo' ),
			],
		]
	);
	$element->add_control(
		'style',
		[
			'label'			=> esc_html__( 'Select Button Style', 'minemo' ),
			'description'	=> esc_html__( 'Button style', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'flat',
			'label_block'	=> true,
			'prefix_class'	=> 'prt-btn-style-',
			'options' => [
				'flat' 			=> esc_attr__( 'Flat', 'minemo' ),
				'outline'		=> esc_attr__( 'Outline', 'minemo' ),
				'text'			=> esc_attr__( 'Simple text', 'minemo' ),
			],
		]
	);
	
	$element->add_control(
		'shape',
		[
			'label'			=> esc_attr__( 'Select button shape.', 'minemo' ),
			'description'	=> esc_attr__( 'Select button shape.', 'minemo' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'label_block'	=> true,
			'prefix_class'	=> 'prt-btn-shape-',
			'default'		=> 'square',
			'options' => [
				'square' 		=> esc_attr__( 'Square', 'minemo' ),
				'rounded'		=> esc_attr__( 'Rounded', 'minemo' ),
				'round'			=> esc_attr__( 'Round', 'minemo' ),
			],
		]

	);
	
	$element->add_control(
			'icon-pos',
			[
				'label' => __( 'Icon Position', 'minemo' ),
				'type' => Elementor\Controls_Manager::SELECT,
				'label_block'	=> true,
				'prefix_class'	=> 'prt-icon-align-',
				'default' => 'left',
				'options' => [
					'left'  => __( 'Before', 'minemo' ),
					'right' => __( 'After', 'minemo' ),
				],
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);
		
		
	$element->end_controls_section();
}
}
	
/* enable builder for custom cpt */

if( !function_exists('tm_elementor_enable_cpt_support') ){
function tm_elementor_enable_cpt_support() {

	$cpt_support  = array( 'page', 'post', 'tm_portfolio', 'tm_service', 'tm_team_member' );
	update_option( 'elementor_cpt_support', $cpt_support  );

}
}
add_action( 'after_switch_theme', 'tm_elementor_enable_cpt_support' );