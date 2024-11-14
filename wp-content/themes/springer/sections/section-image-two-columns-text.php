<?php 
$section_data = xtheme_get_section_class('has-bg image-two-colums-text');
$section_class = $section_data['class'];
$section_style = $section_data['style'];
$text_color = get_sub_field('text_color');
$section_bg_id = get_sub_field('section_bg_image');
$image_id = get_sub_field('section_image');
$section_pretitle = get_sub_field('section_pretitle');
$section_title = get_sub_field('section_title');
$left_content = get_sub_field('left_content');
$right_content = get_sub_field('right_column');
$image_position = get_sub_field('image_position');
if ($section_bg_id) {
    $section_bg_url = wp_get_attachment_image_url($section_bg_id, 'full');
    $section_style = 'background-image: url(' . esc_url($section_bg_url) . '); background-size: cover; background-position: center;';
}
?>

<section class="<?php echo esc_attr($section_class); ?>" <?php if ($section_style) : ?> style="<?php echo esc_attr($section_style); ?>"<?php endif; ?>>
    <div class="centering">
        <div class="grid align-vertically <?php echo $image_position == 'left' ? 'row-reverse' : ''; ?>">
            <div class="grid-xs-12 grid-m-7">
                <div class="section-content <?php echo $text_color == 'white' ? 'white-scheme' : 'black-scheme'; ?>">     
                    <?php if ($section_pretitle) : ?>
                        <h5 class="section-pretitle"><?php echo esc_html($section_pretitle); ?></h5> 
                    <?php endif; ?>  
                    <?php if ($section_title) : ?>
                        <h2 class="section-title"><?php echo esc_html($section_title); ?></h2> 
                    <?php endif; ?>              
                    <div class="grid inner-content">
                        <div class="grid-xs-12 grid-m-6">
                            <?php echo $left_content; ?>
                        </div>
                        <div class="grid-xs-12 grid-m-6">
                            <?php echo $right_content; ?>
                        </div>
                    </div>   
                </div> 
            </div>
            <div class="grid-xs-12 grid-m-5">                                                
                <div class="section-image">
                    <?php echo wp_get_attachment_image($image_id, 'large'); ?>
                </div>
            </div>
        </div>
    </div>
</section>