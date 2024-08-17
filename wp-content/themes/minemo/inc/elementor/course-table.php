<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  ThemetechMount Price Table
*/

class Minemo_Coursetable_Widget extends Widget_Base{

	public function get_name() {
		return 'prt_ctable_element';
	}

	public function get_title() {
		return esc_attr__( 'Course Table', 'minemo' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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
				'label'			=> esc_attr__( 'Select Coursetable Style', 'minemo' ),
				'description'	=> esc_attr__( 'Select Coursetable style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
						'style-1' => esc_attr( 'Style 1' ),	
					],
				'default' => esc_attr( 'style-1' ),
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
				'default' => esc_attr__( 'Enter Your Heading', 'minemo' ),
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
            'pricing_col_style',
            [
                'label' => esc_attr__( 'Pricing Table Style ', 'minemo' ),
            ]
        );
		$this->add_control(
			'pricing_table_style',
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
		$this->end_controls_section();
        $this->start_controls_section(
            'highlight_col_section',
            [
                'label' => esc_attr__( 'Featured Column', 'minemo' ),
            ]
        );
        $this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Featured Column', 'minemo' ),
				'description' => esc_attr__( 'Select whith column will be with featured style.', 'minemo' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'minemo' ),
                    '2'	=> esc_attr__( 'Second Column', 'minemo' ),
					'3'	=> esc_attr__( 'Third Column', 'minemo' ),
					'4'	=> esc_attr__( 'Fourth Column', 'minemo' ),
					'5'	=> esc_attr__( 'Fifth Column', 'minemo' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Feature Column Heading', 'minemo' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Featured', 'minemo' ),
				'placeholder' => esc_attr__( 'Enter text used as main heading for feature column. Some HTML tags are allowed.', 'minemo' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		for( $x=1; $x<=5; $x++ ){

			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'minemo' ) , tm_ordinal($x) ) ,
				]
			);

			$this->add_control(
				$x.'_icon_type',
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
			
			$this->add_control(
				$x.'_icon',
				[
					'label' => __( 'Icon', 'minemo' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
						$x.'_icon_type' => 'icon',
					]
				]

			);
			
			$this->add_control(
				$x.'_icon_image',
				[
					'label' => __( 'Select Image for Icon', 'minemo' ),
					'description' => __( 'image will appear at icon position', 'minemo' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						$x.'_icon_type' => 'image',
					]
				]
			);
			
			$this->add_control(
				$x.'_icon_text',
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
						$x.'_icon_type' => 'text',
					]
				]
			);

			$this->add_control(
				$x.'_heading',
				[
					'label'         => esc_attr__( 'Heading', 'minemo' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'minemo' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_desc',
				[
					'label' 		=> esc_attr__( 'Description', 'minemo' ),
					'type'			=> Controls_Manager::TEXTAREA,
					'placeholder'	 => esc_attr__( 'Enter description text', 'minemo' ),
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'         => esc_attr__( 'Price', 'minemo' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter Price.', 'minemo' ),
				]
			);
			
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'         => esc_attr__( 'Currency symbol', 'minemo' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency symbol', 'minemo' ),
				]
			);
			
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'minemo' ),
					'description'	=> esc_html__( 'Select currency position.', 'minemo' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> 'after',
					'options' => [
						'after'		=> __( 'After Price', 'minemo' ),
						'before'	=> __( 'Before Price', 'minemo' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'         => esc_attr__( 'Price Frequency', 'minemo' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'minemo' ),
					'separator'     => 'after',
				]
			);
			
			$this->add_control(
				$x.'_btn_text',
				[
					'label'         => esc_attr__( 'Button Text', 'minemo' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'minemo' ),
				]
			);
			
			$this->add_control(
				$x.'_btn_link',
				[
					'label'         => esc_attr__( 'Button Link', 'minemo' ),
					'type'          => Controls_Manager::URL,
					'description'   => esc_attr__( 'Set link for button', 'minemo' ),
					'separator'     => 'after',
				]
			);

			$this->add_control(
				$x. '_inoforamtionheading',
			[
				'label' => esc_attr__( 'inoforamtion heading', 'minemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Enter Your Heading', 'minemo' ),
				'placeholder' => esc_attr__( 'Enter text for heading line.', 'minemo' ),
				'label_block' => true,
			]
		);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Line Label', 'minemo' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'heading',
				[
					'label' =>__( 'Heading', 'minemo' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
					'active' => true,
				],
					'default' =>__( 'Enter Your Heading', 'minemo' ),
					'placeholder' => __( 'Enter text for heading line.', 'minemo' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'desc',
				[
					'label' => __( 'Description', 'minemo' ),
					'type' => Controls_Manager::TEXTAREA,
					'placeholder' => __( 'Enter description text', 'minemo' ),
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label'     => __( 'Icon', 'minemo' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => [
						'value'     => 'fas fa-check',
						'library'   => 'solid',
					],
				]

			);
			

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'minemo' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'minemo' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'This is label one', 'minemo' ),
							'heading'	=>esc_attr__('Heading', 'minemo'),
							'desc'		=>esc_attr__( 'Enter description text', 'minemo' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
							
							
						],
						[
							'text'		=> esc_attr__( 'This is label two', 'minemo' ),
							'heading'	=>esc_attr__('Heading', 'minemo'),
							'desc'		=>esc_attr__( 'Enter description text', 'minemo' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'This is label three', 'minemo' ),
							'heading'	=>esc_attr__('Heading', 'minemo'),
							'desc'		=>esc_attr__( 'Enter description text', 'minemo' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);
			$this->add_control(
				$x.'_lines_second',
				[
					'label'			=> esc_attr__( 'Each Line (Features) - Column 2', 'minemo' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'minemo' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'This is label one', 'minemo' ),
							'heading'	=>esc_attr__('Heading', 'minemo'),
							'desc'		=>esc_attr__( 'Enter description text', 'minemo' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'This is label two', 'minemo' ),
							'heading'	=>esc_attr__('Heading', 'minemo'),
							'desc'		=>esc_attr__( 'Enter description text', 'minemo' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'This is label three', 'minemo' ),
							'heading'	=>esc_attr__('Heading', 'minemo'),
							'desc'		=>esc_attr__( 'Enter description text', 'minemo' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
					],
					'title_field' => '{{{ text }}}',
					'condition' => [
						'pricing_table_style' => 'horizontal',
					]
				]
			);
			
						
			$this->end_controls_section();

		}

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>
		<?php prt_heading_subheading($settings, true); ?>
		<div class="preyantechnosys-ctables-w prt-ctablebox prt-ctablebox-<?php echo esc_attr($style); ?> <?php echo esc_attr($pricing_table_style); ?>">

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}
			

			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($columns) ){
				switch( count($columns) ){
					case 1:
						$col_start_div	= '<div class="tprt-coursetable-column-w prt-ctable-col col-md-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="tprt-coursetable-column-w prt-ctable-col col-md-6">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="tprt-coursetable-column-w prt-ctable-col col-md-4">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="tprt-coursetable-column-w prt-ctable-col col-md-3">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="tprt-coursetable-column-w prt-ctable-col col-md-20percent">';
						$col_end_div	= '</div>';
						break;
				}
			}

			if( !empty($columns) ){

				$return .= '<div class="prt-ctable-cols row multi-columns-row">';

				foreach( $columns as $col => $highlight_col ){

					$icon = '';
					if( !empty($settings[$col.'_icon_type']) ){

						if( $settings[$col.'_icon_type']=='text' ){
							$icon = '<div class="prt-ctablebox-main-icon"><div class="prt-ctable-icon-wrapper prt-ctable-icon-type-text">' . $settings[$col.'_icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $settings[$col.'_icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($settings[$col.'_icon_image']['url']).'" alt="'.esc_attr($settings[$col.'_heading']).'" />';
							$icon = '<div class="prt-ctablebox-main-icon"><div class="prt-ctable-icon-wrapper prt-ctable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $settings[$col.'_icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {

							$icon       = ( !empty($settings[$col.'_icon']['value']) ) ? '<div class="prt-ctablebox-main-icon"><div class="prt-ctable-icon-wrapper"><i class="' . $settings[$col.'_icon']['value'] . '"></i></div></div>' : '';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$settings[$col.'_icon']['library']);
						}
					}

					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="prt-ctablebox-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_text']) ) ? '<div class="tprt-featured-title">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="prt-ctablebox-featured-col ', 'class="', $col_start_div );
					}

					$heading = ( !empty($settings[$col.'_heading']) ) ? '<div class="prt-ctablebox-title"><h3>'.$settings[$col.'_heading'].'</h3></div>' : '' ;

					$desc = ( !empty($settings[$col.'_desc']) ) ? '<div class="prt-ctablebox-desc">'.$settings[$col.'_desc'].'</div>' : '' ;

					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="prt-ctablebox-cur-symbol">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;

					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="prt-ctablebox-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;
				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="prt-ctablebox-price">'.$settings[$col.'_price'].'</div>' : '' ;
					
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;

					$lines_html = '';
					$lines2_html = '';
					$values     = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {

							$list_icon = '<i class="fa fa-check"></i> ';
							if( !empty($data['icon']['value']) ){
								$list_icon = '<i class="' . $data['icon']['value'] . '"></i> ';
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines_html .= isset( $data['text'] ) ? '<li class="prt-ctable-line">'.$list_icon.$data['text'].'</li>' : '';
							$lines_html .= isset( $data['heading'] ) ? '<li class="prt-ctable-heading">'.$list_icon.$data['heading'].'</li>' : '';
							$lines_html .= isset( $data['desc'] ) ? '<li class="prt-ctable-desc">'.$list_icon.$data['desc'].'</li>' : '';
							

						}
					}
					$scol_values     = (array) $settings[$col.'_lines_second'];
					if( is_array($scol_values) && count($scol_values)>0 ){
						foreach ( $scol_values as $data ) {

							$list_icon = '<i class="fa fa-check"></i> ';
							if( !empty($data['icon']['value']) ){
								$list_icon = '<i class="' . $data['icon']['value'] . '"></i> ';
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines2_html .= isset( $data['text'] ) ? '<li class="prt-ctable-line">'.$list_icon.$data['text'].'</li>' : '';
							$lines2_html .= isset( $data['heading'] ) ? '<li class="prt-ctable-heading">'.$list_icon.$data['heading'].'</li>' : '';
							$lines2_html .= isset( $data['desc'] ) ? '<li class="prt-ctable-desc">'.$list_icon.$data['desc'].'</li>' : '';
							
						}
					}



					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="prt-ctable-btn">' . tm_link_render($settings[$col.'_btn_link'], 'start' ) . preyantechnosys_wp_kses($settings[$col.'_btn_text']) . tm_link_render($settings[$col.'_btn_link'], 'end' ) . '</div>';
					}

					$informationheading = ( !empty($settings[$col.'_inoforamtionheading']) ) ? '<div class="prt-ctablebox-infoheading-title">'.$settings[$col.'_inoforamtionheading'].'</div>' : '' ;

					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/template-parts/coursetable/coursetable-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo preyantechnosys_wp_kses($return);
			?>

		</div>

		<?php

	}

	

	
}
// Register widget
Plugin::instance()->widgets_manager->register( new Minemo_Coursetable_Widget() );