<?php 
$video_url = get_sub_field('section_video_url');
$image_id = get_sub_field('placeholder_image_id');
$section_title = get_sub_field('section_title');
$section_content = get_sub_field('section_content');
$section_button = get_sub_field('section_button');
$image_position = get_sub_field('image_position');
if($video_url) :  ?>
	<section class="section popup-video">
		<div class="centering">
			<div class="grid align-vertically <?php echo $image_position == 'left' ? 'row-reverse' : ''; ?>">
				<div class="grid-xs-12 grid-s-6">
					<div class="section-content">     
						<?php if ($section_title) : ?>
							<h3 class="section-title green"><?php echo esc_html($section_title); ?></h3> 
						<?php endif; ?>              
						<div class="section-text">
							<?php echo wp_kses_post($section_content); ?>
						</div>   
						<?php if (!empty($section_button) && $section_button['title'] && $section_button['url']) : ?>
							<a href="<?php echo esc_url($section_button['url']); ?>" class="button" target="<?php echo esc_attr($target); ?>">
								<?php echo esc_html($section_button['title']); ?>
							</a>               
						<?php endif; ?>
					</div> 
				</div>
				<div class="grid-xs-12 grid-s-6 image-container">                                                
					<div class="placeholder-image">
						<a href="<?php echo $video_url; ?>" class="play-video">
							<?php echo wp_get_attachment_image($image_id, 'large'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>