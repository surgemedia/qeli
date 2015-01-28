
// $("[data-target^=#outcome_]").click(function () {
// 	$(this).parents('.course').addClass('active');
// });

// $(document).ready(function () {

// 	var $container = $('.isotope').isotope({
// 		itemSelector: '.course',
// 		layoutMode: 'fitRows'
// 	});



// // store filter for each group
// var filters = {};

// $('#filters a').click(function(){
//  	single_filter($(this));
// });

// $('#filters select').change(function(){
// 	var selected;
// 	$.each(this, function(key, value) {
//     	if (value.selected) {
//     		selected = value;
//     	}
//     });

// 	// TO DO disabled select
// 	//$('#filters select').not(this).attr('disabled', 'true');
//  	single_filter($(selected));
// });


// $('#favourites a').click(function(){
// 	//$('#filters select').attr('disabled', 'false');
//  	single_filter($(this));
// });

// $('#all a').click(function(){
// 	//$('#filters select').attr('disabled', 'false');
//  	single_filter($(this));
// });

// $('.course th .icon-star').click(function(){
//  	toggle_favourite($(this).parents('.course'));
// });


// function toggle_favourite($this){
// 	$this.toggleClass('favourite');
// }

// function single_filter($this){

// 	$this.parents('#filters').find('.active').removeClass('active');
// 	$this.parent('li').addClass('active');
// 	filterValue = $this.attr('data-filter');
//   // set filter for Isotope

//   $('.course.active').removeClass('active');
//   $('.collapse.in').removeClass('in');
//   $('.isotope').isotope({ filter: filterValue});

//   $('#filterOutput').html(filterValue);
// }



// function combination_filters($this){
// 	// $this.parent().find('.active').removeClass('active');
// 	$this.addClass('active');

// 	var $buttonGroup = $this.parents('.button-group');
// 	var filterGroup = $buttonGroup.attr('data-filter-group');

//   // set filter for group
//   filters[ filterGroup ] = $this.attr('data-filter');

//   // combine filters
//   var filterValue = '';
//   for ( var prop in filters ) {
//   	filterValue += filters[ prop ];
//   }

//   // set filter for Isotope
//   $('.isotope').isotope({ filter: filterValue });

//   $('#filterOutput').html(filterValue);
// }

// });
