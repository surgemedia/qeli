<?php 
/* ==========================================

		    Surge Media PTY LTD.

		   Hide Page if not admin
			 
			 
============================================*/


add_action( 'pre_get_posts' ,'exclude_this_page' );
function exclude_this_page( $query ) {
    if( !is_admin() )
        return $query;

    global $pagenow;

    // WordPress 2.9
    if( 'edit-pages.php' == $pagenow )
        $query->set( 'post__not_in', array(23) );

    // WordPress 3.0
    /*
    if( 'edit.php' == $pagenow && ( get_query_var('post_type') && 'page' == get_query_var('post_type') ) )
        $query->set( 'post__not_in', array(23) );
    */
    return $query;
}