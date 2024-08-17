<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class minemo_staticboxslider_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_staticboxslider_element';
	}

	public function get_title() {
		return esc_attr__( 'staticboxslider', 'minemo' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
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
				'label'			=> esc_attr__( 'Select Box Style', 'minemo' ),
				'description'	=> esc_attr__( 'Select Box style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'style1'	=> esc_attr( 'Style 1' ),
					'style2'	=> esc_attr( 'Style 2' ),
				],
				'default' => esc_attr( 'style1' ),
			]
		);
			
		$this->add_control(
			'heading',
			[
				'label' => esc_attr__( 'Heading', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter text for heading line.', 'minemo' ),
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
				'default' => esc_attr( 'solid' ),
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
				'prefix_class' => 'tm-align-',
				'selectors' => [
					'{{WRAPPER}} .tm-heading-subheading' => 'text-align: {{VALUE}};',
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
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Content', 'minemo' ),
			]
        );

		$repeater = new Repeater();

		 	$repeater->add_control(
			'icon_image',
			[
				'label' => __( 'Select Image', 'minemo' ),
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
						'smalltext'	=> esc_attr__( 'This is small description', 'minemo' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'minemo' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'minemo' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Box Design', 'minemo' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
	
		$this->add_control(
			'column',
			[
				'label'			=> esc_attr__( 'Select Column', 'minemo' ),
				'description'	=> esc_attr__( 'Select column.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'three',
				'options'		=> [
					'one'				=> esc_attr__( 'One Column', 'minemo' ),
					'two'				=> esc_attr__( 'Two Column', 'minemo' ),
					'three'				=> esc_attr__( 'Three Column', 'minemo' ),
					'four'				=> esc_attr__( 'Four Column', 'minemo' ),
					'five'				=> esc_attr__( 'Five Column', 'minemo' ),
					'six'				=> esc_attr__( 'Six Column', 'minemo' ),
				],
			]
		);
		
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'Box View', 'minemo' ),
				'description'	=> esc_attr__( 'Select box view. Show as normal row and column or show with carousel effect.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'default',
				'options'		=> [
					'default'	=> esc_attr__( 'Row and Column', 'minemo' ),
					'carousel'	=> esc_attr__( 'Carousel effect', 'minemo' ),
				]
			]
		);

		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Settings', 'minemo' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
				]
			]
		);

		$this->add_control(
			'prt-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel Effect: Slide/Fade animation speed.', 'minemo' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '4500',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'prt-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop Item', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel Effect: Infinite loop sliding.', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'minemo' ),
					'0'				=> esc_attr__( 'No', 'minemo' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'prt-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel Effect: Enable/disable Autoplay', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'minemo' ),
					'0'				=> esc_attr__( 'No', 'minemo' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_slidestoscroll',
			[
				'label'			=> esc_attr__( 'Carousel: slidesToScroll', 'minemo' ),
				'description'	=> esc_attr__( '# of slides to scroll', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( '1 Slide', 'minemo' ),
					'column'		=> esc_attr__( 'Same as column', 'minemo' ),
				],
				'default'		=> '1',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'prt-centermode',
			[
				'label'			=> esc_attr__( 'Carousel: centerMode', 'minemo' ),
				'description'	=> esc_attr__( 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'minemo' ),
					'0'				=> esc_attr__( 'No', 'minemo' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		$this->add_control(
			'prt-centerpadding',
			[
				'label'			=> esc_attr__( 'CenterMode: Padding', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel Mode: Padding', 'minemo' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '800',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_nav',
			[
				'label'			=> esc_attr__( 'Carousel: Next/Prev Arrows', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel Effect: Show dots navigation.', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'minemo' ),
					'0'				=> esc_attr__( 'No', 'minemo' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_arrowtype',
			[
				'label'			=> esc_attr__( 'Carousel:Button Type', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel button type.', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'square'			=> esc_attr__( 'Square', 'minemo' ),
					'round'				=> esc_attr__( 'Round', 'minemo' ),
				],
				'default'		=> 'square',
				'condition'		=> [
					'view-type'		=> 'carousel',
					'carousel_nav'		=> '1',
				]
			]
		);
		
		$this->add_control(
			'carousel_dots',
			[
				'label'			=> esc_attr__( 'Carousel: dots', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel Effect: Show dots navigation.', 'minemo' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'minemo' ),
					'0'				=> esc_attr__( 'No', 'minemo' ),
				],
				'default'		=> '0',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
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
						'{{WRAPPER}} .tm-element-content-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tm-element-content-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .tm-element-content-heading',
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
						'{{WRAPPER}} .tm-element-content-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tm-element-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tm-element-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'subheading_typography',
					'selector' => '{{WRAPPER}} .tm-element-subheading',
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
						'{{WRAPPER}} .tm-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tm-element-content-desctxt' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .tm-element-content-desctxt',
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
						'{{WRAPPER}} .tm-element-content-desctxt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$link_html = '';
		$image_html	= '' ;

		$start_div = ttm_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'staticboxslider',
			'data'		=> $settings
		) );

		echo preyantechnosys_wp_kses($start_div);
		
		?>

		<?php
			prt_heading_subheading($settings, true);
		?>

		<div class="preyantechnosys-boxes-row-wrapper row prt-staticboxslider-wrapper prt-staticboxslider-<?php echo esc_attr($style); ?>">
		<?php
			$col_start_div	= '';
			$col_end_div	= '';
			$boxClass = 'prt-box-col-wrapper ';
			
			if( !empty($boxes) ){
				switch( $settings['column'] ){
					case 'one':
						$col_start_div	= '<div class="'. $boxClass .' col-lg-12 col-sm-12 col-md-12 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 'two':
						$col_start_div	= '<div class="'. $boxClass .' col-lg-6 col-sm-6 col-md-6 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 'three':
						$col_start_div	= '<div class="'. $boxClass .' col-lg-4 col-sm-6 col-md-4 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 'four':
						$col_start_div	= '<div class="'. $boxClass .' col-lg-3 col-sm-6 col-md-3 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 'five':
						$col_start_div	= '<div class="'. $boxClass .' col-lg-20percent col-sm-4 col-md-4 col-xs-12">';
						$col_end_div	= '</div>';
						break;
						
					case 'six':
						$col_start_div	= '<div class="'. $boxClass .' col-lg-2 col-sm-4 col-md-4 col-xs-12">';
						$col_end_div	= '</div>';
						break;
				}
			} ?>
		<?php


		foreach( $settings['boxes'] as $box ){

		
				
				if( !empty($box['smalltext']) ){
						$smalltext_html = '<div class="prt-cta3-content-wrapper">'.preyantechnosys_wp_kses($box['smalltext']).'</div>';
				}

				if( !empty($box['label']) ){
					$label_html	= ''.preyantechnosys_wp_kses($box['label']).'';
					$label_html = '<h4 class="prt-box-title">'.tm_link_render($box['label_link'], 'start' ).''.$label_html.''.tm_link_render($box['label_link'], 'end' ).'</h4>';
				}
				
				$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" />';
					
			    if( file_exists( locate_template( '/template-parts/staticboxslider/staticboxslider-'.esc_attr($style).'.php', false, false ) ) ){		
			
					$return .= $col_start_div;
					ob_start();
					$r = include( locate_template( '/template-parts/staticboxslider/staticboxslider-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= $col_end_div;
					
			}		
					
				
		}		
		echo preyantechnosys_wp_kses($return);
		
		
		?>

		</div>
		<?php

			$end_div = ttm_element_container( array(
				'position'	=> 'end',
				'cpt'		=> 'staticboxslider',
				'data'		=> $settings
			) );
			echo preyantechnosys_wp_kses($end_div); 

	}

}
// Register widget
Plugin::instance()->widgets_manager->register( new minemo_staticboxslider_Widget() );