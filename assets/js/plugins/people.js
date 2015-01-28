$(document).ready(function () {

	var panelEl = document.getElementById('panel-info'),
		peopleList,
		groupList,
		peopleFilterList;

	if (panelEl) {
		init();
	}

	function init() {
		peopleList = document.querySelectorAll('div.person');
		groupList = document.querySelectorAll('a.group-control');
		peopleFilterList = document.querySelectorAll('a.person-control');
		
		$(panelEl).find('.icon-close').click(function() {
			$(peopleList).removeClass('selected');
			$(panelEl).removeClass('show');
		});

		for(var i = 0; i < peopleList.length; i++) {
			peopleList[i].onclick = function() {
				$(panelEl).removeClass('show');
				var last = findLastinRow(this);

				if (last) {
					$(last).before(panelEl);
				}
				else {
					$(peopleList[peopleList.length - 1]).after(panelEl);
				}
				setTimeout(function() {
					$(panelEl).addClass('show');
				}, 25);

				$(peopleList).removeClass('selected');
				$(this).addClass('selected');
			}
		}

		for(var i = 0; i < groupList.length; i++) {

			groupList[i].onclick = function(event) {
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;

				filterGroup(this.getAttribute('data-group'));
			}
		}

		for(var i = 0; i < peopleFilterList.length; i++) {
			peopleFilterList[i].onclick = function(event) {
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
	
				$(panelEl).removeClass('show');

				var person = this.getAttribute('data-item');
				var personEl = $('.person[data-item="' + person + '"]')[0];
				var last = findLastinRow(personEl);
				
				if (last) {
					$(last).before(panelEl);
				}
				else {
					$(peopleList[peopleList.length - 1]).after(panelEl);
				}

				setTimeout(function() {
					$(panelEl).addClass('show');
				}, 25);

				$(peopleList).removeClass('selected');
				$(personEl).addClass('selected');
			}
		}
	}

	function selectPerson() {
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