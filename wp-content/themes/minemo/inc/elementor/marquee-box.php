<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class minemo_Marquebox_Widget extends Widget_Base{

	public function get_name() {
		return 'prt_marquebox_element';
	}

	public function get_title() {
		return esc_attr__( 'Marque Box', 'minemo' );
	}

	public function get_icon() {
		return ' eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'minemo_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'General', 'minemo' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Marque Style', 'minemo' ),
				'description'	=> esc_attr__( 'Select Marque style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'style1'	=> esc_attr( 'Style 1' ),
				],
				'default' => esc_attr( 'style1' ),
			]
		);

		$this->end_controls_section();
	
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Content', 'minemo' ),
			]
        );

		$repeater = new Repeater();

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
		

        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'minemo' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'label'		=> esc_attr__( 'This is first box', 'minemo' ),
					],
					[
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
		$return = '';
		?>
		<div class="preyantechnosys-marqueboxes-wrapper prt-marquebox-<?php echo esc_attr($style); ?> row multi-columns-row">
			<ul class="elementor-icon-list-items marquebox-list">
			<?php
				foreach( $settings['boxes'] as $box ){
					$label_html		= ( !empty($box['label']) ) ? '<span class="marque-text">'.esc_html($box['label']).'</span>' : '' ;
					ob_start();
					include( get_template_directory() . '/template-parts/marqueebox/marqueebox-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
				}		
				
				echo preyantechnosys_wp_kses($return);
			?>
			</ul>
		</div>
	    <?php
	}
}
// Register widget
Plugin::instance()->widgets_manager->register( new minemo_Marquebox_Widget() );