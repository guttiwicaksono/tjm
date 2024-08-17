<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: ThemetechMount IconPicker
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_preyantechnosys_iconpicker extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){
	
	
	
    echo wp_kses( $this->element_before(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

	// current value
    $value                     = $this->element_value();
	$value_library             = ( isset( $value['library'] ) ) ? $value['library'] : 'fontawesome';
	$value_library_fontawesome = ( isset( $value['library_fontawesome'] ) ) ? $value['library_fontawesome'] : 'fa fa-ok';

	
	// current value for icon picker only (without common class)
	$i_value_library_fontawesome = explode( ' ', $value_library_fontawesome );
	$i_value_library_fontawesome = ( !empty($i_value_library_fontawesome[1]) ) ? $i_value_library_fontawesome[1] : '' ;

	
	// Icon picker values
	// Temporary new list of icon libraries
	$icon_library_array = array( // all icon library list array
		'themify'        => array( esc_attr__( 'Themify icons', 'minemo' ), 'ti-location-pin'),
		'linecons'       => array( esc_attr__( 'Linecons', 'minemo' ), 'li_star'),
		'kw_minemo'     => array( esc_attr__( 'Minemo Icons', 'minemo' ), 'flaticon-fruits'),
	);


	$icon_library = array();
	if( is_array(preyantechnosys_get_option('icon_library')) && count(preyantechnosys_get_option('icon_library'))>0 ){
		// if selected icon library
		foreach( preyantechnosys_get_option('icon_library') as $i_library ){
			$icon_library[$i_library] = $icon_library_array[$i_library];
		}
	}
	
	$icon_picker_html    = '';
	$icon_dropdown_array = array( esc_attr__( 'Font Awesome', 'minemo' )    => 'fontawesome' );

	if( is_array($icon_library) && count($icon_library)>0 ){
	foreach( $icon_library as $library_id=>$library ){
		
		// show or hide the icon picker
		$display_this = ($value_library==$library_id) ? 'prt-show' : 'prt-hide' ;
		
		$icon_dropdown_array[$library[0]] = $library_id;
		
		// current value
		$curr_value = ( isset( $value['library_'.$library_id] ) ) ? $value['library_'.$library_id] : $library[1];
		
		// Icon active in picker
		$i_value = explode( ' ', $curr_value );
		if( !empty($i_value[1]) ){
			$i_value = $i_value[1];
		} else {
			$i_value = 'fa';
		}
		
		
		
		$icon_picker_html .= '<div class="preyantechnosys-iconpicker-wrapper prt-iconpicker-' . esc_attr($library_id) . ' ' . esc_attr( $display_this ) . '">
				<input type="hidden" name="'. esc_attr($this->element_name( '[library_'.$library_id.']' )) .'" value="'. esc_attr($curr_value) .'"'. $this->element_class('preyantechnosys-iconpicker-input i_icon_'.esc_attr($library_id).' preyantechnosys_iconpicker_field') .'/>
				<div class="prt-ipicker-selector-w">
					<div class="prt-ipicker-selector">
						<span class="prt-ipicker-selected-icon">
							<i class="' . esc_attr($curr_value) . '"></i>
						</span>
						<span class="prt-ipicker-selector-button">
							<i class="fip-fa fa fa-arrow-down"></i>
						</span>
					</div>
					<div class="preyantechnosys-iconpicker-list-w prt-hide">
						<div id="prt-ipicker-library-' . esc_attr($library_id) . '" class="preyantechnosys-iconpicker-list" data-iconset="' . esc_attr($library_id) . '" data-icon="' . esc_attr($i_value) . '" role="iconpicker"></div>
					</div>
				</div><!-- .prt-ipicker-selector-w -->
			</div>';
		
		
	}
	}
	
	
	echo '<div class="preyantechnosys-iconpicker-element">';
		
		/* Library selector dropdown */
		echo '<div class="prt-iconpicker-left">';
		echo '<select name="'. esc_attr($this->element_name( '[library]' )) .'" class="prt-iconpicker-library-selector" '. $this->element_class() . $this->element_attributes() .'>';
				
				if( is_array($icon_dropdown_array) && count($icon_dropdown_array)>0 ){
					foreach( $icon_dropdown_array as $key=>$val ){
						$selected = ($value_library==$val) ? ' selected="selected"' : '' ;
						echo '<option value="' . esc_attr($val) . '"' . $selected . '>' . esc_attr($key) . '</option>';
					}
				}
				
			echo '</select>';
		echo '</div>';
	
	
		echo '<div class="prt-iconpicker-right">';
		
		$display_fontawesome = ($value_library=='fontawesome') ? 'prt-show' : 'prt-hide' ;
		
		/* Font Awesome icon picker */
		echo '<div class="preyantechnosys-iconpicker-wrapper prt-iconpicker-fontawesome ' . esc_attr($display_fontawesome) . '">
				<input type="hidden" name="'. esc_attr($this->element_name( '[library_fontawesome]' )) .'" value="'. esc_attr($value_library_fontawesome) .'"'. $this->element_class('preyantechnosys-iconpicker-input i_icon_linecons preyantechnosys_iconpicker_field') . '/>
				<div class="prt-ipicker-selector-w">
					<div class="prt-ipicker-selector">
						<span class="prt-ipicker-selected-icon">
							<i class="' . esc_attr($value_library_fontawesome) . '"></i>
						</span>
						<span class="prt-ipicker-selector-button">
							<i class="fip-fa fa fa-arrow-down"></i>
						</span>
					</div>
					<div class="preyantechnosys-iconpicker-list-w prt-hide">
						<div id="prt-ipicker-library-fontawesome" class="preyantechnosys-iconpicker-list" data-iconset="fontawesome" data-icon="' . esc_attr($i_value_library_fontawesome) . '" role="iconpicker"></div>
					</div>
				</div><!-- .prt-ipicker-selector-w -->
			</div>';
			
		/* Other library icon picker */
		echo preyantechnosys_wp_kses( $icon_picker_html );
			
		
		echo '</div><!-- .prt-iconpicker-right -->';
		
		
	
	echo '<div class="clear clr"></div> </div><!-- .preyantechnosys-iconpicker-element -->';
	
	
	
	
	
	
	
	
    echo wp_kses( $this->element_after(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

  }

}