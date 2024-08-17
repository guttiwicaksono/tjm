<?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('preyantechnosys-main-menu') ) : ?>

	<!-- Max Mega Menu is enabled so we are not showing our toggle menu -->
	
<?php else: ?>

<button id="menu-toggle" class="menu-toggle">
	<span class="prt-hide"><?php esc_attr_e( 'Toggle menu', 'minemo' ); ?></span><i class="prt-minemo-icon-bars"></i>
</button>

<?php
 $prt_burgermenu		= preyantechnosys_get_option('megamenu-burger');
 if ( $prt_burgermenu == true ) { ?> 
<button id="menu-toggle-" class="menu-toggle burgermenu">
	<span class="prt-burgermeu"><?php esc_attr_e( 'Menu', 'minemo' ); ?></span><i class="prt-minemo-icon-bars"></i><i class="prt-minemo-icon-close close-icon"></i>
</button>
<?php } ?>

<?php endif; ?>

<?php if ( has_nav_menu( 'preyantechnosys-main-menu' ) ) : ?>
<?php wp_nav_menu( array( 'theme_location' => 'preyantechnosys-main-menu', 'menu_class' => 'nav-menu', 'container_class' => 'nav-menu' ) ); ?>
<?php endif; ?>