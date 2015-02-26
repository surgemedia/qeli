
var programsSelect = $('#scheduled-programs'),
	goBtn = $('.btn-go');

if(programsSelect) {
	$(programsSelect).change(function(){
		console.log('select');
		var url = $(programsSelect).find('option:selected').val();
		
		$(goBtn).attr('href', url); 
	});
}
