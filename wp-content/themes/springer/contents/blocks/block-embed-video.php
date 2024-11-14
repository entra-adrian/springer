<?php 
$embed_video = get_sub_field('section_video_embed');
if($embed_video) : ?>	
	<div class="content-block">
		<div class="section-content">
			<div class="responsive-iframe">	
				<?php echo $embed_video; ?>
			</div>			
		</div>
	</div>	
<?php endif; ?>