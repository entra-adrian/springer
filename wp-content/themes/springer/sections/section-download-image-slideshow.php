<?php 
$download_images = get_sub_field('download_images');
$section_title = get_sub_field('section_title');
if (!empty($download_images)) : 
?>
    <section class="section download-image">
        <div class="centering">
            <?php if ($section_title) : ?>
                <h2 class="section-title"><?php echo esc_html($section_title); ?></h2> 
            <?php endif; ?>   
            <div class="slideshow download-image-slideshow">
                <?php foreach ($download_images as $download_image_id) : 
                    $image_url = wp_get_attachment_url($download_image_id); // Get the URL of the image
                ?>
                    <div class="slideshow-slide">
                        <div class="download-image">
                            <?php echo wp_get_attachment_image($download_image_id, 'medium'); ?>
                        </div>
                        <a href="<?php echo esc_url($image_url); ?>" class="download-link" download>
                            <span>Download</span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>