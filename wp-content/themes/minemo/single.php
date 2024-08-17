<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Minemo
 * @since Minemo 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			?>
			
				<?php
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				if(preyantechnosys_get_option('blog_view') == 'classic-style2') {
					get_template_part('template-parts/content-classicstyle2-post','classic-style2');
				} else if(preyantechnosys_get_option('blog_view') == 'classic-style3') {
					get_template_part('template-parts/content-classicstyle3-post','classic-style3');
				} else {
					get_template_part('template-parts/content-classic-post','classic');
				}
			
				?>

				<?php
									
			// End the loop.
			endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

	
<?php
// Left Sidebar
preyantechnosys_get_left_sidebar();

// Right Sidebar
preyantechnosys_get_right_sidebar();
?>
	
<?php get_footer(); ?>