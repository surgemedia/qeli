  <div class="panel">
  <?php //debug(get_field('instances')[$GLOBALS['instance_count']]) ?>
    <div class="panel-heading" role="tab" id="heading<?Php echo $GLOBALS['instance_count'] ?>">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?Php echo $GLOBALS['instance_count'] ?>" aria-expanded="true" aria-controls="collapse<?Php echo $GLOBALS['instance_count'] ?>">
          <h3 class="panel-title">
            <span class="graphic arrow-panel-gray"></span><?php echo get_field('instances')[$GLOBALS['instance_count']]['instances_name']; ?> - <?php echo get_field('instances')[$GLOBALS['instance_count']]['state'] ?><span class="graphic icon-toggle pull-right"></span>
          </h3>
        </a>
    </div>
    <div id="collapse<?Php echo $GLOBALS['instance_count'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?Php echo $GLOBALS['instance_count'] ?>">
      <div class="panel-body">
        <p>
          <?php echo get_field('instances')[$GLOBALS['instance_count']]['venue_name'] ?>,<br>
          <?php echo get_field('instances')[$GLOBALS['instance_count']]['venue_address'] ?>
        </p>
        <ul>
        <?php 
          $phases = get_field('instances')[$GLOBALS['instance_count']]['phases'];
          for ($i=0; $i < sizeof($phases); $i++) { ?>
          <li><?php echo $phases[$i]['name']; ?> - <?php echo $phases[$i]['type']; ?> <?php echo $phases[$i]['start']; ?> to <?php echo $phases[$i]['end']; ?></li>
          <?php  } ?>
  				
  				
  			</ul>
      </div>
    </div>
  </div>