<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Fact & Digit Widget.
*/
 
class minemo_DateCounter_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_datecounter_element';
	}

	public function get_title() {
		return esc_attr__( 'Date Counter Box', 'minemo' );
	}

	public function get_icon() {
		return 'eicon-date';
	}

	public function get_categories() {
		return [ 'minemo_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}  
	
	protected function _register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content', 'minemo' ),
			]
        );
		
		$this->add_control(
			'counterdate',
			[
				'label' => esc_attr__( 'Date', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( '2021-12-25 18:30:00', 'minemo' ),
				'placeholder' => esc_attr__( 'You can enter the counter days. Example: 2022-05-25 18:30:00', 'minemo' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'Design', 'minemo' ),
				'description'	=> esc_attr__( 'Select box design.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'one',
				'options' => [
					'one'	=> esc_attr( 'Style 1' ),
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label'			=> esc_attr__( 'Choose Image', 'minemo' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'default' => 'large',
				'separator' => 'none',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'minemo' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'minemo' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'minemo' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'minemo' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
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
				'default' => esc_attr__( 'Read More', 'minemo' ),
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
		
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		
		global $tm_global_datecounter_element_values;
		$tm_global_datecounter_element_values = array();
		
		$return = '';


		$class         = array();

		if( !empty($view) ){
			$class[] = 'prt-datecounter-'.$view;
		}

		
		// Media image
			$image_html		= '' ;
			if( defined('ELEMENTOR_VERSION') ){
				$image_html = Group_Control_Image_Size::get_attachment_image_src( $settings['image']['id'], 'image', $settings );
				if( !empty($image_html) ){
					$image_html = '<img src="'.esc_url($image_html).'" class="prt-single-image-img" alt="Image"/>';
				}

			}
			
			$counterdate= ( !empty($settings['counterdate']) ) ? ''.esc_html($settings['counterdate']).'' : '' ;
			
			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_html = '<div class="prt-iocnbox-btn">' . tm_link_render($settings['btn_link'], 'start' ) . preyantechnosys_wp_kses($settings['btn_title']) . tm_link_render($settings['btn_link'], 'end' ) . '</div>';
			}
			
		if( file_exists( locate_template( '/template-parts/datecounter/datecounter.php', false, false ) ) ){

			ob_start();
			include( locate_template( '/template-parts/datecounter/datecounter.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

		}
		
		echo preyantechnosys_wp_kses($return);

	}


}
// Register widget
Plugin::instance()->widgets_manager->register( new minemo_DateCounter_Widget() );