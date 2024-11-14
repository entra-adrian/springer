<?php
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
?>

<section class="section item-icons-fullwidth">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>
        <div class="items-wrapper">
            <?php while(have_rows('items_repeater')) : the_row();  
                $item_icon = get_sub_field('item_image');
                $item_title = get_sub_field('item_title');
                $item_text = get_sub_field('item_text');
            ?>
                <div class="item icon-fullwidth">
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
</section>