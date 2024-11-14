<?php 
$section_data = xtheme_get_section_class('has-bg text-image-with-background');
$section_class = $section_data['class'];
$section_style = $section_data['style'];
$text_color = get_sub_field('text_color');
$image_alignment = get_sub_field('image_alignment');
$section_bg_id = get_sub_field('section_bg_image');
$image_id = get_sub_field('section_image');
$section_title = get_sub_field('section_title');
$section_content = get_sub_field('section_content');
$section_button = get_sub_field('section_button');
$image_position = get_sub_field('image_position');
if ($section_bg_id) {
    $section_bg_url = wp_get_attachment_image_url($section_bg_id, 'full');
    $section_style = 'background-image: url(' . esc_url($section_bg_url) . '); background-size: cover; background-position: center;';
}
?>

<section class="<?php echo $image_alignment; ?> <?php echo esc_attr($section_class); ?>" <?php if ($section_style) : ?> style="<?php echo esc_attr($section_style); ?>"<?php endif; ?>>
    <div class="centering">
        <div class="grid align-vertically <?php echo $image_position == 'left' ? 'row-reverse' : ''; ?>">
            <div class="grid-xs-12 grid-m-6">
                <div class="section-content <?php echo $text_color == 'white' ? 'white-scheme' : 'black-scheme'; ?>">     
                    <?php if ($section_title) : ?>
                        <h2 class="section-title"><?php echo esc_html($section_title); ?></h2> 
                    <?php endif; ?>              
                    <div class="section-text">
                        <?php echo wp_kses_post($section_content); ?>
                    </div>   
                    <?php if (!empty($section_button) && $section_button['title'] && $section_button['url']) : ?>
                        <a href="<?php echo esc_url($section_button['url']); ?>" class="button" target="<?php echo esc_attr($target); ?>">
                            <?php echo esc_html($section_button['title']); ?>
                        </a>               
                    <?php endif; ?>
                </div> 
            </div>
            <div class="grid-xs-12 grid-m-6 image-container">                                                
                <div class="section-image">
                    <?php echo wp_get_attachment_image($image_id, 'large'); ?>
                </div>
            </div>
        </div>
    </div>
</section>