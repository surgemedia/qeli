<div class="panel">
  <div class="panel-heading" role="tab" id="heading-question-<?php echo $GLOBALS['FAQ_count'] ?>">
    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-faq" href="#collapse-question-<?php echo $GLOBALS['FAQ_count'] ?>" aria-expanded="true" aria-controls="collapse-question-<?php echo $GLOBALS['FAQ_count'] ?>">
      <h3 class="panel-title">
        <span class="graphic arrow-panel-gray"></span><?php echo get_field('faqs')[$GLOBALS['FAQ_count']]['question']  ?>?<span class="graphic icon-toggle pull-right"></span>
      </h3>
    </a>
  </div>
  <div id="collapse-question-<?php echo $GLOBALS['FAQ_count'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-question-<?php echo $GLOBALS['FAQ_count'] ?>">
    <div class="panel-body">
      <p><?php echo get_field('faqs')[$GLOBALS['FAQ_count']]['answer']  ?></p>
    </div>
  </div>
</div>