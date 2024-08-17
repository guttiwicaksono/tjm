<?php
/*
 * Plugin Name: Preyantechnosys Extras for Minemo Theme
 * Plugin URI: https://www.preyantechnosys.com
 * Description: Preyantechnosys Plugin for Minemo Theme
 * Version: 1.0
 * Author: ThemeTechMount
 * Author URI: https://www.preyantechnosys.com
 * Text Domain: tmte
 * Domain Path: /languages
 */

/**
 *  TMTE = ThemeTechMount Theme Extras
 */
define( 'TMTE_VERSION', '1.0' );
define( 'TMTE_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'TMTE_URI', plugins_url( '', __FILE__ ) );

/**
 *  Codestar Framework core files
 */
function preyantechnosys_minemo_cs_framework_init(){
	defined('CS_OPTION'          ) or define('CS_OPTION',           'minemo');
	defined('CS_ACTIVE_FRAMEWORK') or define('CS_ACTIVE_FRAMEWORK', true    ); // default true
	defined('CS_ACTIVE_METABOX'  ) or define('CS_ACTIVE_METABOX',   true    ); // default true
	defined('CS_ACTIVE_SHORTCODE') or define('CS_ACTIVE_SHORTCODE', true    ); // default true
	defined('CS_ACTIVE_CUSTOMIZE') or define('CS_ACTIVE_CUSTOMIZE', true    ); // default true
	
	// Make shortcode work in text widget
	//add_filter('widget_text', 'do_shortcode');
	add_filter('widget_text', 'do_shortcode', 11);
	
}
add_action( 'init', 'preyantechnosys_minemo_cs_framework_init', 2 );




/**
 *  Codestar Framework core files
 */
function preyantechnosys_header_css(){
	echo '
<style>
th#preyantechnosys_featured_image, td.preyantechnosys_featured_image {
    width: 115px !important;
}
td.preyantechnosys_featured_image img{
    max-width: 75px;
	height: auto;
}
</style>
';
}
add_action( 'admin_head', 'preyantechnosys_header_css' );






add_action( 'plugins_loaded', 'preyantechnosys_minemo_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function preyantechnosys_minemo_load_textdomain() {
	load_plugin_textdomain( 'tmte', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}







if( file_exists( get_template_directory() . '/inc/tools.php' ) ){
	require_once get_template_directory() . '/inc/tools.php';
} else {
	require_once TMTE_DIR . 'tools.php';
}
require_once TMTE_DIR . 'custom-post-types/prt-portfolio.php';
require_once TMTE_DIR . 'custom-post-types/prt-service.php';
require_once TMTE_DIR . 'custom-post-types/prt-team.php';
require_once TMTE_DIR . 'custom-post-types/prt-testimonial.php';
require_once TMTE_DIR . 'custom-post-types/prt-client.php';


/**
 *  Theme widgets
 */
if( !function_exists('preyantechnosys_minemo_init_widgets') ){
function preyantechnosys_minemo_init_widgets(){
	require TMTE_DIR .'widgets/widgets.php';
}
}
add_action( 'widgets_init', 'preyantechnosys_minemo_init_widgets' );


/**
 *  Shortcodes
 */
require_once TMTE_DIR . 'shortcodes.php';
require_once TMTE_DIR . 'theme-demo-config.php';



function preyantechnosys_rewrite_flush() {
    // ATTENTION: This is *only* done during plugin activation hook
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'preyantechnosys_rewrite_flush' );




/**
 * Enqueue scripts and styles
 */
if( !function_exists('preyantechnosys_minemo_scripts_styles') ){
function preyantechnosys_minemo_scripts_styles() {
	wp_enqueue_script( 'jquery-resize', TMTE_URI . '/js/jquery-resize.min.js', array( 'jquery' ) );
}
}
add_action( 'wp_enqueue_scripts', 'preyantechnosys_minemo_scripts_styles' );



if( !function_exists('preyantechnosys_minemo_admin_scripts') ){
function preyantechnosys_minemo_admin_scripts() {
		
	wp_enqueue_script( 'fontawesome-iconpicker', TMTE_URI . '/js/fontawesome-iconpicker.min.js', array( 'jquery' ), false, true );
	wp_register_script( 'admin-custom-iconpicker', TMTE_URI . '/js/admin-custom-iconpicker.js', array( 'jquery' ), false, true ); 
	
	$preyantechnosys_specilas_listicons = array(
		'preyantechnosys_service_icons_lists' => preyantechnosys_special_iconspicker( array() ),
	);
	
	wp_localize_script( 'admin-custom-iconpicker', 'preyantechnosys_specilas_listicons', $preyantechnosys_specilas_listicons );
	wp_enqueue_script( 'admin-custom-iconpicker' );
	wp_enqueue_style( 'fontawesome-iconpicker', TMTE_URI . '/css/fontawesome-iconpicker.min.css', array(), '1.0.0' );
}
}
add_action( 'admin_enqueue_scripts', 'preyantechnosys_minemo_admin_scripts' );


	

/**
 * Login page CSS script
 */
if( !function_exists('preyantechnosys_login_stylesheet') ){
function preyantechnosys_login_stylesheet() {
    wp_enqueue_style( 'preyantechnosys-style-login', plugins_url('/css/style-login.min.css', __FILE__)  );
}
}
add_action( 'login_enqueue_scripts', 'preyantechnosys_login_stylesheet' );



/**
 * @param $param_value
 * @param string $prefix
 *
 * @since 4.2
 * @return string
 */
if( !function_exists('preyantechnosys_vc_shortcode_custom_css_class') ){
function preyantechnosys_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
}
}


/**
 *  This function will do encoding things. The encode function is not allowed in theme so we created function in plugin
 */
if( !function_exists('preyantechnosys_enc_data') ){
function preyantechnosys_enc_data( $htmldata='' ) {
	return base64_encode($htmldata);
}
}


/**
 *  This function will encode URL
 */
if( !function_exists('preyantechnosys_url_encode') ){
function preyantechnosys_url_encode( $url='' ) {
	return urlencode($url);
}
}


/************** Start Plugin Options settings ************************/




/**
 *  This will create option link and option page
 */
if( !function_exists('preyantechnosys_minemo_register_options_page') ){
function preyantechnosys_minemo_register_options_page() {
	add_options_page(
		esc_attr__('Minemo Extra Options', 'tmte'),  // Page title in TITLE tag
		esc_attr__('Minemo Extra Options', 'tmte'),  // heading on page
		'manage_options',
		'tmte-minemo',
		'preyantechnosys_minemo_options_page'
	);
}
}
add_action('admin_menu', 'preyantechnosys_minemo_register_options_page');


/**
 *  Save plugin options
 */
if( !function_exists('preyantechnosys_minemo_register_settings') ){
function preyantechnosys_minemo_register_settings() {
	
	// Social share for Blog
	register_setting( 'tmte_minemo_options_group', 'tmte_minemo_social_share_blog', 'preyantechnosys_minemo_social_share_blog_callback' );
	//add_option( 'tmte_minemo_option_name', 'This is my option value.');
	
	// Social share for Portfolio
	register_setting( 'tmte_minemo_options_group', 'tmte_minemo_social_share_portfolio', 'preyantechnosys_minemo_social_share_portfolio_callback' );
	//add_option( 'tmte_minemo_option_name', 'This is my option value.');
	

}
}
add_action( 'admin_init', 'preyantechnosys_minemo_register_settings' );




if( !function_exists('preyantechnosys_minemo_social_share_blog_callback') ){
function preyantechnosys_minemo_social_share_blog_callback( $data ){
	// Save settings to theme options so we can re-use it
	$minemo_toptions = get_option('minemo_theme_options');
	if( !empty($minemo_toptions['post_social_share_services']) ){
		$minemo_toptions['post_social_share_services'] = $data;
		update_option('minemo_theme_options', $minemo_toptions);
	}
	return $data;
}
}



if( !function_exists('preyantechnosys_minemo_social_share_portfolio_callback') ){
function preyantechnosys_minemo_social_share_portfolio_callback( $data ){
	// Save settings to theme options so we can re-use it
	$minemo_toptions = get_option('minemo_theme_options');
	if( !empty($minemo_toptions['portfolio_social_share_services']) ){
		$minemo_toptions['portfolio_social_share_services'] = $data;
		update_option('minemo_theme_options', $minemo_toptions);
	}
	return $data;
}
}






if( !function_exists('preyantechnosys_minemo_options_page') ){
function preyantechnosys_minemo_options_page(){
	
	// Commong elements
	$minemo_toptions	= get_option('minemo_theme_options');
	$social_list	= array(
						'Facebook'		=> 'facebook',
						'Twitter'		=> 'twitter',
						'Google Plus'	=> 'gplus',
						'Pinterest'		=> 'pinterest',
						'LinkedIn'		=> 'linkedin',
						'Stumbleupon'	=> 'stumbleupon',
						'Tumblr'		=> 'tumblr',
						'Reddit'		=> 'reddit',
						'Digg'			=> 'digg',
					);
	
	
	
	?>
	<div class="wrap"> 
		<h1>Minemo Extra Options</h1>
		
		<form method="post" action="options.php">
		
			<?php settings_fields( 'tmte_minemo_options_group' ); ?>

			<p>This page will set some extra options for Minemo theme. So it will be stored even when you change theme.</p>
			<br><br>
			
			
			<h2>Select Social Share Service (for single Post or Portfolio)</h2>
			<p>The selected social service icon will be visible on single view so user can share on social sites.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="tmte_minemo_option_name"> Select Social Share Service for Blog Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tmte_minemo_social_share_blog = array();
						if( !empty($minemo_toptions['post_social_share_services']) ){
							$tmte_minemo_social_share_blog = $minemo_toptions['post_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tmte_minemo_social_share_blog) && in_array( $social_slug, $tmte_minemo_social_share_blog ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tmte_minemo_social_share_blog[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
				
				<!-- ---------- -->
				<tr valign="top">
					<th scope="row"><label for="tmte_minemo_option_name"> Select Social Share Service for Portfolio Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tmte_minemo_social_share_portfolio = array();
						if( !empty($minemo_toptions['portfolio_social_share_services']) ){
							$tmte_minemo_social_share_portfolio = $minemo_toptions['portfolio_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tmte_minemo_social_share_portfolio) && in_array( $social_slug, $tmte_minemo_social_share_portfolio ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tmte_minemo_social_share_portfolio[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
			</table>
			<?php  submit_button(); ?>
		</form>
		
	</div>
	<?php
}
}



/*******
 *  Social Share links creations
 */
if ( !function_exists( 'preyantechnosys_social_share_links' ) ){
function preyantechnosys_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);	
	if( !empty($post_type) ){		
		$post_type = esc_attr($post_type);		
		$social_services = preyantechnosys_get_option( $post_type.'_social_share_services' );		
		$return = '';
		if( !empty( $social_services ) && is_array( $social_services ) ){		
			foreach( $social_services as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="prt-social-share prt-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TMSocialWindow=window.open(\''. esc_url($link) .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="prt-minemo-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="prt-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}


/*******
 *  Social Share links creations
 */
if ( !function_exists( 'preyantechnosys_social_share_links' ) ){
function preyantechnosys_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);
	
	if( !empty($post_type) ){
		
		$post_type = esc_attr($post_type);
		
		${ $post_type.'_social_share_services' } = preyantechnosys_get_option( $post_type.'_social_share_services' );
		
		$return = '';
		
		if( !empty( ${ $post_type.'_social_share_services' } ) && is_array( ${$post_type.'_social_share_services'} ) && count( ${$post_type.'_social_share_services'} > 0 ) ){
			foreach( ${$post_type.'_social_share_services'} as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="prt-social-share prt-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TMSocialWindow=window.open(\''. esc_url($link) .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="prt-minemo-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="prt-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}





// Show Featured image in the admin section
add_filter( 'manage_post_posts_columns', 'preyantechnosys_post_set_featured_image_column' );
add_action( 'manage_post_posts_custom_column' , 'preyantechnosys_post_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'preyantechnosys_post_set_featured_image_column' ) ) {
function preyantechnosys_post_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['preyantechnosys_featured_image'] = esc_attr__( 'Featured Image', 'minemo' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'preyantechnosys_post_set_featured_image_column_content' ) ) {
function preyantechnosys_post_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'preyantechnosys_featured_image' ){
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img style="max-width:75px;height:auto;" src="' . TMTE_URI . '/images/admin-no-image.png" />';
		}
	}
}
}





if( !function_exists('preyantechnosys_author_socials') ){
function preyantechnosys_author_socials( $contactmethods ) {
	$contactmethods['twitter']  = esc_attr__( 'Twitter Link', 'minemo' );  // Add Twitter
	$contactmethods['facebook'] = esc_attr__( 'Facebook Link', 'minemo' );  //add Facebook
	$contactmethods['linkedin'] = esc_attr__( 'LinkedIn Link', 'minemo' );  //add LinkedIn
	$contactmethods['gplus']    = esc_attr__( 'Google Plus Link', 'minemo' );  //add Google Plus
	return $contactmethods;
}
}
add_filter('user_contactmethods','preyantechnosys_author_socials',10,1);





/**
 *  Login page logo link
 */
if( !function_exists('preyantechnosys_loginpage_custom_link') ){
function preyantechnosys_loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
}
add_filter('login_headerurl','preyantechnosys_loginpage_custom_link');






/**
 * Login page logo link title
 */
if( !function_exists('preyantechnosys_change_title_on_logo') ){
function preyantechnosys_change_title_on_logo() {
	return esc_attr( get_bloginfo( 'name', 'display' ) );
}
}
add_filter('login_headertext', 'preyantechnosys_change_title_on_logo');






/**
 *  add skincolor class style
 */
add_action( 'admin_head', 'preyantechnosys_admin_skincolor_css' );
function preyantechnosys_admin_skincolor_css(){
	global $minemo_theme_options;
	if( !empty($minemo_theme_options['skincolor']) ){
	?>
	<style>
		.tm_vc_colored-dropdown .skincolor,
		.vc_colored-dropdown .skincolor,
		.vc_btn3.vc_btn3-color-skincolor{  /* VC button */
			background-color: <?php echo esc_attr($minemo_theme_options['skincolor']); ?> !important;
			color: #fff !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-outline{
			color: <?php echo esc_attr($minemo_theme_options['skincolor']); ?> !important;
			border-color: <?php echo esc_attr($minemo_theme_options['skincolor']); ?> !important;
			background-color: transparent !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-3d {
			box-shadow: 0 4px rgba(<?php echo preyantechnosys_hex2rgb($minemo_theme_options['skincolor']); ?>, 0.73), 0 4px rgb(0, 0, 0) !important;
		}
		
		.vc_btn3.vc_btn3-style-text.vc_btn3-color-skincolor{ /* Normal Text style button */
			color: <?php echo esc_attr($minemo_theme_options['skincolor']); ?> !important;
			background-color: transparent !important;
		}
		
	</style>
	<?php
	}
}







/**
 *  Login page stylesheet
 */
if( !function_exists('preyantechnosys_login_page_css') ){
function preyantechnosys_login_page_css() {
	$minemo_theme_options = get_option('minemo_theme_options');
	
	$bg_size = '';
	$return  = '.login #backtoblog a, .login #nav a{color: white; text-shadow: 1px 1px black;}
	.login #backtoblog a:hover, .login #nav a:hover{color: white; text-decoration: underline;}
	';
	
	// Custom CSS Code for login page only
	if( isset($minemo_theme_options['login_custom_css_code']) && trim($minemo_theme_options['login_custom_css_code'])!='' ){
		$return .= $minemo_theme_options['login_custom_css_code'];
	}
	
	// Login page background
	$return .= preyantechnosys_get_background_css('body.login', $minemo_theme_options['login_background']);
	
	
	$logo_a_tag = '';
	$image      = '';
	$imgwidth   = '';
	$imgheight  = '';
	$bg_size    = '';
	
	if( !empty($minemo_theme_options['logoimg']) ){
		
		if( !empty($minemo_theme_options['logoimg']['full-url']) ){
			
			$image = $minemo_theme_options['logoimg']['full-url'];  // Image src
			
			if( function_exists('getimagesize') ){
				$imgsize_array = getimagesize( $minemo_theme_options['logoimg']['full-url'] );
				$imgwidth      = $imgsize_array[0];  // Image width
				$imgheight     = $imgsize_array[1];  // Image height
			}
			
		} else if( isset($minemo_theme_options['logoimg']['id']) && trim($minemo_theme_options['logoimg']['id'])!='' ){
			$image     = wp_get_attachment_image_src( $minemo_theme_options['logoimg']['id'], 'full' );
			$imgwidth  = $image[1];  // Image width
			$imgheight = $image[2];  // Image height
			$image     = $image[0];  // Image src
		}
		
		if( !empty($imgwidth) && $imgwidth>320 ){
			$imgheight = ceil( ($imgheight / $imgwidth) * 320 );
			$imgwidth  = 320;
			$bg_size   = 'background-size: 100%;';
		}
		
		
		
		if( !empty($image) ){
			$logo_a_tag .= 'background-image: url("'. $image .'");';
		}
		if( !empty($imgwidth) ){
			$logo_a_tag .= 'width:'. $imgwidth .'px;';
		}
		if( !empty($imgheight) ){
			$logo_a_tag .= 'height:'. $imgheight .'px;';
		}
	}
	
	// Login button
	if( !empty($minemo_theme_options['skincolor']) ){
		$return .= '#wp-submit{background-color:'. $minemo_theme_options['skincolor'] .'}';
	}
	
	if( !empty($logo_a_tag) ){
		$return .= '.login #login form{background-color: #f7f7f7; box-shadow: none;}';
		$return .= '.login #login h1 a{ background-size:cover; '. $logo_a_tag .' '. $bg_size .' }';
	}
	
	// Remove text shadow from login button
	$return .= '.wp-core-ui #login .button-primary {text-shadow: none;}';
	
	if( !empty($return) ){
		echo '<style type="text/css"> /* ThemeTechMount CSS for login page */ '. $return .'</style>';
	}
	
}
}
add_action('login_head', 'preyantechnosys_login_page_css');



/**
 *  W#C Remove type attribute from css & script tags fles
*/

function preyantechnosys_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if( !preyantechnosys_is_login_page() && !is_admin() ){

	add_filter('style_loader_tag', 'preyantechnosys_remove_type_attribute', 10, 2);
	add_filter('script_loader_tag', 'preyantechnosys_remove_type_attribute', 10, 2);
		
	// remove type from all css & script tags from files
	if( !function_exists('preyantechnosys_remove_type_attribute') ){
	function preyantechnosys_remove_type_attribute($tag, $handle) {
		return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
	}
	}
	add_action('shutdown', 'preyantechnosys_output_loading_end');
	function preyantechnosys_output_loading_end() { 
		if (ob_get_contents()){ ob_end_flush(); }
	}
	
}


/**
 *  Delete WPBackery Welcome page
 */
function delete_wpbackery_welcomepage(){
	delete_transient( '_vc_page_welcome_redirect' );
}
add_action( 'admin_init', 'delete_wpbackery_welcomepage', 1 );



/**
 *  Create New Param Type : Info
 */
if( function_exists('vc_add_shortcode_param') ){
	vc_add_shortcode_param( 'preyantechnosys_info', 'preyantechnosys_vc_param_info' );
	function preyantechnosys_vc_param_info( $settings, $value ) {
		$return  = '';
		$head    = ( !empty($settings['head']) ) ? '<h2 class="kw_vc_info_heading">'.$settings['head'].'</h2>' : '' ;
		$subhead = ( !empty($settings['subhead']) ) ? '<h4 class="kw_vc_info_subheading">'.$settings['subhead'].'</h4>' : '' ;
		$desc    = ( !empty($settings['desc']) ) ? '<div class="kw_vc_info_desc">'.$settings['desc'].'</div>' : '' ;
		
		
		
		
		$return .= '<div class="preyantechnosys_vc_param_info '.$settings['param_name'].'">'
					. '<div class="preyantechnosys_vc_param_info_inner">'
						. $head
						. $subhead
						. $desc 
					. '</div>'
			   . '</div>'; // This is html markup that will be outputted in content elements edit form
	   return $return;
	}
}



/**
 * Register widget areas.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
function minemo_widgets_init() {
	register_sidebar( array(
		'name' => esc_attr__( 'Elementor Search', 'minemo' ),
		'id' => 'elementor-searchbox',
		'description' => esc_attr__( 'This is elementor search for elementor', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Blog', 'minemo' ),
		'id' => 'sidebar-left-blog',
		'description' => esc_attr__( 'This is left sidebar for blog section', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Blog', 'minemo' ),
		'id' => 'sidebar-right-blog',
		'description' => esc_attr__( 'This is right sidebar for blog section', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Pages', 'minemo' ),
		'id' => 'sidebar-left-page',
		'description' => esc_attr__( 'This is left sidebar for pages', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Pages', 'minemo' ),
		'id' => 'sidebar-right-page',
		'description' => esc_attr__( 'This is right sidebar for pages', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Portfolio - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Portfolio', 'minemo' ),
		'id' => 'sidebar-left-portfolio',
		'description' => esc_attr__( 'This is left sidebar for Portfolio', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Portfolio', 'minemo' ),
		'id' => 'sidebar-right-portfolio',
		'description' => esc_attr__( 'This is right sidebar for Portfolio', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio Category - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Portfolio Category', 'minemo' ),
		'id' => 'sidebar-left-portfoliocat',
		'description' => esc_attr__( 'This is left sidebar for Portfolio Category pages.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio Category - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Portfolio Category', 'minemo' ),
		'id' => 'sidebar-right-portfoliocat',
		'description' => esc_attr__( 'This is right sidebar for Portfolio Category pages.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		// Service - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Service', 'minemo' ),
		'id' => 'sidebar-left-service',
		'description' => esc_attr__( 'This is left sidebar for Service', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Service', 'minemo' ),
		'id' => 'sidebar-right-service',
		'description' => esc_attr__( 'This is right sidebar for Service', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service Category - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Service Category', 'minemo' ),
		'id' => 'sidebar-left-servicecat',
		'description' => esc_attr__( 'This is left sidebar for Service Category pages.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service Category - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Service Category', 'minemo' ),
		'id' => 'sidebar-right-servicecat',
		'description' => esc_attr__( 'This is right sidebar for Service Category pages.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Team Member - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Team Member', 'minemo' ),
		'id' => 'sidebar-left-team-member',
		'description' => esc_attr__( 'This is left sidebar for Team Member', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Team Member - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Team Member', 'minemo' ),
		'id' => 'sidebar-right-team-member',
		'description' => esc_attr__( 'This is right sidebar for Team Member', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Team Member Group - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Team Member Group pages', 'minemo' ),
		'id' => 'sidebar-left-team-member-group',
		'description' => esc_attr__( 'This is left sidebar for Team Member Group.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Team Member Group - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Team Member Group pages', 'minemo' ),
		'id' => 'sidebar-right-team-member-group',
		'description' => esc_attr__( 'This is right sidebar for Team Member Group', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Search', 'minemo' ),
		'id' => 'sidebar-left-search',
		'description' => esc_attr__( 'This is left sidebar for search', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for search', 'minemo' ),
		'id' => 'sidebar-right-search',
		'description' => esc_attr__( 'This is right sidebar for search', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	if( function_exists('is_woocommerce') ){
		// WooCommerce - Left
		register_sidebar( array(
			'name' => esc_attr__( 'Left Sidebar for WooCommerce Shop', 'minemo' ),
			'id' => 'sidebar-left-woocommerce',
			'description' => esc_attr__( 'This is left sidebar for WooCommerce shop pages.', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		// WooCommerce - Right
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for WooCommerce Shop', 'minemo' ),
			'id' => 'sidebar-right-woocommerce',
			'description' => esc_attr__( 'This is right sidebar for WooCommerce shop pages.', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	
	if( function_exists('is_bbpress') ){
		// BBPress - Left
		register_sidebar( array(
			'name'          => esc_attr__( 'Left Sidebar for BBPress', 'minemo' ),
			'id'            => 'sidebar-left-bbpress',
			'description'   => esc_attr__( 'This is left sidebar for BBPress.', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// BBPress - Right
		register_sidebar( array(
			'name'          => esc_attr__( 'Right Sidebar for BBPress', 'minemo' ),
			'id'            => 'sidebar-right-bbpress',
			'description'   => esc_attr__( 'This is right sidebar for BBPress.', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	if( function_exists('tribe_is_upcoming') ){
		// The Events Calendar - Left
		register_sidebar( array(
			'name'          => esc_attr__( 'Left Sidebar for Events', 'minemo' ),
			'id'            => 'sidebar-left-events',
			'description'   => esc_attr__( 'This is left sidebar for "The Events Calendar" plugin only.', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// The Events Calendar - Right
		register_sidebar( array(
			'name'          => esc_attr__( 'Right Sidebar for Events', 'minemo' ),
			'id'            => 'sidebar-right-events',
			'description'   => esc_attr__( 'This is right sidebar for "The Events Calendar" plugin only.', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - Top', 'minemo' ),
		'id'            => 'floating-widgets-top',
		'description'   => esc_attr__( 'This widget will appear (as full width) before the widget columns. So you can set any full width content here.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 1st column', 'minemo' ),
		'id'            => 'floating-widgets-1',
		'description'   => esc_attr__( 'Set 1st column widgets for Floatingbar area.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 2nd column', 'minemo' ),
		'id'            => 'floating-widgets-2',
		'description'   => esc_attr__( 'Set 2nd column widgets for Floatingbar area.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 3rd column', 'minemo' ),
		'id'            => 'floating-widgets-3',
		'description'   => esc_attr__( 'Set 3rd column widgets for Floatingbar area.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 4th column', 'minemo' ),
		'id'            => 'floating-widgets-4',
		'description'   => esc_attr__( 'Set 4th column widgets for Floatingbar area.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - Bottom', 'minemo' ),
		'id'            => 'floating-widgets-bottom',
		'description'   => esc_attr__( 'This widget will appear (as full width) after the widget columns. So you can set any full width content here.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	// First Footer widgets
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 1st Widget Area', 'minemo' ),
		'id' => 'first-footer-1-widget-area',
		'description' => esc_attr__( 'This is first footer widget area for first row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 2nd Widget Area', 'minemo' ),
		'id' => 'first-footer-2-widget-area',
		'description' => esc_attr__( 'This is second footer widget area for first row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 3rd Widget Area', 'minemo' ),
		'id' => 'first-footer-3-widget-area',
		'description' => esc_attr__( 'This is third footer widget area for first row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 4th Widget Area', 'minemo' ),
		'id' => 'first-footer-4-widget-area',
		'description' => esc_attr__( 'This is fourth footer widget area for first row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Second Footer widgets
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 1st Widget Area', 'minemo' ),
		'id' => 'second-footer-1-widget-area',
		'description' => esc_attr__( 'This is first footer widget area for second row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 2nd Widget Area', 'minemo' ),
		'id' => 'second-footer-2-widget-area',
		'description' => esc_attr__( 'This is second footer widget area for second row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 3rd Widget Area', 'minemo' ),
		'id' => 'second-footer-3-widget-area',
		'description' => esc_attr__( 'This is third footer widget area for second row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 4th Widget Area', 'minemo' ),
		'id' => 'second-footer-4-widget-area',
		'description' => esc_attr__( 'This is fourth footer widget area for second row of footer.', 'minemo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	// Dynamic Sidebars (Unlimited Sidebars)
	global $minemo_theme_options;
	$minemo_theme_options = get_option('minemo_theme_options');
	if( isset($minemo_theme_options['custom_sidebars']) && is_array($minemo_theme_options['custom_sidebars']) && count($minemo_theme_options['custom_sidebars'])>0 ){
		foreach( $minemo_theme_options['custom_sidebars'] as $custom_sidebar ){
			
			if( isset($custom_sidebar['custom_sidebar']) && trim($custom_sidebar['custom_sidebar'])!='' ){
				$custom_sidebar = $custom_sidebar['custom_sidebar'];
				if( trim($custom_sidebar)!='' ){
					$custom_sidebar_key = sanitize_title($custom_sidebar);
					register_sidebar( array(
						'name'          => $custom_sidebar,
						'id'            => $custom_sidebar_key,
						'description'   => esc_attr__( 'This is custom widget developed from "Minemo Options".', 'minemo' ),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>',
					) );
				}
			}
			
		}
	}
	
}
add_action( 'widgets_init', 'minemo_widgets_init' );

add_filter( 'vc_iconpicker-type-flaticon', 'preyantechnosys_special_iconspicker' );

function preyantechnosys_special_iconspicker( $icons ) {
	$custom_icons = array(
		array( 'flaticon-workspace' => 'flaticon workspace' ),
		array( 'flaticon-living-room' => 'flaticon living-room' ),
		array( 'flaticon-staircase' => 'flaticon staircase' ),
		array( 'flaticon-blueprint' => 'flaticon blueprint' ),
		array( 'flaticon-home-decoration' => 'flaticon home-decoration' ),
		array( 'flaticon-decorating' => 'flaticon decorating' ),
		array( 'flaticon-stairs' => 'flaticon stairs' ),
		array( 'flaticon-interior-design' => 'flaticon interior-design' ),
		array( 'flaticon-wardrobe' => 'flaticon wardrobe' ),
		array( 'flaticon-windows' => 'flaticon windows' ),
		array( 'flaticon-door-1' => 'flaticon door-1' ),
		array( 'flaticon-bed' => 'flaticon bed' ),
		array( 'flaticon-bed-1' => 'flaticon bed-1' ),
		array( 'flaticon-interior-design-1' => 'flaticon interior-design-1' ),
		array( 'flaticon-apartment' => 'flaticon apartment' ),
		array( 'flaticon-interior-design-2' => 'flaticon interior-design-2' ),
		array( 'flaticon-french-doors' => 'flaticon french-doors' ),
		array( 'flaticon-door-2' => 'flaticon door-2' ),
		array( 'flaticon-architecture-and-city' => 'flaticon architecture-and-city' ),
		array( 'flaticon-call' => 'flaticon call' ),
		array( 'flaticon-destination' => 'flaticon destination' ),
		array( 'flaticon-delivery' => 'flaticon delivery' ),
		array( 'flaticon-navigation' => 'flaticon navigation' ),
		array( 'flaticon-email' => 'flaticon email' ),
		array( 'flaticon-call-1' => 'flaticon call-1' ),
		array( 'flaticon-wall-clock' => 'flaticon wall-clock' ),
		array( 'flaticon-clock' => 'flaticon clock' ),
		array( 'flaticon-clock-1' => 'flaticon clock-1' ),
	);

	return array_merge( $icons, $custom_icons );
}