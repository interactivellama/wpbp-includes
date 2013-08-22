<?php 

// gets image source based on id and size
function llama_image ($image_id, $image_size = '') {	
	$image = wp_get_attachment_image_src($image_id, $image_size);
	$image_source = $image[0];
	return $image_source;
}

function llama_get_image_by_id ($image_id, $image_size = '') {	
	$image = wp_get_attachment_image_src($image_id, $image_size);
	$image_source = $image[0];
	return $image_source;
}
