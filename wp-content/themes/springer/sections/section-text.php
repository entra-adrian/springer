<?php 
$section_data = xtheme_get_section_class('simple-text has-bg');
$section_class = $section_data['class'];
$section_style = $section_data['style'];
$text_color = get_sub_field('text_color');
$section_bg_id = get_sub_field('section_bg_image');
$text = get_sub_field('section_content');
if ($section_bg_id) {
    $section_bg_url = wp_get_attachment_image_url($section_bg_id, 'full');
    $section_style = 'background-image: url(' . esc_url($section_bg_url) . '); background-size: cover; background-position: center;';
}
if($text) :

?>
	<section class="<?php echo esc_attr($section_class); ?> <?php echo $text_color = 'white' ? 'white-scheme' : 'black-scheme'; ?>" <?php if ($section_style) : ?> style="<?php echo esc_attr($section_style); ?>"<?php endif; ?>>
		<div class="centering">
			<div class="section-text">		
				<?php echo $text; ?>
			</div>
		</div>
	</section>
<?php endif; ?>