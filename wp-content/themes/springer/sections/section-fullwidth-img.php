<?php 
$image_id = get_sub_field('section_image');
$section_class = xtheme_get_section_class('fullwidth-banner');

if($image_id) : ?>
	<section class="<?php echo $section_class; ?>">		
		<div class="section-bg">
			<?php echo wp_get_attachment_image($image_id, 'banner'); ?>
		</div>		
	</section>
<?php endif; ?>