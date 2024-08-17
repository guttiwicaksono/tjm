<article class="preyantechnosys-box preyantechnosys-box-blog preyantechnosys-blogbox-stylethree <?php echo get_post_format() ?> <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_post_class()); ?>">
	<div class="post-item">
		<div class="prt-adv-blog-img prt-featured-outer-wrapper prt-post-featured-outer-wrapper">
			<?php echo preyantechnosys_get_featured_media( get_the_ID(), 'preyantechnosys-img-blog-left' ); ?>
			
		</div>	
		<div class="preyantechnosys-box-content">	
			<div class="prt-adv-content">
				<div class="prt-box-post-date prt-wrap-cell">
					<?php preyantechnosys_entry_date(); ?>
				</div>
				<div class="preyantechnosys-box-desc prt-wrap-cell">
					<div class="entry-title">
						<?php echo preyantechnosys_box_title(); ?>	
					</div>	
				</div>
				<div class="entry-header prt-wrap-cell">					
					<div class="prt-blog-post-cat">
						<?php
						$categories_list = get_the_category_list( ', ' );
						if ( !empty($categories_list) ) { ?>
							<span class="prt-meta-line cat-links"><span class="screen-reader-text tm-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'minemo' ); ?> </span><?php echo preyantechnosys_wp_kses($categories_list); ?></span>
						<?php } ?>
					</div> 
					<div class="prt-date">
					<?php echo minemo_entry_meta(); ?>
					</div>
				</div>	
					<div class="preyantechnosys-box-desc-footer prt-wrap-cell">
					<div class="preyantechnosys-blogbox-desc-footer">
						<?php echo preyantechnosys_blogbox_readmore(); ?>
					</div>
				</div>	
				
			</div>
        </div>
	</div>
</article>



