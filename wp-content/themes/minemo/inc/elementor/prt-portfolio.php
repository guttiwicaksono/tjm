<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Blog Box
*/

class Minemo_Portfoliobox_Widget extends Widget_Base{

	public function get_name() {
		return 'tm_project_element';
	}

	public function get_title() {
		return esc_attr__( 'Portfolio Box Element', 'minemo' );
	}
	
	public function get_icon() {
		return 'eicon-gallery-grid';
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
				'label'			=> esc_attr__( 'Select Portfolio Style', 'minemo' ),
				'description'	=> esc_attr__( 'Select Portfolio style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'style1'	=> esc_attr( 'PortfolioBox Style 1' ),
					'style2'	=> esc_attr( 'PortfolioBox Style 2' ),
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
				'default' => esc_attr__( 'Our Projects', 'minemo' ),
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
				'placeholder' => esc_attr__( 'Enter text for subheading text.', 'minemo' ),
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
				'placeholder' => esc_attr__( 'Type your description text', 'minemo' ),
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
				'label' => esc_attr__( 'Text Alignment', 'minemo' ),
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
				'label' => esc_attr__( 'Box Design', 'minemo' ),
			]
		);
		
		$this->add_control(
			'from_category',
			[
				'label' => esc_attr__( 'From Category ?', 'minemo' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_category(),
				'multiple' => true,
				'label_block'	=> true,
				'placeholder' => esc_attr__( 'All Categories', 'minemo' ),
			]
		);
		
		$this->add_control(
			'show',
			[
				'label' => esc_attr__( 'Post to show', 'minemo' ),
				'description' => esc_attr__( 'How many item you want to show.', 'minemo' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
			]
		);
		
		$this->add_control(
			'sortable',
			[
				'label' => esc_attr__( 'Show Sortable Category Links', 'minemo' ),
				'description' => esc_attr__( 'Show sortable category links above items so user can sort by just single click.', 'minemo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'minemo' ),
				'label_off' => esc_attr__( 'No', 'minemo' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'allword',
			[
				'label' => esc_attr__( 'Replace ALL word', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'All', 'minemo' ),
				'placeholder' => esc_attr__( 'Replace ALL word in sortable group links. Default is ALL word.', 'minemo' ),
				'label_block' => true,
				'condition' => [
					'sortable' => 'yes',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_attr__( 'Order', 'minemo' ),
				'description' => esc_attr__( 'Designates the ascending or descending order.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'DESC',
				'options' => [
					'ASC'		=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'minemo' ),
					'DESC'		=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'minemo' ),
				]
			]
		);
		
		$this->add_control(
			'orderby',
			[
				'label' => esc_attr__( 'Order By', 'minemo' ),
				'description' => esc_attr__( ' Sort retrieved posts by parameter.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'none'		=> esc_attr__( 'No order', 'minemo' ),
					'ID'		=> esc_attr__( 'ID', 'minemo' ),
					'title'		=> esc_attr__( 'Title', 'minemo' ),
					'date'		=> esc_attr__( 'Date', 'minemo' ),
					'rand'		=> esc_attr__( 'Random', 'minemo' ),
				]
			]
		);
		
		$this->add_control(
			'gap',
			[
				'label' => esc_attr__( 'Box Gap', 'minemo' ),
				'description' => esc_attr__( 'Gap between each Post box.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'default' => '30px',
				'options' => [
					'0px'		=> esc_attr__( 'No Gap (0px)', 'minemo' ),
					'5px'		=> esc_attr__( '5px', 'minemo' ),
					'10px'		=> esc_attr__( '10px', 'minemo' ),
					'15px'		=> esc_attr__( '15px', 'minemo' ),
					'20px'		=> esc_attr__( '20px', 'minemo' ),
					'25px'		=> esc_attr__( '25px', 'minemo' ),
					'30px'		=> esc_attr__( '30px', 'minemo' ),
					'35px'		=> esc_attr__( '35px', 'minemo' ),
					'40px'		=> esc_attr__( '40px', 'minemo' ),
					'45px'		=> esc_attr__( '45px', 'minemo' ),
					'50px'		=> esc_attr__( '50px', 'minemo' ),
				]
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

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$start_div = ttm_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'portfolio',
			'data'		=> $settings
		) );

		echo preyantechnosys_wp_kses($start_div);

		$args = array(
			'post_type'				=> 'tm_portfolio',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
		);

		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}

		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'tm_portfolio_category',
					'field'    => 'slug',
					'terms'    => $from_category,
				),
			);
		};

		$posts = new \WP_Query( $args );
		
		$headingclass= '';
		if( empty($settings['heading']) ){
			$headingclass = 'prt-boxwithout-heading';
		}

		if ( $posts->have_posts() ) {
				if($settings['_element_id'] == 'tm-leftheadingarrow-view') {
				echo '<div class="tm_portfolioarrow-box"><div class="prt-portfoliobox-inner">';
				?>
				<?php echo prt_heading_subheading($settings, true); ?>
				<?php
				echo '<div class="prt-slick-arrows"><a rel="nofollow" class="prt-slick-arrow prt-slick-prev"><i class="prt-minemo-icon-arrow-left"></i></a><a rel="nofollow" class="prt-slick-arrow prt-slick-next"><i class="prt-minemo-icon-arrow-right"></i></a></div></div></div>';
			}				
			else {
			
			?>

			<div class="preyantechnosys-box-heading-wrapper <?php echo preyantechnosys_wp_kses($headingclass); ?>">
				<?php prt_heading_subheading($settings, true); ?>
				<?php
				if( function_exists('preyantechnosys_get_filterbutton') ){
					$sortable_category_html = preyantechnosys_get_filterbutton( $settings, 'tm_portfolio_category' );
					echo  preyantechnosys_wp_kses($sortable_category_html);
				}
				?>
			</div>
			<?php } ?> 
			<div class="preyantechnosys-boxes-row-wrapper row multi-columns-row">

			<?php
			while ( $posts->have_posts() ) {
				$return = '';
				$posts->the_post();

				if( file_exists( locate_template( '/template-parts/portfoliobox/portfoliobox-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= ttm_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'portfolio',
						'taxonomy'	=> 'tm_portfolio_category',
						'style'		=> $style,
					) );

					ob_start();
					$r = include( locate_template( '/template-parts/portfoliobox/portfoliobox-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= ttm_element_block_container( array(
						'position'	=> 'end',
					) );

				}

				echo preyantechnosys_wp_kses($return);

			}
			?>

			</div>

			<?php
		}

	    wp_reset_postdata();
		
		$end_div = ttm_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'portfolio',
			'data'		=> $settings
		) );
		echo preyantechnosys_wp_kses($end_div);
	}

	
	

	protected function select_category() {
	  	$category = get_terms( array( 'taxonomy' => 'tm_portfolio_category', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

	     	if( $item ) {
	        	$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
	     	}
	  	}
	  	return $cat;
	}
	
}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_Portfoliobox_Widget() );