<?php 
$video_url = get_sub_field('section_video_url');
$image_id = get_sub_field('banner_image');
$overlay = get_sub_field('image_overlay');
if($video_url) :  ?>
	<section class="section banner-video-with-popup <?php echo $overlay ? 'image-overlay' : ''; ?>">                                             
        <div class="placeholder-image">
            <?php echo wp_get_attachment_image($image_id, 'large'); ?>
        </div>
        <a href="<?php echo $video_url; ?>" class="play-video">
            <img class="play-button" src="<?php echo get_stylesheet_directory_uri() . '/images/play-button.png'; ?>" alt="play-button">
        </a>
	</section>
<?php endif; ?>