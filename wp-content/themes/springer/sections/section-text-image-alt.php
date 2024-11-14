<?php 
$section_data = xtheme_get_section_class('has-bg text-image-with-background');
$section_class = $section_data['class'];
$section_style = $section_data['style'];
$image_id = get_sub_field('section_image');
$section_content = get_sub_field('section_content');
$image_position = get_sub_field('image_position');

if(empty($section_content) || empty($image_id)) {
    return;
}
?>

<section class="<?php echo esc_attr($section_class); ?>" <?php if ($section_style) : ?> style="<?php echo esc_attr($section_style); ?>"<?php endif; ?>>
    <?php if($image_id) : ?>
        <div class="section-bg half <?php echo $image_position; ?>"><?php echo wp_get_attachment_image($image_id, 'full'); ?></div>
    <?php endif; ?>
    <div class="centering">
        <div class="grid align-vertically">
            <div class="grid-xs-12 grid-m-6 <?php if($image_position == 'left') { echo 'offset-m-6'; } ?>">
                <div class="section-content">                    
                    <div class="section-text">
                        <?php echo $section_content; ?>
                    </div>                   
                </div> 
            </div>
        </div>
    </div>
</section>