<?php 
$images = array();
$post_id = get_the_ID();
$banner_images_field = 'banner_images';
$hide_page_title_field = 'hide_page_title';
$custom_page_title = 'custom_page_title';
if(is_home() || is_category()) {
	$post_id = get_option('page_for_posts');
}
if(is_post_type_archive()) {
	$post_id = 'option';
	$banner_images_field = get_post_type().'_'.$banner_images_field;
	$hide_page_title_field = get_post_type().'_'.$hide_page_title_field;
	$custom_page_title = get_post_type().'_'.$custom_page_title;	
}


$featured_img_id = get_post_thumbnail_id($post_id);
$banner_images = get_field($banner_images_field, $post_id);
$hide_page_title = get_field($hide_page_title_field, $post_id);
$title = get_page_title();
$custom_page_title = get_field($custom_page_title, $post_id);
if($custom_page_title) {
	$title = $custom_page_title;
}
// add banner iamges to the array
if(!empty($banner_images)) {
	$images = $banner_images;
}
// if has featured iamge, add it at the beginning of the array
if($featured_img_id) {
	array_unshift($images, $featured_img_id);	
}
if(empty($images)) {
	get_template_part('components/page-header');
	return;
}
// if no need for page title on banner, move it outside of slideshow and use screen-reader-text class
?>

<div class="slideshow banner image-slideshow" role="banner">
	<?php foreach($images as $image_id) { ?>
		<div class="slideshow-slide">
			<?php echo wp_get_attachment_image($image_id, 'banner', false, array('loading' => false)); ?>		
		</div>
	<?php } ?>
	<div class="slideshow-content">
		<h1 class="slideshow-title <?php if($hide_page_title) { echo 'screen-reader-text'; } ?>"><?php echo $title; ?></h1>
	</div>
</div>
