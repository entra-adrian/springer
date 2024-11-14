<?php 
$section_class = xtheme_get_section_class();
$title = get_sub_field('section_title');
$description = get_sub_field('section_description');
if(have_rows('tabs_items')) :
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
			
			<div class="tabs">
				<ul class="tabs-navigation">
					<?php $count = 1;
						while(have_rows('tabs_items')) : the_row();							
							$title = get_sub_field('item_title');
							$tab_id = sanitize_title_with_dashes($title);
						?>
						<li><a href="#" class="<?php echo $count == 1 ? 'is-selected' : ''; ?>" data-tab="<?php echo $tab_id; ?>"><?php echo $title; ?></a></li>
					<?php $count++; endwhile; ?>
				</ul>
				<div class="tab-panels">
					<?php 
					$count = 1;
					while(have_rows('tabs_items')) : the_row(); 
						$title = get_sub_field('item_title');
						$text = get_sub_field('item_text');
						$tab_id = sanitize_title_with_dashes($title);
						?>
						<div class="tab-panel <?php echo $count == 1 ? 'is-selected' : ''; ?>" data-tab-panel="<?php echo $tab_id; ?>">
							<div class="tab-title h4"><?php echo $title; ?></div>
	                        <div class="tabs-content">	                            
	                            <div class="section-text">                       		                            	
	                                <?php echo $text; ?>
	                            </div>	                            
	                        </div>
						</div>
					<?php $count++; endwhile; ?>
				</div>
			</div>
			
		</div>
	</section>
<?php endif; ?>