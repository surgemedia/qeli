// Written for QELi
// Author: Jake Waterer
// Company: Breadcrumb Digital
// Notes: Not for production or public use
//
(function ($) {
    var ul_required = true;
    var $list=[];
    var $ul = null;
    if($('#thisPage').length){

        $('#content h2:not(.dont-list):not(.visible-print-inline-block), #content h3:not(.dont-list)').each(function ($index) {

            // JW this has now been hacked to bits completely, it works but it is ugly. I assume the final will be produced via the CMS anyway.

            var theAnchor = $(this).attr('id');
            var theTag = $(this).prop("tagName");
            $(this).addClass('highlight-target');

            // Check if this is part of a tab
            var parentTab = $(this).parent('.tab-pane').attr('id');

            // make an id if one doesn't exist
            if (typeof theAnchor === typeof undefined || theAnchor === false) {
                theAnchor =  theTag + $index;
                $(this).attr('id', theAnchor);
            }

            if(theTag==="H2"){
                if($ul != null){
                    $list[$list.length-1].append($ul);
                    $ul= null;
                }
                $item = $(this).text();
                $item = $('<a>', {href: "#" + theAnchor, "data-tab":parentTab}).append($item);
                $item = $('<li>', {class: "level-"+theTag.toLowerCase()}).append($item);
                $list.push($item);
                ul_required = true;
                }else{
                    $item = $(this).text();
                    $item = $('<a>', {href: "#" + theAnchor}).append($item);
                    $item = $('<li>', {class: "level-"+theTag.toLowerCase()}).append($item);
                    // add ul tag if required
                    if(ul_required){
                        $ul = $('<ul>').append($item);
                        ul_required = false;
                    }
                    $ul.append($item);
                }

        });

        if($list.length > 0 ){
            for (var i = 0; i < $list.length; i++) {
                if($ul != null){
                    $('.sidebar-scrollspy > .nav').append($list[i].append($ul));
                }else{
                    $('.sidebar-scrollspy > .nav').append($list[i]);
                }
            }
        }else{
            // if there is no H2 then we have to add here.
            var orphanlist = $('<li>', {class: "level-h2 force"}).append($ul);
            $('.sidebar-scrollspy > .nav').append(orphanlist);
        }


        // activate scroll spy.
        $('body').scrollspy({ target: '.sidebar-scrollspy' });


        // opens the correct tab for scroll spy
        $('.sidebar-scrollspy a').on('click', function(){
            if($(this).attr('data-tab')){
                $('a[href="#'+ $(this).attr('data-tab') +'"]').tab('show');
            }
        });
    }

}(jQuery));

(function ($) {
    $('.affix-this').each(function(item, value){
        $(value).affix({
            offset: {
                top: function () {
                    return (this.top = $(value).offset().top);
                },
                bottom: function () {
                    return (this.bottom = $("#footer").outerHeight(true));
                }
            }
        });

        $(this).css({
            'width':  $(this).parent().width()
        });
    });

    $('.affix-this').on('affix.bs.affix',function(){
        // collapse all items
        var $collapse = $(this).siblings().find('.collapse');
        $collapse.each(function(){
            if($(this).hasClass("in")){
                $(this).collapse('hide');
            }
        });

          // set width of the item to current width
        $(this).css({
            'width':  $(this).parent().innerWidth()
        });


    });


}(jQuery));



(function ($) {

    $('#hide-aside button').click(function(){
        if(!$('#aside').hasClass('hidden')){
            $('#aside').addClass('hidden');
            $('#show-aside').removeClass('hidden');
            $('#content').addClass('col-lg-8').removeClass('col-lg-6');
        }
    });

    $('#show-aside button').click(function(){
        $('#show-aside').addClass('hidden');
        $('#aside').removeClass('hidden');
        $('#content').addClass('col-lg-6').removeClass('col-lg-8');
    });

}(jQuery));