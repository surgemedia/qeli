<?php 
/*=========================================
=         get featured image url            =
=========================================*/
//Call inside the loop
function getFeaturedUrl(){
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
return $thumb_url;
}
