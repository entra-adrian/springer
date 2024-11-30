<?php
$section_title = get_sub_field('section_title');
?>
<section class="section">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <div class="section-inner">
            <?php while(have_rows('blocks_repeater')) : the_row(); 
                $images = get_sub_field('images');
                $image_position = get_sub_field('image_position');
                $content_title = get_sub_field('content_title');
                $content_text = get_sub_field('content_text');
                $slides = count($images);
            ?>
                <div class="images-text-block <?php echo $image_position; ?>">
                    <div class="slideshow image-slideshow <?php echo ($slides > 1) ? 'padding-bottom' : ''; ?>" data-flickity-options='{"prevNextButtons": false, "pageDots": true}'>
                        <?php foreach( $images as $image_id ) : ?>
                            <div class="slideshow-slide">
                                <?php echo wp_get_attachment_image($image_id, 'banner'); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="section-content">
                        <h3 class="content-title"><?php echo $content_title; ?></h3>
                        <div class="content-text">
                            <?php echo $content_text; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>