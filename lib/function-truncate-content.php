<?php 
/*=========================================
=            Truncated Content           =
=========================================*/
function truncate($content,$cap,$ellipsis) {
	//get the content from wordpress
	$b4trunk = implode(' ', explode(' ', $content), 0, $cap). $ellipsis; 
	debug($b4trunk);
	//takes it out of the array then cuts it up into words and limits how many words it will show
	//kinda like serving a cake : you unpack it, cut it up, and serve it on a plate
	$trunk = strip_tags($b4trunk); 
	echo $trunk; 
}