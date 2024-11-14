<?php 
$images = get_sub_field('images');
$column_no = get_sub_field('section_column_no');
switch ($column_no) {
	case '3':
		$grid_class = 'grid-xs-12 grid-s-4';
		$image_size = 'large';
		break;
	case '4':
		$grid_class = 'grid-xs-12 grid-s-6 grid-m-3';
		$image_size = 'medium';
		break;
	case '6':
		$grid_class = 'grid-xs-12 grid-s-6 grid-m-3 grid-md-2';
		$image_size = 'medium';
		break;
	
	default:
		$grid_class = 'grid-xs-12 grid-s-6';
		$image_size = 'large';
		break;
}

if(!empty($images)) : ?>	
	<div class="content-block">
		<div class="grid align-horizontally image-gallery">
			<?php foreach( $images as $image_id ) : ?>
				<div class="<?php echo $grid_class; ?>">
					<div class="item-gallery">
						<a href="<?php echo wp_get_attachment_image_url($image_id, 'large'); ?>" class="open-lightbox">							
							<?php echo wp_get_attachment_image($image_id, $image_size); ?>
						</a>	
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>	
<?php endif; ?>