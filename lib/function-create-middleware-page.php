<?php 
/* ==========================================

		    Surge Media PTY LTD.

		MiddleWare Function for Qeli
			
			 Create Import page 

============================================*/


		$Auto_page = array(
			'post_type' => 'page',
			'post_name' => 'json-cron-job',
			'post_title' => 'Json Cron job',
			'page_template' => 'template-jsoncronjob.php',
		);
		
		// Update the post into the database
		wp_update_post( $Auto_page );


