<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class Minemo_Listimgbox_Widget extends Widget_Base{

	public function get_name() {
		return 'prt_listimgbox_element';
	}

	public function get_title() {
		return esc_attr__( 'List Image Box', 'minemo' );
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
				'prefix'		=> 'preyantechnosys-listimgbox preyantechnosys-listimgbox-',
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
				'default' => esc_attr( 'solid' ),
				'condition' => [
                    'view' => 'styletwo',
                ]
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
				'condition' => [
                    'view' => 'styletwo',
                ]
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
				'condition' => [
                    'view' => 'styletwo',
                ]
			]
		);
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'data_section2',
			[
				'label' => esc_attr__( 'Boxes Content', 'minemo' ),
			]
        );
		
		$this->add_control(
			'box_border',
			[
				'label'			=> esc_attr__( 'Box border', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'yes'	=> esc_attr( 'Yes' ),
					'no'	=> esc_attr( 'No' ),
				],
				'default' => esc_attr( 'no' ),
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
			'label_link',
			[
				'label' => esc_attr__( 'Label Link', 'minemo' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
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
		$image_html = $smalltext_html = $label_html = $sublabel_html = $boxborder_html = '';
		?> <div class="prt_listimgbox_wrapper">
			<?php prt_heading_subheading($settings, true); ?>
			<ul class="prt_listimgbox_list_content 	preyantechnosys-listimgbox-<?php echo esc_attr($boxstyle)?>">
			
	
		<?php 
		$count = 1;
		foreach( $settings['boxes'] as $box ){
			if( !empty($box['label']) ){
				$label_html	= ''.preyantechnosys_wp_kses($box['label']).'';
				$label_html = '<h4 class="prt-box-title">'.tm_link_render($box['label_link'], 'start' ).''.$label_html.''.tm_link_render($box['label_link'], 'end' ).'</h4>';
			}
			if( !empty($box_border) ){
				$boxborder_html = esc_attr($box_border);
			}
			
			$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" />';
			$icon = '<div class="prt-stepbox-imagebox"><div class="prt-ptable-icon-type-image">' . $icon_image . '</div></div>';
		

		
		include( locate_template( '/template-parts/listimgbox/listimgbox-'.esc_attr($view).'.php', false, false ) ); 
		$count++;
		}
		
		?> </ul>
		
		</div>
		<?php
	}


}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_Listimgbox_Widget() );