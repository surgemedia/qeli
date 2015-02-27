<?php
$fac_ids = get_field('instances')[0]['facilitator'];
if($fac_ids){
	$facil_array = false;
	//defined out of loop scope
	//debug( get_post_meta( get_the_ID() ));
		if(-1 != strpos(',',$fac_ids)){
		$facil_array = explode(',', $fac_ids)[0];
		//debug($facil_array);
			} else {
				$facil_array = array($fac_ids);
			}
		$fac_post = get_post($facil_array);
		//debug($fac_post);
?>
<div class="col-xs-12 feature-facilitator">
	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<img class="img-circle img-responsive" src="<?php echo getFeaturedUrl($facil_array) ?>"><br>
		</div>
		<div class="col-xs-12 col-sm-9">
			<h3>Program Facilitator </h3>
			
			<strong><small><?php echo get_the_title( $fac_post ); ?></small></strong>
			
			<p><?php the_field('short_description',$fac_post) ?></p>
		</div>
	</div>
</div>
<?php } ?>