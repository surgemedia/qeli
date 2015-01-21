<div class="col-xs-12 col-sm-6">
			<div class="person">
				<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA0Njg3NSIgeT0iNzAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4xNDB4MTQwPC90ZXh0PjwvZz48L3N2Zz4=" class="img-responsive img-circle hidden-xs" data-src="holder.js/140x140/auto" alt="140x140" data-holder-rendered="true">
				<h2><?php echo get_field('people_repeater')[$GLOBALS['people_count']]['name'] ?></h2>
				<div class="meta-qualifications"><?php echo get_field('people_repeater')[$GLOBALS['people_count']]['qualifications'] ?></div>
				<div class="meta-title h3">Board Chair</div>
				<?php echo get_field('people_repeater')[$GLOBALS['people_count']]['biography'] ?>
				<div class="meta-special">
					<h3>Special Responsibilities:</h3>
					<?php echo get_field('people_repeater')[$GLOBALS['people_count']]['special_responsibilities'] ?>
				</div>
			</div>
		</div>