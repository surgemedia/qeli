<?php
/* ==========================================
		Surge Media PTY LTD.
		MiddleWare Function for Qeli
			
			Course Import
============================================*/
/* ==========================================
Register Custom Post Type
============================================*/
function custom_post_type() {
	$labels = array(
		'name'                => _x( 'Json files', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Course Json Files', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Json files', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'json_', 'text_domain' ),
		'description'         => __( 'All json file status', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => false,
		'show_in_menu'        => false,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => false,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'json_', $args );
}
// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );
/*===========================================
				Menu Display
===========================================*/
function JsonImporter(){
add_menu_page('Course Import', 'Update Courses', 'manage_options', 'Surge_media_json_slug', 'json_import_function','dashicons-update',81);
//Field 1: Page Title.
//Field 2: Menu Title.
//Field 3: Function type.
//Field 4: Menu_slug
//Field 5: Hook the function of this page
//Field 6: Icon image
//Field 7: Position
}
//end addCustomMenuItem function. and call function to display in page.
/*===========================================
			Function Coding
===========================================*/
function json_import_function(){
	exclude_this_page();
	if(!current_user_can('manage_options')){
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}//end if user is allowed.
	
	$args = array( 'post_type' => 'json_', 'posts_per_page' => 3, 'order' => 'DESC');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		
	endwhile;
	//Read the Files Post
	
	/* ==========================================
		Run Function to Sync files
	============================================*/
	
	if($_POST['sync_file_id']!=""){
			$Files_id = get_the_title($_POST['sync_file_id']);	//insert new file and get the post id in same time.
		$theme_root = get_theme_root();
		$json = file_get_contents($theme_root."/qeli/course-json/".get_the_title($_POST['sync_file_id']));
		$jsonIterator = json_decode($json, true);
		for($i=0; $i< count($jsonIterator); $i++){
			$course_num = $i+1;
			//Review Here - @alex / @stagfoo - Depericated
			
			// WP_Query arguments
			$check_item = array (
				'post_type'              => 'courses',
				'post_status'            => 'Published',
				'orderby'                => 'id',
				'order'                => 'DESC',
				'posts_per_page'		=> '-1',
			);
			
			
			// The Query
			$check_item_row = new WP_Query( $check_item );
			// The Loop
			$check_item_id = "";
			if ( $check_item_row->have_posts() ) {
				$first_while_item_get = 0;
				while ( $check_item_row->have_posts() ) {
					//echo get_the_id();
					$check_item_row->the_post();
					$check_item_id = get_the_id();
					$check_content = get_the_content();
					$check_title = get_the_title();
					//echo '<pre>'.$check_content.'='.$jsonIterator[$i]['programId'].'</pre><br>';
					if($check_content == $jsonIterator[$i]['programId'] ){
						if($first_while_item_get == 0 ){
							$check_item_row_id[$i] = $check_item_id;
							$first_while_item_get = 2;
						}
					}
				}
			} else {
				// no posts found
				$check_item_id = "";
			}
			
			
			//echo '<h1>'.$check_item_row_id[$i].'</h1>';
			//echo '<h2>'.$jsonIterator[$i]['title'].'</h2>';
			// Restore original Post Data
			wp_reset_postdata();
			/*
			//===================== More Fast way if using mysql_query ======================
			
			$check_item = mysql_query("SELECT * FROM wp_posts WHERE post_content = ".$jsonIterator[$i]['programId']." AND Post_title LIKE '".$jsonIterator[$i]['title']."' AND post_type LIKE 'courses' AND post_status NOT LIKE 'trash' ORDER BY ID  DESC LIMIT 0, 1");
			$check_item_row = mysql_fetch_array($check_item);
			$check_item_row_id = $check_item_row['ID'];
*/
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
			for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
					$array_count = 0;
					for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['facilitatorIds']); $k++){
						$facilitator = $jsonIterator[$i]['instances'][$j]['facilitatorIds'][$k];
						if($facilitator!=""){
							if($array_count==0){
								$facilitatorIds_array_output[$i][$j] = $facilitator;
								$array_count = $array_count+1;
							}else{
														$facilitatorIds_array_output[$i][$j] .= ', '.$facilitator;
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
					
				if($jsonIterator[$i]['instances'][$j]['currentClassSize']==NULL){
						$addtocurrentclasssize = 0;
				}else{
						$addtocurrentclasssize = $jsonIterator[$i]['instances'][$j]['currentClassSize'];
				}
					
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['venues']); $k++){
					$instances[$j]['venues'][$k]['name'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['name'];
					$instances[$j]['venues'][$k]['room'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['room'];
					$instances[$j]['venues'][$k]['addressline1'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['addressLine1'];
					$instances[$j]['venues'][$k]['addressline2'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['addressLine2'];
					$instances[$j]['venues'][$k]['surburb'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['surburb'];
					$instances[$j]['venues'][$k]['city'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['city'];
					$instances[$j]['venues'][$k]['state'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['state'];
					$instances[$j]['venues'][$k]['postcode'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['postcode'];
					$instances[$j]['venues'][$k]['country'] = $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['country'];
				}
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['events']); $k++){
					$instances[$j]['event'][$k]['eventname'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['name'];
					$instances[$j]['event'][$k]['eventstartdate'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['startDate'];
					$instances[$j]['event'][$k]['eventenddate'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['endDate'];
					$instances[$j]['event'][$k]['eventvenuename'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['name'];
					$instances[$j]['event'][$k]['eventvenueroom'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['room'];
					$instances[$j]['event'][$k]['eventaddressline1'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['addressLine1'];
					$instances[$j]['event'][$k]['eventaddressline2'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['addressLine2'];
					$instances[$j]['event'][$k]['eventsurburb'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['surburb'];
					$instances[$j]['event'][$k]['eventcity'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['city'];
					$instances[$j]['event'][$k]['eventstate'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['state'];
					$instances[$j]['event'][$k]['eventpostcode'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['postcode'];
					$instances[$j]['event'][$k]['eventcountry'] = $jsonIterator[$i]['instances'][$j]['events'][$k]['venue']['address']['country'];
				}
				$instances[$j] = array("field_54ceda6053402" => $jsonIterator[$i]['instances'][$j]['instanceId'],
									"field_54dc24517ca32" => $jsonIterator[$i]['instances'][$j]['type'],
									"field_54d176cac1d70" => $jsonIterator[$i]['instances'][$j]['whenAndWhere'],
									"field_54ab271828d67" => $city_slug[$i][$j],
									"field_54ab26b1baeff" => $jsonIterator[$i]['instances'][$j]['maxClassSize'],
									"field_54d82f9e80ba3" => $addtocurrentclasssize,
									"facilitator" => $facilitatorIds_array_output,
									"field_5542a92f7e558" => $instances[$j]['event'], 
									"field_54e192a62d5a7" => $instances[$j]['venues']);		

				// for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
				// 	$instances[$j]['phases'][$k] = array("field_54bee8ce3269d" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['name'],
				// 										"field_54bee8d33269e" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['type'],
				// 										"field_54bee8d63269f" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['start'],
				// 										"field_54bee8e8326a0" => $jsonIterator[$i]['instances'][$j]['phases'][$k]['end']);
				// }
			}
			//echo '<p>'.$check_item_row_id[$i].'</p>??';
			if($check_item_row_id[$i]==""){
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
					'ID' => $check_item_row_id[$i],
					'post_type'     => 'courses',
					'post_title'    =>  $jsonIterator[$i]['title'],
					'post_content'  =>  $jsonIterator[$i]['programId'],
					'post_status'   => 'publish',
					'post_author'   => 1
				);
				$post_ID = wp_insert_post( $my_post );
				$post_ID = $check_item_row_id[$i];
				$show_status= "update post";
			}
				//echo '<h3>'.$post_ID.'</h3>';
				$all_courses_id[$post_ID] =  'on';//add the ID to array key for delete the course not list in JSON file
	/* ===============================================================================================================
											Add new Tag and Catagories
	=============================================================================================================== */
			wp_set_post_terms( $post_ID, $add_to_tag, 'courses_tags', false );
			wp_set_object_terms( $post_ID, $add_to_cata[$i], 'courses_categories');
			$checkLastModifyDate = get_field('date_last_updated', $post_ID);// check the last modify date to reduce query.
			
			if($checkLastModifyDate != $jsonIterator[$i]['dateLastUpdated']){//if the last Modify date is same as database record, don't take any action.
				global $wpdb;
				$del_all_postmate = "DELETE FROM `".$wpdb->dbname."`.`".$table_prefix."postmeta` WHERE post_id = ".$post_ID." AND meta_key LIKE '_instances%' OR  post_id = ".$post_ID." AND meta_key LIKE 'instances%'";
				$result = $wpdb->get_results( $del_all_postmate);
				print_r($result);
				update_field('programId', $jsonIterator[$i]['programId'], $post_ID);
				update_field('executive_summary', $jsonIterator[$i]['executiveSummary'], $post_ID);
				// update_field('audience', $jsonIterator[$i]['audience'], $post_ID);
				update_field('outcome', $jsonIterator[$i]['outcome'], $post_ID);
				update_field('articulation', $jsonIterator[$i]['articulation'], $post_ID);
				update_field('program_outline', $jsonIterator[$i]['programDelivery'], $post_ID);
				update_field('prerequisites', $jsonIterator[$i]['preRequisites'], $post_ID);
				update_field('cost', $jsonIterator[$i]['rrp'], $post_ID);
				update_field('length', $jsonIterator[$i]['length'], $post_ID);
				update_field('deliveryMethod', $jsonIterator[$i]['deliveryMethod'], $post_ID);
				update_field('faqs', $jsonIterator[$i]['faqs'], $post_ID);
				// update_field('resources', $jsonIterator[$i]['resources'], $post_ID);
				// update_field('cancellation_policy', $jsonIterator[$i]['cancellationPolicy'], $post_ID);
				update_field('date_last_updated', $jsonIterator[$i]['dateLastUpdated'], $post_ID);
				update_field('related_programs', $rp_slug[$i], $post_ID);
				// update_field('locations', $add_to_location[$i], $post_ID);
				
				
				unset($value);
				for($j=0; $j<count($jsonIterator[$i]['instances']); $j++){
					$value[] = $instances[$j];
					//Instance
					update_field('field_54ab26dabaf00', $value, $post_ID );
				}
			}
		}
		$Complete_update = array(
			'ID'           => $_POST['sync_file_id'],
			'post_content' => 'Successful'
		);
		// Update the post into the database
		wp_update_post( $Complete_update );
		
		
/*===========================================
			Delete Post Function
===========================================*/
// WP_Query arguments to check all course which avaliable in Web system.
$delete_course = array (
	'post_type'              => 'courses',
	'post_status'            => 'publish',
	'posts_per_page'		=> '-1',
);
// The Query
$delete_other_course_row = new WP_Query( $delete_course );
while ( $delete_other_course_row->have_posts() ) : $delete_other_course_row->the_post();
//echo print_r(array_keys($all_courses_id)).'<br/>';
$delete_other_course_id = get_the_id();
//echo $delete_other_course_id.': '.$all_courses_id[$delete_other_course_id].'<br/>testing';
if($all_courses_id[$delete_other_course_id]=='on'){
	//echo $delete_other_course_id.' Keep on!<br/>'; //if the course ID is in Json, it will keep on.
}else{
	//echo $delete_other_course_id.' will delete.<br/>';
	wp_trash_post( $delete_other_course_id, true );
}
endwhile;
		
		
		/*
		//============================Mysql_code for enable if request to improve del post speed within just two query! But will make system not safe.============================//
		
		
		$delete_other_course = mysql_query("SELECT * FROM wp_posts WHERE post_type LIKE 'courses' AND post_status LIKE 'publish'");// list all course active in database
		$delete_other_course_num = mysql_num_rows($delete_other_course);
		
		$add_to_trash = "UPDATE wp_posts SET post_status = 'trash' WHERE "; //query selected table and columns
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
	}
	
	
	//add any form processing code here in PHP:
	$Surge_json_page_contents .='
	<div style="width:90%;">
			<h1>Update Courses</h1>
			<p>Press the Sync Button to update any out of date information. This will sync update the courses with the data in your BMS system.</p>
			<h2>Lastest Sync</h2>
			<table class="wp-list-table widefat fixed posts">
					<thead>
							<tr>
									<th id="date" class="manage-column column-date  asc" style="" scope="col">
											<span>Date</span>
									</th>
									<th id="wpseo-score" class="manage-column column-wpseo-score  desc" style="" scope="col">
											<span>Time</span>
									</th>
									<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc  desc" style="" scope="col">
											<span>Status</span>
									</th>
							</tr>
					</thead>
					<tfoot>
						<tr>
								<th id="date" class="manage-column column-date  asc" style="" scope="col">
										<span>Date</span>
								</th>
								<th id="wpseo-score" class="manage-column column-wpseo-score  desc" style="" scope="col">
										<span>Time</span>
								</th>
								<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc  desc" style="" scope="col">
										<span>Status</span>
								</th>
						</tr>
					</tfoot>
					<tbody id="the-list">
							<tr class="no-items">';
					// WP_Query arguments
					$args = array (
						'post_type'              => 'json_',
						'order'                  => 'DESC',
						'orderby'                => 'modified',
					);
					
					// The Query
					$get_last_modified_row = new WP_Query( $args );
					
					// The Loop
					if ( $get_last_modified_row->have_posts() ) {
						while ( $get_last_modified_row->have_posts() ) {
							$get_last_modified_row->the_post();
							$json_contents = get_the_content();
							$json_title = get_the_title();
							$json_m_d = get_the_modified_date('h:s A');
							if($json_l_mcount==0 && $json_contents == "Successful"){
								$Surge_json_page_contents .='<tr>';
									$Surge_json_page_contents .=' <td>' . substr($json_title, 0, -5) . '</td>';
									$Surge_json_page_contents .=' <td>' .$json_m_d. '</td>';
									$Surge_json_page_contents .=' <td><a>'.$json_contents.'</a></td>';
								$Surge_json_page_contents .='</tr>';
								$sync_id = get_the_id();
								$json_l_mcount++;
							}
						}
					} else {
						// no posts found
						$Surge_json_page_contents .= debug($WP_arrayName).'
							<tr class="no-items">
									<td class="colspanchange">Nothing Synced Yet</td>
							</tr>
							';
					}
					
					// Restore original Post Data
						wp_reset_postdata();
				/*
					$get_last_modified = mysql_query("SELECT * FROM wp_posts WHERE post_type LIKE '%json_%' AND post_content LIKE '%Successful%' ORDER BY post_modified DESC LIMIT 0, 1");
					$get_last_modified_row = mysql_fetch_array($get_last_modified);
					$sync_id = $get_last_modified_row['ID'];
					if($sync_id!=""){
							// $Surge_json_page_contents .= ;
							$Surge_json_page_contents .='<tr>';
								$Surge_json_page_contents .=' <td>' . substr($get_last_modified_row['post_title'], 0, -5) . '</td>';
								$Surge_json_page_contents .=' <td>' .$get_last_modified_row['post_modified'] . '</td>';
								$Surge_json_page_contents .=' <td><a>'.$get_last_modified_row['post_content'].'</a></td>';
							$Surge_json_page_contents .='</tr>';
					} else {
						//ISSUE - wp array name
						$Surge_json_page_contents .= debug($WP_arrayName).'
							<tr class="no-items">
									<td class="colspanchange">Not found</td>
							</tr>
							';
						// no posts found
					}
					
				*/
					/*	$args = array( 'post_type' => 'json_', 'posts_per_page' => 1, 'post_content' => 'Successful', 'orderby' => 'modified', 'order' => 'DESC');
					$loop = new WP_Query( $args );
					
					
					// The Loop
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) {
							$sync_id = get_the_ID();
							$Surge_json_page_contents .='<tr>';
								//
								$get_last_modified = mysql_query("SELECT post_modified FROM wp_posts WHERE ID = ".$sync_id);
								$get_last_modified_row = mysql_fetch_array($get_last_modified);
								$loop->the_post();
								$Surge_json_page_contents .=' <td>' .$sync_id. get_the_date('d/m/Y', $sync_id) . '</td>';
								$Surge_json_page_contents .=' <td>' .$sync_id. $get_last_modified_row['post_modified'] . '</td>';
								$Surge_json_page_contents .=' <td><a>'.$sync_id.get_the_content().'</a></td>';
							$Surge_json_page_contents .='</tr>';
						}
					} else {
						$Surge_json_page_contents .='
							<tr class="no-items">
									<td class="colspanchange">Not found</td>
							</tr>
							';
						// no posts found
					}
					//Read the Files Post
					*/
				//WP_query not work in 'orderby' => 'modified'
								
									
					$Surge_json_page_contents .='
							</tr>
					</tbody>
			</table>
			<div class="tablenav bottom">
				';
			if($sync_id!=""){
				$args = array (
				'post_type'              => 'page',
				'post_status'            => 'publish',
				's'                      => 'Json Cron job',
				'posts_per_page'         => '1',
				'order'                  => 'DESC',
				'orderby'                => 'modified',
				);
				
				// The Query
				$check_cron_page = new WP_Query( $args );
				$theme_root = site_url().'/wp-content/themes/';
				// The Loop
				if ( $check_cron_page->have_posts() ) {
					while ( $check_cron_page->have_posts() ) {
						$check_cron_page->the_post();
						$cron_page_id = get_the_id();
						// do something
							$resync_link = '<a target="_blank" href="'.get_permalink($cron_page_id).'?PassWordCode=3yfdr73rw3aRTe4x" class="button action">';
						$resync_link2 = '</a>';
					}
				}
				wp_reset_postdata();
				$Surge_json_page_contents .=$resync_link;
				$Surge_json_page_contents .='
					Re-sync Course from BMS
				';
				$Surge_json_page_contents .=$resync_link2;
			}
			$Surge_json_page_contents .='
			</div>
			<h2>Previous Sync</h2>
			<p>We store at last 3 synce locally to make sure there is no miss information on your website</p>
			<table class="wp-list-table widefat fixed posts">
					<thead>
							<tr>
									<th id="date" class="manage-column column-date  asc" style="" scope="col">
											<span>Date</span>
									</th>
									<th id="wpseo-score" class="manage-column column-wpseo-score desc" style="" scope="col">
											<span>Time</span>
									</th>
									<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc  desc" style="" scope="col">
											<span>Active</span>
									</th>
							</tr>
					</thead>
					<tfoot>
						<tr>
								<th id="date" class="manage-column column-date  asc" style="" scope="col">
										<span>Date</span>
								</th>
								<th id="wpseo-score" class="manage-column column-wpseo-score  desc" style="" scope="col">
										<span>Time</span>
								</th>
								<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc  desc" style="" scope="col">
										<span>Active</span>
								</th>
						</tr>
					</tfoot>
					<tbody id="the-list">
				';
				$args = array( 'post_type' => 'json_', 'posts_per_page' => 3, 'order' => 'DESC');
				$loop = new WP_Query( $args );
				
				
				// The Loop
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) {
						$Surge_json_page_contents .='<tr>';
							$loop->the_post();
							$Surge_json_page_contents .=' <td>' . get_the_date('d/m/Y') . '</td>';
							$Surge_json_page_contents .=' <td>' . get_the_time() . '</td>';
							$Surge_json_page_contents .=' <td><a><form action="#" method="post">
									<input name="sync_file_id" type="hidden" value="'.get_the_ID().'">
									<input class="button action" type="submit" value="Sync Now" name="">
							</form></a></td>';
						$Surge_json_page_contents .='</tr>';
					}
				} else {
					$Surge_json_page_contents .='
						<tr class="no-items">
								<td class="colspanchange">Not found</td>
						</tr>
						';
					// no posts found
				}
				//Read the Files Post
				
							
								
				$Surge_json_page_contents .='
					</tbody>
			</table>
	</div>
	
	
	';
	
	echo $Surge_json_page_contents;
	//Echo the Page Title
	
	
	// WP_Query arguments
	$args = array (
		'post_type'              => 'page',
		'post_status'            => 'publish',
		's'                      => 'Json Cron job',
		'posts_per_page'         => '1',
		'order'                  => 'DESC',
		'orderby'                => 'modified',
	);
	
	// The Query
	$check_cron_page = new WP_Query( $args );
	$theme_root = site_url().'/wp-content/themes/';
	// The Loop
	if ( $check_cron_page->have_posts() ) {
		while ( $check_cron_page->have_posts() ) {
			$check_cron_page->the_post();
			$cron_page_id = get_the_id();
			// do something
			echo '<h1>Setup Instructions</h1><h4>This will only have to be done <u>once</u></h4>
			<p>Copy the link below </p>
			<input value="'.get_permalink($cron_page_id).'?PassWordCode=3yfdr73rw3aRTe4x" /><p>Add the link to cpanel cron job to active a daliy or weekly import.</p>
			<img src="'.$theme_root.'/qeli/assets/img/how_to_cron_job.jpg">';
		}
	} else {
		// no posts found
		$Auto_page = array(
			'post_type' => 'page',
			'post_name' => 'json-cron-job',
			'post_title' => 'Json Cron job',
			'page_template' => 'template-jsoncronjob.php',
		);
		
		//If user first time chick to Course Sync. it will create the page
		
		// Update the post into the database
		$cron_page_id = wp_update_post( $Auto_page );
		
		
		echo '<h1>The page Json Cron job was created, Please check with page content for more details to create the cron job in your cpanel!</h1>
		<p>Click to page: <a href="'.site_url().'/wp-admin/post.php?post='.$cron_page_id.'&action=edit">'.site_url().'/wp-admin/post.php?post='.$cron_page_id.'&action=edit</a></p>
		<h2>Copy the permalink:[ <a>'.get_permalink($cron_page_id).'?PassWordCode=3yfdr73rw3aRTe4x</a>  ]to cpanel cron job to active it work import daliy or weekly.</h2>
		<img src="'.$theme_root.'/qeli/assets/img/how_to_cron_job.jpg">';
	
	}
	
	// Restore original Post Data
	wp_reset_postdata();
	wp_insert_term( 'brad3', 'post_tag', array('slug'=>'bbbedf'));
}
//end Json Import Function
/*===========================================
			Addition Hook
===========================================*/
add_action( 'admin_menu', 'JsonImporter' );
// Hook into the 'admin_menu' action