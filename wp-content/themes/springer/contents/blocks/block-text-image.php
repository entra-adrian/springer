<?php 
if(have_rows('rows')) : ?>
	<div class="content-block">
		<?php while(have_rows('rows')) : the_row(); 
			$text = get_sub_field('row_content');
			$image_id = get_sub_field('row_image');
			$image_position = get_sub_field('row_image_position');
			?>
			<div class="grid align-vertically <?php echo $image_position; ?>">
				<div class="grid-xs-12 grid-m-6">												
					<div class="section-image">
						<?php echo wp_get_attachment_image($image_id, 'large'); ?>
					</div>
				</div>
				<div class="grid-xs-12 grid-m-6">
					<div class="section-text">	
						<?php echo $text; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>		
	</div>	
<?php endif; ?>