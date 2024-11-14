<?php global $post; ?>
<article id="<?php echo get_post_type()."-".get_the_ID(); ?>" <?php post_class('article'); ?> role="article">

	<?php if($post->post_content) : ?>	
		<section class="section">
			<div class="centering small">
				<div class="section-text">		
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php echo xtheme_render_pagebuilder_elements(); ?>

</article> <!-- MAIN ARTICLE ENDS -->