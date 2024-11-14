<?php 
	$args = array(
		'orderby'   => 'rating',
		'order'     => 'ASC'
	);
	$socials = get_bookmarks($args);

	if(!empty($socials)){ ?>
		<ul class="social-icons">
			<?php foreach ($socials as $link) {
				printf('<li><a href="%s" title="%s" class="icon-social" target="_blank"><span class="screen-reader-text">%s</span></a></li>', $link->link_url, $link->link_name, $link->link_name, $link->link_name);
			} ?>
		</ul>		
<?php } ?>