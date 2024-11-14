<?php 
$post_id = get_the_ID();
$custom_page_title = 'custom_page_title';
if(is_home()) {
	$post_id = get_option('page_for_posts');
}
if(is_post_type_archive()) {
	$post_id = 'option';
	$custom_page_title = get_post_type().'_'.$custom_page_title;	
}
$title = get_page_title();
$custom_page_title = get_field($custom_page_title, $post_id);
if($custom_page_title) {
	$title = $custom_page_title;
}
?>
<div class="page-header">
	<div class="centering">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
</div>