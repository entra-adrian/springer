<?php
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
?>

<section class="section item-data">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title align-center"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>
        <div class="grid">
            <?php while(have_rows('items_repeater')) : the_row();  
                $item_image = get_sub_field('item_image');
                $item_title = get_sub_field('item_title');
            ?>
                <div class="grid-xs-12 grid-s-6">
                    <div class="item data">
                        <?php if($item_title) : ?>
                            <h3 class="item-title"><?php echo $item_title; ?></h3>
                        <?php endif; ?>
                        <?php if(have_rows('item_details')) : ?>
                            <div class="item-details">
                                <?php while(have_rows('item_details')) : the_row();  
                                    $label = get_sub_field('label');
                                    $value = get_sub_field('value');
                                ?>  
                                    <div class="row">
                                        <?php if($label) : ?>
                                            <div class="label"><?php echo $label; ?></div>
                                        <?php endif; ?>
                                        <?php if($value) : ?>
                                            <div class="value"><?php echo $value; ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($item_image) : ?>
                            <div class="item-image"><?php echo wp_get_attachment_image($item_image, 'large'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>