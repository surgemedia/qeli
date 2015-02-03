<?php 
/* ==========================================

		    Surge Media PTY LTD.

		  Session for Cart function
			 
			 
============================================*/


//Request Install "WP Session Manager", more details: http://jumping-duck.com/wordpress/plugins/wp-session-manager/ 

add_filter( 'wp_session_expiration', function() { return 60 * 60; } ); // Set expiration to 1 hour