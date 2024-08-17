<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class Minemo_Sliderimgbox_Widget extends Widget_Base{

	public function get_name() {
		return 'prt_sliderimgbox_element';
	}

	public function get_title() {
		return esc_attr__( 'Slider Box', 'minemo' );
	}

	public function get_icon() {
		return ' eicon-menu-toggle';
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
			'shortdesc',
			[
				'label' => esc_attr__( 'Short Description', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Enter short description text', 'minemo' ),
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

		$this->start_controls_section(
			'data_section',
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
			'smalltext',
			[
				'label' => esc_attr__( 'Box Content', 'minemo' ),
				'default' => esc_attr__( 'Box Content', 'minemo' ),
				'placeholder' => esc_attr__( 'Box Content', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		
		$repeater->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'minemo' ),					
					'none'	=> esc_attr__( 'None', 'minemo' ),					
				],
				'default' => esc_attr( 'icon' ),
			]
		);
		
         $repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'minemo' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);

		$repeater->add_control(
			'link_text',
			[
				'label' => esc_attr__( 'Link Text', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => esc_attr__( 'Like READ MORE text. This text will appear as link (fill link URL in below option).', 'minemo' ),
				'placeholder' => esc_attr__( 'READ MORE', 'minemo' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);
		
		$repeater->add_control(
			'link_url',
			[
				'label' => esc_attr__( 'Link URL', 'minemo' ),
				'description' => esc_attr__( 'Add link URL here.', 'minemo' ),
				'type' => Controls_Manager::URL,
				'show_label' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
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
						'smalltext'	=> esc_attr__( 'This is small description', 'minemo' ),
						'icon'		=> esc_attr__( 'icon add', 'minemo' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'minemo' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'minemo' ),
						'icon'		=> esc_attr__( 'icon add', 'minemo' ),
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
		$link_html = '';
		$image_html		= '' ;
		$column_class = '';
		$shortdesc_html = '';
		$button_html = '';
		
		$headingclass= '';
		if( empty($settings['heading']) ){
			$headingclass = 'prt-boxwithout-heading';
		}
		if( empty($settings['shortdesc']) ){
			$headingclass = 'prt-boxwithout-shortdesc';
		}
		?>


		<?php
			$col_start_div	= '';
			$col_end_div	= '';
					if( !empty($boxes) ){
						switch( count($boxes) ){
					case 1:
						$column_class = 'one';
					break;
					
					case 2:
						$column_class = 'two';
					break;
					
					case 3:
						$column_class	 = 'three';
					break;
					
					case 4:
					default:
						$column_class = 'four';
					break;
				}
			} ?>
			<?php
				if( !empty($settings['shortdesc']) ){
				$shortdesc_html = '<div class="prt-sliderbox-shortdesc"><h3>'.preyantechnosys_wp_kses($settings['shortdesc']).'</h3></div>';
			}
			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_html = '<div class="prt-sliderbox-btn">' . tm_link_render($settings['btn_link'], 'start' ) . preyantechnosys_wp_kses($settings['btn_title']) . tm_link_render($settings['btn_link'], 'end' ) . '</div>';
			}

			?>
<div class="tm_sliderimgbox_wrapper">

<div class="prt_sliderimgbox_heading preyantechnosys-box-heading-wrapper <?php echo preyantechnosys_wp_kses($headingclass); ?>">
				<?php 
				echo preyantechnosys_wp_kses($shortdesc_html);
				prt_heading_subheading($settings, true); ?>
				<?php
				if( function_exists('preyantechnosys_get_filterbutton') ){
					$sortable_category_html = preyantechnosys_get_filterbutton( $settings, 'prt_sliderbox' );
					echo  preyantechnosys_wp_kses($sortable_category_html);
				}
				echo preyantechnosys_wp_kses($button_html);
				?>
				
			</div>
<div class="prt-column-<?php echo esc_attr($column_class); ?>">
<?php $label_heading		= ( !empty($box['heading']) ) ? '<div class="prt-Heading"><h4>'.esc_html($box['heading']).'</h4></div>' : '' ;  ?>

		<?php
		$count = 1;
		$accclass = '';

		foreach( $settings['boxes'] as $box ){
			$icon_html = '';
			$icon_type_class = '';

			if( !empty($box['icon_type']) ){

				 if( $box['icon_type']=='none' ){
					$icon_html = '';
					$icon_type_class = 'none';
				} else {

					$icon_html       = '<div class="prt-box-icon"><i class="' . $box['icon']['value'] . '"></i></div>';
					$icon_type_class = 'icon';

					wp_enqueue_style( 'elementor-icons-'.$box['icon']['library']);
				}
			}
			 								
			$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="preyantechnosys-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
			$label_html		= ( !empty($box['label']) ) ? '<div class="prt-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;

							$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" />';
							$icon = '<div class="prt-stepbox-imagebox"><div class="prt-ptable-icon-type-image">' . $icon_image . '</div></div>';
					
							
			
			$link_html = '';
			if( !empty($box['link_text']) && isset($box['link_url']['url']) && !empty($box['link_url']['url']) ){
				$text = $box['link_text'];
				$link_html = '<a class="prt-staticbox-more-link prt-more-button" href="' . esc_url( $box['link_url']['url'] ) . '" title="' . esc_attr( $text ) . '" target="' . ( (!empty($box['link_url']['is_external']) && $box['link_url']['is_external']==true) ? '_blank' : '_self' ) . '">' . esc_attr( $text ) . '</a>' ;
			} 
			
					ob_start();
					
					include( get_template_directory() . '/template-parts/sliderimgbox/sliderimgbox-default.php' );
					include( get_template_directory() . '/template-parts/sliderimgbox/sliderimgbox-default2.php' );
					$return .= ob_get_contents();
					ob_end_clean();
		$count++;

		}		
		
		echo preyantechnosys_wp_kses($return);
		
		?>

		
		</div></div>

	    <?php
	}

}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_Sliderimgbox_Widget() );