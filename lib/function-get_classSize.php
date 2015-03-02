<?php   
/*======================================================
=            Get Class Size           =
======================================================*/
function get_classSize($max_size,$current_size){
	if($max_size <= $current_size){
		echo 'Fully booked';
	} 
	if($max_size <= $current_size){
		echo 'Limited seats available';
	}
	// if($max_size == $current_size){
	// 	echo 'limited seats available';
	// }
	

	//get_field('instances')[0]['class_size'] <= (int) get_sub_field('currentClassSize')

}