<div class="news-obj">
<?php $col = 'col-xs-12'; ?>
  <?php  if( has_post_thumbnail() ){ 
        $col = 'col-xs-9';
    ?>

    <div class="img-crop col-xs-3">
    <?php echo get_the_post_thumbnail( $post_id, array( 200, 200), array( 'class' => 'img-responsive pull-left' )); ?>
        <!-- <img class=" img-responsive pull-left" src="<?php echo getFeaturedUrl(get_the_ID()); ?> " alt="<?php the_title(); ?>"> -->
    </div>
    <?php } ?>

    <div class="<?php echo $col; ?>">
        <h3><a href="<?php the_permalink(); ?>"><span class="graphic arrow-link"></span> <?php the_title(); ?></a></h3>
        <p><?php truncate(get_the_excerpt(),15,'...'); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Continued</a></p>
        <p class="date">
        <?php
        //Used post date but also have control for date published.
        //echo get_the_date('F j');
        ?> <?php edit_post_link(); ?>
        </p>
    </div>
</div>