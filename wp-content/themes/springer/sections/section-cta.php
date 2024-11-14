<?php 
$section_class = xtheme_get_section_class('cta align-center');
$title = get_sub_field('section_title');
$description = get_sub_field('section_description');
$button = get_sub_field('section_button');
if(!empty($button) && $button['title'] && $button['url']) :
	$target = ($button['target']) ? $button['target'] : '_self';
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
			<div class="section-actions">
				<a href="<?php echo $button['url']; ?>" class="button" target="<?php echo esc_attr( $target ); ?>"><?php echo $button['title']; ?></a>
			</div>
		</div>
	</section>
<?php endif; ?>