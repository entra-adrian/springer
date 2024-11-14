<?php 
$section_class = xtheme_get_section_class('text-image-vertical');
$column_no = get_sub_field('section_column_no');
switch ($column_no) {
	case '3':
		$grid_class = 'grid-xs-12 grid-s-4';
		$image_size = 'medium';
		break;
	case '4':
		$grid_class = 'grid-xs-12 grid-s-6 grid-m-3';
		$image_size = 'medium';
		break;	
	default:
		$grid_class = 'grid-xs-12 grid-s-6';
		$image_size = 'large';
		break;
}

if(have_rows('columns')) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">
			<div class="grid">
				<?php while(have_rows('columns')) : the_row(); 
					$image_id = get_sub_field('column_image');
					$title = get_sub_field('column_title');
					$text = get_sub_field('column_content');

					?>
					<div class="<?php echo $grid_class; ?>">
						<div class="section-content">							
							<div class="section-image">
								<?php echo wp_get_attachment_image($image_id, $image_size); ?>
							</div>
							<?php if($title) { ?>
								<h3 class="section-title"><?php echo $title; ?></h3>
							<?php } ?>
							<div class="section-text">	
								<?php echo $text; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>