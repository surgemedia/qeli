
$("[data-target^=#outcome_]").click(function () {
	$(this).parents('.course').addClass('active');
});

$(document).ready(function () {
	var $container = $('.isotope').isotope({
		itemSelector: '.course',
		layoutMode: 'fitRows'
	});

	// store filter for each group
	/*
	var filters = {};

	$('#filters .btn-filter-toggle').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
	 	$('.selectors').toggleClass('open');
	});

	$('a[data-filter-group="all"]').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;

		$('html, body').animate({
			scrollTop: $('#filters').offset().top
		}, 500);

		$('#courseOverview').addClass('active');
	});

	$('#filters a').not('.btn-filter-toggle').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
	 	single_filter($(this));
	});

	$('#filters a').not('.btn-filter-toggle').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		$('#filters a').removeClass('selected');
		$(this).addClass('selected');
	 	single_filter($(this));
	});

	$('a[data-filter-group="all"]').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		$('.filter-clear').addClass('visuallyhidden');
	 	single_filter($(this));
	});

	$('.course th .icon-star').click(function() {
	 	toggle_favourite($(this).parent('.course'));
	});

	function toggle_favourite($this) {
		$this.toggleClass('favourite');
	}

	function single_filter($this) {
		$this.parents('#filters').find('.active').removeClass('active');
		$this.parent('li').addClass('active');

		var filterGroup = $this.attr('data-filter-group');
		var filterValurStr = $this.attr('data-value-str') ? ' > ' + $this.attr('data-value-str') : '';
		var filterValue = $this.attr('data-filter');

		if (filterGroup !== 'all') {
	  		$('.filter-clear').removeClass('visuallyhidden');
		}

		$('.filter-value').html(filterGroup + filterValurStr);
		$('.selectors').removeClass('open');

	  	// set filter for Isotope
		$('.course.active').removeClass('active');
		$('.collapse.in').removeClass('in');
		$('.isotope').isotope({ filter: filterValue});

		$('#filterOutput').html(filterValue);
	}*/
	/*
	function combination_filters($this){
		// $this.parent().find('.active').removeClass('active');
		$this.addClass('active');

		var $buttonGroup = $this.parents('.button-group');
		var filterGroup = $buttonGroup.attr('data-filter-group');

		// set filter for group
		filters[ filterGroup ] = $this.attr('data-filter');

		// combine filters
		var filterValue = '';
		for ( var prop in filters ) {
			filterValue += filters[ prop ];
		}

		// set filter for Isotope
		$('.isotope').isotope({ filter: filterValue });

		$('#filterOutput').html(filterValue);
	}
	*/
});

$(document).ready(function () {

	var $dev = $('#filter-development'),
		$devSelect = $('#filter-development .select'),
		$devSelectors = $('#filter-development .selectors'),
		$moreOptions = $('.btn-more-options'),
		$optionsSelect = $('#filter-options'),
		$optionsSelectors = $('#filter-options .selectors');

	$devSelect.click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		$($optionsSelect).removeClass('open');
		$($devSelectors).toggleClass('open');
	});


	$moreOptions.click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		$optionsSelect.toggleClass('open');
		// $optionsSelectors.toggleClass('open');
		// $($devSelectors).removeClass('open');
		// $($dev).addClass('hidden');
	});

	$optionsSelect.find('a').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		// $($devSelectors).removeClass('open');
		// $($optionsSelectors).toggleClass('open');
	});

	$('#filters a').not('.btn-filter-toggle, .select, .btn-more-options').click(function() {
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		$('#filters a').removeClass('selected');
		$(this).addClass('selected');
	 	singleFilter($(this));
	 	showPrograms();
	});

	var $container = $('.isotope').isotope({
		itemSelector: '.course',
		layoutMode: 'fitRows'
	});

	function showPrograms() {
		$('html, body').animate({
			scrollTop: $('#filters').offset().top
		}, 500);

		$('#courseOverview').addClass('active');
	}

	function singleFilter($this) {
		$this.parents('#filters').find('.active').removeClass('active');
		$this.parent('li').addClass('active');

		var filterGroup = $this.attr('data-filter-group');
		var filterValurStr = $this.attr('data-value-str');
		var filterValue = $this.attr('data-filter');

		if (filterGroup === 'all') {
	  		$('.filter-message').addClass('visuallyhidden');
		}else{
			$('.filter-message').removeClass('visuallyhidden');
		}

		$('.filter-value').html(filterValurStr);
		// $($devSelectors).removeClass('open');

	  	// set filter for Isotope
		$('.course.active').removeClass('active');
		$('.collapse.in').removeClass('in');
		$('.isotope').isotope({ filter: filterValue});

		$('#filterOutput').html(filterValue);
	}
});