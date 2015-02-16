<?php
/*
Template Name: Cart Redirect
*/



for($i=1; $i<$_POST['array_time']; $i++){
	//echo 'test';
	//echo $_POST['instancesid'.$i];
	//echo $_POST['value'.$i];
	$array[] = array("Id" =>  $_POST['instancesid'.$i], "quantity" => $_POST['value'.$i]);	
	
}
$CURLOPT_POSTFIELDS =  json_encode($array);
echo $CURLOPT_POSTFIELDS;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            "http://qeli.systina.net/api/cart" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $CURLOPT_POSTFIELDS ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 

$result=curl_exec ($ch);
//echo $result;

$json_guid = json_decode($result, true);
//echo print_r($json_guid);
$link_gid = 'http://qeli.systina.net/mycart#/checkout/'.$json_guid['cartGuid'];
echo $link_gid;
?>
<?php /*?><script type="text/javascript">
window.location= <?php echo "'" . $link_gid . "'"; ?>;
</script><?php */?>