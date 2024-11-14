<article id="<?php echo get_post_type()."-".get_the_ID(); ?>" <?php post_class('article'); ?> role="article">
	<section class="section">
		<div class="centering small">
			<div class="content-block">
				<div class="section-text">	
					<?php the_content(); ?>
				</div>
			</div>
			<?php echo xtheme_render_postbuilder_elements(); ?>
			<div class="content-block post-actions">
				<span class="section-meta"><?php echo get_the_date(); ?></span>
			</div>
			<?php get_template_part('components/post-share'); ?>
			<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button" title="Go to Blog">Go Back</a>
		</div>
	</section>
</article> <!-- MAIN ARTICLE ENDS -->