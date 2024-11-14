<?php 
$section_class = xtheme_get_section_class();
$title = get_sub_field('section_title');
if(have_rows('team_members')) :
?>
	<section class="<?php echo $section_class; ?>">
		<div class="centering">
			<?php if($title) { ?>
				<h2 class="section-title"><?php echo $title; ?></h2>
			<?php } ?>
			<div class="grid align-horizontally">
				<?php while(have_rows('team_members')) : the_row(); 
					$member_name = get_sub_field('member_name');
					$member_job_title = get_sub_field('member_job_title');
					$member_img_id = get_sub_field('member_image');
					$member_description = get_sub_field('member_description');

					?>
					<div class="grid-xs-12 grid-s-6 grid-m-4">
						<div class="item item-member">		
							<div class="item-image">
								<?php echo wp_get_attachment_image($member_img_id, 'medium'); ?>
							</div>
							<h4 class="item-title"><?php echo $member_name; ?></h4>
							<?php if($member_job_title) { ?>
								<div class="item-meta"><?php echo $member_job_title; ?></div>
							<?php } ?>
							<?php if($member_description) { ?>
								<div class="item-content"><?php echo $member_description; ?></div>
							<?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>