<?php 
$section_class = xtheme_get_section_class();
$title = get_sub_field('section_title');
$description = get_sub_field('section_description');
if(get_sub_field('accordion_items')) :
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
			
			<div class="accordion">
				<?php while(have_rows('accordion_items')) : the_row(); 
					$title = get_sub_field('item_title');
					$text = get_sub_field('item_text');

					?>
					<div class="accordion-group">
						<div class="accordion-title"><?php echo $title; ?></div>
                        <div class="accordion-panel">
                            <div class="panel-inner">  
	                            <div class="section-text">                          		                            	
	                                <?php echo $text; ?>
	                            </div>
                            </div>
                        </div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		
	</section>
<?php endif; ?>