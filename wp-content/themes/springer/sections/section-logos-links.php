<?php 
$section_class = xtheme_get_section_class();

if(have_rows('logos')) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">
			<div class="slideshow logos-slideshow mobile-slideshow" data-flickity-options='{"watchCSS": true}'>
				<?php while( have_rows('logos') ) : the_row();
					$image_id = get_sub_field('logo');
					$url = get_sub_field('logo_url');
					?>
					<div class="slideshow-slide">
						<div class="slide-image">
							<?php if($url) { echo sprintf('<a href="%s" target="_blank">', $url); } ?>
								<?php echo wp_get_attachment_image($image_id, 'medium'); ?>
							<?php if($url) { echo '</a>'; } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>