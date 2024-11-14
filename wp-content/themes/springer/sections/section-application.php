<?php
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
$section_image = get_sub_field('section_image');
?>

<section class="section application">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>
        <div class="section-inner">
            <div class="column left">
                <?php while(have_rows('items_repeater_left')) : the_row();  
                    $item_icon = get_sub_field('item_icon');
                    $item_title = get_sub_field('item_title');
                    $item_text = get_sub_field('item_text');
                ?>
                    <div class="item icon">
                        <?php if($item_icon) : ?>
                            <div class="item-icon"><?php echo wp_get_attachment_image($item_icon, 'small'); ?></div>
                        <?php endif; ?>
                        <div class="item-content"> 
                            <?php if($item_title) : ?>
                                <h3 class="item-title"><?php echo $item_title; ?></h3>
                            <?php endif; ?>
                            <?php if($item_text) : ?>
                                <div class="item-text">
                                    <?php echo $item_text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="column center">
                <?php echo wp_get_attachment_image($section_image, 'large'); ?>
            </div>
            <div class="column right">
                <?php while(have_rows('items_repeater_right')) : the_row();  
                    $item_icon = get_sub_field('item_icon');
                    $item_title = get_sub_field('item_title');
                    $item_text = get_sub_field('item_text');
                ?>
                    <div class="item icon">
                        <?php if($item_icon) : ?>
                            <div class="item-icon"><?php echo wp_get_attachment_image($item_icon, 'small'); ?></div>
                        <?php endif; ?>
                        <div class="item-content"> 
                            <?php if($item_title) : ?>
                                <h3 class="item-title"><?php echo $item_title; ?></h3>
                            <?php endif; ?>
                            <?php if($item_text) : ?>
                                <div class="item-text">
                                    <?php echo $item_text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php if(have_rows('image-link')) : ?>
            <div class="section-actions">
                <?php while( have_rows('image-link') ) : the_row();
                $image_id = get_sub_field('image');
                $url = get_sub_field('image_url');
                ?>
                    <div class="image-link">
                        <?php if($url) { echo sprintf('<a href="%s" target="_blank">', $url); } ?>
                            <?php echo wp_get_attachment_image($image_id, 'medium'); ?>
                        <?php if($url) { echo '</a>'; } ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>