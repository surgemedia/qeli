
$("[data-target^=#outcome_]").click(function () {
	$(this).parents('.course').addClass('active');
});

$(document).ready(function () {
	/*
	var $container = $('.isotope').isotope({
		itemSelector: '.course',
		layoutMode: 'fitRows'
	});
	*/
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
	if($('body.page-template-template-courses').length>0) {
		var $primary = $('#filter-primary'),
			$primarySelectors = $primary.find('.selectors'),
			$extended = $('#filter-extended'),
			$extendedSelectors = $extended.find('.selectors'),
			$moreOptions = $('.btn-more-options');

		$moreOptions.click(function(event) {
			(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
			$extendedSelectors.toggleClass('open');

			if ($extendedSelectors.hasClass('open')) {
				$moreOptions.html('less options');
			}
			else {
				$moreOptions.html('more options');
			}
		});

		$('#filters a').not('.btn-filter-toggle, .select, .btn-more-options').click(function(event) {
			(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
			$('#filters a').removeClass('selected');
			$(this).addClass('selected');
		 	singleFilter($(this));
		 	showPrograms();
		});
		/*
		var el = document.querySelector('.isotope');

		var iso = new Isotope(el, {
			itemSelector: '.course',
			layoutMode: 'fitRows'
		});

		iso.on('layoutComplete', function(isoInstance, laidOutItems) {
			$('#filter-no-results').addClass('hidden');
			console.dir($('#filter-no-results'));

			if(laidOutItems.length == 0) {
				$('#filter-no-results').removeClass('hidden');
			}

			else {
			}
		});
*/
		var $container = $('.isotope').isotope({
			itemSelector: '.course',
			layoutMode: 'fitRows'
		});

		$('.isotope').isotope({ filter: 'none'});

		$container.isotope( 'on', 'layoutComplete', function(isoInstance, laidOutItems) {
			$('#filter-no-results').addClass('hidden');
			console.dir($('#filter-no-results'));

			if(laidOutItems.length == 0) {
				$('#filter-no-results').removeClass('hidden');
			}
			else {
			}
		});

		$('.course .icon-star').click(function() {
		 	toggleFav($(this).parents('.course'));
		});

		function toggleFav($this) {
			$this.toggleClass('favourite');
		}

		function showPrograms() {
			$('html, body').animate({
				scrollTop: $('#filter-view').offset().top
			}, 500);
			$('#course-overview').addClass('active');
		}

		function singleFilter($this) {
			$this.parents('#filters').find('.active').removeClass('active');
			$this.parent('li').addClass('active');

			var filterGroup = $this.attr('data-filter-group');
			var filterValurStr = '<span class="filter-label">' + $this.attr('data-value-str') + '</span>';
			var filterValue = $this.attr('data-filter');

			if (filterGroup === 'all') {
		  		$('.filter-message').addClass('hidden');
			}
			else {
				$('.filter-message').removeClass('hidden');
			}

			$('.filter-label').html(filterValurStr);

		  	// set filter for Isotope
			$('.course.active').removeClass('active');
			$('.collapse.in').removeClass('in');
			$('.isotope').isotope({ filter: filterValue});

			$('#filterOutput').html(filterValue);



		}
	}
});
