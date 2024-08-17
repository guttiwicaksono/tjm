<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class Minemo_pricestaticbox_Widget extends Widget_Base{

	public function get_name() {
		return 'prt_pricestaticbox_element';
	}

	public function get_title() {
		return esc_attr__( 'Pricestatic Box', 'minemo' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}

	public function get_categories() {
		return [ 'minemo_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'General ', 'minemo' ),
			]
		);
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'General', 'minemo' ),
				'description'	=> esc_attr__( 'Select List Box style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'styleone',
				'prefix'		=> 'preyantechnosys-pricestaticbox preyantechnosys-pricestaticbox-',
				'options' => [
					'styleone'	=> esc_attr( 'Style 1' ),
				],
			]
		);
		$this->add_control(
			'heading',
			[
				'label' => esc_attr__( 'Heading', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_attr__( 'Our Services', 'minemo' ),
				'placeholder' => esc_attr__( 'Enter text for heading text.', 'minemo' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading',
			[
				'label' => esc_attr__( 'Subheading', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '', 'minemo' ),
				'placeholder' => esc_attr__( 'Enter text for subheading line.', 'minemo' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'reverse_heading',
			[
				'label' => esc_attr__( 'Reverse heading order', 'minemo' ),
				'description' => esc_attr__( 'Show sub-heading before heading.', 'minemo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'minemo' ),
				'label_off' => esc_attr__( 'No', 'minemo' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Enter description text', 'minemo' ),
			]
		);
	$this->add_control(
			'heading_sep',
			[
				'label' => esc_attr__( 'Seperator', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none'	=> esc_attr( 'None' ),
					'solid'	=> esc_attr( 'Solid' ),
				],
				'default' => esc_attr( 'none' ),
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_attr__( 'Text alignment', 'minemo' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_attr__( 'Left', 'minemo' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'minemo' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'minemo' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'prt-align-',
				'selectors' => [
					'{{WRAPPER}} .prt-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => 'left',
			]
		);
		
		$this->add_control(
			'heading_style',
			[
				'label'			=> esc_attr__( 'Heading Style', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'vertical'	=> esc_attr( 'Vertical (Default)' ),
					'horizontal'	=> esc_attr( 'Horizontal' ),
				],
				'default' => esc_attr( 'vertical' ),
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
				'label' => esc_attr__( 'Heading Tag', 'minemo' ),
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
				'label' => esc_attr__( 'Subheading Tag', 'minemo' ),
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
			'data_section2',
			[
				'label' => esc_attr__( 'Boxes Content', 'minemo' ),
			]
        );
		$repeater = new Repeater();

		$repeater->add_control(
			'icon_image',
			[
				'label' => __( 'Select Image for Icon', 'minemo' ),
				'description' => __( 'image will appear at icon position', 'minemo' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

	
		$repeater->add_control(
			'label',
			[
				'label' => esc_attr__( 'Box Title', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( 'Box Title', 'minemo' ),
				'placeholder' => esc_attr__( 'Box Title', 'minemo' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'sublabel',
			[
				'label' => esc_attr__( 'Box Sub Title', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( 'Box Sub Title', 'minemo' ),
				'placeholder' => esc_attr__( 'Box Title', 'minemo' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'smalltext',
			[
				'label' => esc_attr__( 'Box Content', 'minemo' ),
				'default' => esc_attr__( 'Box Content', 'minemo' ),
				'placeholder' => esc_attr__( 'Box Content', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'minemo' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is first box', 'minemo' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'minemo' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();



	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
				$boxstyle	= $view;
		$image_html = $smalltext_html = $label_html = $sublabel_html = '';
		?> <div class="prt_pricestaticbox_wrapper">
			<?php prt_heading_subheading($settings, true); ?>
			<ul class="prt_pricestaticbox_list_content 	preyantechnosys-pricestaticbox-<?php echo esc_attr($boxstyle)?>">
			
	
		<?php 
		$count = 1;
		foreach( $settings['boxes'] as $box ){
			if( !empty($box['smalltext']) ){
					$smalltext_html = '<div class="prt-cta3-content-wrapper">'.preyantechnosys_wp_kses($box['smalltext']).'</div>';
			}
			if( !empty($box['label']) ){
				$label_html = '<h4 class="prt-box-title">'.preyantechnosys_wp_kses($box['label']).'</h4>';
			}
			if( !empty($box['sublabel']) ){
				$sublabel_html = '<h4 class="prt-box-subtitle">'.preyantechnosys_wp_kses($box['sublabel']).'</h4>';
			}
			$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" />';
			$icon = '<div class="prt-pricestaticbox-imagebox"><div class="prt-ptable-icon-type-image">' . $icon_image . '</div></div>';
		

		
		include( locate_template( '/template-parts/pricestaticbox/pricestaticbox-'.esc_attr($view).'.php', false, false ) ); 
		$count++;
		}
		
		?> </ul>
		
		</div>
		<?php
	}


}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_pricestaticbox_Widget() );