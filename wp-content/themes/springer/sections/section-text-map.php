<?php 
$embed_map = get_sub_field('embed_map');
$text = get_sub_field('section_content');
$map_position = get_sub_field('map_position');
$section_class = xtheme_get_section_class('text-image');
if($embed_map && $text) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">			
			<div class="grid <?php echo $map_position; ?>">
				<div class="grid-xs-12 grid-m-6">												
					<div class="section-text">
						<?php echo $text; ?>
					</div>
				</div>
				<div class="grid-xs-12 grid-m-6">
					<div class="responsive-iframe">	
						<?php echo $embed_map; ?>
					</div>
				</div>
			</div>			
		</div>
	</section>
<?php endif; ?>