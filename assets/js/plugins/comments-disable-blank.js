if($('#comment')){

$('#submit').hide('fast');

$('#comment').keyup(function(event) {
	var comment_length = $('#comment').val().length;
	if(0 >= comment_length){
		$('#submit').hide('fast');
	} else {
		$('#submit').show('slow');
	}
});
	

}

