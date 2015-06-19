<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

add_image_size('qeli-talks-square', 200, 200, true );

add_image_size('qeli-partner-logo', 600, 300, false);

function QELify($the_string){
	if(strrpos($the_string, 'QELi')!==false){
		return str_replace("QELi", "<span class='text-uppercase'>QEL</span><span class='text-lowercase'>i</span>", $the_string);
	}else{
		return $the_string;
	}
}