<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class Minemo_Stepsbox_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_staticbox_element';
	}

	public function get_title() {
		return esc_attr__( 'Step Box', 'minemo' );
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
			'heading_section',
			[
				'label' => esc_attr__( 'General', 'minemo' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select StepBox Style', 'minemo' ),
				'description'	=> esc_attr__( 'Select StepBox style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'style1'	=> esc_attr( 'Style 1' ),
					'style2'	=> esc_attr( 'Style 2' ),
					'style3'	=> esc_attr( 'Style 3' ),
					'style4'	=> esc_attr( 'Style 4' ),
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
				'default' => esc_attr__( 'Our Services', 'minemo' ),
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
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Content', 'minemo' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'minemo' ),
					'image'	=> esc_attr__( 'Image', 'minemo' ),
					'text'	=> esc_attr__( 'Text', 'minemo' ),
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
			'icon_image',
			[
				'label' => __( 'Select Image for Icon', 'minemo' ),
				'description' => __( 'image will appear at icon position', 'minemo' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ]
			]
		);
		
		$repeater->add_control(
			'icon_text',
			[
				'label' => esc_attr__( 'Text for Icon', 'minemo' ),
				'description' => esc_attr__( 'Text will appear at icon position', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'minemo' ),
				'placeholder' => esc_attr__( 'Enter text here', 'minemo' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'text',
                ]
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
			'label_link_url',
			[
				'label' => esc_attr__( 'Title Link URL', 'minemo' ),
				'description' => esc_attr__( 'Add title link URL here.', 'minemo' ),
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
			'process_number',
			[
				'label' => esc_attr__( 'Number', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => esc_attr__( 'Like 01, 02).', 'minemo' ),
				'placeholder' => esc_attr__( '01', 'minemo' ),
				'label_block' => true,
				'separator' => 'before',
				
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
		$repeater->add_control(
			'link_text2',
			[
				'label' => esc_attr__( 'Link Text 2', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => esc_attr__( 'Like READ MORE text. This text will appear as link (fill link URL in below option).', 'minemo' ),
				'placeholder' => esc_attr__( 'READ MORE', 'minemo' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);
		
		$repeater->add_control(
			'link_url2',
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
						'{{WRAPPER}} .prt-element-content-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .prt-element-content-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .prt-element-content-heading',
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
						'{{WRAPPER}} .prt-element-content-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .prt-element-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .prt-element-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'subheading_typography',
					'selector' => '{{WRAPPER}} .prt-element-subheading',
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
						'{{WRAPPER}} .prt-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .prt-element-content-desctxt' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .prt-element-content-desctxt',
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
						'{{WRAPPER}} .prt-element-content-desctxt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
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
				'default'		=> 'one',
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
				'default'		=> 'carousel',
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
			'tm-autoplayspeed',
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
			'tm-loop',
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
			'tm-autoplay',
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
			'tm-centermode',
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
			'carousel_centerpadding',
			[
				'label'			=> esc_attr__( 'Carousel: centerPadding', 'minemo' ),
				'description'	=> esc_attr__( 'Carousel center effect padding.', 'minemo' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '300'
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
				'default'		=> '1',
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

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$link_html = '';
		$image_html		= '' ;

		$start_div = ttm_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'static-iconbox',
			'data'		=> $settings
		) );

		echo preyantechnosys_wp_kses($start_div);
		
		?>

		<?php
			prt_heading_subheading($settings, true);
		?>

		<div class="preyantechnosys-boxes-row-wrapper prt-staticbox-<?php echo esc_attr($style); ?> row multi-columns-row">

		<?php
			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($boxes) ){
				switch( count($boxes) ){
					case 1:
						$col_start_div	= '<div class="prt-box-col-wrapper col-lg-12 col-sm-12 col-md-12 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="prt-box-col-wrapper col-lg-6 col-sm-6 col-md-6 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="prt-box-col-wrapper col-lg-4 col-sm-6 col-md-4 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="prt-box-col-wrapper col-lg-3 col-sm-6 col-md-3 col-xs-12">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="prt-box-col-wrapper col-lg-20percent col-sm-4 col-md-4 col-xs-12">';
						$col_end_div	= '</div>';
						break;
						
					case 6:
						$col_start_div	= '<div class="prt-box-col-wrapper col-lg-2 col-sm-4 col-md-4 col-xs-12">';
						$col_end_div	= '</div>';
						break;
				}
			} ?>

		<?php

		foreach( $settings['boxes'] as $box ){

			$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="preyantechnosys-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
			if( !empty($box['label']) && isset($box['label_link_url']['url']) && !empty($box['label_link_url']['url']) ){
				$text = $box['label'];
				$label_html = '<div class="prt-box-title"><h4><a class="prt-staticbox-more-link prt-more-button" href="' . esc_url( $box['label_link_url']['url'] ) . '">' . esc_attr( $text ) . '</a></h4></div>' ;
			}
			
			else {
			
			$label_html		= ( !empty($box['label']) ) ? '<div class="prt-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;
			}
		
					$icon = '';
					if( !empty($box['icon_type']) ){

						if( $box['icon_type']=='text' ){
							$icon = '<div class="prt-stepbox-main-icon"><div class="prt-ptable-icon-wrapper prt-ptable-icon-type-text">' . $box['icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if($box['icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" />';
							$icon = '<div class="prt-stepbox-imagebox"><div class="prt-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $box['icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {
							$icon       = ( !empty($box['icon']['value']) ) ? '<div class="prt-stepbox-main-icon"><div class="prt-ptable-icon-wrapper"><i class="' . $box['icon']['value'] . '"></i></div></div>' : '';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$box['icon']['library']);
						}
					}

			$link_html = '';
			if( !empty($box['link_text']) && isset($box['link_url']['url']) && !empty($box['link_url']['url']) ){
				$text = $box['link_text'];
				$link_html = '<a class="prt-staticbox-more-link prt-more-button" href="' . esc_url( $box['link_url']['url'] ) . '" target="' . ( (!empty($box['link_url']['is_external']) && $box['link_url']['is_external']==true) ? '_blank' : '_self' ) . '">' . esc_attr( $text ) . '</a>' ;
			}
			
			$link_html2 = '';
			if( !empty($box['link_text2']) && isset($box['link_url2']['url']) && !empty($box['link_url2']['url']) ){
				$text = $box['link_text2'];
				$link_html2 = '<a class="prt-staticbox-more-link2 prt-more-button2" href="' . esc_url( $box['link_url2']['url'] )  . '" target="' . ( (!empty($box['link_url2']['is_external']) && $box['link_url2']['is_external']==true) ? '_blank' : '_self' ) . '">' . esc_attr( $text ) . '<i aria-hidden="true" class="fas fa-download"></i></a>' ;
			}
			
			$process_number = '';
				if( !empty($box['process_number'])){
					$process_number = '<div class="process-num"><span class="number">' . $box['process_number'] . '</span></div>';

				}
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/template-parts/stepbox/stepbox-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;

		}		
		
		echo preyantechnosys_wp_kses($return);
		
		
		$end_div = ttm_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'blog',
			'data'		=> $settings
		) );
		echo preyantechnosys_wp_kses($end_div);
		
		?>

		</div>

	    <?php
	}

	

}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_Stepsbox_Widget() );