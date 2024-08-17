<?php

/**
 * Register widget areas.
 *
 * @since Minemo 1.0
 *
 * @return void
 */
 
 if( !function_exists('preyantechnosys_minemo_init_widgets') ){
function preyantechnosys_minemo_init_widgets() {
	
	if( !function_exists('preyantechnosys_minemo_cs_framework_init') ){
	
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
			'name' => esc_attr__( 'Right Sidebar for Pages', 'minemo' ),
			'id' => 'sidebar-right-page',
			'description' => esc_attr__( 'This is right sidebar for pages', 'minemo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
	}
}
}
add_action( 'widgets_init', 'preyantechnosys_minemo_init_widgets' );