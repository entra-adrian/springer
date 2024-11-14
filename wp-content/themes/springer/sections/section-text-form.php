<?php 
$form_id = get_sub_field('section_form_id');
$text = get_sub_field('section_content');
$form_position = get_sub_field('form_position');
$section_class = xtheme_get_section_class('text-image');
if($form_id && $text) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">			
			<div class="grid <?php echo $form_position; ?>">
				<div class="grid-xs-12 grid-m-6">												
					<div class="section-text">
						<?php echo $text; ?>
					</div>
				</div>
				<div class="grid-xs-12 grid-m-6">
					<div class="section-form">	
						<?php echo do_shortcode('[contact-form-7 id="'. $form_id .'"]'); ?>
					</div>
				</div>
			</div>			
		</div>
	</section>
<?php endif; ?>