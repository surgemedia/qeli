<div class="case-study section">
	<h2>Case Study</h2>
	<p><?php  echo truncate(get_field('program',get_field('case_study')[$GLOBALS['case_study_count']]),30,'...' )?></p>
	<blockquote>
		<p><?php echo truncate(get_field('outcome',get_field('case_study')[$GLOBALS['case_study_count']]),30,'...' ) ?></p>
	</blockquote>
	<p class="author-meta">
	<strong><?php echo get_field('author',get_field('case_study')[$GLOBALS['case_study_count']])[0]['name']; ?></strong><br>
	<?php echo get_field('author',get_field('case_study')[$GLOBALS['case_study_count']])[0]['position']; ?>
	</p>
	<a href="<?php echo get_permalink(get_field('case_study')[$GLOBALS['case_study_count']]); ?>"><span class="graphic icon-read-more"></span> Read more</a>
	
</div>