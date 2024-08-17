<?php
global $minemo_theme_options;

$search_input = ( !empty($minemo_theme_options['search_input']) ) ? esc_attr($minemo_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'minemo');

$searchform_title = ( isset($minemo_theme_options['searchform_title']) ) ? esc_attr($minemo_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'minemo');

if( !empty($searchform_title) ){
	$searchform_title = '<div class="prt-form-title">' . esc_attr($searchform_title) . '</div>';
}

if( !empty( $minemo_theme_options['header_search'] ) && $minemo_theme_options['header_search'] == true ){

?>
<div class="prt-search-overlay">
	<div class="prt-search-outer">
		<?php echo preyantechnosys_wp_kses($searchform_title); ?>
		<form method="get" class="prt-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="prt-minemo-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>