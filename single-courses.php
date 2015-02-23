<?php
				$course_id = get_the_ID();
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
					}
				}
					//
?>
<article id="content" class="col-xs-12">
	<div class="row">
		<?php
			//easily set default course image
			$default_img = 'http://54.79.72.151/~qeliedu/wp-content/uploads/2015/02/hero-image7.png';
			//fixed image url
			$image_url = getFeaturedUrl(get_the_id(),'full');
			if(-1 < strpos($image_url,'/media/default.png')){
			$image_url = $default_img;
			}
		?>
		<div class="page-header colored-background image-background overlay" style="background-image:url(<?php echo $image_url; ?>)">
			
			
			<div class="header">
				<div class="container">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="container header-text">
				<?php if(get_field('statement')) { ?>
				<?php the_field('statement') ?>
				<?php } ?>
				
				
				
			</div>
			<div class="container">
			<?php if(get_field('audience')) { ?>
			<h2>A program suitable for</h2>
				<?php the_field('audience') ?>
				<?php } ?>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-sm-9">
				<?php if(get_field('executive_summary')) { ?>
				<?php the_field('executive_summary') ?>
				<?php }  else { get_template_part('templates/content', 'no-posts'); } ?>
				<?php if(get_field('outcome')) { ?>
				<?php the_field('outcome'); ?>
				<?php } ?>
				<?php if(get_field('program_outline')){ ?>
				<h2>Program Delivery</h2>
				<?php the_field('program_outline'); ?>
				<?php } ?>
				<?php if(get_field('articulation')){ ?>
				<h2>Aiming Higher?</h2>
				<?php the_field('articulation'); ?>
				<?php } ?>
				<?php if(get_field('executive_summary')) { ?>
				<h2>Cost</h2>
					<h4>
					<?php $cost = strip_tags(get_field('cost')); ?>
					<?php echo'$'.$cost." +GST"; ?>
					</h4>
					<!-- <h5>Sounds right for you? <strong>Select a date and registor now.</strong> </h5> -->
				<?php }  ?>
				<?php if(get_field('pdf_download')){ ?>
				<h2>Download PDF</h2>
				<a target="_blank" href="<?php echo get_field('pdf_download')['url']; ?>">
				<i class="dashicons-download dashicons"></i>
				<?php echo "[PDF] ".get_field('pdf_download')['title']; ?>
				</a>
				<?php } ?>
				<!-- <h2>Audience</h2> -->
				<?php// edit_post_link(); ?>
			</div>
			<div class="col-sm-3">
				<div id="aside" class="panel-aside panel-summary">
					<div class="affix-this affix-top" data-spy="affix" data-offset-top="200" data-offset-bottom="200" style="width: 281px;">
						<div class="panel">
							<div class="panel-heading">
								<h2>At a Glance...</h2>
							</div>
							<div class="panel-body">
								<ul class="list-striped">
								<li>
										<h3>Facilitator: </h3>
										<p>
										<?php echo $GLOBALS['facilitator_names']; ?>
										</p>
									</li>
									<li>
										<h3>Duration</h3>
										<?php the_field('length') ?>
									</li>
									<li>
										<h3>Delivery Method</h3>
										<?php the_field('deliveryMethod'); ?>
									</li>

									<li>
										<h3>Cost </h3>
										<p>
										<?php $cost = strip_tags(get_field('cost')); ?>
										<?php echo'$'.$cost." +GST"; ?>
										</p>
									</li>
									
									
									
									<li>
									<h3>When </h3>
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
													$instances_name = get_sub_field('instances_name');
											if((get_sub_field('instances_name'))){ ?>
											<div>
											<input type="radio" name="programid" checked="checked" value="<?php echo $programinstanceid ?>"/>
											<label for="programid"><?php echo $instances_name ?></label>
											</div>
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
					<a target="_blank" href="<?php echo get_field('pdf_download')['url']; ?>">More Infomation >></a>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Facilatator -->
	<div class="row colored-background">
		<div class="container facilitator-item">
			<div class="col-sm-8">
				<h2>Program Facilitator</h2>
				<?php
				
				
				if(false != $facil_array){
				//use array of facilactors to get template
					for ($i=0; $i < sizeof($facil_array); $i++) {
					//extends scope for the facil loop
						$GLOBALS['facilitator'] = $facil_array[$i];
						$GLOBALS['facilitator_names'] .= get_post($facil_array[$i])->post_title.",";
						get_template_part('templates/content-post-type', 'course-facilitator-for-loop');
					}
					unset($GLOBALS['facilitator']);
				}
						else {	get_template_part('templates/content', 'no-posts'); }
				?>
			</div>
		</div>
	</div>
	<!-- Facilatator -->

	
	<div class="row ">
	<!-- Date Locations -->
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
		<!-- Date Locations -->
		<!-- Related Programs -->


	
	</div>
	<div class="row colored-background">
			<?php if(get_field('related_programs')) { ?>
		<div class="container">
			<div class="container facilitator-item">
			
			<h2>Related Programs</h2>
								<ul>
									<?php
									$related_array = trim(get_post_meta($course_id, 'related_programs', true));
									
									if(-1 != strpos(',',$related_array)){
										$single_related = explode(',',$related_array);
															} else 			{
										$single_related = array($related_array);
									}
									for ($i=0; $i < sizeof($single_related); $i++) {
										if(false != getProgramId($single_related[$i])){
											$real_id = getProgramId($single_related[$i]);
									?>
									
										<li><a  href="<?php echo get_permalink( $real_id); ?>"><?php echo get_the_title( $real_id ); ?></a>
									</li>
									<?php 	} // empty check
									} // for loop
									?>
								</ul>
							
						</div>
					</div>
					
					<?php } // if no realted courses ?>
<!-- Related Programs -->
</div>
	<!-- Testimonimals -->
	<div class="row">
		<div class="container">
			<div class="col-sm-8">
				<h2>What others are saying</h2>
				<?php
					// WP_Query arguments
				
				
				
						$args = array (
						'post_type'     => 'testimonial',
						'meta_query'    => array( 
						
						array( 'key' => 'course', 'value'     => $course_id,),
												),
						);
						// The Query
						$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type','testimonial-landscape');
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
	<!-- Testimonimals -->
	
	<div class="row colored-background">
		<div class="container">
			<div class="col-sm-8">
				<h2>Cancellation Policy</h2>
				<p>If a participant registers for this program and for some unforseen reason needs to cancel or alter their registration, they should notify the QELi team immediately. Failure to do so within&nbsp;seven (7)&nbsp;business days of the program commencement date will result in their organisation being liable for the full cost of registration fees, as per QELi policy. If a participant cancels their registration for this program between&nbsp;eight (8) and thirty (30)&nbsp;business days prior to the program commencement date, then a 25% administration charge will apply.</p>
			</div>
		</div>
	</div>
<?php /* ?>
	<div class="row ">
		<div class="container">
			<div class="col-sm-8">
				<h2>Program Extras</h2>
				<div class="panel-group" id="accordion-outline" role="tablist">
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

				
				</div>
			</div>
		</div>
	</div>
	*/ ?>
<?php /* ?>
	
	<div class="row colored-background">
		<div class="container">
			<div class="col-sm-8">
				<h2>FAQs</h2>
				<?php if(get_field('faqs')){ ?>
				<div class="panel-group" id="accordion-faq" role="tablist">
					<?php
					the_field('faqs');
					?>
				</div>
	<?php } ?>

			</div>
		</div>
	</div>
<?php	*/ ?>
</article>