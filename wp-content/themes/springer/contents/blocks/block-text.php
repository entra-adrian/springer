<?php 
$text = get_sub_field('block_content');
if($text) : ?>
	<div class="content-block">
		<div class="section-text">		
			<?php echo $text; ?>
		</div>
	</div>
<?php endif; ?>