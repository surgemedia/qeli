<div class="course  principals 500 cairns hosted october feedbackonskills col-xs-12 col-sm-6 col-md-4 col-lg-3" data-audience="principals" data-fee="500" data-location="cairns" data-delivery="hosted" data-month="october" data-development="feedbackonskills" style="">
  <table class="table">
    <thead>
      <tr>
        <th colspan="2">
          <?php the_title(); ?>
          <span class="graphic icon-star pull-right"></span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!--<td><b>Description</b></td>-->
        <td colspan="2">
          <?php the_field('executive_summary'); ?>
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
        <td><?php the_field('audience'); ?></td>
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
        <td><?php the_field('outcome') ?></td>
      </tr>
      
      <tr>
        <td>
          <a href="<?php echo site_url(); ?>/cart/" class="btn btn-program"><span class="graphic icon-cart"></span> Add to cart</a>
        </td>
        <td>
          <a href="<?php echo the_permalink(); ?>" class="btn btn-program  "><span class="graphic icon-read-more"></span> Read More</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>