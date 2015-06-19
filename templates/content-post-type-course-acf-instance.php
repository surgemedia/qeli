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
      <?php echo get_field('instances')[$GLOBALS['instance_count']]['instances_name']; ?>
    <?php if ( 0 < strlen(get_classSize($maxSize,$currentSize,true))): ?>
      
      <?php echo ' - ('.get_classSize($maxSize,$currentSize,true).')'; ?> 
     
      <?php endif ?>

      <span class="graphic icon-toggle pull-right"></span>
      </h3>
    </a>
  </div>
  <div id="collapse<?Php echo $GLOBALS['instance_count'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?Php echo $GLOBALS['instance_count'] ?>">
    <div class="panel-body">
      <p>
      <?php
      $events = get_field('instances')[$GLOBALS['instance_count']]['events'];

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
      $get_date = substr($events[$j]['eventstartdate'], 0, 10);
      $newDate = date("Y-m-d", strtotime($get_date));
      $newTime = substr($events[$j]['eventstartdate'], 11, 5);

      $the_date = strtotime($newDate." ".$newTime);
      date_default_timezone_set("Australia/Brisbane");
      $display_newDate = date("d-M-Y", $the_date);
      if($events[$j]['eventstartdate']!=""){
        // echo '<i>'.$newDate.' at '.$newTime.'</i>';
        echo '<i>'.$display_newDate.'</i>';
      }
      $get_date2 = substr($events[$j]['eventenddate'], 0, 10);
      $newDate2 = date("d-M-Y", strtotime($get_date2));
      $newTime2 = substr($events[$j]['eventenddate'], 11, 5);
      $the_date = strtotime($newDate2." ".$newTime2);
      $display_newDate2 = date("d-M-Y", $the_date);

      if($events[$i]['eventenddate']!=""){
        // if($get_date != $get_date2){ $showinform = 'End on: <i>'.$newDate2.' at '.$newTime2.'</i>';
        // }else{ $showinform = '<strong> to: </strong><i>'.$newTime2.'</i>';}
        if($display_newDate2!=$display_newDate){
          $showinform = '<i> to: </i><i>'.$display_newDate2.'</i>';
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
</div>