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

add_menu_page('Course Import', 'Course sync', 'manage_options', 'Surge_media_json_slug', 'json_import_function','',22);
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
					//echo $check_content;
					//echo $check_title;
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
	
					
					$instances[$j] = array("field_54ceda6053402" => $jsonIterator[$i]['instances'][$j]['programInstanceId'], 
										"field_54d176cac1d70" => $jsonIterator[$i]['instances'][$j]['name'], 
										"field_54ab312929435" => $jsonIterator[$i]['instances'][$j]['facilitator'], 
										"field_54ab313029436" => $jsonIterator[$i]['instances'][$j]['catering'],
										"field_54ab29cb28d6c" => $jsonIterator[$i]['instances'][$j]['venues'][0]['name'],
										"field_54ab271828d67" => $jsonIterator[$i]['instances'][$j]['venues'][$k]['address']['state'],
										"field_54beed5199e1b" => $add_address_insert
										);
					}
					for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
						//echo '<h2>phases'.$k.':</h2></br>';
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
			update_field('field_54cedcc8ec025', $jsonIterator[$i]['imageUrl'], $post_ID);	
			update_field('field_54c9889071a6e', $jsonIterator[$i]['programId'], $post_ID);
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
				$value[] = $instances[$j];
				update_field( 'field_54ab26dabaf00', $value, $post_ID );
				$value2 = get_sub_field('field_54bee8a23269c', $post_ID);
				for($k=0; $k<count($jsonIterator[$i]['instances'][$j]['phases']); $k++){
					$value2[] = $instances[$j]['phases'][$k];
					update_sub_field( 'field_54bee8a23269c', $value2, $post_ID );
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
	//echo $delete_other_course_id.' Keep on!<br/>'; //if the course ID is in Json, it will keep on.
}else{
	//echo $delete_other_course_id.' will delete.<br/>';
	wp_trash_post( $delete_other_course_id );
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
		<h1>Course Import</h1>
		<p>Press the Sync Button to update all the course on the site with the date in your BMS system.</p>
		<h2>Lastest Sync</h2>
		<table class="wp-list-table widefat fixed posts">
			<thead>
				<tr>
					<th id="date" class="manage-column column-date sortable asc" style="" scope="col">
						<span>Date</span>
					</th>
					<th id="wpseo-score" class="manage-column column-wpseo-score sortable desc" style="" scope="col">
						<span>Time</span>
					</th>
					<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc sortable desc" style="" scope="col">
						<span>Status</span>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th id="date" class="manage-column column-date sortable asc" style="" scope="col">
						<span>Date</span>
					</th>
					<th id="wpseo-score" class="manage-column column-wpseo-score sortable desc" style="" scope="col">
						<span>Time</span>
					</th>
					<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc sortable desc" style="" scope="col">
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
			$json_m_d = get_the_modified_date('Y-m-d h:s');
			if($json_l_mcount==0 && $json_contents == "Successful"){
				$Surge_json_page_contents .='<tr>';
				$Surge_json_page_contents .=' <td>' . substr($json_title, 0, -5) . '</td>';
				$Surge_json_page_contents .=' <td>' .$json_m_d . '</td>';
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
				<td class="colspanchange">Not found</td>
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
	$Surge_json_page_contents .='
			<form action="#" method="post">
				<input name="sync_file_id" type="hidden" value="'.$sync_id.'">
				<input class="button action" type="submit" value="Re-sync Course from BMS" name="">
			</form>';
	}
	$Surge_json_page_contents .='
		</div>
		<h2>Previous Sync</h2>
		<p>We store at last 3 synce locally to make sure there is no miss information on your website</p>
		<table class="wp-list-table widefat fixed posts">
			<thead>
				<tr>
					<th id="date" class="manage-column column-date sortable asc" style="" scope="col">
						<span>Date</span>
					</th>
					<th id="wpseo-score" class="manage-column column-wpseo-score sortable desc" style="" scope="col">
						<span>Time</span>
					</th>
					<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc sortable desc" style="" scope="col">
						<span>Active</span>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th id="date" class="manage-column column-date sortable asc" style="" scope="col">
						<span>Date</span>
					</th>
					<th id="wpseo-score" class="manage-column column-wpseo-score sortable desc" style="" scope="col">
						<span>Time</span>
					</th>
					<th id="wpseo-metadesc" class="manage-column column-wpseo-metadesc sortable desc" style="" scope="col">
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
			echo '<h1>Json Cron job was created, Please check with page content for more details to create the cron job in your cpanel!</h1>
			<p>Click to page: <a href="'.site_url().'/wp-admin/post.php?post='.$cron_page_id.'&action=edit">'.site_url().'/wp-admin/post.php?post='.$cron_page_id.'&action=edit</a></p>
			<h2>Copy the permalink:[ <a>'.get_permalink($cron_page_id).'?PassWordCode=3yfdr73rw3aRTe4x</a>  ]to cpanel cron job to active it work import daliy or weekly.</h2>
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
