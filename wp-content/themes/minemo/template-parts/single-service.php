<?php
/*
 *
 *  Single Service - Top image
 *
 */

?>

<div class="prt-service-single-content-wrapper">
	<div class="preyantechnosys-common-box-shadow prt-service-single-content-wrapper-innerbox">		
	<div class="preyantechnosys-service-single-image-area">
		<div class="prt-post-featured-link-wrapper" <?php echo preyantechnosys_featured_link_image();?>>
			</div>
		<div class="preyantechnosys-service-content ">
			<?php echo preyantechnosys_box_title(); ?>
			<?php the_excerpt(); ?>
		</div>
	</div>
		<div class="preyantechnosys-service-single-content-area">
			<?php echo preyantechnosys_service_description(); ?>
		</div><!-- .preyantechnosys-service-single-content-area -->
		
	</div>	
</div>


<?php edit_post_link( esc_attr__( 'Edit', 'minemo' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
