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
				'posts_per_page'         => '1',
				'orderby'                => 'id',
			);
			
			// The Query
			$check_item_row = new WP_Query( $check_item );

			// The Loop
			if ( $check_item_row->have_posts() ) {
				while ( $check_item_row->have_posts() ) {
					$check_item_row->the_post();
					$check_item_id = get_the_id();
					$check_content = get_the_content();
					$check_title = get_the_title();
					echo $check_content;
					echo $check_title;
					if($check_content == $jsonIterator[$i]['programId'] && $check_title == $jsonIterator[$i]['title']){
							$check_item_row_id = $check_item_id;
					}
				}
			} else {
				// no posts found
				$check_item_row_id = "";
			}
			
			// Restore original Post Data
			wp_reset_postdata();


/*			
			//===================== More Fast way if using mysql_query ======================
			
			$check_item = mysql_query("SELECT * FROM wp_posts WHERE post_content = ".$jsonIterator[$i]['programId']." AND Post_title LIKE '".$jsonIterator[$i]['title']."' AND post_type LIKE 'courses' AND post_status NOT LIKE 'trash' ORDER BY ID  DESC LIMIT 0, 1");
			$check_item_row = mysql_fetch_array($check_item);
			$check_item_row_id = $check_item_row['ID'];
*/

			echo '<h1>Course'.$course_num.':</h1></br>';
			echo $jsonIterator[$i]['executiveSummary'].'</br>';
			echo $jsonIterator[$i]['imageUrl'].'</br>';
			echo $jsonIterator[$i]['outcome'].'</br>';
			echo $jsonIterator[$i]['programOutline'].'</br>';
			echo $jsonIterator[$i]['preRequisites'].'</br>';
			echo $jsonIterator[$i]['length'].'</br>';
			echo $jsonIterator[$i]['deliveryMethod'].'</br>';
			echo $jsonIterator[$i]['relatedProgramIds'].'</br>';
			
			
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
			
			
			for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
				echo '<h2>instances'.$j.':</h2></br>';
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['venues']); $k++){
					echo '<h2>venues'.$k.':</h2></br>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['isBilling'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['isDelivery'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['nickname'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['contactId'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['accountId'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['organisationId'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['id'].'<br/>';
					echo $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['deleted'].'<br/>';
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
	
					
					$instances[$j] = array("field_54bf286520b96" => $jsonIterator[$i]['instances'][$j]['programInstanceId'], 
										"field_54bf285420b95" => $jsonIterator[$i]['instances'][$j]['name'], 
										"field_54ab312929435" => $jsonIterator[$i]['instances'][$j]['facilitator'], 
										"field_54ab313029436" => $jsonIterator[$i]['instances'][$j]['catering'],
										"field_54ab29cb28d6c" => $jsonIterator[$i]['instances'][$j]['venues'][0]['name'],
										"field_54ab271828d67" => $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['state'],
										"field_54beed5199e1b" => $add_address_insert
										);
				}
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
					echo '<h2>phases'.$k.':</h2></br>';
					$instances[$j]['phases'][$k] = array("field_54bee8ce3269d" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['name'],
														"field_54bee8d33269e" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['type'],
														"field_54bee8d63269f" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['start'],
														"field_54bee8d63269f" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['start'], //@Cindy:DUPLICATED
														"field_54bee8e8326a0" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['end']);
				}
			}
			echo $check_item_row_id;
			if($check_item_row_id==""){
				$my_post = array(
					'post_type'     => 'courses',
					'post_title'    =>  $jsonIterator[$i]['title'],
					'post_content'  =>  $jsonIterator[$i]['programId'],
					'post_status'   => 'publish',
					'post_author'   => 1
				);
				$post_ID = wp_insert_post( $my_post );
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
			}
	/* ===============================================================================================================
											    Add new Tag and Catagories
	=============================================================================================================== */
			wp_set_post_tags( $post_ID, $add_to_tag, true );
			wp_set_post_categories( $post_ID, $add_to_cata, true );
	/* ===============================================================================================================
												Add new Tag and Catagories
	=============================================================================================================== */
			update_field('field_54ab2b70481e6', $jsonIterator[$i]['resources'], $post_ID);
			update_field('field_54ab2b2a481e5', $jsonIterator[$i]['faqs'], $post_ID);
			update_field('field_54ab2ca5481e7', $jsonIterator[$i]['cancellationPolicy'], $post_ID);
	
			update_field('field_54bf24134fed8', $jsonIterator[$i]['programId'], $post_ID);
			update_field('field_54bf0516e7cf5', $jsonIterator[$i]['title'], $post_ID);
			update_field('field_54ab2484f6455', $jsonIterator[$i]['executiveSummary'], $post_ID);
			update_field('field_54ab24a6f6457', $jsonIterator[$i]['outcome'], $post_ID);
			update_field('field_54ab249af6456', $jsonIterator[$i]['audience'], $post_ID);
			update_field('field_54ab24b3f6458', $jsonIterator[$i]['articulation'], $post_ID);
			update_field('field_54ab24bcf6459', $jsonIterator[$i]['programOutline'], $post_ID);
			update_field('field_54ab2682baefe', $jsonIterator[$i]['rrp'], $post_ID);
			update_field('field_54ab26b1baeff', $jsonIterator[$i]['maxClassSize'], $post_ID);
			update_field('field_54ab286628d69', $jsonIterator[$i]['length'], $post_ID);
			$all_courses_id[$post_ID] =  'on';//add the ID to array key for delete the course not list in JSON file
			$value = get_field('field_54ab26dabaf00', $post_ID);
			for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
				echo "<h1>UPDATE ".count($jsonIterator[$i]['instances'])." INSTANCE</h1>";
				$value[] = $instances[$j];
				update_field( 'field_54ab26dabaf00', $value, $post_ID );
				$value2 = get_sub_field('field_54bee8a23269c', $post_ID);
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
					echo "<h2>UPDATE ".count($jsonIterator[$i]['instances'][$j]['phases'])." phases</h2>";
					$value2[] = $instances[$j]['phases'][$k];
					update_sub_field( 'field_54bee8a23269c', $value2, $post_ID );
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




/*



//============================Mysql_code for enable if request to improve del post speed within just two query! But will make system not safe.============================//


$delete_other_course = mysql_query("SELECT * FROM wp_posts WHERE post_type LIKE 'courses' AND post_status LIKE 'publish'");// list all course active in database
$delete_other_course_num = mysql_num_rows($delete_other_course);

$add_to_trash .= "UPDATE wp_posts SET post_status = 'trash' WHERE "; //query selected table and columns
$trach_loop = 0;// set the first id with OR to make the query without error.
for($i=0; $i<$delete_other_course_num; $i++){
	$delete_other_course_row = mysql_fetch_array($delete_other_course);
	if($all_courses_id[$delete_other_course_row['ID']]=='on'){
		//echo $delete_other_course_row['ID'].' Keep on!<br/>'; //if the course ID is in Json, it will keep on.
	}else{
		if($trach_loop==0){
			$add_to_trash .= "ID = ".$delete_other_course_row['ID']." ";// first one without OR in the front of query code
		}else{
			$add_to_trash .= "OR ID = ".$delete_other_course_row['ID']." ";//add the ID to delete query, If it's second one, add OR to make it work with one query
		}
		$trach_loop++;
	}
}
if($trach_loop>=1){
	mysql_query($add_to_trash)or die(mysql_error()."update failed");
}
*/
//Below Script is make the page auto close while finish the file read.
?>

<script language="javascript">
	window.opener=null;
	window.open("","_self");
	window.close();
</script>

<?
exit;
?>
