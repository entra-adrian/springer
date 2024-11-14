<?php
$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
?>

<section class="section timeline align-center">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php if($section_text) : ?>
            <div class="section-text"><?php echo $section_text; ?></div>
        <?php endif; ?>
        <div class="timeline-items-wrapper">
            <?php while(have_rows('items_repeater')) : the_row();  
                $year = get_sub_field('year');
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $image = get_sub_field('image');
            ?>
                <div class="item timeline">
                    <?php if($year) : ?>
                        <div class="year"><?php echo $year; ?></div>
                    <?php endif; ?>
                    <?php if($title) : ?>
                        <h3 class="title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if($text) : ?>
                        <div class="text"><?php echo $text; ?></div>
                    <?php endif; ?>
                    <?php if($image) : ?>
                        <div class="image"><?php echo wp_get_attachment_image($image, 'large'); ?></div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
        <button class="show-more-button">Show More</button>
    </div>
</section>