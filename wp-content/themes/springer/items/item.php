<?php
	$id = get_the_ID();
	$short_description = get_field('short_description', $id);
	$popup_text = get_field('popup_text', $id);
?>

<article id="<?php echo get_post_type(); ?>-<?php echo get_the_ID(); ?>" <?php post_class('item news'); ?> role="listitem">
	<div class="item-inner">
		<div class="item-social-links">
			<?php while(have_rows('social_icons', $id)) : the_row();  
				$social_icon = get_sub_field('social_icon', $id);
				$social_url = get_sub_field('social_url', $id);
			?>
				<a href="<?php echo $social_url; ?>" class="social-link"><?php echo wp_get_attachment_image($social_icon, 'small'); ?></a>
			<?php endwhile; ?>
		</div>
		
		<h3 class="h2 item-title"><?php the_title(); ?></h3>

		<div class="item-short-description"><?php echo $short_description; ?></div>

		<a href="#" class="read-more-button">Mehr dazu</a>
	</div>
	<div class="item-image">
		<?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
	</div>

	<div class="popup-container">
		<div class="item-popup">
			<div class="popup-inner">
				<a href="" class="button-close"><span class="visually-hidden">Schließen</span></a>
				<h3 class="h1 popup-title"><?php the_title(); ?></h3>
				<div class="popup-text"><?php echo $popup_text; ?></div>
			</div>
		</div>
	</div>
</article>