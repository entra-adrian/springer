<?php
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
?>

<section class="section items-information align-center">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>
        <div class="items-wrapper">
            <?php while(have_rows('items_repeater')) : the_row();  
                $number = get_sub_field('number');
                $append_text = get_sub_field('append_text');
                $title = get_sub_field('title');
            ?>
                <div class="item number">
                    <div class="digit">
                        <div class="digit-number">
                            <?php echo $number; ?>
                        </div>
                        <?php if($append_text) : ?>
                            <div class="append-text">
                                <?php echo $append_text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if($title) : ?>
                        <h3 class="title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>