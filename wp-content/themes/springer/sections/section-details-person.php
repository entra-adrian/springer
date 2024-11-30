<?php 
$section_title = get_sub_field('section_title');
?>

<section class="section person-detail-blocks">
    <div class="centering">
        <?php if($section_title) : ?>
            <h2 class="section-title"><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <?php while(have_rows('blocks_repeater')) : the_row();  
            $image_id = get_sub_field('section_image');
            $image_position = get_sub_field('image_position');
            $title = get_sub_field('title');
            $occupation = get_sub_field('occupation');
            $address = get_sub_field('address');
            $telephone = get_sub_field('telephone');
        ?>
            <div class="grid small-space align-bottom <?php echo $image_position == 'left' ? 'row-reverse' : ''; ?>">
                <div class="grid-xs-12 grid-s-7 person-block">
                    <div class="person-detail">     
                        <?php if ($title) : ?>
                            <h3 class="title"><?php echo $title; ?></h3> 
                        <?php endif; ?>  
                        <?php if ($occupation) : ?>
                            <div class="occupation"><?php echo $occupation; ?></div> 
                        <?php endif; ?>  
                        <?php if ($address) : ?>
                            <div class="address"> 
                                <?php echo $address; ?>
                            </div>  
                        <?php endif; ?>  
                        <?php if ($telephone) : ?>
                            <div class="telephone"> 
                                <?php echo $telephone; ?>
                            </div>  
                        <?php endif; ?>  
                    </div> 
                </div>
                <div class="grid-xs-12 grid-s-5">                                                
                    <div class="section-image">
                        <?php echo wp_get_attachment_image($image_id, 'large'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>