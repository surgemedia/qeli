<?php
				$course_id = get_the_ID();
				$instanes = get_field('instances');
				$facil_array = array();
				$suffix = ", ";
				// Get the ids in an array
				for ($i=0; $i < sizeof($instanes); $i++) {
						$facil = trim($instanes[$i]['facilitator']);
						
						if(0 < strlen($facil)){
						if(false === strstr($facil,',')){
							array_push($facil_array, trim($facil));
						} else {
							$facil_single = explode(',', $facil);
							//debug($facil_single);
							for ($j=0; $j < sizeof($facil_single); $j++) {
								array_push($facil_array, trim($facil_single[$j]));
								
							}
						}
					}
					
				}
				
				// Get the name for at a glance
				if(false != $facil_array){
					$facil_array = array_keys(array_flip($facil_array));
					for ($y=0; $y < sizeof($facil_array); $y++) {
						//debug( sizeof($facil_array)." + ".$y);
						if($y+1 == sizeof($facil_array)){
							$suffix = "";
						}
						$GLOBALS['facilitator_names'] .= get_post($facil_array[$y])->post_title.$suffix;
					}
				}
				
?>
<article id="content" class="col-xs-12">
	<div class="row">
		<?php
			//easily set default course image
			$default_img = '/wp-content/uploads/2015/02/hero-image7.png';
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
				<h2>A program suitable for</h2>
				<?php if(get_field('sponsor')) { ?>
				<img class="col-sm-12 col-md-3 col-lg-3 pull-right" src="<?php echo get_field('sponsor')['sizes']['medium']; ?>" alt="<?php echo get_field('sponsor')['name']; ?>">
				<?php } ?>
				<ul>
					<?php
					$audience = strip_tags(get_the_taxonomies()['courses_categories']);
					$audience_array = explode(':',$audience)[1];
					$audience_list = explode(',',$audience_array);
					$audience_list[sizeof($audience_list)-1] = substr($audience_list[sizeof($audience_list)-1],0,-1);
					
					for ($i=0; $i < count($audience_list); $i++) { ?>
					<?php
					
					if(1 == strpos($audience_list[$i],'and ')){ ?>
					<li><?php echo substr($audience_list[$i], 5); ?></li>
					<?php } else { ?>
					<li><?php echo $audience_list[$i]; ?></li>
					<?php } ?>
					<?php } ?>
				</ul>
				
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
				<?php if(0 != $cost){ ?>
				<?php echo'$'.$cost." +GST"; ?>
				<?php } else { ?>
				POA
				<?php } ?>
				</h4>
				<!-- <h5>Sounds right for you? <strong>Select a date and registor now.</strong> </h5> -->
				<?php }  ?>
				<?php /* if(get_field('pdf_download')){ ?>
				<h2>Download PDF</h2>
				<a target="_blank" href="<?php echo get_field('pdf_download')['url']; ?>">
					<i class="dashicons-download dashicons"></i>
					<?php echo "[PDF] ".get_field('pdf_download')['title']; ?>
				</a>
				<?php } */ ?>
				
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
										<p><?php
											echo $GLOBALS['facilitator_names']; ?>
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
											<?php if(0 != $cost){ ?>
											<?php echo'$'.$cost." +GST"; ?>
											<?php } else { ?>
											POA
											<?php } ?>
										</p>
									</li>
									
									<li>
										<h3>When </h3>
										<form action="<?php echo site_url();?>/cart/" method="post" id="course_add_to_cart">
											<input type="hidden" name="postid" value="<?php the_ID();?>" />
											<input type="hidden" name="post_timing" value="<?php echo time();?>" />
											<?php
											$count_checked = 0;
											if( get_field('instances') ){
												$i = 0;
												while( has_sub_field('instances') ){
													$i++;
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
													$maxSize = (int)get_sub_field('class_size');
													$currentSize = (int)get_sub_field('currentClassSize');
													$instances_name = get_sub_field('instances_name');
													
											if((get_sub_field('instances_name'))){ 
												// debug($maxSize."m - c".$currentSize." -".var_dump(get_classSize($maxSize,$currentSize,true)));
												?>
											<div class="option">
												<?php if('- (Fully booked)' != get_classSize($maxSize,$currentSize,true)) { ?>
												<?php $count_checked++ ?>
												<input type="radio" name="programid" id="programid-<?php echo $programinstanceid ?>" <?php if($count_checked == 1) {  echo 'checked'; }  ?> value="<?php echo $programinstanceid ?>"/>
												<?php } ?>
												<label for="programid-<?php echo $programinstanceid ?>"><?php echo $instances_name ?> <?php echo get_classSize($maxSize,$currentSize,true) ?></label>
											</div>
											<?php  } ?>
											<?php }
											}
											
											?>
										</form>
									</li>
									
								</ul>
							</div>
							<div class="panel-footer">
								<?php //if(0 != $cost) { ?>
								<a href="#" class="link-purchase" onclick="document.getElementById('course_add_to_cart').submit();">
									<span class="graphic arrow-right-sm"></span> Add to cart <span class="graphic icon-cart pull-right">
								</span></a>
								<?php //} ?>
							</div>
							
						</div>
						<?php if (get_field('pdf_download')) { ?>
						<a target="_blank" href="<?php echo get_field('pdf_download')['url']; ?>">More Infomation >></a>
						<?php } ?>
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
				
				//$facil_array = array_keys(array_flip($facil_array));
				//debug(array_flip($facil_array));
					for ($k=0; $k < sizeof($facil_array); $k++) {
					//extends scope for the facil loop
						$GLOBALS['facilitator'] = $facil_array[$k];
						
						get_template_part('templates/content-post-type', 'course-facilitator-for-loop');
					}
					unset($GLOBALS['facilitator']);
				}
									else {	get_template_part('templates/content', 'no-facilitator'); }
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
		<!-- Case Study -->
	<?php ?>
	
	
	<?php ?>

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
<div class="row">
		<div class="container">
			<div class="col-sm-8">
				<div class="case-study section">
					<!-- <h2>Case Study</h2> -->
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
<?php
					// WP_Query arguments
				
				
				
						$args = array (
						'post_type'     => 'testimonial',
						'meta_query'    => array(
						
						array( 'key' => 'course', 'value'     => $course_id,),
												),
						);
						// The Query
$query = new WP_Query( $args ); ?>
<?php
if ( $query->have_posts() ) { ?>
<!-- Testimonimals -->
<div class="row">
	<div class="container">
		<div class="col-sm-8">
			<h2>What others are saying</h2>
			<?php  } ?>
			<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part('templates/content-post-type','testimonial-landscape');
				}
			}
			else {
				//get_template_part('templates/content', 'no-posts');
			}
				// Restore original Post Data
				// WP_Query arguments
			?>
			<?php
			if ( $query->have_posts() ) { ?>
		</div>
	</div>
</div>
<?php  }
			wp_reset_postdata();
?>
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