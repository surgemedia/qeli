<?php
function my_admin_notice() {
    		echo '<div class="updated"><p>';
    		_e( 'All other posts of this type have been removed from the select course', 'my-text-domain' );
    		echo "</p></div>";
			}
/*=============================================
	=    	Make Master Post on course        =
=============================================*/
//$post_ids,$field_name,$sub_field,$post_type
function removeOtherPosts($post_type){
	if(is_admin() && isset($_GET['post'])){
	
	if(true == isset($_GET['post'])){ $post_id = $_GET['post']; }
	//Check if the master field is selected
	if( 1 == get_field('remove_others',$post_id) ) {
		//Stores current course selected of the current post in admin.
		$GLOBALS['current_course'] = get_field('course',$post_id)->ID;
		//Check all of the current post type for course value
	    $args = array('post_type' => $post_type,);
	    $loop = new WP_Query($args);	

	     if($loop->have_posts()) {
	        while($loop->have_posts()) : $loop->the_post();
	        	//Store the field in var to prevent slow server issues
	        	$check = get_field('course',get_the_ID())->ID;
	 			//checks if the current course on the page is matched on any other page.
	        	if($GLOBALS['current_course'] == $check){ 
	        	//Updates all the fields to 0 - no master
	        	update_field('remove_others',0,get_the_ID());
	        	}
	        endwhile;
	     }
	     	//Sets the master field back to true(1) for the current post
			update_field('remove_others',1,$post_id);
			add_action( 'admin_notices', 'my_admin_notice' );
		}
	}	
}