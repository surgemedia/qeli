<?php
/*
Template Name: Cart Page
*/

$wp_session = WP_Session::get_instance();
		if($_POST['unset_proid']!=""){
			$wp_session[$_POST['unset_proid'].'qty'] = 0;
		}
		if($_POST['ch_proid']!=""){
			$wp_session[$_POST['ch_proid'].'qty'] = $_POST['ch_qty'];
			//echo $wp_session[$_POST['ch_proid'].'qty'];
		}
		//If user click delete, it will delete the session value.
		
		if($wp_session['post_time']!=$_POST['post_timing']){// check the post whether first time submit and not reflash page
			if($_POST['programid']!=""){
				//echo $_POST['programid'];
				if($wp_session[$_POST['programid']] == $_POST['programid']){
					$wp_session[$_POST['programid'].'qty'] = $wp_session[$_POST['programid'].'qty'] + 1;
					//echo 'here';
					//if the item already in cart, just add value only.
				}else{
					if($wp_session['count']==""){
							$wp_session['count'] = 0;
					}
					$wp_session[$_POST['programid']] = $_POST['programid'];
					$wp_session['programid'.$wp_session['count']] = $_POST['programid'];
					$wp_session['postid'.$wp_session['count']] = $_POST['postid'];
					$wp_session[$_POST['programid'].'qty'] = $wp_session[$_POST['programid'].'qty'] + 1;
					$wp_session['count'] = $wp_session['count'] + 1;
					//setup new session to programs.
					//echo 'add';
				}
			}
			$wp_session['post_time'] = $_POST['post_timing'];// check the post whether first time submit and not reflash page
		}


?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
   <div class="row">
		<div class="page-header colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive">
                <?php
					$input_start = 1;
					for($i=0; $i<=$wp_session['count']; $i++){
						//echo $wp_session['count'].'<br/>';
						$course_post_id = $wp_session['postid'.$i];
						$prog_id = $wp_session['programid'.$i];
						//echo $prog_id.'<br/>';
						//echo $course_post_id.'<br/>';
						$price[$i] = get_post_meta($course_post_id, 'cost', true);
						$total_qty[$i] = $wp_session[$prog_id.'qty'];
	

	
						$total = $price[$i] * $total_qty[$i];
						$amount = $amount + $total;
						if($wp_session[$prog_id.'qty']>0){
							//check the cart whether have value, if it's zore, just disapear it.
							$delete_hidden_form .='
								<form id="cart_item_del'.$i.'" method="post" action="#">
									<input name="unset_proid" value="'.$prog_id.'" type="hidden">
									<input name="unset_course_id" value="'.$course_post_id.'" type="hidden">
									<input name="unset_values" value="'.$i.'" type="hidden">
								</form>
							';
							$change_value_form .='
								<form id="cart_item_qty'.$input_start.'" method="post" action="#">
									<input name="ch_proid" value="'.$prog_id.'" type="hidden">
									<input name="ch_course_id" value="'.$course_post_id.'" type="hidden">
									<input name="ch_values" value="'.$i.'" type="hidden">
									<input name="ch_qty" id="ch_qty'.$input_start.'" type="hidden">
								</form>
								';
							$javascript .='	
									var e = document.getElementById("value'.$input_start.'").value;
									document.getElementById("ch_qty'.$input_start.'").value = e;
							';
							if( get_field('instances', $course_post_id) ){
								while( has_sub_field('instances', $course_post_id) )
								{
									$programinstanceid = get_sub_field('programinstanceid', $course_post_id);
									$instances_name = get_sub_field('instances_name', $course_post_id);
									if($prog_id==$programinstanceid){
										$get_piid = $prog_id;
										$show_instances_name =  $instances_name;
									}
								}
							}
							$table_display .= '

								<tr>
									<td><span class="graphic footer-courses"></span></td>
										<td><strong>'.get_the_title($course_post_id).'</strong><br/>'.$show_instances_name.'</td>
										<td>
											<input class="form-control" name="value'.$input_start.'" id="value'.$input_start.'" type="text" value="'.$wp_session[$prog_id.'qty'].'" onkeyup="return runScript()" />
											<input class="form-control" name="instancesid'.$input_start.'" type="hidden" value="'.$get_piid.'">
											<a href="#" rel="tooltip" class="btn btn-default" onclick="document.getElementById(\'cart_item_qty'.$input_start.'\').submit();"><Edit</a>
											<a href="#" class="btn btn-primary" onclick="document.getElementById(\'cart_item_del'.$i.'\').submit();">Remove</a>
										</td>
									<td>$'.$price[$i].'</td>
									<td>$'.$total.'</td>
								</tr>
							';
							$input_start = $input_start + 1;
							$array[] = array("programInstanceId" => $get_piid, "quantity" => $wp_session[$prog_id.'qty']);


						}
					}
					echo $delete_hidden_form;
					echo $change_value_form;
				?>
            <form action="<?php echo site_url().'/order-redirect/';?>" method="post" id="post_json">
			<table class="table">
					<tr>
				<thead>
					<tr>
						<th>Product</th>
						<th>Description</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
                	<?php echo $table_display;?>

					<tr>
						<td colspan="6">&nbsp;<?php //echo $input_start."array"; ?><input type="hidden" value="<?php echo $input_start;?>" name="array_time" /></td>
					</tr>
					<tr>
						<td colspan="4" class="text-right">Total Product</td>
						<td>$<?php echo $amount;?></td>
					</tr>

					<tr>
						<td colspan="4" class="text-right"><strong>Total with GST</strong></td>
						<td>$<?php echo $amount * 1.1;?></td>
					</tr>
				</tbody>
			</table>
            </form>
            <?php //echo json_encode($array); ?>
		</div>
		<a href="<?php echo site_url(); ?>/program-catalogue/" class="btn btn-simple"><span class="graphic arrow-left-black"></span>Continue Shopping</a>
        <?php if($input_start > 1){ ?>
		<a href="#" class="btn btn-simple pull-right" onclick="document.getElementById('post_json').submit();">Checkout<span class="graphic arrow-right-black"></span></a>
        <?php } ?>
	</div>

</article>
<?php 

$runjs = '
<script type="text/javascript">
	'.$javascript .'
	function runScript() {
		'.$javascript .'
	};
</script>

';
echo $runjs; endwhile; 
?>
