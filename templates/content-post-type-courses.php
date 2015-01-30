<div class="course  principals 500 cairns hosted october feedbackonskills col-xs-12 col-sm-6 col-md-4 col-lg-3" data-audience="principals" data-fee="500" data-location="cairns" data-delivery="hosted" data-month="october" data-development="feedbackonskills" style="">
  <table class="table">
    <thead>
      <tr>
        <th colspan="2">
          <?php the_title(); 
		  		$courseid = get_the_ID();
		  ?>
          <span class="graphic icon-star pull-right"></span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2">
          <?php truncate(get_field('executive_summary'),50,"...");?>
        </td>
      </tr>
      <tr>
        <td><b>Delivery</b></td>
        
        <td>
          <?php
         $terms = get_field('delivery_method');
         for ($i=0; $i < sizeof($terms); $i++) {
          if($i == 0)
          echo $terms[$i]->name;
          else {
          echo ",".$terms[$i]->name;
          }

         } 
          ?>
        </td>
      </tr>
      <tr>
        <td><b>Audience</b></td>
        <td><?php truncate(get_field('audience'),5,"..."); ?></td>
      </tr>
      <tr>
        <td><b>Fees</b></td>
        <td><?php the_field('cost'); ?></td>
      </tr>
      <tr>
        <td><b>Location</b></td>
        <td><?php echo get_field('instances')[0]['state']; ?></td>
      </tr>
      <tr>
        <td><b>Month</b></td>
        <td><?php echo get_field('instances')[0]['date']; ?></td>
      </tr>
      <tr>
        <td><b>Development</b></td>
        <td><?php truncate(get_field('outcome'),9,"..."); ?></td>
      </tr>
      
      <tr>
        <td>
        
        <?php
			$program_id = get_field('programId'); //output the Program ID
        	if($program_id){
				echo '
					<form action="'.site_url().'/cart/" method="post" id="course-'.$program_id.'">
						<input type="hidden" name="programid" value="'.$program_id.'" /> 
						<input type="hidden" name="postid" value="'.$courseid.'" /> 
					</form>
				'; // If have this Program, Print the form to active add-to-cart
				$sumbit_id = "onclick=\"document.getElementById('course-".$program_id."').submit();\" "; //add the function to button.
			}
		?>
          <a href="#" class="btn btn-program" <?php echo $sumbit_id; ?>><span class="graphic icon-cart"></span> Add to cart</a>
        </td>
        <td>
          <a href="<?php echo the_permalink(); ?>" class="btn btn-program  "><span class="graphic icon-read-more"></span> Read More</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>