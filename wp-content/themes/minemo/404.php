<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Minemo
 * @since Minemo 1.0
 */

get_header(); ?>

<div id="primary" class="content-area <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_sidebar_class('content-area')); ?>">
	<main id="main" class="site-main">
		<section class="error-404 not-found">
			<?php echo preyantechnosys_404_imgdescription(); ?>
			<?php echo preyantechnosys_404_heading(); ?>
			<?php echo preyantechnosys_404_description(); ?>
		
			<?php if( preyantechnosys_get_option('error404_search')==true ): ?>
			<div class="prt-404-search-form">
				<?php get_search_form(); ?>
			</div>
			<?php endif; ?>
			
			<div class="prt-404-home-button">
				<div class="elementor-element elementor-element-48a9a43 prt-btn-color-white prt-btn-shape-rounded prt-btn-style-outline prt-icon-align-left elementor-widget elementor-widget-button" data-id="48a9a43" data-element_type="widget" data-widget_type="button.default">
					<div class="elementor-widget-container">
						<div class="elementor-button-wrapper">
						<a href="<?php echo esc_url(get_home_url()); ?>" class="elementor-button-link elementor-button elementor-size-md" role="button">
						<span class="elementor-button-content-wrapper"><span class="elementor-button-text"><?php echo esc_attr_e('Back to home page', 'minemo'); ?></span>
						</span></a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>