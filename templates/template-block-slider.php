<div class="section hero">
<!--<img data-src="holder.js/1440x475/auto/gray" alt="..." class="img-responsive">-->
  <?php //debug(get_field('sliders')) ?>

  <div class="home-images" style="background-image: url('<?php echo get_field('sliders')['0']['image']['url']; ?>')">
    <div class="call-to-action">
      <div class="container">
          <div class="col-xs-8">Quality, innovative and responsive leadership solutions</div>
          <div class="col-xs-4 text-right"><a href="<?php echo get_permalink( 157 ); ?>" class="big-link"><span class="graphic arrow-link-sq-white"></span> See our solutions</a></div>
    </div>
  </div>
  </div>
  <div class="hero-overlay"></div>

  <div id="hero-footer" class="section-footer">
    <span class="graphic icon-chevron-down-circle"></span>
  </div>
</div>