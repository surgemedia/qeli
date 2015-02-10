
<div class=" col-xs-12 col-sm-6 col-md-6">
  <div class="video-item col-sm-4">
	<img alt="400x225" class="img-responsive" src="<?php echo getFeaturedUrl(); ?>" data-holder-rendered="true">
	<div class="video-modal graphic btn-play-sm" data-modal="#videoModal" data-src="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>">
	</div>
</div>
  <div class="col-xs-12 col-sm-7">
    <h3 class="title"><?php the_title(); ?> / <?php echo get_the_date('F j');  ?></h3>
  </div>
  <div class="col-xs-7">
    <div class="item-text">
      <p><?php echo truncate(get_field('talks')[0]['description'],25,"..."); ?>
      </p>
    </div>
    <span class="share-link">Share</span>

  </div>
</div>

