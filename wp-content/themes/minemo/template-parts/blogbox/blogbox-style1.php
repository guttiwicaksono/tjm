<article class="preyantechnosys-box preyantechnosys-box-blog preyantechnosys-blogbox-styleone preyantechnosys-blogbox-format-<?php echo get_post_format() ?> <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_post_class()); ?>">
	<div class="post-item">
		<div class="preyantechnosys-box-content">						
				<div class="preyantechnosys-bottom-content">
				<div class="tm-blog-post-cat">
						<?php
						$categories_list = get_the_category_list( ', ' );
						if ( !empty($categories_list) ) { ?>
							<span class="tm-meta-line cat-links"><span class="screen-reader-text tm-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'minemo' ); ?> </span><?php echo preyantechnosys_wp_kses($categories_list); ?></span>
						<?php } ?>
					</div>
					<?php echo preyantechnosys_box_title(); ?>						
					<div class="preyantechnosys-read">
						<?php echo preyantechnosys_blogbox_readmore(); ?>
						<?php echo minemo_entry_meta(); ?>																
					</div>
	        	</div>								
        </div>
	</div>
</article>
