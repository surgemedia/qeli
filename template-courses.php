<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="colored-background">
	<?php get_template_part('templates/page', 'colored-header'); ?>
	<div class="container">
		<?php  get_template_part('templates/content', 'featured-program'); ?>
		<?php get_template_part('templates/content', 'featured-Testimonial'); ?>
	</div>
	<?php endwhile; ?>
	<div id="filters" class="container">
		<div class="row">
			<div class="filter-top">
				<a href="#" class="btn btn-filter" data-filter="" data-filter-group="all">All</a>
				<a href="#" class="btn btn-filter filter-favourite" data-filter=".favourite" data-filter-group="favourite">Favourite<span class="graphic icon-star selected"></span></a>
				<a href="#" class="btn btn-filter btn-filter-toggle">Filter<span class="graphic icon-select-expand" <="" span=""></span></a> 
				<span class="filter-message">Displaying: <span class="filter-value">all</span><a class="filter-clear visuallyhidden" href="#" data-filter="" data-filter-group="all"><span class="graphic icon-close-circle"></span></a></span>
			</div>
			<?php /* ?>
			<div class="selectors">
				<div>
				<!--<a href="#" data-filter="" data-filter-group="all">All</a>-->
				</div>
					<div class="filter-col"><h3>audiences</h3><ul class="filter-group audiences" data-filter-group="audiences"><li><a href="#" role="presentation" data-filter=".teachers" data-filter-group="audiences" data-value-str="Teachers">Teachers</a></li><li><a href="#" role="presentation" data-filter=".principals" data-filter-group="audiences" data-value-str="Principals">Principals</a></li><li><a href="#" role="presentation" data-filter=".graduates" data-filter-group="audiences" data-value-str="Graduates">Graduates</a></li><li><a href="#" role="presentation" data-filter=".administrators" data-filter-group="audiences" data-value-str="Administrators">Administrators</a></li></ul></div><div class="filter-col"><h3>months</h3><ul class="filter-group months" data-filter-group="months"><li><a href="#" role="presentation" data-filter=".january" data-filter-group="months" data-value-str="January">January</a></li><li><a href="#" role="presentation" data-filter=".february" data-filter-group="months" data-value-str="February">February</a></li><li><a href="#" role="presentation" data-filter=".march" data-filter-group="months" data-value-str="March">March</a></li><li><a href="#" role="presentation" data-filter=".april" data-filter-group="months" data-value-str="April">April</a></li><li><a href="#" role="presentation" data-filter=".may" data-filter-group="months" data-value-str="May">May</a></li><li><a href="#" role="presentation" data-filter=".june" data-filter-group="months" data-value-str="June">June</a></li><li><a href="#" role="presentation" data-filter=".july" data-filter-group="months" data-value-str="July">July</a></li><li><a href="#" role="presentation" data-filter=".august" data-filter-group="months" data-value-str="August">August</a></li><li><a href="#" role="presentation" data-filter=".september" data-filter-group="months" data-value-str="September">September</a></li><li><a href="#" role="presentation" data-filter=".october" data-filter-group="months" data-value-str="October">October</a></li><li><a href="#" role="presentation" data-filter=".november" data-filter-group="months" data-value-str="November">November</a></li><li><a href="#" role="presentation" data-filter=".december" data-filter-group="months" data-value-str="December">December</a></li></ul></div><div class="filter-col"><h3>deliveries</h3><ul class="filter-group deliveries" data-filter-group="deliveries"><li><a href="#" role="presentation" data-filter=".online" data-filter-group="deliveries" data-value-str="Online">Online</a></li><li><a href="#" role="presentation" data-filter=".hosted" data-filter-group="deliveries" data-value-str="Hosted">Hosted</a></li><li><a href="#" role="presentation" data-filter=".inschool" data-filter-group="deliveries" data-value-str="In School">In School</a></li></ul></div><div class="filter-col"><h3>locations</h3><ul class="filter-group locations" data-filter-group="locations"><li><a href="#" role="presentation" data-filter=".online" data-filter-group="locations" data-value-str="Online">Online</a></li><li><a href="#" role="presentation" data-filter=".brisbane" data-filter-group="locations" data-value-str="Brisbane">Brisbane</a></li><li><a href="#" role="presentation" data-filter=".toowoomba" data-filter-group="locations" data-value-str="Toowoomba">Toowoomba</a></li><li><a href="#" role="presentation" data-filter=".rockhampton" data-filter-group="locations" data-value-str="Rockhampton">Rockhampton</a></li><li><a href="#" role="presentation" data-filter=".cairns" data-filter-group="locations" data-value-str="Cairns">Cairns</a></li><li><a href="#" role="presentation" data-filter=".inschool" data-filter-group="locations" data-value-str="In School">In School</a></li></ul></div><div class="filter-col"><h3>fees</h3><ul class="filter-group fees" data-filter-group="fees"><li><a href="#" role="presentation" data-filter=".1200" data-filter-group="fees" data-value-str="1200">1200</a></li><li><a href="#" role="presentation" data-filter=".500" data-filter-group="fees" data-value-str="500">500</a></li><li><a href="#" role="presentation" data-filter=".3000" data-filter-group="fees" data-value-str="3000">3000</a></li><li><a href="#" role="presentation" data-filter=".850" data-filter-group="fees" data-value-str="850">850</a></li><li><a href="#" role="presentation" data-filter=".250" data-filter-group="fees" data-value-str="250">250</a></li></ul></div><div class="filter-col development"><h3>development</h3><ul class="filter-group development" data-filter-group="development"><li><a href="#" role="presentation" data-filter=".advancecareer" data-filter-group="development" data-value-str="Advance career">Advance career</a></li><li><a href="#" role="presentation" data-filter=".basicskillsdevelopment" data-filter-group="development" data-value-str="Basic skills development">Basic skills development</a></li><li><a href="#" role="presentation" data-filter=".bementored" data-filter-group="development" data-value-str="Be mentored">Be mentored</a></li><li><a href="#" role="presentation" data-filter=".bringinginnovation" data-filter-group="development" data-value-str="Bringing innovation">Bringing innovation</a></li><li><a href="#" role="presentation" data-filter=".collaboratewithothers" data-filter-group="development" data-value-str="Collaborate with others">Collaborate with others</a></li><li><a href="#" role="presentation" data-filter=".differentapproaches" data-filter-group="development" data-value-str="Different approaches">Different approaches</a></li><li><a href="#" role="presentation" data-filter=".feedbackonskills" data-filter-group="development" data-value-str="Feedback on skills">Feedback on skills</a></li><li><a href="#" role="presentation" data-filter=".guidedlearning" data-filter-group="development" data-value-str="Guided learning">Guided learning</a></li><li><a href="#" role="presentation" data-filter=".implementnewapproaches" data-filter-group="development" data-value-str="Implement new approaches">Implement new approaches</a></li><li><a href="#" role="presentation" data-filter=".influenceandpersuasion" data-filter-group="development" data-value-str="Influence and persuasion">Influence and persuasion</a></li><li><a href="#" role="presentation" data-filter=".manageothers" data-filter-group="development" data-value-str="Manage others">Manage others</a></li><li><a href="#" role="presentation" data-filter=".manageperformance" data-filter-group="development" data-value-str="Manage performance">Manage performance</a></li><li><a href="#" role="presentation" data-filter=".managingchange" data-filter-group="development" data-value-str="Managing change">Managing change</a></li><li><a href="#" role="presentation" data-filter=".managingstakeholders" data-filter-group="development" data-value-str="Managing stakeholders">Managing stakeholders</a></li><li><a href="#" role="presentation" data-filter=".mentorothers" data-filter-group="development" data-value-str="Mentor others">Mentor others</a></li><li><a href="#" role="presentation" data-filter=".mentoring" data-filter-group="development" data-value-str="Mentoring">Mentoring</a></li><li><a href="#" role="presentation" data-filter=".newskillsforleadership" data-filter-group="development" data-value-str="New skills for leadership">New skills for leadership</a></li><li><a href="#" role="presentation" data-filter=".performance" data-filter-group="development" data-value-str="Performance">Performance</a></li><li><a href="#" role="presentation" data-filter=".professionaldevelopment" data-filter-group="development" data-value-str="Professional development">Professional development</a></li><li><a href="#" role="presentation" data-filter=".recognition" data-filter-group="development" data-value-str="Recognition">Recognition</a></li><li><a href="#" role="presentation" data-filter=".shareexperiences" data-filter-group="development" data-value-str="Share experiences">Share experiences</a></li><li><a href="#" role="presentation" data-filter=".support" data-filter-group="development" data-value-str="Support">Support</a></li><li><a href="#" role="presentation" data-filter=".support/coping" data-filter-group="development" data-value-str="Support/coping">Support/coping</a></li><li><a href="#" role="presentation" data-filter=".teambuilding" data-filter-group="development" data-value-str="Team building">Team building</a></li></ul></div>				
			</div>
			<?php */ ?>
		</div>
	</div>
</div>
</div>
<div class="row">
<div id="courseOverview" class="isotope container" >
	<div class="col-xs-12">
		<?php
		//Gets a templated post from the ID
		$args = array (
		'post_type'                 => 'courses',
		);
		// The Query
		$query = new WP_Query( $args );
		// The Loop
		if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
		$query->the_post();
		
		//debug(get_post_meta($post->ID));
		

		get_template_part('templates/content-post-type', 'courses');

		}
		} else {
		get_template_part('templates/content', 'no-posts');
		}
		// Restore original Post Data
		wp_reset_postdata()
		
		?>
	</div>
</div>
</div>