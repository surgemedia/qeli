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
			
			
			echo '<h1>'.$check_item_row_id.'</h1>';
			// Restore original Post Data
			wp_reset_postdata();


			
			
	/* ===============================================================================================================
														Add new Tag
	=============================================================================================================== */
			$tag_loop = 0;
			for($j=0; $j<count($jsonIterator[$i]['tags']); $j++){
				$tag_slug = $jsonIterator[$i]['tags'][$j]['id'];
				$tag_name = str_replace(","," ",$jsonIterator[$i]['tags'][$j]['name']);
				if($tag_slug!="" && $tag_name!=""){
					wp_insert_term( $tag_name, 'post_tag', array('slug'=>$tag_slug));
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
														Add new Tag
	=============================================================================================================== */



	/* ===============================================================================================================
												     Add new Catagories
	=============================================================================================================== */
			$cata_loop = 0;
			for($j=0; $j<count($jsonIterator[$i]['categories']); $j++){
				$cata_slug = $jsonIterator[$i]['categories'][$j]['id'];
				$cata_name = str_replace(","," ",$jsonIterator[$i]['categories'][$j]['name']);
				if($cata_slug!="" && $cata_name!=""){
					wp_insert_term( $cata_name, 'category', array('slug'=>$cata_slug));
					if($cata_loop==0){
						$add_to_cata = $cata_slug;// first one without, in the front of query code
					}else{
						$add_to_cata .= ", ".$cata_slug;//add the ID to delete query, If it's second one, add , to make it work with one query
					}
					$cata_loop++;
				}
			}
			//echo 'addtotag:'.$add_to_tag."<br/>";
	/* ===============================================================================================================
													  Add new Catagories
	=============================================================================================================== */
	
	
	/* ===============================================================================================================
											 Add Related Program ID Part 1
	=============================================================================================================== */
			for($j=0; $j<count($jsonIterator[$i]['relatedProgramIds']); $j++){
				$rp_slug = $jsonIterator[$i]['relatedProgramIds'][$j];
				$add_to_related_program[$i][$j] = $rp_slug;
			}
	/* ===============================================================================================================
											 Add Related Program ID Part 1
	=============================================================================================================== */
		
			//echo print_r($jsonIterator[$i]['instances']);
			for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
					$instances[$j] = array("programinstanceid" => $jsonIterator[$i]['instances'][$j]['instanceId'], 
										"instances_name" => $jsonIterator[$i]['instances'][$j]['name'], 
										"facilitator" => $jsonIterator[$i]['instances'][$j]['facilitatorIds'], 
										"catering" => $jsonIterator[$i]['instances'][$j]['catering']);
					echo print_r($instances[$j]);
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
					$instances[$j]['phases'][$k] = array("name" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['name'],
														"type" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['type'],
														"start" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['start'],
														"end" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['end']);
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
			wp_set_post_tags( $post_ID, $add_to_tag, true );
			wp_set_post_categories( $post_ID, $add_to_cata, true );
	/* ===============================================================================================================
												Add new Tag and Catagories
	=============================================================================================================== */
			$related_program_course_id[$i] = $post_ID;
	
			$checkLastModifyDate = get_field('dateLastUpdated', $post_ID);// check the last modify date to reduce query.
			if($checkLastModifyDate != $jsonIterator[$i]['dateLastUpdated']){//if the last Modify date is same as database record, don't take any action.
				global $wpdb;
				$del_all_postmate = "DELETE FROM `".$wpdb->dbname."`.`".$table_prefix."postmeta` WHERE post_id = ".$post_ID." AND meta_key LIKE '_instances%' OR  post_id = ".$post_ID." AND meta_key LIKE 'instances%'";
				$result = $wpdb->get_results( $del_all_postmate);
				print_r($result);
				update_field('programId', $jsonIterator[$i]['programId'], $post_ID);
				update_field('executive_summary', $jsonIterator[$i]['executiveSummary'], $post_ID);
				update_field('field_54cedcc8ec025', $jsonIterator[$i]['imageUrl'], $post_ID);	
				update_field('audience', $jsonIterator[$i]['audience'], $post_ID);
				update_field('outcome', $jsonIterator[$i]['outcome'], $post_ID);
				update_field('articulation', $jsonIterator[$i]['articulation'], $post_ID);
				update_field('program_outline', $jsonIterator[$i]['programOutline'], $post_ID);
				update_field('prerequisites', $jsonIterator[$i]['preRequisites'], $post_ID);
				update_field('cost', $jsonIterator[$i]['rrp'], $post_ID);
				update_field('class_size', $jsonIterator[$i]['maxClassSize'], $post_ID);
				update_field('currentClassSize', $jsonIterator[$i]['currentClassSize'], $post_ID);
				update_field('length', $jsonIterator[$i]['length'], $post_ID);
				update_field('deliveryMethod', $jsonIterator[$i]['deliveryMethod'], $post_ID);
				update_field('faqs', $jsonIterator[$i]['faqs'], $post_ID);
				update_field('resources', $jsonIterator[$i]['resources'], $post_ID);
				update_field('cancellation_policy', $jsonIterator[$i]['cancellationPolicy'], $post_ID);
				update_field('dateLastUpdated', $jsonIterator[$i]['dateLastUpdated'], $post_ID);
	/* ===============================================================================================================
											 Add Related Program ID Part 2
	=============================================================================================================== */
				
				$program_id_for_rp[$jsonIterator[$i]['programId']] = $post_ID;


	/* ===============================================================================================================
											 Add Related Program ID Part 2
	=============================================================================================================== */
				
				//relatedProgramIds request data in Json file to test the import with format of array
				
				$value = get_field('instances', $post_ID);

				for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
					$value[] = $instances[$j];
					update_field( 'instances', $value, $post_ID );
					$value2 = get_sub_field('phases', $post_ID);
					for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
						echo "<h2>UPDATE ".count($jsonIterator[$i]['instances'][$j]['phases'])." phases</h2>";
						$value2[] = $instances[$j]['phases'][$k];
						update_sub_field( 'phases', $value2, $post_ID );
					}
				}	
			}
		}
		$Complete_update = array(
			'ID'           => $Files_id,
			'post_content' => 'Successful'
		);
		
		// Update the post into the database
		wp_update_post( $Complete_update );
	}
}
/* ===============================================================================================================
										 Add Related Program ID Part 3
=============================================================================================================== */

for($i=0; $i<count($related_program_course_id); $i++){
	//echo $related_program_course_id[$i];
	$rp_loop = 0;
	for($j=0; $j<count($add_to_related_program[$i]); $j++){
		$pid_arry_get = $add_to_related_program[$i][$j];
		if($program_id_for_rp[$pid_arry_get]!=""){
			if($rp_loop==0){
				$add_to_rel_prog[$i] = $program_id_for_rp[$pid_arry_get];
			}else{
				$add_to_rel_prog[$i] = ', '.$program_id_for_rp[$pid_arry_get];
			}
			$rp_loop = $rp_loop + 1;
		}
	}
	if($add_to_rel_prog[$i]!=""){
		update_field('related_programs', $add_to_rel_prog[$i], $related_program_course_id[$i]);
	}
}

/* ===============================================================================================================
										 Add Related Program ID Part 3
=============================================================================================================== */

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
exit;
?>
