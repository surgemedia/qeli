<?php 
/* ==========================================

		    Surge Media PTY LTD.

		MiddleWare Function for Qeli
			
			 Disapper ID field

============================================*/



function acf_disappear() {
   	echo 
	'<style type="text/css">
         #acf-disable{display:none;}
    </style>
	';
}

add_action('admin_head', 'acf_disappear');

// Add css to disappear some ID input field.