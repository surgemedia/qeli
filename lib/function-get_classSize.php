<?php   
/*======================================================
=            Get Class Size           =
======================================================*/
function get_classSize($max_size,$current_size,$message = true){
	$result;
	if($message){
	if($max_size == $current_size){
		$result = 'Fully booked';
	} 
	if((int)$max_size-(int)$current_size <= 5 && $max_size != $current_size){
		$result =  'Limited seats available';
	} 

	}  else {
	if($max_size == $current_size){
		$result =  true;
	} 
	if($max_size > $current_size){
		$result =  false;
	}
	}

// if 5 seats left
return $result;
}