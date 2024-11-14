<?php 
$images = get_sub_field('images');
$section_class = xtheme_get_section_class();
if(!empty($images)) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">
			<div class="slideshow image-slideshow">
				<?php foreach( $images as $image_id ) : ?>
					<div class="slideshow-slide">
						<?php echo wp_get_attachment_image($image_id, 'banner'); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>