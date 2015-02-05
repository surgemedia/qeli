$(document).ready(function () {

	var panelEl = document.getElementById('panel-info'),
		panelTitleEl,
		panelTextEl,
		peopleList,
		filterList,
		peopleNavList;

	if (panelEl) {

		panelTitleEl = panelEl.querySelector('.panel-title'),
		panelTextEl = panelEl.querySelector('.panel-text'),


		init();
	}

	function init() {
		peopleList = document.querySelectorAll('div.person');
		filterList = document.querySelectorAll('.people-filter a');
		peopleNavList = document.querySelectorAll('.people-nav a');
		
		$(panelEl).find('.icon-close').click(function() {
			$(peopleList).removeClass('selected');
			$(panelEl).removeClass('show');
			$(panelTitleEl).html(''); 
			$(panelTextEl).html(''); 
		});

		for(var i = 0; i < peopleList.length; i++) {
			peopleList[i].onclick = function() {
				showPerson(this);
			}
		}

		for(var i = 0; i < filterList.length; i++) {

			filterList[i].onclick = function(event) {
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;

				var term = this.getAttribute('data-term');
				
				if (term !== 'clear') {
					$('.person').addClass('out');
					for(var i = 0; i < peopleList.length; i++) {
						if (term === peopleList[i].getAttribute('data-term')) {
							$(peopleList[i]).removeClass('out');
						}
					}
				}
				else {
					$('.person').removeClass('out');
				}
			}
		}

		for(var i = 0; i < peopleNavList.length; i++) {
			peopleNavList[i].onclick = function(event) {
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
	
				var person = findPerson(this.getAttribute('data-title'));

				showPerson(person);
			}
		}
	}

	function findPerson(title) {
		for(var i = 0; i < peopleList.length; i++) {
			if (title === peopleList[i].getAttribute('data-title')) {
				return peopleList[i];
			}
		}

		return false;
	}

	function showPerson(person) {
		$(panelEl).removeClass('show');

		var last = findLastinRow(person);

		if (last) {
			$(last).before(panelEl);
		}
		else {
			$(peopleList[peopleList.length - 1]).after(panelEl);
		}
	
		var title = $(person).attr('data-title'),
			desc = $(person).attr('data-description');


		$('html, body').animate({
			scrollTop: $(person).offset().top
		}, 500, 'linear', function() {


		});

		setTimeout(function() {
				$(panelEl).addClass('show');
				$(panelTitleEl).html(title); 
				$(panelTextEl).html(desc); 
			}, 25);
	

		$(peopleList).removeClass('selected');
		$(person).addClass('selected');
	}

	function filterGroup(group) {
		$(peopleList).removeClass('selected');

		if ($(panelEl).hasClass('show')) {
			$(panelEl).removeClass('show');

			$(panelEl).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function() {
				$('#content').before(panelEl);
				$('.person').removeClass('hidden');
				$('.person:not([data-group="' + group + '"])').addClass('hidden');

				if (group == 'all') {
					$('.person').removeClass('hidden');
				}
			});
		}
		else {
			$('.person').removeClass('hidden');
			$('.person:not([data-group="' + group + '"])').addClass('hidden');

			if (group == 'all') {
				$('.person').removeClass('hidden');
			}
		}
	}

	function findLastinRow(person) {
		for(var i = 0; i < peopleList.length; i++) {

			if (!$(peopleList[i]).hasClass('hidden')) {
				if (peopleList[i] != person && $(peopleList[i]).offset().top > $(person).offset().top) {
					return peopleList[i];
				}
			}
		}

		return false;
	}
});