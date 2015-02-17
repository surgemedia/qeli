<?php
/*======================================================
=          Get post id from program id       =
======================================================*/
function getProgramId($program_id){
$return_id = false;
										$args = array (
										'post_type'              => 'courses',
										'meta_query'             => array(
										array(
										'key'       => 'programId',
										'value'     => strval($program_id),
										
										),
										),
										);
										// The Query
										$query = new WP_Query( $args );
										// The Loop
										if ( $query->have_posts() ) {
										while ( $query->have_posts() ) {
										$query->the_post();
										wp_reset_postdata();
										$return_id = get_the_id();
										}
										}
return $return_id;
}