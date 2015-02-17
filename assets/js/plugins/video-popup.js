$(".video-popup-thumbnail").click(function(e){
    e.preventDefault();
    var url = $(this).attr('data-url');
    var width = $(this).attr('data-width');
    var height = $(this).attr('data-height');
    var modal = $(this).attr('data-modal');
    $(modal).find('.embed-responsive').html('<iframe src="'+url+'" width="'+width+'" height="'+height+'" frameborder="0"></iframe>');
    $(modal).modal('show');
});


$("#videoModal").on('hidden.bs.modal', function (e) {
  var $frame = $(this).find('.embed-responsive > iframe');

    // saves the current iframe source
    var vidsrc = $frame.attr('src');

    // sets the source to nothing, stopping the video
    $frame.attr('src','');

    // sets it back to the correct link so that it reloads immediately on the next window open
    $frame.attr('src', vidsrc);
});


$(".video-in-situ").click(function(e){
    e.preventDefault();
    if(player){
        player.playVideo();
    }
    $('.section.videos').addClass('playing-video');

    var headerEl = document.getElementById('header');
    $('html, body').animate({
                scrollTop:( $('.section.videos').offset().top - headerEl.offsetHeight)
    }, 500);
});


$("#videoModal").on('hidden.bs.modal', function (e) {
  var $frame = $(this).find('.embed-responsive > iframe');

    // saves the current iframe source
    var vidsrc = $frame.attr('src');

    // sets the source to nothing, stopping the video
    $frame.attr('src','');

    // sets it back to the correct link so that it reloads immediately on the next window open
    $frame.attr('src', vidsrc);
});

