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
      $venunes = get_field('instances')[$GLOBALS['instance_count']]['venues']; ?>
      <?php for ($i=0; $i < sizeof($venunes); $i++) {
      echo "<strong>";
      echo $venunes[$i]['name'].'</strong><br>' ;
      echo $venunes[$i]['room']." " ;
      echo $venunes[$i]['addressline1']." ";
      echo $venunes[$i]['addressline2']." " ;
      echo $venunes[$i]['surburb']." ";
      echo $venunes[$i]['city']." " ;
      echo $venunes[$i]['state'].'<br>' ;
      echo $venunes[$i]['postcode']." ";
      echo $venunes[$i]['country']." ";
      echo "<hr>";
      }?>

      </p>
	  <p>
      <?php
      $events = get_field('instances')[$GLOBALS['instance_count']]['events'];
      //echo print_r($events;)
      for ($j=0; $j < sizeof($events); $j++) {
      echo '<strong><span class="event_icon"><i class="events_icon"></i>Event:</span> ';
      echo $events[$j]['eventname'].'</strong><br>' ;
      echo $events[$j]['eventstartdate'].'-'. $events[$i]['eventenddate'].'<br>' ;
      echo $events[$j]['eventvenuename']." " ;
      echo $events[$j]['eventvenueroom']." " ;
      echo $events[$j]['eventaddressline1']." ";
      echo $events[$j]['eventaddressline2']." " ;
      echo $events[$j]['eventsurburb']." ";
      echo $events[$j]['eventcity']." " ;
      echo $events[$j]['eventstate'].'<br>' ;
      echo $events[$j]['eventpostcode']." ";
      echo $events[$j]['eventcountry']." ";
      echo "<hr>";
      }?>

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