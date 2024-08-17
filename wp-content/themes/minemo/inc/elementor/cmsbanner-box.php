<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Icon Heading Box
*/
class Minemo_Cmsbannerbox_Widget  extends Widget_Base{
	
	public function get_name() {
		return 'tm_cmsbannerbox_element';
	}
	
	public function get_title() {
		return esc_attr__( 'Banner Box', 'minemo' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'minemo_category' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Content', 'minemo' ),
			]
		);
		
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'Box Design', 'minemo' ),
				'description'	=> esc_attr__( 'Select IconBox style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'styleone',
				'prefix'		=> 'preyantechnosys-iconbox preyantechnosys-iconbox-',
				'options' => [
					'styleone'	=> esc_attr( 'Style 1' ),
				],
			]
		);
		
        $this->add_control(
			'icon_image',
			[
				'label' => esc_attr__( 'Select Image', 'minemo' ),
				'description' => __( 'image will appear at in bg', 'minemo' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);
		

		$this->add_control(
			'heading',
			[
				'label' => esc_attr__( 'Text 1', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter text for text1.', 'minemo' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading',
			[
				'label' => esc_attr__( 'Text 2', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter text for text2', 'minemo' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Text 3', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter text for text3', 'minemo' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_title',
			[
				'label' => esc_attr__( 'Button Title', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'separator'		=> 'before',
				'placeholder' => esc_attr__( 'Enter button title text', 'minemo' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'minemo' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'minemo' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label' => esc_attr__( 'Text 1 Tag', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subheading_tag',
			[
				'label' => esc_attr__( 'Text 2 Tag', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);

		$this->end_controls_section();

	$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Typo Settings', 'minemo' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'heading_title',
				[
					'label' => esc_attr__( 'Heading', 'minemo' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'heading_color',
				[
					'label' => esc_attr__( 'Color', 'minemo' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .preyantechnosys-bannerbox .prt-custom-heading' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .preyantechnosys-bannerbox .prt-custom-heading',
				]
			);
			$this->add_responsive_control(
				'heading_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'minemo' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .preyantechnosys-bannerbox .prt-custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_subheading',
				[
					'label' => esc_attr__( 'Sub Heading', 'minemo' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'stitle_color',
				[
					'label' => esc_attr__( 'Color', 'minemo' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .preyantechnosys-bannerbox .prt-element-subheading' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'subheading_typography',
					'selector' => '{{WRAPPER}} .preyantechnosys-bannerbox .prt-element-subheading',
				]
			);
			$this->add_responsive_control(
				'subheading_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'minemo' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .preyantechnosys-bannerbox .prt-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_desc',
				[
					'label' => esc_attr__( 'Description', 'minemo' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_attr__( 'Color', 'minemo' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .preyantechnosys-bannerbox .prt-element-content-desctxt' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .preyantechnosys-bannerbox .prt-element-content-desctxt',
				]
			);
			$this->add_responsive_control(
				'desc_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'minemo' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .preyantechnosys-bannerbox .prt-element-content-desctxt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		extract($settings);


		global $tm_global_bannerbox_element_values;
		$tm_global_bannerbox_element_values = array();
		
		$heading_html = $subheading_html = $content_html = $button_html = '';
		
		
		if( file_exists( locate_template( '/template-parts/bannerbox/bannerbox-'.esc_attr($view).'.php', false, false ) ) ){

			if( !empty($settings['heading']) ) {
				$heading_tag	= ( !empty($settings['heading_tag']) ) ? $settings['heading_tag'] : 'h2' ;
				$heading_html	= '<'. preyantechnosys_wp_kses($heading_tag) . ' class="prt-custom-heading">
						'.preyantechnosys_wp_kses($settings['heading']).'
					</'. preyantechnosys_wp_kses($heading_tag) . '>
				';
			}

			if( !empty($settings['subheading']) ) {
				$subheading_tag	= ( !empty($settings['subheading_tag']) ) ? $settings['subheading_tag'] : 'h5' ;
				$subheading_html	= '<'. preyantechnosys_wp_kses($subheading_tag) . ' class="prt-element-subheading">
						'.preyantechnosys_wp_kses($settings['subheading']).'
					</'. preyantechnosys_wp_kses($subheading_tag) . '>
				';
			}

	
			if( !empty($settings['desc']) ){
				$content_html = '<div class="prt-cta3-content-wrapper">'.preyantechnosys_wp_kses($settings['desc']).'</div>';
			}
			
			if( !empty($settings['icon_image']['url']) ){
				$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="" />';
			}
			
			$boxstyle	= $view;
			$mainclass	= '';

			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_html = '<div class="prt-iocnbox-btn">' . tm_link_render($settings['btn_link'], 'start' ) . preyantechnosys_wp_kses($settings['btn_title']) . tm_link_render($settings['btn_link'], 'end' ) . '</div>';
			}
				 include( locate_template( '/template-parts/bannerbox/bannerbox-'.esc_attr($view).'.php', false, false ) ); 							
		}

	}

	protected function content_template() {}
	
}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_Cmsbannerbox_Widget() );