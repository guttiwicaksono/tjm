<article class="preyantechnosys-box preyantechnosys-box-testimonial preyantechnosys-testimonialbox-stylethree">
	<div class="preyantechnosys-post-item">
		<div class="preyantechnosys-box-content">
		    <div  class="prt-box-top">
			    <div class="preyantechnosys-box-img"><?php echo preyantechnosys_testimonial_featured_image('thumbnail') ?></div>
				<div class="preyantechnosys-box-title"><?php echo preyantechnosys_highlight_text(); ?><?php echo preyantechnosys_testimonial_title(); ?></div>
			</div>
			<div class="preyantechnosys-box-desc">
				<blockquote class="preyantechnosys-testimonial-text"><?php echo preyantechnosys_wp_kses( strip_tags( get_the_content('') ) ); ?></blockquote>
			</div>	
		</div>
	</div>
</article>