<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Fact & Digit Widget.
*/
 
class Funerio_Scrollingtext_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_scrollingtext_element';
	}

	public function get_title() {
		return esc_attr__( 'Scrolling Text', 'minemo' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'minemo_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}  
	
	protected function register_controls() {

		$this->start_controls_section(
			'section_st',
			[
				'label' => __('Scrolling Text', 'minemo'),
			]
		);
		
		
		$this->add_control(
			'stext_title',
			[
				'label' => __('Scrolling Title', 'minemo'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('Heading', 'minemo'),
			]
		);

		$this->add_control(
			'stext_animation_position',
			[
				'label'      => __('Animation Position', 'minemo'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'right',
				'options'    => [
					'left' => __('Left', 'minemo'),
					'right'  => __('Right', 'minemo'),
				],
			]
		);

		$this->end_controls_section();
		
		// Title Style Section
		$this->start_controls_section(
			'section_scroll_text',
			[
				'label' => __('Title', 'minemo'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mobile_typography',
				'label' => __('Typography', 'minemo'),
				'selector' => '{{WRAPPER}} .tm-scrollintetx-wrapper',
			]
		);

		$this->add_control(
			'sub_title_hover_color',
			[
				'label' => __('Color', 'minemo'),
				'type' => Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .tm-scrollintetx-wrapper' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_control(
			'title_text_stroke_color',
			[
				'label' => __('Stroke Color', 'minemo'),
				'type' => Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .tm-scrollintetx-wrapper' => '-webkit-text-stroke: {{VALUE}} 1px;',
				],

			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
	?>
	<div class="tm-scrollintetx-wrapper">
		<?php
        if($settings['stext_animation_position'] == 'left') {
			if(!empty($settings['stext_title'])){ ?>
				<div data-bottom="transform:translatex(-100px)" data-top="transform:translatex(0);">
					<?php echo esc_html($settings['stext_title']); ?>
				</div> <?php
			}
        }

        if($settings['stext_animation_position'] == 'right') {
			if(!empty($settings['stext_title'])){ ?>
				<div data-bottom="transform:translatex(300px)" data-top="transform:translatex(0);">
					<?php echo esc_html($settings['stext_title']); ?>
				</div> <?php
			}
        }
	?>
	</div>
	<?php
	if (Plugin::$instance->editor->is_edit_mode()) {	
?>
			<script>
				(function(jQuery) {
					callScrollingText();
				})(jQuery);
			</script>
<?php	
		}
	}
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Funerio_Scrollingtext_Widget() );