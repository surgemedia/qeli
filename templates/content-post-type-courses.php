<div class="course col-xs-12 col-sm-6" 
    data-audience="<?php the_field('audience'); ?>"
    data-fee="<?php the_field('cost'); ?>"
    data-location="<?php the_field('instances')[0]['state']; ?>"
    data-delivery="<?php
                $terms = get_field('delivery_method');
                for ($i=0; $i < sizeof($terms); $i++) {
                  if($i == 0) {
                    echo $terms[$i]->name;
                  }
                  else {
                    echo ", ".$terms[$i]->name;
                  }
                } 
              ?>" 
    data-month="<?php echo get_field('instances')[0]['date']; ?>" 
    data-development="<?php the_field('development'); ?>" 
    >
    <div class="row">
    <div class="col-xs-12">   
      <h2><a href="<?php the_permalink() ?> "><?php the_title(); ?></a></h2>
      <!--
      <a href="<?php echo site_url(); ?>/cart/" class="graphic icon-cart pull-right"></a>
      <span class="sep pull-right"></span>
      -->
      <span class="graphic icon-star pull-right"></span>
    </div>

    <hr class="col-xs-12">
    <div class="col-xs-12 col-sm-6">
      <?php truncate(get_field('executive_summary'),50,"...");?>
      <a href="<?php echo the_permalink(); ?>" class="btn btn-program"><span class="graphic icon-read-more"></span> Read More</a>
    </div>
    <div class="col-xs-12 col-sm-6">
      <table class="table">
        <tbody>
          <tr>
            <td><b>Delivery</b></td>
            <td>
              <?php
                $terms = get_field('delivery_method');
                for ($i=0; $i < sizeof($terms); $i++) {
                  if($i == 0) {
                    echo $terms[$i]->name;
                  }
                  else {
                    echo ", ".$terms[$i]->name;
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
        </tbody>
      </table>
    </div>
  <hr class="col-xs-12">
  </div>
</div>