<?php
/*
Template Name: Cart Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
    	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info panel-shadow">
				<div class="panel-heading">
					<h3>
						Cart
					</h3></div>
				
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Product</th>
								<th>Description</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><img src="" class="img-cart"></td>
								<td><strong>Middle Leadership Course</strong></td>
								<td>
									<form class="form-inline">
										<input class="form-control" type="text" value="1">
										<button rel="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></button>
										<a href="#" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>
									</form>
								</td>
								<td>$550.00</td>
								<td>$550.00</td>
							</tr>
							<tr>
								<td colspan="6">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4" class="text-right">Total Product</td>
								<td>$550.00</td>
							</tr>

							<tr>
								<td colspan="4" class="text-right"><strong>Total</strong></td>
								<td>$550.00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<a href="http://breadcrumbdigital.com.au/projects/qeli-trials/courses/" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
		<a href="#" class="btn btn-primary pull-right">Next<span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>    </article>
<?php endwhile; ?>