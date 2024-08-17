<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Minemo
 * @since Minemo 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo preyantechnosys_sanitize_html_classes(preyantechnosys_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
		
			<?php echo preyantechnosys_search_form(); ?>
						
			<?php if ( have_posts() ) : ?>

				<?php if( !empty($_GET['post_type']) ) : ?>
					<header class="page-header">
						<?php echo preyantechnosys_search_results_box_title( $_GET['post_type'] ); ?>
					</header><!-- .page-header -->
				<?php endif; ?>

				<?php echo preyantechnosys_search_results_content(); ?>

			<?php
			// If no content, include the "No posts found" template.
			else :
				?>
				
				<div class="prt-sresults-no-content-w">
				<?php
				$no_result_text = preyantechnosys_get_option( 'searchnoresult' );
				echo preyantechnosys_wp_kses( $no_result_text );
				?>
				</div>
				
			<?php endif; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
<?php
// Left Sidebar
preyantechnosys_get_left_sidebar();

// Right Sidebar
preyantechnosys_get_right_sidebar();
?>

<?php get_footer(); ?>
