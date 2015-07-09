<?php
$programinstance_type = get_field('instances')[$GLOBALS['instance_count']]['type'];
//debug($programinstance_type);
switch($programinstance_type) {
case 1:
$programinstance_type = 'Scheduled Instance';
break;
case 2:
$programinstance_type = 'Expression Of Interest';
break;
case 3:
$programinstance_type = 'On Demand';
break;
default:
$programinstance_type = 'Scheduled Instance';
} ?>
<?php 
$maxSize = (int)get_field('instances')[$GLOBALS['instance_count']]['class_size'];
$currentSize = (int)get_field('instances')[$GLOBALS['instance_count']]['currentClassSize'];


 ?>
<div class="panel">
  <?php //debug(get_field('instances')[$GLOBALS['instance_count']]) ?>
  <div class="panel-heading" role="tab" id="heading<?Php echo $GLOBALS['instance_count'] ?>">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?Php echo $GLOBALS['instance_count'] ?>" aria-expanded="true" aria-controls="collapse<?Php echo $GLOBALS['instance_count'] ?>" class="collapsed">
      <h3 class="panel-title">
      <span class="graphic arrow-panel-gray <?php echo $programinstance_type; ?>"></span>
      <?php  $events = get_field('instances')[$GLOBALS['instance_count']]['events'];
        if(sizeof($events)>0){$programinstance_type2="";}else{$programinstance_type2 = '-(On Demand)';}
      ?>
      <?php echo get_field('instances')[$GLOBALS['instance_count']]['instances_name'].$programinstance_type2; ?>
        <?php if ( 0 < strlen(get_classSize($maxSize,$currentSize,true))): ?>
        
        <?php echo ' '.get_classSize($maxSize,$currentSize,true).''; ?> 
       
        <?php endif ?>
      <span class="graphic icon-toggle pull-right"></span>
      </h3>
    </a>
  </div>
  <?php       
   
    if(sizeof($events)>0){
  ?>
  <div id="collapse<?Php echo $GLOBALS['instance_count'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?Php echo $GLOBALS['instance_count'] ?>">
    <div class="panel-body">
      <p>
      <?php
      // vars
      $order = array();


      // populate order
      foreach( $events as $i => $row ) {
        
        $order[ $i ] = $row['eventstartdate'];
        
      }
      
      array_multisort( $order, SORT_ASC, $events );

      for ($j=0; $j < sizeof($events); $j++) {
      echo '<strong>';
      echo $events[$j]['eventname'].'</strong><br>' ;
      
       // START DATE
      $start_date = $events[$j]['eventstartdate'];

      if($events[$j]['eventstartdate']!=""){
        echo '<i>'.$start_date.'</i>';
      }
      // END DATE
      $end_date = $events[$j]['eventenddate'];
      if($events[$i]['eventenddate']!=""){ 
        if($end_date!=$start_date){
          $showinform = '<i> to </i><i>'.$end_date.'</i>';
          echo $showinform;
        }
      }
      echo '<br>';
      echo $events[$j]['eventvenuename']." " ;
      echo $events[$j]['eventvenueroom']." " ;
      echo $events[$j]['eventaddressline1'].", ";
      echo $events[$j]['eventaddressline2']."<br/> " ;
      echo $events[$j]['eventsurburb']." ";
      echo $events[$j]['eventcity']." " ;
      echo $events[$j]['eventstate'].' ' ;
      echo $events[$j]['eventpostcode']." ";
      echo $events[$j]['eventcountry']." ";
      echo "<hr>";
      }?>

      </p>
      <p>

      </p> 
      <ul>
        <?php
        $phases = get_field('instances')[$GLOBALS['instance_count']]['phases'];
        for ($i=0; $i < sizeof($phases); $i++) { ?>
        <li><?php echo $phases[$i]['name']; ?> - <?php echo $phases[$i]['type']; ?> <?php echo $phases[$i][$GLOBALS['instance_count']]['city']; ?></li>
        <?php  } ?>


      </ul>
    </div>
  </div>
  <?php } ?>
</div>