<?php 
$section_data = xtheme_get_section_class('has-bg boxes');
$section_class = $section_data['class'];
$section_style = $section_data['style'];
$text_color = get_sub_field('text_color');
$section_bg_id = get_sub_field('section_bg_image');
if ($section_bg_id) {
    $section_bg_url = wp_get_attachment_image_url($section_bg_id, 'full');
    $section_style = 'background-image: url(' . esc_url($section_bg_url) . '); background-size: cover; background-position: center;';
}
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
?>

<section class="<?php echo esc_attr($section_class); ?>" <?php if ($section_style) : ?> style="<?php echo esc_attr($section_style); ?>"<?php endif; ?>>
    <div class="centering">
        <div class="grid small-space">
            <?php while(have_rows('box_items')) : the_row();  
                $item_title = get_sub_field('item_title');
                $item_text = get_sub_field('item_text');
                $item_link = get_sub_field('item_link');
                $sticker_text = get_sub_field('sticker_text');
            ?>
                <div class="<?php echo $grid_class; ?>">
                    <div class="item box">
                        <?php if($item_title) : ?>
                            <h2 class="item-title"><?php echo $item_title; ?></h2>
                        <?php endif; ?>
                        <?php if($item_text) : ?>
                            <div class="item-content">
                                <?php echo $item_text; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($item_link) && $item_link['title'] && $item_link['url']) : ?>
                            <a href="<?php echo esc_url($item_link['url']); ?>" class="button item-button" target="<?php echo esc_attr($target); ?>">
                                <?php echo esc_html($item_link['title']); ?>
                            </a>               
                        <?php endif; ?>
                        <?php if($sticker_text) : ?>
                            <div class="sticker"><?php echo $sticker_text; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>