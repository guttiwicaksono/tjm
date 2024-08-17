<?php

if( !function_exists('preyantechnosys_logo') ){
function preyantechnosys_logo(){
	$logotype       = preyantechnosys_get_option('logotype');
	$logoimg        = preyantechnosys_get_option('logoimg');
	$logoimg_sticky = preyantechnosys_get_option('logoimg_sticky');
	$return = '<span class="prt-sc-logo prt-sc-logo-type-' . sanitize_html_class($logotype) . '">';
	if( $logotype=='image' ){
		if( isset($logoimg) && is_array($logoimg) ){
			
			// standard logo
			if( isset($logoimg['full-url']) && trim($logoimg['full-url'])!='' ){
				$image = $logoimg['full-url'];
				$return .= '<img class="preyantechnosys-logo-img standardlogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg['full-url']) . '">';
			
			} else if( isset($logoimg['thumb-url']) && trim($logoimg['thumb-url'])!='' ){
				$image = $logoimg['thumb-url'];
				$return .= '<img class="preyantechnosys-logo-img standardlogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg['thumb-url']) . '">';

			} else if( isset($logoimg['id']) && trim($logoimg['id'])!='' ){
				$image   = wp_get_attachment_image_src( $logoimg['id'], 'full' );
				$return .= '<img class="preyantechnosys-logo-img standardlogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_attr($image[0]) . '" width="' . esc_attr($image[1]) . '" height="' . esc_attr($image[2]) . '">';
				
			}
			
			// stikcy logo
			if( isset($logoimg_sticky) && is_array($logoimg_sticky) ){
				
				if( isset($logoimg_sticky['full-url']) && trim($logoimg_sticky['full-url'])!='' ){
					$sticky_image   = $logoimg_sticky['full-url'];
					$return .= '<img class="preyantechnosys-logo-img stickylogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg_sticky['full-url']) . '">';
				
				} else if( isset($logoimg_sticky['thumb-url']) && trim($logoimg_sticky['thumb-url'])!='' ){
					$sticky_image   = $logoimg_sticky['thumb-url'];
					$return .= '<img class="preyantechnosys-logo-img stickylogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg_sticky['thumb-url']) . '">';
				
				} else if( isset($logoimg_sticky['id']) && trim($logoimg_sticky['id'])!='' ){
					$sticky_image   = wp_get_attachment_image_src( $logoimg_sticky['id'], 'full' );
					$return .= '<img class="preyantechnosys-logo-img stickylogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($sticky_image[0]) . '" width="' . esc_attr($sticky_image[1]) . '" height="' . esc_attr($image[2]) . '">';
					
				}
				
			}	
		}
	} else {
		
		$return = preyantechnosys_get_option('logotext');
	}
	$return .= '</span>';
	
	return $return;
}
}


/**
 *  Social Share links creations
 */
if ( !function_exists( 'preyantechnosys_blog_classic_extra_class' ) ){
function preyantechnosys_blog_classic_extra_class(){
	$return = 'preyantechnosys-box post preyantechnosys-box-blog-classic preyantechnosys-blogbox-format-'.get_post_format();
	
	$post_images = get_post_meta( get_the_ID(), '_preyantechnosys_metabox_gallery', true );
	$post_images = ( isset($post_images['gallery_images']) ) ? $post_images['gallery_images'] : '' ;
	
	if( get_post_format() == 'gallery' ){
		if( empty($post_images) ){
			$return .= ' prt-no-featured-content';
		}
	} else {		
		if( !has_post_thumbnail() ){
			$return .= ' prt-no-featured-content';
		}	
	}	
	return $return;	
}
}


/**
 *  List of Social services that used for Social Links section
 */
if( !function_exists('preyantechnosys_shared_social_list') ){
function preyantechnosys_shared_social_list(){

	$sociallist = array(
		'twitter'      => esc_attr__('Twitter', 'minemo'),
		'youtube'      => esc_attr__('YouTube', 'minemo'),
		'flickr'       => esc_attr__('Flickr', 'minemo'),
		'facebook'     => esc_attr__('Facebook', 'minemo'),
		'linkedin'     => esc_attr__('LinkedIn', 'minemo'),
		'gplus'        => esc_attr__('Google+', 'minemo'),
		'yelp'         => esc_attr__('Yelp', 'minemo'),
		'dribbble'     => esc_attr__('Dribbble', 'minemo'),
		'pinterest'    => esc_attr__('Pinterest', 'minemo'),
		'podcast'      => esc_attr__('Podcast', 'minemo'),
		'instagram'    => esc_attr__('Instagram', 'minemo'),
		'xing'         => esc_attr__('Xing', 'minemo'),
		'vimeo'        => esc_attr__('Vimeo', 'minemo'),
		'vk'           => esc_attr__('VK', 'minemo'),
		'houzz'        => esc_attr__('Houzz', 'minemo'),
		'issuu'        => esc_attr__('Issuu', 'minemo'),
		'google-drive' => esc_attr__('Google Drive', 'minemo'),
	);
	
	return $sociallist;
}
}

/**
 *  List of Social services that used for Social Links section
 */
if( !function_exists('preyantechnosys_a_color') ){
function preyantechnosys_a_color(){
	$skincolor  = preyantechnosys_get_option('skincolor');
	$link_color = preyantechnosys_get_option('link-color');
	
	// default
	$normal_color = '#333333';
	$hover_color  = $skincolor;
	
	if( $link_color=='darkhover' ){
		$normal_color = $skincolor;
		$hover_color  = '#333333';
		
	} else if( $link_color=='custom' ){
		$normal_color = preyantechnosys_get_option('link-color-regular');
		$hover_color  = preyantechnosys_get_option('link-color-hover');
		
	}
	?>

	a{color:<?php echo esc_attr($normal_color); ?>;}
	a:hover{color:<?php echo esc_attr($hover_color); ?>;}
	
	<?php
}
}

/**
 *  Add HTTP if not found in URL
 */
if( !function_exists('preyantechnosys_vc_get_bg_css_only') ){
function preyantechnosys_vc_get_bg_css_only($css, $nobg='') {
	
	$return = '';
	
	if( !empty($css) ){
		$css_array = explode( '{', $css );
		$css_selector = $css_array[0];
		$css_array = $css_array[1];
		$css_array = str_replace( '}', '', $css_array );
		$css_array = trim($css_array);
		$css_array = explode( ';', $css_array );
		
		foreach( $css_array as $css_rule ){
			if ( substr( $css_rule, 0, 10 ) == 'background' ) {
				$return .= $css_rule . ';';
			}
		}
	}
	
	// no bg
	if( $nobg=='nobg' && !empty($return) ){
		$return .= 'background-image:none !important;';
	}
	
	if( !empty($css_selector) && !empty($return) ){
		$return = $css_selector . '{' . $return . '}' ;
	}
	
	return $return;
	
}
}


/**
 *  Add HTTP if not found in URL
 */
if( !function_exists('preyantechnosys_addhttp') ){
function preyantechnosys_addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
}

/**
 *  Previous/next page navigation.
 */
if( !function_exists('preyantechnosys_pagination') ){
function preyantechnosys_pagination( $wp_query_data=false ){
	
	if( $wp_query_data==false ){
		global $wp_query;
	} else {
		$wp_query = $wp_query_data;
	}
	
	$return  = '';
	$return .= preyantechnosys_wp_kses('<div class="clearfix"></div>');
	
	$big     = 999999999; // need an unlikely integer
	
	// Array to check if pagination data exists
	$paginateLinks = paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var('paged') ),
		'total'     => $wp_query->max_num_pages,
		'type'      => 'array',
		'prev_text' => '<span class="prt-hide prt-pagination-text prt-pagination-text-prev">' . esc_attr__( 'Prev', 'minemo' ) . '</span>',
		'next_text' => '<span class="prt-pagination-text prt-pagination-text-next">' . esc_attr__( 'Next', 'minemo' ) . '</span>',
	) );
	
	
	if( $paginateLinks!=NULL ){
		$big = 999999999; // need an unlikely integer
		$return .= '<div class="preyantechnosys-pagination">';
		$return .= paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var('paged') ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<span class="prt-pagination-text prt-pagination-text-prev">' . esc_attr__( 'Prev', 'minemo' ) . '</span>',
			'next_text' => '<span class="prt-pagination-text prt-pagination-text-next">' . esc_attr__( 'Next', 'minemo' ) . '</span>',
		) );
		$return .= '</div><!-- .preyantechnosys-pagination -->';
	}
	
	return $return;
}
}

/**
 *   Get theme options. If value is not set than it will fetch default value
 */
if( !function_exists('preyantechnosys_get_option') ){
function preyantechnosys_get_option( $option, $inner_option='' ){
	
	global $minemo_theme_options;
	if( !is_array($minemo_theme_options) ){
		
		if( is_multisite() ){
			$minemo_theme_options = get_site_option('minemo_theme_options');
		} else {
			$minemo_theme_options = get_option('minemo_theme_options');
		}
		
	}
	
	$return = '';
	
	if( isset($minemo_theme_options[$option]) ){
		$return = $minemo_theme_options[$option];
	} else {
		include( get_template_directory() . '/cs-framework-override/config/framework-options.php' );
		
		if( isset($tm_framework_options) && is_array($tm_framework_options) && count($tm_framework_options)>0 ){
			foreach( $tm_framework_options as $fields ){
				if( isset($fields['fields']) && is_array($fields['fields']) && count($fields['fields'])>0 ){
					foreach( $fields['fields'] as $field ){
						if( !empty($field['id']) && $field['id'] == $option && isset($field['default']) ){
							$return = $field['default'];
						}
					}
				}
			}
		}
	}
	
	// if required inner option
	if( !empty($inner_option) ){
		if( isset($return[$inner_option]) ){
			$return = $return[$inner_option];
		}
	}
	
	return $return;
	
}
}

/**
 *  Get all registed sidebars. This will also return custom sidebars too.
 */
if( !function_exists('preyantechnosys_get_all_registered_sidebars') ){
function preyantechnosys_get_all_registered_sidebars(){
	global $wp_registered_sidebars;
	$return = array( '' => esc_attr__('Default', 'minemo') );
	foreach( $wp_registered_sidebars as $sidebar_id=>$sidebar_info ){
		$return[$sidebar_id] = $sidebar_info['name'];
	}
	return $return;
}
}

/**
 *  Convert VC options to list of array with default values
 */
if( !function_exists('preyantechnosys_create_options_list') ){
function preyantechnosys_create_options_list( $optionslist=array() ){
	$options_list = array();
	
	if( is_array($optionslist) && count($optionslist)>0 ){
		foreach( $optionslist as $options ){
			
			if( $options['param_name']!='content' ){
				$std = ( !empty($options['std']) ) ? trim($options['std']) : '' ;
				$std = ( empty($std) && !empty($options['value']) && !is_array($options['value']) ) ? trim($options['value']) : $std ;
				
				// if type == dropdown   than fetch first option as std value
				if( !empty($options['type']) && $options['type']=='dropdown' && empty($options['std']) ){
					$std = $options['value'][key($options['value'])];
				}
				
				// if type == iconpicker   than fetch value as default std value
				if( !empty($options['type']) && $options['type']=='preyantechnosys_iconpicker' ){
					$std = $options['value'];
				}
				
				
				$options_list[$options['param_name']] = $std;
			}
		}
	}
	return $options_list;
}
}

/**
 * Function to prepare DATA tag values
 */
if( !function_exists('preyantechnosys_carousel_data_html') ){
function preyantechnosys_carousel_data_html( $allVar ){
	$return = '';
	
	if( $allVar['boxview'] == 'carousel' || $allVar['boxview'] == 'slickview' ){
		
		foreach( $allVar as $key=>$value ){
			$var = substr($key, 0 , 9 );
			if( $var=='carousel_' ){
				$datatitle = str_replace('carousel_','data-prt-',$key);
				$return .= ' '.$datatitle.'="'.$value.'"';
			}
		}
	}
	return $return;
}
}

/**
 *  Heading in our custom element like Blogbox, Portfoliobox etc.
 */
if( !function_exists('preyantechnosys_vc_element_heading') ){
function preyantechnosys_vc_element_heading( $allVar ){
	
	$return = '';
	
	$ctaOptions = array(
		'h2',
		'h2_link',
		'h2_use_theme_fonts',
		'use_custom_fonts_h2',
		'h2_font_container',
		'h2_google_fonts',
		'h2_el_class',
		'h4',
		'h4_link',
		'h4_use_theme_fonts',
		'use_custom_fonts_h4',
		'h4_font_container',
		'h4_google_fonts',
		'h4_el_class',
		'txt_align',
		'shape',
		'style',
		'custom_background',
		'custom_text',
		'color',
		'add_button',
		'reverse_heading',
		'seperator',
		'heading_style',
	);
	
	if( !empty($allVar['h2']) ) {
		$return .= '<div class="preyantechnosys-box-heading-wrapper prt-element-align-'.$allVar['txt_align'].'">';
		
		if( !isset($allVar['content']) ){
			$allVar['content'] = '';
		}
		$allVar['style'] = 'transparent';
		// Preparing Heading Shortcode
		$ctaShortcode = '[prt-heading ';
		foreach( $ctaOptions as $option ){
			if( isset($allVar[$option]) ){
				$ctaShortcode .= $option.'="'.$allVar[$option].'" ';
			}
		}
		if( isset($allVar['add_icon_new']) ){
			$ctaShortcode .= 'add_icon="'.$allVar['add_icon_new'].'" ';
		}
	
		$ctaShortcode .= 'el_width="100%" css_animation=""]'.$allVar['content'].'[/prt-heading]';
		$return .= do_shortcode($ctaShortcode);

		$return .= '</div> <!-- .prt-element-heading-wrapper container --> ';
		
	}
	
	return $return;

}
}

if( !function_exists('preyantechnosys_hex2rgb') ){
function preyantechnosys_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb); // returns the rgb values separated by commas
}
}

if( !function_exists('preyantechnosys_adjustBrightness') ){
function preyantechnosys_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}
}

/*
 * Function to get count of total sidebar
 */
if( !function_exists('preyantechnosys_get_widgets_count') ){
function preyantechnosys_get_widgets_count( $sidebar_id ){
	$sidebars_widgets = wp_get_sidebars_widgets();
	if( isset($sidebars_widgets[ $sidebar_id ]) ){
		return (int) count( (array) $sidebars_widgets[ $sidebar_id ] );
	}
}
}


/**
 *  Widget count class
 */
if( !function_exists('preyantechnosys_class_for_widgets_count') ){
function preyantechnosys_class_for_widgets_count( $count=0 ){
	$return = '';
	if( $count<1 ){ $count = 1; }
	if( $count>4 ){ $count = 4; }
	switch( $count ){
		case 1:
			$return = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$return = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case 3:
			$return = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
		case 4:
			$return = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
	}
	return $return;
}
}

/**
 * Custom template tags for Minemo
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Minemo
 * @since Minemo 1.0
 */

if ( ! function_exists( 'minemo_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since Minemo 1.0
 */
function minemo_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'minemo' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_attr__( 'Older Comments', 'minemo' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_attr__( 'Newer Comments', 'minemo' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;


if ( ! function_exists( 'minemo_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Minemo 1.0
 */
function minemo_entry_meta( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$social_share = '';
	$metalist     = preyantechnosys_get_option( $metafor . '_meta_list' );
	$date_format  = preyantechnosys_get_option( $metafor . '_meta_dateformat' );
	$date_format  = ( empty($date_format) ) ? get_option('date_format') : $date_format ;
	$cat_link     = preyantechnosys_get_option( $metafor . '_meta_catlink' );
	$tag_link     = preyantechnosys_get_option( $metafor . '_meta_taglink' );
	$author_link  = preyantechnosys_get_option( $metafor . '_meta_authorlink' );
	
	
	if( !empty($metalist['enabled']) && is_array($metalist['enabled']) && count($metalist['enabled'])>0 ){
		
		foreach( $metalist['enabled'] as $meta_id=>$meta_name ){
			
			switch( $meta_id ){
				
				case 'date':
					
					// date format
					if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
						
						$time_string = '<span class="entry-date published updated" datetime="%1$s">%2$s</span>';

						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
							$time_string = '<span class="entry-date published" datetime="%1$s">%2$s</span><span class="updated prt-hide" datetime="%3$s">%4$s</span>';
						}

						$time_string = sprintf( $time_string,
							esc_attr( get_the_date( 'c' ) ),
							get_the_date($date_format),
							esc_attr( get_the_modified_date( 'c' ) ),
							get_the_modified_date($date_format)
						);

						$return .= sprintf( '<span class="prt-meta-line posted-on"><i class="ti-calendar"></i> <span class="screen-reader-text prt-hide">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
							esc_attr_x( 'Posted on', 'Used before publish date.', 'minemo' ),
							esc_url( get_permalink() ),
							$time_string
						);
						
					}
					
					break;
					
				
				case 'author':

					if ( 'post' === get_post_type() ) {
						// preparing link
						$author	= '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'.get_the_author().'</a>';
						
						if( $author_link!=true ){
							$author = strip_tags($author);
						}
						
						$return .= sprintf( '<span class="prt-meta-line byline"><i class="ti-user"></i> <span class="byauthor">By</span> <span class="author vcard"><span class="screen-reader-text prt-hide">%1$s </span>%2$s</span></span>',
							esc_attr_x( 'Author', 'Used before post author name.', 'minemo' ),
							$author
						);
					}


					break;
					
				case 'comment':
				
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						$return .= '<span class="prt-meta-line comments-link"><i class="ti-comments"></i> ';
						ob_start();
						comments_popup_link( esc_attr__( '0 Comments', 'minemo' ) );
						$return .= ob_get_contents();
						ob_end_clean();
						$return .=  '</span>';
					}
					
					break;



				case 'cat':
					$categories_list = get_the_category_list( ', ' );
					if ( !empty($categories_list) ) {
						if( $cat_link!=true ){
							$categories_list = strip_tags($categories_list);
						}
						$return .= sprintf( '<span class="prt-meta-line cat-links"><i class="prt-minemo-icon-category"></i> <span class="screen-reader-text prt-hide">%1$s </span>%2$s</span>',
							esc_attr_x( 'Categories', 'Used before category names.', 'minemo' ),
							$categories_list
						);
					}
					
					break;
					
				case 'tag':
					$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'minemo' ) );
					if ( !empty($tags_list) ) {
						if( $tag_link!=true ){
							$tags_list = strip_tags($tags_list);
						}
						$return .= sprintf( '<span class="prt-meta-line tags-links"><i class="prt-minemo-icon-tag-2"></i> <span class="screen-reader-text prt-hide">%1$s </span>%2$s</span>',
							esc_attr_x( 'Tags', 'Used before tag names.', 'minemo' ),
							$tags_list
						);
					}
					
					break;
					
			} // switch
			
		} // foreach
		
	}
	
	// meta details
	if( !empty($return) ){
		$return = '<div class="prt-entry-meta-wrapper"><div class="entry-meta prt-entry-meta prt-entry-meta-' . $metafor . '">' . $return . '</div></div>' ;
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
		
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @since Minemo 1.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
if( ! function_exists('minemo_categorized_blog') ){
function minemo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'minemo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'minemo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so minemo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so minemo_categorized_blog should return false.
		return false;
	}
}
}


/*
 *  This function will reset the TGM Activation message box to show if user need to update any plugin or not. This function will call after theme version changed.
 */
if( !function_exists('preyantechnosys_reset_tgm_infobox') ){
function preyantechnosys_reset_tgm_infobox(){
	update_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_tgmpa', '0' );
}
}

/**
 *  CSS Minifier
 */
if( !function_exists('preyantechnosys_minify_css') ){
function preyantechnosys_minify_css( $css ){
	if( !empty($css) ){
		// Remove comments
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		
		// Remove new line charactor
		$css = str_replace(array("\r\n", "\r", "\n", "\t"), '', $css);
		
		// Remove whitespace
		$css = str_replace(array('  ', '   ', '    ', '     ', '      ', '       ', '        ', '         ', '          '), ' ', $css);
		
		// Remove space after colons
		$css = str_replace(': ', ':', $css);
		
		// Remove space near commas
		$css = str_replace(', ', ',', $css);
		$css = str_replace(' ,', ',', $css);

		// Remove space before brackets
		$css = str_replace('{ ', '{', $css);
		$css = str_replace('} ', '}', $css);
		$css = str_replace(' {', '{', $css);
		$css = str_replace(' }', '}', $css);

		// Remove last dot with comma
		$css = str_replace(';}', '}', $css);
		
		// Remove whitespace again
		$css = str_replace(array('  ', '   ', '    ', '     ', '      ', '       ', '        ', '         ', '          '), ' ', $css);
		
		// Remove extra space
		$css = str_replace('; }', ';}', $css);
		
	}
	return $css;
}
}


/**
 *  Get options which has only specific type
 */
if( !function_exists('preyantechnosys_get_options_type') ){
function preyantechnosys_get_options_type( $type='preyantechnosys_background' ){
	$return = array();
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
	foreach( $tm_framework_options as $options_key => $options_val ){
		if( !empty($options_val['fields']) ){
			foreach( $options_val['fields'] as $curr_id=>$field ){
				if( !empty($field['type']) && $field['type']==$type && !empty($field['id']) ){
					$output = ( !empty($field['output']) ) ? $field['output'] : '' ;
					$return[$field['id']] = $options_val['fields'][$curr_id];
				}
			}
		}
	}
	return $return;
}
}


/**
 *  The properties that can be set, are: background-color, background-image, background-position, background-size, background-repeat, background-origin, background-clip, and background-attachment.
 */
if( !function_exists('preyantechnosys_get_all_background_css') ){
function preyantechnosys_get_all_background_css(){
	$return = array();
	
	// Getting all "preyantechnosys_background" options 
	$element_ids = preyantechnosys_get_options_type('preyantechnosys_background');
	
	
	foreach( $element_ids as $element_id=>$optionlist ){
		$selector_class = $optionlist['output'];
		
		$element_id_val = preyantechnosys_get_option($element_id);
		$return[]       = preyantechnosys_get_background_css( $optionlist, $element_id_val );
	}
	
	$return = implode( ' ', $return );
	
	return $return;
		
}
}

/**
 *  The properties that can be set, are: background-color, background-image, background-position, background-size, background-repeat, background-origin, background-clip, and background-attachment.
 */
if( !function_exists('preyantechnosys_get_background_css') ){
function preyantechnosys_get_background_css( $element_array, $values, $exclude=array() ){
	
	$selector = '';
	if( !empty($element_array) && is_array($element_array) && isset($element_array['output']) ){
		$selector = $element_array['output'];
	} else if( !empty($element_array) && is_string($element_array) ){
		$selector = $element_array;
	} 
	
	$return          = array();
	$return_bglayer  = array();
	$rgb_color_layer = '';
	$valid_options   = array(
		'image',
		'color',
		'position',
		'size',
		'repeat',
		'attachment',
	);
			
	// default values
	$default_options   = array(
		'image'		 => '',
		'imageid'	 => '',
		'color'		 => '',
		'position'	 => '0% 0%',
		'size'		 => 'auto',
		'repeat'	 => 'repeat',
		'attachment' => 'scroll',
	);
	
	// Merging default values with real values
	foreach( $default_options as $default_key => $default_value ){
		if( !empty($values[$default_key]) ){
			$default_options[$default_key] = $values[$default_key];
		}
	}
	$values = $default_options;
	
	// BG Layer class
	$bg_layer_class = $selector . ' > .prt-bg-layer';
	if( !empty($element_array['bg_layer_class']) ){
		$bg_layer_class = $element_array['bg_layer_class'];
	}
			
	// color in dropdown
	$dropdown_color = '';
	if( !empty($element_array['color_dropdown_id']) ){
		$dropdown_color = preyantechnosys_get_option($element_array['color_dropdown_id']);
	}
		
	foreach( $valid_options as $option ){
		
		if( isset($values[$option]) && trim($values[$option])!='' ){
			if( $option=='image' ){
				$return[] = 'background-image:url(\''. $values[$option] .'\')';
			} else if( $option=='color' ){
				
				// setting transparent
				if( $dropdown_color=='transparent' ){ $values[$option]='transparent'; }
				
				
				// background color
				
				if( !in_array('background-color',$exclude) && !in_array($dropdown_color, array('grey','darkgrey','white','skincolor') ) ){
					if( substr($values[$option],0,5)=='rgba(' ){
						$return[]        = 'background-color:'. $values[$option]; // If RGB color
						$rgb_color_layer = 'background-color:'. $values[$option];
					} else {
						$return[] = 'background-color:'. $values[$option];
					}
				}
				
				// bg layer class
				if( !in_array('background-color',$exclude) ){
					$return_bglayer[] = 'background-color:'. $values[$option]; // If RGB color
				}
				
			} else {
				$return[] = 'background-'. $option .':'. $values[$option];
			}
		}
		
	}
	
	// Return
	if( count($return)>0 ){
		
		if( $selector=='' ){
			$return = implode( ';', $return ).';';
		} else {
			$return = $selector.'{'.implode( ';', $return ).';}'."\n";
		}
		
		// modify selector to select bg layer too
		if( !in_array('output_bglayer',$exclude) && is_array($return_bglayer) && count($return_bglayer)>0  ){
			if( $selector!='' && !in_array($dropdown_color, array('grey','darkgrey','white','skincolor') ) ){
				$return .= $bg_layer_class . '{'.implode( ';', $return_bglayer ).';}'."\n";
			}
		}
		
	} else {
		$return = '';
	}
	
	// Return data
	return $return;
	
}
}


/**
 *  Generate CSS for all background options
 */
if( !function_exists('preyantechnosys_get_all_font_css') ){
function preyantechnosys_get_all_font_css(){
	$return = array();
	
	// Getting all "preyantechnosys_background" options 
	$element_ids = preyantechnosys_get_options_type('preyantechnosys_typography');
	
	
	foreach( $element_ids as $element_id=>$optionlist ){
		$selector_class = $optionlist['output'];
		$element_id_val = preyantechnosys_get_option($element_id);
		$return[] = preyantechnosys_get_font_css( $selector_class, $element_id_val );
	}
		
	$return = implode( ' ', $return );
	
	// return data
	return $return;
	
}
}


/**
 *  Generate CSS for all font options
 */
if( !function_exists('preyantechnosys_get_font_css') ){
function preyantechnosys_get_font_css( $selector, $values, $important=false ){
	$return = array();
	$family = '';
	
	$valid_options = array(
		'variant',
		'text-transform',
		'font-size',
		'line-height',
		'letter-spacing',
		'color',
	);
	
	// Main font
	if( !empty($values['family']) ){
		$family = '"'.$values['family'].'"';
	}
	
	// Backup font
	if( !empty($values['backup-family']) ){
		$family .= ', '.$values['backup-family'];
	}
	$return[] = 'font-family:'. $family;
	
	$important = ($important==true) ? ' !important' : '' ;
	
	
	// Loop other font css
	foreach( $valid_options as $option ){
		if( !empty($values[$option]) ){
			
			// Prefix
			$prefix = (
				   $option=='font-size'
				|| $option=='line-height'
				|| $option=='letter-spacing'
			) ? 'px' : '' ;
		
		
			if( $option=='variant' ){
				
				if( $values[$option]=='regular' ){ $values[$option] = '400'; }
				
				if( substr( $values[$option], -6 ) == 'italic' ){
					$return[]			= 'font-style: italic ' . $important;
					$values[$option]	= str_replace('italic','', $values[$option]);
				} else if( substr( $values[$option], -4 ) == 'bold' ){
					$return[]			= 'font-weight: bold ' . $important;
					$values[$option]	= str_replace('bold','', $values[$option]);
				}
				
				$return[] = 'font-weight:'.$values[$option] . $important;
				
			} else {
				$return[] = trim($option).':'.$values[$option] . $prefix . $important;
			}
		}
	}
			
	// Return
	if( count($return)>0 ){
		if( $selector!='' ){
			$return = $selector .'{'.implode( ';', $return ).';}'."\n";
		} else {
			$return = implode( ';', $return ).';';
		}
		
	} else {
		$return = '';
	}
	
	return $return;
	
}
}


/*
 *  Check if color is dark. This is new version. This will return TRUE if dark color.
 */
if( !function_exists('preyantechnosys_check_dark_color') ){
function preyantechnosys_check_dark_color($hex){
	// strip off any leading #
	$hex = str_replace('#', '', $hex);

	//break up the color in its RGB components
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));

	//do simple weighted avarage
	//
	//(This might be overly simplistic as different colors are perceived
	// differently. That is a green of 128 might be brighter than a red of 128.
	// But as long as it's just about picking a white or black text color...)
	if($r + $g + $b > 382){
		return false;
		//bright color, use dark font
	}else{
		return true;
		//dark color, use bright font
	}
}
}


/*
 *  Max Mega Menu : Default theme setup
 */
if( !function_exists('preyantechnosys_mmmenu_theme_setup') ){
function preyantechnosys_mmmenu_theme_setup(){
	$megamenu_themes       = get_option('megamenu_themes');
	$tm_mmmenu_theme_saved = get_option('tm_mmmenu_theme_saved');
	
	if( $tm_mmmenu_theme_saved!=='yes' ){
		$megamenu_themes['default'] = array(
			"title" => "Default",
			"arrow_up" => "dash-f343",
			"arrow_down" => "dash-f347",
			"arrow_left" => "dash-f341",
			"arrow_right" => "dash-f345",
			"responsive_breakpoint" => "1200px",
			"responsive_text" => "",
			"line_height" => "1.7",
			"z_index" => "999",
			"shadow_horizontal" => "0px",
			"shadow_vertical" => "0px",
			"shadow_blur" => "5px",
			"shadow_spread" => "0px",
			"shadow_color" => "rgba(0, 0, 0, 0.1)",
			"container_background_from" =>  "rgba(34, 34, 34, 0)",
			"container_background_to" =>  "rgba(34, 34, 34, 0)",
			"container_padding_top" => "0px",
			"container_padding_right" => "0px",
			"container_padding_bottom" => "0px",
			"container_padding_left" => "0px",
			"container_border_radius_top_left" => "0px",
			"container_border_radius_top_right" => "0px",
			"container_border_radius_bottom_right" => "0px",
			"container_border_radius_bottom_left" => "0px",
			"menu_item_align" => "left",
			"menu_item_background_from" => "rgba(0,0,0,0)",
			"menu_item_background_to" => "rgba(0,0,0,0)",
			"menu_item_background_hover_from" => "#333",
			"menu_item_background_hover_to" => "#333",
			"menu_item_spacing" => "0px",
			"menu_item_link_height" => "40px",
			"menu_item_link_color" => "#ffffff",
			"menu_item_link_font_size" => "14px",
			"menu_item_link_font" => "inherit",
			"menu_item_link_text_transform" => "none",
			"menu_item_link_weight" => "normal",
			"menu_item_link_text_decoration" => "none",
			"menu_item_link_color_hover" => "#ffffff",
			"menu_item_link_weight_hover" => "bold",
			"menu_item_link_text_decoration_hover" => "none",
			"menu_item_link_padding_top" => "0px",
			"menu_item_link_padding_right" => "10px",
			"menu_item_link_padding_bottom" => "0px",
			"menu_item_link_padding_left" => "10px",
			"menu_item_border_color" => "#fff",
			"menu_item_border_top" => "0px",
			"menu_item_border_right" => "0px",
			"menu_item_border_bottom" => "0px",
			"menu_item_border_left" => "0px",
			"menu_item_border_color_hover" => "#fff",
			"menu_item_link_border_radius_top_left" => "0px",
			"menu_item_link_border_radius_top_right" => "0px",
			"menu_item_link_border_radius_bottom_right" => "0px",
			"menu_item_link_border_radius_bottom_left" => "0px",
			"menu_item_divider_color" => "rgba(255, 255, 255, 0.1)",
			"menu_item_divider_glow_opacity" => "0.1",
			"panel_background_from" => "#f1f1f1",
			"panel_background_to" => "#f1f1f1",
			"panel_width" => "100%",
			"panel_padding_top" => "0px",
			"panel_padding_right" => "0px",
			"panel_padding_bottom" => "0px",
			"panel_padding_left" => "0px",
			"panel_border_color" => "#fff",
			"panel_border_top" => "0px",
			"panel_border_right" => "0px",
			"panel_border_bottom" => "0px",
			"panel_border_left" => "0px",
			"panel_border_radius_top_left" => "0px",
			"panel_border_radius_top_right" => "0px",
			"panel_border_radius_bottom_right" => "0px",
			"panel_border_radius_bottom_left" => "0px",
			"panel_widget_padding_top" => "15px",
			"panel_widget_padding_right" => "15px",
			"panel_widget_padding_bottom" => "15px",
			"panel_widget_padding_left" => "15px",
			"panel_header_color" => "#555",
			"panel_header_font_size" => "16px",
			"panel_header_font" => "inherit",
			"panel_header_font_weight" => "bold",
			"panel_header_text_transform" => "uppercase",
			"panel_header_text_decoration" => "none",
			"panel_font_color" => "#666",
			"panel_font_size" => "14px",
			"panel_font_family" => "inherit",
			"panel_header_padding_top" => "0px",
			"panel_header_padding_right" => "0px",
			"panel_header_padding_bottom" => "5px",
			"panel_header_padding_left" => "0px",
			"panel_header_margin_top" => "0px",
			"panel_header_margin_right" => "0px",
			"panel_header_margin_bottom" => "0px",
			"panel_header_margin_left" => "0px",
			"panel_header_border_color" => "#555",
			"panel_header_border_top" => "0px",
			"panel_header_border_right" => "0px",
			"panel_header_border_bottom" => "0px",
			"panel_header_border_left" => "0px",
			"panel_second_level_font_color" => "#555",
			"panel_second_level_font_size" => "16px",
			"panel_second_level_font" => "inherit",
			"panel_second_level_font_weight" => "bold",
			"panel_second_level_text_transform" => "uppercase",
			"panel_second_level_text_decoration" => "none",
			"panel_second_level_font_color_hover" => "#555",
			"panel_second_level_font_weight_hover" => "bold",
			"panel_second_level_text_decoration_hover" => "none",
			"panel_second_level_background_hover_from" => "rgba(0,0,0,0)",
			"panel_second_level_background_hover_to" => "rgba(0,0,0,0)",
			"panel_second_level_padding_top" => "0px",
			"panel_second_level_padding_right" => "0px",
			"panel_second_level_padding_bottom" => "0px",
			"panel_second_level_padding_left" => "0px",
			"panel_second_level_margin_top" => "0px",
			"panel_second_level_margin_right" => "0px",
			"panel_second_level_margin_bottom" => "0px",
			"panel_second_level_margin_left" => "0px",
			"panel_second_level_border_color" => "#555",
			"panel_second_level_border_top" => "0px",
			"panel_second_level_border_right" => "0px",
			"panel_second_level_border_bottom" => "0px",
			"panel_second_level_border_left" => "0px",
			"panel_third_level_font_color" => "#666",
			"panel_third_level_font_size" => "14px",
			"panel_third_level_font" => "inherit",
			"panel_third_level_font_weight" => "normal",
			"panel_third_level_text_transform" => "none",
			"panel_third_level_text_decoration" => "none",
			"panel_third_level_font_color_hover" => "#666",
			"panel_third_level_font_weight_hover" => "normal",
			"panel_third_level_text_decoration_hover" => "none",
			"panel_third_level_background_hover_from" => "rgba(0,0,0,0)",
			"panel_third_level_background_hover_to" => "rgba(0,0,0,0)",
			"panel_third_level_padding_top" => "0px",
			"panel_third_level_padding_right" => "0px",
			"panel_third_level_padding_bottom" => "0px",
			"panel_third_level_padding_left" => "0px",
			"flyout_menu_background_from" => "#f1f1f1",
			"flyout_menu_background_to" => "#f1f1f1",
			"flyout_width" => "150px",
			"flyout_padding_top" => "0px",
			"flyout_padding_right" => "0px",
			"flyout_padding_bottom" => "0px",
			"flyout_padding_left" => "0px",
			"flyout_border_color" => "#ffffff",
			"flyout_border_top" => "0px",
			"flyout_border_right" => "0px",
			"flyout_border_bottom" => "0px",
			"flyout_border_left" => "0px",
			"flyout_border_radius_top_left" => "0px",
			"flyout_border_radius_top_right" => "0px",
			"flyout_border_radius_bottom_right" => "0px",
			"flyout_border_radius_bottom_left" => "0px",
			"flyout_background_from" => "#f1f1f1",
			"flyout_background_to" => "#f1f1f1",
			"flyout_background_hover_from" => "#dddddd",
			"flyout_background_hover_to" => "#dddddd",
			"flyout_link_height" => "35px",
			"flyout_link_padding_top" => "0px",
			"flyout_link_padding_right" => "10px",
			"flyout_link_padding_bottom" => "0px",
			"flyout_link_padding_left" => "10px",
			"flyout_link_color" => "#666",
			"flyout_link_size" => "14px",
			"flyout_link_family" => "inherit",
			"flyout_link_text_transform" => "none",
			"flyout_link_weight" => "normal",
			"flyout_link_text_decoration" => "none",
			"flyout_link_color_hover" => "#666",
			"flyout_link_weight_hover" => "normal",
			"flyout_link_text_decoration_hover" => "none",
			"flyout_menu_item_divider_color" =>  "rgba(255, 255, 255, 0.1)",
			"custom_css" => '#{$wrap} #{$menu} {
			/** Custom styles should be added below this line **/
			}
			#{$wrap} { 
			clear: both;
			}'
		);
		
		//  Saving new theme
		update_option('megamenu_themes', $megamenu_themes);
		update_option('tm_mmmenu_theme_saved', 'yes');
	}
}
}


/**
 *  Custom code - Body start code
 */
if( !function_exists('preyantechnosys_body_start_code') ){
function preyantechnosys_body_start_code(){
	$return               = '';
	$page_loader          = '';
	$customhtml_bodystart = trim(preyantechnosys_get_option('customhtml_bodystart'));
	$loaderimg            = preyantechnosys_get_option('loaderimg');
	$loaderimage_custom   = preyantechnosys_get_option('loaderimage_custom');
	
	// Body Start
	if( !empty( $customhtml_bodystart ) ){
		// We are not sanitizing this as we are expecting any (HTML, CSS, JS) code here
		$return .= $customhtml_bodystart;
	}
	
	// Show page loader if enabled
	if( !empty( $loaderimg ) ){
		if( $loaderimg=='custom' ){
			if( !empty($loaderimage_custom) ){
				$imgdata = wp_get_attachment_image_src( $loaderimage_custom, 'full' );
				if( !empty($imgdata[0]) ){
					$page_loader = '<div class="prt-page-loader-wrapper"></div>';  // We are not sanitizing this as we are expecting any (HTML, CSS, JS) code here
				}
				
			}
		} else {
			$page_loader = '<div class="prt-page-loader-wrapper"></div>';  // We are not sanitizing this as we are expecting any (HTML, CSS, JS) code here
		}		
		
	}
	
	echo trim($return . $page_loader);
	
}
}


/**
 *  Custom code - Body start code
 */
if( !function_exists('preyantechnosys_get_page_loader_css') ){
function preyantechnosys_get_page_loader_css(){
	$return             = '';
	$loaderimg          = preyantechnosys_get_option('loaderimg');
	$loaderimage_custom = preyantechnosys_get_option('loaderimage_custom');
	
	
	if( !empty( $loaderimg ) ){
		
		$img_src = '';
		
		if( $loaderimg=='custom' ){
			if( !empty($loaderimage_custom) ){
				$imgdata = wp_get_attachment_image_src( $loaderimage_custom, 'full' );
				if( !empty($imgdata[0]) ){ $img_src = $imgdata[0]; }
			}
		} else {
			$img_src = get_template_directory_uri() .'/images/loader'. $loaderimg .'.gif';
		}


		$return = '.prt-page-loader-wrapper{background-image:url(' . esc_url( $img_src ) . ')}';
		
	};
	
	return $return;
}
}


/**
 *  Blogbox footer meta options
 */
if ( !function_exists( 'preyantechnosys_blogbox_footer' ) ){
function preyantechnosys_blogbox_footer(){
	
	$return = '';
	
	ob_start();
	get_template_part('template-parts/blogbox/blogbox','footer');
	$return = ob_get_contents();
	ob_end_clean();
	
	return $return;
}
}


/**
 * Print HTML with icon for current post.
 *
 * Create your own preyantechnosys_blogbox_comment_count() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if ( !function_exists( 'preyantechnosys_blogbox_comment_count' ) ){
function preyantechnosys_blogbox_comment_count( $echo = false ) {
	$return = '';
	if( comments_open() ){
		$comments = wp_count_comments( get_the_ID() );
		$comments = $comments->approved; //Get Total Comments
		$return  .= '<div class="preyantechnosys-blogbox-comment"><i class="prt-minemo-icon-comment"></i> '. $comments .'</div>';
	}
	return $return;
}
}


/**
 *  Post thumbnail. This will echo post thumbnail according to port format like video, audio etc.
 */
if ( !function_exists( 'preyantechnosys_featured_image' ) ){
function preyantechnosys_featured_image($size='full'){
	$return = '';

	if( has_post_thumbnail() ){
		$return = get_the_post_thumbnail( NULL, $size );
	}
	
	if( !empty($return) ){
		$return = '
		<span class="preyantechnosys-item-thumbnail">
			<span class="preyantechnosys-item-thumbnail-inner">
				' . $return . '
			</span>
		</span>';
	}
	
	return $return;
	
}
}


/******************************************************************/
/* ----------------------- Team Member  ------------------------- */

/**
 *  Get single team member - position
 */
if ( !function_exists( 'preyantechnosys_team_member_single_meta' ) ){
function preyantechnosys_team_member_single_meta( $type='position', $post_id='' ) {
	$return = '';
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$types = array( 'position', 'phone', 'email', 'website' );
	
	if( !empty($type) ){
		
		// Position
		if( in_array( $type, $types ) ){
			$meta_data = get_post_meta( $post_id, 'preyantechnosys_team_member_details', true );
			if( !empty($meta_data['tm_team_info']['team_details_line_'.$type]) ){
				$return = $meta_data['tm_team_info']['team_details_line_'.$type];
			}
		}
		
		// Preparing output according to data type
		if( !empty($return) ){
			
			switch( $type ){
				case 'position':
					$return = '<div class="prt-team-member-single-position">' . $return . '</div>';
					break;
					
				case 'phone':
					$return = '<div class="prt-team-list-title"><i class="kw_minemo flaticon-call-1"></i> '. esc_attr__('Phone','minemo') .' :</div>
						<div class="prt-team-list-value"><a href="tel:' . $return . '">' . $return . '</a></div>';
					break;
					
				case 'email':
					$return = '<div class="prt-team-list-title"><i class="prt-minemo-icon-mail"></i> '. esc_attr__('Email','minemo') .' :</div>
						<div class="prt-team-list-value"><a href="mailto:' . $return . '">' . $return . '</a></div>';
					break;
					
				case 'website':
					
					$return_link = $return;
					if( substr($return_link, 0, 3)=='www' ){
						$return_link = 'http://'.$return;
					}
				
					$return = '<div class="prt-team-list-title"><i class="prt-minemo-icon-world"></i> '. esc_attr__('Website','minemo') .' :</div>
						<div class="prt-team-list-value"><a target="_blank" href="' . esc_url($return_link) . '">' . $return . '</a></div>';
					break;
			
			}
			
		}
		
	}
	
	return $return;
}
}


/**
 *  Single Team member content
 */
if ( !function_exists( 'preyantechnosys_team_member_meta_details' ) ){
function preyantechnosys_team_member_meta_details( $post_id='' ){
	$return  = '';
	$email   = preyantechnosys_wp_kses( preyantechnosys_team_member_single_meta( 'email' ) );
	$phone   = preyantechnosys_wp_kses( preyantechnosys_team_member_single_meta( 'phone' ) );	
	$website = preyantechnosys_wp_kses( preyantechnosys_team_member_single_meta( 'website' ) ); 
	

	if( !empty($email) ){
		$return .= '<li class="prt-team-details-line prt-team-extra-details-line-email">' . $email . '</li>';
	}
	if( !empty($phone) ){
		$return .= '<li class="prt-team-details-line prt-team-extra-details-line-phone">' . $phone . '</li>';
	}	
	if( !empty($website) ){
		$return .= '<li class="prt-team-details-line prt-team-extra-details-line-website">' . $website . '</li>';
	}
	
	// final output
	if( !empty($return) ){
		$return = '<div class="prt-team-details-wrapper"><ul class="prt-team-details-list">' . $return . '</ul></div>';
	}
	
	return $return;
}
}

/**
 *  Single Team member extra details (list items)
 */
if ( !function_exists( 'preyantechnosys_team_member_extra_details' ) ){
function preyantechnosys_team_member_extra_details( $post_id='' ){
	$return                   = '';
	$team_extra_details_lines = preyantechnosys_get_option('team_extra_details_lines');

	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	if( !empty($team_extra_details_lines) && is_array($team_extra_details_lines) && count($team_extra_details_lines) > 0 ){
		
		// getting value from single team member
		$post_meta = get_post_meta( $post_id, 'preyantechnosys_team_member_details', true );
		
		foreach( $team_extra_details_lines as $key=>$val ){
			
			if( !empty($post_meta['tm_team_info']['team_extra_details_line_'.$key]) ){
		
				$title = (!empty($val['team_extra_details_line_title'])) ? esc_attr($val['team_extra_details_line_title']) . ' ' : '' ;
				$value =  $post_meta['tm_team_info']['team_extra_details_line_'.$key];
				
							
				$return .= '<li class="prt-team-details-line prt-team-extra-details-line-' . $key . ' prt-list-detail-no-icon">
					<div class="prt-team-list-title">' . $title . ' :</div>
					<div class="prt-team-list-value">' . $value . '</div>
				</li>';
				
			}
			
		} // foreach
		
	} // if
	
	
	if( !empty($return) ){
		$return = '<div class="prt-team-details-wrapper prt-team-extra-details-wrapper"><ul class="prt-team-details-list prt-team-extra-details-list">' . $return . '</ul></div>';
	}
	
	return $return;
	
}
}


/**
 *  Icon from array
 */
if ( !function_exists( 'preyantechnosys_create_icon_from_data' ) ){
function preyantechnosys_create_icon_from_data( $data, $i_tag_only=false ){

	$return = '';
	
	if( isset($data['library']) && isset($data['library_fontawesome']) && isset($data['library_linecons']) && isset($data['library_themify']) ){
		
		$library              = $data['library'];
		$library_fontawesome  = $data['library_fontawesome'];
		$library_kw_minemo = ( !empty($data['library_kw_minemo']) ) ? $data['library_kw_minemo'] : '';
		$library_linecons     = $data['library_linecons'];
		$library_themify      = $data['library_themify'];
		
		if( !empty(${'library_'.$library}) && ${'library_'.$library}!='empty' ){
			
			$return = do_shortcode('[prt-icon type="'.$library.'" icon_kw_minemo="'.$library_kw_minemo.'" icon_fontawesome="'.$library_fontawesome.'" icon_linecons="'.$library_linecons.'" icon_themify="'.$library_themify.'"]');
			
			if( $i_tag_only==true ){
				$return = '<i class="' . ${'library_'.$library} . '"></i>';
			}
			
		}
		
	}	
	return $return;	
}
}


/**
 *  Single Team member content
 */
if ( !function_exists( 'preyantechnosys_team_member_content' ) ){
function preyantechnosys_team_member_content( $post_id='' ){
	$return = '';
	
	// processing content
	$content = get_the_content( null, false );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	// preparing final output
	$return = '<div class="prt-teammember-content row">' . $content . '</div><!-- .prt-team-member-content -->';
	
	return $return;
}
}


/**
 *  Single Team member show category
 */
if ( !function_exists( 'preyantechnosys_team_member_single_category_list' ) ){
function preyantechnosys_team_member_single_category_list( $post_id='' ){
	$return = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$categories_list = wp_get_post_terms( $post_id, 'tm_team_group' );
	
	if( is_array($categories_list) && count($categories_list)>0 ){
		$x = 1;
		foreach( $categories_list as $category ){
			if( $x != 1 ){ $return .= '&nbsp; / &nbsp;'; } $x++;
			$return .= '<a href="' . get_term_link( $category->term_id ) . '">' . esc_attr($category->name) . '</a>';
			
		}
	}
		
	if( !empty($return) ){
		$return = '<div class="prt-team-member-single-category">' . $return . '</div>';
	}
	
	return $return;
	
}
}


/**
 *  Single Team member extra details (list items)
 */
if ( !function_exists( 'preyantechnosys_team_member_single_excerpt' ) ){
function preyantechnosys_team_member_single_excerpt(){
	$return  = '';
	$excerpt = get_the_excerpt();
	
	if( !empty($excerpt) ){
		$excerpt = apply_filters( 'the_content', $excerpt );
		$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
		$return = '<div class="prt-team-member-excerpt">' . $excerpt . '</div>';
	}
	
	return $return;
	
}
}


/******************************************************************/
/* ----------------------- Portfolio box ------------------------- */
if ( !function_exists( 'preyantechnosys_portfolio_next_prev_btn' ) ){
function preyantechnosys_portfolio_next_prev_btn() {
	$return = '';
	
	if( is_singular('tm_portfolio') ){
		
		$return = get_the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_attr__( 'Next', 'minemo' ) . '</span> ' .
				'<span class="screen-reader-text prt-hide">' . esc_attr__( 'Next post:', 'minemo' ) . '</span> ' .
				'<span class="post-title prt-hide">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_attr__( 'Previous', 'minemo' ) . '</span> ' .
				'<span class="screen-reader-text prt-hide">' . esc_attr__( 'Previous post:', 'minemo' ) . '</span> ' .
				'<span class="post-title prt-hide">%title</span>',
		) );

	}
	
	return $return;
	
}
}

if ( !function_exists( 'preyantechnosys_portfolio_category' ) ){
function preyantechnosys_portfolio_category( $link=true ) {
	$return = get_the_term_list( get_the_ID(), 'tm_portfolio_category', '', ' - ' );
	if( $link!=true ){
		$return = strip_tags($return);
	}
	return $return;
}
}

/* services category */
if ( !function_exists( 'preyantechnosys_servicesbox_category' ) ){
function preyantechnosys_servicesbox_category( $link=true ) {
	$return = get_the_term_list( get_the_ID(), 'tm_service_category', '', ', ' );
	if( $link!=true ){
		$return = strip_tags($return);
	}
	return $return;
}
}

/* Get single portfolio view style */
if ( !function_exists( 'preyantechnosys_portfolio_single_view' ) ){
function preyantechnosys_portfolio_single_view() {
	$view                = '';
	$portfolio_viewstyle = preyantechnosys_get_option('portfolio_viewstyle');
	
	// Fetching global value for Single Portfolio View style
	if( !empty($portfolio_viewstyle) ){
		$view = $portfolio_viewstyle;
	}
	
	// Fetching this single portfolio value... if set
	$single_viewstyle = get_post_meta( get_the_ID(), 'preyantechnosys_portfolio_view', true );
	if( !empty($single_viewstyle['viewstyle']) ){
		$view = $single_viewstyle['viewstyle'];
	}
	
	return $view;
}
}


/* Portfolio details box */
if( !function_exists('preyantechnosys_portfolio_detailsbox') ){
function preyantechnosys_portfolio_detailsbox(){
	$return                    = '';
	$portfolio_project_details = preyantechnosys_get_option('portfolio_project_details');
	$pf_details_line           = preyantechnosys_get_option('pf_details_line');

	$return .= '
	<div class="preyantechnosys-pf-detailbox">
		<div class="preyantechnosys-pf-detailbox-inner">
			<ul class="preyantechnosys-pf-detailbox-list">';
	
	$page_values = get_post_meta( get_the_ID(), 'preyantechnosys_portfolio_list_data', true );
	$page_values = $page_values['tm_pf_list_data'];
	
	
	if( isset($pf_details_line) && is_array($pf_details_line) && count($pf_details_line)>0 ){
		foreach( $pf_details_line as $key=>$val ){
			
			$row_title = '';
			$row_value = '';
			
			if( !empty($val['pf_details_line_title']) ){ $row_title = sprintf( esc_attr__('%s ', 'minemo'), $val['pf_details_line_title'] ); }
			if( !empty($page_values['pf_details_line_'.$key]) ){ $row_value = nl2br($page_values['pf_details_line_'.$key]); }
			
			// Dynamic value
			if( !empty($val['data']) ){
				if($val['data']=='date'){
					$row_value = get_the_date();
				} else if($val['data']=='category'){
					$row_value = strip_tags( get_the_term_list( get_the_ID(), 'tm_portfolio_category', '', ', ', '' ) );
				} else if($val['data']=='category_link'){
					$row_value = get_the_term_list( get_the_ID(), 'tm_portfolio_category', '', ', ', '' );
				} else if($val['data']=='tag'){
					$row_value = strip_tags( get_the_term_list( get_the_ID(), 'tm_portfolio_tags', '', ', ', '' ) );
				} else if($val['data']=='tag_link'){
					$row_value = get_the_term_list( get_the_ID(), 'tm_portfolio_tags', '', ', ', '' );
				}
			}
						
			if( !empty($row_value) ){
				$return .= '
						<li class="prt-pf-details-date">
							<span class="prt-pf-left-details">'. $row_title .'</span>
							<span class="prt-pf-right-details">'. $row_value .'</span>
						</li>';
			}
				
		}
	}
	$return .= '
	
			</ul>
		</div><!-- .preyantechnosys-pf-detailbox-inner -->
	</div><!-- .preyantechnosys-pf-detailbox -->
	
	';

	return $return;
}
}

/* Portfolio details box */
if( !function_exists('preyantechnosys_portfoliofull_detailsbox') ){
function preyantechnosys_portfoliofull_detailsbox(){
	$return                    = '';
	$portfolio_project_details = preyantechnosys_get_option('portfolio_project_details');
	$pf_details_line           = preyantechnosys_get_option('pf_details_line');

	$return .= '
	<div class="preyantechnosys-pf-detailbox">
		<div class="preyantechnosys-pf-detailbox-inner">
			<ul class="preyantechnosys-pf-detailbox-list">';
	
	$page_values = get_post_meta( get_the_ID(), 'preyantechnosys_portfolio_list_data', true );
	$page_values = $page_values['tm_pf_list_data'];
	
	
	if( isset($pf_details_line) && is_array($pf_details_line) && count($pf_details_line)>0 ){
		foreach( $pf_details_line as $key=>$val ){
			
			$row_title = '';
			$row_value = '';
			
			if( !empty($val['pf_details_line_title']) ){ $row_title = sprintf( esc_attr__('%s ', 'minemo'), $val['pf_details_line_title'] ); }
			if( !empty($page_values['pf_details_line_'.$key]) ){ $row_value = nl2br($page_values['pf_details_line_'.$key]); }
			
			// Dynamic value
			if( !empty($val['data']) ){
				if($val['data']=='date'){
					$row_value = get_the_date();
				} else if($val['data']=='category'){
					$row_value = strip_tags( get_the_term_list( get_the_ID(), 'tm_portfolio_category', '', ', ', '' ) );
				} else if($val['data']=='category_link'){
					$row_value = get_the_term_list( get_the_ID(), 'tm_portfolio_category', '', ', ', '' );
				} else if($val['data']=='tag'){
					$row_value = strip_tags( get_the_term_list( get_the_ID(), 'tm_portfolio_tags', '', ', ', '' ) );
				} else if($val['data']=='tag_link'){
					$row_value = get_the_term_list( get_the_ID(), 'tm_portfolio_tags', '', ', ', '' );
				}
			}
						
			if( !empty($row_value) ){
				$return .= '
						<li class="prt-pf-details-date">
							<span class="prt-pf-left-details">'. $row_title .'</span>
							<span class="prt-pf-right-details">'. $row_value .'</span>
						</li>';
			}
				
		}
	}
		$return .= '<li class="prt-pf-details-date">'.preyantechnosys_social_share_box($post_type='portfolio').'</li>';
		$return .= '<li class="prt-pf-details-date">'.preyantechnosys_box_portfolio_viewproject_btn().'</li>';
	$return .= '
	
			</ul>
		</div><!-- .preyantechnosys-pf-detailbox-inner -->
	</div><!-- .preyantechnosys-pf-detailbox -->
	
	';

	return $return;
}
}

/**
 *  Portfoliobox class : preyantechnosys_portfoliobox_class()
 */
if ( !function_exists( 'preyantechnosys_portfoliobox_class' ) ){
function preyantechnosys_portfoliobox_class(){
	$return = '';
	return $return;
}
}


/**
 *  Servicesbox class : preyantechnosys_servicebox_class()
 */
if ( !function_exists( 'preyantechnosys_servicebox_class' ) ){
function preyantechnosys_servicebox_class(){
	$return = '';
	return $return;
}
}


if ( !function_exists( 'preyantechnosys_portfoliobox_media_link' ) ){
function preyantechnosys_portfoliobox_media_link( $default_icon='prt-minemo-icon-resize-full-alt', $video_icon='prt-minemo-icon-video', $audio_icon='prt-minemo-icon-music-alt', $slider_icon='prt-minemo-icon-gallery-1' ){

	$icon_code='<i class="prt-minemo-icon-resize-full-alt"></i>';
	if( !empty($default_icon) ){
		$icon_code='<i class="' . $default_icon . '"></i>';
	}
	

	// getting single portfolio feature type
	$portfolio_featured = get_post_meta( get_the_ID(), 'preyantechnosys_portfolio_featured' , true );
	
	// default output
	$return = '<a class="tm_prettyphoto" title="' . the_title_attribute( 'echo=0' ) . '" href="' . esc_url(preyantechnosys_portfolio_single_image_path()) . '">' . $icon_code . '</a>';
	
	
	// preparing output
	if( !empty($portfolio_featured['featuredtype']) ){
		
		switch( $portfolio_featured['featuredtype'] ){
			
			case 'slider':
				// icon
				if( !empty($slider_icon) ){
					$icon_code='<i class="' . $slider_icon . '"></i>';
				}
				
				$return = '<a title="' . the_title_attribute('echo=0') . '" class="preyantechnosys-open-gallery" data-id="' . get_the_ID() . '" href="#preyantechnosys-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				
				if( !empty($portfolio_featured['slide_images']) ){
					$slider_images = explode( ',', $portfolio_featured['slide_images'] );
					if( is_array($slider_images) && count($slider_images)>0 ){
						
						$api_images_src   = '';
						$api_images_title = '';
						$api_images_desc  = '';
						
						$x = 1;
						foreach( $slider_images as $slide_image ){
							$comma = ( $x!=1 ) ? ',' : '' ;
							
							$img_src = wp_get_attachment_image_src($slide_image, 'full');
							$img_src = $img_src[0];
							
							$api_images_src   .= $comma . '"' . $img_src . '"';
							$api_images_title .= $comma . '"' . get_the_title() . '"';
							$api_images_desc  .= $comma . '""';
							$x++;
						}
						
						$return .= '<script> "use strict"; ';
							$return .= 'var api_images_' . get_the_ID() . ' = ['.$api_images_src.'];';
							$return .= 'var api_titles_' . get_the_ID() . ' = ['.$api_images_title.'];';
							$return .= 'var api_desc_' . get_the_ID() . ' = ['.$api_images_desc.'];';
						$return .= '</script>';
					}
				}
				
				break;
				
			case 'video':
				
				// icon
				if( !empty($video_icon) ){
					$icon_code='<i class="' . $video_icon . '"></i>';
				}
				
				if( !empty($portfolio_featured['video_code']) ){
					$return = '<a title="' . the_title_attribute('echo=0') . '" class="tm_prettyphoto" href="' . esc_url( $portfolio_featured['video_code'] ) . '">' . $icon_code . '</a>';
				}
				break;
				
			case 'audioembed':
				
				// icon
				if( !empty($audio_icon) ){
					$icon_code='<i class="' . $audio_icon . '"></i>';
				}
				
				$return = '<a title="' . the_title_attribute('echo=0') . '" class="tm_prettyphoto" href="#preyantechnosys-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				if( !empty($portfolio_featured['audio_code']) ){
					$return .= '<div class="prt-hide" id="preyantechnosys-embed-code-' . get_the_ID() . '">' . $portfolio_featured['audio_code'] . '</div>';
				}
				break;			
		}				
	}
	
	return $return;
}
}


if ( !function_exists( 'preyantechnosys_gallerystyle_portfoliobox_media_link' ) ){
function preyantechnosys_gallerystyle_portfoliobox_media_link( $default_icon='prt-minemo-icon-search', $video_icon='prt-minemo-icon-video', $audio_icon='prt-minemo-icon-music-alt', $slider_icon='prt-minemo-icon-gallery-1' ){

	$icon_code='<i class=" prt-minemo-icon-search-2"></i>';
	if( !empty($default_icon) ){
		$icon_code='<i class="' . $default_icon . '"></i>';
	}
	
	// getting single portfolio feature type
	$portfolio_featured = get_post_meta( get_the_ID(), 'preyantechnosys_portfolio_featured' , true );
	
	// default output
	$return = '<a class="tm_prettyphoto" data-gal="prettyPhoto[gal]" title="' . the_title_attribute('echo=0') . '" href="' . esc_url(preyantechnosys_portfolio_single_image_path()) . '">' . $icon_code . '</a>';
	
	
	// preparing output
	if( !empty($portfolio_featured['featuredtype']) ){
		
		switch( $portfolio_featured['featuredtype'] ){
			
			case 'slider':
				// icon
				if( !empty($slider_icon) ){
					$icon_code='<i class="' . $slider_icon . '"></i>';
				}
				
				$return = '<a title="' . the_title_attribute('echo=0') . '" class="preyantechnosys-open-gallery" data-id="' . get_the_ID() . '" href="#preyantechnosys-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				
				if( !empty($portfolio_featured['slide_images']) ){
					$slider_images = explode( ',', $portfolio_featured['slide_images'] );
					if( is_array($slider_images) && count($slider_images)>0 ){
						
						$api_images_src   = '';
						$api_images_title = '';
						$api_images_desc  = '';
						
						$x = 1;
						foreach( $slider_images as $slide_image ){
							$comma = ( $x!=1 ) ? ',' : '' ;
							
							$img_src = wp_get_attachment_image_src($slide_image, 'full');
							$img_src = $img_src[0];
							
							$api_images_src   .= $comma . '"' . $img_src . '"';
							$api_images_title .= $comma . '"' . get_the_title() . '"';
							$api_images_desc  .= $comma . '""';
							$x++;
						}
						
						$return .= '<script> "use strict"; ';
							$return .= 'var api_images_' . get_the_ID() . ' = ['.$api_images_src.'];';
							$return .= 'var api_titles_' . get_the_ID() . ' = ['.$api_images_title.'];';
							$return .= 'var api_desc_' . get_the_ID() . ' = ['.$api_images_desc.'];';
						$return .= '</script>';
						
					}
				}
				
				break;
				
			case 'video':
				
				// icon
				if( !empty($video_icon) ){
					$icon_code='<i class="' . $video_icon . '"></i>';
				}
				
				if( !empty($portfolio_featured['video_code']) ){
					$return = '<a title="' . the_title_attribute('echo=0') . '" class="tm_prettyphoto" href="' . esc_url( $portfolio_featured['video_code'] ) . '">' . $icon_code . '</a>';
				}
				break;
				
			case 'audioembed':
				
				// icon
				if( !empty($audio_icon) ){
					$icon_code='<i class="' . $audio_icon . '"></i>';
				}
				
				$return = '<a title="' . the_title_attribute('echo=0') . '" class="tm_prettyphoto" href="#preyantechnosys-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				if( !empty($portfolio_featured['audio_code']) ){
					$return .= '<div class="prt-hide" id="preyantechnosys-embed-code-' . get_the_ID() . '">' . $portfolio_featured['audio_code'] . '</div>';
				}
				break;
			
		}		
		
	}
	
	return $return;
}
}


if ( !function_exists( 'preyantechnosys_portfoliobox_footer' ) ){
function preyantechnosys_portfoliobox_footer(){
	$return = '';
	return $return;
}
}

if ( !function_exists( 'preyantechnosys_portfoliobox_likes' ) ){
function preyantechnosys_portfoliobox_likes(){
	$return = '';	
	$likes = get_post_meta( get_the_ID(), 'preyantechnosys_likes', true );
	if( !$likes ){ $likes='0'; }
	
	$likeActiveClass = ( isset($_COOKIE["preyantechnosys_likes_".get_the_ID()]) ) ? 'like-active' : '' ;
	$likeIconClass   = ( isset($_COOKIE["preyantechnosys_likes_".get_the_ID()]) ) ? 'tmicon-fa-heart' : 'tmicon-fa-heart-o' ;
	
		$like = '<div class="preyantechnosys-portfolio-likes-wrapper">
					<a class="preyantechnosys-portfolio-likes ' . $likeActiveClass . '" href="#" id="pid-' . get_the_ID() . '">
						<i class="'.$likeIconClass.'"></i>&nbsp;' . $likes . '
					</a>
				</div>';
				
	if( isset($howes['portfolio_show_like']) && trim($howes['portfolio_show_like'])=='0' ){
		$like = '';
	}
	$return.=$like;
	return $return;
}
}


if ( !function_exists( 'preyantechnosys_get_meta' ) ){
function preyantechnosys_get_meta( $meta_group='', $meta_id='' , $meta_sub_id='' ){
 $return = '';
 
 $meta_group_value = get_post_meta( get_the_ID(), $meta_group, true );
 
 if( !empty( $meta_sub_id ) ){
  if( !empty( $meta_group_value[$meta_id][$meta_sub_id] ) ){
   $return = $meta_group_value[$meta_id][$meta_sub_id];
  }
 } else if( !empty($meta_group_value[$meta_id]) ){
  $return = $meta_group_value[$meta_id];
 }
 
 // return data
 return $return;
 
}
}

/**
 *  Portfolio Gallery
 */
if( !function_exists('preyantechnosys_featured_gallery_slider') ){
function preyantechnosys_featured_gallery_slider(){
	$return = '';
	return $return;
}
}

/**
 *  Social share box
 */
if ( !function_exists( 'preyantechnosys_social_share_box' ) ){
function preyantechnosys_social_share_box($post_type='portfolio'){
	
	$return       = '';
	$social_links = '';
	$button_html  = '';

	${ $post_type.'_social_share_title' } = preyantechnosys_get_option( $post_type.'_social_share_title' );
	
	if( function_exists('preyantechnosys_minemo_cs_framework_init') ){	
		// preparing social links
		switch($post_type){
			case 'portfolio':
				if( preyantechnosys_get_option('portfolio_show_social_share')==true ){
					$social_links = preyantechnosys_social_share_links('portfolio');
				}
				break;
			case 'post':
				$social_links = preyantechnosys_social_share_links('post');
				break;
		}
	}
	

	// preparing output according to CPT
	if( !empty($social_links) ){
		
		$return = '<div class="prt-social-share-wrapper prt-social-share-' . $post_type . '-wrapper">';
		
		// social share title
		if( !empty( ${ $post_type.'_social_share_title' } ) ){
			$return .= '<div class="prt-social-share-title">'. ${ $post_type.'_social_share_title' } .'</div>';
		}
		
		// social links
		$return .= $social_links;
		
		// button after this
		$return .= $button_html;
		
		$return .= '</div>';
		$return .= '<div class="clearfix"></div>';

	}
	
	return $return;
}
}


/**
 *  Post thumbnail. This will echo post thumbnail according to port format like video, audio etc.
 */
if ( !function_exists( 'preyantechnosys_portfolio_featured_media' ) ){
function preyantechnosys_portfolio_featured_media( $post_id='', $size='full' ){
	
	$return = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	// get post meta
	$post_meta = get_post_meta( $post_id, 'preyantechnosys_portfolio_featured', true );
	
	
	if( !empty($post_meta['featuredtype']) ){
		
		switch($post_meta['featuredtype']){
			case 'image':
				$return .= preyantechnosys_get_featured_media();
			
		}
		
	}		
}
}


/**
 *  Porfolio description content
 */
if ( !function_exists( 'preyantechnosys_portfolio_description' ) ){
function preyantechnosys_portfolio_description( $post_id='' ){
	$return = '';
	
	$portfolio_project_details = preyantechnosys_get_option('portfolio_project_details');
	
	// Box title
	$box_title = '';
	if( !empty($portfolio_project_details) ){
		$box_title = esc_attr( $portfolio_project_details );
	}
	if( !empty($box_title) ){
		$box_title = '<h2 class="preyantechnosys-pf-detailbox-title">'.$box_title.'</h2>';
	}
	
	// processing content
	$content = get_the_content( null, false );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	// preparing final output
	$return = '<div class="prt-portfolio-description">'. '' . $content . '</div><!-- .prt-portfolio-description -->';
	
	return $return;
}
}

/**
 *  Porfolio description title
 */
if ( !function_exists( 'preyantechnosys_portfolio_description_title' ) ){
function preyantechnosys_portfolio_description_title( $post_id='' ){
	$return = '';
	
	$portfolio_project_details = preyantechnosys_get_option('portfolio_project_details');
	
	// Box title
	$box_title = '';
	if( !empty($portfolio_project_details) ){
		$box_title = esc_attr( $portfolio_project_details );
	}
	if( !empty($box_title) ){
		$box_title = '<h2 class="preyantechnosys-pf-detailbox-title">'.$box_title.'</h2>';
	}
	
	// preparing final output
	$return = '<div class="prt-portfolio-title">' . $box_title . '</div><!-- .prt-portfolio-title -->';
	
	return $return;
}
}

/**
 *  Porfolio description cta
 */
if ( !function_exists( 'preyantechnosys_portfolio_description_cta' ) ){
function preyantechnosys_portfolio_description_cta( $post_id='' ){
	$return = '';
	$related_workdesc_cta 	  = preyantechnosys_get_option('related_workdesc_cta');
	$related_workdesc_cta = ( !empty($related_workdesc_cta) ) ? '<div class="prt-related-ctabox-inner">' . $related_workdesc_cta . '</div>' : '' ;

	// preparing final output
	$return = '<div class="prt-related-ctabox">' .do_shortcode( $related_workdesc_cta ). '</div>';
	
	return $return;
}
}


/**
 *  View project button portfolio
*/

if( !function_exists('preyantechnosys_box_portfolio_viewproject_btn') ){
function preyantechnosys_box_portfolio_viewproject_btn(){
	$return = '';
	$btn_text = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$meta_data = get_post_meta( $post_id, 'preyantechnosys_portfolio_list_data', true );

	if( !empty($meta_data['project_details_line_btn_text']) ){	
		$btn_text = $meta_data['project_details_line_btn_text'];
	}
		
	if( !empty($btn_text) ){
		$return .= '
			<div class="prt-cta3-content-wrapper">'. esc_attr($btn_text) .'</div>';
	}
	return $return;
}
}

/**
 *  Related Portfolio
 */
if ( !function_exists( 'preyantechnosys_portfolio_related' ) ){
function preyantechnosys_portfolio_related(){
	$portfolio_show_related   = preyantechnosys_get_option('portfolio_show_related');
	$portfolio_related_column = preyantechnosys_get_option('portfolio_related_column');
	$portfolio_related_show   = preyantechnosys_get_option('portfolio_related_show');
	$portfolio_related_view   = preyantechnosys_get_option('portfolio_related_view');
	$portfolio_related_title  = preyantechnosys_get_option('portfolio_related_title');
	$related_workdesc_text 	  = preyantechnosys_get_option('related_workdesc_text');
	
	$return   = '';
	
	if( $portfolio_show_related===true ){
		
		// Tempoary delcated this variables.. please correct it
		$column        = ( !empty($portfolio_related_column) ) ? $portfolio_related_column : 'four' ;
		$show          = ( !empty($portfolio_related_show) ) ? $portfolio_related_show : '4' ;
		$cpt           = 'portfolio'; 
		$view          = ( !empty($portfolio_related_view) ) ? $portfolio_related_view : 'overlay' ;
		$related_title = ( !empty($portfolio_related_title) ) ? '<h3 class="prt-pf-single-related-title">' . $portfolio_related_title . '</h3>' : '' ;
		$related_workdesc_text = ( !empty($related_workdesc_text) ) ? '<div class="prt-related-shortdesc">' . $related_workdesc_text . '</div>' : '' ;
		
		$catid      = wp_get_post_terms( get_the_ID() , 'tm_portfolio_category', array("fields" => "ids"));
		$thisPostID = array(get_the_ID());
		
		// Title
		$args = array(
			'post__not_in' => $thisPostID,
			'post_type'    => 'tm_portfolio',
			'showposts'    => $show,
			'tax_query'    => array(
				array(
					'taxonomy' => 'tm_portfolio_category',
					'field'    => 'id',
					'terms'    => $catid,
				)
			),
			'orderby' => 'rand',
		);
		
		global $posts;
		$original_posts = $posts;
		
		$posts = new WP_Query( $args );
		
		
		if ( $posts->have_posts() ) {
			$return .= '<div class="prt-pf-single-related-wrapper">
				' . $related_title . '
				' .do_shortcode( $related_workdesc_text ). '
				' . preyantechnosys_get_boxes( 'portfolio', get_defined_vars() ) . '
			</div>';
		}
		
		$posts = $original_posts;
		
		// Restore original Post Data
		wp_reset_postdata();
		
		$posts = $original_posts;
		
	}
	
	return $return;
}
}


/**
 *  Porfolio description content
 */
if ( !function_exists( 'preyantechnosys_service_description' ) ){
function preyantechnosys_service_description( $post_id='' ){
	$return = '';
	
	// processing content
	$content = get_the_content( null, false );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	// preparing final output
	$return = '<div class="prt-service-description">' . $content . '</div><!-- .prt-service-description -->';
	
	return $return;
}
}


/**
 *  Blog only - Extra class to each classic view of post
 */
if ( !function_exists( 'preyantechnosys_post_class' ) ){
function preyantechnosys_post_class( $class_list='' ){
	$return = '';
	$classes = array();
	
	// If no featured content found
	if( preyantechnosys_get_featured_media()=='' ){
		$classes[] = 'prt-no-featured-content';
	}
	
	// creating string from array
	if( !empty($classes) && count($classes)>0 ){
		$return = implode( ' ', $classes );
	}
	
	return $return;
}
}

/**
 *  Blog Classic - Extra layout class to each classic view of post
 */
if ( !function_exists( 'preyantechnosys_postlayout_class' ) ){
function preyantechnosys_postlayout_class(){
	$return = '';
	$classes = array();
	
	// If no featured content found
	if( preyantechnosys_get_featured_media()=='' ){
		$classes[] = 'prt-no-featured-content';
	}
	
	if(preyantechnosys_get_option('blog_view') == 'classic' || preyantechnosys_get_option('blog_view') == 'box' ) {
		$classes[] = 'preyantechnosys-box-blog-classic';
	}
	else if(preyantechnosys_get_option('blog_view') == 'classic-style2') {
		$classes[] = 'preyantechnosys-box-blog-style2';
	}
	else if(preyantechnosys_get_option('blog_view') == 'classic-style3') {
		$classes[] = 'preyantechnosys-box-blog-style3';
	}
	else {
		$classes[] = '';
	}
	// creating string from array
	if( !empty($classes) && count($classes)>0 ){
		$return = implode( ' ', $classes );
	}
	
	// merging class that passed in this function
	if( !empty($class_list) ){
		$return = $class_list . ' ' . $return;
	}
		
	return $return;
}
}

if ( !function_exists( 'preyantechnosys_get_post_format_icon' ) ){
function preyantechnosys_get_post_format_icon( $post_id='' ){
	$return = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$post_type   = get_post_type($post_id);
	$post_format = get_post_format( $post_id );
	
	$valid_post_formats_icon = array(
		'aside'		=> 'aside',
		'gallery' 	=> 'gallery-1',
		'link' 		=> 'link',
		'image' 	=> 'image',
		'quote' 	=> 'quote-left',
		'status' 	=> 'status',
		'video' 	=> 'video',
		'audio'	 	=> 'music-alt',
		'chat' 		=> 'chat',
	);
	
	if( $post_type=='post' ){
	
		$icon_class = 'pencil';
		
		if( $post_format != false && array_key_exists( $post_format, $valid_post_formats_icon ) ){
			$icon_class = $valid_post_formats_icon[$post_format];
		}
		
		$return = '<i class="prt-minemo-icon-' . $icon_class . '"></i>';
	
	}
	
	if( !empty($return) ){
		$return = '<div class="tm_classic_post_icon"><div class="prt-post-format-icon-wrapper">' . $return . '</div></div>';
	}
	
	return $return;
	
}
}


/**
 * Getting featured media like image, gallery, video, audio etc
 */
if ( !function_exists( 'preyantechnosys_get_featured_media' ) ){
function preyantechnosys_get_featured_media( $post_id='', $size='full', $imgonly=false ){
	
	$return        = '';
	$class         = 'prt-' . sanitize_html_class( get_post_type() ) . '-featured-wrapper';
	$featured_type = 'image';
	$video_code    = '';
	$audio_code    = '';
	$slide_images  = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	
	if( !empty($post_id) ){
		
		// Getting post type
		$post_type = get_post_type($post_id);
		
		
		// If blog post
		if( $post_type=='post' ){
			$featured_type = get_post_format( $post_id );
			$video_code    = trim( get_post_meta( $post_id, '_format_video_embed', true) );
			$audio_code    = trim( get_post_meta( $post_id, '_format_audio_embed', true) );
			$slide_images  =  get_post_meta( $post_id, '_preyantechnosys_metabox_gallery', true) ;
			$slide_images  = ( !empty($slide_images['gallery_images']) ) ? $slide_images['gallery_images'] : '' ;
			$class        .= ' prt-post-format-' . get_post_format();
		}
		
		
		// If portfolio
		if( $post_type=='tm_portfolio' ){
			
			// get post meta
			$post_meta  = get_post_meta( $post_id, 'preyantechnosys_portfolio_featured', true );
			
			$video_code   = ( !empty($post_meta['video_code']) ) ? trim($post_meta['video_code']) : '' ;
			$audio_code   = ( !empty($post_meta['audio_code']) ) ? trim($post_meta['audio_code']) : '' ;
			$slide_images = ( !empty($post_meta['slide_images']) ) ? trim($post_meta['slide_images']) : '' ;
			
			// getting featured type
			if( !empty($post_meta['featuredtype']) ){
				$featured_type = $post_meta['featuredtype'];
			}
			
		}
		
		// If imageonly than return only featured image
		if( $imgonly==true ){
			$featured_type = 'image';
		}
				
		// The related posts (1st post) was giving notice level error like this:
		// Trying to get property of non-object in post-thumbnail-template.php on line 83
		// So we are calling this
		ob_start();
		get_the_post_thumbnail( $post_id, $size );
		ob_end_clean();
		
		// Now preparing the output
		switch( $featured_type ){
			case 'image':
			default:
				if ( has_post_thumbnail() ) {					
					$return1  = get_the_post_thumbnail( $post_id, $size );
					$postlink = get_the_permalink();
					
					if(!is_single()) {
						$return .= '<a href="'.esc_url($postlink).'">'.$return1.'</a>';
					} else {
						$return .=$return1;
					}
				
				}
				break;
			
			case 'video':
				if( $video_code!='' ){
					$return .= preyantechnosys_oembed_get($video_code);
					$class .= ' prt-post-format-video';
				}
				break;
				
			case 'audio':
			case 'audioembed':
				if( $audio_code!='' ){
					$return .= preyantechnosys_oembed_get($audio_code);
					if( strtolower(substr($audio_code, -4)) == ".mp3" ){
						$class .= ' prt-post-format-audio-mp3';
					}
				}
				break;
				
			case 'gallery':
			case 'slider':
				$return .= preyantechnosys_create_slider($slide_images, $size);
				break;
				
			case 'quote':
				$return .= preyantechnosys_featured_quote();
				break;
				
			case 'link':
				$return .= preyantechnosys_featured_link();
				break;
		}

	}
	
	// Adding wrapper
	if( !empty($return) ){
		$return = '<div class="prt-featured-wrapper ' . $class . '">' . $return . '</div>';
	}

	return $return;
	
}
}

/**
 *  Post Format - Link
 */
if ( !function_exists( 'preyantechnosys_featured_link' ) ){
function preyantechnosys_featured_link($code=''){
	
	$return = '';
	
	if( get_post_format() == 'link' ){
		
		$inline_style = '';
		if( has_post_thumbnail() ){
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$inline_style = 'style="background-image:url(\'' . get_the_post_thumbnail_url( get_the_ID(), 'full') . '\');"';
			}
		}
		
		// preparing content
		$content  = '';
		$link_url = get_post_meta( get_the_ID(), '_format_link_url', true );
		if( !empty($link_url) ){
			$content .= '<h3 class="prt-format-link-title"><a href="' . esc_url($link_url) . '">' . get_the_title() . '</a></h3>';
			$content .= '<span class="prt-format-link-url"><a href="' . esc_url($link_url) . '">' . esc_url($link_url) . '</a></span>';
		} else {
			$content .= '<h3 class="prt-format-link-title">' . get_the_title() . '</h3>';
		}
		
		// Final output
		$return = '
			<div class="prt-post-featured-link-wrapper" ' . $inline_style . '>
				<div class="prt-post-featured-link">
					' . $content . '
				</div>
			</div>
			';		
	}
	
	return $return;
	
}
}


/**
 *  Post Format - Quote
 */
if ( !function_exists( 'preyantechnosys_featured_quote' ) ){
function preyantechnosys_featured_quote($code=''){
	
	$return = '';
	
	if( get_post_format() == 'quote' ){
		
		$inline_style = '';
		if( has_post_thumbnail() ){
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$inline_style = 'style="background-image:url(\'' . get_the_post_thumbnail_url( get_the_ID(), 'full') . '\');"';
			}
		}
		
		// Quote Source Name
		$source_name    = get_post_meta( get_the_ID(), '_format_quote_source_name', true );
		$source_url     = get_post_meta( get_the_ID(), '_format_quote_source_url', true );
		$link_start     = '';
		$link_end       = '';
		$source_content = '';
		if( !empty($source_url) ){
			$link_start = '<a href="' . $source_url . '">';
			$link_end   = '</a>';
		}
		if( !empty($source_name) ){
			$source_content = '<cite>' . $link_start . $source_name . $link_end . '</cite>';
		}
		
		// Content
		$get_the_content = get_the_content();
		$content         = $get_the_content;
		if ( strpos( $get_the_content, '<blockquote>' ) === false) {
			$content = '<blockquote>' . $source_content . '</blockquote>';
		}
		
		// Final output
		$return = '<div class="prt-post-featured-quote" ' . $inline_style . '>' . $content . '</div>';
		
	}
	
	return $return;
	
}
}

if ( !function_exists( 'preyantechnosys_oembed_get' ) ){
function preyantechnosys_oembed_get($code=''){
	$return = '';
	$code   = trim($code); // Removing extra white space
	
	if( !empty($code) ){
		
		if( substr($code, -4) != ".mp3" && substr($code, 0, 4) == "http" ){
			$return = wp_oembed_get($code);
			if( $return==false ){  // 1st retry
				$return = wp_oembed_get($code);
			}
			if( $return==false ){  // 2nd retry
				$return = wp_oembed_get($code);
			}
			if( $return==false ){ // 3rd retry
				$return = wp_oembed_get($code);
			}

		} else if( substr($code, -4) == ".mp3" ){  // MP3 file
			$return = '<div class="prt-blogbox-audio-mp3player-w">'.do_shortcode( '[audio src="'.$code.'"]' ).'</div>';
			
		} else {  // MP3 file
			$return = '<div class="prt-blogbox-audio-mp3player-w">' . $code . '</div>';
			
		}
	}
	
	return $return;
	
}
}

if ( !function_exists( 'preyantechnosys_create_slider' ) ){
function preyantechnosys_create_slider($images='', $size='full'){
	$return = '';
	
	if( !empty($images) ){
		$images_array = explode(',', $images);
		if( count($images_array)>0 ){
			foreach( $images_array as $image_id ){
				$thumb = wp_get_attachment_image_src( $image_id, 'medium' );
				$thumb = $thumb[0];
				if( is_numeric($image_id) ){
					$return .= '<li>' . wp_get_attachment_image( $image_id, $size ) . '</li>';
				}
			}
		}
	}
	
	// preparing final output as flex slider
	if( !empty($return) ){
		$return = '<div class="prt-slick-carousel-wrapper"><div class="prt-flexslider"><ul class="slides">' . $return . '</ul></div></div>';
	}
	
	return $return;
	
}
}


/* =============================================================== */
/* ---------------------- Blog functions  ------------------------ */


/**
 * get Boxes for CPT
 */
if( !function_exists('preyantechnosys_get_boxes') ){
function preyantechnosys_get_boxes( $cpt='blog', $vars=array() ){
	
	
	$return            = '';
	$sortable_category = array();
	$posts    = (!empty($vars['posts']))   ? $vars['posts'] : '' ;
	$column   = (!empty($vars['column']))  ? $vars['column'] : 'three' ;
	$template = (!empty($vars['view']))    ? $vars['view'] : 'top-image' ;
	$allword  = (!empty($vars['allword'])) ? $vars['allword'] : esc_attr__('All', 'minemo');
	$boxview  = (!empty($vars['boxview'])) ? $vars['boxview'] : '';
	$show_tooltip		= (!empty($vars['show_tooltip'])) ? $vars['show_tooltip'] : 'yes' ;
	$add_link			= (!empty($vars['add_link']))     ? $vars['add_link'] : 'yes' ;
	
	if( empty($posts) ){
		global $posts;
	}
		
	if( !empty($boxview) && $boxview == 'slickview' && $cpt == 'testimonial' ){
		
		$template 			= 'slickview';
		$column				= 'one';
		$startwrapper 		= preyantechnosys_column_div('start', $column ).'<div class="testimonial_wrapper">';
		$closewrapper 		= '</div>'.preyantechnosys_column_div('end', $column );
		$infowrapper		= '<div class="testimonials-nav">';
		$infowrapperend 	= '</div>';
		$footerwrapper		= '<div class="testimonials-info">';
		$footerwrapperend   = '</div>';
		$content            = '';
		$footer             = '';
		

		while ( $posts->have_posts() ) {
			$posts->the_post();
			
			//content
			ob_start();
			get_template_part('template-parts/'. $cpt .'box/'. $cpt .'box', $template . '-top' );
			$content .= ob_get_contents();
			ob_end_clean();
			
			// image and title
			ob_start();
			get_template_part('template-parts/'. $cpt .'box/'. $cpt .'box', $template . '-bottom' );
			$footer .= ob_get_contents();
			ob_end_clean();
			
		}
		
		$return =	$startwrapper.
						$footerwrapper.
							$footer.
						$footerwrapperend.
						$infowrapper.
							$content.
						$infowrapperend.
					$closewrapper;
		

	} else {
		
		$x = 1;
		while ( $posts->have_posts() ) {
			$posts->the_post();
			
			// Portfolio box sortable category links
			if( !empty($vars['sortable']) && $vars['sortable']=='yes' ){
				$post_terms = wp_get_post_terms( get_the_ID(), preyantechnosys_get_taxonomy_from_cpt() );
				foreach( $post_terms as $term ){
					$sortable_category[ $term->name ] = $term->slug;
				}
			}
			
			
			
			// Client Logos
			$client_wrap_start = '';
			$client_wrap_end   = '';
			if( $cpt == 'client' ){
				$client_wrap_start .= '<div class="prt-client-logo-box-w">';
				$client_wrap_end    = '</div><!-- .prt-client-logo-box-w --> ' . $client_wrap_end;
					
				if( $show_tooltip == 'yes' ){
					$client_wrap_start .= '<div class="prt-client-logo-tooltip" data-tooltip="' . get_the_title() . '">';
					$client_wrap_end    = '</div>' . $client_wrap_end;
				}
				if( $add_link == 'yes' && preyantechnosys_client_single_link()!='' ){
					$client_wrap_start .= '<a class="prt-client-logo-link" href="' . preyantechnosys_client_single_link() . '">';
					$client_wrap_end    = '</a>' . $client_wrap_end;
				}
			}
			
			// global variable to count current, for image size and other use
			global $tm_global_sc_loop_count;
			$tm_global_sc_loop_count = $x;
			
			ob_start();
			get_template_part('template-parts/'. $cpt .'box/'. $cpt .'box', $template);
			$boxes = ob_get_contents();
			ob_end_clean();
			
			$return .= preyantechnosys_column_div('start', $column );
				$return .= $client_wrap_start;
					$return .= $boxes;
				$return .= $client_wrap_end;
			$return .= preyantechnosys_column_div('end', $column );
			
			$x++;
			
		} // while
		
	}	
		
	//}
	

	if( !empty($return) ){
		
		// Sortable
		$sortable_category_html = '';
		if( !empty($sortable_category) && is_array($sortable_category) && count($sortable_category)>0 ){
			$sortable_category_html .= '<li class="prt-sortable-link prt-sortable-all-link"><a class="selected" href="javascript:void(0);" data-filter="*"> ' . $allword . ' </a></li>';
			foreach($sortable_category as $key=>$val){
				$sortable_category_html .= '<li class="prt-sortable-link"><a href="javascript:void(0);" data-filter=".' . $val . '">' . $key . '</a></li>';
			}
			$sortable_category_html = '<div class="prt-sortable-wrapper prt-sortable-wrapper-' . $cpt . '"><nav class="prt-sortable-list"><ul>' . $sortable_category_html . '</ul></nav></nav></div>';
		}

		if( $cpt == 'portfolio' ||  $cpt == 'team' ){
			$return = '
				' . $sortable_category_html . '
				<div class="row multi-columns-row preyantechnosys-boxes-row-wrapper prt-box-masnory">
					'.$return.'
				</div>
			';
		} else {
			// Boxes
			$return = '
				' . $sortable_category_html . '
				<div class="row multi-columns-row preyantechnosys-boxes-row-wrapper">
					'.$return.'
				</div>
			';
		}	
		// Pagination
		if( isset($vars['pagination']) && $vars['pagination']=='yes' && $vars['boxview']!='carousel' ){
			$return .= preyantechnosys_pagination( $posts );
		}
		
		return $return;
	}
	return '';
	
}
}


/**
 *  ThemetechMount Box class function
 */
if( !function_exists('preyantechnosys_box_class') ){
function preyantechnosys_box_class( $extra_class='' ){
	$return = '';
	
	// getting taxonomy
	$taxonomy = preyantechnosys_get_taxonomy_from_cpt();
	
	// getting term list for current taxonomy
	$terms = wp_get_post_terms( get_the_ID(), $taxonomy ); // Get all terms of a taxonomy
	
	if( is_array($terms) && count($terms)>0 ){
		foreach( $terms as $term ){
			$return .= $term->slug . ' ';
		}
	}
	
	// removing extra space
	$return = trim($return);
	
	// extra class
	if( !empty($extra_class) ){
		$return .= ' ' . preyantechnosys_sanitize_html_classes($extra_class);
	}
	
	return trim($return);
	
	
}
}


/**
 *  ThemetechMount Box class function
 */
if( !function_exists('preyantechnosys_get_taxonomy_from_cpt') ){
function preyantechnosys_get_taxonomy_from_cpt(){
	$return = 'category';
	
	if( get_post_type() == 'tm_portfolio' ){
		$return = 'tm_portfolio_category';
	} else if( get_post_type() == 'tm_team_member' ){
		$return = 'tm_team_group';
	} else if( get_post_type() == 'tm_testimonial' ){
		$return = 'tm_testimonial_group';
	} else if( get_post_type() == 'tm_service' ){
		$return = 'tm_service_category';
	}
	
	return $return;
}
}


/**
 *  Global function - This will return array of Portfolio templates
 */
if( !function_exists('preyantechnosys_global_portfolio_template_list') ){
function preyantechnosys_global_portfolio_template_list( $for_vc=false ){
	$return = array(	
			array(
				'label'	=> esc_attr__('Style 1','minemo'),
				'value'	=> 'style1',
				'thumb'	=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
			),
	);	
	if( $for_vc==true ){ // for vc
		$return = $return;
	}
	return $return;
}
}


/**
 *  Global function - This will return array of Portfolio templates
 */
if( !function_exists('preyantechnosys_global_service_template_list') ){
function preyantechnosys_global_service_template_list( ){
	$return = array(	
				array(
					'label'	=> esc_attr__('Service Box - Style 1','minemo'),
					'value'	=> 'styleone',
					'thumb'	=> get_template_directory_uri() . '/inc/images/service-view-style1.png',
				),
				
	);
	
	
	return $return;
}
}


/**
 *  Global function - This will return array of Iconbox templates
 */
if( !function_exists('preyantechnosys_global_iconbox_template_list') ){
function preyantechnosys_global_iconbox_template_list( $for_vc=false ){
	$return = array(	
				array(
					'label'	=> esc_attr__('Iconbox Box - Style 1','minemo'),
					'value'	=> 'styleone',
					'thumb'	=> get_template_directory_uri() . '/inc/images/iconbox-style1.png',
				),
				
	);
	
	if( $for_vc==true ){ // for vc
		$return = $return;
	}
	return $return;
}
}


/**
 *  Global function - This will return array of Blogbox templates
 */
if( !function_exists('preyantechnosys_global_blog_template_list') ){
function preyantechnosys_global_blog_template_list( $for_vc=false ){
	$return = array(	
				array(
					'label'	=> esc_attr__('Top image and bottom content (default)','minemo'),
					'value'	=> 'style1',
					'thumb'	=> get_template_directory_uri() . '/inc/images/blogbox-style-one.png',
				),
				array(
					'label'	=> esc_attr__('Style 2','minemo'),
					'value'	=> 'style2',
					'thumb'	=> get_template_directory_uri() . '/inc/images/blogbox-style2.png',
				),
				array(
					'label'	=> esc_attr__('Style 3','minemo'),
					'value'	=> 'style3',
					'thumb'	=> get_template_directory_uri() . '/inc/images/blogbox-style3.png',
				),
				array(
					'label'	=> esc_attr__('Left image and right content','minemo'),
					'value'	=> 'left-image',
					'thumb'	=> get_template_directory_uri() . '/inc/images/blogbox-style-two.png',
				),
	);
		
	if( $for_vc==true ){ // for vc
		$return = $return;
	}
	
	return $return;
}
}


/**
 *  Global function - This will return array of Team Member templates
 */
if( !function_exists('preyantechnosys_global_team_member_template_list') ){
function preyantechnosys_global_team_member_template_list( $for_vc=false ){
	$return = array(	
				array(
					'label'	=> esc_attr__('Style 1','minemo'),
					'value'	=> 'style1',
					'thumb'	=> get_template_directory_uri() . '/inc/images/teambox-style1.png',
				),
	);
	
	if( $for_vc==true ){ // for vc
		$return = $return;
	}
	
	return $return;
}
}

/**
 *  Global function - This will return array of Client templates
 */
if( !function_exists('preyantechnosys_global_testimonial_template_list') ){
function preyantechnosys_global_testimonial_template_list( $for_vc=false ){
		$return = array(	
				array(
					'label'	=> esc_attr__('Testimonial Style 1','minemo'),
					'value'	=> 'style-1',
					'thumb'	=> get_template_directory_uri() . '/inc/images/testimonial-style1.png',
				),
				
	);	
	if( $for_vc==true ){ // for vc
		$return = $return;
	}
	return $return;
}
}


/**
 *  Global function - This will return array of Client templates
 */
if( !function_exists('preyantechnosys_global_client_template_list') ){
function preyantechnosys_global_client_template_list( $for_vc=false ){
	$return = array(	
		array(
			'label'	=> esc_attr__('Simple Logo view','minemo'),
			'value'	=> 'simple-logo',
			'thumb'	=> get_template_directory_uri() . '/inc/images/clientbox-style1.png',
		),
		array(
			'label'	=> esc_attr__('Logo with Separator view','minemo'),
			'value'	=> 'separator-logo',
			'thumb'	=> get_template_directory_uri() . '/inc/images/clientbox-style2.png',
		),
		array(
			'label'	=> esc_attr__('Boxed view','minemo'),
			'value'	=> 'boxed-logo',
			'thumb'	=> get_template_directory_uri() . '/inc/images/clientbox-style3.png',
		),
	);	
	if( $for_vc==true ){ // for vc
		$return = $return;
	}	
	return $return;
}
}


/**
 *  Client Logos - Link for single client logo
 */
if( !function_exists('preyantechnosys_client_single_link') ){
function preyantechnosys_client_single_link( $for_vc=false ){
	$return = '';
	if( get_the_ID() ){
		$post_meta = get_post_meta( get_the_ID(), 'preyantechnosys_clients_details' , true );
		if( !empty($post_meta['clienturl']) ){
			$return = $post_meta['clienturl'];
		}
	}
	return $return;
}
}


if( !function_exists('preyantechnosys_column_div') ){
function preyantechnosys_column_div($type='start', $column='three' ){
	
	$return   = '';
	$boxClass = 'prt-box-col-wrapper ';
	
	switch($column){
		case 'one':
			$boxClass .= 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
			break;
		case 'two':
			$boxClass .= 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
		default:
			$boxClass .= 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
			break;
		case 'four':
			$boxClass .= 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'five':
			$boxClass .= 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass .= 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'seven':
			$boxClass .= 'col-lg-1 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'eight':
			$boxClass .= 'col-lg-1 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'mix':
			$boxClass .= 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'fix':
			$boxClass .= 'blog-slider-box-width';
			break;
		case 'timeline':
			$boxClass .= 'prt-blogbox-timeline';
			break;
	}
	
	// adding term based class for Isotope sorting
	$boxClass .= ' '.preyantechnosys_box_class();
	
	
	if( $type == 'start' ){
		$return .= '<div class="'. $boxClass .'">';
	} else {
		$return .= '</div>';
	}
	
	
	return $return;
	
}
}


/**
 * Print HTML with title of the post.
 *
 * Create your own preyantechnosys_box_title() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_box_title' ) ){
function preyantechnosys_box_title() {
	$return = '';
	
	if( 'link' != get_post_format() && 'quote' != get_post_format() ){
		$return = '<div class="preyantechnosys-box-title"><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4></div>';
	}
	
	
	return $return;
}
}

/**
 * Print blog description for blogbox shortcode
 *
 * Create your own preyantechnosys_blogbox_description() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_blogbox_description' ) ){
function preyantechnosys_blogbox_description($limit=''){
	
	$blog_text_limit = preyantechnosys_get_option('blogbox_text_limit');
	$return = '';
	
	// Short Description
	if( has_excerpt() ){
		$return  = nl2br( get_the_excerpt() );
		$return  = do_shortcode($return);
	} else if( $blog_text_limit>0 && $limit!='full' ){
		$return  = nl2br( preyantechnosys_get_short_desc('box') );
	} else {
		global $more;
		$more = 0;
		$return = strip_shortcodes( nl2br(get_the_content( '' )) );
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
	
}
}

/**
 * Print blog description for blog classic
 *
 * Create your own preyantechnosys_blog_description() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_blog_description' ) ){
function preyantechnosys_blog_description($limit=''){
	
	$blog_text_limit = preyantechnosys_get_option('blog_text_limit');
	$return = '';
	
	// Short Description
	if( has_excerpt() ){
		$return  = nl2br( get_the_excerpt() );
		$return  = do_shortcode($return);
	} else if( $blog_text_limit>0 && $limit!='full' ){
		$return  = nl2br( preyantechnosys_get_short_desc() );
	} else {
		global $more;
		$more = 0;
		$return = strip_shortcodes( nl2br(get_the_content( '' )) );
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
	
}
}


/**
 * Print blog readmore text for blogbox shortcode
 *
 * Create your own preyantechnosys_blogbox_readmore_text() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_blogbox_readmore_text' ) ){
function preyantechnosys_blogbox_readmore_text(){
	$blog_readmore_text = preyantechnosys_get_option('blog_readmore_text');
	$return             = esc_attr__('Read More', 'minemo');
	
	// Get text from Theme Options
	if( !empty($blog_readmore_text) ){
		$return = esc_attr($blog_readmore_text);
	}
	
	return $return;
}
}

/**
 * Print service more details text for servicebox shortcode
 *
 * Create your own preyantechnosys_servicebox_readmore_text() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_servicebox_readmore_text' ) ){
function preyantechnosys_servicebox_readmore_text(){
	$service_readmore_text = preyantechnosys_get_option('service_readmore_text');
	$return             = esc_attr__('More Details', 'minemo');
	
	// Get text from Theme Options
	if( !empty($service_readmore_text) ){
		$return = '<a href="'.get_permalink().'">'.$service_readmore_text.'</a>';
	}
	
	return $return;
}
}

/**
 * Print Read More link
 *
 * Create your own preyantechnosys_blogbox_readmore() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_blogbox_readmore' ) ){
function preyantechnosys_blogbox_readmore(){
	
	$return        = '';
	$readMore_text = preyantechnosys_blogbox_readmore_text();  // Read More word
	
	if( strpos(get_the_content(), '"more-link"')!==false && get_post_format()!='quote' && get_post_format()!='link' ) {
		$return .= '<div class="preyantechnosys-blogbox-footer-left preyantechnosys-wrap-cell">';
		$return .= '<a href="'.get_permalink().'">'.$readMore_text.'</a>';
		$return .= '</div>';
	}
	
	return $return;
	
}
}




if ( !function_exists( 'preyantechnosys_get_short_desc' ) ){
function preyantechnosys_get_short_desc( $for='' ){
	$blog_text_limit = ($for=='box') ? preyantechnosys_get_option('blogbox_text_limit') : preyantechnosys_get_option('blog_text_limit') ; 
	
	$content = '';
	if( $blog_text_limit>0 ){
		$content = get_the_content('',FALSE,'');
		$content = wp_strip_all_tags($content);
		$content = strip_shortcodes($content);
		$content = str_replace(']]>', ']]>', $content);
		$content = substr($content,0, $blog_text_limit );
		$content = trim(preg_replace( '/\s+/', ' ', $content));
		$content = $content.'...';
	}
	return $content;
}
}


/*
 *  TM Services Icon
 */
 
if ( !function_exists( 'preyantechnosys_servicebox_icon' ) ){
function preyantechnosys_servicebox_icon( $post_id='' ){
	$return = '';
	$box_icon = get_post_meta( get_the_ID(), 'preyantechnosys_tmservice_icon', true);
				
	if( !empty($box_icon['tm_serviceicon']) ){	
		$servicebox_icon = preyantechnosys_create_icon_from_data( $box_icon['tm_serviceicon'], true );
		if( !empty($servicebox_icon) ){
			$return .= '<div class="prt-service-iconbox"><span class="prt-service-icon">' . $servicebox_icon . '</span></div>';
		}
	}
	return $return;
}
}

if ( !function_exists( 'preyantechnosys_servicebox_icon1' ) ){
function preyantechnosys_servicebox_icon1( $post_id='' ){
	$return = '';
	$box_icon = get_post_meta( get_the_ID(), 'preyantechnosys_tmservice_icon', true);
				
	if( !empty($box_icon['tm_serviceicon']) ){	
		$servicebox_icon = preyantechnosys_create_icon_from_data( $box_icon['tm_serviceicon'], true );
		if( !empty($servicebox_icon) ){
			$return .= '<div class="prt-service-iconbox"><div class="prt-service-icon-dots"></div><span class="prt-service-icon">' . $servicebox_icon . '</span></div>';
		}
	}
	return $return;
}
}
/**
 * Print HTML with icon for current post.
 *
 * Create your own preyantechnosys_entry_icon() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if ( !function_exists( 'preyantechnosys_entry_icon' ) ){
function preyantechnosys_entry_icon() {
	$iconCode = '';
	$postFormat = get_post_format();
	if( is_sticky() ){ $postFormat = 'sticky'; }
	$icon = 'pencil';
	switch($postFormat){
		case 'sticky':
			$icon = 'sticky';
			break;
		case 'aside':
			$icon = 'aside';
			break;
		case 'audio':
			$icon = 'music';
			break;
		case 'chat':
			$icon = 'chat';
			break;
		case 'gallery':
			$icon = 'gallery';
			break;
		case 'image':
			$icon = 'picture';
			break;
		case 'link':
			$icon = 'link';
			break;
		case 'quote':
			$icon = 'quote-left';
			break;
		case 'status':
			$icon = 'status';
			break;
		case 'video':
			$icon = 'video';
			break;
	}
	
	$iconCode .= '<i class="prt-minemo-icon-'.$icon.'"></i>';
	
	
	// return data
	return $iconCode;
	
}
}

/*
 *  ThemetechMount Box Wrapper
 */
if( !function_exists('preyantechnosys_box_wrapper') ){
function preyantechnosys_box_wrapper( $position='start', $cptname='blog', $vars=array() ){
	
	$return 	 = '';
	$view        = (!empty($vars['view']))   ? $vars['view'] : 'top-image' ;
	$column      = (!empty($vars['column'])) ? $vars['column'] : 'three' ;
	$box_spacing = (!empty($vars['box_spacing'])) ? $vars['box_spacing'] : '' ;
	$boxview     = (!empty($vars['boxview'])) ? $vars['boxview'] : 'default' ;
	$sortable    = (!empty($vars['sortable'])) ? $vars['sortable'] : '' ;
	$txt_align   = (!empty($vars['txt_align'])) ? $vars['txt_align'] : '' ;
	$arrow_type   = (!empty($vars['carousel_arrowtype'])) ? $vars['carousel_arrowtype'] : '' ;
	$reverse_heading	= (!empty($vars['reverse_heading'])) ? $vars['reverse_heading'] : '' ;
	$center_mode = (!empty($vars['carousel_centermode'])) ? $vars['carousel_centermode'] : '' ;
	
	if( $position=='start' ){
		
		$classArray = array();
		
		// Data tags
		$datatags = preyantechnosys_carousel_data_html( $vars );
		
		$classArray[] = 'preyantechnosys-boxes';
		$classArray[] = 'preyantechnosys-boxes-'.$cptname;
		$classArray[] = 'preyantechnosys-boxes-view-'.$boxview;
		$classArray[] = 'preyantechnosys-boxes-col-'. $column;
		$classArray[] = 'preyantechnosys-boxes-sortable-'. $sortable;
		$classArray[] = 'preyantechnosys-boxes-textalign-'. $txt_align;
		
		if( $reverse_heading == 'true' ){ $classArray[] = 'prt-cta3-rev-heading'; }
		
		if( !empty($box_spacing) ){ $classArray[] = 'preyantechnosys-boxes-spacing-'. $box_spacing; }
		if( !empty($center_mode) ){ $classArray[] = 'preyantechnosys-boxes-centermode'; }
		
		// Carousel special class for carousel arrows
		if ( $boxview=='carousel' ) {
			$classArray[] = 'prt-boxes-carousel-arrow-'.$arrow_type;
			if( $vars['carousel_nav']=='above' || $vars['carousel_nav']=='below' ){
				$classArray[] = 'prt-boxes-carousel-arrows-' . esc_attr($vars['carousel_nav']);
				if ( !empty( $vars['txt_align'] ) ) {
					$classArray[] = 'prt-boxes-txtalign-' . $vars['txt_align'];
				}
			} else {
				$classArray[] = 'prt-boxes-carousel-arrows-' . esc_attr($vars['carousel_nav']);
			}
		}
		
		// CSS Animation
		if ( ! empty( $vars['css_animation'] ) ) {
			$classArray[] = preyantechnosys_getCSSAnimation( $vars['css_animation'] );
		}
		// Extra class
		if ( ! empty( $vars['el_class'] ) ) {
			$classArray[] = $vars['el_class'];
		}
		
		//Design Options tab css class
		if( !empty($vars['css']) ){
			$classArray[] = preyantechnosys_vc_shortcode_custom_css_class($vars['css']);
		}
		
		$return = '<div class="'. implode(' ',$classArray) .'"'. $datatags .'>
		<div class="preyantechnosys-boxes-inner preyantechnosys-boxes-'. $cptname .'-inner ">';
		
		
	} else {
		
		$return = '</div><!-- .preyantechnosys-boxes-inner -->   </div><!-- .preyantechnosys-boxes -->  ';
		
	}
	
	return $return;
	
}
}


if( !function_exists('preyantechnosys_get_query_args') ){
function preyantechnosys_get_query_args( $cptname='blog', $vars=array() ){
	
	$show     	= (!empty($vars['show'])) ? $vars['show'] : '3' ;
	$category 	= (!empty($vars['category'])) ? $vars['category'] : '' ;
	$orderby	= (!empty($vars['orderby'])) ? $vars['orderby'] : 'date' ;
	$order		= (!empty($vars['order'])) ? $vars['order'] : 'DESC' ;
	
	$valid_post_types = array(
		'blog',
		'portfolio',
		'service',
		'team',
		'testimonial',
		'client',
		'events',
		'coverbox',
		'historybox',
		'sliderbox',
		'staticboxslider',
		'pricestaticbox',
	);
	
	$post_type = array(
		'blog' => array(
			'post_type' => 'post',
			'taxonomy' 	=> 'category',
		),
		'portfolio' => array(
			'post_type' => 'tm_portfolio',
			'taxonomy' 	=> 'tm_portfolio_category',
		),
		'service' => array(
			'post_type' => 'tm_service',
			'taxonomy' 	=> 'tm_service_category',
		),
		'team' => array(
			'post_type' => 'tm_team_member',
			'taxonomy' 	=> 'tm_team_group',
		),
		'testimonial' => array(
			'post_type' => 'tm_testimonial',
			'taxonomy' 	=> 'tm_testimonial_group',
		),
		'client' => array(
			'post_type' => 'tm_client',
			'taxonomy' 	=> 'tm_client_group',
		),
		'events' => array(
			'post_type' => 'tribe_events',
			'taxonomy' 	=> 'tribe_events_cat',
		),
		'historybox' => array(
			'post_type' => 'tribe_historybox',
			'taxonomy' 	=> 'tribe_historybox',
		),
		'coverbox' => array(
			'post_type' => 'prt_coverbox',
			'taxonomy' 	=> 'prt_coverbox',
		),
		'sliderbox' => array(
			'post_type' => 'prt_sliderbox',
			'taxonomy' 	=> 'prt_sliderbox',
		),
		'staticboxslider' => array(
			'post_type' => 'prt_staticboxslider',
			'taxonomy' 	=> 'prt_staticboxslider',
		),
		'pricestaticbox' => array(
			'post_type' => 'prt_pricestaticbox',
			'taxonomy' 	=> 'prt_pricestaticbox',
		),
	);
		
	
	// check if not called directly
	if( count($vars)>0 ){
		
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		// default args passing blog data, if no matching post type
		$args = array(
			'post_type'				=> 'post',
			'paged'                 => esc_attr($paged),
			'ignore_sticky_posts'	=> true,
			'orderby'				=> esc_attr($orderby),
			'order'					=> esc_attr($order),
		);
	
		// args if post type names match valid post types.  
		if( in_array( $cptname, $valid_post_types ) ){
			
			$args = array(
				'post_type'				=> $post_type[$cptname]['post_type'],
				'paged'                 => esc_attr($paged),
				'posts_per_page'		=> $show,
				'ignore_sticky_posts'	=> true,
				'orderby'				=> $orderby,
				'order'					=> $order,
			);
			// Creating array for multiple category
			if( strpos($category, ',') !== false ) {
				$category = explode(',',$category);
			}
			// Category
			if( $category != '' ){
				$args['tax_query'] = array(
					array(
						'taxonomy' 	=> $post_type[$cptname]['taxonomy'],
						'field' 	=> 'slug',
						'terms' 	=> $category
					),
				);
			}
			
		}

		return $args;
	
	}
	
}
}

/**
 * Blogbox meta boxes - show or hide
 *
 * Create your own preyantechnosys_blogbox_show_meta() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if ( !function_exists( 'preyantechnosys_blogbox_show_meta' ) ){
function preyantechnosys_blogbox_show_meta() {
	return true;
}
}


/**
 * Blogbox meta boxes
 *
 * Create your own preyantechnosys_blogbox_single_meta() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if ( !function_exists( 'preyantechnosys_blogbox_single_meta' ) ){
function preyantechnosys_blogbox_single_meta( $option='date', $args=array() ) {
	$return      = '';
	$icon        = '';
	$icon_prefix = 'prt-minemo-icon';
	
	switch($option){
		
		case 'date' :
		default :
			$icon           = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-date"></i>' ;
			$date_structure = ( !empty($args['date_structure']) ) ? $args['date_structure'] : 'j M Y' ;
			$return         = get_the_time( $date_structure );
			break;
			
		case 'user' :
			$icon   = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-user"></i>' ;
			$return = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
			break;
			
		case 'comment' :
			$icon   = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-comment"></i>' ;
			$return = '';
			break;
			
		case 'category' :
			$icon            = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-category"></i>' ;
			$categories_list = get_the_category_list( esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'minemo' ) );
			if ( !empty($categories_list) ) {
				$return = sprintf( '<span class="preyantechnosys-category-links">%2$s</span>',
					$categories_list
				);
			}
			break;
			
		case 'tags' :
			$icon      = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-tags"></i>' ;
			$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'minemo' ) );
			if ( $tags_list ) {
				$return = sprintf( '<span class="preyantechnosys-tags-links">%2$s</span>',
					$tags_list
				);
			}
			break;
			
	}
	
	// now preparing the output
	if( $return!='' ){
		$return = '<span class="preyantechnosys-blogbox-meta-row preyantechnosys-blogbox-meta-row-'. $option .'">'. $icon .' '. $return .'</span>';
	}
	
	return $return;
	
}
}


/* =============================================================== */
/* -------------------- Titlebar functions  ---------------------- */

if( !function_exists('preyantechnosys_titlebar_classes') ){
function preyantechnosys_titlebar_classes(){
	$titlebar_bg_color    = preyantechnosys_get_option('titlebar_bg_color');
	$titlebar_text_color  = preyantechnosys_get_option('titlebar_text_color');
	$titlebar_view        = preyantechnosys_get_option('titlebar_view');
	$titlebar_background  = preyantechnosys_get_option('titlebar_background');
	$breadcrumb_on_bottom = preyantechnosys_get_option('breadcrumb_on_bottom');
	$breadcum_bg_color    = preyantechnosys_get_option('breadcum_bg_color');
	$titlebar_style       = preyantechnosys_get_option('titlebar_style');
	$breadcrumb_border_bottom = preyantechnosys_get_option('breadcrumb_border_bottom');
	
	//global $tm_inline_css;
	$reurn                = array();
	$titlebar_if_bg_image = 'no';
	$breadcrum_on_bottom  = "";
	$breadcrum_border_bottom  = "";
	
	$titlebar_viewlist  = array( 'default','allleft','allright' );
		

	if( !empty($titlebar_style) ){
		$reurn[] = 'prt-titlebar-'.$titlebar_style;
	}
	// If bg image is there
	if( !empty($titlebar_background['image']) ){
		$titlebar_if_bg_image = 'yes';
	}
	
	// Breadcrumb on bottom
	if( !empty($breadcrumb_on_bottom) && $breadcrumb_on_bottom == 'yes' ){
		$breadcrum_on_bottom = "yes";
	}
	
	// Breadcrumb border bottom
	if( !empty($breadcrumb_border_bottom) && $breadcrumb_border_bottom == 'yes' ){
		$breadcrum_border_bottom = "yes";
	}
		
	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	
	// Single overwrite
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		
		
		// ** ALL bg options ** 
		if( !empty($single_tbar_options['titlebar_bg_custom_options']) && $single_tbar_options['titlebar_bg_custom_options']=='custom' ){
			
			// BG  Color
			if( !empty($single_tbar_options['titlebar_bg_color']) ){
				$titlebar_bg_color = $single_tbar_options['titlebar_bg_color'];
			}
			
			// If bg image is there
			if( !empty($single_tbar_options['titlebar_background']['image']) ){
				$titlebar_if_bg_image = 'yes';
			} else {
				$titlebar_if_bg_image = 'no';
			}
			
		}
				
		if( !empty($single_tbar_options['titlebar_font_custom_options']) && $single_tbar_options['titlebar_font_custom_options']=='custom' ){
			
			// Text Color
			if( !empty($single_tbar_options['titlebar_text_color']) && !empty($single_tbar_options['titlebar_text_color']) ){
				$titlebar_text_color = $single_tbar_options['titlebar_text_color'];
			}
		
		}
		
		// Titlebar Align
		if( !empty($single_tbar_options['titlebar_view']) && !empty($single_tbar_options['titlebar_view']) ){
			$titlebar_view = $single_tbar_options['titlebar_view'];
		}
			
	}
	
		
	if( !empty($titlebar_bg_color) ){
		$reurn[] = 'prt-bgcolor-'.$titlebar_bg_color;
	}
	if( !empty($titlebar_view) ){
		$reurn[] = 'prt-titlebar-align-'.$titlebar_view;
	}
	if( !empty($titlebar_text_color) ){
		$reurn[] = 'prt-textcolor-'.$titlebar_text_color;
	}
	if( !empty($titlebar_if_bg_image) ){
		$reurn[] = 'prt-bgimage-'.$titlebar_if_bg_image;
	}
	if( $breadcrum_on_bottom == 'yes' && in_array( $titlebar_view, $titlebar_viewlist ) ){
		$reurn[] = 'prt-breadcrumb-on-bottom';
	}
	if( !empty($breadcum_bg_color) ){
		$reurn[] = 'prt-breadcrumb-bgcolor-'.$breadcum_bg_color;
	}
	if( $breadcrum_border_bottom == 'yes' ){
		$reurn[] = 'prt-hide-goto-arrowbox';
	}
	
	$reurn = implode( ' ', $reurn );
	
	// Return data
	return $reurn;
	
}
}


if( !function_exists('preyantechnosys_get_framework_raw_option') ){
function preyantechnosys_get_framework_raw_option( $element_id ){
	$return = '';
	
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
	
	foreach( $tm_framework_options as $tm_framework_option ){
		foreach( $tm_framework_option as $options ){
			if( is_array($options) && count($options)>0 ){
				foreach( $options as $option ){
					if( !empty($option['id']) && $option['id']==$element_id ){
						$return = $option['output'];
					}
				}
			}
		}
	}
	
	return $return;
	
}
}


if( !function_exists('preyantechnosys_titlebar_title') ){
function preyantechnosys_titlebar_title(){
	
	
	
	$title    = get_the_title();
	$subtitle = '';
	
	
	if( is_singular() || is_home() ){  // single page, single post and single cpt
		$pageID = get_the_ID();
		if( is_home() ){
			$pageID = get_option( 'page_for_posts' );
			$title = esc_attr__( 'Blog', 'minemo' );  // Setting for Titlebar title
		}	
		$single_tbar_settings = get_post_meta( $pageID, '_preyantechnosys_metabox_group', true );
		$title    = ( !empty($single_tbar_settings['title']) ) ? trim($single_tbar_settings['title']) : $title ;
		$subtitle = ( !empty($single_tbar_settings['subtitle']) ) ? trim($single_tbar_settings['subtitle']) : $subtitle ;
		

	} else if( function_exists('is_woocommerce')  && is_woocommerce() ){ // WooCommerce

		$pageID = get_option( 'woocommerce_shop_page_id' );
		$single_tbar_settings = get_post_meta( $pageID, '_preyantechnosys_metabox_group', true );
		$title    = ( !empty($single_tbar_settings['title']) ) ? trim($single_tbar_settings['title']) : get_the_title($pageID) ;
		$subtitle = ( !empty($single_tbar_settings['subtitle']) ) ? trim($single_tbar_settings['subtitle']) : '' ;
	} else if( is_category() ){ // Category
		$adv_tbar_catarc = preyantechnosys_get_option('adv_tbar_catarc');
		$adv_tbar_catarc = ( !empty($adv_tbar_catarc) ) ? esc_attr($adv_tbar_catarc.' %s') : esc_attr__('Category Archives: %s', 'minemo') ;
		$title = sprintf(
			$adv_tbar_catarc,
			'<span class="prt-titlebar-heading prt-tbar-category-title">' . esc_attr(single_cat_title( '', false)) . '</span>'  // for WPML
		);
		
		
	} else if( is_tag() ){ // Tag
		$adv_tbar_tagarc = preyantechnosys_get_option('adv_tbar_tagarc');
		$adv_tbar_tagarc = ( !empty( $adv_tbar_tagarc ) ) ? esc_attr($adv_tbar_tagarc.' %s') : esc_attr__('Tag Archives: %s','minemo') ;
		$title = sprintf(
			$adv_tbar_tagarc,
			'<span class="prt-titlebar-heading prt-tbar-tag-title">' . esc_attr( single_tag_title( '', false)) . '</span>'  // for WPML
		);
	
		
	} else if( is_tax() ){ // Taxonomy
		global $wp_query;
		$tax = $wp_query->get_queried_object();
		
		if( is_tax('tm_team_group') || is_tax('tm_portfolio_category') ){
			$title = '<span class="prt-titlebar-heading prt-tbar-taxonomy-title">' . esc_attr($tax->name) . '</span>';
			
		} else {
			$adv_tbar_postclassified = preyantechnosys_get_option('adv_tbar_postclassified');
			global $wp_query;
			$adv_tbar_postclassified = ( !empty($adv_tbar_postclassified) ) ? esc_attr($adv_tbar_postclassified.' %s') : esc_attr__('Posts classified under: %s', 'minemo') ;
		
			$title = sprintf(
				$adv_tbar_postclassified,
				'<span>' . esc_attr($tax->name) . '</span>'
			);
			
		}
			
	} else if( is_author() ){ // Author
		
		global $post;
		$author_id          = $post->post_author;
		$adv_tbar_authorarc = preyantechnosys_get_option('adv_tbar_authorarc');
		$adv_tbar_authorarc = ( !empty( $adv_tbar_authorarc ) ) ? esc_attr($adv_tbar_authorarc.' %s') : esc_attr__('Author Archives: %s', 'minemo');
		
		$title = sprintf(
			$adv_tbar_authorarc,
			'<span class="prt-titlebar-heading prt-tbar-author-title">' . get_the_author_meta( 'display_name', $author_id ) . '</span>'
		);
		
	} else if( is_search()  ){ // Search Results
		$title    = sprintf( esc_attr__( 'Search Results for %s', 'minemo' ), '<span class="prt-titlebar-heading prt-tbar-search-title">' . get_search_query() . '</span>' );


	} else if( is_404() ){ // 404
		$error404_big_text = preyantechnosys_get_option('error404_big_text');
		$title = esc_attr__( 'Error Page', 'minemo' ); 
		if( function_exists('tribe_is_past') && function_exists('tribe_is_upcoming') && (tribe_is_past() || tribe_is_upcoming() || tribe_is_month() || tribe_is_day() && !is_tax()) ){
			$title = esc_attr__( 'EVENTS', 'minemo' );
		}

	} else if( is_archive() ){
		// Title for events calendar pages
		if( function_exists('tribe_is_month') && tribe_is_month() && !is_tax() ) { // The Main Calendar Page
			$title = esc_attr__( 'Events Calendar', 'minemo' );
			
		} elseif( function_exists('tribe_is_month') && tribe_is_month() && is_tax() ) { // Calendar Category Pages
			$title = single_term_title('', false);
			
		} elseif( function_exists('tribe_is_event') &&  tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
			$title = esc_attr__( 'Events', 'minemo' );

		} elseif( function_exists('tribe_is_event') && tribe_is_event() && is_single() ) { // Single Events
			$title = get_the_title();
			
		} elseif( function_exists('tribe_is_day') && tribe_is_day() ) { // Single Event Days
			global $wp_query;
			$title = esc_attr__( 'Events on: ', 'minemo' ). date('F j, Y', strtotime($wp_query->query_vars['eventDate']));
			
		} elseif( function_exists('tribe_is_venue') && tribe_is_venue() ) { // Single Venues
			$title =	get_the_title();
			
			
		// BBPress section
		} else if( function_exists('is_bbpress') && is_bbpress() ) {
			$title = esc_attr__( 'Forum', 'minemo' );
		} else if( is_post_type_archive() ){
			$title = post_type_archive_title('', false);
		} else if ( is_day() ){
			$title = sprintf( esc_attr__( 'Daily Archives: %s', 'minemo' ), '<span>' . get_the_date() . '</span>' );
		} elseif( is_month() ){
			$title = sprintf( esc_attr__( 'Monthly Archives: %s', 'minemo' ), '<span>' . get_the_date( esc_attr_x( 'F Y', 'monthly archives date format', 'minemo' ) ) . '</span>' );
		} elseif( is_year() ){
			$title = sprintf( esc_attr__( 'Yearly Archives: %s', 'minemo' ), '<span>' . get_the_date( esc_attr_x( 'Y', 'yearly archives date format', 'minemo' ) ) . '</span>' );
		} else {
			if( function_exists('is_bbpress') && is_bbpress() ) {
				$title = esc_attr__( 'Forum', 'minemo' );
			} else {
				$title = esc_attr__( 'Archives', 'minemo' );
			}
		};
		
	} else {
		$title = get_the_title();
		
	}
		
	// return data
	$return  = '';
	$return .= ( !empty($title) ) ? '<h1 class="entry-title"> '. do_shortcode($title) . '</h1>' : '' ;
	$return .= ( !empty($subtitle) ) ? '<h3 class="entry-subtitle"> '. do_shortcode($subtitle) .'</h3>' : '' ;
	
	if( $return!='' ){
		$return = '<div class="entry-title-wrapper"><div class="container">'.$return.'</div></div>';
	}
	
	// Return data
	return $return;
	
}
}


if( !function_exists('preyantechnosys_titlebar_content') ){
function preyantechnosys_titlebar_content(){
	
	$titlebar_hide_breadcrumb = preyantechnosys_get_option('titlebar_hide_breadcrumb');
	$titlebar_view            = preyantechnosys_get_option('titlebar_view');
	
	$leftContent  = '';
	$rightContent = '';
	
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	// Left content
	$leftContent = preyantechnosys_titlebar_title();
	
	// Right content
	if( !empty($titlebar_hide_breadcrumb) && $titlebar_hide_breadcrumb!='yes' ){
		$rightContent = preyantechnosys_titlebar_breadcrumb();
	}
	
	// if single page,post etc
	if( $post_id ){
		$single_titlebar = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		// View
		if( !empty($single_titlebar['titlebar_hide_breadcrumb']) ){
			if( $single_titlebar['titlebar_hide_breadcrumb'] == 'yes' ){
				$rightContent = '';
			} else if( $single_titlebar['titlebar_hide_breadcrumb'] == 'no' ){
				$rightContent = preyantechnosys_titlebar_breadcrumb();
			}
		}
	}
	
	// All content
	$allContent = $leftContent . $rightContent;
	if( !empty($titlebar_view) && $titlebar_view == 'right' ){  // Right align
		$allContent = $rightContent . $leftContent;
	}
	
	// if single page,post etc
	if( $post_id ){
		$single_titlebar = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		// View
		if( !empty($single_titlebar['titlebar_view']) && $single_titlebar['titlebar_view'] == 'right' ){  // Right align
			$allContent = $rightContent . $leftContent;
		}
	}
	
	if( !empty($titlebar_view) && $titlebar_view == 'right' ){  // Right align
		$allContent = $rightContent . $leftContent;
	}
	
	// Return data
	return $allContent;
		
}
}

if( !function_exists('preyantechnosys_titlebar_show') ){
function preyantechnosys_titlebar_show(){
	$return = true;
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	if( $post_id ){
		$single_view = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		if( !empty($single_view['hide_titlebar']) && $single_view['hide_titlebar']==true ){
			$return = false;
		}
	}
	
	return $return;
}
}

if( !function_exists('preyantechnosys_titlebar_icon_show') ){
function preyantechnosys_titlebar_icon_show(){
	$return = true;
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	if( $post_id ){
		$single_view = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		if( !empty($single_view['hide_titlebar_icon']) && $single_view['hide_titlebar_icon']==true ){
			$return = false;
		}
	}
	
	return $return;
}
}


if( !function_exists('preyantechnosys_titlebar_breadcrumb') ){
function preyantechnosys_titlebar_breadcrumb(){
	$return = '';
	if(function_exists('bcn_display')){
		$return .=  '<!-- Breadcrumb NavXT output -->';
		$return .= bcn_display(true);
	}
	
	if( !empty($return) ){
		$return = '<div class="breadcrumb-wrapper"><div class="container"><div class="breadcrumb-wrapper-inner">'. $return .'</div></div></div>';
	}
	
	return $return;
	
}
}

if( !function_exists('preyantechnosys_slidersociallinks_show') ){
function preyantechnosys_slidersociallinks_show(){
	$return = false;
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	if( $post_id ){
		$single_views = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		if( !empty($single_views['slider_sociallinks']) && $single_views['slider_sociallinks']==true ){
			$return = true;
		}
	}

	return $return;
}
}

/**
 *  Adding inline style css for Titlebar
 */
if( !function_exists('preyantechnosys_titlebar_inline_style') ){
function preyantechnosys_titlebar_inline_style(){
	$css = '';
	
	
	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	if( $post_id ){
		$page_titlebar = get_post_meta( $post_id, '_preyantechnosys_metabox_group' ,true );
		
		// Background options
		if( !empty($page_titlebar['titlebar_bg_custom_options']) && $page_titlebar['titlebar_bg_custom_options']=='custom' ){
			
			$bg_exclude = array();
			if( !empty($page_titlebar['titlebar_bg_color']) && $page_titlebar['titlebar_bg_color']!='custom' ){
				$bg_exclude = array('background-color');
			}
			
			
			$css .= preyantechnosys_get_background_css(
				'div.prt-titlebar-wrapper',
				$page_titlebar['titlebar_background'],
				$bg_exclude // exclude array
			);
		}
		
		// custom fonts
		if( !empty($page_titlebar['titlebar_font_custom_options']) && $page_titlebar['titlebar_font_custom_options']=='custom' ){
			
			// heading
			$css .= preyantechnosys_get_font_css(
				'.prt-titlebar-wrapper .prt-titlebar-main h1.entry-title',
				$page_titlebar['titlebar_heading_font'],
				true
			);
			
			// sub-heading
			$css .= preyantechnosys_get_font_css(
				'.prt-titlebar-wrapper .prt-titlebar-main h3.entry-subtitle',
				$page_titlebar['titlebar_subheading_font'],
				true
			);
			
			// breadcrumb
			$css .= preyantechnosys_get_font_css(
				'.prt-titlebar .breadcrumb-wrapper, .prt-titlebar .breadcrumb-wrapper a',
				$page_titlebar['titlebar_breadcrumb_font'],
				true
			);
			
			// add Google fonts css
			preyantechnosys_enqueue_google_fonts(
				array(
					$page_titlebar['titlebar_heading_font'],
					$page_titlebar['titlebar_subheading_font'],
					$page_titlebar['titlebar_breadcrumb_font']
				)
			);
			
		}
		
		// Titlebar Height
		if( !empty($page_titlebar['titlebar_height']) ){
			$css .= '.prt-titlebar-wrapper .prt-titlebar-inner-wrapper{height:'. $page_titlebar['titlebar_height'] .'px;}';
		}
	
	}
		
	return $css;
	
}
}
add_action( 'wp_enqueue_scripts', 'preyantechnosys_titlebar_inline_style', 18 );


/**
 *  preyantechnosys_enqueue_google_fonts function
 */
if( !function_exists('preyantechnosys_enqueue_google_fonts') ){
function preyantechnosys_enqueue_google_fonts( $fontsdata ){
	
	foreach( $fontsdata as $font ){
		if( !empty($font['family']) ){
			preyantechnosys_footer_google_fonts_array( $font['family'] , $font['variant'] );
		}
	}
	
}
}

/* =============================================================== */
/* --------------------- Topbar functions  ----------------------- */

if( !function_exists('preyantechnosys_topbar_show') ){
function preyantechnosys_topbar_show(){
	$return = true;
	
	
	$show_topbar = preyantechnosys_get_option('show_topbar');
	if( isset($show_topbar) ){
		$return = $show_topbar;
	}
		
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	if( $post_id ){
		$single_view = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		if( !empty($single_view['show_topbar']) ){
			if( $single_view['show_topbar']=='yes' ){
				$return = true;
			} else if( $single_view['show_topbar']=='no' ){
				$return = false;
			}
		}
	}
	
	return $return;
}
}

if( !function_exists('preyantechnosys_topbar_classes') ){
function preyantechnosys_topbar_classes(){
	global $tm_inline_css;
	$full_wide_elements = preyantechnosys_get_option('full_wide_elements');
	$topbar_bg_color    = preyantechnosys_get_option('topbar_bg_color');
	$topbar_text_color  = preyantechnosys_get_option('topbar_text_color');
	$layout             = preyantechnosys_get_option('layout');
	$topbar_border_on_bottom = preyantechnosys_get_option('topbar_border_on_bottom');
	$return = array();

	// Singuler or Shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	// Single overwrite
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		
		if( !empty($single_tbar_options['topbar_bg_color']) ){
			$topbar_bg_color = $single_tbar_options['topbar_bg_color'];
		}
		
		// Text Color
		if( !empty($single_tbar_options['topbar_text_color']) ){
			$topbar_text_color = $single_tbar_options['topbar_text_color'];
		}
		
	}  // if
		
	if( !empty($topbar_bg_color) ){
		$return[] = 'prt-bgcolor-'.$topbar_bg_color;
	}
	if( !empty($topbar_view) ){
		$return[] = 'prt-topbar-align-'.$topbar_view;
	}
	if( !empty($topbar_text_color) ){
		$return[] = 'prt-textcolor-'.$topbar_text_color;
	}
	if( !empty($topbar_border_on_bottom) && $topbar_border_on_bottom == 'yes' ){
		$return[] = 'prt-borderbottom-yes';
	}
	
	//Full Wide class
	if( $layout=='fullwide' && is_array($full_wide_elements) && count($full_wide_elements)>0 ){
		if( in_array('topbar', $full_wide_elements ) ){
			$return[] = 'container-full';
		}
	} 
	
	// output
	$return = implode( ' ', $return );
	
	
	// Return data
	return $return;

}
}


if( !function_exists('preyantechnosys_topbar_content') ){
function preyantechnosys_topbar_content(){
	$return = $topbar_left_text = $topbar_right_text = '';
	$topbar_left_text  = preyantechnosys_get_option('topbar_left_text');
	$topbar_right_text = preyantechnosys_get_option('topbar_right_text');
	
	// Remove [prt-social-links] shortcode if not exists
	if ( !shortcode_exists( 'prt-social-links' ) ) {
		$topbar_right_text = str_replace('[prt-social-links]', '', $topbar_right_text );
	}
		
	
	// Singuler or Shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		
		if( !empty($single_tbar_options['topbar_left_text']) ){
			$topbar_left_text = $single_tbar_options['topbar_left_text'];
		}
		
		// Right text
		if( !empty($single_tbar_options['topbar_right_text']) ){
			$topbar_right_text = $single_tbar_options['topbar_right_text'];
		}
		
	}
	
	if( !empty($topbar_left_text) ){
		$topbar_left_text = '<div class="prt-wrap-cell prt-align-left">'. do_shortcode($topbar_left_text) .'</div>';
	}
	if( !empty($topbar_right_text) ){
		$topbar_right_text = '<div class="prt-wrap-cell prt-align-right">'. do_shortcode($topbar_right_text) .'</div>';
	}
	
	if( !empty($topbar_left_text) || !empty($topbar_right_text) ){
		$return = '<div class="prt-wrap prt-topbar-content">'. $topbar_left_text . $topbar_right_text .'</div>';
	}
	
	// Return data
	return $return;
	
}
}


/**
 *  Topbar custom CSS code
 */
if( !function_exists('preyantechnosys_topbar_inline_style') ){
function preyantechnosys_topbar_inline_style(){
	$return                   = '';
	$topbar_bg_color          =  preyantechnosys_get_option('topbar_bg_color');
	$topbar_bg_custom_color   =  preyantechnosys_get_option('topbar_bg_custom_color');
	$topbar_text_color        =  preyantechnosys_get_option('topbar_text_color');
	$topbar_text_custom_color =  preyantechnosys_get_option('topbar_text_custom_color');
	
	// Getting singluar id or shop id
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	}
	
	
	// Single overwrite
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		
		// BG Color
		if( !empty($single_tbar_options['topbar_bg_color']) ){
			$topbar_bg_color        = $single_tbar_options['topbar_bg_color'];
			if( $single_tbar_options['topbar_bg_color']=='custom' ){
				$topbar_bg_custom_color = $single_tbar_options['topbar_bg_custom_color'];
			}
		}
		
		// Text Color
		if( !empty($single_tbar_options['topbar_text_color']) ){
			$topbar_text_color        = $single_tbar_options['topbar_text_color'];
			if( $single_tbar_options['topbar_text_color'] == 'custom' ){
				$topbar_text_custom_color = $single_tbar_options['topbar_text_custom_color'];
			}
		}
		
	}
		
	// BG Color CSS code
	if( $topbar_bg_color=='custom' ){
		$return .= '.preyantechnosys-topbar-wrapper{background-color:'. $topbar_bg_custom_color .';}';
	}
	
	// Text Color CSS code
	if( $topbar_text_color=='custom' ){
		$return .= '.preyantechnosys-topbar-wrapper, .preyantechnosys-topbar-wrapper a{color:'. $topbar_text_custom_color .';}';
	}
	
	return $return;
	
}
}


/* =============================================================== */
/* --------------------- Header functions  ----------------------- */


/**
 *  Main logo
 */
if( !function_exists('preyantechnosys_site_logo') ){
function preyantechnosys_site_logo( $logo_type = '' ){
	$logoimg_sticky = preyantechnosys_get_option('logoimg_sticky');
	$logoseo        = preyantechnosys_get_option('logoseo');
	$logotype       = preyantechnosys_get_option('logotype');
	$return     = '';
	$stickylogo = '';
	
	
	// sticky logo class
	$stickyLogoClass = 'no';
	if( !empty($logoimg_sticky['id']) || !empty($logoimg_sticky['thumb-url']) || !empty($logoimg_sticky['full-url']) ){
		$stickyLogoClass = 'yes';
	}
	
	// Logo code
	$logo_html = preyantechnosys_logo();
	
	// Logo tag for SEO
	$logotag    = ( $logoseo=='h1homeonly' && !is_front_page() ) ? 'span' : 'h1' ;
	
	// Preparing logo
	$return .= '<div class="headerlogo preyantechnosys-logotype-'. sanitize_html_class($logotype) .' prt-stickylogo-'. sanitize_html_class($stickyLogoClass) .'">';
		$return .= '<'.esc_attr($logotag) .' class="site-title">';
			$return .= '<a class="home-link" href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'" rel="home">';
				$return .= $logo_html;
			$return .= '</a>';
		$return .= '</'. esc_attr($logotag) .'>';
		$return .= '<h2 class="site-description">'. get_bloginfo( 'description' ) .'</h2>';
	$return .= '</div>';
	return $return;
}
}

if( !function_exists('preyantechnosys_header_links2') ){
function preyantechnosys_header_links2(){
// Floating bar icon
$return         	= '';
	if( preyantechnosys_fbar_show()==true ){
		$return .= '
		<span class="preyantechnosys-fbar-btn ' . preyantechnosys_sanitize_html_classes(preyantechnosys_fbar_btn_classes()) . ' preyantechnosys-fbar-bg-' . preyantechnosys_sanitize_html_classes( preyantechnosys_get_option('fbar_btn_bg_color') ) . '">
			<a href="#" class="preyantechnosys-fbar-btn-link">
				' . preyantechnosys_fbar_open_icon() . '
				' . preyantechnosys_fbar_close_icon() . '
				<span class="prt-hide">' . esc_attr__('Open', 'minemo') . '</span>
			</a>
		</span>';
	}
	return $return;
}
}
	
if( !function_exists('preyantechnosys_header_links') ){
function preyantechnosys_header_links(){
	$return         	= '';
	$header_search  	= preyantechnosys_get_option('header_search');
	$wc_header_icon		= preyantechnosys_get_option('wc-header-icon');
	$show_topbar		= preyantechnosys_get_option('show_topbar');
	$header_style		= preyantechnosys_get_option('headerstyle');
	$class				= 'prt-fbar-link-only';
	$social_links		= '';
	
	global $minemo_theme_options;	
	$search_input = ( !empty($minemo_theme_options['search_input']) ) ? esc_attr($minemo_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'minemo');
	
	// Floating bar icon
	if( preyantechnosys_fbar_show()==true && $show_topbar==false ){
		$return .= '
		<span class="preyantechnosys-fbar-btn ' . preyantechnosys_sanitize_html_classes(preyantechnosys_fbar_btn_classes()) . ' preyantechnosys-fbar-bg-' . preyantechnosys_sanitize_html_classes( preyantechnosys_get_option('fbar_btn_bg_color') ) . '">
			<a href="#" class="preyantechnosys-fbar-btn-link">
				' . preyantechnosys_fbar_open_icon() . '
				' . preyantechnosys_fbar_close_icon() . '
				<span class="prt-hide">' . esc_attr__('Open', 'minemo') . '</span>
			</a>
		</span>';
	}
	
		// WooCommerce cart icon
	if( function_exists('is_woocommerce') && $wc_header_icon==true ){
		global $woocommerce;
		$class    = '';
		$cart_url = wc_get_cart_url();
		$count    = $woocommerce->cart->cart_contents_count;
		
		if( empty($count) ){ $count = 0; }
		
		if( isset($woocommerce->cart->cart_contents_count) && $woocommerce->cart->cart_contents_count > 0 ){
			$total_count = $woocommerce->cart->cart_contents_count;
		}
		
		$return  .= '<span class="prt-header-icon prt-header-wc-cart-link"><a href="' . $cart_url . '"><i class="prt-minemo-icon-shopping-cart"></i><span class="number-cart">' . esc_attr($count) . '</span></a></span>';
	}
		
	// Search icon
	if( $header_search==true ){
		$class   = '';
		$return .= '<div class="prt-header-icon prt-header-search-link"><a href="#"><i class="flaticon flaticon-search"></i></a></div>';
	}
		
	if( $return!='' ){		
		$return = '<div class="prt-header-icons ' . $class . '">'. $return .'</div>';
	}
	
	return $return;
}
}


if( !function_exists('preyantechnosys_header_floatingbar_icon') ){
function preyantechnosys_header_floatingbar_icon(){
	$return         = '';
	$show_topbar    = preyantechnosys_get_option('show_topbar');
	$header_style   = preyantechnosys_get_option('headerstyle');
	$class          = 'prt-fbar-link-only';
	
	// Floating bar icon
	if( preyantechnosys_fbar_show()==true){
		$return .= '
		<span class="preyantechnosys-fbar-btn ' . preyantechnosys_sanitize_html_classes(preyantechnosys_fbar_btn_classes()) . '">
			<a href="#" class="preyantechnosys-fbar-btn-link">
				' . preyantechnosys_fbar_open_icon() . '
				' . preyantechnosys_fbar_close_icon() . '
				<span class="prt-hide">' . esc_attr__('Open', 'minemo') . '</span>
			</a>
		</span>';
	}

	if( $return!='' ){
		$return = '<div class="prt-header-flotingbar-icon' . $class . '">'. $return .'</div>';
	}
	
	return $return;
}
}

/**
 *  One page website
 */
if( !function_exists('preyantechnosys_one_page_site_js') ){
function preyantechnosys_one_page_site_js(){
	$one_page_site = preyantechnosys_get_option('one_page_site');
	if( $one_page_site==true ){
	?>
	
	<script>
		var x = 1;
		nav = jQuery('.mega-menu-wrap, div.nav-menu');
		
		// Applying active class to home link
		nav.find('a[href="#prt-home"]').parent().addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
		
		nav.find('a').each(function(){
			if( x != 1 ){
				jQuery(this).parent().removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
			}
			x = 0;
		});
	</script>
	
	<?php
	}
}
}


/**
 *  Header container classes
 */
if( !function_exists('preyantechnosys_header_container_class') ){
function preyantechnosys_header_container_class(){
	
	$class = '';
	$class = preyantechnosys_container_class('header');
	
	// Return data
	return $class;
	
}
}


/**
 *  Page container class (optional)
 */
if( !function_exists('preyantechnosys_page_container_optional') ){
function preyantechnosys_page_container_optional(){
	$return = '';
	
	if( is_page() ){
		if( !function_exists('vc_lean_map') ){
			$return = 'container';
		} else {
			$page_object = get_page( get_the_ID() );
			$content     =  $page_object->post_content;
			if ( strpos( $content, '[vc_row' ) === false ) {
				$return = 'container';
			}
		}
	}
	
	return $return;
	
}
}


/**
 *  Header container classes
 */
if( !function_exists('preyantechnosys_header_widget_text_color_class') ){
function preyantechnosys_header_widget_text_color_class(){
	$return             = '';
	$widget_text_color  = preyantechnosys_get_option('header_widget_text_color');
	$header_bg_color    = preyantechnosys_get_option('header_bg_color');
	
	if( !empty($widget_text_color) && 'custom' == $header_bg_color ){
		$return = 'prt-textcolor-' . $widget_text_color . ' prt-header-widget-text-' . $widget_text_color;
	}
	return $return;
}
}


/**
 *  Footer container classes
 */
if( !function_exists('preyantechnosys_footer_container_class') ){
function preyantechnosys_footer_container_class( $class = array() ){
	
	$class = '';
	$class = preyantechnosys_container_class('footer');
	
	// Return data
	return $class;
	
}
}


/**
 *  Floating Bar container classes
 */
if( !function_exists('preyantechnosys_floatingbar_container_class') ){
function preyantechnosys_floatingbar_container_class(){
	
	$class = '';
	$class = preyantechnosys_container_class('floatingbar');
	
	// Return data
	return $class;
	
}
}


/**
 *  Topbar container classes
 */
if( !function_exists('preyantechnosys_topbar_container_class') ){
function preyantechnosys_topbar_container_class(){
	
	$class = '';
	$class = preyantechnosys_container_class('topbar');
	
	// Return data
	return $class;
	
}
}


/**
 *  Content-area container classes
 */
if( !function_exists('preyantechnosys_contentarea_container_class') ){
function preyantechnosys_contentarea_container_class(){
	
	$class = '';
	$class = preyantechnosys_container_class('content');
	
	// Return data
	return $class;
	
}
}


/**
 *   Container classes for wide and full wide layout
 */
if( !function_exists('preyantechnosys_container_class') ){
function preyantechnosys_container_class($section='header'){
	
	$class              = '';
	$layout             = preyantechnosys_get_option('layout');
	$full_wide_elements = preyantechnosys_get_option('full_wide_elements');
	
	if( $layout=='fullwide' && is_array($full_wide_elements) && in_array($section, $full_wide_elements) ){
		$class = 'container-fullwide';
	} else {
		$class = 'container';
	}
	
	$class .= ' prt-container-for-'.$section; // adding general class
	
	return $class;
	
}
}


/**
 *  Header main classes
 */
if( !function_exists('preyantechnosys_header_class') ){
function preyantechnosys_header_class( $extra_class='' ){
	$header_bg_color              = preyantechnosys_get_option( 'header_bg_color' );
	$header_responsive_icon_color = preyantechnosys_get_option( 'header_responsive_icon_color' );
	$megamenu_override            = preyantechnosys_get_option( 'megamenu-override' );
	$sticky_header_bg_color       = preyantechnosys_get_option( 'sticky_header_bg_color' );
	$header_menu_position         = preyantechnosys_get_option( 'header_menu_position' );
	$headerlogo_bg_color         = preyantechnosys_get_option( 'header_logo_bg_color' );
	$header_text_abovemenu		  = preyantechnosys_get_option('header_text_abovemenu');
	$logo_in_box				  = preyantechnosys_get_option('logo_in_box');
	
	$class				= array();
	$headerstyle 		= preyantechnosys_get_headerstyle();
	$valid_headerstyle	= array(
							'classic',
							'classic-two',
							'classic-three',
							'classic-overlay',
							'infostack',
							'toplogo',
							'classic-overlay2',
						);
		
	// header bg class
	if( !empty($header_bg_color) ) {
		$class[] = 'prt-bgcolor-'.esc_attr( $header_bg_color );
	};
	
	// sticky header bg class
	if( !empty($sticky_header_bg_color) ) {
		$class[] = 'prt-sticky-bgcolor-'.esc_attr( $sticky_header_bg_color );
	};
	
	// Responsive icon (like responsive menu, cart icon, search icon) color
	if( !empty($header_responsive_icon_color) && $header_bg_color=='custom' ) {
		$class[] = 'prt-responsive-icon-'.esc_attr( $header_responsive_icon_color );
	};
	
	
	// Header Menu Postion class for specific header styles only
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $header_menu_position ) ){
		$class[] = 'prt-header-menu-position-'. sanitize_html_class( $header_menu_position );
	}
	
	// Header Menu Postion class for specific header styles only
	if(( $headerstyle == 'classic-highlight' ) && !empty( $headerlogo_bg_color ) ){
		$class[] = 'prt-logo-bgcolor-'. sanitize_html_class( $headerlogo_bg_color );
	}
	
	// Override Max Mega Menu style
	if( $megamenu_override == true ){
		$class[] = 'prt-mmmenu-override-yes';
	}
	
	
	// For "CLASSIC INFO STACK" header style only... Check if content above menu is set or not and add class on it
	$tm_above_content_class = 'prt-above-content-yes';
	if( $header_text_abovemenu=='' && 'classic2'==$headerstyle ){
		$tm_above_content_class = 'prt-above-content-no';
	}
	$class[] = $tm_above_content_class;
	
	// logo as box style
	if( $logo_in_box == 'yes' ){
		$class[] = 'prt-logo-boxstyle';
	}
	
	// extra class
	if( !empty($extra_class) ){
		$class[] = $extra_class;
	}
	
	// processing and preparing all class
	if( count($class)>0 ){
		$class = implode(' ', $class );
	} else {
		$class = '';
	}
	
	// Return data
	return $class;

}
}


/**
 *  Header main classes
 */
if( !function_exists('preyantechnosys_header_w_class') ){
function preyantechnosys_header_w_class( $extra_class='' ){
	$class					= array();
	$header_text_abovemenu	= preyantechnosys_get_option('header_text_abovemenu');
	$header_bg_color		= preyantechnosys_get_option('header_bg_color');
	$headerstyle 			= preyantechnosys_get_headerstyle();
	
	
	// Common class
	$class[] = 'prt-stickable-header-w';
	
	
	// For "CLASSIC INFO STACK" header style only... Check if content above menu is set or not and add class on it
	$tm_above_content_class = 'prt-above-content-yes';
	if( $header_text_abovemenu=='' && 'classic2'==$headerstyle ){
		$tm_above_content_class = 'prt-above-content-no';
	}
	$class[] = $tm_above_content_class;
	
	// header bg color in wraper div
	if( !empty($header_bg_color) ){
		$class[] = 'prt-bgcolor-' . $header_bg_color;
	}
	
	// processing and preparing all class
	if( count($class)>0 ){
		$class = implode(' ', $class );
	} else {
		$class = '';
	}
	
	return $class;
	
}
}


/**
 * adding height for menu area in selected headerstyle only
 */
if( !function_exists('preyantechnosys_header_menuarea_height') ){
function preyantechnosys_header_menuarea_height(){
	$return                 = '60';
	$header_menuarea_height = preyantechnosys_get_option('header_menuarea_height');
	
	if( !empty($header_menuarea_height) ){
		$return = $header_menuarea_height;
	}
	return $return;
	
}
}
 

/**
 *  Header main classes
 */
if( !function_exists('preyantechnosys_sticky_header_class') ){
function preyantechnosys_sticky_header_class(){
	$class         = '';
	$sticky_header = preyantechnosys_get_option('sticky_header');
	
	// Check if sticky header enabled
	if( $sticky_header==true) {
		$class .= ' ' . sanitize_html_class('prt-stickable-header');
	};
	
	return $class;

}
}

/*
 *  Header dynamic class for different settings
 */
if ( !function_exists('preyantechnosys_headerclass') ){
function preyantechnosys_headerclass(){
	global $minemo_theme_options;
	$mainmenu_active_link_color = preyantechnosys_get_option('mainmenu_active_link_color');
	$dropmenu_active_link_color = preyantechnosys_get_option('dropmenu_active_link_color');
	$dropdown_menu_separator    = preyantechnosys_get_option('dropdown_menu_separator');
	
	$headerClassList = array();
	
	// Main Menu active link color
	if( !empty($mainmenu_active_link_color) ){
		$headerClassList[] = 'prt-mmenu-active-color-'.sanitize_html_class($mainmenu_active_link_color);
	} else {
		$headerClassList[] = 'prt-mmenu-active-color-skin';
	}
	
	// Dropdown Menu active link color
	if( !empty($dropmenu_active_link_color) ){
		$headerClassList[] = 'prt-dmenu-active-color-'. sanitize_html_class($dropmenu_active_link_color);
	} else {
		$headerClassList[] = 'prt-dmenu-active-color-skin';
	}
	
	// Dropdown Menu separator
	if( !empty($dropdown_menu_separator) ){
		$headerClassList[] = 'prt-dmenu-sep-'. sanitize_html_class($dropdown_menu_separator);
	} else {
		$headerClassList[] = 'prt-dmenu-sep-grey';
	}

	//header border
	if( !empty($minemo_theme_options['border_below_header_area']) ){
		$headerClassList[] = ' prt-header-sep-'.sanitize_html_class($minemo_theme_options['border_below_header_area']);
	}


   //header button bgcolor
	if( !empty($minemo_theme_options['header_button_bgcolor']) ){
		$headerClassList[] = ' prt-header-button-bgcolor'.sanitize_html_class($minemo_theme_options['header_button_bgcolor']);
	}
	
	
	return ' '.implode(' ', $headerClassList);
}
}


/*
 *  Header dynamic class for different settings
 */
if ( !function_exists('preyantechnosys_get_headerstyle') ){
function preyantechnosys_get_headerstyle(){
	$return      = 'classic';
	$headerstyle = preyantechnosys_get_option('headerstyle');
	
	if( !empty($headerstyle) ){
		$return = $headerstyle;
	}
		
	return $return;
	
}
}

/*
 *  Header dynamic class for different settings
 */
if ( !function_exists('preyantechnosys_header_style_class') ){
function preyantechnosys_header_style_class( $echo=false ){
	$return = '';
	
	// Main header class so we can understand the selected header style
	$curr_headerstyle = preyantechnosys_get_headerstyle();
	$headerstyle = preyantechnosys_get_headerstyle();
	$headerstyle = str_replace('-overlay','', $headerstyle);
	$headerstyle = str_replace('-rtl','', $headerstyle);
	$return     .= ' prt-header-style-'. $headerstyle;

	if (strpos( preyantechnosys_get_headerstyle(), 'overlay') !== false) {
		$return .= ' prt-header-overlay';
	}
	
	// Main menu count and add class in body tag so we can design it
	$total_count	= 0;
	if ( has_nav_menu( 'preyantechnosys-main-menu' ) ) {  // if menu is set
		$menu_locations = get_nav_menu_locations();
		$menu			= wp_get_nav_menu_object( $menu_locations[ 'preyantechnosys-main-menu' ] );
		$menu_items		= wp_get_nav_menu_items($menu->term_id);
		foreach( $menu_items as $menu_item ){
			if( $menu_item->menu_item_parent === '0' ){
				$total_count++;
			}
		}
	} else {  // if menu not set so get total pages and count parent pages
		$pages = get_pages(); 
		foreach( $pages as $page ){
			if( $page->post_parent === 0 ){
				$total_count++;
			}
		}
	}
	$return	 .= ' prt-main-menu-total-' . $total_count;
	if( $total_count>6 ){
		$return .= ' prt-main-menu-more-than-six';
	}
		
	if ( (strpos( preyantechnosys_get_headerstyle(), 'rtl') !== false) || ((is_rtl()) && (in_array($curr_headerstyle, array('classic','classic-overlay','classic-box-overlay','infostack','infostack-overlay')))) ) {
		$return .= ' prt-header-invert';
	}
	
	return $return;
	
}
}

/**
 *  Header inline style
 */
if( !function_exists('preyantechnosys_header_menu_class') ){
function preyantechnosys_header_menu_class(){
	global $minemo_theme_options;
	
	$class                       = '';
	$header_menu_bg_color        = preyantechnosys_get_option('header_menu_bg_color');
	$sticky_header_menu_bg_color = preyantechnosys_get_option('sticky_header_menu_bg_color');
	
	
	if( !empty($header_menu_bg_color) ){
		$class .= ' prt-header-menu-bg-color-'. sanitize_html_class($header_menu_bg_color) .' prt-bgcolor-'. sanitize_html_class($header_menu_bg_color);
	}
	
	// sticky class
	if( !empty($sticky_header_menu_bg_color) ){
		$class .= ' prt-sticky-bgcolor-'. sanitize_html_class($sticky_header_menu_bg_color);
	}
	
	return $class;
	
}
}


/* ===================================================================== */
/* --------------------- Floating Bar functions  ----------------------- */


/**
 *  ThemetechMount Floating Bar classes
 */
if( !function_exists('preyantechnosys_fbar_show') ){
function preyantechnosys_fbar_show(){
	$fbar_show = preyantechnosys_get_option('fbar_show');
	$return    = false;
	
	if( $fbar_show==true ){
		$return = true;
	}
	
	return $return;
}
}


/**
 *  Floating Bar button classes
 */
if( !function_exists('preyantechnosys_fbar_btn') ){
function preyantechnosys_fbar_btn(){
	
	$fbar_btn_bg_color   = preyantechnosys_get_option('fbar_btn_bg_color');
	
	$return = '<!-- Open/close button -->
			<span class="preyantechnosys-fbar-btn ' . preyantechnosys_sanitize_html_classes(preyantechnosys_fbar_btn_classes()) . '">
				<a href="javascript:void(0)" class="preyantechnosys-fbar-btn-link ' . preyantechnosys_sanitize_html_classes($fbar_btn_bg_color) . '">
					' . preyantechnosys_fbar_open_icon() . '
					' . preyantechnosys_fbar_close_icon() . '
					<span class="prt-hide">' . esc_attr__('Open', 'minemo') . '</span>
				</a>
			</span>';
			
	return $return;
}
}

/**
 *  Floating Bar button classes
 */
if( !function_exists('preyantechnosys_fbar_btn_classes') ){
function preyantechnosys_fbar_btn_classes(){
		
	$topbarbgcolor = preyantechnosys_get_option('topbarbgcolor');
	$fbar_position = preyantechnosys_get_option('fbar-position');
	
	
	$return = array();
	
	if( !empty($topbarbgcolor) && trim($topbarbgcolor)=='skincolor' ){
		$return[] = 'prt-fbar-btn-bgnoskin';
	}
	
	// Floating bar position class
	if( !empty($fbar_position) ){
		$return[] = 'prt-fbar-btn-cposition-' . $fbar_position;
	}
	
	return implode(' ',$return);
}
}


/**
 *  ThemetechMount Floating Bar close icon
 */
if( !function_exists('preyantechnosys_fbar_open_icon') ){
function preyantechnosys_fbar_open_icon(){
	$return = '';
	
	$fbar_handler_icon = preyantechnosys_get_option('fbar_handler_icon');
	$return = '<span class="prt-fbar-open-icon prt-icolor-' . preyantechnosys_sanitize_html_classes( preyantechnosys_get_option('fbar_icon_color') ) . '">' .  $fbar_handler_icon . '</span>';
	
	return $return;
}
}

/**
 *  ThemetechMount Floating Bar close icon
 */
if( !function_exists('preyantechnosys_fbar_close_icon') ){
function preyantechnosys_fbar_close_icon(){
	$return = '';
	
	$fbar_handler_icon_close = preyantechnosys_get_option('fbar_handler_icon_close');
	$return = '<span class="prt-fbar-close-icon prt-icolor-' . preyantechnosys_sanitize_html_classes( preyantechnosys_get_option('fbar_icon_color') ) . '" style="display:none;">' . $fbar_handler_icon_close . '</span>';
	
	return $return;
}
}


/**
 *  ThemetechMount Floating Bar close icon for content area
 */
if( !function_exists('preyantechnosys_fbar_close_icon_for_content_area') ){
function preyantechnosys_fbar_close_icon_for_content_area(){
	$return = '';
	
	$fbar_handler_icon_close = preyantechnosys_get_option('fbar_handler_icon_close');
	$return = '<span class="prt-fbar-close-icon prt-icolor-' . preyantechnosys_sanitize_html_classes( preyantechnosys_get_option('fbar_icon_color') ) . '">' .  $fbar_handler_icon_close . '</span>';
	
	return $return;
}
}

/**
 *  ThemetechMount Floating Bar classes
 */
if( !function_exists('preyantechnosys_fbar_classes') ){
function preyantechnosys_fbar_classes(){
	global $minemo_theme_options;
	
	$fbar_background = preyantechnosys_get_option('fbar_background');
	$topbarbgcolor   = preyantechnosys_get_option('topbarbgcolor');
	
	$optionsArray = array(
						'fbar_show',
						'fbar_bg_color',
						'fbar_text_color',
						'fbar_text_custom_color',
						'fbar_background',
						'fbar_handler_icon',
						'fbar_handler_icon_close'
	);

	// Creating variables
	foreach( $optionsArray as $option ){
		
		$current_val = preyantechnosys_get_option($option);
		
		if( !is_array($current_val) ){  // bypassing color value which is array by default
			$fbar_opt = esc_attr($current_val);
		} else {
			$fbar_opt = $current_val;
		}
		$$option = $fbar_opt;
	
	}	
	
	$classes = array();
	$classes[] = 'prt-textcolor-'. sanitize_html_class($fbar_text_color); // Text Color
	$classes[] = 'prt-bgcolor-'. sanitize_html_class($fbar_bg_color); // BG Color
	
	if( !empty($fbar_background['image']) ){
		$classes[] = 'prt-bg';
		$classes[] = 'prt-bgimage-yes';
	} else {
		$classes[] = 'prt-bgimage-no';
	}
	
	
	// If Topbar bg color is set to SKIN color than set the icon color with grey or dark-grey color so it will be visible
	if( $topbarbgcolor == 'skincolor' ){
		$classes[] = 'prt-fbar-btn-bgnoskin';
	}
	
	// Return data
	return implode(' ',$classes);
}
}


/**
 * Add inline CSS for Floating Bar area based on certain conditions. 
 */
if(!function_exists('preyantechnosys_floatingbar_inline_css')){
function preyantechnosys_floatingbar_inline_css(){
		
	$return = '';
	
	// getting options
	$fbar_show                = preyantechnosys_get_option('fbar_show');
	$fbar_bg_color            = preyantechnosys_get_option('fbar_bg_color');
	$fbar_text_color          = preyantechnosys_get_option('fbar_text_color');
	$fbar_text_custom_color   = preyantechnosys_get_option('fbar_text_custom_color');
	$fbar_icon_color          = preyantechnosys_get_option('fbar_icon_color');
	$fbar_icon_custom_color   = preyantechnosys_get_option('fbar_icon_custom_color');
	$fbar_btn_bg_color  	  = preyantechnosys_get_option('fbar_btn_bg_color');
	$fbar_btn_bg_custom_color = preyantechnosys_get_option('fbar_btn_bg_custom_color');

	if($fbar_show){
	
		// Inline style
		$inlineStyleAll			= '';
		$inlineStyle     		= '';
		$inlineStyle_a   		= '';
		$inlineStyle_ah  		= '';
		$inlineStyle_h   		= '';
		$inlineStyle_border   	= '';
	
		// Custom Background color RGB
		if( $fbar_bg_color == 'custom' && !empty( $fbar_bg_custom_color['rgba'] ) ){
			$return .= '.preyantechnosys-fbar-box-w:after{background-color:'.esc_attr($fbar_bg_custom_color['rgba']).';}';
		}
		
		if( $fbar_btn_bg_color == 'custom' && !empty( $fbar_btn_bg_custom_color ) ){
			$return .= '.preyantechnosys-fbar-main-w .preyantechnosys-fbar-btn a{background-color:'.esc_attr($fbar_btn_bg_custom_color).';}';
		}
		
		// Custom Text Color
		if( $fbar_text_color == 'custom' && !empty($fbar_text_custom_color) ){
			$fbar_text_custom_color  = esc_attr($fbar_text_custom_color);
			$inlineStyle			.= 'color: rgba( ' . preyantechnosys_hex2rgb($fbar_text_custom_color) . ', 0.7);';
			$inlineStyle_a			.= 'color: rgba( ' . preyantechnosys_hex2rgb($fbar_text_custom_color) . ', 1);';
			$inlineStyle_ah			.= 'color: rgba( ' . preyantechnosys_hex2rgb($fbar_text_custom_color) . ', 0.7);';
			$inlineStyle_h  		.= 'color: rgba( ' . preyantechnosys_hex2rgb($fbar_text_custom_color) . ', 1);';
			$inlineStyle_border  	.= 'border-color: rgba( ' . preyantechnosys_hex2rgb($fbar_text_custom_color) . ', 0.7);';
			
			$return .= "
				.preyantechnosys-fbar-box-w *, .prt-wrap-cell.prt-fbar-input .search_field.selectbox:after, .preyantechnosys-fbar-box .search_field select, .preyantechnosys-content-team-search-box .search_field select, .preyantechnosys-fbar-box .search_field i, .preyantechnosys-content-team-search-box .search_field i { $inlineStyle }
				.preyantechnosys-fbar-box-w a, .widget_calendar #today{ $inlineStyle_a }
				.preyantechnosys-fbar-box-w a:hover{ $inlineStyle_ah }
				.preyantechnosys-fbar-box-w .widget .widget-title{ $inlineStyle_h }
				.preyantechnosys-fbar-box-w .widget .widget-title, .preyantechnosys-fbar-box-w .widget_calendar table, .preyantechnosys-fbar-box-w .widget_calendar th, .preyantechnosys-fbar-box-w .widget_calendar td, .preyantechnosys-fbar-box .search_field, .contact-info{ $inlineStyle_border }
			";
		}
		
		if( $fbar_icon_color=='custom' ){
			$return .= '
			.preyantechnosys-fbar-btn a i{
				color: ' . $fbar_icon_custom_color . ';
			}
			';
		}
		
	} 
	
	return $return;
	
}
}

/* =============================================================== */
/* --------------------- Footer functions  ----------------------- */
if( !function_exists('preyantechnosys_footer_row_class') ){
function preyantechnosys_footer_row_class( $row='first' ){
	$class = '';
	global $minemo_theme_options;
	
	// BG color
	if( !empty($minemo_theme_options[$row.'_footer_bg_color']) ){
		$class .= ' prt-bg prt-bgcolor-'.sanitize_html_class($minemo_theme_options[$row.'_footer_bg_color']);
	}
	
	// Text color
	if( !empty($minemo_theme_options[$row.'_footer_text_color']) ){
		$class .= ' prt-textcolor-'.sanitize_html_class($minemo_theme_options[$row.'_footer_text_color']);
	}
	
	// If bg image is there
	if( !empty($minemo_theme_options[$row.'_footer_bg_all']['image']) ){
		$class .= ' prt-bgimage-yes';
	} else {
		$class .= ' prt-bgimage-no';
	}
	
	// border type
	if( !empty($minemo_theme_options[$row.'_footer_bordertype']) ){
		$class .= ' prt-bordertype-'.sanitize_html_class($minemo_theme_options[$row.'_footer_bordertype']);
	}
	
	//widget border color
	if( $row =='first' && !empty($minemo_theme_options['border_between_footerwidget_area']) ){
		$class .= ' prt-footerrow-sep'.sanitize_html_class($minemo_theme_options['border_between_footerwidget_area']);
	}
	
	if( $row =='first' && !empty($minemo_theme_options['first_footer_widget_seperator']) ){
		$class .= ' prt-widgetsep-'.sanitize_html_class($minemo_theme_options['first_footer_widget_seperator']);
	}
	if( $row =='second' && !empty($minemo_theme_options['border_between_footerwidget_area']) ){
		$class .= ' prt-footerrow-sep'.sanitize_html_class($minemo_theme_options['border_between_footerwidget_area']);
	}
	// Top border for Footer Copyright area 
	if( $row=='bottom' && !empty($minemo_theme_options['border_above_copyright_area']) ){
		$class .= ' prt-bordercolor-'.sanitize_html_class($minemo_theme_options['border_above_copyright_area']);
	}
	if( $row =='second' && !empty($minemo_theme_options['second_footer_widget_seperator']) ){
		$class .= ' prt-widgetsep-'.sanitize_html_class($minemo_theme_options['second_footer_widget_seperator']);
	}
	// Return data
	return $class;
	
}
}

/**
 *  Create list of google fonts to set in footer
 *  usage: preyantechnosys_footer_google_fonts_array('Raleway', '100');
 */
if( !function_exists('preyantechnosys_footer_google_fonts_array') ){
function preyantechnosys_footer_google_fonts_array( $font_family, $font_weight='normal' ){
	$font_family = str_replace(' ','+', $font_family);
	$font_family = str_replace(' ','+', $font_family);
	$font_family = str_replace(' ','+', $font_family);
	
	global $tm_global_footer_gfonts;
	
	if( !is_array($tm_global_footer_gfonts) ){
		$tm_global_footer_gfonts = array();
	}
	// check if font_family already exists
	if( isset($tm_global_footer_gfonts[$font_family]) ){
		// check if font_weight already exists
		
		if( is_array($tm_global_footer_gfonts[$font_family]) && !in_array($font_weight, $tm_global_footer_gfonts[$font_family] ) ){
			$tm_global_footer_gfonts[$font_family][] = $font_weight;
		}
	} else {
		// font not found in global variable
		$tm_global_footer_gfonts[$font_family] = array($font_weight);
	}
	
}
}

if( !function_exists('preyantechnosys_portfolio_single_image_path') ){
function preyantechnosys_portfolio_single_image_path(){
	$image = '';
	if (has_post_thumbnail()){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		if( !empty($image[0]) ){
			$image = $image[0];
		}
	};
	
	
	// Return data
	return $image;
	
}
}

/* =============================================================== */
/* ---------------------  Team Member box  ----------------------- */


if( !function_exists('preyantechnosys_box_team_social_links') ){
function preyantechnosys_box_team_social_links(){
	$return = '';
	
	$data   = preyantechnosys_get_meta( 'preyantechnosys_team_member_social', 'social_icons_list' );
	
	if( !empty($data) && is_array($data) && count($data)>0 ){
		$return .= '<div class="prt-team-social-links-wrapper">';
		$return .= '<ul class="prt-team-social-links">';
		
		// getting all social name with slug
		$all_social = preyantechnosys_shared_social_list();
		
		foreach($data as $social ){
			
			$social_name = ( !empty($all_social[$social['social_icons_list_icon']]) ) ? $all_social[ $social['social_icons_list_icon'] ] : ucwords($social['social_icons_list_icon']) ;
			
			$return .= '<li class="'. $social_name .'"><a href="'. $social['social_icons_list_link'] .'" target="_blank"><i class="prt-minemo-icon-'. $social['social_icons_list_icon'] .'"></i><span class="prt-hide">'. $social_name .'</span></a></li>';
		}
		
		$return .= '</ul> <!-- .prt-team-social-links --> ';
		$return .= '</div> <!-- .prt-team-social-links-wrapper --> ';
	}
	
	// Return data
	return $return;
}
}

/**
 *  Team Member Detail Box title
 */
if ( !function_exists( 'preyantechnosys_teamdetails_title' ) ){
function preyantechnosys_teamdetails_title( $post_id='' ){
	$return = '';
	
	$teammember_detailsbox_title = preyantechnosys_get_option('teammember_detailsbox_title');
	
	// Box title
	$box_title = '';
	if( !empty($teammember_detailsbox_title) ){
		$box_title = esc_attr( $teammember_detailsbox_title );
	}
	if( !empty($box_title) ){
		$box_title = '<h2 class="preyantechnosys-prt-detailbox-title">'.$box_title.'</h2>';
	}
	
	// preparing final output
	$return = '<div class="prt-details-title">' . $box_title . '</div><!-- .prt-details-title -->';
	
	return $return;
}
}

/**
 * Print blog readmore text for blogbox shortcode
 *
 * Create your own cymolthemes_blogbox_readmore_text() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
if ( !function_exists( 'preyantechnosys_team_readmore_text' ) ){
function preyantechnosys_team_readmore_text(){
	$team_readmore_text = preyantechnosys_get_option('team_readmore_text');
	$return             = esc_attr__('Read More', 'minemo');
	
	// Get text from Theme Options
	if( !empty($team_readmore_text) ){
		$return = esc_attr($team_readmore_text);
	}
	
	return $return;
}
}

if( !function_exists('preyantechnosys_short_desc') ){
function preyantechnosys_short_desc(){
	$return = '';
	
	if( has_excerpt() ){
		$return  = nl2br( get_the_excerpt() );
		$return  = do_shortcode($return);
	} else {
		$return = strip_shortcodes( nl2br(get_the_content( 'Read More' )) );	
	}
	
	if( !empty($return) ){
		$return = '<div class="prt-short-desc">'. $return .'</div>';
	}
	
	return $return;
}
}

/**
 * Add HTTP to url if not added already
 */
if( !function_exists('minemo_addhttp') ){
	function minemo_addhttp($url){
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)){
			$url = "http://" . $url;
		}
		return $url;
	}
}


/**
 * Change order of heading
 */
if( !function_exists('preyantechnosys_change_heading_order') ){
function preyantechnosys_change_heading_order($input_code=''){
	
	
	// finding and fetching <h2> and <h4> tag
	preg_match("/<h2>(.*?)<\/h2>/", $input_code, $h2_output_array);
	preg_match("/<h4>(.*?)<\/h4>/", $input_code, $h4_output_array);
	

	// heading with attributes
	preg_match('#<h([2]) .*?class="(.*?)".*?>(.*?)<\/h[2]>#si', $input_code, $h2_custom);
	preg_match('#<h([4]) .*?class="(.*?)".*?>(.*?)<\/h[4]>#si', $input_code, $h4_custom);
	
	
	// now checking if both tags are available
	if( !empty($h2_output_array) && is_array($h2_output_array) && count($h2_output_array)==2 &&
	!empty($h4_output_array) && is_array($h4_output_array) && count($h4_output_array)==2 ){
	
		$input_code = preg_replace('/<h4>(.*?)<\/h4>/', '', $input_code);
		
		$replace_word = $h4_output_array[0];
		$input_code = str_replace( '<h2>' , $replace_word.'<h2>' , $input_code );
		
	}

	if( !empty($h2_custom) && !empty($h4_custom) ){
		
		$string_h2 = $h4_custom[0];
		$string_h4 = $h2_custom[0] ;
		$string_h6 = '<h6 class="">this is sample </h6>';
		
		$input_code = preg_replace('#<h([2]) .*?class="(.*?)".*?>(.*?)<\/h[2]>#si', $string_h6, $input_code);
		
		$input_code = preg_replace('#<h([4]) .*?class="(.*?)".*?>(.*?)<\/h[4]>#si', $string_h4, $input_code);
		
		$input_code = preg_replace('#<h([6]) .*?class="(.*?)".*?>(.*?)<\/h[6]>#si', $string_h2, $input_code);
		
	}
	
	return $input_code;

}
}


/**
 * Testimonials Title and Designation details
 *
 * Create your own preyantechnosys_testimonial_title() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if(!function_exists('preyantechnosys_testimonial_title')){
function preyantechnosys_testimonial_title(){
	
	$return      		= '';
	$testimonial_meta   = get_post_meta( get_the_id(), 'preyantechnosys_testimonials_details', true );
	$clienturl 			= ( !empty($testimonial_meta['clienturl']) ) ? $testimonial_meta['clienturl'] : '' ;
	$designation 		= ( !empty($testimonial_meta['designation']) ) ? $testimonial_meta['designation'] : '' ;
	
	$return .= ( !empty($clienturl) ) ? '<h3 class="preyantechnosys-author-name"><a href="'.esc_url($clienturl).'" target="_blank">'.get_the_title().'</a></h3>' : '<h3 class="preyantechnosys-author-name">'.get_the_title().'</h3>' ;
	$return .= ( !empty($designation) ) ? '<span class="preyantechnosys-box-footer">'.esc_attr($designation).'</span>' : '';
	
	return $return;
		
}
}

/**
 * Testimonials Featured Image
 *
 * Create your own preyantechnosys_testimonial_featured_image() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if(!function_exists('preyantechnosys_testimonial_featured_image')){
function preyantechnosys_testimonial_featured_image($size='thumbnail'){
	
	$return = "";
	$featured_image = preyantechnosys_featured_image($size);
	
	$return = ( !empty($featured_image) ) ? $featured_image : '<span class="preyantechnosys-icon-box"><i class="demo-icon prt-minemo-icon-quote-left"></i></span>';
	
	return $return;

}
}

/**
 * Testimonials Star Ratings details
 *
 * Create your own preyantechnosys_star_ratting() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if(!function_exists('preyantechnosys_star_ratting')){
function preyantechnosys_star_ratting(){
	$return      		= '';
	$testimonial_meta   = get_post_meta( get_the_id(), 'preyantechnosys_testimonials_details', true );
	$star_ratings		= ( !empty($testimonial_meta['star_ratings']) ) ? $testimonial_meta['star_ratings'] : '1' ;
	
	for ($i = 1; $i <= 5; $i++) {
		if( $star_ratings >= $i ){
			$return .= ' <i class="prt-minemo-icon-star-1 prt-active"></i> ';
		} else {
			$return .= ' <i class="prt-minemo-icon-star-empty-1"></i> ';
		}
	}
	return $return;
}
}

/**
 * Testimonials Highlight text Detials
 *
 * Create your own preyantechnosys_highlight_text() to override in a child theme.
 *
 * @since Labpeak 1.0
 *
 */
if(!function_exists('preyantechnosys_highlight_text')){
function preyantechnosys_highlight_text(){
	$return      		= '';
	$testimonial_meta   = get_post_meta( get_the_id(), 'preyantechnosys_testimonials_details', true );
	$highlighttext 		= ( !empty($testimonial_meta['highlighttext']) ) ? $testimonial_meta['highlighttext'] : '' ;
		
	$return .= ( !empty($highlighttext) ) ? '<div class="preyantechnosys-box-highlight"><h2 class="preyantechnosys-review-highlight">'.esc_attr($highlighttext).'</h2></div>' : '';
	
	return $return;
}
}


/**
 * Header Text Area depending on header style
 *
 * Create your own preyantechnosys_header_text() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if( !function_exists('preyantechnosys_header_text') ){
function preyantechnosys_header_text(){
	$return		 = '';
	$floting_text = '';
	$headerstyle = preyantechnosys_get_headerstyle();
	$header_text = preyantechnosys_get_option('header_text');
	
	// list of valid header style where the text area will appear
	$valid_headerstyle = array(
							'classic',
							'classic-two',
							'classic-three',
							'classic-overlay',
							'infostack',
							'classic-overlay2',	
							'toplogo',
						);
	
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $header_text ) ){
		$header_text = preyantechnosys_wp_kses( $header_text );
		
		$return      = '<div class="prt-header-text-area"><div class="header-info-widget">'.do_shortcode( $header_text ).'</div></div>';
	}

	echo preyantechnosys_wp_kses($return);
	
}
}


if( !function_exists('preyantechnosys_slider_quicktext') ){
function preyantechnosys_slider_quicktext(){
	$return		 = '';
	$headerstyle = preyantechnosys_get_headerstyle();
	$slider_quicktext = preyantechnosys_get_option('header_slider_lefttext');
	
	// list of valid header style where the text area will appear
	$valid_headerstyle = array(					
							'classic-overlay2',	
							'infostack',
						);
	
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $slider_quicktext ) ){
		$slider_quicktext = preyantechnosys_wp_kses( $slider_quicktext );
		
		$return      = '<div class="prt-quickdetails-area">'.do_shortcode( $slider_quicktext ).'</div>';
	}

	echo preyantechnosys_wp_kses($return);
	
}
}


/**
 * Classic Info Header Text Area depending on header style
 *
 * Create your own preyantechnosys_classicinfo_header_text() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
 
if( !function_exists('preyantechnosys_classicinfo_header_text') ){
function preyantechnosys_classicinfo_header_text(){
	$return		 = '';
	$headerstyle = preyantechnosys_get_headerstyle();
	$classicinfo_phone_text = preyantechnosys_get_option('infostack_phone_text');
	
	// list of valid header style where the text area will appear
	$valid_headerstyle = array(
							'classicinfo',	
							'toplogo',
							'infostack',
						);
	
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $classicinfo_phone_text) ){
		$classicinfo_phone_text = preyantechnosys_wp_kses( $classicinfo_phone_text );
		$return      = '<div class="prt-header-text-area">'.do_shortcode( $classicinfo_phone_text ).'</div>';
	}

	echo preyantechnosys_wp_kses($return);	
}
}

if( !function_exists('preyantechnosys_classicinfo_header_text1') ){
function preyantechnosys_classicinfo_header_text1(){
	$return		 = '';
	$headerstyle = preyantechnosys_get_headerstyle();
	$classicinfo_phone_text1 = preyantechnosys_get_option('infostack_phone_text1');
	
	// list of valid header style where the text area will appear
	$valid_headerstyle = array(
							'classicinfo',	
							'toplogo',
							'infostack',
						);
	
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $classicinfo_phone_text1) ){
		$classicinfo_phone_text1 = preyantechnosys_wp_kses( $classicinfo_phone_text1 );
		$return      = '<div class="prt-header-text-area1">'.do_shortcode( $classicinfo_phone_text1 ).'</div>';
	}

	echo preyantechnosys_wp_kses($return);	
}
}


/**
 * Client Logo boxes. 
 *
 * Create your own preyantechnosys_get_clientboxes() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if( !function_exists('preyantechnosys_get_clientboxes') ){
function preyantechnosys_get_clientboxes( $vars = array() ){
	$return 			= '';
	$group 				= ( !empty( $vars['group'] ) ) ? $vars['group'] : '' ;
	$column 			= ( !empty( $vars['column'] ) ) ? $vars['column'] : '' ;
	$show 				= ( !empty( $vars['show'] ) ) ? $vars['show'] : '' ;
	$clients 			= preyantechnosys_get_option('clients');
	$list_of_clients 	= array();
	$finalkeys			= array();
	
	// created groups array
	if( !empty( $group ) ){
		$group = explode(',',$group);
	}
		
	//creating clients list
	if( is_array( $group ) && !empty( $group ) ){
		foreach( $clients as $key => $val ){	
			if( isset( $val['client_group'] ) && is_array( $val['client_group'] ) ){
				foreach( $group as $gkey => $gval ){
					if( in_array( $gval, $val['client_group']) ){
						$finalkeys[] = $key;
					}
				}
			}
		}
		
		$finalkeys = array_unique( $finalkeys );
		
		if( !empty( $finalkeys ) ){
			foreach( $finalkeys as $key => $val ){
				$list_of_clients[] = $clients[$val];
			}
		}
		
	} else{
		$list_of_clients = $clients;
	}
		
	$i = 0;
	foreach( $list_of_clients as $key => $val ){
		$i++;
		
		$client_name 	= trim( $val['client_name'] );
		$client_website = trim( $val['client_website'] );
		$client_logo    = wp_get_attachment_image( $val['client_logo'], 'full');
		$linktarget 	= '';
		
		// settings links target attribute
		if( $client_website != '' ){
			$linktarget = 'target="_blank"';
		} else {
			$client_website = 'javascript:void(0);';
		}
		
		
		if( !empty( $client_logo ) ){
			$return .= preyantechnosys_column_div( 'start', $column );
			$return .= '<a href="'.esc_url( $client_website ).'" '.$linktarget.' data-tooltip="'.esc_attr( $client_name ).'" title="'.esc_attr( $client_name ).'">';
			$return .= $client_logo;
			$return .= '</a>';
			$return .= preyantechnosys_column_div( 'end', $column );
		} else {
			$return .= '<!-- No Featured Image For this Client -->';
		}
		
		// breaking out of loop when items equals show
		if($i == $show){
			break;
		}

	}
	
	return $return;
}
}

/**
 *  Show RevolutionSlider select option
 */
if( !function_exists('preyantechnosys_revslider_array') ){
function preyantechnosys_revslider_array( $countonly=false ) {
	$sliders = array();
	
	// Add This only if RevSlider is Activated
	if ( class_exists( 'RevSlider' ) ) {
		
		/* get revolution array */
		$slider     = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		
		if( count($arrSliders)>0 ){
			foreach( $arrSliders as $arrSlider_key => $arrSlider_val ){
				$sliders[$arrSlider_val->getAlias()] = $arrSlider_val->getTitle();
			}
		}
	}
	
	if( $countonly==true ){
		return count($sliders);
	} else {
		// Check if slider created
		if( count($sliders)==0 ){
			$sliders[''] = esc_attr__('(No Slider Found)', 'minemo');
		}
		return $sliders;
	}
}
}

if( !function_exists('preyantechnosys_layerslider_array') ){
function preyantechnosys_layerslider_array( $countonly=false ){
	
	//check if LayerSlider plugins is active 
	if ( function_exists('lsSliders') ) {
		
		$sliders 		= lsSliders();
		$slider_names  	= array();
		
		foreach( $sliders as $key => $val ){		
			$slider_names[$val['id']] = $val['name'].' (ID: '. $val['id'] .')';
		}
		
		if( $countonly == true ){
			return count($slider_names);
		} else {
			// Check if slider created
			if( count($slider_names) == 0 ){
				$slider_names[''] = esc_attr__('(No Slider Found)', 'minemo');
			}
			return $slider_names;
		}
		
	}	
}
}

/* ======================================================================= */
/* ---------------------  Header Slider Functions  ----------------------- */


if( !function_exists('preyantechnosys_header_slider_show') ){
function preyantechnosys_header_slider_show(){
	$return  = false;
	$post_id = false;
	
	if( is_singular() ){
		$post_id = get_the_ID();
		
	}
	
	if( $post_id ){
		$page_slider = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		if( !empty($page_slider['slidertype']) ){
			$return = true;
		}
	}
	
	return $return;
}
}

if( !function_exists('preyantechnosys_header_slider') ){
function preyantechnosys_header_slider(){
	$return = '';
	$post_id = false;
	
	if( is_singular() ){
		$post_id = get_the_ID();
		
	}
	
	if( $post_id ){
		$page_slider = get_post_meta( $post_id, '_preyantechnosys_metabox_group', true );
		if( !empty($page_slider['slidertype']) ){
			
			switch( $page_slider['slidertype'] ){
				case 'revslider':
					if( !empty($page_slider['revslider']) ){
						$return = do_shortcode('[rev_slider alias="'. esc_attr($page_slider['revslider']) .'"]');
					}
					break;
					
				case 'layerslider':
					if( !empty($page_slider['layerslider']) ){
						$return = do_shortcode('[layerslider id="'. esc_attr($page_slider['layerslider']) .'"]');
					}
					break;
					
				case 'custom':
					if( !empty($page_slider['customslider']) ){
						$return = do_shortcode( $page_slider['customslider'] );
					}
					break;
					
			} // switch()
			
			$wrapper_class = 'preyantechnosys-slider-wide';
			// Boxed layout wrapper
			if( !empty($page_slider['slider_width']) && esc_attr($page_slider['slider_width'])=='boxed' ){
				$wrapper_class = 'container preyantechnosys-slider-boxed';
			}
			$return = '<div class="'. preyantechnosys_sanitize_html_classes($wrapper_class) .'">'.$return.'</div>';
			
		}
	}
	return $return;
}
}


/* ======================================================================= */
/* ---------------------- Sidebar related functions ---------------------- */


/**
 *  Return sidebar class for Row container or content container
 */
if( !function_exists('preyantechnosys_sidebar_class') ){
function preyantechnosys_sidebar_class($for='row'){
	
	$container = 'container';
	if( preyantechnosys_get_option('layout')=='fullwide' ){
		$container = preyantechnosys_contentarea_container_class();
	}
	
	$return_container    = $container;
	$return_row          = '';
	$return_content_area = '';
	
	// If page than remove container
	if( is_page() ){
		$return_container = '';
		if( function_exists('is_woocommerce') && ( is_cart() || is_checkout() ) ){
			$return_container = $container;
		}
	}
	
	if( in_array( esc_attr(preyantechnosys_get_sidebar_info()), array('left','right') ) ){
		$return_container    = $container;
		$return_row          = 'row multi-columns-row';
		$return_content_area = 'col-md-9 col-lg-9 col-xs-12';
		
	} else if( in_array( esc_attr(preyantechnosys_get_sidebar_info()), array('both','bothleft','bothright') ) ){
		$return_container    = $container;
		$return_row          = 'row multi-columns-row';
		$return_content_area = 'col-md-6 col-lg-6 col-xs-12';
	}
	
	// container for portfolio category
	if( is_tax( array('tm_portfolio_category','tm_team_group') ) ){
		$return_container = $container;
	}
	
	// woocommerce primary class if codestar plugin not active 
	if( !function_exists('preyantechnosys_minemo_cs_framework_init') ){
		if( function_exists('is_woocommerce') && is_woocommerce() ) {
			$return_content_area = 'col-md-12 col-lg-12 col-xs-12';
		}
	}	 
	 
	if( $for == 'content-area' ){
		return $return_content_area;
	} else if( $for == 'container' ){
		return $return_container;
	} else {
		return $return_row;
	}
	
	
}
}

/**
 *  Check for sidebar enabled for the side
 */
if( !function_exists('preyantechnosys_get_sidebar_info') ){
function preyantechnosys_get_sidebar_info( $return_total_count = false ){

	
	// Sidebar Class
	$sidebar       = esc_attr( preyantechnosys_get_option('sidebar_post') ); // Global settings
	$count_widgets = preyantechnosys_count_sidebar( 'post', $sidebar );

	// if page or single
	
	if( is_front_page() && !is_page() ){
		// Blogroll page
		$sidebar       = esc_attr( preyantechnosys_get_option('sidebar_post') ); // Global settings
		$count_widgets = preyantechnosys_count_sidebar( 'post', $sidebar );
		
	} else if( is_home() || is_page() || is_singular() ){
		
		// Getting page/post/singluar id 
		$page_id = get_the_ID();
		if( is_home() ){
			$page_id = get_option('page_for_posts');
		}
		
		// global sidebar for page
		if( is_page() ){
			$sidebar = esc_attr( preyantechnosys_get_option('sidebar_page') ); // Global settings
			$count_widgets = preyantechnosys_count_sidebar( 'page', $sidebar );
			
			if( defined( 'YITH_WCWL_INIT' ) ){  // YITH Wishlist
				$yith_wcwl_wishlist_page_id = get_option('yith_wcwl_wishlist_page_id');
				if( get_the_ID() == $yith_wcwl_wishlist_page_id ){
					$count_widgets = preyantechnosys_count_sidebar( 'woocommerce', $sidebar );
				}
			}
		}
		
		// if Team member
		if( is_singular('prt-team-member') ){
			$sidebar = esc_attr( preyantechnosys_get_option('sidebar_team_member') ); // Global settings
			$count_widgets = preyantechnosys_count_sidebar( 'team-member', $sidebar );
		}
		
		// if Portfolio
		if( is_singular('prt-portfolio') ){
			$sidebar = esc_attr( preyantechnosys_get_option('sidebar_portfolio') ); // Global settings
			$count_widgets = preyantechnosys_count_sidebar( 'portfolio', $sidebar );
		}
		
						
		// Getting sidebar value from Single (page/post/singluar)
		if( !empty($page_id) ){
			$single_sidebar = get_post_meta( $page_id, '_preyantechnosys_metabox_sidebar', true);
			if( !empty($single_sidebar['sidebar']) ){
				$sidebar = $single_sidebar['sidebar'];
				$count_widgets = preyantechnosys_count_sidebar( 'page', $sidebar );
			}
		}
		
		// if Service
		if( is_singular('prt_service') ){
			$sidebar = esc_attr( preyantechnosys_get_option('sidebar_service') ); // Global settings
			$count_widgets = preyantechnosys_count_sidebar( 'service', $sidebar );
		}
		
		// The Events Calendar
		if( is_singular('tribe_events') ){
			$sidebar_events = preyantechnosys_get_option('sidebar_events');
			$sidebar = ( !empty( $sidebar_events ) ) ? esc_attr( $sidebar_events ) : 'no' ; // Global settings
			$count_widgets = preyantechnosys_count_sidebar( 'events', $sidebar );
		}	
	}
		
	// Portfolio Category
	if( is_tax('tm_portfolio_category') ){
		$sidebar = esc_attr( preyantechnosys_get_option('sidebar_portfolio_category') ); // Global settings
		$count_widgets = preyantechnosys_count_sidebar( 'portfoliocat', $sidebar );
	}
	
	// Service Category
	if( is_tax('prt_service_category') ){
		$sidebar = esc_attr( preyantechnosys_get_option('sidebar_service_category') ); // Global settings
		$count_widgets = preyantechnosys_count_sidebar( 'servicecat', $sidebar );
	}
	
	// Team Group
	if( is_tax('prt_team_group') ){
		$sidebar = esc_attr( preyantechnosys_get_option('sidebar_team_member_group') ); // Global settings
		$count_widgets = preyantechnosys_count_sidebar( 'team-member-group', $sidebar );
	}
	
	// WooCommerce sidebar class
	if( function_exists('is_woocommerce') && is_woocommerce() ) {
		if( is_singular() ){
			$sidebar_woocommerce = preyantechnosys_get_option('sidebar_singlepage_woocommerce');
			$sidebar = !empty( $sidebar_woocommerce ) ? esc_attr( $sidebar_woocommerce ) : 'right' ;
		}
		else {
			$sidebar_woocommerce = preyantechnosys_get_option('sidebar_woocommerce');
			$sidebar = !empty( $sidebar_woocommerce ) ? esc_attr( $sidebar_woocommerce ) : 'right' ;
		}
		
		$count_widgets = preyantechnosys_count_sidebar( 'woocommerce', $sidebar );
		
		$post_id = get_option( 'woocommerce_shop_page_id' );
		if( !empty($post_id) ){
			$single_sidebar = get_post_meta( $post_id, '_preyantechnosys_metabox_sidebar', true);
			if( !empty($single_sidebar['sidebar']) ){
				$sidebar = $single_sidebar['sidebar'];
				$count_widgets = preyantechnosys_count_sidebar( 'woocommerce', $sidebar );
			}
		}
	}
	
	// BBPress sidebar class
	if( function_exists('is_bbpress') && is_bbpress() ) {
		$sidebar_bbpress = preyantechnosys_get_option('sidebar_bbpress');
		$sidebar = !empty( $sidebar_bbpress ) ? esc_attr( $sidebar_bbpress ) : 'right' ;
		$count_widgets = preyantechnosys_count_sidebar( 'bbpress', $sidebar );
	}
	
	// Tribe Events (The Events Calendar plugin)
	if( function_exists('tribe_is_upcoming') ){
		if ( get_post_type() == 'tribe_events' || tribe_is_upcoming() || tribe_is_month() || tribe_is_by_date() || tribe_is_day() || is_single('tribe_events')){
			$sidebar_events = preyantechnosys_get_option('sidebar_events');
			$sidebar = ( !empty( $sidebar_events ) ) ? esc_attr( $sidebar_events ) : 'no' ; // Global settings
			$count_widgets = preyantechnosys_count_sidebar( 'events', $sidebar );
		}
	}
	
	
	// Search results page sidebar
	if( is_search() ){
		$sidebar_search = preyantechnosys_get_option('sidebar_search');
		$sidebar = ( !empty( $sidebar_search ) && trim( $sidebar_search )!='' ) ? esc_attr( $sidebar_search ) : 'no' ; // Global settings for search results page
		$count_widgets = preyantechnosys_count_sidebar( 'search', $sidebar );
	}
	
	// If 404 page
	if( is_404() ){
		$sidebar = 'no';
	}
	
	if( $return_total_count=='count_widgets' ){
		return $count_widgets;
	} else {
		return $sidebar;
	}
	
}
}

/**
 *  Check if sidebar
 */
if( !function_exists('preyantechnosys_count_sidebar') ){
function preyantechnosys_count_sidebar( $cpt, $sidebar ){
	
	$return = '0';
	
	$sidebars_widgets = wp_get_sidebars_widgets();
	
	if( $cpt == 'post' ){ $cpt = 'blog'; }
	
	
	if( $sidebar == 'left' || $sidebar == 'right' ){
		if( isset($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ]) ){
			if( is_array($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ]) && count($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ])>0 ){
				$return = count($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ]);
			}
		}
	} else if( $sidebar == 'both' ){
		if( isset($sidebars_widgets[ 'sidebar-left-'.$cpt ])		&&
			is_array($sidebars_widgets[ 'sidebar-left-'.$cpt ])		&&
			count($sidebars_widgets[ 'sidebar-left-'.$cpt ])>0		&&
			isset($sidebars_widgets[ 'sidebar-right-'.$cpt ])		&&
			is_array($sidebars_widgets[ 'sidebar-right-'.$cpt ])	&&
			count($sidebars_widgets[ 'sidebar-right-'.$cpt ])>0
		){
			$return = '1';
		} else {
			$return = '0';
		}
		
	}
	
	return $return;
	
}
}

/**
 *  Get sidebar value of single page/post/cpt type.
 */
if( !function_exists('preyantechnosys_single_get_sidebar_value') ){
function preyantechnosys_single_get_sidebar_value(){
	
	// Getting global sidebar value
	global $minemo_theme_options;
	
	// Globally the sidebar of POST will be used
	$sidebar = $minemo_theme_options['sidebar_post'];
	
	if( is_page() || is_singular() ){
		
		$cpt = get_post_type();
		
		// Single page/post ID
		$single_id = get_the_ID();
		if( is_home() ){ $single_id = get_option( 'page_for_posts' ); }
		
		// Single view of any of our CPT
		if( !empty($minemo_theme_options['sidebar_'.$cpt]) ){
			$sidebar = $minemo_theme_options['sidebar_'.$cpt];
		}
		
		// Getting single meta for sidebar
		$single_meta = get_post_meta( $single_id, '_preyantechnosys_metabox_sidebar', true );
		if( !empty( $single_meta['sidebar'] ) ){
			$sidebar = $single_meta['sidebar'];
		}
		
	}
		
	// If search results page
	if( is_search() ){
		$sidebar = $minemo_theme_options['sidebar_search'];
	}
		
	// If search results page
	if( is_search() ){
		$sidebar = $minemo_theme_options['sidebar_search'];
	}
		
	return $sidebar;
}
}

/**
 *  Single content area class
 */
if( !function_exists('preyantechnosys_single_contentarea_class') ){
function preyantechnosys_single_contentarea_class(){
	$return = 'col-md-12 col-lg-12 col-xs-12';
	
	if( is_page() || is_singular() ){
		
		$sidebar = preyantechnosys_single_get_sidebar_value();
		
		// Preparing return
		// adding class
		if( !empty($sidebar) && $sidebar!='no' ){
			if( $sidebar=='left' || $sidebar=='right' ){
				$return = 'col-md-9 col-lg-9 col-xs-12';
			} else {
				$return = 'col-md-6 col-lg-6 col-xs-12';
			}
		}
		
	}
	
	return $return;
	
}
}


/**
 *  Show sidebar of hide sidebar
 */
if( !function_exists('preyantechnosys_single_show_sidebar') ){
function preyantechnosys_single_show_sidebar( $side='left' ){
	$return = false;
	
	if( is_page() || is_singular() ){
		
		$sidebar = preyantechnosys_single_get_sidebar_value();
		
		// Preparing return
		if( $side=='left' ){
			if( $sidebar=='left' || $sidebar=='both' || $sidebar=='bothleft' || $sidebar=='bothright' ){
				$return = true;
			}
		} else {
			if( $sidebar=='right' || $sidebar=='both' || $sidebar=='bothleft' || $sidebar=='bothright' ){
				$return = true;
			}
		}
		
	}
	
	return $return;
	
}
}

/**
 *  Left Sidebar
 */
if( !function_exists('preyantechnosys_get_left_sidebar') ){
function preyantechnosys_get_left_sidebar(){
	if( in_array( esc_attr(preyantechnosys_get_sidebar_info()), array('left','bothleft','bothright','both') ) ){
		get_sidebar( 'left' );
	}
}
}


/**
 *  Right Sidebar
 */
if( !function_exists('preyantechnosys_get_right_sidebar') ){
function preyantechnosys_get_right_sidebar(){
	if( in_array( esc_attr(preyantechnosys_get_sidebar_info()), array('right','bothleft','bothright','both') ) ){
		get_sidebar( 'right' );
	}
}
}


/* ======================================================================= */
/* ------------------------- The Events Calendar ------------------------- */

/**
 *  Show event price
 */
if( !function_exists('preyantechnosys_event_price') ){
function preyantechnosys_event_price(){
	$return = '';
	if( function_exists('tribe_get_formatted_cost') ){
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ){
			$return = preyantechnosys_wp_kses('<div class="tribe-events-event-cost"><span> ' . esc_attr( tribe_get_formatted_cost() ) . ' </span></div>');
		}
	}

	return $return;
	
}
}

/**
 *  Show event venue
 */
if( !function_exists('preyantechnosys_event_venue') ){
function preyantechnosys_event_venue(){
	$return = '';
	$venue = tribe_get_venue();
		if ( ! empty( $venue ) ){
			$return = preyantechnosys_wp_kses('<div class="tribe-events-vanue"> <i class="fa fa-map-marker"></i> ' . esc_attr( tribe_get_venue() ) . ' </div>');
		}
	return $return;	
}
}


/**
 *  Events Box meta details
 */
if( !function_exists('preyantechnosys_event_meta') ){
function preyantechnosys_event_meta(){
	$return = '';
	$price = '';
	
	
	$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
	$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

	$start_datetime = tribe_get_start_date();
	$start_date = tribe_get_start_date( null, false, 'd M Y' );
	$start_time = tribe_get_start_date( null, false, $time_format );
	$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

	$end_datetime = tribe_get_end_date();
	$end_date = tribe_get_end_date( null, false );
	$end_time = tribe_get_end_date( null, false, $time_format );
	$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
	
	if( function_exists('tribe_get_formatted_cost') ){
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ){
			$price = '<span class="tribe-events-event-cost"> ' . esc_attr( tribe_get_formatted_cost() ) . ' </span>';
		}
	}
	
	$return .= '<div class="preyantechnosys-meta-details preyantechnosys-event-meta-details">';
		$return .= '<span class="preyantechnosys-event-meta-item preyantechnosys-event-date"> ';
			$return .= '<i class="fa fa-clock-o"></i> ';
			// All day (multiday) events
			if ( tribe_event_is_all_day() && tribe_event_is_multiday() ){
				

				$return .= '
					<span class="preyantechnosys-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' .  esc_attr( $start_date ) . ' </span> <span class="sep">-</span> 
					<span class="preyantechnosys-event-meta-dtend" title="' . esc_attr( $end_ts ) . '"> ' . esc_attr( $end_date ) . ' </span>';

			
			// All day (single day) events
			} elseif ( tribe_event_is_all_day() ){
				$return .= '<span class="preyantechnosys-event-meta-onedate" title="'. esc_attr( $start_ts ) . '"> ' . esc_attr( $start_date ) . '</span>';

			
			// Multiday events
			} elseif ( tribe_event_is_multiday() ){
				
				$return .= '<span class="preyantechnosys-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' . esc_attr( $start_datetime ) . ' </span><span class="sep">-</span> ';
				$return .= '<span class="preyantechnosys-event-meta-dtend" title="' . esc_attr( $end_ts ) . '"> ' .  esc_attr( $end_datetime ) .' </span>';


			// Single day events
			} else {
				
				$return .= '<span class="preyantechnosys-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' . esc_attr( $start_date ) . ' </span><span class="sep">-</span> ';

				$return .= '<span class="preyantechnosys-event-meta-dtend" title="' . esc_attr( $end_ts ) . '">';
					if ( $start_time == $end_time ) {
						$return .= esc_attr( $start_time );
					} else {
						$var_diff_time = $start_time . $time_range_separator . $end_time;
						$return .= esc_attr( $var_diff_time );
					}

				$return .=' </span>';
			}
		$return .=' </span>';
	$return .= '</div>';
	return $return;
}
}

/**
 *  Events Short Description
 */
if( !function_exists('preyantechnosys_event_description') ){
function preyantechnosys_event_description(){ 
	$return   = '';
	$readMore = esc_attr__('See Event', 'minemo') . '';
	
	if( has_excerpt() ){
		$return  = get_the_excerpt();
		$return .= '<div class="preyantechnosys-post-readmore"><a href="'.get_permalink().'">'.$readMore.'</a></div>';
	} else {
		global $more;
		$more = 0;
		$return = get_the_content( $readMore );
	}
	return $return;
}
}

/**
 *  Events read more
 */
if( !function_exists('preyantechnosys_event_readmore') ){
function preyantechnosys_event_readmore(){ 
	$return   = '';
	$readMore = esc_attr__('View Details', 'minemo') . ' <i class="kwicon-fa-angle-right"></i>';
	$return = '<a href="'.get_permalink().'">'.$readMore.'</a>';
	return $return;
}
}

/**
 *  Events date details
 */
if( !function_exists('preyantechnosys_event_date') ){
function preyantechnosys_event_date(){
	$return = '';
	$div_class='';
	
	$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );

	$start_datetime = tribe_get_start_date();

	
	$start_date = sprintf( '' .tribe_get_start_date(null, false, 'j') .'<span class="entry-month">' .tribe_get_start_date(null, false, 'M') .'</span>');
	
	$start_time = tribe_get_start_date( null, false, $time_format );
	$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

	$end_datetime = tribe_get_end_date();
	$end_date = sprintf( '' .tribe_get_end_date(null, false, 'j') .'<span class="entry-month">' .tribe_get_end_date(null, false, 'M') .'</span>');
	$end_time = tribe_get_end_date( null, false, $time_format );
	$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
	
	if ( tribe_event_is_multiday() ){
		$div_class='prt-md-event';	
	}

	$return .= '<div class="preyantechnosys-meta-date ' . esc_attr( $div_class ) . '">';
		$return .= '<span class="preyantechnosys-event-meta-item preyantechnosys-event-date"> ';


			// All day (multiday) events
			if ( tribe_event_is_all_day() && tribe_event_is_multiday() ){
				

				$return .= '
					<span class="preyantechnosys-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' .  preyantechnosys_wp_kses( $start_date ) . ' </span><span class="date-sep"> - </span>
					<span class="preyantechnosys-event-meta-dtend" title="' . esc_attr( $end_ts ) . '"> ' . preyantechnosys_wp_kses( $end_date ) . ' </span>';

			
			// All day (single day) events
			} elseif ( tribe_event_is_all_day() ){
				$return .= '<span class="preyantechnosys-event-meta-onedate" title="'. esc_attr( $start_ts ) . '"> ' . preyantechnosys_wp_kses( $start_date ) . '</span>';

			
			// Multiday events
			} elseif ( tribe_event_is_multiday() ){
				
				$return .= '<span class="preyantechnosys-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' . preyantechnosys_wp_kses( $start_date ) . ' </span> - ';
				$return .= '<span class="preyantechnosys-event-meta-dtend" title="' . esc_attr( $end_ts ) . '"> ' . preyantechnosys_wp_kses( $end_date ) .' </span>';


			// Single day events
			} else {
				
				$return .= '<span class="preyantechnosys-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' . preyantechnosys_wp_kses( $start_date ) . ' </span>';

				$return .= '<span class="preyantechnosys-event-meta-dtend" title="' . esc_attr( $end_ts ) . '">';
				
					if ( $start_time == $end_time ) {
						$return .= esc_attr( $start_time );
					} else {
						$var_diff_time = $start_time . $end_time;
					}

				$return .=' </span>';
			}
		$return .=' </span>';
	$return .= '</div>';
	return $return;
}
}


/* ======================================================================= */
/* ----------------------- Post comment functions ------------------------ */


/**
 *  Show sidebar of hide sidebar
 */
if( !function_exists('preyantechnosys_comment_row_template') ){
function preyantechnosys_comment_row_template($comment, $args, $depth){
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
	
	
    <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
			
		<?php if ( $comment->comment_approved == '0' ) : ?>
			 <em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'minemo' ); ?></em>
			  <br />
		<?php endif; ?>
		<div class="comment-box">
			<div class="comment-meta commentmetadata">
				<?php printf( '<cite class="prt-comment-owner fn">%s</cite> <span class="says">' . esc_attr__('says:', 'minemo' ) . '</span>', get_comment_author_link() ); ?>
				
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
				printf( esc_attr__( '%1$s at %2$s', 'minemo' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_attr__( '(Edit)', 'minemo' ), '  ', '' );
				?>
			</div>			
			<div class="author-content-wrap">
				<?php comment_text(); ?>
			</div>	
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</div>
		
		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
	
	</<?php echo esc_attr($tag); ?>>
	
    <?php
	
}
}


/**
 *  Author social links for Author Bio box
 */
if( !function_exists('preyantechnosys_author_social_links') ){
function preyantechnosys_author_social_links(){
	$return = '';
	$all_socials = array();
	
	// fetching all values
	// $all_socials[SOCIAL_CLASS]  => get_the_author_meta( 'INPUT_NAME' );
	// The "INPUT_NAME" is defined in hooks.php in preyantechnosys_author_socials() function. You can add more socials in that function.
	$all_socials['twitter']  = get_the_author_meta( 'twitter' );
	$all_socials['facebook'] = get_the_author_meta( 'facebook' );
	$all_socials['linkedin'] = get_the_author_meta( 'linkedin' );
	$all_socials['gplus']    = get_the_author_meta( 'gplus' );
	
	foreach( $all_socials as $social_class => $social_link ){
		if( !empty($social_link) ){
			$return .= '<li><a href="'. $social_link .'" target="_blank"><i class="prt-minemo-icon-'. $social_class .'"></i><span class="prt-hide">'. ucwords($social_class) .'</span></a></li>';
		}
	}
	
	if( !empty($return) ){
		$return = '<div class="prt-author-social-links-wrapper"><ul class="prt-author-social-links">' . $return . '</ul> <!-- .prt-team-social-links -->  </div> <!-- .prt-team-social-links-wrapper -->';
	}
	
	// Return data
	return $return;

}
}

/* =================================================================== */
/* ----------------------- 404 page functions ------------------------ */


if( !function_exists('preyantechnosys_404_imgdescription') ){
function preyantechnosys_404_imgdescription(){
$error404_iamgebox_text = preyantechnosys_get_option('error404_iamgebox_text');
$imgbox_text = preyantechnosys_wp_kses( $error404_iamgebox_text );
$return = ( !empty($imgbox_text) ) ? '<div class="page-content"> <p>'.do_shortcode( $imgbox_text ).'</p> </div><!-- .page-content -->' : '' ;
return $return;
}
}

/**
 *  Getting 404 heading
 */
if( !function_exists('preyantechnosys_404_heading') ){
function preyantechnosys_404_heading(){
	$heading = preyantechnosys_get_option('error404_big_text');
	$return  = ( !empty($heading) ) ? '<header class="page-header"> <h1 class="page-title">' . preyantechnosys_wp_kses( $heading ) . '</h1> </header><!-- .page-header -->' : '' ;
	return $return;
}
}

/**
 *  Getting 404 description
 */
if( !function_exists('preyantechnosys_404_description') ){
function preyantechnosys_404_description(){
	$description = preyantechnosys_get_option('error404_medium_text');
	$return  = ( !empty($description) ) ? '<div class="page-content"> <p>' . preyantechnosys_wp_kses( $description ) . '</p> </div><!-- .page-content -->' : '' ;
	return $return;
}
}


/* =================================================================== */
/* ----------------------- Search Results page ------------------------ */


/**
 *  Search results page content
 *
 *  Accepts either an array of '$classes', or a space separated string of classes and
 *  sanitizes them using the 'sanitize_html_class' function.
 */
if( !function_exists('preyantechnosys_search_results_content') ){
function preyantechnosys_search_results_content(){
	$return  = '';
	
	// total counter
	$total_page           = 10;
	$total_post           = 5;
	$total_tm_portfolio   = 3;
	$total_tm_service  	  = 3;
	$total_tm_team_member = 3;
	$total_product        = 3;
	$total_tribe_events   = 3;
	
	// zero counter to calculate
	$curr_total_page           = 1;
	$curr_total_post           = 1;
	$curr_total_tm_portfolio   = 1;
	$curr_total_tm_service     = 1;
	$curr_total_tm_team_member = 1;
	$curr_total_product        = 1;
	$curr_total_tribe_events   = 1;
	
	// storing data in this variables
	$data_page           = array();  // for page
	$data_post           = array();  // for post
	$data_tm_portfolio   = '';
	$data_tm_service	 = '';
	$data_tm_team_member = '';
	$data_product        = '';
	$data_tribe_events   = '';	
	
	// If on single CPT search results page
	if( get_query_var('post_type')=='tm_portfolio'
		|| get_query_var('post_type')=='tm_team_member'
		|| get_query_var('post_type')=='tm_service'
		|| get_query_var('post_type')=='product'
		|| get_query_var('post_type')=='tribe_events'
	){
		$total_tm_portfolio   = 9;
		$total_tm_service     = 9;
		$total_tm_team_member = 9;
		$total_tm_testimonial = 9;
		$total_product        = 9;
		$total_tribe_events   = 9;
		
	} else if( isset($_GET['post_type']) && $_GET['post_type']=='page' ){
		$total_page           = 20;
	} else if( isset($_GET['post_type']) && $_GET['post_type']=='post' ){
		// show 20 results for rest CPT
		$total_post           = 20;
	}
	
	while ( have_posts() ) : the_post();
		
		$post_type = get_post_type();
		
		switch( $post_type ){
			
			case 'post' :
				if( $curr_total_post < $total_post ){
					$data_post[] = preyantechnosys_recent_posts();
					$curr_total_post++;
				}
				break;
				
				
			case 'page' :
			
				if( $curr_total_page <= $total_page ){
					
					$data_page[] = '<li><i class="prt-skincolor fa fa-file-text-o"></i>  <span class="prt-list-li-content"><a href="' . get_permalink() . '">' . get_the_title() . '</a></span></li>';
					$curr_total_page++;
				}
				break;
			
			
			case 'tm_portfolio' :
				if( $curr_total_tm_portfolio <= $total_tm_portfolio ){
					$column   = 'three';
					$template = preyantechnosys_get_option('pfcat_view');
					
					ob_start();
					get_template_part('template-parts/portfoliobox/portfoliobox', $template);
					$boxes = ob_get_contents();
					ob_end_clean();
					
					$data_tm_portfolio .= preyantechnosys_column_div('start', $column );
						$data_tm_portfolio .= $boxes;
					$data_tm_portfolio .= preyantechnosys_column_div('end', $column );
					
					$curr_total_tm_portfolio++;
				}
				break;
				
			case 'tm_service' :
				if( $curr_total_tm_service <= $total_tm_service ){
					$column   = 'three';
					$template = preyantechnosys_get_option('services_cat_view');
					
					ob_start();
					get_template_part('template-parts/servicebox/servicebox', $template);
					$boxes = ob_get_contents();
					ob_end_clean();
					
					$data_tm_service .= preyantechnosys_column_div('start', $column );
						$data_tm_service .= $boxes;
					$data_tm_service .= preyantechnosys_column_div('end', $column );
					
					$curr_total_tm_service++;
				}
				break;
				
			case 'tm_team_member' :
				if( $curr_total_tm_team_member <= $total_tm_team_member ){
					$column   = 'three';
					$template = preyantechnosys_get_option('teamcat_view');
					
					ob_start();
					get_template_part('template-parts/teambox/teambox', $template);
					$boxes = ob_get_contents();
					ob_end_clean();
					
					$data_tm_team_member .= preyantechnosys_column_div('start', $column );
						$data_tm_team_member .= $boxes;
					$data_tm_team_member .= preyantechnosys_column_div('end', $column );
					
					
					$curr_total_tm_team_member++;
				}
				break;
					
			case 'product' :				
				if( function_exists('is_woocommerce') ){
					if( $curr_total_product <= $total_product ){
						$column   = 'three';
						$template = preyantechnosys_get_option('teamcat_view');
						
						// Getting ID of the product
						if( !empty($data_product) ){ $data_product .= ','; }
						$data_product .= get_the_ID();
						
						$curr_total_product++;
					}
				}
				break;	
				
			case 'tribe_events' :
				
				if( function_exists('tribe_is_month') ){
					if( $curr_total_tribe_events <= $total_tribe_events ){
						$column   = 'three';
						$template = preyantechnosys_get_option('teamcat_view');
											
						ob_start();
						get_template_part('template-parts/eventsbox/eventsbox', 'top-image' );
						$boxes = ob_get_contents();
						ob_end_clean();
						
						$data_tribe_events .= preyantechnosys_column_div('start', $column );
							$data_tribe_events .= $boxes;
						$data_tribe_events .= preyantechnosys_column_div('end', $column );
						
						
						$curr_total_tribe_events++;
					}
				}
				break;	
		} // switch
		
	endwhile;	

	// PAGE
	if( is_array($data_page) && count($data_page)>0 ){
		$data_page_html = '';
		
		// if more than 10
		if( !empty($_GET['post_type']) && $_GET['post_type']=='page' ){
			$shortcode1 = '';
			$shortcode2 = '';
			
			// first row
			for ($x = 0; $x < 10; $x++) {
				if( !empty($data_page[$x]) ){
					$shortcode1 .= ' '.$data_page[$x];
				}
			}
			// second row
			for ($x = 10; $x < 20; $x++) {
				if( !empty($data_page[$x]) ){
					$shortcode2 .= ' '.$data_page[$x];
				}
			}
			
			$data_page_html .= '<div class="row multi-column-row">';
			$data_page_html .= '<div class="col-sm-6">';
			$data_page_html .= '<ul class="prt-list prt-list-style-icon prt-list-icon-color-skincolor prt- prt-icon-skincolor prt-list-textsize- prt-list-icon-library-fontawesome">' . $shortcode1 . '</ul>';
			$data_page_html .= '</div>';
			$data_page_html .= '<div class="col-sm-6">';
			$data_page_html .= '<ul class="prt-list prt-list-style-icon prt-list-icon-color-skincolor prt- prt-icon-skincolor prt-list-textsize- prt-list-icon-library-fontawesome">' . $shortcode2 . '</ul>';
			$data_page_html .= '</div>';
			$data_page_html .= '</div><!-- .row -->';
			
			$data_page = $data_page_html;
			
		} else {			
			$shortcode = '';			
			// first row
			$shortcode = implode(' ', $data_page);
			$data_page_html .= '<ul class="prt-list prt-list-style-icon prt-list-icon-color-skincolor prt- prt-icon-skincolor prt-list-textsize- prt-list-icon-library-fontawesome">' . $shortcode . '</ul>';
			
			$data_page = $data_page_html;			
		}
	}
		
	// POST
	if( is_array($data_post) && count($data_post)>0 ){
		
		$data_post_html = '';
		
		// POST - if more than 10
		if( !empty($_GET['post_type']) && $_GET['post_type']=='post' ){
			$html_left  = '';
			$html_right = '';
			
			// first row
			for ($x = 0; $x < 10; $x++) {
				if( !empty($data_post[$x]) ){
					$html_left .= ' '.$data_post[$x];
				}
			}
			// second row
			for ($x = 10; $x < 20; $x++) {
				if( !empty($data_post[$x]) ){
					$html_right .= ' '.$data_post[$x];
				}
			}
			
			$data_post_html .= '<div class="row multi-column-row">';
			$data_post_html .= '<div class="col-sm-6">';
			$data_post_html .= '<ul class="prt-recent-post-list">' . $html_left . '</ul>';
			$data_post_html .= '</div>';
			$data_post_html .= '<div class="col-sm-6">';
			$data_post_html .= '<ul class="prt-recent-post-list">' . $html_right . '</ul>';
			$data_post_html .= '</div>';
			$data_post_html .= '</div><!-- .row -->';
			
			$data_post = $data_post_html;
			
		} else {
			// Array to string
			$data_post = '<ul class="prt-recent-post-list">' . implode('', $data_post) . '</ul>';
		}
	}
	
	// Columns - On Search results main page only
	if( empty($_GET['post_type']) ){			
		if( !empty($data_page) || !empty($data_page) ){			
			$return .= '<div class="prt-sresults-first-row row">';
			if( !empty($data_page) ){
				$return .= '<div class="col-sm-6">' . preyantechnosys_search_results_box_title( 'page' ) . $data_page . '</div>';
			}
			if( !empty($data_post) ){
				$return .= '<div class="col-sm-6">' . preyantechnosys_search_results_box_title( 'post' ) . $data_post . '</div>';
			}
			$return .= '</div>';			
		}
	} else if( !empty($_GET['post_type']) && $_GET['post_type']=='page' ){
		$return .= '<div class="prt-results-page">' . $data_page . '</div>';
	} else if( !empty($_GET['post_type']) && $_GET['post_type']=='post' ){
		$return .= '<div class="prt-results-post">' . $data_post . '</div>';
	}
			
	// PORTFOLIO
	if( !empty($data_tm_portfolio) ){
		
		// Getting title
		$page_title = ( empty($_GET['post_type']) ) ? preyantechnosys_search_results_box_title( 'tm_portfolio' ) : '' ;
		
		$return .= '
		<div class="prt-sresults-cta-wrapper">
			' . $page_title . '
			<div class="prt-sresults-second-row row">
				' . $data_tm_portfolio . '
			</div>
		</div>';
	}
		
	// SERVCIES
	if( !empty($data_tm_service) ){
		
		// Getting title
		$page_title = ( empty($_GET['post_type']) ) ? preyantechnosys_search_results_box_title( 'tm_service' ) : '' ;
		
		$return .= '
		<div class="prt-sresults-cta-wrapper">
			' . $page_title . '
			<div class="prt-sresults-second-row row">
				' . $data_tm_service . '
			</div>
		</div>';
	}
	
	// TEAM MEMBER
	if( !empty($data_tm_team_member) ){
		
		$page_title = ( empty($_GET['post_type']) ) ? preyantechnosys_search_results_box_title( 'tm_team_member' ) : '' ;
		
		$return .= '
		<div class="prt-sresults-cta-wrapper">
			' . $page_title . '
			<div class="prt-sresults-second-row row multi-columns-row">
				' . $data_tm_team_member . '
			</div>
		</div>';
	}
	
	// PRODUCT
	if( !empty($data_product) && function_exists('is_woocommerce') ){
		
		$page_title = ( empty($_GET['post_type']) ) ? preyantechnosys_search_results_box_title( 'product' ) : '' ;
		
		$return .= '
		<div class="prt-sresults-cta-wrapper">
			' . $page_title . '
			' . do_shortcode('[products ids="' . $data_product . '" columns="3"]') . '
		</div>';
	}
	
	// EVENTS
	if( !empty($data_tribe_events) ){
		
		$page_title = ( empty($_GET['post_type']) ) ? preyantechnosys_search_results_box_title( 'tribe_events' ) : '' ;
		
		$return .= '
		<div class="prt-sresults-cta-wrapper">
			' . $page_title . '
			<div class="prt-sresults-second-row row multi-columns-row">
				' . $data_tribe_events . '
			</div>
		</div>';
	}
	
	// Previous/next page navigation.
	$return .= preyantechnosys_pagination();
		
	return $return;		
}
}

/**
 *  Recent Posts widget function
 */
if( !function_exists('preyantechnosys_search_results_box_title') ){
function preyantechnosys_search_results_box_title( $post_type='post' ){
	$return        = '';
	$singular_name = '';
	
	$small_link = '<small><a href="'. esc_url(get_home_url()).'?s='.get_search_query().'" class="label label-default"><i class="prt-minemo-icon-angle-left"></i> '.esc_attr__('Back to results','minemo').'</a></small>';
	if( empty($_GET['post_type']) ){
		$small_link = '<small><a href="'. esc_url(get_home_url()).'?s='.get_search_query().'&post_type=' . $post_type . '" class="label label-default">'.esc_attr__('View more','minemo').'</a></small>';
	}
		
	if( !empty($post_type) && $post_type!='any' ){
		$obj = get_post_type_object( $post_type );
		$singular_name = $obj->labels->singular_name;
	}
	
	if( !empty($singular_name) ){
		
		$return .= '<div class="prt-sresults-title-w"><h2 class="prt-sresults-title">' . sprintf(
				esc_attr__('%s results','minemo'),
				'<strong>' . esc_attr($singular_name) . '</strong>'
			)  . ' 
			&nbsp;
			'.$small_link.'
			</h2></div>';
	}
	
	return $return;
	
}
}


if( !function_exists('preyantechnosys_search_form') ){
function preyantechnosys_search_form(){
	$return = '';
	
	
	$cptList = array(
		'any'            => esc_attr__('All selections', 'minemo'),
		'page'           => esc_attr__('Pages', 'minemo'),
		'post'           => esc_attr__('Blog posts', 'minemo'),
	);
	
	$cpt_obj_portfolio   = get_post_type_object( 'tm_portfolio' );
	if( !empty($cpt_obj_portfolio->label) ){
		$cptList['tm_portfolio'] = esc_attr($cpt_obj_portfolio->label);
	}
	
	$cpt_obj_team   = get_post_type_object( 'tm_team_member' );
	if( !empty($cpt_obj_team->label) ){
		$cptList['tm_team_member'] = esc_attr($cpt_obj_team->label);
	}
	
	$cpt_obj_service   = get_post_type_object( 'tm_service' );
	if( !empty($cpt_obj_service->label) ){
		$cptList['tm_service'] = esc_attr($cpt_obj_service->label);
	}
	
	$cpt_obj_product   = get_post_type_object( 'product' );
	if( !empty($cpt_obj_product->label) ){
		$cptList['product'] = esc_attr($cpt_obj_product->label);
	}
	
	$cpt_obj_tribe_events   = get_post_type_object( 'tribe_events' );
	if( !empty($cpt_obj_tribe_events->label) ){
		$cptList['tribe_events'] = esc_attr($cpt_obj_tribe_events->label);
	}
	
	
	
	// CPT Dropdown
	$dropdown = '<select class="prt-sresult-cpt-select">';
	foreach( $cptList as $cptkey=>$cptval ){
		$selected = ( isset($_GET['post_type']) && $_GET['post_type']==$cptkey ) ? ' selected="selected" ' : '' ;
		$dropdown .= '<option value="'.$cptkey.'" class="'.$cptkey.'" '.$selected.'>'.$cptval.'</option>';
	}
	$dropdown .= '</select>';
		
	
	// Form
	$return .= '
	<div class="prt-sresult-form-wrapper">
					<div class="prt-sresult-form-top">
						<h2>
							<i class="fa fa-search"></i>
							' . esc_attr__('You searched for', 'minemo') . '
						</h2>
						' . get_search_form(false) . '
						<div class="prt-sresults-settings-wrapper">
							<a class="prt-sresults-settings-btn" href="#">
								<i class="fa fa-gear"></i>  
								<span>' . esc_attr__('Settings', 'minemo') . '</span>
							</a>
						</div>
						<div class="clr clear"></div>
					</div>
					<div class="prt-sresult-form-bottom-w">
						<div class="prt-sresult-form-bottom row" style="display:none;">
						<div class="prt-search-main-box clearfix">
                            <div class="prt-search-text"><strong>' . esc_attr__('Search in:','minemo') . '</strong></div>
							<div class="prt-search-select-box">
								' . $dropdown . '
                              <div class="prt-sresult-form-sbtbtn-wrapper">
								<input class="prt-sresult-form-sbtbtn" type="submit" value="' . esc_attr__('Search now','minemo') . '" />
							  </div>
						  </div>
							
                          </div>
						</div><!-- .prt-sresult-form-bottom -->
					</div><!-- .prt-sresult-form-bottom-w -->
				</div>
	
	';
				
	return $return;
	
}
}

/**************** Recent Posts widget function **************/

/**
 *  Recent Posts widget function
 */
if( !function_exists('preyantechnosys_recent_posts') ){
function preyantechnosys_recent_posts( $post='' ){
	
	$return = '';
	
	$return .= '<li class="prt-recent-post-list-li">';
		if( has_post_thumbnail() ){
			$return .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'full') . '</a>';
		}
		$return .= '<div class="post-detail">';
		$return .= '<span class="post-date"><i class="ti-calendar"></i>' . get_the_category_list() . '</span>';
		$return .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';	
		$return .= '</div>';		
	$return .= '</li>';

	return $return;
	
}
}

/* ============================================================================== */
/* ----------------------- Footer functions ------------------------ */

/**
 *  Footer Copyright text - right
 *
 */
if( !function_exists('preyantechnosys_footer_copyright_right') ){
function preyantechnosys_footer_copyright_right(){
	$right  = preyantechnosys_get_option('footer_copyright_right');
	$return = '';
	
	if ( !shortcode_exists( 'prt-footermenu' ) ) {
		$right = str_replace('[prt-footermenu]', '', $right );
	}
	
	if( !empty($right) ){
		$return .= do_shortcode( $right );
	}
	
	return $return;
}
}

if( !function_exists('preyantechnosys_footer_ctabox') ){
function preyantechnosys_footer_ctabox(){
	
	global $minemo_theme_options;
	$return = $footer_cta_box_column1 = $footer_cta_box_column2 = $footer_cta_box_column3 = '';
	$footer_cta_box = preyantechnosys_get_option('footer_cta_box');
	$footer_cta_column = '6_6';
	if( !empty($minemo_theme_options['footer_cta_column_layout']) ){
		$footer_cta_column = esc_attr(preyantechnosys_get_option('footer_cta_column_layout'));
	}
	$footer_cta_bg_color    = preyantechnosys_get_option('footer_cta_bg_color');
	$footer_cta_text_color  = preyantechnosys_get_option('footer_cta_text_color');
	
	if( $footer_cta_box==true ){
		
		$footer_cta_box_column1		= preyantechnosys_get_option('footer_cta_box_column1');
		$footer_cta_box_column2		= preyantechnosys_get_option('footer_cta_box_column2');
		$footer_cta_box_column3		= preyantechnosys_get_option('footer_cta_box_column3');

		echo preyantechnosys_wp_kses('<div class="prt-footer-cta-wrapper prt-bg prt-bgcolor-'.preyantechnosys_sanitize_html_classes($footer_cta_bg_color).' prt-textcolor-'.preyantechnosys_sanitize_html_classes($footer_cta_text_color).'"><div class="container prt-footer-cta-inner"><div class="prt-ctabox-row row">');
		
		$footer_cta_column = explode('_', $footer_cta_column);
		
		if( is_array($footer_cta_column) && count($footer_cta_column)>0 ){
			$x = 1;
			foreach($footer_cta_column as $col){
				// ROW width class
				$row_class = 'col-xs-12 col-sm-'.$col.' col-md-'.$col.' col-lg-'.$col; ?>
				<div class="widget-area <?php echo preyantechnosys_sanitize_html_classes($row_class); ?> cta-widget-area">
					<?php echo do_shortcode(preyantechnosys_get_option('footer_cta_box_column'.$x.'')); ?>
				</div>
				<?php
				$x++;
			} // Foreach
		}		
		echo preyantechnosys_wp_kses('</div></div></div>');
	}	
}
}

/* ============================================================================== */
/* ----------------------- The Events Calendar functions ------------------------ */

/**
 *  Events Calendar correction for data
 */
if( !function_exists('preyantechnosys_events_calendar_correction') ){
function preyantechnosys_events_calendar_correction(){
	global $posts;
	global $post;
	if( !empty($posts[0]->ID) ){
		$post = $posts[0];
	}
}
}


/* =================================================================== */
/* ----------------------- Sanitize functions ------------------------ */


/**
 *  Sanitize multiple HTML classes in one pass.
 *
 *  Accepts either an array of '$classes', or a space separated string of classes and
 *  sanitizes them using the 'sanitize_html_class' function.
 */
if( !function_exists('preyantechnosys_sanitize_html_classes') ){
function preyantechnosys_sanitize_html_classes($classes, $return_format = 'input'){
	if ( 'input' === $return_format ) {
		$return_format = is_array( $classes ) ? 'array' : 'string';
	}

	$classes = is_array( $classes ) ? $classes : explode( ' ', $classes );

	$sanitized_classes = array_map( 'sanitize_html_class', $classes );

	if ( 'array' === $return_format ){
		return $sanitized_classes;
	}else{
		return implode( ' ', $sanitized_classes );
	}

}
}


if( !function_exists('preyantechnosys_wp_kses') ){
function preyantechnosys_wp_kses( $string, $allowed_html_type='' ){
	
	$return = '';
	
	// default allowed html list
	$allowed_html = array(
		'aside' => array(
			'class' => array(),
			'id'    => array(),
			'role'  => array(),
			'style'	=> array(),
			'name'	=> array(),
		),
		'div'		=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'role'			=> array(),
			'data-prt-bg'		=> array(),
			'data-iconset'	=> array(),
			'data-prt-icon'		=> array(),
			'data-prt-show'		=> array(),
			'data-prt-column'	=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-prt-loop'		=> array(),
			'data-prt-rtl'		=> array(),
			'data-prt-cssease'		=> array(),
			'data-prt-autoplay'	=> array(),
			'data-prt-centermode'=> array(),
			'data-prt-centerpadding'=> array(),
			'data-prt-nav'		=> array(),
			'data-prt-dots'		=> array(),
			'data-prt-slidestoscroll'=> array(),
			'data-prt-autoplayspeed'=> array(),
			'data-prt-speed'=> array(),
			'data-prt-margin'	=> array(),
		),
		'span'		=> array(
			'class'				=> array(),
			'id'				=> array(),
			'style'				=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-percentage-value'	=> array(),
			'data-value'		=> array(),

		),
		'i'   => array(
			'class'  => array(),
			'style'		=> array(),
		),
		'h1'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'	 => array(),
		),
		'h2'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'	 => array(),
		),
		'h3'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'	 => array(),
		),
		'h4'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'	 => array(),
		),
		'h5'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'	 => array(),
		),
		'h6'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'	 => array(),
		),
		'article'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'input'   => array(
			'type'  		=> array(),
			'name'  		=> array(),
			'value' 		=> array(),
			'class' 		=> array(),
			'placeholder'	=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'checked'		=> array(),
		),
		'blockquote'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'a'	    => array(
			'class'		=> array(),
			'href'		=> array(),
			'style'		=> array(),
			'title'		=> array(),
			'target'	=> array(),
			'rel'		=> array(),
			'data-rel'	=> array(),
			'data-filter'	=> array(),
			'data-sortby' => array(),
			'data-clear'	=> array(),
		),
		'nav' => array(
			'class'	  => array(),
			'id'	  => array(),
		),
		'i'			  => array(
			'class'	  => array(),
			'style'	  => array(),
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'ul'		=> array(
			'class'		=> array(),
		),
		'ol'		=> array(
			'class'		=> array(),
		),
		'li'     => array(
			'class'  => array(),
			'data-content'	=> array(),
		),
		'p'    => array(
			'class' => array(),
		),
		'img' => array(
			'class'  => array(),
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
			'srcset'	=> array(),
			'sizes'		=> array(),
			'data-id'	=> array(),
			'data-srcset' => array(),
			'data-src'	=> array(),
		),
		'sup'    => array(
			'class' => array(),
		),
		'sub'    => array(
			'class' => array(),
		),
		'noscript'	=> array(),
		'iframe' => array(
			'src'         => array(),
			'width'       => array(),
			'height'      => array(),
			'scrolling'   => array(),
			'frameborder'	=> array(),
			'allow'		=> array(),
			'allowfullscreen'	=> array(),
		    'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'time'    => array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'datetime'	=> array(),
		),
		'header'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'form' => array(
			'class'			=> array(),
			'id'			=> array(),
			'type'			=> array(),
			'method'		=> array(),
			'name'			=> array(),
			'action'		=> array(),
			'style'			=> array(),
			'data-id'		=> array(),
			'data-name'		=> array(),
		),
		'textarea'	=> array(
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'aside'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'button'	=> array(
			'class'		=> array(),
			'type'		=> array(),
			'href'		=> array(),
			'title'		=> array(),
		),
		'label'	=> array(
			'for'			=> array(),
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'small'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
	);
			
	// Optional - Change the allowed tag array.
	if( !empty($allowed_html_type) ){
		
		switch($allowed_html_type){
			case 'fid_icon': // Facts In Digits icon
				$allowed_html = array(
					'div' => array(
						'class' => array(),
						'id'    => array(),
					),
					'i'   => array(
						'class'  => array(),
					),
				);
				break;
		}
		
	}
	
	// final filter
	return wp_kses( $string, $allowed_html );

}
}


if ( ! function_exists( 'preyantechnosys_entry_date' ) ) :
function preyantechnosys_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) ){
		$format_prefix = esc_attr_x( '%1$s on %2$s', '1: post format name. 2: date', 'minemo' );
	} else {
		$format_prefix = '%2$s';
	}
	
	
	$date = '<div class="preyantechnosys-post-date-wrapper">';
		$date .= sprintf( '<div class="preyantechnosys-entry-date-wrapper"><span class="preyantechnosys-entry-date"><time class="entry-date" datetime="%1$s" >%2$s<span class="entry-month entry-year">%3$s<span class="entry-year">%4$s</span></span></time></span></div>',
			get_the_date( 'c' ),
			get_the_date( 'j' ),
			get_the_date( 'M' ),
			get_the_date( 'Y' ),
			preyantechnosys_entry_icon()
		);
	$date .= '</div>';
	
	if ( $echo ){
		echo preyantechnosys_wp_kses($date);
	} else {
		return preyantechnosys_wp_kses($date);
	}
}
endif;


/* Get post date for entry meta data */

if ( ! function_exists( 'minemo_posttime_meta' ) ) :
function minemo_posttime_meta( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$date_format  = preyantechnosys_get_option( $metafor . '_meta_dateformat' );
	$date_format  = ( empty($date_format) ) ? get_option('date_format') : $date_format ;
	
		// date format
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated prt-hide" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date($date_format),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date($date_format)
			);

			$return .= sprintf( '<span class="prt-meta-line posted-on"><span class="screen-reader-text prt-hide">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
				esc_attr_x( 'Posted on', 'Used before publish date.', 'minemo' ),
				esc_url( get_permalink() ),
				$time_string
			);
			
		}
	return $return;		
}
endif;


/* Get post category name */

if ( ! function_exists( 'preyantechnosys_box_postcategory' ) ) :
function preyantechnosys_box_postcategory( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$cat_link     = preyantechnosys_get_option( $metafor . '_meta_catlink' );
	
		// date format
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			
			$categories_list = get_the_category_list( ', ' );
					if ( !empty($categories_list) ) {
						if( $cat_link!=true ){
							$categories_list = strip_tags($categories_list);
						}
						$return .= sprintf( '<span class="prt-meta-line cat-links"><span class="screen-reader-text prt-hide">%1$s </span>%2$s</span>',
							esc_attr_x( 'Categories', 'Used before category names.', 'minemo' ),
							$categories_list
						);
					}
			
		}
	return $return;		
}
endif;


/* Get number of comments */

if ( ! function_exists( 'preyantechnosys_box_totalcomment' ) ) :
function preyantechnosys_box_totalcomment( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$show_comment = preyantechnosys_get_option('blogclassic_show_comment_number');
		if( comments_open() && $show_comment == true ){
			$return .= sprintf( '
				<div class="preyantechnosys-commentbox">
					<span class="comments"><i class="fa fa-comments"></i> %1$s</span>
				</div>',
				get_comments_number()
			);
		}	
	}
	return $return;		
}
endif;


/* footer socialbar links */

if( !function_exists('preyantechnosys_get_socialbar_links') ){
function preyantechnosys_get_socialbar_links( $tooltip_position='top' , $tooltip='yes' ){
	global $minemo_theme_options;
	
	$socialArray = array(
		/* <social-id>  =>  <social-name> */
		'twitter'      => 'Twitter',
		'youtube'      => 'YouTube',
		'flickr'       => 'Flickr',
		'facebook'     => 'Facebook',
		'linkedin'     => 'LinkedIn',
		'gplus'        => 'Google+',
		'yelp'         => 'Yelp',
		'dribbble'     => 'Dribbble',
		'pinterest'    => 'Pinterest',
		'podcast'      => 'Podcast',
		'instagram'    => 'Instagram',
		'xing'         => 'Xing',
		'vimeo'        => 'Vimeo',
		'vk'           => 'VK',
		'houzz'        => 'Houzz',
		'issuu'        => 'Issuu',
		'google-drive' => 'Google Drive',
		'rss'          => 'RSS',
	);
		
	$return = '';
	if( !empty($minemo_theme_options['social_icons_list']) ){
		foreach( $minemo_theme_options['social_icons_list'] as $socialicon ){
			
			$social_id   = $socialicon['social_service_name'];
			$social_name = $socialArray[ $socialicon['social_service_name'] ];
			$social_link = ( !empty($socialicon['social_service_link']) ) ? trim($socialicon['social_service_link']) : '' ;
			
			
			// check for valid position for tooltip
			$class = '';
			$valie_tooltip_positions = array('top','right','bottom','left');
			if ( in_array( $tooltip_position, $valie_tooltip_positions ) ){
				$class = 'tooltip-' . $tooltip_position;
			}
			
			// If tooltip show or hide
			$data_tooltip = 'data-tooltip="'. $social_name .'"';
			if( !empty($tooltip) && $tooltip=='no' ){
				$data_tooltip = '';
			}
			
			// Link according to type of link
			$href = '#';
			if( $social_id == 'rss' ){
				$href = get_bloginfo('rss2_url');
			} else {
				$href = $social_link;
			}
			
			$return .= '<li class="prt-social-' . $social_id . ' prt-socialbox-i-wrapper"><a class="prt-socialbox-icon-link prt-socialbox-icon-link-' . $social_id . ' ' . sanitize_html_class($class) . '" target="_blank" href="' . $href . '"><span class="frame-hover"></span><i class="prt-minemo-icon-' . $social_id . '"></i><span class="social_name">'.$social_name.'</span></a></li>' . "\n";
		}
	}

	foreach( $socialArray as $key=>$value ){
		
		if( $key == 'rss' ){
			if( isset($minemo_theme_options['rss']) && $minemo_theme_options['rss']=='1' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.get_bloginfo('rss2_url').'" data-tooltip="'.$value[1].'"><i class="prt-social-icon-'.$value[0].'"></i></a></li>';
			}
		} else {
			if( isset($minemo_theme_options[$key]) && trim($minemo_theme_options[$key])!='' ){
				$return .= '<li class="'.$key.' "><a target="_blank" href="'.esc_url($minemo_theme_options[$key]).'" data-tooltip="'.$value[1].'"><i class="prt-social-icon-'.$value[0].'"></i></a></li>';
			}
		}
	}
	
	if( $return!='' ){
		$return = '<ul class="social-icons prt-socialbox-links-wrapper">'.$return.'</ul>';
	}
	
	return $return;
}
}


/**
 *  Checking responsive padding margin class
 */
if( !function_exists('preyantechnosys_responsive_padding_margin_class') ){
function preyantechnosys_responsive_padding_margin_class( $data='' ){
	$return = '';
	if( !empty($data) ){
		$data_array = explode('|',$data);
		$return = ( !empty($data_array[0]) ) ? 'prt-responsive-custom-'.$data_array[0] : '' ;
	}
	return $return;
}
}


/**
 *  Checking if negative value in margin-top property (for ROW in VC). This is being used in vc_row.php file
 */
if( !function_exists('preyantechnosys_check_if_minus_margin') ){
function preyantechnosys_check_if_minus_margin( $css ){
	$return = false;
	if( !empty($css) ){
		$css_array = explode('{',$css);
		$css_array = $css_array[1];
		$css_array = str_replace('}', '', $css_array);
		$css_array = explode(';',$css_array);
		foreach( $css_array as $css_line ){
			if( substr($css_line,0,10) == 'margin-top' ){
				$css_line_array = explode(':',$css_line);
				if( !empty($css_line_array[1]) ){
					$css_line_array[1] = trim($css_line_array[1]);
					if( substr($css_line_array[1],0,1) == '-' ){
						$return = true;
					}
				}
			}
		}
	}
	return $return;
}
}


if( !function_exists('preyantechnosys_infostack_header_content') ){
function preyantechnosys_infostack_header_content(){
	$return = '';
	$first_content  = preyantechnosys_get_option('infostack_column_one');
	$second_content = preyantechnosys_get_option('infostack_column_two');
	$third_content  = preyantechnosys_get_option('infostack_column_three');
	
	$return .= ( !empty( $first_content ) ) ? '<div class="header-widget"><div class="header-widget-main">'.do_shortcode($first_content).'</div></div>' : '' ;
	$return .= ( !empty( $second_content ) ) ? '<div class="header-widget"><div class="header-widget-main">'.do_shortcode($second_content).'</div></div>' : '' ;
	$return .= ( !empty( $third_content ) ) ? '<div class="header-widget"><div class="header-widget-main">'.do_shortcode($third_content).'</div></div>' : '' ;
	
	echo preyantechnosys_wp_kses($return);
}
}



/******===Elementor Code===*********/



if( !function_exists('tm_ordinal') ){
function tm_ordinal($number) {
	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	if ((($number % 100) >= 11) && (($number%100) <= 13))
		return $number. 'th';
	else
		return $number. $ends[$number % 10];
}
}


/*
 *  preyantechnosys elementer Block
 */
 
if( !function_exists('ttm_element_container') ){
function ttm_element_container( $settings = array( 'position' => 'start', 'cpt' => 'blog', 'data' => array() ) ){

	$return 	 = '';
	$inner_class_array = array('preyantechnosys-boxes-inner');

	// New Vars
	$position	= ( !empty($settings['position']) ) ? $settings['position'] : 'start' ;
	$cpt		= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$view_type	= ( !empty($settings['data']['view-type']) ) ? $settings['data']['view-type'] : 'default' ;
	$show		= ( !empty($settings['data']['show']) ) ? $settings['data']['show'] : '3' ;
	$column		= ( !empty($settings['data']['column']) ) ? $settings['data']['column'] : 'three' ;
	$gap		= ( !empty($settings['data']['gap']) ) ? $settings['data']['gap'] : '' ;
	$style		= ( !empty($settings['data']['style']) ) ? $settings['data']['style'] : 'styleone' ;


	// Carousel
	$tm_loop			= ( !empty($settings['data']['prt-loop']) && $settings['data']['prt-loop']=='1' ) ? '1' : '1' ;
	$tm_rtl			= ( !empty($settings['data']['prt-rtl']) && $settings['data']['prt-rtl']=='true' ) ? 'true' : 'false' ;
	$tm_cssease	= ( !empty($settings['data']['prt-cssease']) ) ? trim($settings['data']['prt-cssease']) : 'ease' ;
	$tm_autoplay		= ( !empty($settings['data']['prt-autoplay']) && $settings['data']['prt-autoplay']=='1' ) ? '1' : '0' ;
	$tm_centermode			= ( !empty($settings['data']['prt-centermode']) && $settings['data']['prt-centermode']=='1' ) ? '1' : '0' ;
	$tm_centerpadding			= ( !empty($settings['data']['prt-centerpadding']) ) ? trim($settings['data']['prt-centerpadding']) : '800' ;
	$carousel_dots			=  (!empty($settings['data']['carousel_dots'])) ? $settings['data']['carousel_dots'] : '' ;
	$carousel_slidestoscroll =  (!empty($settings['data']['carousel_slidestoscroll'])) ? $settings['data']['carousel_slidestoscroll'] : '' ;
	$tm_autoplayspeed	= ( !empty($settings['data']['prt-autoplayspeed']) ) ? trim($settings['data']['prt-autoplayspeed']) : '4500' ;
	$tm_speed	= ( !empty($settings['data']['prt-speed']) ) ? trim($settings['data']['prt-speed']) : '2500' ;
	$arrow_type   = (!empty($settings['data']['carousel_arrowtype'])) ? $settings['data']['carousel_arrowtype'] : '' ;
	$carousel_nav   = (!empty($settings['data']['carousel_nav'])) ? $settings['data']['carousel_nav'] : '' ;
	
	if( $position=='start' ){

		$class_array = array();

		// Data tags
		$data_array = array();
		$data_array[] = 'data-prt-show="'.$show.'"';
		$data_array[] = 'data-prt-loop="'.$tm_loop.'"';
		$data_array[] = 'data-prt-rtl="'.$tm_rtl.'"';
		$data_array[] = 'data-prt-cssease="'.$tm_cssease.'"';
		$data_array[] = 'data-prt-autoplay="'.$tm_autoplay.'"';
		$data_array[] = 'data-prt-centermode="'.$tm_centermode.'"';
		$data_array[] = 'data-prt-centerpadding="'.$tm_centerpadding.'"';
		$data_array[] = 'data-prt-nav="'.$carousel_nav.'"';
		$data_array[] = 'data-prt-dots="'.$carousel_dots.'"';
		$data_array[] = 'data-prt-slidestoscroll="'.$carousel_slidestoscroll.'"';
		$data_array[] = 'data-prt-autoplayspeed="'. esc_attr($tm_autoplayspeed).'"';
		$data_array[] = 'data-prt-speed="'. esc_attr($tm_speed).'"';
		$data_array[] = 'data-prt-margin="'. esc_attr($gap).'"';


		$class_array[] = 'preyantechnosys-boxes';
		$class_array[] = 'preyantechnosys-boxes-'.$cpt;
		$class_array[] = 'preyantechnosys-element-'.$cpt.'box-'.$style;
		$class_array[] = 'preyantechnosys-boxes-view-'.$view_type;
		$class_array[] = 'preyantechnosys-boxes-col-'. $column;
		
		
		// Enqueue scripts and styles
		if( $view_type=='carousel' ){	
			$class_array[] = 'prt-boxes-carousel-arrow-'.$arrow_type;
			$class_array[] = 'prt-boxes-carousel-arrows-' . esc_attr($settings['data']['carousel_nav']);
			
		}
		
		if( !empty($gap) ){
			$class_array[] = 'preyantechnosys-boxes-gap-'.$gap;
		}
		if( !empty($settings['data']['sortable']) ){
			$class_array[] = 'preyantechnosys-sortable-' . esc_attr($settings['data']['sortable']);
		}
		
		
		// Extra class
		if ( ! empty( $settings['data']['el_class'] ) ) {
			$class_array[] = $settings['data']['el_class'];
		}
		// Design options
		if( !empty($settings['data']['css']) && function_exists('vc_shortcode_custom_css_class') ){
			$class_array[] = vc_shortcode_custom_css_class( $settings['data']['css'] );
		}
		// CSS Animation
		if( !empty($settings['data']['css_animation']) && !is_array($settings['data']['css_animation']) && $settings['data']['css_animation']!='Array' && $settings['data']['css_animation']!='none' ){
			$class_array[] = ' wpb_animate_when_almost_visible wpb_'.$settings['data']['css_animation'].' '.$settings['data']['css_animation'].' ';
		}


		// Element ID
		$el_id = ( ! empty( $settings['data']['el_id'] ) ) ? 'id="'.$settings['data']['el_id'].'"' : '' ;

		
		$return = '<div '.$el_id.' class="'. implode(' ', $class_array) .'" '. implode(' ', $data_array).'><div class="'. implode(' ', $inner_class_array) .'">';


	} else {

		$return = '</div><!-- .preyantechnosys-boxes-inner -->   </div><!-- .preyantechnosys-boxes -->  ';

	}

	return $return;

}
}


if( !function_exists('preyantechnosys_get_filterbutton') ){
function preyantechnosys_get_filterbutton( $atts=array(), $taxonomy='' ){
	
	$return = '';
	$sortable_category_html = '';
	

	if( !empty($atts['sortable']) && $atts['sortable']=='yes' ){

		$sortable_category_html .= '<li class="prt-sortable-link prt-sortable-all-link"><a class="selected" href="javascript:void(0);" data-filter="*"> ' . $atts['allword'] . ' </a></li>';

		// all category
		$post_terms = get_terms( array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => true,
		) );
		foreach( $post_terms as $term ){		
			$sortable_category_html .= '<li class="prt-sortable-link"><a href="javascript:void(0);" data-filter=".' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a></li>';
		}

		$return = '<div class="prt-sortable-wrapper prt-sortable-wrapper-' . $taxonomy . '"><nav class="prt-sortable-list"><ul>'.$sortable_category_html.'</ul></nav></div>';
		return $return;
	}
}
}


if( !function_exists('ttm_element_block_container') ){
function ttm_element_block_container( $settings = array( 'position' => 'start', 'column' => 'three', 'cpt' => 'blog', ) ){
	$return = '';

	$cpt = ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;

	$boxClass = 'prt-box-col-wrapper ';
	// adding term based class for Isotope sorting
	$boxClass .= ' '.preyantechnosys_box_class();
	
	if( $settings['position']=='start' ){
		switch( $settings['column'] ){
			case 'one':
				echo '<div class="'. $boxClass .' col-lg-12 col-sm-12 col-md-12 col-xs-12">';
				break;
			case 'two':
				echo '<div class="'. $boxClass .' col-lg-6 col-sm-6 col-md-6 col-xs-12">';
				break;
			case 'three':
				echo '<div class="'. $boxClass .' col-lg-4 col-sm-6 col-md-4 col-xs-12">';
				break;
			case 'four':
				echo '<div class="'. $boxClass .' col-lg-3 col-sm-6 col-md-3 col-xs-12">';
				break;
			case 'five':
				echo '<div class="'. $boxClass .' col-lg-20percent col-sm-4 col-md-4 col-xs-12">';
				break;
			case 'six':
				echo '<div class="'. $boxClass .' col-lg-2 col-sm-4 col-md-4 col-xs-12">';
				break;
			case 'seven':
				echo '<div class="'. $boxClass .' col-lg-1 col-sm-4 col-md-4 col-xs-12">';
				break;
			case 'eight':
				echo '<div class="'. $boxClass .' col-lg-1 col-sm-4 col-md-4 col-xs-12">';
				break;
		}

	} else {
		$return = '</div>';
	}

	return preyantechnosys_wp_kses($return);

}
}

// Post likes
if ( ! function_exists( 'preyantechnosys_post_like_meta' ) ) {
function preyantechnosys_post_like_meta( ) {

	$tm_likes = get_post_meta( get_the_ID(), 'preyantechnosys_likes', true );
	if( !$tm_likes ){ $tm_likes='0'; }
	$tm_likeclass = ( isset($_COOKIE["preyantechnosys_likes_".get_the_ID()]) ) ? 'prt-like-active' : '' ;
	$tm_likeicon = ( isset($_COOKIE["preyantechnosys_likes_".get_the_ID()]) ) ? 'prt-minemo-icon-heart' : 'prt-minemo-icon-heart-empty' ;

	$tm_likedata = '';
	if( $tm_likes=='0' ){
		$tm_likedata = '<a href="#" class="prt-meta-like-link ' . esc_attr($tm_likeclass) . ' " id="pid-' . get_the_ID() . '"><i class="'. esc_attr($tm_likeicon).'"></i> <span>Likes:'.sprintf( esc_attr__( '%1$s ', 'minemo' ), $tm_likes ). '</span></a>';
	} else if( $tm_likes=='1' ){
		$tm_likedata = '<a href="#" class="prt-meta-like-link ' . esc_attr($tm_likeclass) . ' " id="pid-' . get_the_ID() . '"><i class="'. esc_attr($tm_likeicon).'"></i> <span>'.sprintf( esc_attr__( '%1$s ', 'minemo' ), $tm_likes ). '</span></a>';
	} else {
		$tm_likedata = '<a href="#" class="prt-meta-like-link ' . esc_attr($tm_likeclass) . ' " id="pid-' . get_the_ID() . '"><i class="'. esc_attr($tm_likeicon).'"></i> <span>'.sprintf( esc_attr__( '%1$s ', 'minemo' ), $tm_likes ). '</span></a>';
	}
	$like = sprintf( '<span class="prt-meta-line likes-link"><span class="screen-reader-text prt-hide">%1$s </span>%2$s</span><i class="prt-minemo-icon-heart-empty"></i>',
		esc_attr_x( ' ', 'Used before Likes in meta.', 'minemo' ),
		$tm_likedata
	);

	echo preyantechnosys_wp_kses($tm_likedata);
}
}

if( !function_exists('preyantechnosys_top_header_leftcontent') ){
function preyantechnosys_top_header_leftcontent(){
	$return = '';
	$header_left_text1  = preyantechnosys_get_option('header_left_text');
	
	$return .= ( !empty( $header_left_text ) ) ? '<div class="widget-left"><div class="info-widget"><div class="info-widget-content">'.do_shortcode($header_left_text).'</div></div></div>' : '' ;
	
	echo preyantechnosys_wp_kses($return);
}
}

if( !function_exists('preyantechnosys_toplogo_header_leftcontent') ){
function preyantechnosys_toplogo_header_leftcontent(){
	$return = '';
	$header_left_text  = preyantechnosys_get_option('header_left_text');
	
	$return .= ( !empty( $header_left_text ) ) ? '<div class="widget-left"><div class="info-widget"><div class="info-widget-content">'.do_shortcode($header_left_text).'</div></div></div>' : '' ;
	
	echo preyantechnosys_wp_kses($return);
}
}

add_option( 'minemopurchase-verify', 'no', '', 'yes' );

if( !function_exists('preyantechnosys_toplogo_header_rightcontent') ){
function preyantechnosys_toplogo_header_rightcontent(){
	$return = '';
	$header_right_text  = preyantechnosys_get_option('header_right_text');
	
	$return .= ( !empty( $header_right_text ) ) ? '<div class="widget-right"><div class="info-widget"><div class="info-widget-content">'.do_shortcode($header_right_text).'</div></div></div>' : '' ;
	
	echo preyantechnosys_wp_kses($return);
}
}

/**
 * Service Elementor icon Detials
 *
 * Create your own preyantechnosys_serviceicon_box() to override in a child theme.
 *
 * @since Minemo 1.0
 *
 */
if(!function_exists('preyantechnosys_serviceicon_box')){
function preyantechnosys_serviceicon_box(){
		$return      		= '';
	$prticon_meta   = get_post_meta( get_the_id(), 'preyantechnosys_prtservice_icon', true );
	$serviceicon 		= ( !empty($prticon_meta['prt_serviceicon']) ) ? $prticon_meta['prt_serviceicon'] : '' ;
		
	$return .= ( !empty($serviceicon) ) ? '<div class="prt-service-iconbox"><span class="prt-service-icon">' . $serviceicon . '</span></div>' : '';
	
	return $return;
}
}


/**
 * Getting multi image for portfolio
 */
if ( !function_exists( 'preyantechnosys_get_portfolio_multi_media' ) ){
function preyantechnosys_get_portfolio_multi_media( $post_id='', $size='full'){
	
	$return = $multiimage_one_id = $multiimage_two_id = $multiimage_three_id = '';
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	if( !empty($post_id) ){

		$post_meta  = get_post_meta( $post_id, 'preyantechnosys_portfolio_featured', true );
		
		$multiimage_one_id = ( !empty($post_meta['multiimage_one']) ) ? trim($post_meta['multiimage_one']) : '' ;
		$return .= wp_get_attachment_image( $multiimage_one_id, 'full' );
		$multiimage_two_id = ( !empty($post_meta['multiimage_two']) ) ? trim($post_meta['multiimage_two']) : '' ;
		$return .= wp_get_attachment_image( $multiimage_two_id, 'full' );
		$multiimage_three_id = ( !empty($post_meta['multiimage_three']) ) ? trim($post_meta['multiimage_three']) : '' ;
		$return .= wp_get_attachment_image( $multiimage_three_id, 'full' );		
	}
	
	// Adding wrapper
	if( !empty($return) ){
		$return = '<div class="prt-featured-wrapper prt_portfolio-featured-wrapper">' . $return . '</div>';
	}

	return $return;
	
}
}

if ( !function_exists( 'preyantechnosys_blogclassic_readmore' ) ){
function preyantechnosys_blogclassic_readmore(){
	
	$return        = '';
	$readMore_text = preyantechnosys_blogbox_readmore_text();  // Read More word
	
	if( get_post_format()!='quote' && get_post_format()!='link' ) {
		$return .= '<div class="preyantechnosys-blogbox-footer-left preyantechnosys-wrap-cell">';
		$return .= '<a href="'.get_permalink().'">'.$readMore_text.'</a>';
		$return .= '</div>';
	}
	
	return $return;
	
}
}

/**
 * Service Elementor icon Detials
 *
 * Create your own cymolthemes_serviceicon_box() to override in a child theme.
 *
 * @since Agritek 1.0
 *
 */
if(!function_exists('preyantechnosys_serviceicon_box')){
function preyantechnosys_serviceicon_box(){
	$return      		= '';
	$tmicon_meta   = get_post_meta( get_the_id(), 'preyantechnosys_serviceicon_details', true );
	$serviceicon 		= ( !empty($tmicon_meta['serviceicon']) ) ? $tmicon_meta['serviceicon'] : '' ;
		
	$return .= ( !empty($serviceicon) ) ? '<div class="prt-service-iconbox"><div class="prt-service-icon-dots"></div><span class="prt-service-icon">' . $serviceicon . '</span></div>' : '';
	
	return $return;
}
}

/**
 *  preyantechnosys_featured_link_image
*/
 


/**
 *  preyantechnosys_featured_link_image
 */
	if ( !function_exists( 'preyantechnosys_featured_link_image' ) ){
function preyantechnosys_featured_link_image($code=''){
	
	$return = '';

		$inline_style = '';
		if( has_post_thumbnail() ){
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$inline_style = 'style="background-image:url(\'' . get_the_post_thumbnail_url( get_the_ID(), 'full') . '\');"';
			}
		}

		// Final output
		$return =$inline_style;	
		
	return $return;	
}
}



/**
 *  header button
*/
	
if( !function_exists('preyantechnosys_box_header_contact_btn') ){
function preyantechnosys_box_header_contact_btn(){
	$return = ''; 
	$btn_text = '';
	$btn_link = '';
	
	$show_headerbutton = preyantechnosys_get_option('show_headerbutton');
	$btn_text = preyantechnosys_get_option('header_button_text');
	$btn_link = preyantechnosys_get_option('header_button_linkurl');
	
	if( $show_headerbutton=='1' ){
	if( !empty($btn_text) && !empty($btn_link) ){
		$return .= '
		<div class="prt-header-contact-btn-wrapper">
			<div class="elementor-element prt-btn-style-flat prt-btn-shape-square elementor-widget elementor-widget-button">
				<div class="elementor-button-wrapper"><a href="'. esc_url($btn_link) .'" class="elementor-button-link elementor-button elementor-size-md" role="button"><span class="elementor-button-content-wrapper"><span class="elementor-button-text">'. esc_attr($btn_text) .'</span></span></a></div>
			</div>
		</div>';


	}
	}
	else {
		$return .= '';
	}
	return $return;
}
}


/**
 *  preyantechnosys_featured_link_image
 */
	if ( !function_exists( 'preyantechnosys_featured_link_image' ) ){
function preyantechnosys_featured_link_image($code=''){
	
	$return = '';

		$inline_style = '';
		if( has_post_thumbnail() ){
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$inline_style = 'style="background-image:url(\'' . get_the_post_thumbnail_url( get_the_ID(), 'full') . '\');"';
			}
		}

		// Final output
		$return =$inline_style;	
		
	return $return;	
}
}

