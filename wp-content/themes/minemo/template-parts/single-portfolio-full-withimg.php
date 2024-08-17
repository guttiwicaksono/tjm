<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */

?>

<div class="prt-pf-single-content-wrapper prt-pf-view-top-image">

	<?php echo preyantechnosys_get_featured_media(); ?>
	
	<div class="row">
		<div class="preyantechnosys-pf-single-content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php echo preyantechnosys_portfolio_description(); ?>
		</div><!-- .preyantechnosys-pf-single-content-area -->
		<div class="prt-social-bottom-wrapper col-md-12 col-lg-12">
			<div class="prt-single-pf-footer">
				<?php echo preyantechnosys_social_share_box('portfolio'); /* Social share */ ?>
				<?php
					// Portfolio Category
					$tag_value = get_the_term_list( get_the_ID(), 'tm_portfolio_category', '', ' ', '' );
					if( !empty($tag_value) ){ ?>
						<div class="prt-pf-single-category-w">
							<?php echo preyantechnosys_wp_kses($tag_value); ?>
						</div>
				<?php } ?>
				</div>
			<div class="prt-nextprev-bottom-nav">
				<?php echo preyantechnosys_portfolio_next_prev_btn(); /* Next/Prev button */ ?>
			</div>
		</div>	
	</div>
	<?php echo preyantechnosys_portfolio_related(); ?>
</div>

<?php edit_post_link( esc_attr__( 'Edit', 'minemo' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>