<?php 
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
$alt_style = get_sub_field('alt_style');
?>

<section class="section items-icons align-center">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>

        <div class="grid align-horizontally">
            <?php while(have_rows('items_repeater')) : the_row();  
                $item_icon = get_sub_field('item_icon');
                $item_title = get_sub_field('item_title');
                $item_text = get_sub_field('item_text');
            ?>
                <div class="grid-xs-12 grid-s-4">
                    <div class="item icon <?php echo $alt_style =='true' ? 'align-left' : ''; ?>">
                        <?php if($item_icon) : ?>
                            <div class="item-icon"><?php echo wp_get_attachment_image($item_icon, 'small'); ?></div>
                        <?php endif; ?>
                        <?php if($item_title) : ?>
                            <h3 class="item-title"><?php echo $item_title; ?></h3>
                        <?php endif; ?>
                        <?php if($item_text) : ?>
                            <div class="item-content">
                                <?php echo $item_text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>