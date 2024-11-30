<?php 
	$footer_address = get_field('footer_address', 'option');
	$phone_numbers = get_field('phone_numbers', 'option');
	$hotline_title = get_field('hotline_title', 'option');

	$office_hours_title = get_field('office_hours_title', 'option');
	$office_hours = get_field('office_hours', 'option');

	$logistics_loading_title = get_field('logistics_loading_title', 'option');
	$logistics_loading = get_field('logistics_loading', 'option');
?>

<div class="footer-widgets">
	<div class="centering">
		<div class="grid">
			<div class="grid-xs-12">
				<div class="footer-logo">
					<div class="logo">
						<a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png'" alt="<?php bloginfo('name'); ?>" aria-label="<?php echo get_bloginfo('name'); ?> Logo" width="65" height="19" /></a>
					</div>
				</div>
			</div>
			<div class="grid-xs-12 grid-m-4">
				<div class="footer-information">
					<div class="general-address">
						<?php echo $footer_address; ?>
					</div>

					<div class="socials">
						<?php get_template_part('components/bookmarks'); ?>
					</div>

					<div class="footer-logos">
						<div class="logos">
							<?php while( have_rows ('new_logos', 'option')) : the_row();
								$image_id = get_sub_field('image');
								$item_link = get_sub_field('item_link');
							?>
								<div class="logo">
									<?php if($item_link) : ?>
										<a href="<?php echo $item_link; ?>"  target="_blank">
											<?php echo wp_get_attachment_image($image_id, 'large'); ?>
										</a>
									<?php else : ?>
										<?php echo wp_get_attachment_image($image_id, 'large'); ?>
									<?php endif ; ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="grid-xs-12 grid-m-4">
				<h3 class="hotline-title"><?php echo $hotline_title; ?></h3>
				<div class="hotline-support">
					<?php while(have_rows('hotline_items', 'option')) : the_row(); 
						$country = get_sub_field('country');
					?>
						<div class="country"><?php echo $country; ?></div>
					<?php endwhile; ?>
				</div>

				<?php if($phone_numbers) : ?>
					<div class="hotline-phone-numbers">
						<?php echo $phone_numbers; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="grid-xs-12 grid-m-4">
				<div class="widget widget-informations">
					<?php if($office_hours) : ?>
						<div class="office-hours-wrapper">
							<h6 class="hotline-title"><?php echo $office_hours_title; ?></h6>
							<div class="office-hours">
								<?php echo $office_hours; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if($logistics_loading) : ?>
						<div class="logistig-loading-wrapper">
							<h6 class="hotline-title"><?php echo $logistics_loading_title; ?></h6>
							<div class="office-hours logistic">
								<?php echo $logistics_loading; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-bottom">
	<div class="centering">	
		<div class="footer-menus">
			<?php wp_nav_menu( array('theme_location'  => 'footer', 'container' => false) ); ?>
		</div>
	</div>
</div>
