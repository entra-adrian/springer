<?php 
$images = get_sub_field('logos');
$section_class = xtheme_get_section_class();

if(!empty($images)) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">
			<div class="slideshow logos-slideshow mobile-slideshow" data-flickity-options='{"watchCSS": true}'>
				<?php foreach( $images as $image_id ) : ?>
					<div class="slideshow-slide">
						<div class="slide-image">		
							<?php echo wp_get_attachment_image($image_id, 'medium'); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>