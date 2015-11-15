$(function () {
  $('[data-toggle="popover"]').popover();
});

$(document).ready(function () {



	function init_video_filter() {
		videoList = document.querySelectorAll('div.video-obj');
		filterList = document.querySelectorAll('.video-filter a');
		videoNavList = document.querySelectorAll('.video-nav a');

		for(var i = 0; i < filterList.length; i++) {
			filterList[i].onclick = function(event) {
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;

				$(filterList).removeClass('selected');
				$(this).addClass('selected'); //working
				$('.clearfix').addClass('out');

				var term = this.getAttribute('data-term');
				console.log(term);
				if (term !== 'clear') {
					$(videoList).addClass('out');

					for(var i = 0; i < videoList.length; i++) {
						//if (term === videoList[i].getAttribute('data-term')) {
						if ((videoList[i].getAttribute('data-term')).indexOf(term) != -1) {
							$(videoList[i]).removeClass('out');
							

						}
					}
					$(videoNavList).addClass('out');
					for(var i = 0; i < videoNavList.length; i++) {
						//if (term === videoNavList[i].getAttribute('data-term')) {
						if ((videoNavList[i].getAttribute('data-term')).indexOf(term) != -1) {
							$(videoNavList[i]).removeClass('out');
							

						}
					}
				}
				else {
					$('.clearfix').removeClass('out');
					$(videoList).removeClass('out');
					$(videoNavList).removeClass('out');
				}
			}
		}
	}
	init_video_filter();
});