<?php
/*
Template Name: Programs Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<?php get_template_part('templates/content-header', 'text'); ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="lead">
				<?php get_template_part('templates/content', 'lead'); ?>
				<?php the_content(); ?>
					<div class="lead">
						<p>Our offering includes three different kinds of programs:</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<div class="panel panel-programs">
						<div class="panel-heading">
							<div class="numbering">1</div>
							<h3 class="panel-title">Schdeuled Programs</h3>
						</div>
						<div class="panel-body">
							<p>QELi runs a selection of scheduled programs which you can enrol in directly on this site. </p>
							<p>If you know the name of your course then please select it here:</p>
							
							<select>
								<option> - Course Name - </option>
								<?php
								
								// WP_Query arguments
								$args = array (
								'post_type'              => 'courses',
								'meta_query'             => array(
								array(
								'key'       => 'instances_0_type',
								'value'     => '1',
								),
								),
								
								);
								// The Query
								$query = new WP_Query( $args );
								// The Loop
								if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
								$query->the_post(); ?>
								<option data-url="<?php echo the_permalink(); ?>" ><?php echo get_the_title(); ?></option>
								<?php }
								} else {
								// no posts found
								}
								// Restore original Post Data
								wp_reset_postdata();
								?>
								</select> <a href="<?php //TODO @walt get data url ?>" class="btn btn-shadowed small">go</a>
								<br>
								<br>
								<p>Or visit the Programs Catalogue for more options to search by</p>
								<a href="http://54.79.72.151/~qeliedu/program-catalogue/" class="btn btn-shadowed text-uppercase"><span class="graphic arrow-right"></span>Program Catalogue</a>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="panel panel-programs">
							<div class="panel-heading">
								<div class="numbering">2</div>
								<h3 class="panel-title">Custom Programs</h3>
							</div>
							<div class="panel-body">
								<p>We’ll work closely with you to understand your situation, requirements and goals. We can then customise and contextualise one of our existing programs, or create an integrated leadership development solution specifically for you. QELi’s customised programs can be delivered on-site and within budget.</p>
								<br>
								<br>
								<a href="/customised-programs/" class="btn btn-shadowed text-uppercase"><span class="graphic arrow-right"></span>Read more</a>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="panel panel-programs">
							<div class="panel-heading">
								<div class="numbering">3</div>
								<h3 class="panel-title">Specialist Services</h3>
							</div>
							<div class="panel-body">
								<p>QELi can fully customise leadership programs for schools, systems and sectors across Australia and internationally. Our approach, program design and delivery can be tailored to the specific needs of your context and school setting.</p>
								<br>
								<br>
								<br>
								<a href="/specialist-services/" class="btn btn-shadowed text-uppercase"><span class="graphic arrow-right"></span>Read more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<?php endwhile; ?>