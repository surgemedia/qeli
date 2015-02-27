<?php
/*
Template Name: Cart Redirect
*/
$wp_session = WP_Session::get_instance();

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
		$check_item_row->the_post();
		$check_item_id = get_the_id();
		if(get_field('instances', $check_item_id)){
			while( has_sub_field('instances', $check_item_id) ){
				$delpid = get_sub_field('programinstanceid');
				unset($wp_session[$delpid.'qty']);
				$wp_session[$delpid.'qty'] = 0;
			}
		}
	}
}



for($i=1; $i<$_POST['array_time']; $i++){
	//echo 'test';
	//echo $_POST['instancesid'.$i];
	//echo $_POST['value'.$i];
	$array[] = array("Id" =>  $_POST['instancesid'.$i], "quantity" => $_POST['value'.$i]);	
	
}
$CURLOPT_POSTFIELDS =  json_encode($array);
//echo $CURLOPT_POSTFIELDS;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            "https://my.qeli.qld.edu.au/api/cart" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $CURLOPT_POSTFIELDS ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 

$result=curl_exec ($ch);
//echo $result;

$json_guid = json_decode($result, true);
//echo print_r($json_guid);
$link_gid = 'https://my.qeli.qld.edu.au/mycart#/checkout/'.$json_guid['cartGuid'];
//echo $link_gid;
?>
<script type="text/javascript">
window.location= <?php echo "'" . $link_gid . "'"; ?>;
</script>