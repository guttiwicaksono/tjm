
<?php
$prt_product_hover_style   = preyantechnosys_get_option('prt_product_hover_style');
$prt_box_style  = ( !empty($prt_product_hover_style) ) ? $prt_product_hover_style : 'product-hover-style1' ;
?>
<div <?php post_class(); ?>>
<div class="prt-product-box <?php echo preyantechnosys_sanitize_html_classes($prt_box_style); ?>">
<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		

		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
				
		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		 
		
		do_action( 'woocommerce_shop_loop_item_title' );
		do_action( 'woocommerce_after_shop_loop_item' );
		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
	
		
		
			?>
		</div>
	</div>