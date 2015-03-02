
<div class=" col-xs-12 col-sm-6 col-md-6">
  <div class="video-item col-sm-4">
  <a href="#" class="video-popup-thumbnail" data-url="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>" data-modal="#videoModal" data-width="400" data-height="225" role="button">
    <img alt="400x225" height="200" width="200" class="img-responsive" src="<?php echo getFeaturedUrl(null, 'qeli-talks-square'); ?>" data-holder-rendered="true">
    <div class="overlay">
      <span class="graphic btn-play-sm"></span>
    </div>
  </a>
</div>
<div class="col-xs-12 col-sm-8">
  <h3 class="title"><?php the_title(); ?></h3>

    <div class="item-text">
      <p><?php echo truncate(get_field('talks')[0]['description'],25,""); ?></p>
    </div>
    <a href="#share-collapse-<?php the_ID(); ?>" data-toggle="collapse" aria-controls="share-collapse">
      <span class="share-link btn btn-default" >Share</span>
    </a>
    <div id="share-collapse-<?php the_ID(); ?>" class="panel-share collapse">
      <div class="graphic panel-info-callout"></div>
      <div class="panel-body">
        <div class="addthis_sharing_toolbox"></div>
      </div>
    </div>
  </div>
</div>

