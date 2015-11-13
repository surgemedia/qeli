<?php 
/*====================================
=            Section Hero            =
====================================*/



 ?>
<div class="section hero">
  <div class="home-images" style="background-image: url('<?php echo get_field('sliders')['0']['image']['url']; ?>')">
  <div class="container">
    <h1> <?php echo get_field('sliders')['0']['header_text']; ?></h1>
  </div>
    <div class="call-to-action">
      <div class="container">
          <div class="col-xs-8"><?php echo get_field('sliders')['0']['footer_text']; ?></div>
          <div class="col-xs-4 text-right"><a href="<?php echo get_field('sliders')['0']['arrow_link']; ?>" class="big-link">
            <span class="graphic arrow-link-sq-white"></span><?php echo get_field('sliders')['0']['arrow_text']; ?></a>
          </div>A
      </div>
    </div>
  </div>
  <div class="hero-overlay"></div>

  <div id="hero-footer" class="section-footer">
    <span class="graphic icon-chevron-down-circle"></span>
  </div>
</div>