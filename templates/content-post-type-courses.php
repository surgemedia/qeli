<?php
  $audience = strip_tags(get_the_taxonomies()['courses_categories']);
  $tags = strip_tags(get_the_taxonomies()['courses_tags']);
  $tags_array = explode(':',$tags)[1];

  $audience_array = explode(':',$audience)[1];
  $audience_list = explode(',',$audience_array);

  ?>
<div class="course col-xs-12 col-sm-6" 
    data-audience="<?php echo $audience_array; ?>"
    data-fee="<?php echo strip_tags(get_field('cost')); ?>"
    data-tags="<?php echo $tags_array; ?>"
    <?php /* Removed from Course - Alex  ?>
    data-delivery="<?php echo strip_tags(get_field('deliveryMethod')); ?>" 
     data-location="<?php echo strip_tags(get_field('instances')[0]['location']); ?>"
    data-month="<?php echo get_field('instances')[0]['date']; ?>" 
    data-development="<?php the_field('development'); ?>" 
    <?php */ ?>
    >
    <div class="row">
    <div class="col-xs-12">   
      <h2><a href="<?php the_permalink() ?> "><?php the_title(); ?></a></h2>
      <!--
      <a href="<?php //echo site_url(); ?>/cart/" class="graphic icon-cart pull-right"></a>
      <span class="sep pull-right"></span>
      -->
      <span class="graphic icon-star pull-right"></span>
    </div>

    <hr class="col-xs-12">
     <?php /*  Removed from Course - Alex ?>
    <div class="col-xs-12 col-sm-6">
      <?php truncate(get_field('executive_summary'),50,"...");?>
      <a href="<?php echo the_permalink(); ?>" class="btn btn-program"><span class="graphic icon-read-more"></span> Read More</a>
    </div>
    */ ?>
    <div class="col-xs-12 col-sm-12">
      <table class="table">
        <tbody>
          <tr>
            <td><b>Delivery</b></td>
            <td>
              <?php the_field('deliveryMethod'); ?>
            </td>
          </tr>
          <tr>
            <td><b>Audience</b></td>
            <td>
            <ul>
            <?php 
        
        for ($i=0; $i < count($audience_list); $i++) { ?>
          <li><?php echo $audience_list[$i]; ?></li>
        <?php } ?>
        </ul>
        </td>
          </tr>
          <tr>
            <td><b>Fees</b></td>
            <td><?php echo '$'.strip_tags(get_field('cost')); ?></td>
          </tr>
          <?php /*  Removed from Course - Alex ?>
          <tr>
            <td><b>Location</b></td>
            <td><?php echo get_field('locations'); ?></td>
          </tr>
          
          <tr> 
            <td><b>Month</b></td>
            <td><?php echo get_field('instances')[0]['instances_name']; ?></td>
          </tr>
          
          <tr>
            <td><b>Development</b></td>
            <td><?php truncate(get_field('outcome'),9,"..."); ?></td>
          </tr>
          <?php */ ?>
        </tbody>
      </table>
    </div>
  <hr class="col-xs-12">
  </div>
</div>