<?php 
$embed_video = get_sub_field('section_video_embed');
$section_class = xtheme_get_section_class();
$title = get_sub_field('section_title');
$description = get_sub_field('section_description');
if($embed_video) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering small">
			<?php if($title || $description) : ?>
				<div class="section-intro align-center">
					<?php if($title) { ?>
						<h2 class="section-title"><?php echo $title; ?></h2>
					<?php } ?>
					<?php if($description) { ?>
						<div class="section-description"><?php echo $description; ?></div>
					<?php } ?>
				</div>
			<?php endif; ?>
			<div class="section-content">
				<div class="responsive-iframe">	
					<?php echo $embed_video; ?>
				</div>			
			</div>
		</div>
	</section>
<?php endif; ?>