<?php 
$section_class = xtheme_get_section_class();
$title = get_sub_field('section_title');
if(have_rows('testimonials_items')) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">
			<?php if($title) { ?>
				<h2 class="section-title"><?php echo $title; ?></h2>
			<?php } ?>
			<div class="slideshow mobile-slideshow grid align-horizontally" data-flickity-options='{"watchCSS": true}'>
				<?php while(have_rows('testimonials_items')) : the_row(); 
					$testimonial = get_sub_field('testimonial');
					$testimonial_author = get_sub_field('testimonial_author');

					?>
					<div class="grid-xs-12 grid-s-6 grid-m-4 slideshow-slide">
						<div class="item item-testimonial">								
							<div class="item-content"><?php echo $testimonial; ?></div>
							<?php if($testimonial_author) { ?>
								<div class="item-meta"><?php echo $testimonial_author; ?></div>
							<?php } ?>													
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>