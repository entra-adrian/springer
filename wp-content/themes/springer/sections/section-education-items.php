<?php 
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
?>

<section class="section simple-text-items align-center">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>

        <div class="grid small-space">
            <?php while(have_rows('items_repeater')) : the_row();  
                $item_text = get_sub_field('item_text');
                $item_link = get_sub_field('item_link');
            ?>
                <div class="grid-xs-12  grid-s-6  grid-m-4">
                    <div class="item simple-text">
                        <?php if($item_link) { echo sprintf('<a class="item-url" href="%s" target="_self">', $item_link); } ?>
                            <?php if($item_text) : ?>
                                <div class="item-content">
                                    <?php echo $item_text; ?>
                                </div>
                            <?php endif; ?>
                        <?php if($item_link) { echo '</a>'; }?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>