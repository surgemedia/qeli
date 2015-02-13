<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background overlay" style="background-image:url('<?php
									$id = get_post_thumbnail_id();
									echo wp_get_attachment_image_src($id, 'full')[0];
			?>')">
			<div class="facilitator-item">
				<div class="header">
					<div class="container">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<div class="container">
					<h2>Facilitator</h2>
					<?php
					$instanes = get_field('instances');				
					$facil_array = false;
					for ($i=0; $i < sizeof($instanes); $i++) {
						if( 0 < strlen($instanes[$i]['facilitator'])){
						$facil = $instanes[$i]['facilitator'];
						if(-1 != strpos(',',$facil)){
						$facil_array = explode(',', $facil);
						
							} else {
								$facil_array = array($facil);
							}
						}
						//slit into array
						
					}
					if(false != $facil_array){
					//use array of facilactors to get template
						for ($i=0; $i < sizeof($facil_array); $i++) {
						$GLOBALS['facilitator'] = $facil_array[$i];
						$GLOBALS['facilitator_names'] .= get_post($facil_array[$i])->post_title.",";
						//extends scope for the facil loop
							get_template_part('templates/content-post-type', 'course-facilitator-for-loop');
						}
						unset($GLOBALS['facilitator']);
					}
						else {	get_template_part('templates/content', 'no-posts'); }
					?>
					
					
					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container ">
			<div class="col-sm-9">
				<?php if(get_field('executive_summary')) { ?>
				<h2 class="h2-course">Executive Summary</h2>
				
				<?php the_field('executive_summary') ?>
				<?php } ?>
				<?php if(get_field('outcome')) { ?>
				<h2>Outcome</h2>
				<?php the_field('outcome'); ?>
				<?php } ?>
				<h2>Audience</h2>
				<?php the_field('audience') ?>
				<?php edit_post_link(); ?>
			</div>
			<div class="col-sm-3">
				<div id="aside" class="panel-aside panel-summary">
					<div class="affix-this affix-top" data-spy="affix" data-offset-top="200" data-offset-bottom="200" style="width: 281px;">
						<div class="panel">
							<div class="panel-heading">
								<h2>Program Summary</h2>
							</div>
							<div class="panel-body">
								<ul class="list-striped">
									<li>
										<h3>Cost (incl discounts): </h3>
										<?php echo'$'; the_field('cost'); ?>
									</li>
									
									<li>
										<h3>Length </h3>
										<?php the_field('length') ?>
									</li>
									<li>
										<h3>Delivery method: </h3>
										<?php the_field('deliveryMethod'); ?>
									</li>
									<li>
										<h3>Facilitator: </h3>

										<?php echo $GLOBALS['facilitator_names']; ?>
									</li>
									<li>
										<form action="<?php echo site_url();?>/cart/" method="post" id="course_add_to_cart">
											<input type="hidden" name="postid" value="<?php the_ID();?>" />
											<?php
																													if( get_field('instances') ){
																				while( has_sub_field('instances') )
																				{
																					$programinstanceid = get_sub_field('programinstanceid');
																					$programinstance_city = get_sub_field('city');
																					$programinstance_type;
																					switch(get_sub_field('type')) {
																					    case 1:
																					        $programinstance_type = 'Scheduled Instance';
																					        break;
																					    case 2:
																					        $programinstance_type = 'Expression Of Interest';
																					 
																					        break;
																					    case 3:
																					        $programinstance_type = 'On Demand';
																		
																					        break;
																					    default:
																					        $programinstance_type = 'Scheduled Instance';
																					}
																					
																					

																					$instances_name = get_sub_field('instances_name')." - ".get_sub_field('city')."[".$programinstance_type."]";
																					if(0 < strlen(get_sub_field('instances_name'))){ ?>
																					<p><input type="radio" name="programid" checked="checked" value="<?php echo $programinstanceid ?>"/>
																					<label for="programid"><?php echo $instances_name ?></label></p>
																					<?php }
																				}
																			}
											?>
										</form>
										
									</li>
								</ul>
							</div>
							<div class="panel-footer">
							
									
									<a href="#" class="link-purchase" onclick="document.getElementById('course_add_to_cart').submit();"><span class="graphic arrow-right-sm"></span> Add to cart <span class="graphic icon-cart pull-right"></span></a>
									

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="colored-background">
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php /* ?>
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
	<?php */ ?>
	<?php if(get_field('testimonial_text')) { ?>
	<div class="row">
		<div class="container">
			<div class="col-sm-8">
				<h2>Testimonial</h2>
				<?php
					the_field('testimonial_text');
				?>
			</div>
		</div>
	</div>
	<?php } ?>
		<?php /* ?>
	<div class="row">
		<div class="container">
			<div class="col-sm-8">
				<h2>Testimonial</h2>
				<?php
					// WP_Query arguments
					$course_id = get_the_ID();
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
					}
					else {
						get_template_part('templates/content', 'no-posts');
					}
					// Restore original Post Data
					wp_reset_postdata();
					// WP_Query arguments
				?>
			</div>
		</div>
	</div>
	<?php */ ?>
	<div class="row">
		<div class="colored-background">
			<div class="container">
				<div class="col-sm-8">
					<h2>Program Outline</h2>

					<div class="panel-group" id="accordion-outline" role="tablist">
					<?php if(get_field('program_outline')){ ?>
						<div class="panel">
							<div class="panel-heading" role="tab" id="heading-features">
								<a data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-features" aria-expanded="true" aria-controls="collapse-features">
									<h3 class="panel-title">
									<span class="graphic arrow-panel-gray"></span>Program features <span class="graphic icon-toggle pull-right"></span>
									</h3>
								</a>
							</div>
							<div id="collapse-features" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-features">
								<div class="panel-body">
									<?php the_field('program_outline') ?>
								</div>
							</div>
						</div>
						<?php } ?>
					
						<div class="panel">
							<div class="panel-heading" role="tab" id="heading-prereq">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-prereq" aria-expanded="true" aria-controls="collapse-prereq">
									<h3 class="panel-title">
									<span class="graphic arrow-panel-gray"></span>Prerequisites <span class="graphic icon-toggle pull-right"></span>
									</h3>
								</a>
							</div>
							<div id="collapse-prereq" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-prereq">
								<div class="panel-body">
									<?php the_field('prerequisites'); ?>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-heading" role="tab" id="heading-resources">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-resources" aria-expanded="true" aria-controls="collapse-resources">
									<h3 class="panel-title">
									<span class="graphic arrow-panel-gray"></span>Resources <span class="graphic icon-toggle pull-right"></span>
									</h3>
								</a>
							</div>
							<div id="collapse-resources" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-resources">
								<div class="panel-body">
									<?php the_field('resources'); ?>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-heading" role="tab" id="heading-articulation">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-articulation" aria-expanded="true" aria-controls="collapse-articulation">
									<h3 class="panel-title">
									<span class="graphic arrow-panel-gray"></span>Articulation <span class="graphic icon-toggle pull-right"></span>
									</h3>
								</a>
							</div>
							<div id="collapse-articulation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-articulation">
								<div class="panel-body">
									<?php the_field('articulation'); ?>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-heading" role="tab" id="heading-related">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion-outline" href="#collapse-related" aria-expanded="true" aria-controls="collapse-related">
									<h3 class="panel-title">
									<span class="graphic arrow-panel-gray"></span>Related Courses <span class="graphic icon-toggle pull-right"></span>
									</h3>
									
								</a>
							</div>
							<div id="collapse-related" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-related">
								<div class="panel-body">
									
									<ul>
										<?php
										for ($i=0; $i < sizeof(get_field('related_programs')); $i++) { ?>
										<li>
											<a href="<?php echo get_permalink(get_field('prerequisites')[$i]); ?>"><?php echo get_the_title(get_field('related_programs')[$i]); ?></a>
										</li>
										<?php } // for loop ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if(get_field('faqs')){ ?>
	<div class="row">
		<div class="colored-background">
			<div class="container">
				<div class="col-sm-8">
					
					<h2>FAQs</h2>
					<div class="panel-group" id="accordion-faq" role="tablist">
						<?php
						the_field('faqs');
						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="container">
			<div class="col-sm-8">
				<h2>Cancellation Policy</h2>
				<p>If a participant registers for this program and for some unforseen reason needs to cancel or alter their registration, they should notify the QELi team immediately. Failure to do so within&nbsp;seven (7)&nbsp;business days of the program commencement date will result in their organisation being liable for the full cost of registration fees, as per QELi policy. If a participant cancels their registration for this program between&nbsp;eight (8) and thirty (30)&nbsp;business days prior to the program commencement date, then a 25% administration charge will apply.</p>
			</div>
		</div>
	</div>
</article>