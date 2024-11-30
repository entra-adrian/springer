<h1 class="screen-reader-text"><?php echo get_page_title(); ?></h1>
<?php if(have_rows('homepage_slides')) { ?>

	<div class="slideshow main-slideshow" role="banner">
		<?php while(have_rows('homepage_slides')) { the_row();
				$img_id = get_sub_field('slide_image');
				$title = get_sub_field('slide_title');
				$content = get_sub_field('slide_content');
				$button = get_sub_field('slide_button');
		 	?>
			<div class="slideshow-slide">
				<div class="centering">	
					<?php echo wp_get_attachment_image($img_id, 'banner', false, array('loading' => false)); ?>
					<?php if($title || $content && !empty($button)) { ?>
						<div class="content-wrapper">
							<div class="socials">
								<?php get_template_part('components/bookmarks'); ?>
							</div>
							<div class="slide-content">	
								<?php if($title) { echo sprintf('<h2 class="h1 slide-title">%s</h2>', $title); } ?>							
								<?php if($content) { echo sprintf('<div class="slide-text">%s</div>', $content); } ?>
								<?php if(!empty($button) && $button['title'] && $button['url']) {
									echo sprintf('<a href="%s" title="%s" class="button">%s</a>', $button['url'], $button['title'], $button['title']);
								} ?>
							</div>
						</div>
					<?php } ?>
				</div>
				</div>
		<?php } ?>
	</div>
<?php } ?>