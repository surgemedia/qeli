if ($('#comment')) {
    $('#submit').hide('fast');
    $('#comment').keyup(function(event) {
        var comment_length = $('#comment').val().length;
        if (0 >= comment_length) {
            $('#submit').hide('fast');
        } else {
            $('#submit').show('slow');
        }
    });
}

function navFade() {
    if ($('#login-nav-container')) {
        $(window).scroll(function() {
            // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 100) {
                $('#login-nav-container').fadeOut();
            } else {
                $('#login-nav-container').fadeIn();
            }
        });
    }
}

navFade();




