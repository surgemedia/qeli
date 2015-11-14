  /*=============================================
  =           Gallery Carousel                  =
  ===============================================*/
  jQuery(document).ready(function($) {
        var sliderGallery = $('.galleryCarousel');
         sliderGallery.carousel({ interval: 5000 });
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        var carousel_id = $(this).closest('.slider');
        carousel_id = $(carousel_id).find('.galleryCarousel');
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            // console.log(id_selector, id);
            console.log(carousel_id);
           $(carousel_id).carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        sliderGallery.on('slid.bs.carousel', function (e) {
         var id = $('.item.active').data('slide-number');
        sliderGallery.closest( ".carousel-text" ).html($('#slide-content-'+id).html());
        });
  });