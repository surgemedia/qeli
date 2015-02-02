<article id="content" class="col-xs-12">
	<div class="row">
		<div class="colored-background">
			<div class="header">
				<div class="container">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="container">
				<h2>Facilitator</h2>
						<?php
						$course_id = get_the_ID();
						// WP_Query arguments
						$args = array (
						'post_type'     => 'key_people',
						'meta_query'    => array( 
						array( 'key' => 'remove_others', 'value'     => '1',),
						array( 'key' => 'course', 'value'     => $course_id,),
							),
						);
						// The Query
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type', 'course-facilitator');
						$GLOBALS['course-facilitator'] = get_the_title();
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						// WP_Query arguments
						?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class="col-sm-8">
					<h2>Executive Summary</h2>
					<?php the_field('executive_summary') ?>
					<h2>Outcome</h2>
					<?php the_field('outcome'); ?>
					<h2>Audience</h2>
					<?php the_field('audience') ?>
					<?php edit_post_link(); ?>
				</div>
				<div class="col-sm-4">
					<div id="aside" class="col-xs-12">
						<div class="affix-this affix-top" data-spy="affix" data-offset-top="200" data-offset-bottom="200" style="width: 281px;">
							<div class="panel">
								<div class="panel-heading">
									<h2>Program Summary</h2>
								</div>
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td><strong>Cost (incl discounts): </strong></td>
												<td><?php the_field('cost') ?></td>
											</tr>
											<tr>
												<td><strong>Class size: </strong></td>
												<td><?php the_field('class_size') ?></td>
											</tr>
											<tr>
												<td><strong>Length </strong></td>
												<td><?php the_field('length') ?></td>
											</tr>
											<tr>
												<td><strong>Delivery method: </strong></td>
												<td><?php getTaxNames(get_field('delivery_method')); ?></td>
											</tr>
											<tr>
												<td><strong>Facilitator: </strong></td>
												<td><?php echo $GLOBALS['course-facilitator'] ?></td>
											</tr>
										</tbody>
									</table>
									<a href="http://breadcrumbdigital.com.au/projects/qeli-trials/cart/" class="btn btn-program"><span class="graphic icon-cart"></span> Add to cart</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="container">
				<div class="col-sm-8">
					<h2>Dates &amp; Locations</h2>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<?php
						for ($i=0; $i < sizeof(get_field('instances')); $i++) {
						$GLOBALS['instance_count'] = $i; //extends scope for the instance loop
							get_template_part('templates/content-post-type', 'course-acf-instance');
						}
						unset($GLOBALS['instance_count']);
						?>
					</div>		</div>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="container">
					<div class="col-sm-8">
						<h2>Featured Person</h2>
						<?php
						// WP_Query arguments
						
						$args = array (
						'post_type'     => 'testimonial',
						'meta_query'    => array( 
						array( 'key' => 'remove_others', 'value'     => '1',),
						array( 'key' => 'course', 'value'     => $course_id,),
												),
						);
						// The Query
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type-post-block','testimonial');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						// WP_Query arguments
						
						
						?>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="container">
					<div class="col-sm-8">
						<h2>Program Outline</h2>
						<div class="panel-group" id="accordion-outline" role="tablist">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-features">
									<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-features" aria-expanded="true" aria-controls="collapse-features">
										Program features<span class="fa fa-caret-square-o-down pull-right"></span>
									</a>
									</h3>
								</div>
								<div id="collapse-features" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-features">
									<div class="panel-body">
										<?php the_field('program_outline') ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-modules">
									<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-modules" aria-expanded="true" aria-controls="collapse-modules">
										Modules<span class="fa fa-caret-square-o-down pull-right"></span>
									</a>
									</h3>
								</div>
								<div id="collapse-modules" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-modules">
									<div class="panel-body">
										???
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-prereq">
									<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-prereq" aria-expanded="true" aria-controls="collapse-prereq">
										Prerequisites<span class="fa fa-caret-square-o-down pull-right"></span>
									</a>
									</h3>
								</div>
								<div id="collapse-prereq" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-prereq">
									<div class="panel-body">
										<?php get_field('prerequisites'); ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-resources">
									<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-resources" aria-expanded="true" aria-controls="collapse-resources">
										Resources<span class="fa fa-caret-square-o-down pull-right"></span>
									</a>
									</h3>
								</div>
								<div id="collapse-resources" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-resources">
									<div class="panel-body">
										<?php the_field('resources'); ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-articulation">
									<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-articulation" aria-expanded="true" aria-controls="collapse-articulation">
										Articulation<span class="fa fa-caret-square-o-down pull-right"></span>
									</a>
									</h3>
								</div>
								<div id="collapse-articulation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-articulation">
									<div class="panel-body">
										<?php the_field('articulation'); ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-related">
									<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-related" aria-expanded="true" aria-controls="collapse-related">
										Related Courses<span class="fa fa-caret-square-o-down pull-right"></span>
									</a>
									</h3>
								</div>
								<div id="collapse-related" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-related">
									<div class="panel-body">
										<ul>
											<?php
										for ($i=0; $i < sizeof(get_field('related_programs')); $i++) { ?>
										<?php if(isset(get_field('related_programs')[$i])) { ?>
										<li>
											<a href="<?php echo get_permalink(get_field('related_programs')[$i]); ?>"><?php echo get_the_title(get_field('related_programs')[$i]); ?></a>
										</li>
										<?php } else {
											get_template_part('templates/content', 'no-posts');
											} ?>
										<?php } // for loop ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="container">
					<div class="col-sm-8">
					<div class="case-study section">
						<h2>Case Study</h2>
						<?php
						// WP_Query arguments
						$args = array (
						'post_type'     => 'case_studies',
						'meta_query'    => array( 
						array( 'key' => 'remove_others', 'value'     => '1',),
						array( 'key' => 'course', 'value'     => $course_id,),
												),
						);
						// The Query
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type', 'case-study-landscape');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						// WP_Query arguments

						?>
						</div>
				
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="container">
					<div class="col-sm-8">
						<h2>FAQs</h2>
						<div class="panel-group" id="accordion-faq" role="tablist">
							<?php
							for ($i=0; $i < sizeof(get_field('faqs')); $i++) {
							$GLOBALS['FAQ_count'] = $i; 
							//extends scope for the instance loop
							 if(isset(get_field('faqs')[$GLOBALS['FAQ_count']]['question'])){
							get_template_part('templates/content-post-type', 'course-acf-FAQ');
							} else { 
								get_template_part('templates/content', 'no-posts');
							}
							}
							unset($GLOBALS['FAQ_count']);
							?>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="container">
					<div class="col-sm-8">
						<h2>Cancellation Policy</h2>
						<p>If a participant registers for this program and for some unforseen reason needs to cancel or alter their registration, they should notify the QELi team immediately. Failure to do so within&nbsp;seven (7)&nbsp;business days of the program commencement date will result in their organisation being liable for the full cost of registration fees, as per QELi policy. If a participant cancels their registration for this program between&nbsp;eight (8) and thirty (30)&nbsp;business days prior to the program commencement date, then a 25% administration charge will apply.</p>
					</div>
				</div>
			</div>
			<hr>
		</article>
		<?php unset($GLOBALS['course-facilitator']); ?>