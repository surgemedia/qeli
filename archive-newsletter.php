<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <?php
            // TODO JW - this query should pull the news items published in the last 7 days
            // WP_Query arguments
            $args = array (
            'post_type'              => 'newsletter',
            'pagination'             => false,
            'posts_per_page'         => '12',
            );
            // The Query
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part('templates/content-post-type-post-block-news', 'listing');
            }
            } else {
            get_template_part('templates/content', 'no-posts');
            }
            // Restore original Post Data
            wp_reset_postdata();
            ?>
        </div>
        <div class="col-xs-12 col-sm-3">
            <?php if (roots_display_sidebar()) : ?>
            <aside class="sidebar" role="complementary">
                <?php // include roots_sidebar_path(); ?>
               
                    <section class="widget search-2 widget_search">
                    <?php 
            		get_template_part('templates/searchform');
                     ?>
                </section>
	                <section class="widget archives widget_archive">
	                <h3>Archives</h3>
	             <?php 
	              $terms = get_terms( 'archive_tax' );
	              
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					     echo '<ul>';
					     foreach ( $terms as $term ) {
					       echo '<li>' . $term->name . '</li>';
					     }
					     echo '</ul>';
					 }
					  ?>
	        		</section>
      
        </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div>
</div>
</div>