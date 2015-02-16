<?php
/*
Template Name: Json Cron Jobs
*/

/* =============================================

		    Surge Media PTY LTD.

		MiddleWare Function for Qeli
			
Course Import - Json Cron to Save in Web locally

==============================================*/


if($_GET['PassWordCode']!="3yfdr73rw3aRTe4x"){ //Setting the password for cron jobs
	echo 'Hello World!';
	exit;
	//If someone try to view this page without password, it will just display Hello World, make it look like is the test page only.
}else{
	$json_test = file_get_contents('http://qeli.systina.net/api/catalog');
	//Read Json Files from BMS
	$check_date = date('Y-m-d');
	$theme_root = get_theme_root();
	//Create the path for file saved.
	
	$fp = fopen($theme_root."/qeli/course-json/".$check_date.".json", "w");
	fputs($fp, $json_test);
	fclose($fp);
	//Create local json file and save contents to these file.
	
	$my_post = array(
		'post_type'     => 'json_',
		'post_title'    => $check_date.".json",
		'post_content'  => 'New File',
		'post_status'   => 'publish',
		'post_author'   => 1
	);

	// Insert the post into the database
	if($json_test!=""){// If can download file, it will take action to update system.
		$Files_id = wp_insert_post( $my_post );//insert new file and get the post id in same time.
	
		$json = file_get_contents($theme_root."/qeli/course-json/".$check_date.".json");
		$jsonIterator = json_decode($json, true);
		//print_r(array_keys($jsonIterator));
		//echo print_r($jsonIterator);
		//print_r(array_keys($jsonIterator[0]));
		//print_r($jsonIterator[0]);
		for($i=0; $i< count($jsonIterator); $i++){
			$course_num = $i+1;
			//Review Here - @alex / @stagfoo - Depericated

			
			// WP_Query arguments
			$check_item = array (
				'post_type'              => 'courses',
				'post_status'            => 'Published',
				'orderby'                => 'id',
				'order'                => 'DESC',
			);
			
			// The Query
			$check_item_row = new WP_Query( $check_item );

			// The Loop
			if ( $check_item_row->have_posts() ) {
				$first_while_item_get = 0;
				while ( $check_item_row->have_posts() ) {
					$check_item_row->the_post();
					$check_item_id = get_the_id();
					$check_content = get_the_content();
					$check_title = get_the_title();
					if($check_content == $jsonIterator[$i]['programId'] && $check_title == $jsonIterator[$i]['title']){
						if($first_while_item_get == 0 ){
							$check_item_row_id = $check_item_id;
							$first_while_item_get = 2;
						}
					}
				}
			} else {
				// no posts found
				$check_item_row_id = "";
			}
			
			
			//echo '<h1>'.$check_item_row_id.'</h1>';
			// Restore original Post Data
			wp_reset_postdata();


			
			
	/* ===============================================================================================================
														Add new Tag
	=============================================================================================================== */
			$tag_loop = 0;
			for($j=0; $j<count($jsonIterator[$i]['tags']); $j++){
				$Addid = str_replace(" ","-", $jsonIterator[$i]['tags'][$j]);
				$Addid2 = str_replace(",","_", $Addid);
				$tag_slug = strtolower($Addid2);
				$tag_name = str_replace(","," ",$jsonIterator[$i]['tags'][$j]);
				if($tag_slug!="" && $tag_name!=""){
					wp_insert_term( $tag_name, 'courses_tags', array('slug'=>$tag_slug));
					if($tag_loop==0){
						$add_to_tag = $tag_slug;// first one without, in the front of query code
					}else{
						$add_to_tag .= ", ".$tag_slug;//add the ID to delete query, If it's second one, add , to make it work with one query
					}
					$tag_loop++;
				}
			}
			//echo 'addtotag:'.$add_to_tag."<br/>";



	/* ===============================================================================================================
												     Add new Catagories
	=============================================================================================================== */
			for($j=0; $j<count($jsonIterator[$i]['categories']); $j++){
				$cata_slug1 = str_replace(" ","-", $jsonIterator[$i]['categories'][$j]);
				$cata_slug2 = str_replace(",","_", $cata_slug1);
				$cata_slug = strtolower($cata_slug2);
				$cata_name = str_replace(","," ",$jsonIterator[$i]['categories'][$j]);
				if($cata_slug!="" && $cata_name!=""){
					wp_insert_term( $cata_name, 'courses_categories', array('slug'=>$cata_slug));
						$add_to_cata[$i][] = $cata_slug;// first one without, in the front of query code
				}
			}
			//echo print_r($add_to_cata[$i]);
	
	
	/* ===============================================================================================================
											 Add Related Program ID Part 1
	=============================================================================================================== */
			for($j=0; $j<count($jsonIterator[$i]['relatedProgramIds']); $j++){
				if($j==0){
					$rp_slug[$i] .= $jsonIterator[$i]['relatedProgramIds'][$j];
				}else{
					$rp_slug[$i] .= ', '.$jsonIterator[$i]['relatedProgramIds'][$j];
				}
			}
			//echo $rp_slug[$i].'<br/>';
	/* ===============================================================================================================
											    Add Course Locations
	=============================================================================================================== */
			for($j=0; $j<count($jsonIterator[$i]['locations']); $j++){
				if($j==0){
					$locations_slug[$i] .= $jsonIterator[$i]['locations'][$j];
				}else{
					$locations_slug[$i] .= ', '.$jsonIterator[$i]['locations'][$j];
				}
			}
			//echo $locations_slug[$i].'<br/>';
			
		
			//echo print_r($jsonIterator[$i]['instances']);
			for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
				//echo print_r($jsonIterator[$i]['instances'][$j]['facilitatorIds']).'<br/>';
				$array_count = 0;
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['facilitatorIds']); $k++){
					$facilitator = $jsonIterator[$i]['instances'][$j]['facilitatorIds'][$k];
					if($facilitator!=""){
						if($array_count==0){
							$facilitatorIds_array_output = $facilitator;
							$array_count = $array_count+1;
						}else{
							$facilitatorIds_array_output .= ', '.$facilitator;						
						}
					}
				}
					
	/* ===============================================================================================================
											    Add Course city
	=============================================================================================================== */
			for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['cities']); $k++){
				if($k==0){
					$city_slug[$i][$j] .= $jsonIterator[$i]['instances'][$j]['cities'][$k];
				}else{
					$city_slug[$i][$j] .= ', '.$jsonIterator[$i]['instances'][$j]['cities'][$k];
				}
			}
			//echo $city_slug[$i][$j].'<br/>';


				$instances[$j] = array("field_54ceda6053402" => $jsonIterator[$i]['instances'][$j]['instanceId'], 
									"field_54dc24517ca32" => $jsonIterator[$i]['instances'][$j]['type'], 
									"field_54d176cac1d70" => $jsonIterator[$i]['instances'][$j]['name'], 
									"field_54ab271828d67" => $city_slug[$i][$j], 
									"field_54ab26b1baeff" => $jsonIterator[$i]['instances'][$j]['maxClassSize'], 
									"field_54d82f9e80ba3" => $jsonIterator[$i]['instances'][$j]['currentClassSize'], 
									"field_54ab312929435" => $facilitatorIds_array_output, 
									"field_54ab313029436" => $jsonIterator[$i]['instances'][$j]['catering']);
				//echo print_r($instances[$j])."<br/>";
				
				
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['venues']); $k++){
					$add_address_insert = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['addressLine1'];
					if($add_address_insert!=""){
						$add_address_insert .= ', '.$jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['addressLine2'];
					}else{
						$add_address_insert .= $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['addressLine2'];
					}
					if($add_address_insert!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['addressLine2']!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['surburb']!=""){
						$add_address_insert .= ', '.$jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['surburb'];
					}else{
						$add_address_insert .= $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['surburb'];
					}
					if($add_address_insert!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['surburb']!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['city']!=""){
						$add_address_insert .= ', '.$jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['city'];
					}else{
						$add_address_insert .= $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['city'];
					}
					if($add_address_insert!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['city']!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['postcode']!=""){
						$add_address_insert .= ', '.$jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['postcode'];
					}else{
						$add_address_insert .= $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['postcode'];
					}
					if($add_address_insert!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['postcode']!="" && $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['country']!=""){
						$add_address_insert .= ', '.$jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['country'];
					}else{
						$add_address_insert .= $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['country'];
					}
					
				}
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
					$instances[$j]['phases'][$k] = array("field_54bee8ce3269d" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['name'],
														"field_54bee8d33269e" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['type'],
														"field_54bee8d63269f" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['start'],
														"field_54bee8e8326a0" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['end']);
				}
			}
			if($check_item_row_id==""){
				$my_post = array(
					'post_type'     => 'courses',
					'post_title'    =>  $jsonIterator[$i]['title'],
					'post_content'  =>  $jsonIterator[$i]['programId'],
					'post_status'   => 'publish',
					'post_author'   => 1
				);
				$post_ID = wp_insert_post( $my_post );
				$show_status= "new post";
			}else{
				$my_post = array(
					'ID' => $check_item_row_id,
					'post_type'     => 'courses',
					'post_title'    =>  $jsonIterator[$i]['title'],
					'post_content'  =>  $jsonIterator[$i]['programId'],
					'post_status'   => 'publish',
					'post_author'   => 1
				);
				$post_ID = $check_item_row_id;
				wp_insert_post( $my_post );
				$show_status= "update post";
			}
				$all_courses_id[$post_ID] =  'on';//add the ID to array key for delete the course not list in JSON file
	/* ===============================================================================================================
											    Add new Tag and Catagories
	=============================================================================================================== */
			wp_set_post_terms( $post_ID, $add_to_tag, 'courses_tags', false );
			wp_set_object_terms( $post_ID, $add_to_cata[$i], 'courses_categories');


			$related_program_course_id[$i] = $post_ID;
	
			$checkLastModifyDate = get_field('dateLastUpdated', $post_ID);// check the last modify date to reduce query.
			//if($checkLastModifyDate != $jsonIterator[$i]['dateLastUpdated']){//if the last Modify date is same as database record, don't take any action.
				$table_name = $table_prefix."postmeta";
				
				
				$del_query = "DELETE FROM ".$table_name." WHERE post_id = ".$post_ID." AND meta_key LIKE '_instances%' OR  post_id = ".$post_ID." AND meta_key LIKE 'instances%'";
//				mysql_query($del_query) or die(mysql_error());
				global $wpdb;
				$db_item =  $wpdb->get_results($wpdb->prepare(
					$del_query
				));
				echo $del_query;
				echo '<br/>';
				update_field('programId', $jsonIterator[$i]['programId'], $post_ID);
				update_field('executive_summary', $jsonIterator[$i]['executiveSummary'], $post_ID);
				update_field('audience', $jsonIterator[$i]['audience'], $post_ID);
				update_field('outcome', $jsonIterator[$i]['outcome'], $post_ID);
				update_field('articulation', $jsonIterator[$i]['articulation'], $post_ID);
				update_field('program_outline', $jsonIterator[$i]['programOutline'], $post_ID);
				update_field('prerequisites', $jsonIterator[$i]['preRequisites'], $post_ID);
				update_field('cost', $jsonIterator[$i]['rrp'], $post_ID);
				update_field('length', $jsonIterator[$i]['length'], $post_ID);
				update_field('deliveryMethod', $jsonIterator[$i]['deliveryMethod'], $post_ID);//Missing
				update_field('faqs', $jsonIterator[$i]['faqs'], $post_ID);
				update_field('resources', $jsonIterator[$i]['resources'], $post_ID);
				update_field('cancellation_policy', $jsonIterator[$i]['cancellationPolicy'], $post_ID);
				update_field('dateLastUpdated', $jsonIterator[$i]['dateLastUpdated'], $post_ID);//Missing
				update_field('related_programs', $rp_slug[$i], $post_ID);
				
				
				$value = get_field('field_54ab26dabaf00', $post_ID);
				
				for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
					$value[] = $instances[$j];
					update_field('field_54ab26dabaf00', $value, $post_ID );
					$value2 = get_sub_field('field_54bee8a23269c', $post_ID);
					for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
						//echo "<h2>UPDATE ".count($jsonIterator[$i]['instances'][$j]['phases'])." phases</h2>";
						$value2[] = $instances[$j]['phases'][$k];
						update_sub_field( 'field_54bee8a23269c', $value2, $post_ID );
					}
				}	
			//}
		}
		$Complete_update = array(
			'ID'           => $Files_id,
			'post_content' => 'Successful'
		);
		
		// Update the post into the database
		wp_update_post( $Complete_update );
	}
}

/*===========================================
			Delete Post Function
===========================================*/

// WP_Query arguments to check all course which avaliable in Web system.
$delete_other_course = array (
'post_type'              => 'courses',
'post_status'            => 'publish',
);

// The Query
$delete_other_course_row = new WP_Query( $delete_other_course );
while ( $delete_other_course_row->have_posts() ) : $delete_other_course_row->the_post(); 

//echo print_r(array_keys($all_courses_id)).'<br/>';
$delete_other_course_id = get_the_id();
//echo $delete_other_course_id.': '.$all_courses_id[$delete_other_course_id].'<br/>';
if($all_courses_id[$delete_other_course_id]=='on'){
	echo $delete_other_course_id.' Keep on!<br/>'; //if the course ID is in Json, it will keep on.
}else{
	echo $delete_other_course_id.' will delete.<br/>';
	wp_trash_post( $delete_other_course_id );
}
endwhile;



?>

<script language="javascript">
	window.opener=null;
	window.open("","_self");
	window.close();
</script>

<?
mysql_close();
exit;
?>
