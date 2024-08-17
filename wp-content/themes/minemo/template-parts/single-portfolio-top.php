<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */

?>

<div class="prt-pf-single-content-wrapper prt-pf-view-top-image">	
	<div class="prt-pf-single-content-wrapper-innerbox">
		
		<?php echo preyantechnosys_get_featured_media( get_the_ID(), 'preyantechnosys-img-portfoliodetail', false ); ?>
		<div class="prt-pf-top-content">
			<div class="preyantechnosys-pf-single-details-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="preyantechnosys-pf-single-detail-box">
				
					<?php echo preyantechnosys_portfoliofull_detailsbox(); ?>					
				</div>
			</div><!-- .preyantechnosys-pf-single-content-area -->
		</div>
		<div class="row">
			<div class="preyantechnosys-pf-single-content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php echo preyantechnosys_portfolio_description(); ?>
			</div><!-- .preyantechnosys-pf-single-details-area -->
			<div class="prt-social-bottom-wrapper col-md-12 col-lg-12">
				<div class="prt-nextprev-bottom-nav">
					<?php echo preyantechnosys_portfolio_next_prev_btn(); /* Next/Prev button */ ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo preyantechnosys_portfolio_related(); ?>
</div>

<?php edit_post_link( esc_attr__( 'Edit', 'minemo' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

