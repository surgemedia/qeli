$(document).ready(function () {

	var isMobile = false,
    	mobileBreakpoint = 768;

    if (window.innerWidth <= mobileBreakpoint) {
    	isMobile = true;
    }

	var homeEl = document.querySelector('.home-page'),
		pageScroll,
		scrollLocked = false,
		sectionList,
		sectionNext,
		sectionIdx,
		prevDeltaY = 0;

	if (homeEl) {
		if (!isMobile) {
			initScroll();
		}
		initVideo();
		
		//To do: tidy up resize
		var timeout = null;
		
		window.onresize = function() {
			if (timeout) {
				clearTimeout(timeout);
			}
			timeout = setTimeout(function() {
				if ($(window).width() <= mobileBreakpoint) {
			    	isMobile = true;
			    }
			    else {
			    	isMobile = false;
			    }

			    if (!isMobile) {
					initScroll();
				}

				initVideo();
			}, 250);
		};
	}

	function initVideo() {
		// To do: tidy up
		$(".video-modal").click(function(e){
            e.preventDefault();

            var vidSrc = this.getAttribute('data-src');
          	var $frame = $("#videoModal").find('.embed-responsive > iframe');

            $frame.attr('src','');
            $frame.attr('src', vidSrc);
            $($(this).attr('data-modal')).modal('show');

        });

        $("#videoModal").on('hidden.bs.modal', function (e) {
         	var $frame = $(this).find('.embed-responsive > iframe');

            // saves the current iframe source
            //var vidsrc = $frame.attr('src');
            // sets the source to nothing, stopping the video
            $frame.attr('src','');

            // sets it back to the correct link so that it reloads immediately on the next window open
            //$frame.attr('src', vidsrc);
        });
	}

	function initScroll() {
		

		var mainEl = document.getElementById('content-container'),
			scrollerWrapperEl = document.querySelector('.scroller-wrapper'),
			headerEl = document.getElementById('header'),
			scrollerEl = document.querySelector('.scroller');

			sectionList = document.querySelectorAll('div.section');
			sectionNext = document.querySelectorAll('div.section-footer');

			sectionIdx = 0;
			height = mainEl.offsetHeight;

		// Calculate and set section dimensions
		for(var i = 0; i < sectionList.length; i++) {
			var section = sectionList[i];

			section.style.width = mainEl.offsetWidth + 'px';

			if (!isMobile) {
				section.style.height = (window.innerHeight - headerEl.offsetHeight) + 'px';
			}
			else {
				section.style.height = 'auto';
				height += section.offsetHeight;
				console.log(height);
			}
		}

		scrollerWrapperEl.style.height = window.innerHeight + 'px';

		//scrollerEl.style.height = !isMobile ? (sectionList.length * window.innerHeight) + 'px' : height + 'px';



		if (pageScroll) {
			pageScroll.destroy();
		}
    
		pageScroll = new IScroll('.scroller-wrapper', {
										mouseWheel: !isMobile ? true : true,
										deceleration: 0.01,
										scrollY: true,
	    								scrollX: false,
	    								snap: !isMobile ? false : false
									});
		/*
		pageScroll.on('scrollStart', function() {
			scrollLocked = true;
		});

		pageScroll.on('scrollEnd', function() {
			if (scrollLocked) {
				scrollLocked = false;
			}
		});
		*/
		for(var i = 0; i < sectionNext.length; i++) {
			var next = sectionNext[i];

			next.onclick = function() {
				pageScroll.scrollBy(0, -(window.innerHeight - headerEl.offsetHeight), 500);
			}
		}
		/*
		//debounce timeout prevent event from firing consecutively
		var scrollTimeout;

		if (!isMobile) {
			$(document).on( "mousewheel DOMMouseScroll", function(event){
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;

				var e = event.originalEvent;

				if (scrollTimeout) {
					clearTimeout(scrollTimeout);
				}

				scrollTimeout = setTimeout(function() {
					// check if scrolling direction is different
					var deltaY = e.deltaY ? e.deltaY : e.detail;

					if ((deltaY <= 0 && prevDeltaY > 0) || (deltaY >= 0 && prevDeltaY <= 0)) {
						scrollLocked = false;
					}

					if (!scrollLocked) {
						//lock scroll right before animation, 'scrollStart' event cannot be used because of prevent default
						scrollLocked = true;

						if (deltaY > 0) {
							sectionIdx++;
							
							if (sectionIdx >= sectionList.length) {
								sectionIdx = (sectionList.length - 1);
							}
							pageScroll.scrollToElement(sectionList[sectionIdx], 750);
						}
						else {
							sectionIdx--;

							if (sectionIdx < 0) {
								sectionIdx = 0;
							}
							pageScroll.scrollToElement(sectionList[sectionIdx], 750);
						}

						prevDeltaY = deltaY;
					}
				}, 50);
			});
		}
		*/
	}
});