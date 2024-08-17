<article class="preyantechnosys-box preyantechnosys-box-blog preyantechnosys-blogbox-format-<?php echo get_post_format() ?> <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_post_class()); ?> preyantechnosys-box-view-left-image preyantechnosys-blog-box-view-left-image">
	<div class="post-item">
		<div class="preyantechnosys-box-content">
			<div class="col-md-4 preyantechnosys-box-img-left">
				<div class="prt-featured-outer-wrapper prt-post-featured-outer-wrapper" <?php echo preyantechnosys_featured_link_image();?>>
					<?php if( get_post_format() == 'quote' || get_post_format() == 'link') : ?>
						<?php echo preyantechnosys_get_featured_media( '', 'preyantechnosys-img-blog' ); // Featured content?>
					<?php endif; ?>
				</div>
			</div>
			<div class="preyantechnosys-box-content col-md-8">
				<div class="preyantechnosys-box-content-inner">
					<div class="entry-header">		
						<?php echo minemo_entry_meta(); ?>
						<?php echo preyantechnosys_box_title(); ?>	
						<div class="preyantechnosys-box-desc-text"><?php echo preyantechnosys_blogbox_description(); ?></div>	
					</div>
					<div class="preyantechnosys-box-desc">											
							<?php echo preyantechnosys_blogclassic_readmore(); ?>
							<div class="prt-post-date">
							<?php 
								$post = get_post(); 
								echo date('j F, Y', strtotime($post->post_date)); ?>
							</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</article>
