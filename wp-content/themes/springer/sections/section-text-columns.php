<?php 
$section_title = get_sub_field('section_title');
$background_color = get_sub_field('background_colour');
$column_no = get_sub_field('section_column_no');
switch ($column_no) {
	case '3':
		$grid_class = 'grid-xs-12 grid-s-4';
		break;
	case '4':
		$grid_class = 'grid-xs-12 grid-s-6 grid-m-3';
		break;
	
	default:
		$grid_class = 'grid-xs-12 grid-s-6';
		break;
}

if(have_rows('columns')) :
?>
	<section class="section text-columns <?php echo $background_color ? 'has-bg green' : ''; ?>">
		<div class="centering">
			<?php if($section_title) : ?>
				<h2 class="section-title align-center"><?php echo $section_title; ?></h2>
			<?php endif; ?>
			<div class="grid no-top-bottom-space">
				<?php while(have_rows('columns')) : the_row(); 
					$text = get_sub_field('column_content');

					?>
					<div class="<?php echo $grid_class; ?>">
						<div class="section-text">		
							<?php echo $text; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>